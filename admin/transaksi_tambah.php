<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Transaksi Tambah</title>
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
                        <h1 class="display-5">Tambah Transaksi</h1>
                    </div>
                    <div class="card-body">
                            <form method="post" action="transaksi_aksi.php">
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
                                    <label for="pengguna" class="form-label">Pengguna</label>
                                    <select class="form-select" id="pengguna" name="pengguna" required>
                                        <option value="">Pilih Pengguna</option>
                                        <?php
                                        // koneksi database
                                        include '../koneksi.php'; 
                                        // mengambil data pengguna dari database
                                        $data = mysqli_query($conn, "SELECT * FROM pengguna");
                                        // mengubah data ke array dan menampilkannya dengan perulangan while
                                        while($d = mysqli_fetch_array($data)){
                                        ?>
                                        
                                            <option value="<?php echo $d['id_pengguna']; ?>"><?php echo $d['nama_pengguna']; ?></option>
                                        <?php 
                                        }
                                        ?>		
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kendaraan" class="form-label mb-3">Kendaraan</label>
                                    <select class="form-select form-select-lg" id="kendaraan" name="kendaraan" required>
                                        <option value="">Pilih kendaraan</option>
                                        <?php
                                        // koneksi database
                                        include '../koneksi.php'; 
                                        // mengambil data kendaraan dari database
                                        $data = mysqli_query($conn, "SELECT * FROM kendaraan");
                                        // mengubah data ke array dan menampilkannya dengan perulangan while
                                        while($d = mysqli_fetch_array($data)){
                                        ?>
                                        
                                            <option value="<?php echo $d['id_kendaraan']; ?>" data-harga="<?php echo $d['harga_sewa']; ?>"><?php echo $d['nama_kendaraan']; ?> - <?php echo $d['plat_nomor']; ?></option>
                                        <?php 
                                        }
                                        ?>		
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tgl" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl" readonly style="pointer-events: none; background-color: #e9ecef;">
                                </div>	

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Per Hari</label>
                                    <input type="number" class="form-control" id="harga" name="harga" readonly style="pointer-events: none; background-color: #e9ecef;">
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                                </div>	
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="proses" selected>Proses</option>
                                        <option value="berhasil">Berhasil</option>
                                        <option value="gagal">Gagal</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <a href="transaksi.php"><button type="button" class="btn btn-secondary mx-auto">Batal</button></a>	
                            </form>
                    </div>
                </div>
            </div>
    
        </div>
        <!-- Main Content -->
    <?php 
    include "footer.php";
    ?>     
    </div><!-- Footer -->

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