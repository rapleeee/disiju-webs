<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | PT. Di Siju Saitama Perkasa</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        body {
            font-family: sans-serif;
        }
        .carousel-container {
            width: 100%;
            max-width: 400px;
            margin: 2rem;
        }
        .carousel-image {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
        }
        .content {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .info {
            max-width: 500px;
            margin-left: 10px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="content">
        <div class="carousel-container">
            <img id="carouselImage" class="carousel-image" src="../image/logo.jpg" alt="Carousel Image">
        </div>
        <div class="info">
            <h1>PT. Di Siju Saitama Perkasa</h1>
            <p>PT. Di Siju Saitama Perkasa adalah perusahaan yang bergerak di bidang penyewaan gedung perkantoran dan event space. Kami menyediakan berbagai pilihan gedung dengan fasilitas lengkap dan lokasi strategis di pusat kota.</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Start</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                '../image/logo.jpg',
                '../images/cimb_niaga_bintaro.jpg',
                '../images/graha_mandiri.jpg',
                '../images/plaza_mandiri.jpg',
                '../images/uob_plaza.jpg',
                // Tambahkan path gambar lain yang ingin Anda tampilkan
            ];
            let currentIndex = 0;

            function changeImage() {
                const carouselImage = document.getElementById('carouselImage');
                currentIndex = (currentIndex + 1) % images.length;
                carouselImage.src = images[currentIndex];
            }

            setInterval(changeImage, 3000); // Ganti gambar setiap 3 detik
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
