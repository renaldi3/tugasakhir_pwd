<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    die("Petugas tidak ditemukan!");
}

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT nama_petugas FROM petugas WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);
$nama_petugas = $row['nama_petugas'];

if (isset($_GET['dari']) && isset($_GET['sampai'])) {
    $dari = $_GET['dari'];
    $sampai = $_GET['sampai'];
} else {
    die("Tanggal tidak valid!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Laporan Transaksi Per Tanggal</title>
    <link rel="icon" href="../logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 210mm; /* Lebar kertas A4 */
            margin: 0 auto;
            padding: 10mm; /* Margin kertas */
        }
        .header-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .header-title h2 {
            font-size: 24px;
            margin: 0;
        }
        .header-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
        }
       
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header-title">
            <h2>Laporan Transaksi Rental Quick Drive</h2>
        </div>
        <div class="header-info">
            <p>Periode: <b><?php echo $dari; ?></b> - <b><?php echo $sampai; ?></b></p>
            <p>Dibuat oleh: <b><?php echo $nama_petugas; ?></b> | Tanggal: <b><?php echo date('d-m-Y'); ?></b></p>
        </div>

        <!-- Tabel Data Transaksi -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pelanggan</th>
                    <th>Kendaraan</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT transaksi.*, pengguna.nama_pengguna, kendaraan.nama_kendaraan, kendaraan.harga_sewa 
                          FROM transaksi 
                          JOIN pengguna ON transaksi.transaksi_pengguna = pengguna.id_pengguna 
                          JOIN kendaraan ON transaksi.transaksi_kendaraan = kendaraan.id_kendaraan 
                          WHERE DATE(transaksi_tgl_mulai) >= '$dari' AND DATE(transaksi_tgl_selesai) <= '$sampai' 
                          ORDER BY transaksi_id DESC";
                $data = mysqli_query($conn, $query);
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                    $tgl_mulai = new DateTime($d['transaksi_tgl_mulai']);
                    $tgl_selesai = new DateTime($d['transaksi_tgl_selesai']);
                    $durasi = $tgl_mulai->diff($tgl_selesai)->days + 1;
                    $total_harga = $d['harga_sewa'] * $durasi;
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INV-<?php echo $d['transaksi_id']; ?></td>
                    <td><?php echo $d['transaksi_tgl']; ?></td>
                    <td><?php echo $d['transaksi_tgl_mulai']; ?></td>
                    <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                    <td><?php echo $d['nama_pengguna']; ?></td>
                    <td><?php echo $d['nama_kendaraan']; ?></td>
                    <td><?php echo $durasi; ?> Hari</td>
                    <td>Rp. <?php echo number_format($total_harga); ?></td>
                    <td><?php echo $d['transaksi_status']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Laporan ini dibuat secara otomatis oleh sistem.</p>
        </div>
    </div>
</body>
</html>