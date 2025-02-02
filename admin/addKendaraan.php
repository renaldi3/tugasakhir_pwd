<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Tambah Data Kendaraan</title>
    <link rel="icon" href="../logobersih.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<!-- Page Wrapper -->
<div id="wrapper">
<?php 
    $page = "kendaraan";
    include "sidebar.php";
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <?php 
            include "topbar.php";
        ?>
        <div class="container card p-4 shadow mt-5 mb-4">
            <h1 class="display-4">Form Tambah Data Kendaraan</h1>
            <form action="simpanKendaraan.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kendaraan" required>
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Kendaraan</label>
                <select name="tipe" id="tipe" class="form-select" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="merek" class="form-label">Merek Kendaraan</label>
                <input type="text" class="form-control" id="merek" name="merek" placeholder="Masukkan Merek Kendaraan" required>
            </div>
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" placeholder="Masukkan Plat Nomor" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="fupload" required>
            </div>
            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa Per Hari</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" placeholder="Masukkan Harga Sewa" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Kendaraan</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="disewa">Disewa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="viewKendaraan.php"><button type="button" class="btn btn-secondary mx-auto">Batal</button></a>
            </form>
        </div>
    <?php 
    include "footer.php"; 
    ?>
    </div>
</div>
</div>
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
