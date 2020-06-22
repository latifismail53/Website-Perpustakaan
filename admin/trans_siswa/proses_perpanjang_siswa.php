<?php
  include '../conn.php';
			if(isset($_POST['perpanjang'])){
				$idtrx		= $_POST['idtrx'];
				$id = $_POST['id'];
				$judul		   = $_POST['judul'];
				$nip	= $_POST['nis'];
				$tgl_kembali	=	$_POST['tgl_kembali'];



	

$sql = mysql_query("UPDATE peminjaman SET tgl_kembali='$tgl_kembali' WHERE idtrx='$idtrx'") or die(mysql_error());
	if($sql){
							echo '<center><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Buku Telah Berhasil Diperpanjang... Terimakasih</div>' ;
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
			}	}
			?>
			<center><b style="color: white;">Anda Akan Kembali ke Halaman Sebelumnya</b>
<div style="background-color: white; border-radius: 10px; width: 30px; background-repeat: no-repeat;" id="waktu"></div>
<script type="text/javascript" src="trans_siswa/js/count.js"></script>
<script type="text/javascript" src="trans_siswa/js/jquery-1.11.3.min.js"></script>
