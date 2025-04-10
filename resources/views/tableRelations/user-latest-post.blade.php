@extends('layout.app')
@section('main')
<div>
<h1>Has One of Many:</h1> 
<hr >
<h3>{{ $user->name }}'s Latest Post</h3>

    @if($user->latestPost)
        <div style="margin-bottom: 20px;">
            <h2>{{ $user->latestPost->title }}</h2>
            <p>{{ $user->latestPost->content }}</p>
            <small>Posted on: {{ $user->latestPost->created_at->format('M d, Y') }}</small>
        </div>
    @else
        <p>This user has no posts yet.</p>
    @endif
</div>
@endsection        