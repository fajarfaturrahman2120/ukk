<?php
session_start();
include 'koneksi.php';
$kategori = mysqli_query($koneksi,"select * from kategori");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maukkan Saran | Aplikasi Pengaduan Sarana Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <form action="" method="post" class="col-md-4 bg-white border rounded-4 p-4 shadow-lg">
           
            
            <h3 class="text-center mb-1">Masukkan Saran</h3>
            <p class="text-muted text-center mb-4">Aplikasi Pengaduan Sarana Sekolah</p>
            <hr class="mb-4">
            <div class="mb-3">
                <label for="form-label text-muted">NISN</label>
                <input type="number" name="nis" class="form-control" required  placeholder="Masukkan Nis Anda">
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
            <div class="mb-3">
                <label class="form-label text-muted">Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">=== Pilih Kategori ===</option>
                    <?php foreach($kategori as $data) { ?>
                        <option value="<?= $data['id_kategori'] ?>"><?= $data['ket_kategori'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="form-label text-muted">Lokasi</label>
                <textarea name="lokasi" class="form-control" required placeholder="Masukkan Lokasi Anda" id=""></textarea>
            </div>
            <div class="mb-3">
                <label for="form-label text-muted">Keterangan /Deskripsi Laporan</label>
                <textarea name="ket" class="form-control" required placeholder="Masukkan Deskrpsi  Anda" id=""></textarea>
            </div>
           
            <button type="submit" name="tombol" class="btn btn-primary w-100 py-2">Kirim</button>
            <a href="cek-pengaduan.php" class="btn btn-success mt-2 w-100 py-2">Cek Pengaduan </a>
        </form>
    </div>
</body>
</html>
<?php
if(isset( $_POST ['tombol'])){
    include 'koneksi.php';
    $nis = $_POST ['nis'];
    $kelas = $_POST ['kelas'];
    $data1 = mysqli_query($koneksi," INSERT INTO siswa VALUES ('$nis','$kelas')");
    // input aspirasi
    $id_kategori = $_POST['id_kategori'];
    $lokasi = $_POST['lokasi'];
    $ket = 
    $_POST['ket'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date('d-m-Y H:i:s');
    $sql = "INSERT INTO input_aspirasi(nis,id_kategori,lokasi,ket,tgl_input) VALUES ('$nis','$id_kategori','$lokasi','$ket','$tgl_input')";
    $data2 = mysqli_query($koneksi,$sql);
    // aspirasi
    $id_pelaporan = mysqli_insert_id($koneksi);
    $status = "Menunggu";
    $sql = "INSERT INTO aspirasi (id_pelaporan,id_kategori,status) VALUES ('$id_pelaporan','$id_kategori','$status')";
    $data = mysqli_query($koneksi,$sql);
    session_start();
    $_SESSION['status'] = "Pengaduan Status Disimpan";
    header('location:cek-pengaduan.php'); 
}
?>