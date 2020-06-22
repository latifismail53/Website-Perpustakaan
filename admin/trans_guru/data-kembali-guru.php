 <?php
 include '../conn.php';?>
 <div class="container-fluid">
 <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                               <center> <b>  Data Pengembalian Guru</b> </center>
                            </header>
                            <div class="panel-body table-responsive">
                            <?php
                    $query="select guru_tr.idtrx, guru_tr.judul, guru_tr.nip, guru.nama, guru_tr.tgl_pinjam, guru_tr.tgl_kembali, guru_tr.jmlpinjam , guru_tr.status from guru_tr,guru where guru_tr.nip=guru.nip and status='Dikembalikan' order by idtrx desc";
                    $tampil=mysql_query($query) or die(mysql_error());
                    ?>
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                        <th>IdTrx</th>
                                        <th>Judul</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
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
                    <td><?php echo $row['nip'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tgl_pinjam'];?></td>
                    <td><?php echo $row['tgl_kembali'];?></td>

                    <td><?php echo $row['jmlpinjam'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                
                
              </tr>              </td>


                    <?php   
              } 
              ?>
              
                      </table><hr />
                  <?php $tampil1=mysql_query("select guru_tr.idtrx, guru_tr.id, guru_tr.judul, guru_tr.nip, guru.nama, guru_tr.tgl_pinjam, guru_tr.tgl_kembali, guru_tr.jmlpinjam from guru_tr,guru where guru_tr.nip=guru.nip and status='Dikembalikan' order by idtrx desc");
                        $user1=mysql_num_rows($tampil1);
                    ?>
                  <center><h4>Jumlah Total Pengembalian : <?php echo "$user1"; ?> Orang </h4> </center>
                  </div>
              </section>

                    
          </div>
          </div>