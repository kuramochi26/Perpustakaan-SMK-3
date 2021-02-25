<?php
include 'ekstensi/koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");
echo "<script>location='index-super-admin.php?page=kelas'</script>";
?>