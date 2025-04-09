@extends('layout.app')
@section('main')

<h5><i class="bi bi-pencil-square"></i> Employee Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/mechanical/home">Home</a></li>
    <li class="breadcrumb-item active">View Employee</li>
</ol>
</nav>
<div class="d-flex justify-content-center align-self-baseline" style="min-height: 60vh;">
    <div class="card">
        <div class="card-body">
        <img src="{{ Storage::url($mechanicalemployee->image_path) }}" alt="{{ $mechanicalemployee->name  }}" style="max-width: 200px; max-height: 200px; object-fit: contain;" class="card-img-top" />

            <h5 class="card-title fw-bold">{{ $mechanicalemployee->name }}</h5>
            <p class="card-text text-secondary">{{ $mechanicalemployee->age }}</p>
            <p class="fw-semibold">Email: <small class="text-success">{{ $mechanicalemployee->email }}</small></p>
            <p class="fw-semibold">Mobile no: <small class="text-success">{{ $mechanicalemployee->mobile }}</small></p>
        </div>
    </div>
</div>


@endsection