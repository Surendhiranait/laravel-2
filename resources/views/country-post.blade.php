@extends('layout.app')
@section('main')
<div>
<h1>Post from {{ $country->name }}</h1>

@if($country->post)
    <h2>{{ $country->post->title }}</h2>
    <p>{{ $country->post->content }}</p>
    <small>By {{ $country->post->user->name }}</small>
@else
    <p>No post found for this country.</p>
@endif
</div>
@endsection