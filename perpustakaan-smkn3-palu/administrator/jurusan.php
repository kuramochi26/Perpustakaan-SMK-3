<h2>DATA JURUSAN</h2><br>
<?php
$ambil=mysqli_query($koneksi,"SELECT * FROM jurusan");
?>
<div><button type="button" class="btn btn-success square-btn-adjust" data-toggle="collapse" data-target="#tambah"><span class="glyphicon glyphicon-plus"></span> TAMBAH</button></div>
<div id="tambah" class="collapse">
<form method="post" autocomplete="off">
	<div class="form-group">	
	<label>TAMBAH JURUSAN</label>
	<input type="text" name="jurusan" class="form-control" autofocus="true">
	</div>
	<button class="btn btn-success square-btn-adjust" name="tambah"> TAMBAHKAN</button>
</form>
<?php
if (isset($_POST['tambah'])) {
	mysqli_query($koneksi,"INSERT INTO jurusan (jurusan) VALUES ('$_POST[jurusan]')");
	echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=?page=jurusan'>";
}
?>
</div>
<br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TABEL DATA JURUSAN
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>JURUSAN</th>
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
                                            <td><?php echo ucwords($array['jurusan']) ?></td>
                                            <td>
                                            	<a href="hapus-jurusan.php?id=<?php echo $array['id_jurusan'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
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