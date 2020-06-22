<?php
  include '../conn.php';
			if(isset($_POST['kembalikan'])){
				$idtrx		= $_POST['idtrx'];
				$id = $_POST['id'];
				$judul		   = $_POST['judul'];
				$nis	= $_POST['nis'];
				$tgl_pinjam	=	$_POST['tgl_pinjam'];
				$tgl_kembali	=	$_POST['tgl_kembali'];
				$jmlpinjam	=	$_POST['jmlpinjam'];
				$jumlah_buku = $_POST['jumlah_buku'];
				$status	= $_POST['status'];
             

	$sql = mysql_query("UPDATE peminjaman SET status='Dikembalikan' WHERE idtrx='$idtrx'") or die(mysql_error());

$squ = mysql_query("UPDATE tbl_buku SET jumlah_buku=(jumlah_buku+('$jmlpinjam')) WHERE id='$id'") or die(mysql_error());
	if($sql && $squ){
							echo '<center><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Buku Telah Berhasil Dikembalikan... Terimakasih</div>' ;
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
			}	}
			?>
			<center><b style="color: white;">Anda Akan Kembali ke Halaman Sebelumnya</b>
<div style="background-color: white; border-radius: 10px; width: 30px; background-repeat: no-repeat;" id="waktu"></div>
<script type="text/javascript" src="trans_siswa/js/count.js"></script>
<script type="text/javascript" src="trans_siswa/js/jquery-1.11.3.min.js"></script>
