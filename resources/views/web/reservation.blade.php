@extends('web.layout.nav')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation - Baratie Resto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet" />
</head>

<style>
    body {
        background-color: #000;
        color: #eaeaea;
        font-family: 'Playfair Display', serif;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 50px;
        padding: 30px;
    }

    .bg-glass {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: saturate(150%) blur(30px);
        border-radius: 15px;
        padding: 30px;
    }

    .form-control, .form-select {
        background-color: #333;
        color: white;
        border: 1px solid #444;
        transition: border-color 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #d4af37;
        box-shadow: none;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
    }

    .show-feedback .invalid-feedback {
        display: block;
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

    h1 {
        color: #d4af37;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        text-align: center;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <div class="bg-glass" data-aos="fade-up">
        <h1>Reservation Form</h1>
        <p>Send us a message and we'll get back to you as soon as possible. Looking forward to hearing from you.</p>

        <form id="reservationForm" novalidate>
            <div class="mb-4">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Name">
                <div class="invalid-feedback">Please enter your name.</div>
            </div>

            <div class="mb-4">
                <label for="phoneInput" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phoneInput" placeholder="Number Phone">
                <div class="invalid-feedback">Please enter a valid phone number.</div>
            </div>

            <div class="mb-4">
                <label for="peopleInput" class="form-label">People</label>
                <input type="number" class="form-control" id="peopleInput" min="1" max="10" placeholder="1-10">
                <div class="invalid-feedback">Please enter the number of people (1-10).</div>
            </div>

            <div class="mb-4">
                <label for="tableSelect" class="form-label">Table</label>
                <select class="form-select" id="tableSelect">
                    <option selected value="">Select Table</option>
                    <option value="1">Regular (2)</option>
                    <option value="2">VIP (4)</option>
                    <option value="3">VVIP (8)</option>
                </select>
                <div class="invalid-feedback">Please select a table type.</div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="dateInput" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateInput">
                    <div class="invalid-feedback">Please select a date</div>
                </div>
                <div class="col">
                    <label for="timeInInput" class="form-label">Time In</label>
                    <input type="time" class="form-control" id="timeInInput">
                    <div class="invalid-feedback">Please enter the time in</div>
                </div>
                <div class="col">
                    <label for="timeOutInput" class="form-label">Time Out</label>
                    <input type="time" class="form-control" id="timeOutInput">
                    <div class="invalid-feedback">Please enter the time out</div>
                </div>
            </div>

            <div class="mb-4">
                <label for="noteInput" class="form-label">Note</label>
                <textarea class="form-control" id="noteInput" rows="3" placeholder="Add any special requests"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-light w-100">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    AOS.init(); // Inisialisasi AOS untuk animasi

    document.getElementById('reservationForm').addEventListener('submit', function (event) {
        event.preventDefault();
        let isValid = true;

        const inputs = [
            'nameInput',
            'phoneInput',
            'peopleInput',
            'tableSelect',
            'dateInput',
            'timeInInput',
            'timeOutInput'
        ];

        inputs.forEach(id => {
            const input = document.getElementById(id);
            if (!input.value) {
                input.classList.add('is-invalid');
                input.parentElement.classList.add('show-feedback');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
                input.parentElement.classList.remove('show-feedback');
            }
        });

        if (isValid) {
            alert('Reservation confirmed. Thank you!');
            document.getElementById('reservationForm').reset();
        }
    });
</script>

@endsection
