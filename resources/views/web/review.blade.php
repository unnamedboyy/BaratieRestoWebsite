@extends('web.layout.nav')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reviews - Baratie Resto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Playfair+Display:400,600&display=swap" rel="stylesheet" />

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>

    <style>
        body {
            background-color: #1a1a1a;
            font-family: 'Playfair Display', serif;
            color: #eaeaea;
        }

        h1 {
            color: #d4af37;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .bg-glass {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: saturate(150%) blur(30px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-review {
            background-color: #2a2a2a;
            border: 1px solid #d4af37;
            border-radius: 10px;
            padding: 15px;
            color: #eaeaea;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .card-review:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.5);
        }

        .star-rating label {
            font-size: 1.5rem;
            color: gold;
            margin-right: 3px;
        }

        .btn-primary {
            background-color: #d4af37;
            border: none;
        }

        .btn-primary:hover {
            background-color: #b8860b;
            transition: background-color 0.3s ease;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .review-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<div class="container my-5" data-aos="fade-up">
    <h1 class="text-center mb-4">Customer Reviews</h1>

    <!-- Review Form -->
    <div class="bg-glass mb-5">
        <h4 class="mb-4">Leave Your Review</h4>
        <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm">
            @csrf
            <div class="mb-3">
                <label for="food" class="form-label">Select Food</label>
                <select class="form-control" id="food" name="food" required>
                    <option value="Spaghetti Carbonara">Spaghetti Carbonara</option>
                    <option value="Grilled Salmon">Grilled Salmon</option>
                    <option value="Chicken Parmesan">Chicken Parmesan</option>
                    <option value="Margherita Pizza">Margherita Pizza</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="review" class="form-label">Write Your Review</label>
                <textarea class="form-control" id="review" name="review" rows="3" placeholder="Share your experience..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <div class="star-rating">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required />
                        <label for="star{{ $i }}">&#9733;</label>
                    @endfor
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit Review</button>
        </form>
    </div>

    <!-- Reviews List -->
    <div class="reviews-container">
        @forelse ($reviews as $review)
        <div class="card-review" data-aos="fade-up">
            <div class="review-header">
                <img src="{{ asset($review->user->profile_image ?? 'images/default.png') }}" class="profile-img" alt="Profile Picture">
                <div>
                    <h5 class="mb-1">{{ $review->user->name }}</h5>
                    <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                </div>
            </div>
            <hr>
            <p><b>Reviewed Food:</b> {{ $review->food }}</p>
            <div class="star-rating">
                @for ($i = 1; $i <= $review->rating; $i++)
                    <label>&#9733;</label>
                @endfor
            </div>
            <p>{{ $review->review }}</p>
        </div>
        @empty
        <div class="text-center">
            <p>No reviews available yet. Be the first to leave a review!</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $reviews->links() }}
    </div>
</div>

<script>
    AOS.init(); // Initialize AOS Animation Library
</script>

@endsection
