 <h2>LIST BUKU</h2><br>
 <div><a href="?page=tambah-buku" class="btn btn-success square-btn-adjust"><span class="glyphicon glyphicon-plus"></span> TAMBAH</a></div><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             TABEL LIST BUKU
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE BUKU</th>
                                            <th>JUDUL BUKU</th>
                                            <th>PENERBIT</th>
                                            <th>PENULIS</th>
                                            <th>TAHUN TERBIT</th>
                                            <th>ISBN</th>
                                            <th>KATEGORI</th>
                                            <th>STOK BUKU</th>
                                            <th>FOTO</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor=1;
                                    $ambil=mysqli_query($koneksi,"SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori=kategori.id_kategori ORDER BY id_buku DESC");
                                    while($array=mysqli_fetch_assoc($ambil)){
                                     ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo ucwords($array['kode_buku']) ?></td>
                                            <td><?php echo ucwords($array['judul_buku']) ?></td>
                                            <td><?php echo ucwords($array['penerbit_buku']) ?></td>
                                            <td><?php echo ucwords($array['penulis_buku']) ?></td>
                                            <td><?php echo $array['tahun_terbit'] ?></td>
                                            <td><?php echo $array['isbn'] ?></td>
                                            <td><?php echo ucwords($array['kategori']) ?></td>
                                            <td><?php echo $array['stok']; ?></td>
                                            <?php
                                                if (empty($array['foto_buku'])) {
                                                 ?>
                                                 <td><img src="https://img.icons8.com/ios-filled/50/000000/book.png" width="100px" height="90px"></td>   
                                                <?php
                                                }else{
                                                ?>
                                                <td><img src="fotobuku/<?php echo $array['foto_buku']; ?>" width="100px" height="90px"></td>
                                                <?php
                                                }
                                                    ?>
                                            <td>
                                            	<a href="?page=ubah-buku&id=<?php echo $array['id_buku'] ?>" class="btn btn-warning square-btn-adjust"><span class="glyphicon glyphicon-pencil"></span> UBAH</a>
                                            	<a href="?page=hapus-buku&id=<?php echo $array['id_buku'] ?>" class="btn btn-danger square-btn-adjust" onclick="return confirm('Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
                                            </td>
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