<?php
$id=$_SESSION['admin']['id_admin'];
$ambil=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'");
$array=mysqli_fetch_assoc($ambil);
?>
<h2>PROFIL <?php echo strtoupper($array['nama_admin']); ?></h2>
<br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             PROFIL
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<?php
if (empty($array['foto'])) {
?>
<center><img src="assets/img/find_user.png" width="200px" height="190px"></center>
<?php
}else{
?>
<center><img src="foto-admin/<?php echo $array['foto'] ?>" width="200px" height="180px"></center>
<?php	
}
?>
<br>
<table class="table">
	<tr>
		<th>NAMA</th>
		<td><?php echo ucwords($array['nama_admin']); ?></td>
	</tr>
	<tr>
		<th>USERNAME</th>
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
	</tr>
	<tr>
		<th>LEVEL</th>
		<td><?php echo ucwords($array['level']); ?></td>
	</tr>
</table>
<a href="?page=ubah-profil&id=<?php echo $id ?>" class="btn btn-warning square-btn-adjust"><span class="glyphicon glyphicon-pencil"></span> UBAH PROFIL</a>
</div>
</div>
</div>
</div>
</div>