<?php
$tanggal_mulai=$_POST['tglm'];
$tanggal_selesai=$_POST['tgls'];
header("content-disposition: attachment; filename=laporan-peminjaman-buku-guru-smkn3-($tanggal_mulai-$tanggal_selesai).xls");
header("content-type: aplication/vdn.ms-excel");
?>

<?php
include 'ekstensi/koneksi.php';
$semuadata=array();

	
	$ambil=mysqli_query($koneksi,"SELECT * FROM transaksi_guru LEFT JOIN buku ON transaksi_guru.id_buku=buku.id_buku WHERE status='Dikembalikan' AND tanggal_pinjam BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
	while ($pecah=mysqli_fetch_assoc($ambil)) 
	{
		$semuadata[]=$pecah;	
	}
?>

<center><h2>Laporan Transaksi Peminjaman Dari Tanggal <?php echo date('d F Y',strtotime($tanggal_mulai)) ?> Hingga <?php echo date('d F Y',strtotime($tanggal_selesai)) ?></h2></center>
<br>
	
	
<table border="1">
	<thead>
	<tr>
				<th>No</th>
				<th>Nama Guru</th>
				<th>Kode Buku</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Harus Kembali</th>
				<th>Tanggal Kembali</th>
				<th>Jumlah Pinjam</th>
				<th>Denda</th>
				<th>Status</th>
	</tr>
	</thead>
	<?php foreach ($semuadata as $key => $value): ?>
	<tbody>
	<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo ucwords($value['nama_guru']) ?></td>
				<td><?php echo $value['kode_buku'] ?></td>
				<td><?php echo ucwords($value['judul_buku']) ?></td>
				<td><?php echo date('d F Y',strtotime($value['tanggal_pinjam'])) ?></td>
				<td><?php echo date('d F Y',strtotime($value['tanggal_harus_kembali'])) ?></td>
				<td><?php echo date('d F Y',strtotime($value['tanggal_kembali'])) ?></td>
				<td><?php echo $value['jumlah_pinjam'] ?></td>
				 <td><?php echo $value['terlambat']." Hari<br>Rp. ".number_format($value['denda']) ?></td>
				<td><?php echo $value['status'] ?></td>
	</tr>
<?php endforeach ?>
	</tbody>
</table>
