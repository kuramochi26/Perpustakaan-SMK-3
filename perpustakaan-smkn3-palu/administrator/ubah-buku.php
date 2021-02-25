<?php
$id=$_GET['id'];
$ambil=mysqli_query($koneksi,"SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori=kategori.id_kategori WHERE id_buku=$id");
$array=mysqli_fetch_assoc($ambil);
?>
<h2>UBAH BUKU</h2><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             UBAH DATA BUKU
                        </div>
                        <div class="panel-body">
                        	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>KODE BUKU</label>
			<input type="text" name="kode_buku" class="form-control" value="<?php echo $array['kode_buku'] ?>" autocomplete="off">
		</div>
		<div class="form-group">
			<label>JUDUL BUKU</label>
			<input type="text" name="judul_buku" class="form-control" value="<?php echo $array['judul_buku'] ?>" autocomplete="off">
		</div>
		<div class="form-group">
			<label>PENERBIT</label>
			<input type="text" name="penerbit" class="form-control" value="<?php echo $array['penerbit_buku'] ?>" autocomplete="off">
		</div>
		<div class="form-group">
			<label>PENULIS</label>
			<input type="text" name="penulis" class="form-control" value="<?php echo $array['penulis_buku'] ?>" autocomplete="off">
		</div>
		<div class="form-group">
			<label>TAHUN TERBIT</label>
			<select class="form-control" name="tahun_terbit">
				<option value="<?php echo $array['tahun_terbit'] ?>"><?php echo $array['tahun_terbit'] ?>
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
			<label>ISBN</label>
			<input type="text" name="isbn" class="form-control" value="<?php echo $array['isbn'] ?>" autocomplete="off">
		</div>
		<div class="form-group">
			<label>STOK BUKU</label>
			<input type="number" name="stok" class="form-control" value="<?php echo $array['stok'] ?>" autocomplete="off">
		<div class="form-group">	
			<?php
          if (empty($array['foto_buku'])) {
           ?>
           <td><img src="https://img.icons8.com/ios-filled/50/000000/book.png" width="220px" height="190px"></td>   
          <?php
          }else{
          ?>
          <td><img src="fotobuku/<?php echo $array['foto_buku']; ?>" width="220px" height="190px"></td>
         <?php
          }
          ?>
		</div>
		</div>
		<div class="form-group">
			<label>FOTO</label>
			<input type="file" name="foto" class="form-control">
		</div>
		<div class="form-group">
			<label>KATEGORI</label>
			<select class="form-control" name="kategori">
				<option value="<?php echo $array['id_kategori'] ?>"><?php echo ucwords($array['kategori']) ?></option>
				<?php
				$ambil=mysqli_query($koneksi,"SELECT * FROM kategori");
				while ($array=mysqli_fetch_assoc($ambil)) {
				?>
				<option value="<?php echo $array['id_kategori'] ?>"><?php echo ucwords($array['kategori']) ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<button class="btn btn-success square-btn-adjust" name="edit">SIMPAN</button>
	</form>
	<?php
	if (isset($_POST['edit'])) {
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "fotobuku/$namafoto");

		mysqli_query($koneksi,"UPDATE buku SET kode_buku='$_POST[kode_buku]',judul_buku='$_POST[judul_buku]',penerbit_buku='$_POST[penerbit]',penulis_buku='$_POST[penulis]',tahun_terbit='$_POST[tahun_terbit]',isbn='$_POST[isbn]',id_kategori='$_POST[kategori]',stok='$_POST[stok]',foto_buku='$namafoto' WHERE id_buku='$id'");
	}else{
		mysqli_query($koneksi,"UPDATE buku SET kode_buku='$_POST[kode_buku]',judul_buku='$_POST[judul_buku]',penerbit_buku='$_POST[penerbit]',penulis_buku='$_POST[penulis]',tahun_terbit='$_POST[tahun_terbit]',isbn='$_POST[isbn]',id_kategori='$_POST[kategori]',stok='$_POST[stok]' WHERE id_buku='$id'");
	}
	echo "<div class='alert alert-info'>DATA TELAH DIUBAH</div>";
    echo "<meta http-equiv='refresh' content='1;url=?page=buku'>";
	}
	?>