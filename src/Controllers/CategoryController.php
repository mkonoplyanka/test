<?php

namespace Hillel\Test\Controllers;

use Hillel\Test\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        return view('category/index', compact('categories'));
    }
    public function show($id)
    {
        $request = request();

        $category = Category::find($id);
        return view('category/show', compact('category'));
    }
    public function create()
    {
        return view('category/create');
    }
    public function store()
    {
        $request = request();

        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category/update', compact('category'));
    }
    public function update()
    {
        $request = request();

        $category = Category::find($request->input('id'));
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();
        return new RedirectResponse('/category');
    }
}