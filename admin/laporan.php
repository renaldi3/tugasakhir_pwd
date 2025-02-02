<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Laporan</title>
	<link rel="icon" href="../logo.png"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
		<div class="container mt-4">
			<div class="card shadow-sm p-3">
			<div class="card-header bg-primary text-white">
				<h4 class="mb-0">Filter Laporan Transaksi</h4>
			</div>
				<div class="card-body">
						<form action="laporan.php" method="get">
							<div class="row g-3">
								<div class="col-12 col-md-5">
									<label for="tgl_dari" class="form-label">Dari Tanggal</label>
									<input type="date" name="tgl_dari" class="form-control" required>
								</div>
								<div class="col-12 col-md-5">
									<label for="tgl_sampai" class="form-label">Sampai Tanggal</label>
									<input type="date" name="tgl_sampai" class="form-control" required>
								</div>
								<div class="col-12 col-md-2 d-flex align-items-end">
									<button type="submit" class="btn btn-primary w-100 text-center">
										<i class="bi bi-funnel"></i> Filter
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
				<br/>
				<?php 
				if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
					$dari = $_GET['tgl_dari'];
					$sampai = $_GET['tgl_sampai'];
					?>
					<div class="card shadow-sm p-3 mb-4">
						<div class="card-header bg-primary text-white">
							<h4 class="mb-0">Laporan Transaksi dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
						</div>
						<div class="card-body">            
							<a target="_blank" href="transaksi_cetak_tanggal.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="bi bi-printer"></i> CETAK LAPORAN</a>
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
									include '../koneksi.php';
									$query = "SELECT transaksi.*, pengguna.nama_pengguna, kendaraan.nama_kendaraan, kendaraan.harga_sewa 
											FROM transaksi 
											JOIN pengguna ON transaksi.transaksi_pengguna = pengguna.id_pengguna 
											JOIN kendaraan ON transaksi.transaksi_kendaraan = kendaraan.id_kendaraan 
											WHERE DATE(transaksi_tgl_mulai) >= '$dari' AND DATE(transaksi_tgl_selesai) <= '$sampai' 
											ORDER BY transaksi_id DESC";
									$data = mysqli_query($conn, $query);
									$no = 1;
									while($d = mysqli_fetch_array($data)) {
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

<?php include 'footer.php'; ?>
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
    });
    
</script>
</body>
</html>
