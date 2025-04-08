@extends('layout.app')
@section('main')

<h5>CIVIL EMPLOYEES</h5>
<hr >
<div class='d-flex justifycontent-between'>
    <h5 class="m-1"><i class="bi bi-journal-richtext "></i>Employee Details</h5>
    <a  class="m-1" href="{{url('civil/create')}}" class="btn btn-primary"> <i class="bi bi-plus-circle"></i>Add New Employee</a>
    <a  class="m-1" href="{{url('home')}}" class="btn btn-dark"> <i class="bi bi-plus-circle"></i>Back to home</a>
</div>

<div class="col-md-12 table-responsible mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Age</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($civilemployees as $employee)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $employee->name }}</a></td>
                <td>{{$employee->email }}</td>
                <td>{{$employee->mobile }}</td>
                <td>{{$employee->age }}</td>
                <td>{{$employee->location }}</td>
                <td>
                    <a href="{{url('civil/'.$employee->id.'/show')}}" class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{url('civil/'.$employee->id.'/delete')}}" onclick="return confirm('Are You sure you want to delete this employee?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </td>
</tr>
@endforeach


@endsection