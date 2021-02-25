<h2>PENGGUNA</h2><br>
<?php
$ambil=mysqli_query($koneksi,"SELECT * FROM admin");
?>
<a href="?page=tambah-akun" class="btn btn-success square-btn-adjust"><span class="glyphicon glyphicon-plus"></span> TAMBAH</a><br><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TABEL PEMINJAMAN BUKU SISWA
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
		<thead>
	<tr>
		<th>NAMA PENGGUNA</th>
		<th>USERNAME</th>
		<th>LAST ACCESS</th>
		<th>LEVEL</th>
		<th>STATUS</th>
		<th>AKSI</th>
	</tr>
	</thead>
	<?php
	while ($array=mysqli_fetch_assoc($ambil)) {
	?>	
	<tbody>
	<tr>
		
		<td><a href="?page=info-pengguna&id=<?php echo $array['id_admin'] ?>"><font color="black"><?php echo ucwords($array['nama_admin']) ?></font></a></td>
		<?php
		if($array['level']=="super admin"){
			$user=md5($array['username']);
		?>
		<td><?php echo $user; ?></td>
		<?php
		}else{
		?>
		<td><?php echo $array['username'] ?></td>
		<?php	
		}
		?>
		<?php
		if ($array['akses_terakhir']=='0000-00-00') {
		?>
		<td>Akun Baru</td>
		<?php
		}else{
		?>
		<td><?php echo date('D. d M Y',strtotime($array['akses_terakhir'])) ?></td>
		<?php
		}
		?>
		<td><?php echo ucwords($array['level']) ?></td>
		<td><?php echo ucwords($array['status']) ?></td>
	
		<?php
		if ($array['level']=="super admin") {
		?>
		<td><button class="btn btn-xs disable">TIDAK ADA AKSI</button></td>
		<?php
		}elseif ($array['level']=="admin" AND $array['status']=="aktif") {
		?>
		<td>
			<a href="hapus-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
			<a href="blok-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-warning btn-xs" onclick="return confirm('Yakin Untuk Blok Akun ini?')"><span class="glyphicon glyphicon-remove"></span> BLOK</a>
		</td>
		<?php
		}elseif ($array['level']=="admin" AND $array['status']=="blok") {
		?>
		<td>
			<a href="hapus-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
			<a href="aktif-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-info btn-xs" onclick="return confirm('Yakin Untuk Mengakifkan Akun ini?')"><span class="glyphicon glyphicon-ok"></span> AKTIF</a>
		</td>
		<?php
		?>
		<?php
		}elseif ($array['level']=="admin" AND empty($array['status'])) {
		?>
		<td>
			<a href="hapus-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
			<a href="verifikasi-akun.php?id=<?php echo $array['id_admin'] ?>" class="btn btn-success btn-xs" onclick="return confirm('Yakin Untuk Verivikasi Akun ini?')"><span class="glyphicon glyphicon-ok"></span> VERIFIKASI</a>
		</td>
		<?php
		}
		?>
	</tr>
</tbody>
	<?php
	}
	?>
</table>