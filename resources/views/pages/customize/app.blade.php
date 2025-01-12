@extends('layout.app')
@section('title', 'Paradise express Customize')
@section('content')
    <style>
    .bg-contact {
        background-image: url('{{ asset('images/customize/map-location-pin.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .bg-data{
        background-color: rgba(216, 216, 216, 0.8);
        box-shadow: 0 10px 13px rgba(0, 0, 0, 0.6);
        border-radius: 20px;
    }

</style>
<!-- Content Section -->
<main class="bg-contact d-flex">
    <div class="container d-flex justify-content-center align-items-center">
        <div
                class="bg-data w-50 d-flex flex-column justify-content-center align-items-center border-bottom p-4 rounded">
                <div class="mb-3 w-100">
                    <div class="fw-bold fs-2 border-5 border-dark border-start text-uppercase px-3 py-2 my-3" style="letter-spacing: 1px;">
                        customize
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <!-- Tour Date -->
                        <div class="w-50">
                            <label for="inputText" class="form-label"><i class="fa-regular fa-calendar-days me-2"></i>Tour
                                Date</label>
                            <input type="date" class="form-control " id="inputText" placeholder=" Number of Adults">
                        </div>

                        <!-- Dropdown -->
                        <div
                            class="dropdown dropdown-menu-end d-flex flex-column justify-content-center align-items-end w-50">
                            <label for="inputText" class="form-label my-1 mx-1">Number People</label>
                            <button class="btn btn-dark dropdown-toggle w-100" type="button" id="dropdownToggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-users"></i> X 0
                            </button>
                            <ul class="dropdown-menu p-3" style="min-width: 250px;">
                                <li class="mb-2">
                                    <label for="adultCount" class="form-label my-2 mx-1">Adults</label>
                                    <input type="number" class="form-control" id="adultCount"
                                        placeholder="Number of Adults" min="0">
                                </li>
                                <li>
                                    <label for="childCount" class="form-label my-2 mx-1">Children</label>
                                    <input type="number" class="form-control" id="childCount"
                                        placeholder="Number of Children" min="0">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-100">
                        <label for="inputText" class="form-label my-2 mx-1"><i class="fa-solid fa-user me-2"></i>Full
                            Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                    </div>
                    <div class="w-100">
                        <label for="inputText" class="form-label my-2 mx-1"><i
                                class="fa-solid fa-envelope me-2"></i>Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="w-100">
                        <label for="inputText" class="form-label my-2 mx-1"><i class="fa-solid fa-phone me-2"></i>Phone
                            Number</label>
                        <input type="text" class="form-control" id="phonnumber" placeholder="Phone Number">
                    </div>
                    <div class="w-100">
                        <label for="message" class="form-label my-2 mx-1">
                            <i class="fa-solid fa-file-contract me-2"></i>Message
                        </label>
                        <textarea class="form-control" id="message" placeholder="Message" rows="4"></textarea>
                    </div>
                    
                </div>
                <button class="btn btn-dark w-100"><i class="fa-solid fa-circle-check me-2"></i>Confirm</button>
            </div>
    </div>
</main>
<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        const adultInput = document.getElementById("adultCount");
        const childInput = document.getElementById("childCount");
        const dropdownToggle = document.getElementById("dropdownToggle");

        const updateTotal = () => {
            const adultCount = parseInt(adultInput.value) || 0;
            const childCount = parseInt(childInput.value) || 0;
            const total = adultCount + childCount;

            // ใช้ innerHTML เพื่อแสดง HTML บนปุ่ม
            dropdownToggle.innerHTML = `<i class="fa-solid fa-users"></i> X ${total}`;
        };

        // Update total whenever input changes
        adultInput.addEventListener("input", updateTotal);
        childInput.addEventListener("input", updateTotal);
    });
</script>


@endsection
