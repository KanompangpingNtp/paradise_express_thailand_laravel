@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">Connect Line</h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create Links
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Links</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('CreateNewRouteTotalDetails') }}" method="POST" style="font-size: 16px;">
                    @csrf
                    <div class="form-group">
                        <label for="route_detail_id">Select Route Detail:</label>
                        <select name="route_detail_id" id="route_detail_id" class="form-control" style="font-size: 16px;" required>
                            <option value="" disabled selected>-- Select Route Detail --</option>
                            @foreach($provinces as $province)
                                <optgroup label="{{ $province->province_name }}">
                                    @foreach($province->routes as $route)
                                        <optgroup label="-- {{ $route->route_name }} --">
                                            @foreach($route->routeDetails as $routeDetail)
                                                <option value="{{ $routeDetail->id }}">
                                                    {{ $province->province_name }} - {{ $route->route_name }} - {{ $routeDetail->route_detail_name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="car_model_id">Select Car Model:</label>
                        <select name="car_model_id" id="car_model_id" class="form-control" style="font-size: 16px;" required>
                            <option value="">-- Select Car Model --</option>
                            @foreach($carBrands as $carBrand)
                                <optgroup label="{{ $carBrand->car_brand_name }}">
                                    @foreach($carBrand->carModels as $carModel)
                                        <option value="{{ $carModel->id }}">
                                            {{ $carBrand->car_brand_name }} - {{ $carModel->car_model_name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label for="data_price">Price:</label>
                        <input type="number" name="data_price" id="data_price" class="form-control" required min="0">
                    </div>
                    <br>
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
        <tr class="text-center">
            <th>#</th>
            <th>Province Name</th>
            <th>Route Name</th>
            <th>Route Detail Name</th>
            <th>Brand Car</th>
            <th>Car Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($routeTotals as $key => $routeTotal)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $routeTotal->routeDetail->route->province->province_name ?? '-' }}</td>
                <td>{{ $routeTotal->routeDetail->route->route_name ?? '-' }}</td>
                <td>{{ $routeTotal->routeDetail->route_detail_name ?? '-' }}</td>
                <td>{{ $routeTotal->carModel->carBrand->car_brand_name ?? '-' }}</td>
                <td>{{ $routeTotal->carModel->car_model_name ?? '-' }}</td>
                <td>{{ number_format($routeTotal->data_price, 2) }}</td>
                <td>
                    {{-- <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
