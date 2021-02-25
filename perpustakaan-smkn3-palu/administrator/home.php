   <?php
   $ambil1=mysqli_query($koneksi,"SELECT * FROM transaksi_siswa WHERE status='Dipinjam'");
   $hitung1=mysqli_num_rows($ambil1);
    $ambil2=mysqli_query($koneksi,"SELECT * FROM transaksi_siswa WHERE status='Dikembalikan'");
   $hitung2=mysqli_num_rows($ambil2);
    $ambil3=mysqli_query($koneksi,"SELECT * FROM transaksi_guru WHERE status='Dipinjam'");
   $hitung3=mysqli_num_rows($ambil3);
    $ambil4=mysqli_query($koneksi,"SELECT * FROM transaksi_guru WHERE status='Dikembalikan'");
   $hitung4=mysqli_num_rows($ambil4);
    $ambil5=mysqli_query($koneksi,"SELECT * FROM transaksi_kelas WHERE status='Dipinjam'");
   $hitung5=mysqli_num_rows($ambil5);
    $ambil6=mysqli_query($koneksi,"SELECT * FROM transaksi_kelas WHERE status='Dikembalikan'");
   $hitung6=mysqli_num_rows($ambil6);
   $ambil7=mysqli_query($koneksi,"SELECT * FROM buku");
   $hitung7=mysqli_num_rows($ambil7);
   $ambil8=mysqli_query($koneksi,"SELECT * FROM bukutamusiswa");
   $hitung8=mysqli_num_rows($ambil8);
   $ambil9=mysqli_query($koneksi,"SELECT * FROM bukutamuguru");
   $hitung9=mysqli_num_rows($ambil9);
 $id=$_SESSION['admin']['id_admin'];
  $ambil10=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'");
    $nama=mysqli_fetch_assoc($ambil10);
    $ambil11=mysqli_query($koneksi,"SELECT * FROM admin");
    $hitung11=mysqli_num_rows($ambil11);
   ?>
   <center><h1 class="text-sub">PERPUSTAKAAN SMK NEGERI 3 PALU</h1></center>
   <img src="pict/sampul.jpg" align="center" class="img-responsive">

<h3>Selamat Datang <?php echo ucwords($nama['nama_admin']) ?></h3>
   <hr />
                <div class="row">
                	<a href="?page=peminjaman-buku-siswa">
                <div class="col-md-6 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                   <img src="https://img.icons8.com/ios/50/000000/borrow-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung1; ?> DATA PEMINJAM</p>
                    <p class="text-muted">PEMINJAMAN BUKU SISWA</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=peminjaman-buku-guru">
		       <div class="col-md-6 col-sm-6 col-xs-6" style="float: right;">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                   <img src="https://img.icons8.com/ios/50/000000/borrow-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung3; ?> DATA PEMINJAM</p>
                    <p class="text-muted">PEMINJAMAN BUKU GURU</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=peminjaman-buku-kelas">
		       <div class="col-md-6 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                   <img src="https://img.icons8.com/ios/50/000000/borrow-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung5; ?> DATA PEMINJAM</p>
                    <p class="text-muted">PEMINJAMAN BUKU KELAS</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=pengembalian-buku-siswa">
		       <div class="col-md-6 col-sm-6 col-xs-6" style="float: right;">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blues set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/return-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung2; ?> DATA PENGEMBALIAN</p>
                    <p class="text-muted">PENGEMBALIAN BUKU SISWA</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=pengembalian-buku-guru">
                     <div class="col-md-6 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blues set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/return-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung4; ?> DATA PENGEMBALIAN</p>
                    <p class="text-muted">PENGEMBALIAN BUKU GURU</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=pengembalian-buku-kelas">
		       <div class="col-md-6 col-sm-6 col-xs-6" style="float: right;">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blues set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/return-book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung6; ?> DATA PENGEMBALIAN</p>
                    <p class="text-muted">PEMINJAMAN BUKU KELAS</p>
                </div>
             </div>
		     </div>
		 </a>
		 <a href="?page=buku">
		       <div class="col-md-6 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/book.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung7; ?> DATA BUKU</p>
                    <p class="text-muted">BUKU</p>
                </div>
             </div>
		     </div>
		 </a>
		     <a href="?page=pengunjung-siswa">
		        <div class="col-md-6 col-sm-6 col-xs-6" style="float: right;">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-orenji set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/myspace-squared.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung8; ?> DATA PENGUJUNG</p>
                    <p class="text-muted">PENGUNJUNG SISWA</p>
                </div>
             </div>
		     </div>
		 </a>
		     <a href="?page=pengunjung-guru">
		       <div class="col-md-6 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-orenji set-icon">
                    <img src="https://img.icons8.com/ios/50/000000/myspace-squared.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung9; ?> DATA PENGUNJUNG</p>
                    <p class="text-muted">PENGUNJUNG GURU</p>
                </div>
             </div>
		     </div>
		 </a>
     <?php
     if ($_SESSION['admin']['level']=="super admin") {
    ?>
        <a href="index-super-admin.php?page=pengguna">
                <div class="col-md-6 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-yellow set-icon">
                   <img src="https://img.icons8.com/ios/50/000000/user.png" class="margin-top-pict">
                </span>
                <div class="text-box" >
                    <p class="main-text" style="color: #000"><?php echo $hitung11; ?> DATA PENGGUNA</p>
                    <p class="text-muted">PENGGUNA</p>
                </div>
             </div>
         </div>
     </a>

    <?php
     }else{
      
    ?>
    <?php
     }
     ?>
	</div>
			<hr/>