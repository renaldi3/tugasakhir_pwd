<?php
	include "../koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_petugas = $_POST['nama_petugas'];
	$vfoto=$_FILES['fupload'] ['name'];
	$tfoto =$_FILES['fupload'] ['tmp_name'];
	$dir1 ="../gambar/";
	$email = $_POST['email'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];
	$role = $_POST['peran'];

	// Cek apakah username atau email sudah ada di database
	$query = mysqli_query($conn, "SELECT username, email FROM petugas");
	if ($query == $username || $query == $email) {
		// Jika username atau email sudah digunakan
		
		echo "<script>alert('Username atau Email sudah digunakan!'); window.location='addPetugas.php'</script>";
	}else{
		$simpan = mysqli_query($conn,"INSERT into petugas(username,password,nama_petugas,gambar,email,no_tlp,alamat,role) values 

		('$username', '$password','$nama_petugas','$vfoto','$email','$no_tlp','$alamat','$role')");
		$upload=$dir1.$vfoto;
		move_uploaded_file($tfoto, $upload);
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