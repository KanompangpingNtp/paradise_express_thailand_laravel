<style>
    .bg-page4 {
        background-image: url('{{ asset('images/BGtour.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
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
        padding: 10px 20px; /* เพิ่มพื้นที่ภายในปุ่ม */
        border: none; /* ลบเส้นขอบ */
        border-radius: 5px; /* มุมโค้ง */
        text-transform: uppercase; /* ตัวอักษรเป็นพิมพ์ใหญ่ */
        font-size: 18px; /* ขนาดฟอนต์ */
        letter-spacing: 4px;
        text-align: center;
        transition: all 0.3s ease; /* เพิ่มการเปลี่ยนแปลงที่ลื่นไหล */
        cursor: pointer; /* เปลี่ยนเมาส์เป็น pointer */
    }

    .btn-view-all:hover {
        background-color: rgba(0, 0, 0, 0.5); /* เปลี่ยนพื้นหลังเป็นสีขาวโปร่งแสง */
        color: #fff; /* ตัวอักษรสีขาว */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* เพิ่มเงาเมื่อ hover */
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease; /* เพิ่มการเปลี่ยนแปลงที่ลื่นไหล */
    }

    .card i{
        color: #ff5722;
    }

    .card:hover {
        transform: translateY(-10px); /* ยกการ์ดขึ้น */
        box-shadow: 0 10px 13px rgba(0, 0, 0, 0.6); /* เพิ่มเงา */
    }

    .card:hover .highlight-section{
        color: #ff5722; /* เปลี่ยนสีของ HIGHLIGHT */
    }

    .card:hover img {
        filter: brightness(0.8); /* ทำให้รูปภาพมืดลงเล็กน้อย */
    }
</style>

<main class="bg-page4 d-flex">
    <div class="container py-5">
        <div class="text-center py-5 fs-2 fw-bold">
            TOUR OF THE MONTH
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
        <div class="btn-view-all my-3">
            VIEW ALL TOURS MONTH
        </div>
        <div class="text-center py-5 fs-2 fw-bold">
            TOUR OF THE SIGHTSEEING
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
                                    <span><i class="fa-regular fa-circle-check me-1"></i><span class="item-text">Item1 with long text xxxx</span></span>
                                    <span><i class="fa-regular fa-circle-check me-1"></i><span class="item-text">Item2 with some longer text</span></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span><i class="fa-regular fa-circle-check me-1"></i><span class="item-text">Item3</span></span>
                                    <span><i class="fa-regular fa-circle-check me-1"></i><span class="item-text">Item4 with even more text here</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
            @endfor
        </div>
        <div class="btn-view-all my-3">
            VIEW ALL SIGHTSEEING
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cardTextElements = document.querySelectorAll(".card-text");
            cardTextElements.forEach(element => {
                const maxLength = 60; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
                const originalText = element.textContent.trim(); // ข้อความต้นฉบับ
                if (originalText.length > maxLength) {
                    element.textContent = originalText.slice(0, maxLength) + "..."; // ตัดข้อความและเพิ่ม ...
                }
            });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cardTitleElements = document.querySelectorAll(".card-title");
        cardTitleElements.forEach(element => {
            const maxLength = 50; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
            const originalText = element.textContent.trim(); // ข้อความต้นฉบับ
            if (originalText.length > maxLength) {
                element.textContent = originalText.slice(0, maxLength) + "..."; // ตัดข้อความและเพิ่ม ...
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
