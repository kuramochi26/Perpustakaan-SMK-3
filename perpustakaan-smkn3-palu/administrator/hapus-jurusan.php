<?php
include 'ekstensi/koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM jurusan WHERE id_jurusan='$id'");
echo "<script>location='index-super-admin.php?page=jurusan'</script>";
?>