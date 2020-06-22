<?php
$sql=mysql_query("SELECT * FROM tbl_buku WHERE judul like '%$q%' or link like '%$q%' order by id desc limit 10");
$cekdata=mysql_num_rows($sql);
if($cekdata!=0){
	while ($post=mysql_fetch_array($sql)) {
		$judul=strip_tags(ucfirst($post['judul']));?>
		Hasil Pencarian Sekitar <?php echo $cekdata;?> ditemukan <hr>
		<li><a href=""><?php echo $judul;?></a></li>
		<?php }} else {echo'<p>Data yang anda cari tidak ditemukan</p>';}?>
