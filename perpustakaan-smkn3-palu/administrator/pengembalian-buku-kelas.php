 <h2>PENGEMBALIAN BUKU KELAS</h2><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TABEL PENGEMBALIAN BUKU KELAS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA PEMINJAM</th>
                                            <th>NAMA GURU</th>
                                            <th>KELAS</th>
                                            <th>JURUSAN</th>
                                            <th>KODE BUKU</th>
                                            <th>JUDUL BUKU</th>
                                            <th>TANGGAL PEMINJAMAN</th>
                                            <th>TANGGAL HARUS KEMBALI</th>
                                            <th>TANGGAL KEMBALI</th>
                                            <th>DENDA</th>
                                            <th>JUMLAH PINJAM</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor=1;
                                    $ambil=mysqli_query($koneksi,"SELECT * FROM transaksi_kelas LEFT JOIN kelas ON transaksi_kelas.id_kelas=kelas.id_kelas LEFT JOIN jurusan ON transaksi_kelas.id_jurusan=jurusan.id_jurusan LEFT JOIN buku ON transaksi_kelas.id_buku=buku.id_buku ORDER BY tanggal_pinjam DESC");
                                    while($array=mysqli_fetch_assoc($ambil)){
                                     ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo ucwords($array['nama_peminjam']) ?></td>
                                            <td><?php echo ucwords($array['nama_guru']) ?></td>
                                            <td><?php echo $array['kelas']; ?></td>
                                            <td><?php echo ucwords($array['jurusan']) ?></td>
                                            <td><?php echo $array['kode_buku']; ?></td>
                                            <td><?php echo ucwords($array['judul_buku']) ?></td>
                                            <td><?php echo date('d M Y',strtotime($array['tanggal_pinjam'])) ?></td>
                                            <td><?php echo date('d M Y',strtotime($array['tanggal_harus_kembali'])) ?></td>
                                             <?php 
                                            if ($array['tanggal_kembali']=='0000-00-00') {
                                            ?>
                                            <td></td>
                                            <?php
                                            }else{
                                            ?>
                                            
                                            <td><?php echo date('d M Y', strtotime($array['tanggal_kembali'])); ?></td>
                                            <?php    
                                            }
                                            ?>
                                            <td><?php echo $array['terlambat']." Hari<br>Rp. ".number_format($array['denda']) ?></td>
                                            <td><?php echo $array['jumlah_pinjam']; ?></td>
                                            <td><?php echo $array['status']; ?></td>
                                           <?php
                                     if ($array['status']=="Dikembalikan") {?>
                                        <td></td>
                                        <?php   
                                    }else{?>
                                        <td><a href="kembali-kelas.php?id=<?php echo $array['id_transaksikelas'] ?>" class="btn btn-success square-btn-adjust"><span class="glyphicon glyphicon-check"></span> KEMBALI</a></td>
                                        <?php
                                        }
                                        ?>
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