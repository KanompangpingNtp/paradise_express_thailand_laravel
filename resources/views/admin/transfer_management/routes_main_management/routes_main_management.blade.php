@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">Routes Main Management for <span style="color: black;">{{ $province->province_name }}</span></h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New Routes
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Routes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for creating new route -->
                <form action="{{ route('CreateNewRoutes', $province->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="route_name" class="form-label" style="font-size: 20px;">Route Name</label>
                        <input type="text" id="route_name" name="route_name" class="form-control" required>
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
            <th>Route Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($routes as $route)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{ route('RoutesDetails', $route->id) }}">
                    {{ $route->route_name }}
                </a>
            </td>
            <td>{{ $route->created_at }}</td>
            <td>{{ $route->updated_at }}</td>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
