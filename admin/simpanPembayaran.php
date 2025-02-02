<?php
// Pastikan file koneksi ke database disertakan
include '../koneksi.php';
    // Ambil data dari form
    $id_petugas = $_POST['petugas'];
    $id_pengguna = $_POST['pengguna'];
    $invoice = $_POST['invoice'];
    $tgl = $_POST['tgl'];
    $status = $_POST['status']; 
    $total = $_POST['total'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO pembayaran (transaksi_id, id_petugas, tanggal_pembayaran, status, total_bayar) 
              VALUES ('$invoice','$id_petugas','$tgl','$status','$total')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, arahkan ke halaman transaksi
        echo "<script>alert('Data berhasil disimpan'); window.location='viewPembayaran.php'</script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>
