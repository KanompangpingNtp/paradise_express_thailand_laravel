@extends('layout.app')
@section('title', 'Paradise express Contact')
@section('content')
    <style>
        .bg-contact {
            background-image: url('{{ asset('images/contact/marcom-contact-bg-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            padding:7rem 0rem;
            /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
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

            <div class="bg-data d-flex flex-column justify-content-center align-items-center border-bottom p-4 rounded">
                @if (session('line_status'))
                    <script>
                        Swal.fire({
                            icon: '{{ session('line_status.type') }}',
                            title: '{{ session('line_status.message') }}',
                            text: '{{ session('line_status.text') }}',
                            confirmButtonText: 'ตกลง',
                        }).then(() => {
                            @if (session('line_status.type') === 'success')
                                // ถ้าสำเร็จ ให้ซ่อนฟอร์มและแสดงข้อความ
                                document.getElementById('tourForm').style.display = 'none';
                                document.getElementById('formSuccessMessage').classList.remove('d-none');
                            @else
                                // ถ้าเกิด error ให้แสดง div ข้อความ error
                                document.getElementById('formErrorMessage').classList.remove('d-none');
                            @endif
                        });
                    </script>
                @endif

                <form id="tourForm" method="POST" action="{{ route('line.sendCustomize') }}" class="w-100">
                    @csrf
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold fs-2 border-5 border-dark border-start text-uppercase px-3 py-2 my-3"
                                style="letter-spacing: 1px;">
                                contact
                            </div>
                            <div class="text-muted text-end " style="font-size: 14px;">
                                WhatsApp: 098-459-6582 <br>
                                Oversea Call: +66 98-459-6582 <br>
                                Telephone: 098-459-6582(Within Thailand)
                            </div>
                        </div>
                        <input type="hidden" name="tour_name" value="Contact">
                        <!-- Tour Date -->
                        <div class="mb-2">
                            <label class="form-label">Tour Date</label>
                            <input type="date" class="form-control" name="tour_date" id="tour_date" required>
                            <div class="text-danger small" id="error-tour_date"></div>
                        </div>

                        <!-- Adults / Children -->
                        <div class="d-flex gap-2 mb-2">
                            <div class="w-50">
                                <label class="form-label">Adults</label>
                                <input type="number" class="form-control" name="adults" min="0" required>
                                <div class="text-danger small" id="error-adults"></div>
                            </div>
                            <div class="w-50">
                                <label class="form-label">Children</label>
                                <input type="number" class="form-control" name="children" min="0" required>
                                <div class="text-danger small" id="error-children"></div>
                            </div>
                        </div>
                        <!-- Full Name -->
                        <div class="mb-2">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" required>
                            <div class="text-danger small" id="error-fullname"></div>
                        </div>

                        <!-- Email -->
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="text-danger small" id="error-email"></div>
                        </div>

                        <!-- Phone -->
                        <div class="mb-2">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                            <div class="text-danger small" id="error-phone"></div>
                        </div>
                        <!-- Message -->
                        <div class="mb-2">
                            <label for="message" class="form-label my-2 mx-1">
                                <i class="fa-solid fa-file-contract me-2"></i>Message
                            </label>
                            <textarea class="form-control" id="message" name="message" placeholder="Message" rows="4" required></textarea>
                            <div class="text-danger small" id="error-message"></div>
                        </div>

                    </div>
                    <button class="btn btn-dark w-100" id="submitBtn"><i
                            class="fa-solid fa-circle-check me-2"></i>Confirm</button>

                </form>
                <div id="formSuccessMessage"
                    class="d-none alert alert-success d-flex flex-column align-items-start gap-2  mt-2">
                    <strong>Thank you for your Contact!</strong>
                    <span>We’ve received your booking details and will get in touch with you shortly.</span>
                    <a class="btn btn-success mt-2" href="{{ route('HomeIndex') }}">Return to Homepage</a>
                </div>
                <div id="formErrorMessage" class="alert alert-danger d-none mt-2">
                    <strong> Customize failed.</strong>
                    <span>Please try again later or contact support.</span>
                </div>
            </div>
    </main>
    <script>
        const form = document.getElementById('tourForm');
        const inputs = form.querySelectorAll('input, textarea');
        const submitBtn = document.getElementById('submitBtn');

        function validateForm() {
            let isValid = true;

            inputs.forEach(input => {
                const errorElem = document.getElementById('error-' + input.name);

                if (errorElem) {
                    if (!input.value || (input.type === 'number' && input.value < 0)) {
                        isValid = false;
                        errorElem.textContent = input.name === 'adults' || input.name === 'children' ?
                            'Must be 0 or greater' :
                            'This field is required';
                    } else {
                        errorElem.textContent = ''; // Clear error message if valid
                    }

                    // Optional: validate email format
                    if (input.name === 'email' && input.value) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(input.value)) {
                            isValid = false;
                            errorElem.textContent = 'Invalid email format';
                        }
                    }

                    // Check if textarea is empty
                    if (input.name === 'message' && input.value.trim() === '') {
                        isValid = false;
                        errorElem.textContent = 'Message is required';
                    }
                }
            });

            submitBtn.disabled = !isValid;
        }

        inputs.forEach(input => {
            input.addEventListener('input', validateForm);
        });

        form.addEventListener('submit', function(e) {
            validateForm();
            if (submitBtn.disabled) {
                e.preventDefault();
            }
        });

        // Initial validation on load
        window.addEventListener('DOMContentLoaded', validateForm);
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const dateInput = document.getElementById('tour_date');
            const today = new Date();
            today.setDate(today.getDate() + 1); // เพิ่ม 1 วัน = พรุ่งนี้

            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // เดือนเริ่มจาก 0
            const dd = String(today.getDate()).padStart(2, '0');

            const minDate = `${yyyy}-${mm}-${dd}`;
            dateInput.min = minDate;
        });
    </script>


@endsection
