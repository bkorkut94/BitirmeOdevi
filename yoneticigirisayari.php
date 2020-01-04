<?php 
require_once("baglan.php");
ob_start();
session_start();
$yonetici_kullaniciadi	 = $_POST['yonetici_kullaniciadi'];
$yonetici_sifre = $_POST['yonetici_sifre'];
 
$sql_check = mysql_query("select * from tablo_yonetici where yonetici_kullaniciadi='".$yonetici_kullaniciadi."' and yonetici_sifre='".$yonetici_sifre."' ") or die(mysql_error());
 
if(mysql_num_rows($sql_check))  {
    $_SESSION["yonetici_kullaniciadi"] = $yonetici_kullaniciadi;
    $_SESSION["yonetici_sifre"] = $yonetici_sifre;
    header("Location:yonetici.php");
}
else
{
	echo "Kullanıcı adı veya şifre hatalı";?>
	<a href="index.php">Geri Dön</a>
<?
}
ob_end_flush();
?>