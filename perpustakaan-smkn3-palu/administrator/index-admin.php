<?php
session_start();
include 'ekstensi/koneksi.php';
include 'ekstensi/proteksi.php';
include 'ekstensi/jam.php';
include 'ekstensi/denda.php';
include 'ekstensi/peminjaman.php';
$id=$_SESSION['admin']['id_admin'];
$foto=mysqli_query($koneksi,"SELECT foto,akses_terakhir FROM admin WHERE id_admin='$id'");
$ambilfoto=mysqli_fetch_assoc($foto);
if ($_SESSION['admin']['level']!="admin") {
  echo "<script>alert('Maaf Halaman Ini Tidak Dapat Diakses Oleh Super Admin')</script>";
  echo "<script>location='index-super-admin.php'</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="copyright" content="KurooCorp">
	<meta name="subject" content="admin page">
	<meta name="language" content="id">
	<meta name="robots" content="index.html">
	<meta name="url" content="www.Admin-kuroo.com">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PERPUSTAKAAN SMK NEGERI 3 PALU</title>
   <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
            	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-admin.php">PERPUSTAKAAN</a> 
</div>
<?php
$tgl=date('Y-m-d');
?>
<div class="navbar-top-left">
   <div class="tgl">
    <p class="bold"><?php echo date('D, d M Y',strtotime($tgl)) ?></p>
  </div> 
  <div class="time" style="margin-left: 25px">
    <p id="jam" class="bold"> </p>
  </div>
   <div class="time-cover">
    <p class="bold">:</p>
  </div>
  <div class="time">
    <p id="menit" class="bold"> </p>
  </div>
  <div class="time-cover" ">
    <p class="bold">:</p>
  </div>
  <div class="time"">
    <p id="detik" class="bold"></p>
  </div>
</div>
<?php
if ($ambilfoto['akses_terakhir']=='0000-00-00') {
?>
 <div class="navbar-top-right"> 
Last access : New Account &nbsp; <a href="logout.php" class="btn btn-primary square-btn-adjust"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </div>
<?php
}else{
?>
 <div class="navbar-top-right"> 
Last access : <?php echo date('D, d M Y',strtotime($ambilfoto['akses_terakhir'])) ?> &nbsp; <a href="logout.php" class="btn btn-primary square-btn-adjust"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </div>
<?php  
}
?> 
       </nav>
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <a href="?page=user-profil">
        <li class="text-center">
          <?php
          if (empty($ambilfoto['foto'])) {
          ?>
                    <img src="assets/img/find_user.png" class="user-image img-responsive">
          <?php
          }else{
            ?>
                    <img src="foto-admin/<?php echo $ambilfoto['foto'] ?>" class="img-responsive">
            <?php
          }   
          ?>
                    </li>
                  </a>
                    <li>
                      <?php
                      if ($_SESSION['admin']['level']=="super admin") {
                        ?>
                          <a  href="index-super-admin.php"><img src="https://img.icons8.com/ios-filled/50/000000/home.png">  HOME</a>
                        <?php
                      }elseif ($_SESSION['admin']['level']=="admin") {
                        ?>
                        <a  href="index-admin.php"><img src="https://img.icons8.com/ios-filled/50/000000/home-page.png">  HOME</a>
                        <?php
                      }
                      ?>
                      
                    </li>
                     <li>
                        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/borrow-book.png"> PEMINJAMAN<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=peminjaman-buku-siswa">PEMINJAMAN SISWA</a>
                            </li>
                            <li>
                                <a href="?page=peminjaman-buku-guru">PEMINJAMAN GURU</a>
                            </li>
                              <li>
                                <a href="?page=peminjaman-buku-kelas">PEMINJAMAN KELAS</a>
                            </li>
                        </ul>
                      </li> 
                        <li>
                        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/return-book.png"> PENGEMBALIAN<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=pengembalian-buku-siswa">PENGEMBALIAN SISWA</a>
                            </li>
                            <li>
                                <a href="?page=pengembalian-buku-guru">PENGEMBALIAN GURU</a>
                            </li>
                              <li>
                                <a href="?page=pengembalian-buku-kelas">PENGEMBALIAN KELAS</a>
                            </li>
                        </ul>
                      </li>   
                     <li>
                        <a  href="?page=buku"><img src="https://img.icons8.com/ios-filled/50/000000/book.png"> BUKU</a>
                    </li>
                     <li>
                        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/myspace-squared.png"> DAFTAR PENGUNJUNG<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=pengunjung-siswa">PENGUNJUNG SISWA</a>
                            </li>
                            <li>
                                <a href="?page=pengunjung-guru">PENGUNJUNG GURU</a>
                            </li>
                        </ul>
                      </li>   
                    <li>
                        <a  href="?page=laporan"><img src="https://img.icons8.com/ios-glyphs/50/000000/import.png"> LAPORAN</a>
                    </li>
                </ul>
                </div>	
       </nav>  
      <div id="page-wrapper" >
            <div id="page-inner">
              <?php
              if (isset($_GET['page'])) {
                  if ($_GET['page']=="peminjaman-buku-siswa"){
                    include 'peminjaman-buku-siswa.php';
                }elseif ($_GET['page']=="peminjaman-buku-guru") {
                    include 'peminjaman-buku-guru.php';
                }elseif ($_GET['page']=="peminjaman-buku-kelas") {
                    include 'peminjaman-buku-kelas.php';
                }elseif ($_GET['page']=="pengembalian-buku-siswa") {
                    include 'pengembalian-buku-siswa.php';
                }elseif ($_GET['page']=="pengembalian-buku-guru") {
                    include 'pengembalian-buku-guru.php';
                }elseif ($_GET['page']=="pengembalian-buku-kelas") {
                    include 'pengembalian-buku-kelas.php';
                }elseif ($_GET['page']=="buku") {
                    include 'buku.php';
                }elseif ($_GET['page']=="pengunjung-siswa") {
                    include 'pengunjung-siswa.php';
                }elseif ($_GET['page']=="pengunjung-guru") {
                    include 'pengunjung-guru.php';
                }elseif ($_GET['page']=="laporan") {
                    include 'laporan.php';
                }elseif ($_GET['page']=="tambah-buku") {
                    include 'tambah-buku.php';
                }elseif ($_GET['page']=="tambah-peminjam-siswa") {
                    include 'tambah-peminjam-siswa.php';
                }elseif ($_GET['page']=="tambah-peminjam-guru") {
                    include 'tambah-peminjam-guru.php';
                }elseif ($_GET['page']=="tambah-peminjam-kelas") {
                    include 'tambah-peminjam-kelas.php';
                }elseif ($_GET['page']=="ubah-buku") {
                    include 'ubah-buku.php';
                }elseif ($_GET['page']=="hapus-buku") {
                    include 'hapus-buku.php';
                }elseif ($_GET['page']=='user-profil') {
                    include 'profil.php';
                }elseif ($_GET['page']=='ubah-profil') {
                    include 'ubah-profil.php';
                }
              }else{
                include 'home.php';
              }
              ?>
            </div>
          
            
             
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>