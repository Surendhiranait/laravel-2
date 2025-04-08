@extends('layout.app')
@section('main')

<h5>Welcome</h5>
<hr >



<div class="col-md-8">
    <button type="submit" class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('civil/home')}}" >Civil Employee</a></button>
    <button type="submit" class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('civilIntern/home')}}" >Civil Interns</a></button>
    <button type="submit"  class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('mechanical/home')}}" >Mechanical Employee</a></button>
</div>

@endsection