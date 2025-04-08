@extends('layout.app')
@section('main')
<div>
<h1>All Posts</h1>

<ul>
    @foreach($posts as $post)
        <li>
            <strong>{{ $post->title }}</strong><br>
            {{ $post->content }}<br>
            <small>by {{ $post->user->name }}</small>
        </li>
    @endforeach
</ul>
</div>
@endsection