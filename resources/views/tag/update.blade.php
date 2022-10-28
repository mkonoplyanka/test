@extends('layout')

@section('title', 'Update-tag')

@section('content')
    <form action="/tag/update" method="POST">
        <input type="hidden" name="id" value="{{ $tag->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}">
            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $tag->slug }}">
            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="posts" class="form-label">Posts</label>
            <select name="posts[]" id="posts" multiple>
                @foreach($posts as $post)
                    <option @if(in_array($post->id, $tag->posts->pluck('id')->toArray())) selected @endif value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['posts'])
                @foreach($_SESSION['errors']['posts'] as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
