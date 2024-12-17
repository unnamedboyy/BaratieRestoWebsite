@extends('web.layout.nav')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Baratie Resto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Playfair+Display:400,600&display=swap" rel="stylesheet" />

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
</head>

<style>
    body {
        background-color: #1a1a1a;
        font-family: 'Playfair Display', serif;
        color: #eaeaea;
        margin: 0;
        padding: 0;
    }

    .btn-outline-light {
        border-color: #d4af37;
        color: #d4af37;
        border-radius: 5px;
        padding: 8px 20px;
        font-size: 1rem;
        height: 45px;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-light:hover {
        background-color: #d4af37;
        color: black;
    }

    h1, h3 {
        color: #d4af37;
    }

    .card {
        background-color: transparent;
        border: none;
    }

    .card-body {
        color: white;
    }

    .container {
        margin-top: 30px;
    }

    .carousel-inner img {
        height: 600px; /* Adjust this value as needed */
        object-fit: cover; /* This ensures the image covers the area without distortion */
    }

    .carousel-caption {
        top: 35%; /* Move caption higher */
    }

    .carousel-caption h1 {
        font-size: 4rem;
    }

    .carousel-caption p {
        font-size: 1.5rem;
    }
    
    .carousel-item::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(26, 26, 26, 0.1), rgba(26, 26, 26, 1));
        z-index: 1;
    }

    .carousel-item img {
        filter: brightness(60%);
    }

    .carousel-caption {
        position: absolute;
        z-index: 2;
        color: #fff;
    }


    /* Media Queries untuk Responsivitas */
    @media (max-width: 1200px) {
        .carousel-caption h1 {
            font-size: 3rem;
        }
        .carousel-caption p {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 992px) {
        .carousel-caption h1 {
            font-size: 2.5rem;
        }
        .carousel-caption p {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .carousel-caption h1 {
            font-size: 2rem;
        }
        .carousel-caption p {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .carousel-caption h1 {
            font-size: 1.5rem;
        }
        .carousel-caption p {
            font-size: 0.8rem;
        }
    }
</style>

<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('public/images/head(1).jpg') }}" class="d-block w-100" alt="images1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('public/images/head(2).jpg') }}" class="d-block w-100" alt="images2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('public/images/head(3).jpg') }}" class="d-block w-100" alt="images3">
        </div>
    </div>
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" 
         style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff;">
        <h1 data-aos="fade-down">Welcome to Baratie Resto</h1>
        <p data-aos="fade-right">Experience the finest dining with us.</p>
        <a href="{{ url('reservation') }}" class="btn btn-outline-light mt-3" style="font-size: 1.2rem;" data-aos="fade-up">
            Reservation
        </a>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- About -->
<div class="container text-center" data-aos="fade-up">
    <div class="row">
        <div class="col-md-8 col-12" data-aos="zoom-in">
            <img src="{{ asset('public/images/about.jpg') }}" class="d-block w-100" alt="about">
        </div>
        <div class="col-md-4 col-12">
            <div class="card-body" data-aos="fade-left">
                <h1>Baratie Resto</h1>
                <p>
                    Baratie Resto is a culinary haven where tradition meets innovation. Inspired by the vibrant flavors of both local and global cuisines, 
                    every dish is crafted with passion to offer a truly memorable dining experience.
                </p>
                <p>
                    At Baratie Resto, we believe that food is more than just sustenance—it's an art. Whether you're enjoying a quiet meal or celebrating with friends, 
                    our warm atmosphere and carefully curated dishes will make every moment special.
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Menu -->
<div class="container text-center" data-aos="fade-up">
    <h1>Our Menu</h1>
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col" data-aos="zoom-in">
            <div class="card">
                <img src="{{ asset('public/images/hmenu1.jpg') }}" class="card-img-top" alt="appetizer">
                <div class="card-body">
                    <h3>Appetizer</h3>
                    <p>Start your culinary journey with our delightful appetizers, crafted to awaken your senses and prepare you for an unforgettable meal.</p>
                    <a href="{{ url('menu#appetizer') }}" class="btn btn-outline-light mt-3">View</a>
                </div>
            </div>
        </div>

        <div class="col" data-aos="zoom-in" data-aos-delay="200">
            <div class="card">
                <img src="{{ asset('public/images/hmenu2.jpg') }}" class="card-img-top" alt="main course">
                <div class="card-body">
                    <h3>Main Course</h3>
                    <p>Indulge in our signature main courses, combining rich flavors and exquisite presentation, inspired by both local traditions and international cuisine.</p>
                    <a href="{{ url('menu#maincourse') }}" class="btn btn-outline-light mt-3">View</a>
                </div>
            </div>
        </div>

        <div class="col" data-aos="zoom-in" data-aos-delay="400">
            <div class="card">
                <img src="{{ asset('public/images/hmenu3.jpg') }}" class="card-img-top" alt="dessert">
                <div class="card-body">
                    <h3>Dessert</h3>
                    <p>End your meal on a sweet note with our heavenly desserts, where every bite is a celebration of flavor and finesse.</p>
                    <a href="{{ url('menu#dessert') }}" class="btn btn-outline-light mt-3">View</a>
                </div>
            </div>
        </div>

        <div class="col" data-aos="zoom-in" data-aos-delay="600">
            <div class="card">
                <img src="{{ asset('public/images/hmenu4.jpg') }}" class="card-img-top" alt="drinks">
                <div class="card-body">
                    <h3>Drinks</h3>
                    <p>Refresh yourself with our selection of premium drinks, from expertly brewed coffees to handcrafted cocktails and fine wines.</p>
                    <a href="{{ url('menu#drinks') }}" class="btn btn-outline-light mt-3">View</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Location -->
<div class="container text-center" data-aos="fade-up">
    <div class="row">
        <div class="col-md-4 col-12" data-aos="fade-right">
            <div class="card-body">
                <h1>Opening Hours</h1>
                <p>Our hours may vary during holidays to serve you better.</p>
                <p><strong>Monday - Friday:</strong> 08:00 AM - 10:00 PM<br>
                   <strong>Saturday - Sunday:</strong> 09:00 AM - 11:00 PM</p>
                <p>Visit us during these times and enjoy an unforgettable dining experience!</p>
                <div class="text-center mt-3">
                    <a href="{{ url('reservation') }}" class="btn btn-outline-light">Make a Reservation</a>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12" data-aos="zoom-in">
            <img src="{{ asset('public/images/open.jpg') }}" class="d-block w-100" alt="location">
        </div>
    </div>
</div>


<script>
    AOS.init();
</script>

@endsection
