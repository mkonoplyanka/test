@extends('layout')

@section('title', 'Data about your tag')

@section('content')
    <h1>{{ $tag->title }}</h1>
    <ul>
        <li>Slug: {{ $tag->slug }}</li>
        <li>Created: {{ $tag->created_at }}</li>
        <li>Updated: {{ $tag->updated_at }}</li>
    </ul>
@endsection
