<?php
include "../koneksi.php";

if (isset($_GET['id_kendaraan'])) {
    $id = $_GET['id_kendaraan'];

    // Hapus data berita dari database
    $delete = mysqli_query($conn, "DELETE FROM kendaraan WHERE id_kendaraan = '$id'");

    if ($delete) {
        echo "<script>alert('Data Kendaraan berhasil dihapus'); window.location='viewKendaraan.php';</script>";
    } else {
        echo "Hapus gagal: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.location='viewKendaraan.php';</script>";
}
?>
