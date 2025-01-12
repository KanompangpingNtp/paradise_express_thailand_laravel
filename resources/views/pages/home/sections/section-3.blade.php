<style>
    .bg-page3 {
        background-image: url('{{ asset('images/AnimtionSection/mapnew2x.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: 5px 5px 1rem rgba(0, 0, 0, 0.8);
        min-height: 60vh;

    }


    video {
        width: 100%;
        /* ขนาดของวิดีโอ */
        height: auto;
        /* รักษาสัดส่วน */
    }

    .menu-img img {
        width: 15rem;
        /* ปรับขนาดปุ่ม */
        height: auto;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .menu-img img:hover {
        transform: scale(1.1);
        /* ขยายขนาดรูปเมื่อ hover */
        opacity: 0.9;
        /* ลดความทึบเมื่อ hover */
    }

    #btn-images-1 {
        margin-left: 7rem;
    }

    #btn-images-2 {
        margin-left: 0rem;
    }

    #btn-images-3 {
        margin-left: 7rem;
    }

    #btn-images-4 {
        margin-left: 15rem;
    }

    @media (max-width: 1120px) {
        #btn-images-1 {
            margin-left: 0rem;
        }

        #btn-images-2 {
            margin-left: 0rem;
        }

        #btn-images-3 {
            margin-left: 0rem;
        }

        #btn-images-4 {
            margin-left: 0rem;
        }

        .menu-img img {
            width: 12rem;
            /* ปรับขนาดปุ่ม */
        }
    }
    @media (max-width: 1120px) {
        .menu-img img {
            width: 10rem;
            /* ปรับขนาดปุ่ม */
        }

        video {
        width: 30rem;
        /* ขนาดของวิดีโอ */
        height: auto;
        /* รักษาสัดส่วน */
    }
    }
    @media (max-width: 720px) {
        .menu-img img {
            width: 80%;
            /* ปรับขนาดปุ่ม */
        }
        video {
        width: 25rem;
        /* ขนาดของวิดีโอ */
        height: auto;
        /* รักษาสัดส่วน */
    }
    }
</style>

<!-- Content Section -->
<main class="bg-page3">
    <div class="container d-flex flex-column flex-lg-row justify-content-center align-items-center">
        <!-- Video Section -->
        <div class="col-6 d-flex justify-content-center align-items-center">
            <video src="{{ asset('video/forN.webm') }}" autoplay loop muted></video> <!-- autoplay, loop, muted -->
        </div>

        <!-- Buttons Section -->
        <div
            class="col-6 d-flex flex-column flex-md-row flex-lg-column justify-content-center justify-content-lg-between align-items-start gap-0 gap-md-3 gap-lg-0 ps-lg-5">
            <a href="#" class="mb-3 menu-img" id="btn-images-1">
                <img src="{{ asset('images/AnimtionSection/buttoms/001.png') }}" alt="btn-1">
            </a>
            <a href="#" class="mb-3 menu-img" id="btn-images-2">
                <img src="{{ asset('images/AnimtionSection/buttoms/002.png') }}" alt="btn-2">
            </a>
            <a href="#" class="mb-3 menu-img" id="btn-images-3">
                <img src="{{ asset('images/AnimtionSection/buttoms/003.png') }}" alt="btn-3">
            </a>
            <a href="#" class="mb-3 menu-img" id="btn-images-4">
                <img src="{{ asset('images/AnimtionSection/buttoms/004.png') }}" alt="btn-4">
            </a>
        </div>
    </div>
</main>
