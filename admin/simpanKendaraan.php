<?php
	include "../koneksi.php";
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$merek = $_POST['merek'];
	$plat_nomor = $_POST['plat_nomor'];
	$vfoto=$_FILES['fupload'] ['name'];
	$tfoto =$_FILES['fupload'] ['tmp_name'];
	$dir1 ="../gambar/";
	$harga_sewa = $_POST['harga_sewa'];
	$status = $_POST['status'];	
	

	// Cek apakah plat_nomor sudah ada di database
	$query = mysqli_query($conn, "SELECT plat_nomor FROM kendaraan");
	if ($query == $plat_nomor) {
		// Jika Plat Nomor sudah digunakan
		echo "<script>alert('Plat Nomor sudah digunakan!'); window.location='addKendaraan.php'</script>";
	}else{
		$simpan = mysqli_query($conn,"INSERT into kendaraan(nama,tipe,merek,plat_nomor,gambar,harga_sewa,status) values 
		('$nama', '$tipe','$merek','$plat_nomor','$vfoto','$harga_sewa','$status')");
		$upload=$dir1.$vfoto;
		move_uploaded_file($tfoto, $upload);
		if($simpan){
			echo "<script>alert('Data berhasil disimpan'); window.location='viewKendaraan.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan'); window.location='addKendaraan.php'</script>";
		}
	}
	
?>
<script>
	document.location='viewKendaraan.php'
</script>