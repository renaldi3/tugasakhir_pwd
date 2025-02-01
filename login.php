<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk tabel petugas
    $query_petugas = $conn->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
    $query_petugas->bind_param('ss', $username, $password);
    $query_petugas->execute();
    $result_petugas = $query_petugas->get_result();

    // Query untuk tabel pengguna
    $query_pengguna = $conn->prepare("SELECT * FROM pengguna WHERE username = ? AND password = ?");
    $query_pengguna->bind_param('ss', $username, $password);
    $query_pengguna->execute();
    $result_pengguna = $query_pengguna->get_result();

    if ($result_petugas->num_rows > 0) {
        // Login sebagai petugas
        $user = $result_petugas->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama_petugas']; // Simpan nama petugas
        $_SESSION['gambar'] = $user['gambar']; // Simpan gambar petugas
        $_SESSION['role'] = $user['role'];
        $_SESSION['status'] = "login";
        header("Location: admin/dashboard.php"); // Redirect ke dashboard petugas
    } elseif ($result_pengguna->num_rows > 0) {
        // Login sebagai pengguna
        $user = $result_pengguna->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama_pengguna']; // Simpan nama pengguna
        $_SESSION['gambar'] = $user['gambar']; // Simpan gambar pengguna
        $_SESSION['role'] = 'pengguna'; // Set role ke 'pengguna'
        $_SESSION['status'] = "login";
        header("Location: pengguna/index.php"); // Redirect ke halaman pengguna
    } else {
        // Login gagal
        header("location:index.php?pesan=gagal");
    }
}
?>
