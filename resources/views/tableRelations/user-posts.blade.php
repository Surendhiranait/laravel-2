@extends('layout.app')
@section('main')
<div>
<h1>One to Many / Has Many :</h1> 
<hr >
<h3>Posts by {{ $user->name }}</h3>

<ul>
    @foreach($user->posts as $post)
        <li>
            <strong>{{ $post->title }}</strong><br>
            {{ $post->content }}
        </li>
    @endforeach
</ul>
</div>
@endsection