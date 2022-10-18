@extends('layout')

@section('title', 'List of categories')

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
        @forelse($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="/public/categories/update-category.php?id={{ $category->id }}" class="btn btn-primary">
                        Update category
                    </a>
                    <a href="/public/categories/delete-category.php?id={{ $category->id }}" class="btn btn-danger">
                        Delete category
                    </a>
                </td>
            </tr>
            @empty
                <p>There is nothing yet</p>
        @endforelse
        </tbody>
    </table>
    <a href="/public/categories/create-category.php" class="btn btn-primary">Add new category</a>
@endsection