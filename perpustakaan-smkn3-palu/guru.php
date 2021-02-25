<?php
include 'administrator/ekstensi/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>GURU</title>
	<link rel="stylesheet" type="text/css" href="administrator/assets/css/bootstrap-custom.css">
	<link rel="stylesheet" type="text/css" href="administrator/assets/css/custom.css">
</head>
<body>
	<?php
	include 'administrator/ekstensi/navbar.php';
	?>
<div class="container">
	<center><h1>ANDA ADALAH GURU</h1></center>
	<br>
	<br>
	<form method="post">
		<div class="form-group">
			<label>NAMA</label>
			<input type="text" name="nama" class="form-control" autocomplete="off">
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
			mysqli_query($koneksi,"INSERT INTO bukutamuguru (nama,tanggal_berkunjung,keperluan) VALUES ('$_POST[nama]','$tgl','$_POST[keperluan]')");

			echo "<script>alert('SELAMAT DATANG')</script>";
			echo "<script>location='index.php'</script>";
		}
		?>
</div>
</body>
</html>