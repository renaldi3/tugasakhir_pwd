<?php
// Koneksi database
include "../koneksi.php";

// Ambil parameter nomor berita dari URL
if (isset($_GET['id_pembayaran'])) {
    $id = $_GET['id_pembayaran'];

    // Ambil data berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '$id'");
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
        move_uploaded_file($temp, "../gambar/$gambar");

        // Update data dengan gambar baru
        $update = mysqli_query($conn, "UPDATE kendaraan SET nama_kendaraan='$nama', tipe='$tipe',merek='$merek',plat_nomor='$plat_nomor',gambar='$gambar',harga_sewa='$harga_sewa',status='$status' WHERE id_kendaraan='$id'");
    } else {
        // Update data tanpa mengganti gambar
        $update = mysqli_query($conn, "UPDATE kendaraan SET nama_kendaraan='$nama', tipe='$tipe',merek='$merek',plat_nomor='$plat_nomor',harga_sewa='$harga_sewa',status='$status' WHERE id_kendaraan='$id'");
    }

    if ($update) {
        echo "<script>alert('Kendaraan berhasil diupdate'); window.location='viewKendaraan.php';</script>";
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
    <title>Quick Drive - Edit Data Pembayaran</title>
    <link rel="icon" href="../logo.png"/>
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
            <?php
                include '../koneksi.php';
                $id = $_GET['id_pembayaran'];
                $sql = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran='$id'");
                while ($data = mysqli_fetch_array($sql)) {
            ?>
            <h2>Edit Data Pembayaran</h2>
                <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="petugas" class="form-label">Petugas</label>
                                    <select class="form-select" id="petugas" name="petugas" readonly style="pointer-events: none; background-color: #e9ecef;">
                                    <option  value="<?php echo $data['id_petugas']; ?>">Pilih Petugas</option>
                                    <?php
                                        // koneksi database
                                        include '../koneksi.php'; 
                                        // mengambil data petugas dari database
                                        $datas = mysqli_query($conn, "SELECT * FROM petugas");
                                        // mengubah data ke array dan menampilkannya dengan perulangan while
                                        while($d = mysqli_fetch_array($datas)){
                                        ?>
                                        
                                            <option value="<?php echo $d['id_petugas']; ?>"><?php echo $d['nama_petugas']; ?></option>
                                        <?php 
                                        }
                                        ?>		
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="pengguna" class="form-label">Pengguna</label>
                                    <select class="form-select" id="pengguna" name="pengguna">
                                        <option  value="<?php echo $data['id_pengguna']; ?>">Pilih Pengguna</option>
                                        <?php
                                        // koneksi database
                                        include '../koneksi.php'; 
                                        // mengambil data pengguna dari database
                                        $datad = mysqli_query($conn, "SELECT * FROM pengguna");
                                        // mengubah data ke array dan menampilkannya dengan perulangan while
                                        while($d = mysqli_fetch_array($datad)){
                                        ?>
                                        
                                            <option value="<?php echo $d['id_pengguna']; ?>"><?php echo $d['nama_pengguna']; ?></option>
                                        <?php 
                                        }
                                        ?>		
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="invoice" class="form-label mb-3">Invoice</label>
                                    <select class="form-select" id="invoice" name="invoice" readonly style="pointer-events: none; background-color: #e9ecef;">
                                        <?php
                                        // koneksi database
                                        include '../koneksi.php'; 
                                        // mengambil data kendaraan dari database
                                        $datar = mysqli_query($conn, "SELECT 
                                            transaksi.transaksi_id, 
                                            pengguna.nama_pengguna 
                                        FROM 
                                            transaksi 
                                        JOIN 
                                            pengguna 
                                        ON 
                                            transaksi.transaksi_pengguna = pengguna.id_pengguna");
                                        
                                        // mengubah data ke array dan menampilkannya dengan perulangan while
                                        while($d = mysqli_fetch_array($datar)){
                                        ?>
                                        <option value="<?php echo $d['transaksi_id']; ?>" >INVOICE: <?php echo $d['transaksi_id']; ?> Pemilik: <?php echo $d['nama_pengguna']; ?></option>
                                        
                                        
                                        <?php 
                                        }
                                        ?>		
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tgl" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data['tanggal_pembayaran']; ?>" ">
                                </div>	
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" value="<?php echo $data['status']; ?>" >
                                        <option value="proses" selected>Proses</option>
                                        <option value="berhasil">Berhasil</option>
                                        <option value="gagal">Gagal</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total Bayar</label>
                                    <input type="number" class="form-control" id="total" name="total" value="<?php echo $data['total_bayar']; ?>">
                                </div>
                                
                                <br/>
                               
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                <a href="viewPembayaran.php" class="btn btn-secondary">Batal</a>
                </form>
                <?php
                }
                ?>
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
