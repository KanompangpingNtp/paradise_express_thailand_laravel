@extends('layout.app')
@section('title', 'Paradise express Transfer')
@section('content')
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
                        select your route
                    </div>

                    <!-- Select Box -->
                    <select id="routeSelect" class="form-control mb-3">
                        <option value="" disabled selected hidden>Select Route</option>
                        <option value="route1">Route 1</option>
                        <option value="route2">Route 2</option>
                        <option value="route3">Route 3</option>
                    </select>

                    <!-- Confirm Button -->
                    <button id="confirmButton" class="btn btn-dark w-100" style="display:none;">
                        <i class="fa-solid fa-arrow-right me-2"></i>Next
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('routeSelect').addEventListener('change', function() {
            const confirmButton = document.getElementById('confirmButton');
            if (this.value) {
                confirmButton.style.display = 'block';  // Show the confirm button when a route is selected
            } else {
                confirmButton.style.display = 'none';  // Hide the confirm button when no route is selected
            }
        });
    </script>
@endsection
