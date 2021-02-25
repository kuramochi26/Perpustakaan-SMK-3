<?php
session_start();
include 'ekstensi/koneksi.php';
include 'ekstensi/funsgipassword.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN PERPUSTAKAAN SMK NEGERI 3 PALU</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> PERPUSTAKAAN SMKN 3 PALU : LOGIN UNTUK MENDAPATKAN AKSES</h2>
               <br/>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <strong>   SILAHKAN LOGIN </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" autocomplete="off" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="password" placeholder="*******" id="pass" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" onclick="myFunction()"/> Show Password
                                            </label>
                                           
                                        </div>
                                     
                                    <button class="btn btn-primary square-btn-adjust" name="login"><span class="glyphicon glyphicon-log-in"></span> LOGIN</button>
                                  
                                    </form>
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $password=$_POST['password'];
                                        $passwords=md5($password);
                                        $ambil=mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$_POST[username]' AND password='$passwords'");
                                           $cek=mysqli_num_rows($ambil);
                                             if ($cek==1) {
                                           $pecah=mysqli_fetch_assoc($ambil);
                                            if ($pecah['level']=="super admin") {
                                                $_SESSION['admin']=$pecah;
                                             echo "<div class='alert alert-info'>Login Sukses</div>";
                                              echo "<script>location='index-super-admin.php'</script>";
                                            }elseif ($pecah['level']=="admin") {
                                                if ($pecah['status']=="aktif") {
                                                 $_SESSION['admin']=$pecah;
                                                 echo "<div class='alert alert-info'>Login Sukses</div>";
                                                echo "<script>location='index-admin.php'</script>";
                                                }elseif ($pecah['status']="blok" OR empty($pecah['status'])) {
                                                    echo "<script>alert('Akun Anda Belum Aktif Atau Di Blok, Harap Hubungi Administrator Untuk Mengaktifkan Akun')</script>";
                                                    echo "<script>location='index.php'</script>";
                                                }
                                            }
                                         }else
                                            echo "<div class='alert alert-danger'>Login Gagal, Username atau Password Salah</div>";
                                            echo "<script>location='index.php'</script>";
                                       }
                                       ?>
                                                        </div>
                           
                                                  </div>
                                               </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
