@extends('layout.app')
@section('main')
<div>
<h2>All Civil Employees</h2>

@forelse ($civilEmployees as $employee)
    <div style="margin-bottom: 20px; padding: 10px; border-bottom: 1px solid #ccc;">
        <h3>{{ $employee->name }}</h3>
        <p><strong>City:</strong> {{ $employee->location->city ?? 'Not Set' }}</p>
    </div>
@empty
    <p>No employees found.</p>
</div>
@endforelse
@endsection