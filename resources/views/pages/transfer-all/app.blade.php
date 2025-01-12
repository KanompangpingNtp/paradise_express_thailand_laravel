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
    </style>
    <!-- Content Section -->
    <main>
        <div class="bg-page1 d-flex">
            <div class="container d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column justify-content-center align-items-center text-uppercase">
                    <div class="fw-bold fs-2" style="letter-spacing: 5px;">
                        all car in route
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex flex-column justify-content-center align-items-center my-5">
            <div class="mb-4 w-100">
                <form role="search">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="ค้นหา..." aria-label="Search">
                        <button class="btn btn-dark text-uppercase" type="submit"><i class="fa-solid fa-magnifying-glass"></i> search</button>
                    </div>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                @for ($i = 1; $i <= 8; $i++)
                <div class="col">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="card ">
                            <img src="{{ asset("images/card{$i}.jpg") }}" class="card-img-top" alt="Card {{ $i }}">
                            <div class="card-body">
                                <div class="card-title " style="font-size: 18px;">Card Title {{ $i }}</div>
                                <div class="card-text text-muted" style="font-size: 16px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam consequatur suscipit optio inventore? {{ $i }}.</div>
                                <div class="highlight-section mt-3">
                                    HIGHLIGHT
                                </div>
                                <div class="highlight-items mt-2">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fa-regular fa-circle-check me-1"></i>Item1</span>
                                        <span><i class="fa-regular fa-circle-check me-1"></i>Item2</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fa-regular fa-circle-check me-1"></i>Item3</span>
                                        <span><i class="fa-regular fa-circle-check me-1"></i>Item4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>
                @endfor
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
                            <img src="{{ asset('images/telephone-icon.png') }}" alt="telephone" width="35"
                                height="35"> Telephone <img src="{{ asset('images/whatapp.png') }}" alt="whatapp"
                                width="50" height="50"> Whatapp<br>
                            Within Thhailand: Mobile: 098-459-6582 <br>
                            Oversea Call: Mobile: +66 98-459-6582
                        </span>
                    </div>
                    <div>
                        <span class="fw-bold fs-5">About Us</span>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/QR_Fb-removebg-preview.png') }}" alt="fb" width="180"
                        height="150">
                    <a href="https://web.facebook.com/paradiseexpress56/" class="text-decoration-none text-black"
                        target="_blank" style="font-size: 18px;">Facebook</a>
                    <img src="{{ asset('images/46.jpg') }}" alt="fb" width="140" height="120">
                    <a href="#" class="text-decoration-none text-black" target="_blank"
                        style="font-size: 18px;">@paradiseexpress</a>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const cardTextElements = document.querySelectorAll(".card-text");
                cardTextElements.forEach(element => {
                    const maxLength = 60; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
                    const originalText = element.textContent.trim(); // ข้อความต้นฉบับ
                    if (originalText.length > maxLength) {
                        element.textContent = originalText.slice(0, maxLength) +
                        "..."; // ตัดข้อความและเพิ่ม ...
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const cardTitleElements = document.querySelectorAll(".card-title");
                cardTitleElements.forEach(element => {
                    const maxLength = 50; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
                    const originalText = element.textContent.trim(); // ข้อความต้นฉบับ
                    if (originalText.length > maxLength) {
                        element.textContent = originalText.slice(0, maxLength) +
                        "..."; // ตัดข้อความและเพิ่ม ...
                    }
                });
            });
        </script>

        <script>
            // ฟังก์ชันที่ใช้จำกัดข้อความในแต่ละ item
            document.querySelectorAll('.item-text').forEach(function(item) {
                var text = item.textContent;
                if (text.length > 18) {
                    item.textContent = text.slice(0, 18) + '...'; // ตัดข้อความที่เกิน 20 ตัวและเพิ่ม "..."
                }
            });
        </script>
    </main>
@endsection
