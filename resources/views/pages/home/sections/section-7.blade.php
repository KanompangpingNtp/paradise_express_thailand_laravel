<style>
    .bg-page7 {
        background-image: url('{{ asset('images/footer.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .bg-yuk {
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
        box-shadow: 5px 5px 1rem rgba(0, 0, 0, 0.8);
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
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('images/yuk.jpg') }}" alt="yuk" class="bg-yuk">
        <div class="bg-page7 d-flex w-100 py-5">
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
    </div>

</main>
