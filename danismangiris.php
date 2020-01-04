<?php 
require_once("baglan.php");
ob_start();
session_start();
$danisman_kullaniciadi	 = $_POST['danisman_kullaniciadi'];
$danisman_sifre = $_POST['danisman_sifre'];
 
$sql_check = mysql_query("select * from tablo_danisman where danisman_kullaniciadi='".$danisman_kullaniciadi."' and danisman_sifre='".$danisman_sifre."' ") or die(mysql_error());
 
if(mysql_num_rows($sql_check))  {
    $_SESSION["danisman_kullaniciadi"] = $danisman_kullaniciadi;
    $_SESSION["danisman_sifre'"] = $danisman_sifre;
    header("Location:ogrenciislemi.php?danisman_kullaniciadi=$danisman_kullaniciadi");
}
else
{
	echo "Kullanıcı adı veya şifre hatalı";?>
	<a href="index.php">Geri Dön</a>
<?
}
ob_end_flush();
?>