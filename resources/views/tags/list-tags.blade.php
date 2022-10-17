@extends('layout')

@section('title', 'List of tags')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">To change</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at }}</td>
                <td>
                    <a href="/public/tags/update-tag.php?id={{ $tag->id }}" class="btn btn-primary">Update tag</a>
                    <a href="/public/tags/delete-tag.php?id={{ $tag->id }}" class="btn btn-danger">Delete tag</a>
                </td>
            </tr>
        @empty
            <p>There is nothing yet</p>
        @endforelse
        </tbody>
    </table>
@endsection