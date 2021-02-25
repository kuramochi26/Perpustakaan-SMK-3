<h2>TAMBAH BUKU</h2><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TAMBAH DATA BUKU
                        </div>
                        <div class="panel-body">
                        <form autocomplete="off" method="post" enctype="multipart/form-data">
                        	<div class="form-group">
                        		<label>KODE BUKU</label>
                        		<input type="text" name="kode_buku" class="form-control" required>
                        	</div>
                        	<div class="form-group">
			<label>JUDUL BUKU</label>
			<input type="text" name="judul_buku" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>PENERBIT</label>
			<input type="text" name="penerbit" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>PENULIS</label>
			<input type="text" name="penulis" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>TAHUN TERBIT</label>
			<select class="form-control" name="tahun_terbit" required>
				<option value="">~PILIH TAHUN~
				<?php
				$tahun=date('Y');
				for ($i=1950; $i <= $tahun; $i++) { ?>
					<option value="<?php echo $i ?>"><?php echo $i ?>
				<?php	
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>JUMLAH STOK BUKU</label>
			<input type="number" name="stok" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>ISBN</label>
			<input type="text" name="isbn" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>KATEGORI</label>
			<select class="form-control" name="kategori">
				<option value="">~KATEGORI~
				<?php
				$ambil=mysqli_query($koneksi,"SELECT * FROM kategori");
				while ($array=mysqli_fetch_assoc($ambil)) {
				?>
				<option value="<?php echo $array['id_kategori'] ?>"><?php echo ucwords($array['kategori']) ?>
				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>FOTO</label>
			<input type="file" name="foto" class="form-control">
		</div>
		<button class="btn btn-success square-btn-adjust" name="tambah">TAMBAH</button>
	</form>
<?php
	if (isset($_POST['tambah'])) {
	 $namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasifoto, "fotobuku/$namafoto");
	mysqli_query($koneksi,"INSERT INTO buku (kode_buku,judul_buku,penerbit_buku,penulis_buku,tahun_terbit,isbn,id_kategori,stok,foto_buku) VALUES ('$_POST[kode_buku]','$_POST[judul_buku]','$_POST[penerbit]','$_POST[penulis]','$_POST[tahun_terbit]','$_POST[isbn]','$_POST[kategori]','$_POST[stok]','$namafoto')");
	echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=?page=buku'>";
	 }
	 ?>
