<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
$kategori = mysqli_fetch_assoc($data);
?>

<h4 class="text-center mt-2 mb-4">
    <i class="fa fa-pencil"></i> Edit Kategori Pengaduan
</h4>
<form method="post" action="#">
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">Kategori Pengaduan</label>
        <input type="text" name="ket_kategori" class="form-control" required 
               value="<?= $kategori['ket_kategori'] ?>">
    </div>
    <button name="tombol" type="submit" class="btn btn-warning w-100">
        <i class="fa fa-save"></i> UPDATE
    </button>
</form>

<?php
if(isset($_POST['tombol'])){
    $ket = $_POST['ket_kategori'];
    $update = mysqli_query($koneksi, "UPDATE kategori SET ket_kategori='$ket' WHERE id_kategori='$id'");
    if($update){
        echo "<script>alert('✅ Data sukses diupdate'); window.location.assign('?page=kategori');</script>";
    }else{
        echo "<script>alert('❌ Data gagal diupdate'); window.location.assign('?page=kategori');</script>";
    }
}
?>