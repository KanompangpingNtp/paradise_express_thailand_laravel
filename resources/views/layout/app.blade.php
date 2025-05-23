<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" href="{{ asset('images/logo_edited.avif') }}" type="image/png">
    <!-- Bootstrap CSS (จาก CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: rgb(251 146 60 / var(--tw-text-opacity, 1));
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('HomeIndex')}}"><img src="{{ asset('images/logo_edited.avif') }}" alt="logo" width="50"></a>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'TourAll' ? 'active' : '' }}" href="{{route('TourAll')}}">Tour Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sightseeing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'TransferPage' ? 'active' : '' }}" href="{{ route('TransferPage') }}">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'CustomizePage' ? 'active' : '' }}" href="{{ route('CustomizePage') }}">Customized</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'ContactPage' ? 'active' : '' }}" href="{{ route('ContactPage') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('showLoginForm')}}" class="d-block d-lg-none nav-link"><i class="fa-solid fa-user me-1"></i>Login</a>
                    </li>
                </ul>
            </div>

            <!-- Login Button -->
            <a href="{{route('showLoginForm')}}" class="d-none d-lg-block btn btn-outline-dark"><i class="fa-solid fa-user me-1"></i>Login</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS (จาก CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
