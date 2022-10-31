@extends('layout')

@section('title', 'List of tag')

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success'])
    @endphp
    <a href="/"></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->posts->pluck('title')->join(', ') }}</td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at }}</td>
                <td>
                    <a href="/tag/{{ $tag->id }}/restore" class="btn btn-primary">Restore</a>
                    <a href="/tag/{{ $tag->id }}/force-delete" class="btn btn-danger">Delete from trash</a>
                </td>
            </tr>
        @empty
            <p>There is nothing yet</p>
        @endforelse
        </tbody>
    </table>
    <a href="/tag/" class="btn btn-primary">Tags list</a>
@endsection