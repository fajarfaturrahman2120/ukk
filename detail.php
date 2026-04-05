<?php
include 'koneksi.php';
session_start();
function status($status){
    if($status == "Menunggu"){
        echo "<div class='badge bg-warning'>⏳ $status</div>";
    } elseif($status == "Proses"){
        echo "<div class='badge bg-info'>🔄 $status</div>";
    } else {
        echo "<div class='badge bg-success'>✅ $status</div>";
    }
}
$id=$_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM input_aspirasi,aspirasi,kategori WHERE
kategori.id_kategori=input_aspirasi.id_kategori AND aspirasi.id_kategori=kategori.id_kategori AND
input_aspirasi.id_pelaporan='$id' ");
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan| Aplikasi Pengaduan Sarana Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <form action="" method="post" class="col-md-9 bg-white border rounded-4 p-4 shadow-lg">
          
            
            <h3 class="text-center mb-1">Data Pengaduan NIS <?= $_SESSION['nis'] ?> KELAS <?= $_SESSION['kelas'] ?></h3>
            <p class="text-muted text-center mb-4">Aplikasi Pengaduan Sarana Sekolah</p>
            <a href="index.php" class="btn btn-primary w-100 text-white">Tambah Pengaduan</a>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-3 fw-bold mb-1">NIS</div>
                <div class="col-md-9 "><?=  $data['nis']?></div>
                <div class="col-md-3 fw-bold mb-1">Kelas</div>
                <div class="col-md-9 "><?=  $_SESSION['kelas']?></div>
                <div class="col-md-3 fw-bold mb-1">Kategori Pengaduan</div>
                <div class="col-md-9 "><?=  $data['ket_kategori']?></div>
                <div class="col-md-3 fw-bold mb-1">Status</div>
                <div class="col-md-9 "><?=  status($data['status'])?></div>
                <div class="col-md-3 fw-bold mb-1">Lokasi</div>
                <div class="col-md-9 "><?=  $data['lokasi']?></div>
                <div class="col-md-3 fw-bold mb-1">Pengaduan <i class="fa fa-lightbuld"></i></div>
                <div class="col-md-12 p-3 border "><?=  $data['ket']?></div>
                <div class="col-md-3 fw-bold mb-1">Feedback <i class="fa fa-comment"></i></div>
                <div class="col-md-12 p-3 border "><?=  $data['feedback']?></div>
            </div>
           
            
            <a href="data-pengaduan.php" class="btn btn-warning w-100 text-white mt-4">Kembali</a>
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