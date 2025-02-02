<?php 
include '../koneksi.php';

// menangkap data id yang dikirim dari url
$id = $_GET['id'];

// menghapus transaksi
mysqli_query($conn,"delete from transaksi where transaksi_id='$id'");

// alihkan halaman ke halaman transaksi
header("location:transaksi.php");
?>
