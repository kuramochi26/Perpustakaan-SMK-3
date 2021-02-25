<!DOCTYPE html>
<html>
<head>
	<title>BUKU TAMU</title>
	<link rel="stylesheet" type="text/css" href="administrator/assets/css/bootstrap-custom.css">
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <link rel="stylesheet" type="text/css" href="administrator/assets/css/custom.css">

     
</head>
<body>
<?php
include 'administrator/ekstensi/navbar.php';
?>
<div class="container">
	<br>
	<br>
	<center><h2>SELAMAT DATANG DI PERPUSTAKAAN SMK NEGERI 3 PALU</h2></center>
	<center><h4>SILAHKAN PILIH, ANDA ADALAH:</h4></center>
	<br>
	<br>
	<a href="siswa.php">
	<div class="col-lg-6" style="background-color: #0022ff; border-right: 2px solid #001ddc;">
		<center><img src="pict/student.png" width="30.9%" style="margin-top: 10px;"></center>
		<center><h1><font color="white">SISWA</font></h1></center>
	</div>
	</a>
	<a href="guru.php">
	<div class="col-lg-6" style="background-color: #0022ff; border-left: 2px solid #001ddc;">
		<center><img src="pict/teacher.png" width="50%" style="margin-top: 10px; margin-left: 35px;"></center>
		<center><h1><font color="white">GURU</font></h1></center>
	</div>
	</a>
</div>
  <script src="assets/js/jquery-1.10.2.js"></script>
 
</body>
</html>