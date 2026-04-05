<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Pengaduan| Aplikasi Pengaduan Sarana Sekolah</title>
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
            
            <h3 class="text-center mb-1">Cek Pengaduan</h3>
            <p class="text-muted text-center mb-4">Aplikasi Pengaduan Sarana Sekolah</p>
            <hr class="mb-4">
            
            <div class="mb-3">
                <label class="form-label text-muted">Nis</label>
                <input type="number" name="nis" class="form-control" required placeholder="Masukan nis" autocomplete="nis">
            </div>
            <div class="mb-3">
                <label for="form-label text-muted">Kelas</label>
                <select name="kelas" id="" class="form-control">
                    <option value="">PIlih Kelas Anda</option>
                    <option value="XII RPL">XII RPL</option>
                    <1option value="XII DKV 1">XII DKV 1</1option>
                    <option value="XII DKV 2">XII DKV 2</option>
                    <option value="XII TJKT 1">XII TJKT 1</option>
                    <option value="XII TJKT 2">XII TJKT 2</option>
                    <option value="XII MPLB 1">XII MPLB 1</option>
                    <option value="XII MPLB 2">XII MPLB 2</option>
                    <option value="XII AKT">XII AKT</option>
                </select>
            </div>
            <button type="submit" name="tombol" class="btn btn-primary w-100 mb-2">Cek</button>
            <a href="index.php" class="btn btn-warning w-100 text-white">Kembali</a>
        </form>
    </div>
</body>
</html>
<?php 

if (isset($_POST['tombol'])){
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    include 'koneksi.php';
    $sql = "SELECT * FROM siswa WHERE nis='$nis' AND kelas='$kelas'";
    $data = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($data)>0){
        $_SESSION['nis'] = $nis;
        $_SESSION['kelas'] = $kelas;
        header('location:data-pengaduan.php');
        exit(); // Penting: hentikan eksekusi setelah redirect
    }
    else{
        $_SESSION['error'] = "❌ Maaf Nis atau Kelas Salah";
        header("location:cek-pengaduan.php");
        exit();
    }
}
?>