<?php
include 'administrator/ekstensi/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR PENGUNJUNG SISWA</title>
	<link rel="stylesheet" type="text/css" href="administrator/assets/css/bootstrap-custom.css">
	<!-- MORRIS CHART STYLES-->
   <link rel="stylesheet" type="text/css" href="administrator/assets/css/custom.css">
        <!-- CUSTOM STYLES-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="administrator/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
	<?php
	include 'administrator/ekstensi/navbar.php';
	?>
<div class="container">
	<h2>DAFTAR PENGUNJUNG SISWA</h2><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             TABEL PENGUNJUNG SISWA
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA SISWA</th>
                                            <th>KELAS</th>
                                            <th>JURUSAN</th>
                                            <th>TANGGAL BERKUNJUNG</th>
                                            <th>KEPERLUAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor=1;
                                    $ambil=mysqli_query($koneksi,"SELECT * FROM bukutamusiswa LEFT JOIN kelas ON bukutamusiswa.id_kelas=kelas.id_kelas LEFT JOIN jurusan ON bukutamusiswa.id_jurusan=jurusan.id_jurusan ORDER BY tanggal_berkunjung DESC");
                                    while($array=mysqli_fetch_assoc($ambil)){
                                     ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo ucwords($array['nama']) ?></td>
                                            <td><?php echo $array['kelas']; ?></td>
                                            <td><?php echo ucwords($array['jurusan']) ?></td>
                                            <td><?php echo date('d M Y',strtotime($array['tanggal_berkunjung'])) ?></td>
                                            <td><?php echo ucwords($array['keperluan']) ?></td>
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
                 <!-- BOOTSTRAP SCRIPTS -->
   <script src="administrator/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="administrator/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="administrator/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="administrator/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="administrator/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="administrator/assets/js/custom.js"></script>
</body>
</html>