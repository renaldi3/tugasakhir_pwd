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
        $_SESSION['status'] = "login";
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php"); // Redirect ke dashboard petugas
    } elseif ($result_pengguna->num_rows > 0) {
        // Login sebagai pengguna
        $user = $result_pengguna->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['status'] = "login";
        $_SESSION['role'] = 'pengguna'; // Set role ke 'pengguna'
        header("Location: header.php"); // Redirect ke halaman pengguna
    } else {
        // Login gagal
        header("location:index.php?pesan=gagal");
    }
}

?>