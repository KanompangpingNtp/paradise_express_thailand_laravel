<style>
    .bg-page2 {
    background: linear-gradient(to bottom, #ffffff, #f8f8f8);
    padding: 3rem 20px 7rem 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}


    .video-container {
        position: relative;
        width: 70%; /* ขนาดเริ่มต้นสำหรับหน้าจอใหญ่ */
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .video-container iframe {
        z-index: 2; /* ทำให้ iframe อยู่ข้างหน้า */
        width: 100%; /* ขนาดเต็มภายใน container */
        height: 46rem; /* ความสูงเริ่มต้น */
    }

    .video-container img {
        position: absolute;
        bottom: -5rem; /* ระยะห่างจากด้านล่าง */
        left: 30;
        z-index: 1; /* ทำให้ img อยู่ด้านหลัง */
        width: 80%; /* ขนาดเต็มภายใน container */
        height: auto;
        object-fit: contain; /* ครอบคลุมพื้นที่ทั้งหมด */
    }

    /* Media Queries สำหรับหน้าจอเล็ก */
    @media (max-width: 1300px) {
        .video-container {
            width: 90%; /* ลดขนาด container */
        }

        .video-container iframe {
            height: 36rem; /* ปรับความสูงวิดีโอ */
        }

        .video-container img {
            bottom: -4rem; /* ลดระยะห่างรูป */
        }
    }

    @media (max-width: 900px) {
        .video-container {
            width: 90%; /* ลดขนาด container */
        }

        .video-container iframe {
            height: 28rem; /* ปรับความสูงวิดีโอ */
        }

        .video-container img {

            bottom: -3.5rem; /* ลดระยะห่างรูป */
        }
    }

    @media (max-width: 765px) {
        .video-container {
            width: 90%; /* ลดขนาด container */
        }

        .video-container iframe {
            height: 28rem; /* ปรับความสูงวิดีโอ */
        }

        .video-container img {

            bottom: -3rem; /* ลดระยะห่างรูป */
        }
    }

    @media (max-width: 765px) {
        .video-container {
            width: 90%; /* ลดขนาด container */
        }

        .video-container iframe {
            height: 28rem; /* ปรับความสูงวิดีโอ */
        }

        .video-container img {

            bottom: -2.5rem; /* ลดระยะห่างรูป */
        }
    }

    @media (max-width: 576px) {
        .video-container iframe {
            height: 18rem; /* ปรับความสูงวิดีโอให้น้อยลง */
        }

        .video-container img {
            bottom: -2rem; /* ลดระยะห่างรูป */
        }
    }
</style>

<!-- Content Section -->
<main class="bg-page2">
    <div class="video-container">
        <!-- Embed YouTube Video -->
        <iframe 
    src="https://www.youtube.com/embed/p2u9JBK4Zu0?autoplay=1&mute=1&loop=1&playlist=p2u9JBK4Zu0" 
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
</iframe>

        <!-- Background Image -->
        <img src="{{ asset('images/HeroSection/state.png') }}" alt="state">
    </div>
</main>
