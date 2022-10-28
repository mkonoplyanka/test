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
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="/category/{{ $category->id }}/edit" class="btn btn-primary">Update category</a>
                    <a href="/category/{{ $category->id }}/delete" class="btn btn-danger">Delete category</a>
                    <a href="/category/{{ $category->id }}/show" class="btn btn-info">Show</a>
                </td>
            </tr>
            @empty
                <p>There is nothing yet</p>
        @endforelse
        </tbody>
    </table>
    <a href="/category/create" class="btn btn-primary">Add new category</a>
@endsection