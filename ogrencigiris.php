<?php 
require_once("baglan.php");
ob_start();
session_start();
$ogrenci_numara	 = $_POST['ogrenci_numara'];
$ogrenci_sifre = $_POST['ogrenci_sifre'];
 
$sql_check = mysql_query("select * from tablo_ogrenci where ogrenci_numara='".$ogrenci_numara."' and ogrenci_sifre='".$ogrenci_sifre."' ") or die(mysql_error());
 
if(mysql_num_rows($sql_check))  {
    $_SESSION["ogrenci_numara"] = $ogrenci_numara;
    $_SESSION["ogrenci_sifre'"] = $ogrenci_sifre;
    header("Location:ogrencianasayfasi.php?ogrenci_numara=$ogrenci_numara");
}
else
{
	echo "Kullanıcı adı veya şifre hatalı";?>
	<a href="index.php">Geri Dön</a>
<?
}
ob_end_flush();
?>