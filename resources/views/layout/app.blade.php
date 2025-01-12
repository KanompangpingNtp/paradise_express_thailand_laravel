<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <!-- Bootstrap CSS (จาก CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'GeistVF';
            src: url('/images/GeistVF.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'GeistMonoVF';
            src: url('/images/GeistMonoVF.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        /* ตัวอย่างการใช้ฟอนต์ */
        body {
            font-family: 'GeistVF', sans-serif;
            font-size: 18px;
        }

        .code-block {
            font-family: 'GeistMonoVF', monospace;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            /* สีดำโปร่งแสง 70% */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#"><img src="{{ asset('images/logo_edited.avif') }}" alt="logo"
                    width="50"></a>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tour Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sightseeing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customized</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Login Button -->
            <a href="#" class="btn btn-outline-dark"><i class="fa-solid fa-user me-1"></i>Login</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS (จาก CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar hide/show on scroll
        let prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
</body>

</html>
