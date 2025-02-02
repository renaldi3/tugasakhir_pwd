<?php
include "../koneksi.php";

if (isset($_GET['id_pembayaran'])) {
    $id = $_GET['id_pembayaran'];

    // Hapus data berita dari database
    $delete = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = '$id'");

    if ($delete) {
        echo "<script>alert('Data Pembayaran berhasil dihapus'); window.location='viewpembayaran.php';</script>";
    } else {
        echo "Hapus gagal: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.location='viewPembayaran.php';</script>";
}
?>
