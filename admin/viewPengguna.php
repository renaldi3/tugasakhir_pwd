<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
<?php 
    include "sidebar.php";
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php 
            include "topbar.php";
        ?>

    <div class="container card p-4 shadow mt-5 mb-4">
        <h1 class="display-5">Data Pengguna</h1>
        <p>Daftar Seluruh data Pengguna</p>
        <br>
        <div class="table-responsive-sm">
        <a href="addPengguna.php"><button type="button" class="btn btn-primary mx-auto">Tambah Data</button></a>
            <table class="table display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <?php  
                include "../koneksi.php";
                $sql = mysqli_query($conn,"SELECT * FROM pengguna order by id_pengguna asc");
                $i=1;
                while ($data=mysqli_fetch_array($sql)) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['jk'] ?></td>
                        <td><?php echo $data['no_tlp'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td width="20%">
                                <a href="editPengguna.php?pengguna=<?php echo $data['id_pengguna'];?>">
                                <input type="button" value="Edit" class="btn btn-outline-warning btn-sm"></a>
                                <a href="hapusPengguna.php?pengguna=<?php echo $data['id_pengguna'];?>">
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
    </div>
</div>
</div>
    <?php
    include "footer.php";
    ?>
 <!-- Bootstrap core JavaScript-->
 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>