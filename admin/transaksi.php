<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Data Transaksi</title>
    <link rel="icon" href="../logo.png"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
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
                <div class="container mt-5 mb-5">
                    <div class="card shadow">
                        <div class="card-header py-3 align-items-center justify-content-between">
                            <h4 class="display-5">Data Transaksi Rental</h4>
                            <a href="laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a>
                            <a href="laporan_pengguna.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Buat Laporan Pengguna</a>
                        </div>
                        
                        <div class="card-body">
                            <a href="transaksi_tambah.php" class="btn btn-primary btn-sm mb-4"> <i class="bi bi-plus"></i> Transaksi Baru</a>
                            <br/>

                            <table class="table table-bordered table-responsive table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>OPSI</th>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Pengguna</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Tipe</th>
                                        <th>Plat Nomor</th>
                                        <th>Petugas</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Harga</th>
                                        <th>Status</th>				    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // koneksi database
                                    include '../koneksi.php';

                                    // mengambil data pelanggan dari database
                                    $data = mysqli_query($conn,
                                    "SELECT 
                                    transaksi.*, 
                                    pengguna.nama_pengguna,
                                    pengguna.id_pengguna, 
                                    kendaraan.nama_kendaraan, 
                                    kendaraan.plat_nomor, 
                                    kendaraan.tipe,
                                    petugas.nama_petugas

                                    FROM 
                                    transaksi
                                    JOIN pengguna ON transaksi.transaksi_pengguna = pengguna.id_pengguna
                                    JOIN kendaraan ON transaksi.transaksi_kendaraan = kendaraan.id_kendaraan
                                    JOIN petugas ON transaksi.transaksi_petugas = petugas.id_petugas
                                    ORDER BY transaksi.transaksi_id DESC"                            
                                    );
                                    $no = 1;
                                    // mengubah data ke array dan menampilkannya dengan perulangan while
                                    while($d = mysqli_fetch_array($data)){ ?>
                                        <tr>
                                            <td>
                                                <a href="transaksi_invoice_cetak.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-warning btn-sm mb-2">Invoice
                                                </a>
                                                <a href="transaksi_edit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-info btn-sm mb-2">Edit
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $d ['transaksi_id']; ?>">
                                                Batal
                                                </button>
                                            </td>
                                            <td><?php echo $no++; ?></td>
                                            <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                                            <td><?php echo $d['transaksi_tgl']; ?></td>
                                            <td><?php echo $d['nama_pengguna']; ?></td>
                                            <td><?php echo $d['nama_kendaraan']; ?></td>
                                            <td><?php echo $d['tipe']; ?></td>
                                            <td><?php echo $d['plat_nomor']; ?></td>
                                            <td><?php echo $d['nama_petugas']; ?></td>
                                            <td><?php echo $d['transaksi_tgl_mulai']; ?></td>
                                            <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                                            <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." "; ?></td>
                                            <td>
                                                <?php 
                                                if($d['transaksi_status'] == "berhasil"){
                                                    echo "<span class='badge bg-warning fs-6 shadow text-white'>BERHASIL</span>";
                                                } elseif($d['transaksi_status'] == "proses"){
                                                    echo "<span class='badge  bg-info fs-6 shadow text-white'>PROSES</span>";
                                                } elseif($d['transaksi_status'] == "gagal"){
                                                    echo "<span class='badge bg-danger fs-6 shadow text-white'>GAGAL</span>";
                                                } elseif($d['transaksi_status'] == "selesai"){
                                                    echo "<span class='badge bg-success fs-6 shadow text-white'>SELESAI</span>";
                                                }
                                                ?>							
                                            </td>
                                            
                                        </tr>
                                    <?php 
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Membatalkan Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Membatalkan Data Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger modal-delete-btn">
                <a href="transaksi_hapus.php?id=" id="delete-link" class="text-decoration-none text-white">Batal</a>
                </button>
            </div>
            </div>
        </div>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    
</div>
<?php 
    include "footer.php";
?>
<!-- datatables -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    
     <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready( function () { 
    $('#myTable').DataTable();
    // Handle click event on delete buttons
    $('.delete-btn').click(function () {
    // Get the ID of the customer to be deleted
    var id = $(this).data('id');
    // Set the href attribute of the delete link in the modal
    $('#delete-link').attr('href', 'transaksi_hapus.php?id=' + id);
    });
    });
    
</script>

</body>
</html>

