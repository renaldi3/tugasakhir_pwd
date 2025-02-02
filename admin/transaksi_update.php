<?php
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$pengguna = $_POST['pengguna'];
$kendaraan = $_POST['kendaraan'];
$tgl = $_POST['tgl'];
$harga = $_POST['harga']; // Harga sudah diambil dari select kendaraan
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
$status = $_POST['status'];

// Validasi tanggal (opsional, tapi disarankan)
if ($tgl_mulai > $tgl_selesai) {
    echo "<script>alert('Tanggal mulai tidak boleh melebihi tanggal selesai!'); window.location='transaksi.php';</script>";
    exit(); // Penting untuk menghentikan eksekusi script
}


$total_harga = $harga;

// Update data transaksi
$query = "UPDATE transaksi SET 
            transaksi_pengguna='$pengguna', 
            transaksi_kendaraan='$kendaraan', 
            transaksi_tgl='$tgl',
            transaksi_harga='$total_harga',
            transaksi_tgl_mulai='$tgl_mulai', 
            transaksi_tgl_selesai='$tgl_selesai', 
            transaksi_status='$status' 
          WHERE transaksi_id='$id'";

if (mysqli_query($conn, $query)) {
    header("location:transaksi.php");
} else {
    echo "Error updating record: " . mysqli_error($conn); // Tampilkan pesan error jika query gagal
}
?>