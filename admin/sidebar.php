<!-- Memeriksa apakah sudah login -->
<?php
    session_start();
    
    if ($_SESSION['status']!="login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon">
        <img width="80px" height="80px" src="../logo.png">
       
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Landing Page -->
<li class="nav-item">
<a class="nav-link" href="../pengguna/index.php">
<i class="fas fa-fw fa-home"></i>
<span>Landing Page</span></a>
</li>
<!-- Nav Item - Dashboard -->
<li 
<?php 
if ($page == "dashboard") echo "class='nav-item active'"; 
else echo "class='nav-item'";
?>
>
<a class="nav-link" href="dashboard.php">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data
</div>
<!-- Nav Item - Kendaraan -->
 <li 
 <?php 
 if ($page == "kendaraan") echo "class='nav-item active'"; 
 else echo "class='nav-item'";
 ?>
 >
    <a class="nav-link" href="viewKendaraan.php">
        <i class="fas fa-fw fa-solid fa-car"></i>
        <span>Kendaraan</span>
    </a>
</li>
<!-- Nav Item - Transaksi -->
<li 
 <?php 
 if ($page == "transaksi") echo "class='nav-item active'"; 
 else echo "class='nav-item'";
 ?>
>
    <a class="nav-link" href="transaksi.php">
        <i class="fas fa-fw fa-solid fa-receipt"></i>
        <span>Transaksi</span></a>
</li>
<!-- Nav Item - Pembayaran -->
<li 
 <?php 
 if ($page == "pembayaran") echo "class='nav-item active'"; 
 else echo "class='nav-item'";
 ?>
>
    <a class="nav-link" href="viewPembayaran.php">
        <i class="fas fa-fw fa-solid fa-receipt"></i>
        <span>Pembayaran</span></a>
</li>
<!-- Nav Item - Pengguna -->
<li 
<?php 
 if ($page == "pengguna") echo "class='nav-item active'"; 
 else echo "class='nav-item'";
?>
>
<?php
    if ($_SESSION['role']=="admin") {
    echo " <a class='nav-link' href='viewPengguna.php'>";
    echo " <i class='fas fa-fw fa-solid fa-user'></i> <span>Pengguna</span></a>";
    }else {
        
    }
?>
       
</li>
<li 
<?php 
 if ($page == "petugas") echo "class='nav-item active'"; 
 else echo "class='nav-item'";
?>
>
    <?php
    if ($_SESSION['role']=="admin") {
    echo "<a class='nav-link' href='viewPetugas.php'>";
    echo "<i class='fas fa-fw fa-solid fa-user'></i> <span>Petugas</span></a>";
    }else {
        
    }
    
    ?>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->