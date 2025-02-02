<?php
include "../koneksi.php";

if (isset($_GET['id_pengguna'])) {
    $id = $_GET['id_pengguna'];

    // Hapus data berita dari database
    $delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id_pengguna = '$id'");

    if ($delete) {
        echo "<script>alert('Data Pengguna berhasil dihapus'); window.location='viewPengguna.php';</script>";
    } else {
        echo "Hapus gagal: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.location='viewPengguna.php';</script>";
}
?>
