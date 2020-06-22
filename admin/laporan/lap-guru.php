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
$query = "SELECT * FROM guru ORDER BY nama";
$sql = mysql_query($query);
$data = array();
if ($sql === FALSE) {
	die(mysql_error());
}
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}

//setting judul laporan dan header tabel
$judul = "LAPORAN DATA GURU";
$header = array(
	array("label"=>"NIP","length"=>30, "align"=>"L"),
	array("label"=>"NAMA","length"=>50, "align"=>"L"),
	array("label"=>"ALAMAT","length"=>80, "align"=>"L"),
	array("label"=>"NO. HP","length"=>30, "align"=>"L"));

//sertakan library FPDF
require('fpdf17/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

//tampilkan judul laporan
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,20, $judul,'0', 1, 'C');

//buat header tabel
$pdf->SetFont('Times','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
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

//Output File PDF
$pdf->Output($name='data-guru.pdf', $dest='I');
?>