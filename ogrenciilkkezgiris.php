<?php 
require_once("baglan.php");
ob_start();
session_start(); 
$ogrenci_tcnumara= $_POST['ogrenci_tcnumara'];

$sql_check = mysql_query("select * from tablo_ogrenci where ogrenci_tcnumara='".$ogrenci_tcnumara."'") or die(mysql_error());

 
if(mysql_num_rows($sql_check))  
{
    $_SESSION["ogrenci_tcnumara"] = $ogrenci_tcnumara;
    header("Location:ogrenciuyegirisi.php?ogrenci_tcnumara=$ogrenci_tcnumara");
}
else
{
	echo "Öyle Tc numaralı biri bulunamadı <br>";
	echo "Yeniden deneyin <br>";?>
	<a href="index.php">Geri Dön</a>
<?
}
ob_end_flush();
?>