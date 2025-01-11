@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">Tour Section Management</h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New Tour Section
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Tour Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('CreateNewTourSection') }}" method="POST" style="font-size: 16px;">
                    @csrf
                    <div class="mb-3">
                        <label for="tour_section_name" class="form-label">Tour Section Name</label>
                        <input type="text" class="form-control" id="tour_section_name" name="tour_section_name" required>
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
            <th>TourSection Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tourSections as $index => $tourSection)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td> <a href="{{ route('TourlistSection', $tourSection->id) }}">
                {{ $tourSection->tour_section_name }}
            </a>
            <td>{{ $tourSection->created_at }}</td>
            <td>{{ $tourSection->updated_at }}</td>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
