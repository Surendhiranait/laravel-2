@extends('layout.app')
@section('main')

<h5><i class="bi bi-pencil-square"></i> Employee Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/mechanical/home">Home</a></li>
    <li class="breadcrumb-item active">View Employee</li>
</ol>
</nav>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-bold">{{ $mechanicalemployee->name }}</h5>
        <p class="card-text text-secondary">{{ $mechanicalemployee->age }}</p>
        <p class="fw-semibold">Email: <small class="text-success">{{ $mechanicalemployee->email }}</small></p>
        <p class="fw-semibold">Mobile no: <small class="text-success">{{ $mechanicalemployee->mobile }}</small></p>
</div>
</div>


@endsection