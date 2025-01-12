<style>
    .bg-page5 {
        background-image: url('{{ asset('images/TourAsia/bgtourasia.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: 5px 5px 1rem rgba(0, 0, 0, 0.8);
        min-height: 50vh;
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

    .carousel-indicators {
        position: absolute;
        bottom: -60px;
        left: 35%;
        transform: translateX(-50%);
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .carousel-indicators button {
        width: 25px;
        height: 25px;
        background-color: #131313;
    }

    .carousel-indicators .active {
        background-color: #131313;
    }

    .img-container {
        height: 300px;
        overflow: hidden;
    }
</style>

<main class="bg-page5 d-flex">
    <div class="container py-5">
        <div class="text-center fs-2 fw-bold">
            TOUR OF ASIA
        </div>
        <div class="container d-flex align-items-center justify-content-center gap-4 flex-grow-1">
            <div class="d-flex flex-column align-items-center justify-content-center my-4">
                <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < 3; $i++) <!-- จำนวนหน้าสไลด์ที่ต้องการ -->
                        <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}"></button>
                        @endfor
                    </div>
        
                    <!-- Carousel Items -->
                    <div class="carousel-inner py-3">
                        @for ($i = 0; $i < 3; $i++) <!-- จำนวนหน้าสไลด์ที่ต้องการ -->
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <div class="row">
                                @for ($j = 1; $j <= 3; $j++) <!-- จำนวนการ์ดที่ต้องการแสดงในแต่ละสไลด์ -->
                                <div class="col-4" id="card-carousel">
                                    <a href="#" class="text-decoration-none text-dark"> 
                                        <div class="card">
                                            <div class="img-container w-100">
                                                <img src="default-image.jpg" class="card-img-top" alt="Default Image">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 18px;">Title {{ $i * 3 + $j }}</h5>
                                                <p class="card-text text-muted" style="font-size: 16px;">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ipsam consequatur suscipit optio inventore? 
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>
        
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="btn-view-all mt-4">
            VIEW ALL ASIA
        </div>
    </div>

</main>
