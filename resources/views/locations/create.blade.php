@extends('layout.app')
@section('main')

<div>
    <h1>Create New Location</h1>
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
        <div class="col-md-3">       
        <label class="form-lable" for="city">City:</label>
        <input class="form-control" type="text" name="city" id="city" required></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
        <label class="form-lable" for="state">State:</label>
        <input class="form-control" type="text" name="state" id="state" required></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
        <label class="form-lable" for="country">Country:</label>
        <input class="form-control" type="text" name="country" id="country" required></div>
        </div>
        <div class="row mb-3">
        <div class="col-md-12">
        <button class="btn btn-dark" type="submit">Save Location</button></div>
        </div>
    </form>
    <a href="{{ route('locations.index') }}">Back to Locations</a>


</div>
@endsection