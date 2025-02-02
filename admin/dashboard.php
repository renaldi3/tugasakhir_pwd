<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../logo.png"/>
    <title>Quick Drive - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
        <?php 
        include '../koneksi.php';
        //ambil jumlah pelanggan dari database
        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM kendaraan");
        $data = mysqli_fetch_assoc($result);
        $total_kendaraan = $data['total'];
        $results = mysqli_query($conn, "SELECT COUNT(*) AS totals FROM pengguna");
        $data = mysqli_fetch_assoc($results);
        $total_pengguna= $data['totals'];
        $resultd = mysqli_query($conn, "SELECT COUNT(*) AS totald FROM transaksi");
        $data = mysqli_fetch_assoc($resultd);
        $total_transaksi= $data['totald'];
        $resulte = mysqli_query($conn, "SELECT COUNT(*) AS totale FROM petugas ");
        $data = mysqli_fetch_assoc($resulte);
        $total_petugas= $data['totale'];
        ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            $page = "dashboard";
            include "sidebar.php";            
            
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php 
                    include "topbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Kendaraan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kendaraan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pengguna ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_transaksi ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Petugas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_petugas ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                            
                     <!-- Collapsable Card Example -->
                     <div class="card shadow mb-4">
                        <h4 class="display-5 text-center card-header py-3 align-items-center justify-content-between">Katalog Mobil & Motor</h4>
                                <a>
                                    <!-- Filter Buttons -->
                                    <div class="d-flex justify-content-center my-4">
                                        <button class="btn btn-outline-primary mx-2" onclick="filterKendaraan('')">Semua</button>
                                        <button class="btn btn-outline-success mx-2" onclick="filterKendaraan('Tersedia')">Tersedia</button>
                                        <button class="btn btn-outline-danger mx-2" onclick="filterKendaraan('Disewa')">Disewa</button>
                                    </div>
                                </a>
                                <!-- Card Content - Collapse -->
                        <div >
                                <div class="card-body">
                                      <!-- Kendaraan Section -->
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-4" id="kendaraanContainer">
                                        <?php
                                        include '../koneksi.php';
                                        $query = mysqli_query($conn, "SELECT * FROM kendaraan");
                                        if ($query->num_rows > 0) {
                                            while ($row = $query->fetch_assoc()) {
                                                ?>
                                                <div class="col kendaraan-item" data-status="<?= $row['status'] ?>">
                                                    <div class="card h-100 shadow-sm">
                                                        <img src="<?php echo "../gambar/$row[gambar]"?>" alt="<?= $row['nama_kendaraan'] ?>" class="card-img-top img-fluid object-fit-cover" style="height: 200px;">
                                                        <div class="card-body d-flex flex-column">
                                                            <h5 class="card-title fw-bold"><?= $row['nama_kendaraan'] ?></h5>
                                                            <p class="card-title"><?= $row['status'] ?></p>
                                                            <p class="card-text fw-bold">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?> / Hari</p>
                                                            <div class="mt-auto">
                                                                <button class="btn btn-primary rounded-pill btn-large" data-id="<?= $row['id_kendaraan'] ?>">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
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
            <!-- End of Main Content -->

           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
 <?php 
                include "footer.php";
            ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Script Filter -->
    <script>
    function filterKendaraan(status) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `filter_kendaraan.php?status=${status}`, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Masukkan data dari server ke dalam container
                document.getElementById('kendaraanContainer').innerHTML = xhr.responseText;
            } else {
                console.error("Gagal memuat data kendaraan.");
            }
        };
        xhr.send();
    }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    

</body>

</html>