<h2>INFO PENGGUNA</h2><br>
<?php
$id=$_GET['id'];
$ambil=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'");
$array=mysqli_fetch_assoc($ambil);
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             PROFIL <?php echo strtoupper($array['nama_admin']) ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<?php
if (empty($array['foto'])) {
?>
<center><img src="assets/img/find_user.png" width="200px" height="150px"></center>
<?php
}else{
?>
<center><img src="foto-admin/<?php echo $array['foto'] ?>" width="200px" height="150px"></center>
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
	<tr>
		<th>STATUS</th>
		<td><?php echo ucwords($array['status']); ?></td>
	</tr>
</table>
</div>
</div>
</div>
</div>
</div>