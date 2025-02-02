<?php
include "../koneksi.php";

if (isset($_GET['id_petugas'])) {
    $id = $_GET['id_petugas'];

    // Hapus data berita dari database
    $delete = mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = '$id'");

    if ($delete) {
        echo "<script>alert('Data Petugas berhasil dihapus'); window.location='viewPetugas.php';</script>";
    } else {
        echo "Hapus gagal: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.location='viewPetugas.php';</script>";
}
?>
