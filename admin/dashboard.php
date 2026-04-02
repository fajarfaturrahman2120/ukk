<?php
session_start();
if($_SESSION['login']==false){
    $_SESSION['error'] = "❌ Maaf anda harus login dulu";
    header('location:../login-admin.php');
}
?>
<!DOCTYPE html>
<html Lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
    <style>
        .nav-link{
            background-color: cadetblue;
            margin-right: 10px;
            margin-left: 10px;
            color: white !important;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-muted fw-bold" href="#">Aplikasi Pengaduan Sarana Sekolah</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard.php">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?page=kategori">
                            <i class="fa fa-tags"></i> Kategori Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?page=pengaduan">
                            <i class="fa fa-message"></i> Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container borderd shadow-lg w-100 p-5 mt-5 rounded-3">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if (file_exists($page.".php")) {
            include $page.".php";
        } else { ?>
            <h4>Selamat Datang Admin 🐘</h4>
            <p class="text-muted fst-italic">
                Pengelolaan Pengaduan Sarana Sekolah digunakan untuk menerima, memverifikasi dan menindaklanjuti laporan atas kerusakan dan kendala fisik sekolah secara terstruktur dan terdokumentasi.
            </p>
        <?php } ?>
    </div>
</body>
</html>