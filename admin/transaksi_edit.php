<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Transaksi Edit</title>
    <link rel="icon" href="../logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
<!-- Page Wrapper -->
<div id="wrapper">
    <?php 
        $page = "transaksi";
        include "sidebar.php";
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php 
                include "topbar.php";
            ?>
            <div class="container card p-4 shadow mt-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Transaksi</h4>
                    </div>
                    <div class="card-body">
                    <a href="transaksi.php" class="btn btn-info btn-sm float-end">Kembali</a>

                    <?php 
                    include '../koneksi.php';

                    // Ambil ID transaksi dari URL
                    $id = $_GET['id'];

                    // Query data transaksi berdasarkan ID
                    $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_id='$id'");

                    if ($t = mysqli_fetch_array($transaksi)) {
                    ?>

                    <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">

                        <div class="mb-3">
                                    <label for="petugas" class="form-label">Petugas</label>
                                    <select class="form-select" id="petugas" name="petugas" readonly style="pointer-events: none; background-color: #e9ecef;">
                                    <?php
                                        // Pastikan sesi username ada
                                        if (isset($_SESSION['username'])) {
                                            // Koneksi ke database
                                            include '../koneksi.php';

                                            // Mengambil id_petugas dan nama_petugas berdasarkan username yang sedang login
                                            $petugas = $_SESSION['username'];
                                            $query = mysqli_query($conn, "SELECT id_petugas, nama_petugas FROM petugas WHERE username = '$petugas'");
                                            $data = mysqli_fetch_array($query);

                                            // Jika data ditemukan, tampilkan
                                            if ($data) {
                                                echo '<option value="' . $data['id_petugas'] . '">' . $data['nama_petugas'] . '</option>';
                                            } else {
                                                echo '<option value="">Data petugas tidak ditemukan</option>';
                                            }
                                        } else {
                                            echo '<option value="">Pengguna tidak login</option>';
                                        }
                                        ?>
                                    </select>
                        </div>

                        <div class="mb-3">
                            <label for="kendaraan" class="form-label">Kendaraan</label>
                            <select class="form-select" id="kendaraan" name="kendaraan" required>
                                <option value="">Pilih Kendaraan</option>
                                <?php
                                $kendaraanData = mysqli_query($conn, "SELECT * FROM kendaraan");
                                while ($d = mysqli_fetch_array($kendaraanData)) {
                                    $selected = $d['id_kendaraan'] == $t['transaksi_kendaraan'] ? 'selected' : '';
                                    echo "<option value='{$d['id_kendaraan']}' $selected data-harga='{$d['harga_sewa']}'>{$d['nama_kendaraan']} - {$d['plat_nomor']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pengguna" class="form-label">Pengguna</label>
                            <select class="form-select" id="pengguna" name="pengguna" required>
                                <option value="">Pilih Pengguna</option>
                                <?php
                                $penggunaData = mysqli_query($conn, "SELECT * FROM pengguna");
                                while ($d = mysqli_fetch_array($penggunaData)) {
                                    $selected = $d['id_pengguna'] == $t['transaksi_pengguna'] ? 'selected' : '';
                                    echo "<option value='{$d['id_pengguna']}' $selected>{$d['nama_pengguna']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $t['transaksi_tgl']; ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $t['transaksi_harga']; ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php echo $t['transaksi_tgl_mulai']; ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?php echo $t['transaksi_tgl_selesai']; ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="proses" <?php if ($t['transaksi_status'] == 'proses') echo 'selected'; ?>>Proses</option>
                                <option value="berhasil" <?php if ($t['transaksi_status'] == 'berhasil') echo 'selected'; ?>>Berhasil</option>
                                <option value="gagal" <?php if ($t['transaksi_status'] == 'gagal') echo 'selected'; ?>>Gagal</option>
                                <option value="selesai" <?php if ($t['transaksi_status'] == 'selesai') echo 'selected'; ?>>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="transaksi.php" class="btn btn-secondary">Batal</a>
                    </form>

                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</div> 


<!-- Bootstrap core JavaScript-->
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script type="text/javascript">	
        $(document).ready(function() {
        
        // Inisialisasi tanggal sekarang
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0]; // Format ke 'YYYY-MM-DD'

        // Tetapkan tanggal ke input dengan id="tgl"
        $('#tgl').val(formattedDate);

        // Inisialisasi Select2 untuk Pengguna
        $('#pengguna').select2({
            placeholder: "Pilih Pengguna",
            allowClear: true
        });

        // Inisialisasi Select2 untuk Kendaraan
        $('#kendaraan').select2({
            placeholder: "Pilih Kendaraan",
            allowClear: true
        });
        // Update harga berdasarkan kendaraan yang dipilih
        $('#kendaraan').change(function() {
            const selectedOption = $(this).find('option:selected');
            const harga = selectedOption.data('harga'); // Ambil data-harga dari opsi yang dipilih
            $('#harga').val(harga || ''); // Isi input harga, kosongkan jika tidak ada
        });
    });
</script>
</body>
</html>