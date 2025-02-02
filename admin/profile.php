<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Drive - Profile</title>
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
    $page = "dashboard";
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
            <div class="card-header bg-primary text-white">
                <h1 class="display-5 text-center">Profile</h1>
            </div>
            <div class="card-body">
                <?php  
                include "../koneksi.php";
                if (!isset($_SESSION['username'])) {
                    echo "<p class='text-danger'>Anda belum login!</p>";
                    exit;
                }
                
                $id = $_SESSION['username'];
                $sql = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$id'");
                $data = mysqli_fetch_array($sql);
                ?>

                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="../gambar/<?php echo $data['gambar']; ?>" class="img-fluid rounded shadow-lg" width="250" height="250" alt="Foto Profil">
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong class="text-muted">Username:</strong> <?php echo $data['username']; ?>
                            </li>
                            <li class="list-group-item">
                                <strong class="text-muted">Nama:</strong> <?php echo $data['nama_petugas']; ?>
                            </li>
                            <li class="list-group-item">
                                <strong class="text-muted">Alamat:</strong> <?php echo $data['alamat']; ?>
                            </li>
                            <li class="list-group-item">
                                <strong class="text-muted">No Telepon:</strong> <?php echo $data['no_tlp']; ?>
                            </li>
                            <li class="list-group-item">
                                <strong class="text-muted">Email:</strong> <?php echo ucfirst($data['email']); ?>
                            </li>
                            <li class="list-group-item">
                                <strong class="text-muted">Role:</strong> <?php echo ucfirst($data['role']); ?>
                            </li>
                        </ul>
                    </div>
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
    $('#delete-link').attr('href', 'hapusKendaraan.php?id_kendaraan=' + id);
    });
</script>
</body>
</html>