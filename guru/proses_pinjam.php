  <?php
  include '../conn.php';
			if(isset($_POST['pinjam'])){
				$idtrx		= $_POST['idtrx'];
				$id = $_POST['id'];
				$judul		   = $_POST['judul'];
				$nip	= $_POST['nip'];
				$tgl_pinjam	=	$_POST['tgl_pinjam'];
				$tgl_kembali	=	$_POST['tgl_kembali'];
				$jmlpinjam	=	$_POST['jmlpinjam'];
				$jumlah_buku = $_POST['jumlah_buku'];
				$status	= $_POST['status'];
             

	$sql = mysql_query("INSERT INTO guru_tr(idtrx, id, judul, nip, tgl_pinjam, tgl_kembali, jmlpinjam, status)
															VALUES('$idtrx', '$id', '$judul', '$nip','$tgl_pinjam','$tgl_kembali', '$jmlpinjam', 'Dipinjam')") or die(mysql_error());

$squ = mysql_query("UPDATE tbl_buku SET jumlah_buku=(jumlah_buku-('$jmlpinjam')) WHERE id='$id'") or die(mysql_error());
	if($sql && $squ){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Transaksi Peminjaman Berhasil Dilakukan.</div>' ;
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
			}	}
			?>
			<center><b style="color: white;">Anda Akan Kembali ke Halaman Awal</b>
<div style="background-color: white; border-radius: 10px; width: 30px; background-repeat: no-repeat;" id="waktu"></div>
<script type="text/javascript" src="js/count.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
