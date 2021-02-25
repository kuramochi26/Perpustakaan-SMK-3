<?php
include 'ekstensi/koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM admin WHERE id_admin='$id'");
echo "<script>location='index-super-admin.php?page=pengguna'</script>";
?>