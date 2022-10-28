@extends('layout')

@section('title', 'Data about your post')

@section('content')
    <h1>{{ $category->title }}</h1>
    <ul>
        <li>Slug: {{ $category->slug }}</li>
        <li>Created: {{ $category->created_at }}</li>
        <li>Updated: {{ $category->updated_at }}</li>
    </ul>
@endsection
