

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 class="text-center mt-2" id="demo">

                    <script>
                        var data = [
                            [18, 'Selamat Malam'],
                            [16, 'Selamat Sore'],
                            [12, 'Selamat Siang'],
                            [5,  'Selamat Pagi'],
                            [0,  'Tengah Malam'],
                        ];                         
                        hr = new Date().getHours();
                        for (var i = 0; i < data.length; i++) {
                            if (hr >= data[i][0]) {
                                // Menampilkan ucapan di dalam elemen dengan ID "demo"
                                document.getElementById("demo").innerHTML = data[i][1];
                                break;
                            }
                        }
                    </script>,
                    <b>
                    <?php
                    include "../koneksi.php";
                    $petugas = $_SESSION['username'];
                    $sqls = mysqli_query($conn,"SELECT * FROM petugas where username = '$petugas'");
                    $datas =mysqli_fetch_array($sqls);
                    $nama = $datas['nama_petugas'];
                    echo $nama;
                    ?> 
                    </b>
                    
                    </h4>
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Selamat -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <?php
                                include "../koneksi.php";
                                $petugas = $_SESSION['username'];
                                $sql = mysqli_query($conn,"SELECT * FROM petugas where username = '$petugas'");
                                $data=mysqli_fetch_array($sql);
                                $photo = $data['gambar'];
                                $sqls = mysqli_query($conn,"SELECT * FROM petugas where username = '$petugas'");
                                $datas =mysqli_fetch_array($sqls);
                                $nama = $datas['nama_petugas'];
                                ?> 
                                <span class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo $nama;?></span>
                                <img class="img-profile rounded-circle" src="../gambar/<?php echo $photo;?>">
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="change_password.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                 <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" untuk menghentikan sesi anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>