<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Data Pengguna</title>
    <link rel="icon" href="../logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
<?php 
    $page = "pengguna";
    include "sidebar.php";
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php 
            include "topbar.php";
        ?>
        <div class="container mt-5 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="display-5">Data Pengguna</h1>
                </div>
                <div class="card-body">
                <a href="addPengguna.php"><button type="button" class="btn btn-primary mx-auto">Tambah Data</button></a>
                    <table class="table table-bordered table-responsive table-striped" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Nama Pengguna</th>
                            <th>Gambar</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody> 
                            <?php  
                        include "../koneksi.php";
                        $sql = mysqli_query($conn,"SELECT * FROM pengguna order by id_pengguna asc");
                        $i=1;
                        while ($data=mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data['username'] ?></td>
                                <td><?php echo $data['password'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['nama_pengguna'] ?></td>
                                <td><?php echo "<img src='../gambar/$data[gambar]' width=100 height=100>"?></td>
                                <td><?php echo $data['jenis_kelamin'] ?></td>
                                <td><?php echo $data['no_tlp'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td width="20%">
                                        <a href="editPengguna.php?id_pengguna=<?php echo $data['id_pengguna'];?>" class="btn btn-warning btn-sm">
                                        Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $data ['id_pengguna']; ?>">
                                        Hapus
                                        </button>
                                </td>
                            </tr> 
                            <?php      
                            $i++; }
                            ?>
                        </tbody>
                
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda Yakin Ingin Menghapus Data Ini?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger modal-delete-btn">
            <a href="hapusPengguna.php?id_pengguna=" id="delete-link" class="text-decoration-none text-white">Hapus</a>
            </button>
        </div>
        </div>
    </div>
    </div>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>
</div>
</div>
    <?php
    include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    
     <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    // Handle click event on delete buttons
    $('.delete-btn').click(function () {
    // Get the ID of the customer to be deleted
    var id = $(this).data('id');
    // Set the href attribute of the delete link in the modal
    $('#delete-link').attr('href', 'hapusPengguna.php?id_pengguna=' + id);
    });
</script>
</body>
</html>