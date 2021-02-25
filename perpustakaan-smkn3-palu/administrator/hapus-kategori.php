<?php
include 'ekstensi/koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id'");
echo "<script>location='index-super-admin.php?page=kategori'</script>";
?>