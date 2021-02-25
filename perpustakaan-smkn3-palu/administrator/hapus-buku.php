<?php
$id=$_GET['id'];
$ambil=mysqli_query($koneksi,"SELECT foto_buku FROM buku WHERE id_buku='$id'");
$pecah=mysqli_fetch_assoc($ambil);
$fotobuku=$pecah['foto_buku'];
if (file_exists('fotobuku/$fotobuku')) {
	unlink('fotobuku/$fotobuku');
}
mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku='$id'");
echo "<script>location='?page=buku'</script>";
?>