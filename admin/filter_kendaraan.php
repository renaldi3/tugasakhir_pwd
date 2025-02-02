<?php
include '../koneksi.php';

// Ambil parameter status dari URL
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Query SQL untuk filter kendaraan
if ($status === '') {
    $query = "SELECT * FROM kendaraan"; // Semua data
} else {
    $query = "SELECT * FROM kendaraan WHERE status = ?";
}

$stmt = $conn->prepare($query);
if ($status !== '') {
    $stmt->bind_param("s", $status);
}
$stmt->execute();
$result = $stmt->get_result();

// Tampilkan data kendaraan
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?php echo "../gambar/$row[gambar]" ?>" alt="<?= $row['nama_kendaraan'] ?>" class="card-img-top img-fluid object-fit-cover" style="height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold"><?= $row['nama_kendaraan'] ?></h5>
                    <p class="card-title"><?= $row['status'] ?></p>
                    <p class="card-text fw-bold">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></p>
                    <div class="mt-auto">
                        <button class="btn btn-primary rounded-pill btn-large" data-id="<?= $row['id_kendaraan'] ?>">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<div class='col-12 text-center'><p>Tidak ada kendaraan ditemukan.</p></div>";
}

$conn->close();
?>
