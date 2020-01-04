<?php 
require_once 'baglan2.php';
$danisman_kullaniciadi=$_POST['danisman_kullaniciadi'];
if (isset($_POST['insertislemi'])) 
{
	$donem=$_POST['ogrenci_numara'] % 2;
	if($donem==0)
	{
		$donem=2;
	}
	else{
		$donem=1;
	}
	$kaydet=$db->prepare("INSERT into tablo_ogrenci set
		ogrenci_tcnumara=:ogrenci_tcnumara,
		ogrenci_numara=:ogrenci_numara,
		ogrenci_adi=:ogrenci_adi,
		ogrenci_soyadi=:ogrenci_soyadi,
		ogrenci_sifre=:ogrenci_sifre,
		danisman_kodu=:danisman_kodu,
		donemi=:donemi");


	$insert=$kaydet->execute(array(
		'ogrenci_tcnumara' => $_POST['ogrenci_tcnumara'],
		'ogrenci_numara' => $_POST['ogrenci_numara'],
		'ogrenci_adi' => $_POST['ogrenci_adi'],
		'ogrenci_soyadi' => $_POST['ogrenci_soyadi'],
		'ogrenci_sifre' => $_POST['ogrenci_sifre'],
		'danisman_kodu' => $_POST['danisman_kullaniciadi'],
		'donemi' => $donem
	));
	if ($insert) {
		//echo "kayıt başarılı";
		Header("Location:ogrenciislemi.php?danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;

	} 
	else
	{
		//echo "kayıt başarısız";
		Header("Location:ogrenciislemi.php?durum=no");
		exit;
	}
}
if (isset($_POST['updateislemi'])) 
{ 
	$danisman_kullaniciadi=$_GET['danisman'];
	$ogrenci_numara=$_POST['ogrenci_numara1'];

	$kaydet=$db->prepare("UPDATE tablo_ogrenci set
		ogrenci_numara=:ogrenci_numara,
		ogrenci_adi=:ogrenci_adi,
		ogrenci_soyadi=:ogrenci_soyadi
		where ogrenci_numara={$_POST['ogrenci_numara1']}
		");

	$insert=$kaydet->execute(array(
		'ogrenci_numara' => $_POST['ogrenci_numara'],
		'ogrenci_adi' => $_POST['ogrenci_adi'],
		'ogrenci_soyadi' => $_POST['ogrenci_soyadi']
	));
	if ($insert) 
	{
		Header("Location:ogrenciislemi.php?durum=ok&danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;

	} 
	else
	{
		Header("Location:duzenleogrenci.php?durum=no&danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;
	}
}
if ($_GET['bilgilerimsil']=="ok") 
{
	$danisman_kullaniciadi=$_GET['danisman'];
	$sil=$db->prepare("DELETE from tablo_ogrenci where ogrenci_numara=:numara");
	$kontrol=$sil->execute(array('numara' => $_GET['ogrenci_numara']));
	if ($kontrol) 
	{
		Header("Location:ogrenciislemi.php?danisman_kullaniciadi=$danisman_kullaniciadi");
		exit;

	} 
	else
	{
		Header("Location:ogrenciislemi.php?durum=no");
		exit;
	}
}
?>