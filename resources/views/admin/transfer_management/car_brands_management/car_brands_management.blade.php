@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">CarBrands Management</h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New CarBrands
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New CarBrands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('CreateNewCarBrands')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="car_brand_name" class="form-label" style="font-size: 20px;">CarBrands Name</label>
                        <input type="text" class="form-control" id="car_brand_name" name="car_brand_name" required>
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
            <th>Brand Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carbrand as $brand)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> <a href="{{ route('CarModelManagement', $brand->id) }}">
                    {{ $brand->car_brand_name }}
                </a>
            </td>
            <td>{{ $brand->created_at }}</td>
            <td>{{ $brand->updated_at }}</td>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
