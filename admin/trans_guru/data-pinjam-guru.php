 <?php
 include '../conn.php';?>





 <div class="container-fluid">
 <div class="col-md-12">
                     
           <section class="panel">

                              <header class="panel-heading">

                               <center> <b>  Data Peminjaman Guru</b> </center>
                            </header>

                            <div class="panel-body table-responsive">
                            <?php
                    $query="select guru_tr.idtrx, guru_tr.id, guru_tr.judul, guru_tr.nip, guru.nama, guru_tr.tgl_pinjam, guru_tr.tgl_kembali, guru_tr.jmlpinjam from guru_tr,guru where guru_tr.nip=guru.nip and status='Dipinjam' order by idtrx desc";
                    $tampil=mysql_query($query) or die(mysql_error());
                    ?>
       
                                       <table class="table table-hover">
                                  <thead>
                                    <tr>
                                        <th>IdTrx</th>
                                        <th>Id Buku</th>
                                        <th>Judul</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th> Tgl Pinjam </th>
                                        <th>Tempo</th>
                                        <th>Jumlah</th>
                                        <th width="10%">Terlambat</th>
                                        <th>Kembali</th>
                                        <th>Perpanjang</th>
                
                                  </tr>
                              </thead>
                              
                                 <?php while($row=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $row['idtrx']; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['nip'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tgl_pinjam'];?></td>
                    <td><?php echo $row['tgl_kembali'];?></td>
                    <td><?php echo $row['jmlpinjam'];?></td>
                    <td align="center"><?php
$tgl_dateline = date("Y-m-d");
$tgl_kembali = $row['tgl_kembali'];

$tgl_dateline_pcs=explode("-",$tgl_dateline);
$tgl_dateline_pcs=$tgl_dateline_pcs[2]."-".$tgl_dateline_pcs[1]."-".$tgl_dateline_pcs[0];

$tgl_kembali_pcs=explode("-",$tgl_kembali);
$tgl_kembali_pcs=$tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0];

$selisih=strtotime($tgl_dateline_pcs)-strtotime($tgl_kembali_pcs);

$selisih=$selisih/86400;

$denda=$selisih*500;
if ($selisih<=0) {
  echo "Belum Terlambat";

}
else{

echo "<font color='red'>" .floor($selisih). " hari. <br>Rp. $denda,00 ";


}
?></td>
 <td><a href="?page=pengembalian-guru&idtrx=<?php echo $row['0']; ?>">Kembalikan</a></td>
 <td><a href="?page=perpanjangan-guru&idtrx=<?php echo $row['0']; ?>">Perpanjang</a></td>
                
                
              </tr>              </td>


                    <?php   
              } 
              ?>
              
                      </table><hr />
                  <?php $tampil1=mysql_query("select guru_tr.idtrx, guru_tr.id, guru_tr.judul, guru_tr.nip, guru.nama, guru_tr.tgl_pinjam, guru_tr.tgl_kembali, guru_tr.jmlpinjam from guru_tr,guru where guru_tr.nip=guru.nip and status='Dipinjam' order by idtrx desc");
                        $user1=mysql_num_rows($tampil1);
                    ?>
                  <center><h4>Jumlah Total Peminjam : <?php echo "$user1"; ?> Orang </h4> </center>
                  </div>
              </section>

                    
          </div>
          </div>