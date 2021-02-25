 <h2>PENGUNJUNG SISWA</h2><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
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