@extends('layout.app')
@section('main')

<h5>CIVIL INTERNS</h5>
<hr >
<div class='d-flex justifycontent-between'>
    <h5 class="m-1"><i class="bi bi-journal-richtext "></i>Intern Details</h5>
    <a  class="m-1" href="{{url('civilIntern/create')}}" class="btn btn-primary"> <i class="bi bi-plus-circle"></i>Add New Intern</a>
    <a  class="m-1" href="{{url('home')}}" class="btn btn-dark"> <i class="bi bi-plus-circle"></i>Back to home</a>
</div>

<div class="col-md-12 table-responsible mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Interns Name</th>
                <th>Age</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($civilinterns as $interns)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $interns->name }}</a></td>
                <td>{{$interns->age }}</td>
                <td>{{$interns->mobile }}</td>
                <td>{{$interns->email }}</td>
                <td>{{$interns->city }}</td>
                <td>{{$interns->state }}</td>
                <td>{{$interns->country }}</td>
                <td>
                    <a href="{{url('civilIntern/'.$interns->id.'/show')}}" class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{url('civilIntern/'.$interns->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                    <a href="{{url('civilIntern/'.$interns->id.'/delete')}}" onclick="return confirm('Are You sure you want to delete this employee?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
            
                </td>
            </tr>
@endforeach


@endsection