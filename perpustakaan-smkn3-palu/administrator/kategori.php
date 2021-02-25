<h2>DATA KATEGORI BUKU</h2><br>
<?php
$ambil=mysqli_query($koneksi,"SELECT * FROM kategori");
?>
<div><button type="button" class="btn btn-success square-btn-adjust" data-toggle="collapse" data-target="#tambah"><span class="glyphicon glyphicon-plus"></span> TAMBAH</button></div>
<div id="tambah" class="collapse">
<form method="post" autocomplete="off">
	<div class="form-group">	
	<label>TAMBAH KATEGORI</label>
	<input type="text" name="kategori" class="form-control" autofocus="true">
	</div>
	<button class="btn btn-success square-btn-adjust" name="tambah"> TAMBAHKAN</button>
</form>
<?php
if (isset($_POST['tambah'])) {
	mysqli_query($koneksi,"INSERT INTO kategori (kategori) VALUES ('$_POST[kategori]')");
	echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=?page=kategori'>";
}
?>
</div>
<br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TABEL DATA KATEGORI BUKU
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KATEGORI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor=1;
                                    while($array=mysqli_fetch_assoc($ambil)){
                                     ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo ucwords($array['kategori']) ?></td>
                                            <td>
                                            	<a href="hapus-kategori.php?id=<?php echo $array['id_kategori'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
                                            </td>
                                        </tr>
                                    <?php
                                    $nomor++;
                                 }
                                    ?>
                                    </tbody>
                                </table>
                                 
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>