@extends('layout.app')
@section('main')

<h5><i class="bi bi-plus-square-fill"></i> Employee Login</h5>
<hr >

<nav class="my-3">
    <ol class="breadcrumb">
     <!--   <li class="breadcrumb-item"><a href="/">Home</a></li>-->
        <li class="breadcrumb-item active">Employee Login</li>
</ol>
</nav>
<div class="col-md-8">
    <form action="/employee/login" method="POST" enctype="multipart/form-data">
        @csrf
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
            <button type="reset" class="btn btn-danger">Clear All</button>
</div>
</form>
</div>

@endsection