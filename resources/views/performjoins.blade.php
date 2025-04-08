@extends('layout.app')
@section('main')
<div>
    <h1>Civil Intern and Employee table joins</h1>

    <table class="table table-bordered" border="1">
        <thead>
            <tr>
                <th>Intern Name</th>
                <th>Intern Email</th>
                <th>Employee Name</th>
                <th>Employee Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($interns as $intern)
                <tr>
                    <td>{{ $intern->civil_intern_name }}</td>
                    <td>{{ $intern->civil_intern_email }}</td>
                    <td>{{ $intern->civil_employee_name }}</td>
                    <td>{{ $intern->civil_employee_email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
