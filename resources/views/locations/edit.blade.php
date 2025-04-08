@extends('layout.app')
@section('main')

<div>
    <h1>Edit Location</h1>
    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row mb-3">
        <div class="col-md-3">  
        <label class="form-lable" for="city">City:</label>
        <input class="form-control" type="text" name="city" id="city" value="{{ $location->city }}" required></div>
        </div>
        <div class="row mb-3">
        <div class="col-md-3">  
        <label class="form-lable" for="state">State:</label>
        <input class="form-control" type="text" name="state" id="state" value="{{ $location->state }}" required></div>
        </div>
        <div class="row mb-3">
        <div class="col-md-3">  
        <label class="form-lable" for="country">Country:</label>
        <input class="form-control" type="text" name="country" id="country" value="{{ $location->country }}" required></div>
        </div>
        <div class="row mb-3">
        <div class="col-md-3">  
        <button class="btn btn-dark" type="submit">Update Location</button></div>
        </div>
    </form>
    <a href="{{ route('locations.index') }}">Back to Locations</a>

    </div>
    @endsection