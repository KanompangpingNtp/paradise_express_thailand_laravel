@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">Route Details for <span style="color: black;">{{ $route->route_name }}</span></h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New Route Details
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Route Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('CreateNewRoutesDetails', $route->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="route_detail_name" class="form-label" style="font-size: 20px;">Route Detail Name</label>
                        <input type="text" class="form-control" id="route_detail_name" name="route_detail_name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Route Detail Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($routes_details as $route_detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $route_detail->route_detail_name }}</td>
            <td>{{ $route_detail->created_at }}</td>
            <td>{{ $route_detail->updated_at }}</td>
            <td class="text-center">
                <form action="{{ route('deleteRouteDetail', $route_detail->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
