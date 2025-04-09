@extends('layout.app')
@section('main')


<h5><i class="bi bi-plus-square-fill"></i> MECHANICAL EMPLOYEES</h5>
<hr >

<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/mechanical/home">Home</a></li>
        <li class="breadcrumb-item active">Add New Employee</li>
</ol>
</nav>
<div class="col-md-8">
    <form action="/mechanical/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-lable"> Name</lable>
                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif"  
                placeholder="Enter Employee Name" value="{{old('name') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">Invaild name</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-lable"> Email</lable>
                <input type="text" name="email" id="email" class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" 
                placeholder="Enter Email Id" value="{{old('email') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="mobile" class="form-lable"> Mobile no</lable>
                <input type="text" name="mobile" id="mobile" class="form-control @if($errors->has('mobile')) {{'is-invalid'}} @endif" 
                placeholder="Enter Mobile no" value="{{old('mobile') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">Invaild mobile</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="age" class="form-lable"> Age</lable>
                <input type="text" name="age" id="age" 
                class="form-control @if($errors->has('age')) {{'is-invalid'}} @endif" 
                placeholder="Enter Age" value="{{old('age') }}"/>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="image" class="form-lable"> Employee Image</lable>
                <input type="file" name="image" id="image" class="form-control @if($errors->has('image')) {{'is-invalid'}} @endif" />
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-dark">Submit</button>
            <button type="reset" class="btn btn-danger">Clear All</button>
</div>
</form>
</div>

@endsection