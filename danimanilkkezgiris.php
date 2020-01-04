<?php 
require_once("baglan.php");
ob_start();
session_start(); 
$danisman_tcnnumara	= $_POST['danisman_tcnnumara'];

$sql_check = mysql_query("select * from tablo_danisman where danisman_tcnnumara='".$danisman_tcnnumara."'") or die(mysql_error());

 
if(mysql_num_rows($sql_check))  
{
    $_SESSION["danisman_tcnnumara"] = $danisman_tcnnumara;
    header("Location:danismanuyegirisi.php?danisman_tcnnumara=$danisman_tcnnumara");
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