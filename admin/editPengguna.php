<?php
// Koneksi database
include "../koneksi.php";

// Ambil parameter nomor berita dari URL
if (isset($_GET['id_pengguna'])) {
    $id = $_GET['id_pengguna'];

    // Ambil data berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$id'");
    $data = mysqli_fetch_array($query);
}

// Proses update data
if (isset($_POST['update'])) {
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nama_pengguna = $_POST['nama_pengguna'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];

    // Cek jika ada file gambar yang diupload
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($temp, "../gambar/$gambar");

        // Update data dengan gambar baru
        $update = mysqli_query($conn, "UPDATE pengguna SET password='$password', email='$email', nama_pengguna='$nama_pengguna', gambar='$gambar', jenis_kelamin='$jenis_kelamin', no_tlp='$no_tlp', alamat='$alamat' WHERE id_pengguna='$id'");
    } else {
        // Update data tanpa mengganti gambar
        $update = mysqli_query($conn, "UPDATE pengguna SET password='$password', email='$email', nama_pengguna='$nama_pengguna', jenis_kelamin='$jenis_kelamin', no_tlp='$no_tlp', alamat='$alamat' WHERE id_pengguna='$id'");
    }

    if ($update) {
        echo "<script>alert('Pengguna berhasil diupdate'); window.location='viewPengguna.php';</script>";
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
    <title>Quick Drive - Edit Data Pengguna</title>
    <link rel="icon" href="../logobersih.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
<?php 
    $page = "pengguna";
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
                $id = $_GET['id_pengguna'];
                $sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id'");
                while ($data = mysqli_fetch_array($sql)) {
            ?>
            <h1 class="display-4">Form Edit Data Pengguna</h1>
            <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" >
            </div>
            <div class="mb-3">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>"  >
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" value="<?php echo $data['gambar']; ?>" name="gambar">
            </div>
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select mb-4" >
            <option value="<?php echo $data['jenis_kelamin']; ?>" >-- Pilih Jenis Kelamin --</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
            </select>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $data['no_tlp']; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
            </div>

            <button type="submit" name="update" class="btn btn-success">Submit</button>
            <a href="viewPengguna.php"><button type="button" class="btn btn-secondary mx-auto">Batal</button></a>
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
