 <?php
 include '../conn.php';?>
 <div class="container-fluid">
 <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                               <center> <b>  Data Pengembalian SISWA</b> </center>
                            </header>
                            <div class="panel-body table-responsive">
                            <?php
                    $query="select peminjaman.idtrx, peminjaman.judul, peminjaman.nis, siswa.nama, siswa.kelas, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.jmlpinjam, peminjaman.status from peminjaman,siswa where siswa.nis=peminjaman.nis and status='Dikembalikan' order by idtrx desc";
                    $tampil=mysql_query($query) or die(mysql_error());
                    ?>
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                        <th>IdTrx</th>
                                        <th>Judul</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th> Tgl Pinjam </th>
                                        <th>Tempo</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                
                                  </tr>
                              </thead>
                              
                                 <?php while($row=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $row['idtrx']; ?></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas'];?></td>
                    <td><?php echo $row['tgl_pinjam'];?></td>
                    <td><?php echo $row['tgl_kembali'];?></td>

                    <td><?php echo $row['jmlpinjam'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                
                
              </tr>              </td>


                    <?php   
              } 
              ?>
              
                      </table><hr />
                  <?php $tampil1=mysql_query("select peminjaman.idtrx, peminjaman.judul, peminjaman.nis, siswa.nama, siswa.kelas, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.jmlpinjam from peminjaman,siswa where siswa.nis=peminjaman.nis and status='Dikembalikan' order by idtrx desc");
                        $user1=mysql_num_rows($tampil1);
                    ?>
                  <center><h4>Jumlah Total Pengembalian : <?php echo "$user1"; ?> Orang </h4> </center>
                  </div>
              </section>

                    
          </div>
          </div>