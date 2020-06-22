<?php include '../conn.php';
$q = $_GET['q'];
$q = strtolower(str_replace('','-',$q));
$q = strtolower(str_replace(',','-',$q));
$q = strtolower(str_replace('.','-',$q));
if(empty($q)){
	$q="cari";
}
header("location:../pencarian.php?q=$q");?>