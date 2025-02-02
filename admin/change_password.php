<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Ganti Password</title>
    <link rel="icon" href="../logo.png"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
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
        <div class="container mt-5">
            <div class="card mx-auto shadow p-4" style="max-width: 500px;">
                <h3 class="text-center">Ganti Password</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php echo $data['username']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_petugas']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary w-100">Update Password</button>
                </form>
                <a href="dashboard.php" class="btn btn-secondary mt-3 w-100">Batal</a>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    
     <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
<?php
include "../koneksi.php";

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location='login.php';</script>";
    exit;
}

$username = $_SESSION['username'];

// Ambil data pengguna yang login
$query = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
$data = mysqli_fetch_array($query);

// Pastikan hanya bisa edit data sendiri
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit;
}

// Proses update password
if (isset($_POST['update'])) {
    $password_baru = $_POST['password'];

    if (!empty($password_baru)) {
        $update = mysqli_query($conn, "UPDATE petugas SET password='$password_baru' WHERE username='$username'");
        if ($update) {
            echo "<script>alert('Password berhasil diupdate!'); window.location='dashboard.php';</script>";
        } else {
            echo "Gagal memperbarui password: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Password tidak boleh kosong!');</script>";
    }
}
?>
</body>
</html>
