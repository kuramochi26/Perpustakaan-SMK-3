<?php
session_start();
include 'ekstensi/denda.php';
include 'ekstensi/koneksi.php';
$tgl_sekarang=date('Y-m-d');
$denda1=1000;
$id=$_GET['id'];
$ambil=mysqli_query($koneksi,"SELECT tanggal_harus_kembali,jumlah_pinjam,id_buku FROM transaksi_guru WHERE id_transaksiguru='$id'");
$array=mysqli_fetch_assoc($ambil);
$tgl_dateline=$array['tanggal_harus_kembali'];
$tgl_kembali=date('d-m-Y');
$lambat=terlambat($tgl_dateline, $tgl_kembali);
$denda=$lambat*$denda1;
$status="Dikembalikan";
$kembali=$array['jumlah_pinjam'];
$id_buku=$array['id_buku'];
if ($lambat>0) {
	mysqli_query($koneksi,"UPDATE transaksi_guru SET denda='$denda',terlambat='$lambat',status='$status',tanggal_kembali='$tgl_sekarang' WHERE id_transaksiguru='$id'");
	mysqli_query($koneksi,"UPDATE buku SET stok=stok +$kembali WHERE id_buku='$id_buku'");
}
else {
	mysqli_query($koneksi,"UPDATE transaksi_guru SET status='$status',tanggal_kembali='$tgl_sekarang' WHERE id_transaksiguru='$id'");
	mysqli_query($koneksi,"UPDATE buku SET stok=stok +$kembali WHERE id_buku='$id_buku'");
}
if ($_SESSION['admin']['level']=="super admin") {
echo "<script>alert('Buku Telah Dikembalikan')</script>";
echo "<script>location='index-super-admin.php?page=pengembalian-buku-guru'</script>";
}else{
echo "<script>alert('Buku Telah Dikembalikan')</script>";
echo "<script>location='index-admin.php?page=pengembalian-buku-guru'</script>";
}
?>