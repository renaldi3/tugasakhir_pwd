<?php
	include "../koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_petugas = $_POST['nama_petugas'];
	$email = $_POST['email'];
	$role = $_POST['peran'];

	// Cek apakah username atau email sudah ada di database
	$query = mysqli_query($conn, "SELECT username, email FROM petugas");
	if ($query == $username || $query == $email) {
		// Jika username atau email sudah digunakan
		
		echo "<script>alert('Username atau Email sudah digunakan!'); window.location='addPetugas.php'</script>";
	}else{
		$simpan = mysqli_query($conn,"INSERT into petugas(username,password,nama_petugas,email,role) values 

		('$username', '$password','$nama_petugas','$email','$role')");
		if($simpan){
			echo "<script>alert('Data berhasil disimpan'); window.location='viewPetugas.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan'); window.location='addPetugas.php'</script>";
		}
	}
	
?>
<script>
	document.location='viewUsers.php'
</script>