<?php
// Koneksi database
include "../koneksi.php";

// Ambil parameter nomor berita dari URL
if (isset($_GET['id_kendaraan'])) {
    $id = $_GET['id_kendaraan'];

    // Ambil data berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_kendaraan = '$id'");
    $data = mysqli_fetch_array($query);
}

// Proses update data
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$merek = $_POST['merek'];
	$plat_nomor = $_POST['plat_nomor'];
	$harga_sewa = $_POST['harga_sewa'];
	$status = $_POST['status'];	

    // Cek jika ada file gambar yang diupload
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($temp, "gambar/$gambar");

        // Update data dengan gambar baru
        $update = mysqli_query($conn, "UPDATE kendaraan SET nama='$nama', tipe='$tipe',merek='$merek',plat_nomor='$plat_nomor',gambar='$gambar',harga_sewa='$harga_sewa',status='$status' WHERE id_kendaraan='$id'");
    } else {
        // Update data tanpa mengganti gambar
        $update = mysqli_query($conn, "UPDATE kendaraan SET nama='$nama', tipe='$tipe',merek='$merek',plat_nomor='$plat_nomor',harga_sewa='$harga_sewa',status='$status' WHERE id_kendaraan='$id'");
    }

    if ($update) {
        echo "<script>alert('User berhasil diupdate'); window.location='viewKendaraan.php';</script>";
    } else {
        echo "Update gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id ="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
        <?php 
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
            <h2>Edit Data Kendaraan</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kendaraan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Kendaraan</label>
                        <select name="tipe" id="tipe" class="form-select">
                            <option value="<?php echo $data['tipe']; ?>">-- Pilih Tipe --</option>
                            <option value="mobil">Mobil</option>
                            <option value="motor">Motor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek Kendaraan</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="<?php echo $data['merek']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="plat_nomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="<?php echo $data['plat_nomor']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="fupload" value="<?php echo $data['gambar']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga_sewa" class="form-label">Harga Sewa Per Hari</label>
                        <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="<?php echo $data['harga_sewa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Kendaraan</label>
                        <select name="status" id="status" class="form-select" >
                            <option value="<?php echo $data['status']; ?>">-- Pilih Status --</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="disewa">Disewa</option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="viewKendaraan.php" class="btn btn-secondary">Batal</a>
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
</body>
</html>
