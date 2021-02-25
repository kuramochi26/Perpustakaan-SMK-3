<h2>UBAH PROFIL</h2><br>
<?php 
$id=$_GET['id'];
$ambil=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'");
$pecah=mysqli_fetch_assoc($ambil);
$idubah=$pecah['id_admin'];
$idlogin=$_SESSION['admin']['id_admin'];

if ($idlogin!==$idubah) {
	echo "<script>alert('Tidak Bisa Diakses');</script>";
  if ($_SESSION['admin']['level']=="super admin") {
    echo "<script>location='index-super-admin.php?page=user-profil';</script>";
  }elseif($_SESSION['admin']['level']=="admin"){
	echo "<script>location='index-admin.php?page=user-profil';</script>";
}
	exit();
}
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             UBAH PROFIL
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                           <form method="post" enctype="multipart/form-data" autocomplete="off">
                           	<div class="form-group">
                           		<label>NAMA</label>
                           		<input type="text" name="nama" value="<?php echo $pecah['nama_admin'] ?>" class="form-control">
                           	</div>
                           	<div class="form-group">
                           		<label>FOTO</label><br>
                           		<?php
                           		if (empty($pecah['foto'])) {
                           		?>
                           		<img src="assets/img/find_user.png" width="200px" height="150px">
                           		<?php
                           		}else{
                           		?>
                           		<img src="foto-admin/<?php echo $pecah['foto'] ?>" width="200px" height="150px">
                           		<?php
                           		}
                           		?>
                           	</div>
                           	<div class="form-group">
                           		<input type="file" name="foto" class="form-control">
                           	</div>
                           	<button name="simpan" class="btn btn-success square-btn-adjust">SIMPAN</button>
                           </form>
                           <?php
                           if (isset($_POST['simpan'])) {
                           	$id=$_SESSION['admin']['id_admin'];
                           	$namafoto=$_FILES['foto']['name'];
                            $lokasifoto=$_FILES['foto']['tmp_name'];
                          if (!empty($lokasifoto)) {
							               move_uploaded_file($lokasifoto, "foto-admin/$namafoto");
                              mysqli_query($koneksi,"UPDATE admin SET nama_admin='$_POST[nama]',foto='$namafoto' WHERE id_admin='$id'");
							
                           	echo "<div class='alert alert-info'>DATA DIUBAH</div>";
    						            echo "<meta http-equiv='refresh' content='1;url=index.php?page=user-profil'>";
    					           }else{
    						            mysqli_query($koneksi,"UPDATE admin SET nama_admin='$_POST[nama]' WHERE id_admin='$id'");
							
                           	echo "<div class='alert alert-info'>DATA DIUBAH</div>";
    						            echo "<meta http-equiv='refresh' content='1;url=?page=user-profil'>";
    					}
                           }
                           ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
