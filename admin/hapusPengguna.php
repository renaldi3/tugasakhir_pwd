<?php
include "../koneksi.php";

if (isset($_GET['petugas'])) {
    $id = $_GET['petugas'];

    // Hapus data berita dari database
    $delete = mysqli_query($conn, "DELETE FROM petugas WHERE id = '$id'");

    if ($delete) {
        echo "<script>alert('User berhasil dihapus'); window.location='viewPetugas.php';</script>";
    } else {
        echo "Hapus gagal: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.location='viewPetugas.php';</script>";
}
?>
