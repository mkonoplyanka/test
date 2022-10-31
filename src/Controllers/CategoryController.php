<?php

namespace Hillel\Test\Controllers;

use Hillel\Test\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('category/trash', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category/show', compact('category'));
    }
    public function create()
    {
        return view('category/create');
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                'unique:categories,title'
            ],
            'slug' => [
                'required',
                'max:255',
                'min:3'
            ]
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['success'] = 'Category was added successfully';
        return new RedirectResponse('/category');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/update', compact('category'));
    }
    public function update()
    {
        $data = request()->all();

        $category = Category::find($data['id']);
        $category->title = $data['title'];
        $category->slug = $data['slug'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('categories', 'title')->ignore($category->id)
            ],
            'slug' => [
                'required',
                'max:255',
                'min:3'
            ]
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category->save();

        $_SESSION['success'] = 'Category was updated successfully';
        return new RedirectResponse('/category');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return new RedirectResponse('/category');
    }

    public function restore($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();

        $_SESSION['success'] = 'Entry restored successfully';
        return new RedirectResponse('/category/trash');
    }

    public function forceDelete($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        $category = Category::find($id);
        $category->posts()->delete();
        $category->delete();

        $_SESSION['success'] = 'Entry deleted successfully';
        return new RedirectResponse('/category/trash');
    }
}