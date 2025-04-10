@extends('layout.app')
@section('main')

<h5><i class="bi bi-pencil-square"></i> Intern Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/civilIntern/home">Home</a></li>
    <li class="breadcrumb-item active">View Intern</li>
</ol>
</nav>
<div class="d-flex justify-content-center align-self-baseline" style="min-height: 60vh;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold">{{ $civilintern->name }}</h5>
            <p class="card-text text-secondary">{{ $civilintern->age }}</p>
            <p class="fw-semibold">Mobile no: <small class="text-success">{{ $civilintern->mobile }}</small></p>
            <p class="fw-semibold">Email: <small class="text-success">{{ $civilintern->email }}</small></p>
            <p class="fw-semibold">City: <small class="text-success">{{ $civilintern->city }}</small></p>
            <p class="fw-semibold">State: <small class="text-success">{{ $civilintern->state }}</small></p>
            <p class="fw-semibold">Country: <small class="text-success">{{ $civilintern->country }}</small></p>
        </div>
    </div>
</div>

@endsection