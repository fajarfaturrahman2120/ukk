<?php 
session_start();
if (isset($_POST['tombol'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    include 'koneksi.php';
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $data = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($data)>0){
        $_SESSION['login'] = true;
        header('location:admin/dashboard.php');
        exit(); // Penting: hentikan eksekusi setelah redirect
    }
    else{
        $_SESSION['error'] = "❌ Login Gagal!, Periksa Username atau Password";
        header("location:login-admin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Aplikasi Pengaduan Sarana Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <form action="" method="post" class="col-md-4 bg-white border rounded-4 p-4 shadow-lg">
            <?php 
            if(isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger mt-1 mb-3">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            
            <h3 class="text-center mb-1">Login Admin</h3>
            <p class="text-muted text-center mb-4">Aplikasi Pengaduan Sarana Sekolah</p>
            <hr class="mb-4">
            
            <div class="mb-3">
                <label class="form-label text-muted">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukan Username" autocomplete="username">
            </div>
            <div class="mb-4">
                <label class="form-label text-muted">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukan Password" autocomplete="current-password">
            </div>
            <button type="submit" name="tombol" class="btn btn-primary w-100 py-2">Log In ➡️</button>
        </form>
    </div>
</body>
</html>