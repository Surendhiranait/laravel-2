
@extends('layout.app')
@section('main')

<div>
<div class='d-flex justifycontent-between'>
    <h5 class="m-1">Locations</h5>
    <a class="m-1 btn btn-primary" href="{{ route('locations.create') }}">Add Location</a>
</div>
    <table class="table table-bordered" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->state }}</td>
                <td>{{ $location->country }}</td>
                <td>
                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-dark btn-sm">Edit</a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
