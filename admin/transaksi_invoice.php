<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Invoice Print Pengguna</title>
    <link rel="icon" href="../logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styling untuk tampilan layar */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-header p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .invoice-details {
            margin-bottom: 20px;
            font-size: 16px;
        }
        .invoice-details strong {
            display: inline-block;
            width: 120px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .invoice-table td.text-end {
            text-align: right;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }


    </style>
</head>
<body>

<?php
session_start();
include '../koneksi.php';

// Ambil id_pengguna dari parameter GET
if (isset($_GET['pengguna'])) {
    $id_pengguna = $_GET['pengguna'];
} else {
    die("Pengguna tidak valid!");
}

if (!isset($_SESSION['username'])) {
    die("Petugas tidak ditemukan!");
}
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT nama_petugas FROM petugas WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);
$nama_petugas = $row['nama_petugas'];


// Query untuk mengambil data pengguna dan transaksi
$query = "
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
        transaksi.transaksi_pengguna = '$id_pengguna'
";

$result = mysqli_query($conn, $query);

// Data pengguna
$data_pengguna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'"));
$username = $data_pengguna['username'];
$nama_pengguna = $data_pengguna['nama_pengguna'];

// Tanggal laporan
$tanggal_laporan = date('d-m-Y');


?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card no-print"> <!-- Sembunyikan card saat cetak -->
                <div class="card-body">
                    <div class="invoice-header">
                        <h2>RENTAL QUICK DRIVE</h2>
                        <p><i>jl.Tzyliwangy No.6</i></p>
                    </div>
                    <h4 class="text-uppercase text-center mb-3">INVOICE</h4>
                    <div class="invoice-details">
                        <strong>Tanggal Cetak:</strong> <?php echo $tanggal_laporan; ?><br>
                        <strong>Dibuat Oleh:</strong><b><?php echo $nama_petugas; ?></b><br><br>
                        <strong>Username:</strong> <?php echo $username; ?><br>
                        <strong>Nama:</strong> <?php echo $nama_pengguna; ?><br>
                        <strong>Alamat:</strong> <?php echo $data_pengguna['alamat']; ?><br>
                        <strong>No Telepon:</strong> <?php echo $data_pengguna['no_tlp']; ?>
                    </div>
                    <hr>
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice ID</th>
                                <th>Kendaraan</th>
                                <th>Durasi</th>
                                <th>Harga/Hari</th>
                                <th>Total</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $grand_total = 0; // Inisialisasi grand total
                            while ($t = mysqli_fetch_array($result)) {
                                // Hitung durasi
                                $tgl_mulai = new DateTime($t['transaksi_tgl_mulai']);
                                $tgl_selesai = new DateTime($t['transaksi_tgl_selesai']);
                                $durasi = $tgl_mulai->diff($tgl_selesai)->days + 1;
                                $total_harga_sewa = $t['harga_sewa'] * $durasi;
                                $grand_total += $total_harga_sewa; // Tambahkan ke grand total

                                // Format tanggal
                                $tgl_mulai_formatted = $tgl_mulai->format('d-m-Y');
                                $tgl_selesai_formatted = $tgl_selesai->format('d-m-Y');
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $t['transaksi_id']; ?></td>
                                <td>
                                    <?php echo $t['nama_kendaraan']; ?> (<?php echo $t['tipe']; ?>)<br>
                                    <small>Plat: <?php echo $t['plat_nomor']; ?></small>
                                </td>
                                <td><?php echo $tgl_mulai_formatted; ?> s/d <?php echo $tgl_selesai_formatted; ?> (<?php echo $durasi; ?> Hari)</td>
                                <td class="text-end">Rp. <?php echo number_format($t['harga_sewa']); ?></td>
                                <td class="text-end">Rp. <?php echo number_format($total_harga_sewa); ?></td>
                                <td><?php echo $t['transaksi_tgl']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="5" class="text-end"><strong>Grand Total:</strong></td>
                                <td class="text-end"><strong>Rp. <?php echo number_format($grand_total); ?></strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="invoice-footer">
                        <p><i>"Terima kasih telah mempercayai layanan kami."</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>