<?php
//koneksi database
$db_host	= "localhost";
$db_user	= "root";
$db_pass	= "";
$db_name	= "smp";

$konek	= mysql_connect($db_host,$db_user,$db_pass,$db_name) or die ("Gagal koneksi ke server");
mysql_select_db($db_name, $konek) or die ("Gagal mengaktifkan database".mysql_error());
 
//akhir koneksi


//mengambil data dari tabel dan memasukkannya dalam array
$query = "SELECT * FROM siswa ORDER BY nama";
$sql = mysql_query($query);
$data = array();
if ($sql === FALSE) {
	die(mysql_error());
}
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}

//setting judul laporan dan header tabel
$judul = "LAPORAN DATA SISWA";

$subjudul = "=> SMPN 1 BABADAN <=";
$header = array(
	array("label"=>"NIS","length"=>30, "align"=>"C"),
	array("label"=>"NAMA","length"=>50, "align"=>"C"),
	array("label"=>"KELAS","length"=>80, "align"=>"C"),
	array("label"=>"JENIS","length"=>30, "align"=>"C"));

//sertakan library FPDF
require('fpdf17/fpdf.php');





$pdf = new FPDF();
$pdf->AddPage();
//tampilkan judul laporan
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,20, $judul,'0', 1, 'C');



//meletakkan gambar
$pdf->Image('mylogo.jpg',10,8);

//buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(173,255,47);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->Line(10,25,200,25);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
$pdf->setY(-30);
$pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());
$pdf->Cell(10,5,'Halaman '.$pdf->PageNo(),0,0,'L');


//Output File PDF
$pdf->Output($name='data-siswa.pdf', $dest='I');
?>