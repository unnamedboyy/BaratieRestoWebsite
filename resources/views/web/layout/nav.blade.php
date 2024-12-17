<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/font-awesome.min.css">

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Playfair+Display:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #1a1a1a;
            font-family: 'Playfair Display', serif;
            color: #eaeaea;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the footer stays at the bottom */
        }

        /* Navbar */
        .navbar {
            background-color: #111;
        }

        .navbar-brand {
            color: #d4af37 !important;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #eaeaea !important;
        }

        .nav-link:hover {
            color: #d4af37 !important;
        }

        /* Button Styles */
        #btn-nav{
            border-color: #d4af37;
            color: #d4af37;
            border-radius: 0;
        }

        #btn-nav:hover {
            background-color: #d4af37;
            color: black;
        }

        /* Footer Styles */
        footer {
            background-color: #111;
            color: #eaeaea;
            margin-top: auto; /* Push the footer to the bottom */
        }

        footer a {
            color: #d4af37;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="height: 100px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('web/admin') }}" style="font-size: 40px; padding-left: 30px;">Baratie Resto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-5">
                    <a class="nav-link active" href="{{ url('web/home') }}">Home</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ url('web/menu') }}" >Menu</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ url('web/about') }}">About</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ url('web/review') }}">Review</a>
                </li>

                
                    @if (Route::has('login'))
                            @auth
                            <li class="nav-item me-5">
                                <a href="{{ url('web/reservation') }}" id="btn-nav" class="btn btn-outline-success me-2">Reservation</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link" href="{{ url('web/profile') }}" style="padding:0;"><i class="fa fa-user" style="font-size: 2rem; color: #eaeaea;" ></i></a>
                            </li>
                                @else
                                <li class="nav-item me-5">
                                    <a href="{{ url('web/login') }}" id="btn-nav" class="btn btn-outline-success">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ url('web/register') }}" id="btn-nav" class="btn btn-outline-success">Sign Up</a>
                                    @endif
                                </li>
                            @endauth
                        @endif
                

         


            </ul>
        </div>
    </div>
</nav>

@yield('content')

<br><br>

<!-- Footer -->
<footer class="text-center text-lg-start p-4">
    <section class="d-flex justify-content-center p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <div>
            <a href="#" class="me-4 text-reset"><i class="fa fa-facebook-f"></i></a>
            <a href="#" class="me-4 text-reset"><i class="fa fa-twitter"></i></a>
            <a href="#" class="me-4 text-reset"><i class="fa fa-google"></i></a>
            <a href="#" class="me-4 text-reset"><i class="fa fa-instagram"></i></a>
            <a href="#" class="me-4 text-reset"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="me-4 text-reset"><i class="fa fa-github"></i></a>
        </div>
    </section>

    <section>
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h3 class="fw-bold">Baratie Resto</h3>
                    <p>Enjoy the Taste for Better Experience.</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="fw-bold">Service</h6>
                    <p><a href="{{ url('web/menu') }}">Menu</a></p>
                    <p><a href="{{ url('web/reservation') }}">Reservation</a></p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="fw-bold">Useful Links</h6>
                    <p><a href="{{ url('web/home') }}">Home</a></p>
                    <p><a href="{{ url('web/about') }}">About</a></p>
                    <p><a href="{{ url('web/review') }}">Review</a></p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="fw-bold">Contact</h6>
                    <p><i class="fa fa-home me-3"></i> Yogyakarta, Indonesia</p>
                    <p><i class="fa fa-envelope me-3"></i> baratieresto@example.com</p>
                    <p><i class="fa fa-phone me-3"></i> +62 1234 5678</p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center mt-4">
        © 2024 Copyright:
        <a href="#" class="text-reset fw-bold">Baratie Resto</a>
    </div>
</footer>

</body>
</html>
