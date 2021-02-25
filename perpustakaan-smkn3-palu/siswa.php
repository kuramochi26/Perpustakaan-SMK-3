<?php
include 'administrator/ekstensi/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>SISWA</title>
	<link rel="stylesheet" type="text/css" href="administrator/assets/css/bootstrap-custom.css">
	 <link rel="stylesheet" type="text/css" href="administrator/assets/css/custom.css">
</head>
<body>
	<?php
	include 'administrator/ekstensi/navbar.php';
	?>
<div class="container">
	<center><h1>ANDA ADALAH SISWA</h1></center>
	<br>
	<br>
	<form method="post">
		<div class="form-group">
			<label>NAMA</label>
			<input type="text" name="nama" class="form-control" autocomplete="off">
		</div>
		<div class="form-group">
			<label>KELAS</label>
			<select name="kelas" required  class="form-control">
				<option value="">~KELAS~
				<?php 
				$ambil=mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY kelas ASC");
				while($array=mysqli_fetch_assoc($ambil)){
				?> 
				<option value="<?php echo $array['id_kelas'] ?>"><?php echo $array['kelas'] ?>
				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>JURUSAN</label>
			<select name="jurusan" required class="form-control">
				<option value="">~JURUSAN~
					<?php
					$ambill=mysqli_query($koneksi,"SELECT * FROM jurusan");
					while ($arrayy=mysqli_fetch_assoc($ambill)) {
					?>
				<option value="<?php echo $arrayy['id_jurusan'] ?>"><?php echo ucwords($arrayy['jurusan']) ?>
					<?php
					}
					?>
			</select>
		</div>
		<div class="form-group">
			<label>KEPERLUAN</label>
			<textarea class="form-control" name="keperluan" autocomplete="off"></textarea>
		</div>
		<button class="btn btn-success square-btn-adjust" name="tambah">TAMBAH</button>
		</form>
		<?php
		if (isset($_POST['tambah'])) {
			$tgl=date('Y-m-d');
			mysqli_query($koneksi,"INSERT INTO bukutamusiswa (nama,id_kelas,id_jurusan,tanggal_berkunjung,keperluan) VALUES ('$_POST[nama]','$_POST[kelas]','$_POST[jurusan]','$tgl','$_POST[keperluan]')");
			echo "<script>alert('SELAMAT DATANG')</script>";
			echo "<script>location='index.php'</script>";
		}
		?>
</div>
</body>
</html>