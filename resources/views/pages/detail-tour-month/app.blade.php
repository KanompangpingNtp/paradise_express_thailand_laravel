@extends('layout.app')
@section('title', 'Tour all month')
@section('content')
<style>
    .bg-page1 {
        background-image: url('{{ asset('images/HeroSection/toppic.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 65vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
        width: 100%;
    }

    .highlight-section {
        font-size: 16px;
        font-weight: bold;
        text-decoration: underline;
        color: #333;
    }

    .highlight-items {
        font-size: 12px;
        color: #555;
    }

    .btn-view-all {
        color: #000;
        padding: 10px 20px;
        /* เพิ่มพื้นที่ภายในปุ่ม */
        border: none;
        /* ลบเส้นขอบ */
        border-radius: 5px;
        /* มุมโค้ง */
        text-transform: uppercase;
        /* ตัวอักษรเป็นพิมพ์ใหญ่ */
        font-size: 18px;
        /* ขนาดฟอนต์ */
        letter-spacing: 4px;
        text-align: center;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงที่ลื่นไหล */
        cursor: pointer;
        /* เปลี่ยนเมาส์เป็น pointer */
    }

    .btn-view-all:hover {
        background-color: rgba(0, 0, 0, 0.5);
        /* เปลี่ยนพื้นหลังเป็นสีขาวโปร่งแสง */
        color: #fff;
        /* ตัวอักษรสีขาว */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        /* เพิ่มเงาเมื่อ hover */
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงที่ลื่นไหล */
    }

    .card i {
        color: #ff5722;
    }

    .card:hover {
        transform: translateY(-10px);
        /* ยกการ์ดขึ้น */
        box-shadow: 0 10px 13px rgba(0, 0, 0, 0.6);
        /* เพิ่มเงา */
    }

    .card:hover .highlight-section {
        color: #ff5722;
        /* เปลี่ยนสีของ HIGHLIGHT */
    }

    .card:hover img {
        filter: brightness(0.8);
        /* ทำให้รูปภาพมืดลงเล็กน้อย */
    }

    .bg-page7 {
        background-image: url('{{ asset('images/footer.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.8);
        z-index: 2;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .logo-footer {
        width: 18rem;
        hight: 18rem;
    }

    @media (max-width: 765px) {
        .logo-footer {
            width: 10rem;
            hight: 10rem;
        }

    }

    .carousel-inner img {
        height: 500px;
        /* ความสูงของภาพ */
        object-fit: cover;
        /* ทำให้ภาพครอบคลุมพื้นที่ */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.6);
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        background-color: rgba(231, 231, 231, 0.9);
    }

    .carousel-control-prev,
    .carousel-control-next {
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
    }

    .carousel-control-prev-icon::before,
    .carousel-control-next-icon::before {
        font-size: 30px;
        font-weight: bold;
    }

    .carousel-control-prev {
        left: -20px;
    }

    .carousel-control-next {
        right: -20px;
    }

    @media (max-width: 768px) {

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 40px;
            height: 40px;
        }

        .carousel-control-prev-icon::before,
        .carousel-control-next-icon::before {
            font-size: 20px;
        }

    }

    .bg-detail-tour {
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 20px;
    }

    .tab-links:not(.active) {
        background-color: #f8f9fa;
        /* สีพื้นหลังของแท็บที่ไม่ได้ active */
        color: #6c757d;
        /* สีข้อความของแท็บที่ไม่ได้ active */
    }

    .tab-links:not(.active):hover {
        background-color: #e9ecef;
        /* สีพื้นหลังเมื่อโฮเวอร์ */
        color: #495057;
        /* สีข้อความเมื่อโฮเวอร์ */
    }

</style>
<!-- Content Section -->
<main>
    <div class="bg-page1 d-flex">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center text-uppercase">
                <div class="fw-bold fs-2" style="letter-spacing: 5px;">
                    detail tour name
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column flex-lg-row justify-content-center align-items-start my-5 gap-5">
        <!-- ภาพสไลด์และแท็บ -->
        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-center ">
            <!-- ภาพสไลด์ -->
            <div class="container rounded shadow">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($tourdetails->images->whereIn('tour_image_status', [1, 2]) as $index => $image)
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        @foreach ($tourdetails->images->whereIn('tour_image_status', [1, 2]) as $index => $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->tour_image_files) }}" class="d-block w-100" alt="Tour Image {{ $index + 1 }}">
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Tab -->
            <ul class="nav nav-tabs w-100 mt-5 border border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-links active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true"><i class="fa-solid fa-file me-2"></i>Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-links" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false"><i class="fa-solid fa-file me-2"></i>Tour Details and Cost</button>
                </li>
            </ul>
            <div class="tab-content w-100 rounded shadow" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <div>
                            <i class="fa-solid fa-circle-info fs-4 me-2"></i><span class="fs-3">Overview</span>
                        </div>
                        <div class="text-muted">
                            <span class="me-5"></span>{{ $tourdetails->tour_detail }}
                        </div>
                        <div class="bg-detail-tour w-100 p-4 mt-3">
                            <h5><i class="fa-solid fa-star me-2"></i>Highlight</h5>
                            <ul class="list-unstyled mt-3" style="padding-left: 1.5rem;">
                                @foreach ($tourdetails->highlights as $highlight)
                                    <li class="mb-2">
                                        <i class="fa-solid fa-star me-2"></i>
                                        {{ $highlight->tour_highlight_detail }}
                                    </li>
                                @endforeach

                                @if ($tourdetails->highlights->isEmpty())
                                    <li class="mb-2">
                                        <i class="fa-solid fa-star me-2"></i>
                                        No Highlights Available
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade p-3" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <div class="w-100">
                            <i class="fa-solid fa-file-lines fs-4 me-2"></i><span class="fs-3">Tour Details and Cost</span>
                            <div>
                                @if ($tourdetails->pdfs->isNotEmpty())
                                @foreach ($tourdetails->pdfs as $pdf)
                                <iframe src="{{ asset('storage/' . $pdf->tour_pdf_file) . '#zoom=90' }}" width="100%" height="600px" class="mt-3">
                                    Your browser does not support PDFs.
                                </iframe>

                                @endforeach
                                @else
                                <p>No PDFs available for this tour.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Input -->
        <div class="col-12 col-lg-4 d-flex flex-column justify-content-center align-items-center border-bottom p-4 rounded shadow ">
            <div class="mb-3 w-100">
                <div class="fw-bold fs-4 border-bottom text-uppercase mb-2" style="letter-spacing: 1px;">
                    name tour
                </div>
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <!-- Tour Date -->
                    <div class="w-50">
                        <label for="inputText" class="form-label"><i class="fa-regular fa-calendar-days me-2"></i>Tour
                            Date</label>
                        <input type="date" class="form-control " id="inputText" placeholder=" Number of Adults">
                    </div>

                    <!-- Dropdown -->
                    <div class="dropdown dropdown-menu-end d-flex flex-column justify-content-center align-items-end w-50">
                        <label for="inputText" class="form-label my-1 mx-1">Number People</label>
                        <button class="btn btn-dark dropdown-toggle w-100" type="button" id="dropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-users"></i> X 0
                        </button>
                        <ul class="dropdown-menu p-3" style="min-width: 250px;">
                            <li class="mb-2">
                                <label for="adultCount" class="form-label my-2 mx-1">Adults</label>
                                <input type="number" class="form-control" id="adultCount" placeholder="Number of Adults" min="0">
                            </li>
                            <li>
                                <label for="childCount" class="form-label my-2 mx-1">Children</label>
                                <input type="number" class="form-control" id="childCount" placeholder="Number of Children" min="0">
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
                    <label for="inputText" class="form-label my-2 mx-1"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="w-100">
                    <label for="inputText" class="form-label my-2 mx-1"><i class="fa-solid fa-phone me-2"></i>Phone
                        Number</label>
                    <input type="text" class="form-control" id="phonnumber" placeholder="Phone Number">
                </div>
            </div>
            <button class="btn btn-dark w-100"><i class="fa-regular fa-address-book me-2"></i>Reserve Now</button>
        </div>
    </div>
    <div class="bg-page7 d-flex w-100 py-4 ">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center w-100 gap-3">
            <img src="{{ asset('images/logo_edited.avif') }}" alt="logo" class="logo-footer">
            <div class="d-flex flex-column justify-content-center align-items-start">
                <div>
                    <span class="fw-bold fs-5">Paradise Express</span> <br>
                    <span class="text-muted">
                        41/147 Moo 6, Sainoi Sub-district, <br>
                        Sainoi District, Nonthaburi province <br>
                        11150 THAILAND
                    </span>
                </div>
                <div>
                    <span class="fw-bold fs-5">Contact Us</span> <br>
                    <span class="text-muted">
                        <img src="{{ asset('images/telephone-icon.png') }}" alt="telephone" width="35" height="35"> Telephone <img src="{{ asset('images/whatapp.png') }}" alt="whatapp" width="50" height="50"> Whatapp<br>
                        Within Thhailand: Mobile: 098-459-6582 <br>
                        Oversea Call: Mobile: +66 98-459-6582
                    </span>
                </div>
                <div>
                    <span class="fw-bold fs-5">About Us</span>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('images/QR_Fb-removebg-preview.png') }}" alt="fb" width="180" height="150">
                <a href="https://web.facebook.com/paradiseexpress56/" class="text-decoration-none text-black" target="_blank" style="font-size: 18px;">Facebook</a>
                <img src="{{ asset('images/46.jpg') }}" alt="fb" width="140" height="120">
                <a href="#" class="text-decoration-none text-black" target="_blank" style="font-size: 18px;">@paradiseexpress</a>
            </div>
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
