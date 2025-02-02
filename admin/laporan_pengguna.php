<?php
include '../koneksi.php'; // Pastikan file koneksi.php sudah benar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Laporan Transaksi Pengguna</title>
    <link rel="icon" href="../logo.png"/>    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php 
        $page = "transaksi";
        include "sidebar.php"; // Pastikan file sidebar.php sudah benar
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar.php"; // Pastikan file topbar.php sudah benar ?>
                <div class="container mt-4">
                    <!-- Card Form Pencarian -->
                    <div class="card shadow-sm p-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Cari Laporan Transaksi Berdasarkan Nama Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="pengguna" class="form-label">Nama Pengguna</label>
                                        <select class="form-select select2" id="pengguna" name="pengguna" required>
                                            <option value="">Pilih Pengguna</option>
                                            <?php
                                            $penggunaData = mysqli_query($conn, "SELECT * FROM pengguna");
                                            while ($d = mysqli_fetch_array($penggunaData)) {
                                                $selected = isset($_GET['pengguna']) && $_GET['pengguna'] == $d['id_pengguna'] ? 'selected' : '';
                                                echo "<option value='{$d['id_pengguna']}' $selected>{$d['nama_pengguna']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 align-self-end">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <?php 
                    if (isset($_GET['pengguna']) && $_GET['pengguna'] != '') {
                        $pengguna_id = $_GET['pengguna'];
                        $query = "SELECT transaksi.*, pengguna.nama_pengguna, kendaraan.nama_kendaraan, kendaraan.harga_sewa 
                                FROM transaksi 
                                JOIN pengguna ON transaksi.transaksi_pengguna = pengguna.id_pengguna 
                                JOIN kendaraan ON transaksi.transaksi_kendaraan = kendaraan.id_kendaraan 
                                WHERE pengguna.id_pengguna = '$pengguna_id' 
                                ORDER BY transaksi_id DESC";
                        $data = mysqli_query($conn, $query);
                        if (!$data) {
                            die("Query error: " . mysqli_error($conn));
                        }
                    ?>
                    <!-- Card Hasil Pencarian -->
                    <div class="card shadow-sm p-3 mb-4">
                        <div class="card-header bg-primary text-white">
                            <?php
                            $idpengguna = $_GET['pengguna'];
                            $query_pengguna = "SELECT nama_pengguna FROM pengguna WHERE id_pengguna = $idpengguna";
                            $result_pengguna = mysqli_query($conn, $query_pengguna);
                            if ($result_pengguna && mysqli_num_rows($result_pengguna) > 0) {
                                $d = mysqli_fetch_array($result_pengguna);
                                echo "<h4 class='mb-0'>Hasil Pencarian untuk: <b>{$d['nama_pengguna']}</b></h4>";
                            } else {
                                echo "<h4 class='mb-0'>Hasil Pencarian</h4>";
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <a target="_blank" href="transaksi_invoice.php?pengguna=<?php echo urlencode($pengguna_id); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-print"></i> CETAK LAPORAN
                            </a>
                            <br/><br/>
                            <table class="table table-bordered table-striped table-hover" id="myTable">
                                <thead class="table-dark text-center">
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
                                    $no = 1;
                                    while ($d = mysqli_fetch_array($data)) {
                                        $tgl_mulai = new DateTime($d['transaksi_tgl_mulai']);
                                        $tgl_selesai = new DateTime($d['transaksi_tgl_selesai']);
                                        $durasi = $tgl_mulai->diff($tgl_selesai)->days + 1;
                                        $total_harga = $d['harga_sewa'] * $durasi;
                                    ?>
                                    <tr class="text-center">
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
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; // Pastikan file footer.php sudah benar ?>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Custom Scripts -->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $('.select2').select2({
                placeholder: "Pilih Pengguna",
                allowClear: true
            });
        });
    </script>
</body>
</html>