<h2>TAMBAH PEMINJAM KELAS</h2><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TAMBAH PEMINJAM KELAS
                        </div>
                        <div class="panel-body">
                       <form method="post">
		<div class="form-group">
			<label>NAMA GURU</label>
			<input type="text" name="nama_guru" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>NAMA PEMINJAM</label>
			<input type="text" name="nama_peminjam" class="form-control" required autocomplete="off">
		</div>
	<div class="form-group">
			<label>KELAS</label>
			<select name="kelas" required  class="form-control">
				<option value="">~KELAS~
				<?php
				$ambil=mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY kelas ASC");
				while ($array=mysqli_fetch_assoc($ambil)) {
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
				$ambil=mysqli_query($koneksi,"SELECT * FROM jurusan");
				while ($array=mysqli_fetch_assoc($ambil)) {
				?>
				<option value="<?php echo $array['id_jurusan'] ?>"><?php echo ucwords($array['jurusan']) ?>
				<?php
				}
				$tgl=date('Y-m-d');
				?>
			</select>
		</div>
		<div class="form-group">
			<label>KODE BUKU, JUDUL BUKU</label>
			<select name="kode_buku" class="form-control" required="">
			<option value="">~PILIH BUKU~
			<?php
			$ambil=mysqli_query($koneksi,"SELECT * FROM buku");
			while ($array=mysqli_fetch_assoc($ambil)) {
			?>
				<option value="<?php echo $array['id_buku'] ?>"><?php echo $array['kode_buku'].", ".$array['judul_buku'] ?>
			<?php
			}
			?>
			</select>
		</div>
		<div class="form-group">
			<label>JUMLAH PINJAM BUKU</label>
			<input type="number" name="jumlah_pinjam" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>TANGGAL PINJAM</label>
			<input type="date" value="<?php echo $tgl ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label>TANGGAL HARUS KEMBALI</label>
			<input type="date" name="tanggal_kembali" value="<?php echo $kembali ?>" class="form-control" required readonly>
		</div>
		<button class="btn btn-success square-btn-adjust" name="tambah">TAMBAHKAN</button>
	</form>
	<?php
	if (isset($_POST['tambah'])) {
		$ambil=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$_POST[kode_buku]'");
		$array=mysqli_fetch_assoc($ambil);
		$stok=$array['stok'];
		if ($stok != 0) {
		$pinjam=$_POST['jumlah_pinjam'];
		$tgl=date('Y-m-d');
		mysqli_query($koneksi,"INSERT INTO `transaksi_kelas` (`nama_guru`, `nama_peminjam`, `id_kelas`, `id_jurusan`, `id_buku`, `tanggal_pinjam`, `tanggal_harus_kembali`, `jumlah_pinjam`) VALUES ('$_POST[nama_guru]', '$_POST[nama_peminjam]', '$_POST[kelas]', '$_POST[jurusan]', '$_POST[kode_buku]', '$tgl', '$_POST[tanggal_kembali]', '$pinjam');");
		mysqli_query($koneksi,"UPDATE buku SET stok=stok -$pinjam WHERE id_buku='$_POST[kode_buku]'");

		echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    	echo "<meta http-equiv='refresh' content='1;url=?page=peminjaman-buku-kelas'>";
		}else{
			echo "<script>alert('Transaksi Gagal Karena Stok Tidak Mencukupi')</script>";
			echo "<script>location='?page=tambah-peminjam-kelas'</script>";
		}
	}
	?>