<?php
session_start();
$id=$_SESSION['admin']['id_admin'];
include 'ekstensi/koneksi.php';
$tgl=date('Y-m-d');
mysqli_query($koneksi,"UPDATE admin SET akses_terakhir='$tgl' WHERE id_admin='$id'");
session_destroy();
echo "<script>alert('Anda Telah Logout')</script>";
echo "<script>location='index.php'</script>";
?>