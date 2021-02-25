<?php
include 'ekstensi/koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi,"UPDATE admin SET status='aktif' WHERE id_admin='$id'");
echo "<script>location='index-super-admin.php?page=pengguna'</script>";
?>