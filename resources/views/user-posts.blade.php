@extends('layout.app')
@section('main')
<div>
<h1>Posts by {{ $user->name }}</h1>

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