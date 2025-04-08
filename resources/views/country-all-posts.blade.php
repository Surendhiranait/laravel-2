@extends('layout.app')
@section('main')
<div>
<h1>All Posts from {{ $country->name }}</h1>

@if($country->posts->count())
    @foreach($country->posts as $post)
        <div style="margin-bottom: 20px;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>By {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small>
        </div>
    @endforeach
@else
    <p>No posts found for this country.</p>
@endif
</div>
@endsection