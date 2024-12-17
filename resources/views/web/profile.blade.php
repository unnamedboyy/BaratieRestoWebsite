@extends('web.layout.nav')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<style>
    body {
        background-color: #1a1a1a;
        font-family: 'Playfair Display', serif;
        color: #eaeaea;
        margin: 0;
        padding: 0;
    }

    /* Layout utama */
    .container-profile {
        display: flex;
        justify-content: center;
        gap: 20px; /* Jarak antar kolom */
        margin-top: 50px;
    }

    /* Bagian Kiri - Profil */
    /* .profile-left, .profile-center, .profile-right {
        flex-basis: 30%;
        background-color: #1a1a1a;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    } */

    .profile-left {
        flex-basis: 30%;
        background-color: #1a1a1a;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-center {
        flex-basis: 50%;
        background-color: #1a1a1a;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Flex untuk menata isi dari tiap kolom */
    .profile-left img, .profile-right img {
        border-radius: 50%;
        width: 250px;
        height: 250px;
        display: block;
        margin: 0 auto;
    }

    .profile-left h5 {
        text-align: left;
        margin-top: 15px;
        font-weight: 600;
    }

    .profile-left p {
        text-align: left;
        color: #777;
    }

    .btn-primary {
        background-color: #1a1a1a;
        border: 1px solid #d4af37;
        color: #d4af37;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #d4af37;
        color: black;
    }


    .btn-cancel {
        background-color: #1a1a1a;
        border: 1px solid whitesmoke;
        color: whitesmoke;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: whitesmoke;
        color: black;
    }


    .about-me h5 {
        font-weight: 600;
        color: whitesmoke;
    }

    .about-me p {
        color: #eaeaea;
    }

    /* Atur tinggi konten agar rata */
    .profile-left, .profile-center, .profile-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .about-me {
        padding: 20px;
    }

    .history-item {
        background-color: #333;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .history-item h5, .history-item p {
        margin: 0;
    }

    .history-item p {
        font-weight: bold;
    }

    /* form */
    .form-floating input{
        border-radius: 10px;
        background-color: whitesmoke;
        height: 20px;
    }

    .form-floating label{
        color: black;
    }

</style>

<!-- Container for Profile -->
<div class="container container-profile">
    <!-- Bagian Kiri - Profil -->
    <div class="profile-left">
        <img src="{{ asset('images/zendaya.jpg') }}" alt="Profile Image">
        <div class="about-me">
            <h5> Nama Lengkap:</h5>
            <p> Zendaya Maree Stoermer Coleman</p>

            <h5> Email:</h5>
            <p> ZendayaColeman@gmail.com</p>

            <h5> Tanggal Lahir:</h5>
            <p> September 1, 1996</p>

            <h5> No Telepon:</h5>
            <p> 081344289836</p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 48%;">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <!-- Bagian Tengah - Profile Detail -->
    <div class="profile-center">

        <h2><b>User Profile</b></h2>
        <br>

        <form id="registerForm">

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="regUsername" placeholder="Username" required />
                <label for="regUsername">Username</label>
            </div>

            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="regEmail" placeholder="Email" required />
                <label for="regEmail">Email</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="regPassword" placeholder="Password" required />
                <label for="regPassword">Password</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="regPasswordConfirm"
                    placeholder="Confirm Password" required />
                <label for="regPasswordConfirm">Confirm Password</label>
            </div>

            <div class="form-floating mb-4">
                <input type="date" class="form-control" id="regBirthDate" placeholder="Tanggal Lahir" required />
                <label for="regBirthDate">Tanggal Lahir</label>
            </div>

            <div class="form-floating mb-4">
                <input type="tel" class="form-control" id="regPhone" placeholder="Nomor Telepon"
                    pattern="[0-9]{10,15}" required />
                <label for="regPhone">Nomor Telepon</label>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-cancel" style="width: 48%;" onclick="resetForm()">Cancel</button>
                <button type="button" class="btn btn-primary" style="width: 48%;" onclick="validateForm()">Edit</button>
            </div>
        </form>
    </div>

    <!-- Bagian Kanan - Experience -->
    <!-- <div class="profile-right">
        <div class="about-me">
            <h3><b>History</b></h3>

            <div class="history-item">
                <h5> 23 Juli 2023 </h5>
                <p> <b>Total: </b> Rp. 3.000.000</p>
            </div>

            <div class="history-item">
                <h5> 17 Agustus 2023 </h5>
                <p> <b>Total: </b> Rp. 12.000.000</p>
            </div>

            <div class="history-item">
                <h5> 29 November 2023 </h5>
                <p> <b>Total: </b> Rp. 44.000.000</p>
            </div>

            <div class="history-item">
                <h5> 09 Desember 2023 </h5>
                <p> <b>Total: </b> Rp. 8.000.000</p>
            </div>

            <div class="history-item">
                <h5> 25 Desember 2023 </h5>
                <p> <b>Total: </b> Rp. 9.000.000</p>
            </div>
        </div>
    </div> -->

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDMNeT87bh950GNyZPhcTNXj1W7RuBCsyN/o@jlpcV8Qyq46cDFL"
    crossorigin="anonymous">
</script>

@endsection
