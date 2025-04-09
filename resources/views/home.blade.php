@extends('layouts.app')

@section('content')
<div class="container">
    @can('access-admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <hr >
            <div class="col-md-8">
                <button type="submit" class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('civil/home')}}" >Civil Employee</a></button>
                <button type="submit" class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('civilIntern/home')}}" >Civil Interns</a></button>
                <button type="submit"  class="btn btn-dark"><a style="text-decoration: none; color: white;" href="{{url('mechanical/home')}}" >Mechanical Employee</a></button>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
