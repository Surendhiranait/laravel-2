@extends('layout.app')
@section('main')


<h5><i class="bi bi-plus-square-fill"></i> CIVIL INTERNS</h5>
<hr >

<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/civilIntern/home">Home</a></li>
        <li class="breadcrumb-item active">Add New Intern</li>
</ol>
</nav>
<div class="col-md-8">
    <form action="{{ url('/civilIntern/' . $civilintern->id . '/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-lable"> Name</lable>
                <input type="text" name="name" value="{{ $civilintern->name }}" id="name" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif"  
                placeholder="Enter Intern Name" />
                @if($errors->has('name'))
                    <div class="invalid-feedback">Invaild name</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="age" class="form-lable"> Age</lable>
                <input type="text" name="age" id="age" value="{{ $civilintern->age }}"
                class="form-control @if($errors->has('age')) {{'is-invalid'}} @endif" 
                placeholder="Enter Age" />
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="mobile" class="form-lable"> Mobile no</lable>
                <input type="text" name="mobile" id="mobile" class="form-control @if($errors->has('mobile')) {{'is-invalid'}} @endif" 
                placeholder="Enter Mobile no" value="{{ $civilintern->mobile }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">Invaild mobile</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-lable"> Email</lable>
                <input type="text" name="email" id="email" class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" 
                placeholder="Enter Email Id" value="{{ $civilintern->email }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div><div class="row mb-3">
            <div class="col-md-6">
                <label for="city" class="form-lable"> City</lable>
                <input type="text" name="city" id="city" class="form-control @if($errors->has('city')) {{'is-invalid'}} @endif" 
                placeholder="Enter City name" value="{{ $civilintern->city }}" />
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('city')}}</div>
                @endif
            </div>
        </div><div class="row mb-3">
            <div class="col-md-6">
                <label for="state" class="form-lable"> State</lable>
                <input type="text" name="state" id="state" class="form-control @if($errors->has('state')) {{'is-invalid'}} @endif" 
                placeholder="Enter State Name" value="{{ $civilintern->state }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('state')}}</div>
                @endif
            </div>
        </div><div class="row mb-3">
            <div class="col-md-6">
                <label for="country" class="form-lable"> Country</lable>
                <input type="text" name="country" id="country" class="form-control @if($errors->has('country')) {{'is-invalid'}} @endif" 
                placeholder="Enter Country Name" value="{{ $civilintern->country }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('country')}}</div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-dark">Update</button>
            <button type="reset" class="btn btn-danger">Clear All<button>
</div>
</form>
</div>

@endsection