@extends('layout.app')
@section('main')

<h5><i class="bi bi-pencil-square"></i> Employee Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/civil/home">Home</a></li>
    <li class="breadcrumb-item active">View Employee</li>
</ol>
</nav>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-bold">{{ $civilemployee->name }}</h5>
        <p class="card-text text-secondary">{{ $civilemployee->age }}</p>
        <p class="fw-semibold">Email: <small class="text-success">{{ $civilemployee->email }}</small></p>
        <p class="fw-semibold">Mobile no: <small class="text-success">{{ $civilemployee->mobile }}</small></p>
        <p class="fw-semibold">Location: <small class="text-success">{{ $civilemployee->location }}</small></p>
</div>
</div>


@endsection