@extends('layout.app')
@section('main')

<h5>CIVIL EMPLOYEES</h5>
<hr >
<div class='d-flex justifycontent-between'>
    <h5 class="m-1"><i class="bi bi-journal-richtext "></i>Employee Details</h5>
    <a  class="m-1" href="{{url('civil/create')}}" class="btn btn-primary"> <i class="bi bi-plus-circle"></i>Add New Employee</a>
    @unless(auth()->user()->role === 'civil')
    <a  class="m-1" href="{{url('home')}}" class="btn btn-dark"> <i class="bi bi-plus-circle"></i>Back to home</a>
    @endunless
    @unless(auth()->user()->role === 'admin')
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger m-1">Logout</button>
</form>
@endunless
</div>

<div class="col-md-12 table-responsible mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Employee Name</th>
                <th>Image</th>
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
                <td><img src="{{ Storage::url($employee->image_path) }}" style="width: 50px; height: 50px; object-fit: contain" alt="Employee" /></td>
                <td>{{$employee->email }}</td>
                <td>{{$employee->mobile }}</td>
                <td>{{$employee->age }}</td>
                <td>{{$employee->location }}</td>
                
                <td>
                    <a href="{{url('civil/'.$employee->id.'/show')}}" class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                <!--    <a href="{{url('civil/'.$employee->id.'/delete')}}" onclick="return confirm('Are You sure you want to delete this employee?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
-->             @can('delete', $employee)
                    <!-- Admins will see active delete button -->
                    <a href="{{ url('civil/'.$employee->id.'/delete') }}"
                    onclick="return confirm('Are you sure you want to delete this employee?')"
                    class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                    </a>
                @else
                    <!-- Civil role: show disabled button -->
                    <button class="btn btn-danger btn-sm" disabled title="Access restricted for civil role">
                        <i class="bi bi-trash"></i>
                    </button>
                @endcan
                
            </td>
</tr>
@endforeach


@endsection