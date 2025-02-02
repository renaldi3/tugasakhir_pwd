<?php
session_start();
include '../koneksi.php';

if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit();
}

date_default_timezone_set('Asia/Jakarta');

// Cek apakah ada ID transaksi yang dikirim
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Transaksi tidak valid!");
}
if (!isset($_SESSION['username'])) {
    die("Petugas tidak ditemukan!");
}
$id_transaksi = mysqli_real_escape_string($conn, $_GET['id']);

// Ambil data transaksi berdasarkan transaksi_id
$transaksi = mysqli_query($conn, "
    SELECT 
        transaksi.*, 
        pengguna.nama_pengguna, pengguna.no_tlp as tlp_pengguna, pengguna.alamat AS alamat_pengguna,
        kendaraan.nama_kendaraan, kendaraan.plat_nomor, kendaraan.tipe, kendaraan.harga_sewa
    FROM 
        transaksi
    JOIN 
        pengguna ON transaksi.transaksi_pengguna = pengguna.id_pengguna
    JOIN 
        kendaraan ON transaksi.transaksi_kendaraan = kendaraan.id_kendaraan
    WHERE 
        transaksi.transaksi_id = '$id_transaksi'
");

// Cek apakah data ditemukan
if (mysqli_num_rows($transaksi) == 0) {
    die("Transaksi tidak ditemukan!");
}

$t = mysqli_fetch_assoc($transaksi);

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT nama_petugas FROM petugas WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);
$nama_petugas = $row['nama_petugas'];

// Menghitung durasi dan total harga sewa
$tgl_mulai = new DateTime($t['transaksi_tgl_mulai']);
$tgl_selesai = new DateTime($t['transaksi_tgl_selesai']);
$durasi = $tgl_mulai->diff($tgl_selesai)->days + 1;
$total_harga_sewa = $t['harga_sewa'] * $durasi;

$tanggal_laporan = date('d-m-Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Invoice Transaksi Pengguna</title>
    <link rel="icon" href="../logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0;
        }
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2>RENTAL QUICK DRIVE</h2>
        <p><i>jl.Tzyliwangy No.6</i></p>
        <h4 class="text-uppercase">Invoice Transaksi</h4>
        <br>
        <p><strong>Tanggal Dibuat: <?php echo $tanggal_laporan; ?></strong></p>
        <p><strong>Dibuat Oleh: <?php echo $nama_petugas; ?></strong></p>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Invoice ID</th>
            <td><?php echo "INV-" . $t['transaksi_id']; ?></td>
        </tr>
        <tr>
            <th>Pelanggan</th>
            <td><?php echo $t['nama_pengguna']; ?> <br> 
                <small><?php echo $t['alamat_pengguna']; ?>, Telp: <?php echo $t['tlp_pengguna']; ?></small>
            </td>
        </tr>
        <tr>
            <th>Kendaraan</th>
            <td><?php echo $t['nama_kendaraan']; ?> (<?php echo $t['tipe']; ?>) <br>
                <small>Plat: <?php echo $t['plat_nomor']; ?></small>
            </td>
        </tr>
        <tr>
            <th>Durasi</th>
            <td><?php echo $tgl_mulai->format('d-m-Y') . " s/d " . $tgl_selesai->format('d-m-Y'); ?> (<?php echo $durasi; ?> Hari)</td>
        </tr>
        <tr>
            <th>Harga per Hari</th>
            <td>Rp. <?php echo number_format($t['harga_sewa']); ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td><strong>Rp. <?php echo number_format($total_harga_sewa); ?></strong></td>
        </tr>
        <tr>
            <th>Tanggal Transaksi</th>
            <td><?php echo $t['transaksi_tgl']; ?></td>
        </tr>
    </table>

    <div class="text-center mt-4">
    <p><i>"Terima kasih telah mempercayai layanan kami."</i></p>        
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
