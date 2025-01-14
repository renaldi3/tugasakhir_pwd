<?php
	include "../koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];

	// Cek apakah username atau email sudah ada di database
	$query = mysqli_query($conn, "SELECT username, email FROM pengguna");
	if ($query == $username || $query === $email) {
		// Jika username atau email sudah digunakan
		
		echo "<script>alert('Username atau Email sudah digunakan!'); window.location='addPengguna.php'</script>";
	}else{
		$simpan = mysqli_query($conn,"INSERT into pengguna(username,password,email,nama,jk,no_tlp,alamat) values 
		('$username', '$password','$email','$nama','$jk','$no_tlp','$alamat')");
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