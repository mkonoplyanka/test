@extends('layout')

@section('title', 'Update category')

@section('content')
    <form action="/post/update" method="POST">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">New title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">New slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">New body</label>
            <input type="text" class="form-control" id="body" name="body" value="{{ $post->body }}">
            @isset($_SESSION['errors']['body'])
                @foreach($_SESSION['errors']['body'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option @if($category->id == $post->category_id) selected @endif
                    value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['category_id'])
                @foreach($_SESSION['errors']['category_id'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif
                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['tags'])
                @foreach($_SESSION['errors']['tags'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Update this post</button>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection