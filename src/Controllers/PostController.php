<?php

namespace Hillel\Test\Controllers;

use Hillel\Test\Models\Post;
use Hillel\Test\Models\Category;
use Hillel\Test\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        $category = Category::find($post->category_id);
        return view('post/show', compact('post', 'category'));
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post/create', compact('categories', 'tags'));
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                'unique:posts,title'
            ],
            'slug' => [
                'required',
                'max:255',
                'min:3'
            ],
            'body' => [
                'required'
            ],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new Post;
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags']);

        $_SESSION['success'] = 'Entry created successfully';
        return new RedirectResponse('/post');
    }
    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        $categories = Category::all();

        return view('post/update', compact('post', 'categories', 'tags'));
    }
    public function update()
    {
        $data = request()->all();

        $post = Post::find($data['id']);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts', 'title')->ignore($post->id)
            ],
            'slug' => [
                'required',
                'max:255',
                'min:3'
            ],
            'body' => [
                'required'
            ],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post->save();
        $post->tags()->sync($data['tags']);

        $_SESSION['success'] = 'Entry updated successfully';
        return new RedirectResponse('/post');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        return new RedirectResponse('/post');
    }
}