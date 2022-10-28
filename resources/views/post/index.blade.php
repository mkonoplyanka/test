@extends('layout')

@section('title', 'List of posts')

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success'])
    @endphp
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Tags</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-primary">Update post</a>
                    <a href="/post/{{ $post->id }}/delete" class="btn btn-danger">Delete post</a>
                    <a href="/post/{{ $post->id }}/show" class="btn btn-info">Show</a>
                </td>
            </tr>
        @empty
            <p>There is nothing yet</p>
        @endforelse
        </tbody>
    </table>
    <a href="/post/create" class="btn btn-primary">Add new post</a>
@endsection