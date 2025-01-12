@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">Tour list of Section for <span style="color: black">{{$toursection->tour_section_name}}</span></h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New Tour
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Tour</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('CreateNewTour', $toursection->id) }}" method="POST" enctype="multipart/form-data" style="font-size: 16px;">
                    @csrf

                    <div class="mb-3">
                        <label for="tour_name" class="form-label">Tour Name</label>
                        <input type="text" class="form-control" id="tour_name" name="tour_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="tour_detail" class="form-label">Tour Detail</label>
                        <textarea class="form-control" id="tour_detail" name="tour_detail" rows="3" required></textarea>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="tour_highlight_detail" class="form-label">Tour Highlight</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" id="tour_highlight_detail" name="tour_highlight_detail">
                            <div class="col-md-1">
                                <button type="button" class="btn btn-info ms-2" id="addHighlightBtn"><i class="bi bi-plus-circle"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- เพิ่ม input hidden เพื่อส่งค่าของ highlights -->
                    <input type="hidden" id="tour_highlight_detail_string" name="tour_highlight_detail_string" value="">

                    <div id="highlightList" style="margin-top: 20px;">
                        <ul id="highlightListItems"></ul>
                    </div>

                    <div class="mb-3">
                        <label for="title_image" class="form-label">Title Image</label>
                        <input type="file" class="form-control" id="title_image" name="title_image" style="font-size: 16px;">
                    </div>

                    <div class="mb-3">
                        <label for="file_post" class="form-label">Attach images and PDF files</label>
                        <input type="file" class="form-control" id="file_post" name="file_post[]" style="font-size: 16px;" multiple>
                        <small class="text-muted">Supported file types: jpg, jpeg, png, pdf (maximum size 10MB)</small>
                        <!-- แสดงรายการไฟล์ที่แนบ -->
                        <div id="file-list" class="mt-1">
                            <div class="d-flex flex-wrap gap-3"></div>
                        </div>
                    </div>

                    <!-- Hidden Input to store highlights -->
                    <input type="hidden" id="tour_highlight_detail_array" name="tour_highlight_detail[]">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Tour Name</th>
            <th>Details</th>
            <th>Highlights</th>
            <th>Images</th>
            <th>PDF</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($toursection->tours as $tour)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tour->tour_name }}</td>
            <td>{{ $tour->tour_detail }}</td>
            <td>
                <ul>
                    @foreach ($tour->highlights as $highlight)
                    <li>{{ $highlight->tour_highlight_detail }}</li>
                    @endforeach
                </ul>
            </td>
            {{-- <td class="text-center">
                    @foreach ($tour->images as $image)
                        <img src="{{ asset('storage/' . $image->tour_image_files) }}" alt="Image" width="50">
            @endforeach
            </td> --}}
            <style>
                .tour-image {
                    width: 50px;
                    height: 50px;
                    object-fit: cover;
                }
            </style>

            <td class="text-center">
                @foreach ($tour->images as $image)
                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="{{ asset('storage/' . $image->tour_image_files) }}">
                    <img src="{{ asset('storage/' . $image->tour_image_files) }}" alt="Image" class="tour-image">
                </a>
                @endforeach
            </td>
            <td class="text-center">
                @foreach ($tour->pdfs as $pdf)
                <a href="{{ asset('storage/' . $pdf->tour_pdf_file) }}" target="_blank" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i></a>
                @endforeach
            </td>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Tour Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Image will be displayed here -->
                <img id="modalImage" src="" alt="Tour Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<script>
    // เมื่อคลิกที่รูปภาพ
    const modalImage = document.getElementById('modalImage');
    const imageLinks = document.querySelectorAll('[data-bs-toggle="modal"]');

    imageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            // ดึง URL ของรูปภาพจาก attribute 'data-bs-img'
            const imgSrc = link.getAttribute('data-bs-img');
            modalImage.src = imgSrc; // เปลี่ยนแหล่งที่มาของภาพใน modal
        });
    });

</script>


<script src="{{asset('js/multipart_files.js')}}"></script>
<script>
    let highlights = [];

    document.getElementById('addHighlightBtn').addEventListener('click', function() {
        const highlightDetail = document.getElementById('tour_highlight_detail').value;

        if (highlightDetail) {
            // เพิ่ม highlight ลงใน array
            highlights.push(highlightDetail);

            // แสดง highlight ในรายการ
            const listItem = document.createElement('li');
            listItem.textContent = highlightDetail;
            document.getElementById('highlightListItems').appendChild(listItem);

            // ลบค่าจาก input
            document.getElementById('tour_highlight_detail').value = '';

            // อัปเดตค่าใน hidden input เพื่อส่งเป็น string
            document.getElementById('tour_highlight_detail_string').value = highlights.join(','); // ใช้ join เพื่อรวมข้อมูลเป็น string
        } else {
            alert('Please enter a highlight.');
        }
    });

</script>

@endsection
