<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php 
    include "../koneksi.php";
    $sql = mysqli_query($conn,"SELECT * FROM petugas order by id_petugas asc");
    include "../header.php";
?>
<body>
<div class="container card p-4 shadow mt-5">
    <h1 class="display-5">Data Petugas</h1>
    <p>Daftar Seluruh data petugas</p>
    <br>
    <div class="table-responsive-sm">
    <a href="addPetugas.php"><button type="button" class="btn btn-primary mx-auto">Tambah Data</button></a>
        <table class="table display">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama Petugas</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <?php 
            $i=1;
            while ($data=mysqli_fetch_array($sql)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['password'] ?></td>
                    <td><?php echo $data['nama_petugas'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['role'] ?></td>
                    <td width="20%">
                            <a href="editPetugas.php?petugas=<?php echo $data['id_petugas'];?>">
                            <input type="button" value="Edit" class="btn btn-outline-warning btn-sm"></a>
                            <a href="hapusPetugas.php?petugas=<?php echo $data['id_petugas'];?>">
                            <input type="button" value="Hapus" class="btn btn-outline-danger btn-sm"></a> 
                    </td>
                </tr>
            </tbody>
        <?php      
           $i++; }
        ?>
        </table>
    </div>
</div>
    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container text-center ">
        &copy; 2024 Sistem Informasi Berita. All rights reserved.
        </div>
    </footer>
     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>