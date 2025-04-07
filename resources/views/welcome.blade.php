@extends('layout.app')
@section('main')

<h5><i class="bi bi-plus-square-fill"></i> Add New Employee</h5>
<hr >

<nav class="my-3">
    <ol class="breadcrumb">
     <!--   <li class="breadcrumb-item"><a href="/">Home</a></li>-->
        <li class="breadcrumb-item active">Add New Employee</li>
</ol>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display Error Message -->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-8">
    <form action="/employee/register" method="POST" enctype="multipart/form-data">
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
                placeholder="Enter email" value="{{old('email') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-lable"> Password</lable>
                <input type="text" name="password" id="password" class="form-control @if($errors->has('password')) {{'is-invalid'}} @endif" 
                placeholder="Enter Password" value="{{old('password') }}"/>
            </div>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-dark">Submit</button>
            <button type="reset"  class="btn btn-danger"><a style="text-decoration: none; color: white;" href="{{url('login')}}" >Login</a><button>
</div>
</form>
</div>

@endsection