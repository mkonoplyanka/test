<?php

namespace Hillel\Test\Controllers;

use Hillel\Test\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag/index', compact('tags'));
    }
    public function show($id)
    {
        $request = request();

        $tag = Tag::find($id);
        return view('tag/show', compact('tag'));
    }
    public function create()
    {
        return view('tag/create');
    }
    public function store()
    {
        $request = request();

        $tag = new Tag();
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();
        return new RedirectResponse('/tag');
    }
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tag/update', compact('tag'));
    }
    public function update()
    {
        $request = request();

        $tag = Tag::find($request->input('id'));
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();
        return new RedirectResponse('/tag');
    }
    public function destroy($id)
    {
        $delete = Tag::find($id)->delete();
        return new RedirectResponse('/tag');
    }
}