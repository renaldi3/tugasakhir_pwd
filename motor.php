<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Quick Drive - Katalog Motor</title>
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
    <div class="container mt-5 mb-5">
                    <div class="card shadow border-dark">
                        <div class="card-header py-3 align-items-center justify-content-between">
                            <h4 class="display-5 text-center">Katalog Motor</h4>
                        </div>
                                <div class="card-body">
                                      <!-- Kendaraan Section -->
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-4" id="kendaraanContainer">
                                        <?php
                                        include 'koneksi.php';
                                        $query = mysqli_query($conn, "SELECT * FROM kendaraan WHERE tipe='motor' ORDER BY nama_kendaraan ASC");
                                        if ($query->num_rows > 0) {
                                            while ($row = $query->fetch_assoc()) {
                                                ?>
                                                <div class="col kendaraan-item" data-status="<?= $row['status'] ?>">
                                                    <div class="card h-100 shadow-sm">
                                                        <img src="<?php echo "gambar/$row[gambar]"?>" alt="<?= $row['nama_kendaraan'] ?>" class="card-img-top img-fluid object-fit-cover" style="height: 200px;">
                                                        <div class="card-body d-flex flex-column">
                                                            <h5 class="card-title fw-bold"><?= $row['nama_kendaraan'] ?></h5>
                                                            <p class="card-text fw-bold">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?> / Hari</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "<div class='col-12 text-center'><p>Tidak ada produk tersedia.</p></div>";
                                        }
                                        $conn->close();
                                        ?>
                                    </div>  
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
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