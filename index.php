<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title> Quick Drive </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon" href="logo.png"/>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="pengguna/lib/animate/animate.min.css"/>
        <link href="pengguna/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="pengguna/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="pengguna/css/bootstrap2.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="pengguna/css/style3.css" rel="stylesheet">
    </head>

<body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Navbar start  -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="index.php" class="navbar-brand p-0 d-flex align-items-center">
                        <img src="logo.png" class="me-2">
                        <h1 class="text-primary mb-0">Quick Drive</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Katalog</a>
                                <div class="dropdown-menu">
                                    <a href="mobil.php" class="dropdown-item">Mobil</a>
                                    <a href="motor.php" class="dropdown-item">Motor</a>
                                </div>
                            </div>
                            <!-- Tampilkan "About Us" & "Contact" hanya di index.php -->
                            <a href="#aboutUs" class="nav-item nav-link">About Us</a>
                            <a href="#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex align-items-center ms-lg-4">
                            <a href="login_aplikasi.php" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <a href="login_aplikasi.php" class="nav-link">Login</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
       
        <!-- Spinner End -->
        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel" id="carousel">
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Selamat datang di</h4>
                                    <h1 class="display-1 text-white mb-4">Quick Drive</h1>
                                    <p class="mb-5 fs-5">kami sudah terpercaya dalam 100 tahun terakhir sebagai penyedia rental untuk motor dan mobil di Indonesia dan selamat menikmati berbagai fasilitas yang tersedia di Quick Drive
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="calrousel-img" style="object-fit: cover;">
                                    <img src="pengguna/img/foto_kendaraan.png" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                            <div class="col-lg-5 animated fadeInLeft">
                                <div class="calrousel-img">
                                    <img src="pengguna/img/foto_kendaraan.png" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 animated fadeInRight">
                                <div class="text-sm-center text-md-end">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Selamat datang di</h4>
                                    <h1 class="display-1 text-white mb-4">Quick Drive</h1>
                                    <p class="mb-5 fs-5">kami sudah terpercaya dalam 100 tahun terakhir sebagai penyedia rental untuk motor dan mobil di Indonesia dan selamat menikmati berbagai fasilitas yang tersedia di Quick Drive
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Testimonial Start -->
               <div class="container-fluid testimonial pb-5">
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;"> <br>
                        <h4 class="text-primary">Testimoni</h4>
                        <h1 class="display-4 mb-4">Kami Berkomitmen untuk Memberikan Pengalaman Terbaik</h1>
                        <h5 class="mb-0">Apapun tujuan perjalananmu, baik itu untuk liburan seru, keperluan bisnis, atau hanya sekedar keliling kota, kami di Quick kDrive selalu siap memberikan pilihan kendaraan terbaik yang nyaman dan terawat. Kamu gak perlu khawatir soal kenyamanan dan kualitas, karena kami pastikan semua kendaraan kami siap menemani perjalananmu dengan aman dan lancar. Simak cerita seru dari pelanggan kami yang sudah merasakan layanan kami!
                        </h5>
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                        <div class="testimonial-item bg-light rounded">
                            <div class="row g-0">
                                <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                        <img src="pengguna/img/testimonial-1.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                        <h4 class="text-dark mb-0">Jarwo</h4>
                                        <p class="mb-3">Sewa mobil</p>
                                        <div class="d-flex text-primary mb-3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="mb-0">Pertama kali sewa mobil di Rental Mobil Abah dan saya sangat puas! Proses pemesanan sangat mudah, mobil yang saya sewa dalam kondisi bersih dan nyaman, dan pelayanan dari timnya sangat ramah. Perjalanan jadi lebih menyenankan dan tidak khawatir soal kendaraan. Pasti akan sewa lagi di sini kalau butuh mobil!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-light rounded">
                            <div class="row g-0">
                                <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                        <img src="pengguna/img/testimonial-2.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                        <h4 class="text-dark mb-0">Dadang</h4>
                                        <p class="mb-3">Sewa motor</p>
                                        <div class="d-flex text-primary mb-3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star text-body"></i>
                                        </div>
                                        <p class="mb-0">Saya baru saja menyewa motor di Rental Mas Adit, dan pengalaman saya luar biasa! Motor yang disediakan masih dalam kondisi prima, bersih, dan nyaman banget buat dipakai. Proses penyewaannya juga gampang banget, stafnya ramah dan langsung menjelaskan dengan jelas soal motor yang saya sewa. Harga sewa di Rental Mas Adit juga terbilang sangat bersahabat, dan mereka punya banyak pilihan paket sewa yang fleksibel. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-light rounded">
                            <div class="row g-0">
                                <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                        <img src="pengguna/img/testimonial-3.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                        <h4 class="text-dark mb-0">yanti</h4>
                                        <p class="mb-3">sewa motor</p>
                                        <div class="d-flex text-primary mb-3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star text-body"></i>
                                            <i class="fas fa-star text-body"></i>
                                        </div>
                                        <p class="mb-0">Baru aja nyewa motor di Rental Mas Adit, dan sumpah puas banget! Motornya masih kece, bersih, dan pastinya nyaman buat dipakai. Proses sewa juga super gampang, gak ribet. Stafnya juga asik, langsung ngasih info yang jelas tentang motor yang saya sewa. Harganya juga oke banget, nggak bikin kantong bolong, dan mereka punya banyak pilihan paket sewa yang fleksibel, jadi bisa pilih yang sesuai banget. Pelayanan dari timnya juga top banget, ramah dan profesional. Pokoknya, kalau butuh sewa motor lagi, balik lagi deh ke Rental Mas Adit!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Testimonial End -->
    
            <!-- About Us Start -->
<div class="container-fluid feature bg-light py-5 d-flex align-items-center justify-content-center">
    <div class="text-center mx-auto">
        <div class="pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px; margin: auto;" id="aboutUs">
            <h4 class="text-primary">About Us</h4>
            <h1 class="display-4 mb-4">Ada dua pilihan kendaraaan yang bisa kamu pilih</h1>
            <p class="mb-0">Qiuck Drive sudah terpercaya di tingkat nasional dengan reputasi global.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item p-4 pt-0 text-center">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-car fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Rental Mobil</h4>
                    <p class="mb-4">Terdapat beragam jenis mobil yang tersedia di rental kami.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="pengguna/mobil.php">Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-item p-4 pt-0 text-center">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-motorcycle fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Rental motor</h4>
                    <p class="mb-4">Terdapat beragam jenis mobil yang tersedia di rental kami.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="pengguna/motor.php">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->

        <!-- About Start -->
        <div class="container-fluid bg-light about pb-5">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-item-content bg-white rounded p-5 h-100">
                            <h4 class="text-primary">Tentang perusahaan kami</h4>
                            <h1 class="display-4 mb-4">Apa itu Quick Drive?</h1>
                            <p>Quick Drive Adalah perusahaan rental yang sudah terpercaya di bidangnya dari generasi ke generasi dengan menjamin mutu dan kualitas dari tiap kendaraan yang kami sewakan
                            </p>
                            <p>Kenapa harus Quick Drive?
                            </p>
                            <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Kualitas kendaraan yang terjamin</p>
                            <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Harga ramah di kantong</p>
                            <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Surat-surat lengkap</p>
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="#">Pesan sekarang</a>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-white rounded p-5 h-100">
                            <div class="row g-4 justify-content-center">
                                <div class="col-12">
                                    <div class="rounded bg-light">
                                        <img src="pengguna/img/foto_kendaraan.png" class="img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <?php
                                include "koneksi.php"; // Pastikan koneksi ke database sudah benar

                                // Query untuk menghitung jumlah motor
                                $query_motor = mysqli_query($conn, "SELECT COUNT(*) as total_motor FROM kendaraan WHERE tipe = 'motor'");
                                $data_motor = mysqli_fetch_assoc($query_motor);
                                $total_motor = $data_motor['total_motor'];

                                // Query untuk menghitung jumlah mobil
                                $query_mobil = mysqli_query($conn, "SELECT COUNT(*) as total_mobil FROM kendaraan WHERE tipe = 'mobil'");
                                $data_mobil = mysqli_fetch_assoc($query_mobil);
                                $total_mobil = $data_mobil['total_mobil'];
                                ?>

                                <div class="col-sm-6">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold"><?php echo $total_motor; ?></span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Motor</h4>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold"><?php echo $total_mobil; ?></span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Mobil</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
  
        <!-- Team Start -->
        <div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;"> <br>
                    <h4 class="text-primary">Tim Kami</h4>
                    <h1 class="display-4 mb-4">Berikut ini adalah kumpulan orang yang menjadi bagian dari kelompok ini</h1>
                </div>

                <div class="row justify-content-center g-4">
                    <div class="col-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="pengguna/img/rrenaldii.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">Renaldi</h4>
                                <p class="mb-0">Programmer</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="pengguna/img/akmalll.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">Akmal</h4>
                                <p class="mb-0">Programmer</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="pengguna/img/destaa.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">Desta</h4>
                                <p class="mb-0">Ketua</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="pengguna/img/rahmaa.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">Rahma</h4>
                                <p class="mb-0">UI</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="pengguna/img/ferlikaa.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">Ferlika</h4>
                                <p class="mb-0">Laporan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s" id="contact">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-9">
                <div class="mb-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-5">
                            <div class="footer-item">
                                <a href="index.html" class="p-0 d-flex align-items-center text-decoration-none">
                                    <img src="logo.png" class="me-2" style="width: 50px; height: auto;">
                                    <h3 class="text-white mb-0">Quick Drive</h3>
                                </a>
                                <p class="text-white mb-4">Ikuti juga beragam sosial media kami!</p>
                                <div class="footer-btn d-flex">
                                    <a class="btn btn-md-square rounded-circle me-3" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3" href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
        
                       
                        <div class="col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Jam Operasional</h4>
                            <ul class="list-unstyled text-white">
                                <li>Senin - Jumat: 08.00 - 17.00</li>
                                <li>Sabtu: 08.00 - 15.00</li>
                                <li>Minggu: Tutup</li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Alamat</h4>
                                            <p class="mb-0">jl.Tzyliwangy No.6</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Email</h4>
                                            <p class="mb-0">QiuckDrive@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fa fa-phone fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Telepon</h4>
                                            <p class="mb-0">021 111 222</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">FAQ</h4>
                        <div class="accordion" id="faqAccordion">
                       <!-- Pertanyaan 1 -->
                        <div class="accordion-item bg-transparent border-0 mb-2">
                            <h5 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-white bg-primary rounded p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" style="box-shadow: none; transition: all 0.3s ease;">
                                    <i class="fas fa-question-circle me-2"></i> Bagaimana cara menyewa mobil?
                                </button>
                            </h5>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white bg-dark rounded-bottom p-3">
                                    Anda bisa langsung memilih mobil di katalog kami dan mengisi formulir pemesanan.
                                </div>
                            </div>
                         </div>
                     <!-- Pertanyaan 2 -->
                        <div class="accordion-item bg-transparent border-0 mb-2">
                          <h5 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-white bg-primary rounded p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" style="box-shadow: none; transition: all 0.3s ease;">
                                    <i class="fas fa-question-circle me-2"></i> Apa saja syarat menyewa mobil?
                                </button>
                           </h5>
                           <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                              <div class="accordion-body text-white bg-dark rounded-bottom p-3">
                                   Anda perlu menyiapkan KTP dan SIM yang masih berlaku.
                               </div>
                          </div>
                        </div>
                       <!-- Pertanyaan 3 -->
                     <div class="accordion-item bg-transparent border-0 mb-2">
                         <h5 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-white bg-primary rounded p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" style="box-shadow: none; transition: all 0.3s ease;">
                                    <i class="fas fa-question-circle me-2"></i> Apakah ada biaya tambahan?
                                </button>
                           </h5>
                           <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                               <div class="accordion-body text-white bg-dark rounded-bottom p-3">
                                    Biaya tambahan hanya berlaku jika ada kerusakan atau keterlambatan pengembalian.
                               </div>
                         </div>
                        </div>
                        <!-- Pertanyaan 4 -->
                        <div class="accordion-item bg-transparent border-0 mb-2">
                            <h5 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-white bg-primary rounded p-3"            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" style="box-shadow: none; transition: all 0.3s ease;">
                                   <i class="fas fa-question-circle me-2"></i> Bagaimana jika mobil rusak?
                             </button>
                            </h5>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white bg-dark rounded-bottom p-3">
                                   Segera hubungi tim kami untuk penanganan lebih lanjut.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Copyright Start -->
 <div class="container-fluid copyright py-4">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-md-6 text-center">
                            <span class="text-body">
                                <a class="border-bottom text-white">
                                    <i class="fas fa-copyright text-light me-2"></i>Quick Drive 2025
                                </a>, All right reserved.
                            </span>
                        </div>
                    </div>
                </div>
</div>
<!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="pengguna/lib/wow/wow.min.js"></script>
        <script src="pengguna/lib/easing/easing.min.js"></script>
        <script src="pengguna/lib/waypoints/waypoints.min.js"></script>
        <script src="pengguna/lib/counterup/counterup.min.js"></script>
        <script src="pengguna/lib/lightbox/js/lightbox.min.js"></script>
        <script src="pengguna/lib/owlcarousel/owl.carousel.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="pengguna/js/main.js"></script>
    
    </body>
</html>