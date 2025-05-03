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
                @php
                $chunks = $toursections_asia->chunk(5); // แบ่งข้อมูลเป็นกลุ่มละ 3 ชิ้น (1 สไลด์มี 3 การ์ด)
                @endphp

                <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @forelse ($chunks as $index => $group)
                        <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @empty
                        <button type="button" class="disabled" aria-disabled="true">No slides available</button>
                        @endforelse
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner py-3">
                        @forelse ($chunks as $index => $group)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($group as $tour)
                                <div class="col-4" id="card-carousel">
                                    <a href="{{ route('TourASIADetails', $tour->id) }}" class="text-decoration-none text-dark">
                                        <div class="card">
                                            <div class="img-container w-100">
                                                <img src="{{ $tour->images->isNotEmpty()
                                                    ? asset('storage/' . $tour->images->first()->tour_image_files)
                                                    : asset('images/default.jpg') }}" class="card-img-top" alt="{{ $tour->tour_name ?? 'Tour Image' }}">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 18px;">{{ $tour->tour_name ?? 'Card Title' }}</h5>
                                                <p class="card-text text-muted" style="font-size: 16px;">
                                                    {{ $tour->tour_detail ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit.' }}
                                                </p>

                                                {{-- <div class="highlight-section mt-3">HIGHLIGHT</div>
                                                <div class="highlight-items mt-2">
                                                    @if ($tour->highlights->isNotEmpty())
                                                    @foreach ($tour->highlights->chunk(2) as $chunk)
                                                    <div class="d-flex justify-content-between">
                                                        @foreach ($chunk as $highlight)
                                                        <span><i class="fa-regular fa-circle-check me-1"></i>{{ $highlight->tour_highlight_detail }}</span>
                                                        @endforeach
                                                        @if ($chunk->count() < 2) <span></span>
                                                            @endif
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div class="d-flex justify-content-between">
                                                        <span><i class="fa-regular fa-circle-check me-1"></i>No Highlights</span>
                                                    </div>
                                                    @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        <!-- Show a message or a default slide when there is no data -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card">
                                        <div class="img-container w-100">
                                            <img src="default-image.jpg" class="card-img-top" alt="Default Image">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">No Tours Available</h5>
                                            <p class="card-text text-muted">No tours are currently available to show. Please check back later.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
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
            <a href="{{ route('TourASIAShowAll') }}" class="text-decoration-none" style="color: #000">VIEW ALL ASIA</a>
        </div>
    </div>

</main>
