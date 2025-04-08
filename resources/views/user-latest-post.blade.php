@extends('layout.app')
@section('main')
<div>
<h1>{{ $user->name }}'s Latest Post</h1>

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