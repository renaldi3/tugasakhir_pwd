<?php
// Koneksi database
include "../koneksi.php";

// Ambil parameter nomor berita dari URL
if (isset($_GET['petugas'])) {
    $id = $_GET['petugas'];

    // Ambil data berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
}

// Proses update data
if (isset($_POST['update'])) {
    $username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['peran'];

    $update = mysqli_query($conn, "UPDATE petugas SET username='$username', password='$password', role='$role' WHERE id='$id'");
    

    if ($update) {
        echo "<script>alert('User berhasil diupdate'); window.location='viewPetugas.php';</script>";
    } else {
        echo "Update gagal: " . mysqli_error($conn);
    }
}
include "../header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container card p-4 shadow mt-5">
    <h2>Edit Data Petugas</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" required>
            </div>
            <label for="peran" class="form-label">Peran</label>
            <select name="peran" id="peran" class="form-select mb-5" required>
                <option value="">--Silahkan Pilih Peran--</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="viewPetugas.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <?php
    include "../footer.php";
    ?>
</body>
</html>
