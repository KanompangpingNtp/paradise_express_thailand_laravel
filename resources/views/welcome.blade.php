<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        @foreach ($toursections as $section)
            @foreach ($section->tours as $tour)
                <div class="col">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="card">
                            <!-- รูปภาพของทัวร์ -->
                            @if ($tour->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $tour->images->first()->tour_image_files) }}" class="card-img-top" alt="{{ $tour->name }}">
                            @else
                                <img src="{{ asset('images/default-tour.jpg') }}" class="card-img-top" alt="Default Image">
                            @endif

                            <div class="card-body">
                                <!-- ชื่อทัวร์ -->
                                <div class="card-title" style="font-size: 18px;">ชื่อทัวร์ {{ $tour->tour_name }}</div>

                                <!-- รายละเอียด -->
                                <div class="card-text text-muted" style="font-size: 16px;">
                                    รายละเอียด {{ $tour->tour_detail }}
                                </div>

                                <!-- ส่วน Highlight -->
                                <div class="highlight-section mt-3">HIGHLIGHT</div>
                                <div class="highlight-items mt-2">
                                    @if ($tour->highlights->isNotEmpty())
                                        @foreach ($tour->highlights as $highlight)
                                            <div class="d-flex justify-content-between">
                                                <span><i class="fa-regular fa-circle-check me-1"></i>{{ $highlight->tour_highlight_detail }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fa-regular fa-circle-check me-1"></i>ไม่มีข้อมูล Highlight</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endforeach
    </div>

</body>
</html>
