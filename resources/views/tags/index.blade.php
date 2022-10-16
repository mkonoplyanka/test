@extends('layout')

@section('title', 'Home Page')

@section('content')
    <p>{{ $title }}</p>

    <ul>
        @forelse($posts as $post)
            <li>Title: {{ $post->title }} => Slug: {{ $post->slug }}</li>
        @empty
            <p>Empty !!!</p>
        @endforelse
    </ul>
@endsection

@section('footer')
    child footer
@endsection
