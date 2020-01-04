<?php 
require_once 'baglan2.php';
if (isset($_POST['insertislemi'])) 
{
	$kaydet=$db->prepare("INSERT into tablo_danisman set
		danisman_kullaniciadi=:danisman_kullaniciadi,
		danisman_tcnnumara=:danisman_tcnnumara,
		danisman_adi=:danisman_adi,
		danisman_soyadi=:danisman_soyadi");


	$insert=$kaydet->execute(array(
		'danisman_kullaniciadi' => $_POST['danisman_kullaniciadi'],
		'danisman_tcnnumara' => $_POST['danisman_tcnnumara'],
		'danisman_adi' => $_POST['danisman_adi'],
		'danisman_soyadi' => $_POST['danisman_soyadi']
	));
	if ($insert) {
		//echo "kayıt başarılı";
		Header("Location:yonetici.php?durum=ok");
		exit;

	} 
	else
	{
		//echo "kayıt başarısız";
		Header("Location:yönetici.php?durum=no");
		exit;
	}
}
if (isset($_POST['updateislemi'])) 
{
	$danisman_kullaniciadi=$_POST['danisman_kullaniciadi1'];
	$kaydet=$db->prepare("UPDATE tablo_danisman set
		danisman_kullaniciadi=:danisman_kullaniciadi,
		danisman_adi=:danisman_adi,
		danisman_soyadi=:danisman_soyadi
		where danisman_kullaniciadi={$_POST['danisman_kullaniciadi1']}
		");

	$insert=$kaydet->execute(array(
		'danisman_kullaniciadi' => $_POST['danisman_kullaniciadi'],
		'danisman_adi' => $_POST['danisman_adi'],
		'danisman_soyadi' => $_POST['danisman_soyadi']
	));
	if ($insert) 
	{
		Header("Location:duzenledanisman.php?durum=ok&danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;

	} 
	else
	{
		Header("Location:duzenledanisman.php?durumno&danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;
	}
}
if ($_GET['bilgilerimsil']=="ok") 
{
	$sil=$db->prepare("DELETE from tablo_danisman where danisman_kullaniciadi=:kullaniciadi");
	$kontrol=$sil->execute(array('kullaniciadi' => $_GET['danisman_kullaniciadi']));
	if ($kontrol) 
	{
		Header("Location:yonetici.php?durum=ok");
		exit;

	} 
	else
	{
		Header("Location:yonetici.php?durum=no");
		exit;
	}
}
?>