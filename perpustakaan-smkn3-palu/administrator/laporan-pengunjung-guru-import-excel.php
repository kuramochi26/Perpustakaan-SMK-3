<?php
$tanggal_mulai=$_POST['tglm'];
$tanggal_selesai=$_POST['tgls'];
header("content-disposition: attachment; filename=laporan-pengunjung-guru-smkn3-($tanggal_mulai-$tanggal_selesai).xls");
header("content-type: aplication/vdn.ms-excel");
?>

<?php
include 'ekstensi/koneksi.php';
$semuadata=array();

	
	$ambil=mysqli_query($koneksi,"SELECT * FROM bukutamuguru WHERE tanggal_berkunjung BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
	while ($pecah=mysqli_fetch_assoc($ambil)) 
	{
		$semuadata[]=$pecah;	
	}
?>

<center><h2>Laporan Pengunjung Dari Tanggal <?php echo date('d F Y',strtotime($tanggal_mulai)) ?> Hingga <?php echo date('d F Y',strtotime($tanggal_selesai)) ?></h2></center>
<br>
	
	
<table border="1">
	<thead>
	<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Berkunjung</th>
			<th>Keperluan</th>
	</tr>
	</thead>
	<?php foreach ($semuadata as $key => $value): ?>
	<tbody>
	<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo ucwords($value['nama']) ?></td>
			<td><?php echo date('d F Y', strtotime($value['tanggal_berkunjung'])) ?></td>
			<td><?php echo ucwords($value['keperluan']) ?></td>
	</tr>
<?php endforeach ?>
	</tbody>
</table>
