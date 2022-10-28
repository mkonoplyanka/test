@extends('layout')

@section('title', 'Data about your category')

@section('content')
    <h1>{{ $post->title }}</h1>
    <ul>
        <li>Slug: {{ $post->slug }}</li>
        <li>Body: {{ $post->body }}</li>
        <li>Category: {{ $category->title }}</li>
        <li>Created: {{ $post->created_at }}</li>
        <li>Updated: {{ $post->updated_at }}</li>
    </ul>
@endsection