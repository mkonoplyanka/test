@extends('layout')

@section('title', 'Update-tag')

@section('content')
    <form action="/tag/update" method="POST">
        <input type="hidden" name="id" value="{{ $tag->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $tag->slug }}">
        </div>
        <button type="submit" class="btn btn-primary">Create new tag</button>
    </form>
@endsection
