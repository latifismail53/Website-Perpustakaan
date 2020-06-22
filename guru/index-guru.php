<!DOCTYPE html>
<html>
<head>
	<title>SLiBS</title>
	<link rel="icon" type="image/ico" href="../icon.ico">
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	</head>
	<?php
session_start();
if(!isset($_SESSION['nama'])){
	echo "<script>alert('Silahkan login terlebih dahulu')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

?>

	<body>
		
<?php
include "../header_guru.php";
?>
		<div class="jumbotron" style="background-image: url(../latar3.jpg); background-size: cover; background-position: center; min-height: 640px;">
		<div class="container-fluid">

		<br>
<center><div class="date" style="background-color: white; border-radius: 10px; width: 150px; background-repeat: no-repeat;"><?php
		 	$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 			$hr = $array_hr[date('N')];
			$tgl= date('j');
			$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
			$bln = $array_bln[date('n')];
			$thn = date('Y');
			echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
		?></div>
<div>&nbsp</div></center>
		<?php
		error_reporting(0);
		switch ($_GET['page'])
		 {
			
			//buku
			case 'buku':
				include "buku.php";
				break;

				

						case 'buku_pinjam_guru':
						include "buku_pinjam_guru.php";
							break;
							case 'proses_pinjam':
								include 'proses_pinjam.php';
								break;


//siswa
	case 'siswa':
				include 'siswa.php';									break;							
			
			//peminjaman

			default:
				include "jumbotron.php";
			break;





		}
		?>


		<?php
	include "../footer.php";
	?>
	<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
</div></div>
	</body>



<?php } ?>

