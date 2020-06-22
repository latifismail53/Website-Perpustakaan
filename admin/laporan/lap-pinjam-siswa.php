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
$query = "SELECT peminjaman.judul, peminjaman.nis, siswa.nama, siswa.kelas, peminjaman.tgl_pinjam, peminjaman.jmlpinjam from peminjaman,siswa where peminjaman.nis=siswa.nis order by nama";
$sql = mysql_query($query);
$data = array();
if ($sql === FALSE) {
	die(mysql_error());
}
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}

//setting judul laporan dan header tabel
$judul = "LAPORAN PEMINJAMAN GURU";
$subjudul = "SMPN 1 BABADAN";
$header = array(
	array("label"=>"JUDUL","length"=>200, "align"=>"L"),
	array("label"=>"NIS","length"=>35, "align"=>"L"),
	array("label"=>"NAMA","length"=>30, "align"=>"L"),

	array("label"=>"KELAS","length"=>30, "align"=>"L"),
	array("label"=>"Tgl Pinjam","length"=>23, "align"=>"L"),

	array("label"=>"Jumlah","length"=>15, "align"=>"L")
	);

//sertakan library FPDF
require('fpdf17/fpdf.php');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

//tampilkan judul laporan
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,0, $judul,'0', 1, 'C');

//meletakkan gambar
$pdf->Image('mylogo.jpg',10,8);
//tampilkan subjudul laporan
$pdf->SetFont('Courier','B',14);
$pdf->Cell(0,20, $subjudul,'0', 1, 'C');

//buat header tabel
$pdf->Line(10,25,286,25);
$pdf->SetFont('Times','B','12');
$pdf->SetFillColor(173,255,47);
$pdf->SetTextColor(0);
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
$pdf->Output($name='laporan-pinjam-siswa.pdf', $dest='I');
?>