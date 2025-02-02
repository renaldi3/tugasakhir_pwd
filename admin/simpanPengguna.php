<?php
	include "../koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nama_pengguna = $_POST['nama_pengguna'];
	$vfoto=$_FILES['fupload'] ['name'];
	$tfoto =$_FILES['fupload'] ['tmp_name'];
	$dir1 ="../gambar/";
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];

	// Cek apakah username atau email sudah ada di database
	$query = mysqli_query($conn, "SELECT username, email FROM pengguna");
	if ($query == $username || $query === $email) {
		// Jika username atau email sudah digunakan
		
		echo "<script>alert('Username atau Email sudah digunakan!'); window.location='addPengguna.php'</script>";
	}else{
		$simpan = mysqli_query($conn,"INSERT into pengguna(username,password,email,nama_pengguna,gambar,jenis_kelamin,no_tlp,alamat) values 
		('$username', '$password','$email','$nama_pengguna','$vfoto','$jenis_kelamin','$no_tlp','$alamat')");
		$upload=$dir1.$vfoto;
		move_uploaded_file($tfoto, $upload);
		if($simpan){
			echo "<script>alert('Data berhasil disimpan'); window.location='viewPengguna.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan'); window.location='addPengguna.php'</script>";
		}
	}
	
?>
<script>
	document.location='viewPengguna.php'
</script>