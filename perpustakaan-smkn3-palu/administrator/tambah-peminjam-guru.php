<h2>TAMBAH PEMINJAM GURU</h2><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TAMBAH PEMINJAM GURU
                        </div>
                        <div class="panel-body">
                        	<form method="post">
		<div class="form-group">
			<label>NAMA GURU</label>
			<input type="text" name="nama_guru" class="form-control" required autocomplete="off">
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
			$tgl=date('Y-m-d');
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
		mysqli_query($koneksi,"INSERT INTO transaksi_guru (nama_guru,id_buku,tanggal_pinjam,tanggal_harus_kembali,jumlah_pinjam) VALUES ('$_POST[nama_guru]','$_POST[kode_buku]','$tgl','$_POST[tanggal_kembali]','$_POST[jumlah_pinjam]')");
		mysqli_query($koneksi,"UPDATE buku SET stok=stok -$pinjam WHERE id_buku='$_POST[kode_buku]'");

		echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    	echo "<meta http-equiv='refresh' content='1;url=?page=peminjaman-buku-guru'>";
    }else{
    	echo "<script>alert('Transaksi Gagal Karena Stok Tidak Mencukupi')</script>";
		echo "<script>location='?page=tambah-peminjam-guru'</script>";
    }
	}
	?>