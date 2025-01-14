<!DOCTYPE html>
<html>
<head>
    <title>Perentalan - Pemrograman Web Dasar</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    body {
            background: linear-gradient(to right, #6a11cd, #2575fc);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }
        .btn-primary {
            background-color: #2575fc;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #6a11cb;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="card p-4 shadow">
        <h6 class="display-6 text-center mb-4">Rental Kendaraan Rahmat Blok CVT</h6>
        <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger'>Login Gagal! Username dan Password Salah.</div>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-info'>Anda telah berhasil logout.</div>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-warning'>Anda harus lo
                    gin untuk mengakses halaman admin.</div>";
                }
            }
        ?>
        <form action="login.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control rounded-pill" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control rounded-pill" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 form-control">Login</button>
        </form>
    </div>
   
</body>
</html>
