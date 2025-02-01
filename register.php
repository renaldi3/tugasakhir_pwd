<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quick Drive - Register</title>
    <link rel="icon" href="logo.png"/>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <!-- Custom styles -->
    <style>
        body {
            background: linear-gradient(45deg, #4e73df, #224abe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            padding: 2rem;
            background: #fff;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem;
        }
        .btn-primary:hover {
            background-color: #224abe;
        }
        .form-control {
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container pt-4 mb-4">
        <div class="card mx-auto">
            <div class="text-center mb-4">
                <img src="logo.png" alt="Logo Rental Kendaraan" width="100">
                <h2 class="h4 text-gray-900">Daftar Akun</h2>
            </div>
            <form action="admin/simpanPengguna.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Profile</label>
                    <input type="file" class="form-control" id="gambar" name="fupload" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_tlp" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success">Daftar</button>
                    <a href="login_aplikasi.php" class="btn btn-danger">Batal</a>
                </div>
            </form>
            <div class="text-center mt-3">
                <a class="small" href="login_aplikasi.php">Sudah Mempunyai Akun? Login!</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
