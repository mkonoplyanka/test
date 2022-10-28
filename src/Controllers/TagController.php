<?php

namespace Hillel\Test\Controllers;

use Hillel\Test\Models\Tag;
use Hillel\Test\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag/index', compact('tags'));
    }
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tag/show', compact('tag'));
    }
    public function create()
    {
        $posts = Post::all();
        return view('tag/create', compact('posts'));
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                'unique:tags,title'
           ],
            'slug' => ['required'],
            'posts' => ['required', 'exists:posts,id']
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new Tag();
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();
        $tag->posts()->attach($data['posts']);

        $_SESSION['success'] = 'Entry added successfully';
        return new RedirectResponse('/tag');
    }
    public function edit($id)
    {
        $tag = Tag::find($id);
        $posts = Post::all();

        return view('tag/update', compact('tag', 'posts'));
    }
    public function update()
    {
        $data = request()->all();

        $tag = Tag::find($data['id']);
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('tags', 'title')->ignore($tag->id)
            ],
            'slug' => ['required'],
            'posts' => ['required', 'exists:posts,id']
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag->save();
        $tag->posts()->sync($data['posts']);

        $_SESSION['success'] = 'Entry updated successfully';
        return new RedirectResponse('/tag');
    }
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        $_SESSION['success'] = 'Entry deleted successfully';
        return new RedirectResponse('/tag');
    }
}