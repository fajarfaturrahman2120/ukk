<?php
include '../koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");
if($hapus){
    echo "<script>alert('✅ Data sukses dihapus'); window.location.assign('?page=kategori');</script>";
}else{
    echo "<script>alert('❌ Data gagal dihapus'); window.location.assign('?page=kategori');</script>";
}
?>