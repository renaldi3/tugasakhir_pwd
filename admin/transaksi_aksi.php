<?php
// Pastikan file koneksi ke database disertakan
include '../koneksi.php';
    // Ambil data dari form
    $id_petugas = $_POST['petugas'];
    $id_pengguna = $_POST['pengguna'];
    $id_kendaraan = $_POST['kendaraan'];
    $tgl = $_POST['tgl'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $harga = $_POST['harga'];
	$status = $_POST['status']; 

    // Hitung total harga berdasarkan tanggal mulai dan tanggal selesai
    $date1 = new DateTime($tgl_mulai);
    $date2 = new DateTime($tgl_selesai);
    $interval = $date1->diff($date2)->days + 1; // Tambahkan 1 agar termasuk tanggal mulai dan selesai
    $total_harga = $interval * $harga;

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO transaksi (transaksi_petugas, transaksi_pengguna, transaksi_kendaraan, transaksi_tgl, transaksi_harga, transaksi_tgl_mulai, transaksi_tgl_selesai, transaksi_status) 
              VALUES ('$id_petugas', '$id_pengguna', '$id_kendaraan', '$tgl','$total_harga', '$tgl_mulai', '$tgl_selesai', '$status')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, arahkan ke halaman transaksi
        echo "<script>alert('Data berhasil disimpan'); window.location='transaksi.php'</script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>
