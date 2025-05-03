@extends('layout.app')
@section('title', 'Paradise express Transfer')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<style>
    .bg-contact {
        background-image: url('{{ asset('images/Transfer/berlin_bg-1.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }

    .bg-data {
        background-color: rgba(216, 216, 216, 0.8);
        box-shadow: 0 10px 13px rgba(0, 0, 0, 0.6);
        border-radius: 20px;
    }
</style>

<!-- Content Section -->
<main class="bg-contact d-flex">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="bg-data w-50 d-flex flex-column justify-content-center align-items-center border-bottom p-4 rounded">
            <div class="mb-3 w-100">
                <div class="fw-bold fs-2 border-5 border-dark border-start text-uppercase px-3 py-2 my-3" style="letter-spacing: 1px;">
                    Select your route
                </div>

                <!-- Start Form -->
                <form action="{{route('ListCar')}}" method="GET">
                    @csrf

                    <select id="routeSelect" name="route_id" class="form-control mb-3">
                        <option value="" disabled selected hidden>Select Route</option>
                        @foreach($routeTotals as $routeTotal)
                        <option value="{{ $routeTotal->id }}">
                            {{ $routeTotal->routeDetail->route->province->province_name ?? '-' }}
                            {{ $routeTotal->routeDetail->route->route_name ?? '-' }}
                            {{ $routeTotal->routeDetail->route_detail_name ?? '-' }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Confirm Button -->
                    <button id="confirmButton" class="btn btn-dark w-100 mt-3" type="submit" style="display:none;">
                        <i class="fa-solid fa-arrow-right me-2"></i>Next
                    </button>
                </form>

                <script>
                    document.getElementById('routeSelect').addEventListener('change', function () {
                        var confirmButton = document.getElementById('confirmButton');
                        if (this.value !== "") {
                            confirmButton.style.display = 'block';
                        } else {
                            confirmButton.style.display = 'none';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        // Initialize Select2 normally
        $('#routeSelect').select2({
            width: '100%'
        });

        // Show button when a route is selected
        $('#routeSelect').on('select2:select', function (e) {
            $('#confirmButton').show();
        });

        // Optional: Hide the button again if user clears selection (only applies if you use a clear option)
        $('#routeSelect').on('select2:clear', function (e) {
            $('#confirmButton').hide();
        });
    });
</script>


@endsection

