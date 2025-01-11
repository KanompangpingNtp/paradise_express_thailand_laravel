@extends('admin.layout.admin_layout')
@section('admin_content')

<h3 class="text-center">CarModel for <span style="color: black;">{{ $carbrand->car_brand_name }}</span></h3><br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New CarModel
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New CarModel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('CreateNewCarModel', $carbrand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="car_model_name" class="form-label" style="font-size: 20px;">CarBrands Name</label>
                        <input type="text" class="form-control" id="car_model_name" name="car_model_name" required>
                    </div>
                    <div class="mb-3" style="font-size: 17px;">
                        <label for="car_images_file" class="form-label">แนบไฟล์ (รูปหรือเอกสารประกอบคำร้อง)</label>
                        <input type="file" class="form-control" id="car_images_file" name="car_images_file[]" multiple>
                        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 10MB)</small>
                        <!-- แสดงรายการไฟล์ที่แนบ -->
                        <div id="file-list" class="mt-1">
                            <div class="d-flex flex-wrap gap-3"></div>
                        </div>
                    </div>

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
        <tr>
            <th>#</th>
            <th>Car Brand Name</th>
            <th>Car Model Name</th>
            <th>Car Images</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carmodel as $model)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $carbrand->car_brand_name }}</td>
            <td>{{ $model->car_model_name }}</td>
            <td>
                @foreach($model->carImages as $image)
                    <img src="{{ asset('storage/'.$image->car_images_file) }}" width="100" alt="Car Image">
                @endforeach
            </td>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<script>
   const fileInput = document.getElementById('car_images_file');
const fileListContainer = document.querySelector('#file-list .d-flex');

// อัปเดตรายการไฟล์
fileInput.addEventListener('change', function() {
    fileListContainer.innerHTML = ''; // เคลียร์รายการเก่า
    Array.from(fileInput.files).forEach((file, index) => {
        // สร้าง wrapper สำหรับรูปภาพหรือไอคอน PDF
        const fileWrapper = document.createElement('div');
        fileWrapper.className = 'position-relative d-inline-block text-center';

        // ตรวจสอบประเภทไฟล์
        let previewElement;
        if (file.type.startsWith('image/')) {
            // สร้างภาพตัวอย่างสำหรับไฟล์รูปภาพ
            previewElement = document.createElement('img');
            previewElement.src = URL.createObjectURL(file);
            previewElement.alt = file.name;
        } else if (file.type === 'application/pdf') {
            // แสดงไอคอนแทนไฟล์ PDF
            previewElement = document.createElement('img');
            previewElement.src =
                'https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg';
            previewElement.alt = 'PDF File';
        } else {
            previewElement = document.createElement('div');
            previewElement.textContent = 'ไฟล์ไม่รองรับ';
        }

        // กำหนดขนาดและสไตล์ของรูปภาพ/ไอคอน
        previewElement.style.width = '100px';
        previewElement.style.height = '100px';
        previewElement.style.objectFit = 'cover';
        previewElement.className = 'border rounded';

        // ปุ่มลบ
        const removeButton = document.createElement('button');
        removeButton.textContent = '×';
        removeButton.className = 'btn btn-danger btn-sm position-absolute';
        removeButton.style.top = '0';
        removeButton.style.right = '0';
        removeButton.setAttribute('data-index', index);

        removeButton.addEventListener('click', () => {
            removeFile(index);
        });

        // ชื่อไฟล์
        const fileName = document.createElement('p');
        fileName.textContent = file.name;
        fileName.className = 'mt-2 text-truncate';
        fileName.style.width = '100px';

        // รวมทุกอย่างเข้ากับ wrapper
        fileWrapper.appendChild(previewElement);
        fileWrapper.appendChild(removeButton);
        fileWrapper.appendChild(fileName);

        fileListContainer.appendChild(fileWrapper);
    });
});

// ลบไฟล์ออกจากรายการ
function removeFile(index) {
    const fileArray = Array.from(fileInput.files);
    fileArray.splice(index, 1); // ลบไฟล์จากอาร์เรย์

    // สร้าง FileList ใหม่
    const dataTransfer = new DataTransfer();
    fileArray.forEach(file => dataTransfer.items.add(file));
    fileInput.files = dataTransfer.files;

    // อัปเดตรายการใน UI
    fileInput.dispatchEvent(new Event('change'));
}


</script>
@endsection
