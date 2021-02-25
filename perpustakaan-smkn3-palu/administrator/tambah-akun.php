<h2>TAMBAH AKUN</h2><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TAMBAH AKUN ADMIN
                        </div>
                        <div class="panel-body">
                        <form autocomplete="off" method="post">
                        	<div class="form-group">
                        		<label>NAMA ADMIN</label>
                        		<input type="text" name="nama" class="form-control" required>
                        	</div>
                        	<div class="form-group">
			<label>USERNAME</label>
			<input type="text" name="username" class="form-control" required autocomplete="off">
		</div>
		<div class="form-group">
			<label>PASSWORD</label>
			<input type="password" name="password" class="form-control" required autocomplete="off" id="pass">
			 <label class="checkbox-inline">
               	 <input type="checkbox" onclick="myFunction()"/> Show Password
           	 </label>
		</div>
		<button class="btn btn-success square-btn-adjust" name="tambah">TAMBAH</button>
	</form>
<?php
	if (isset($_POST['tambah'])) {
		$pass=$_POST['password'];
		$password=md5($pass);
	mysqli_query($koneksi,"INSERT INTO admin (nama_admin,username,password) VALUES ('$_POST[nama]','$_POST[username]','$password')");
	echo "<div class='alert alert-info'>DATA DITAMBAHKAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=?page=pengguna'>";
	 } 
	 ?>
