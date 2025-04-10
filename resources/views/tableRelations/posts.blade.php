@extends('layout.app')
@section('main')
<div>

<h1> One to Many (Inverse) / Belongs To:</h1> 
<hr >
<h3>All Posts</h3>

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