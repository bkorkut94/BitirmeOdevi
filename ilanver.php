<?php 
require_once 'baglan2.php';
if (isset($_POST['ilanver'])) 
{
	$donem=$_POST['ogrenci_numara'] % 2;
	if($donem==0)
	{
		$donem1=2;
		$donem2=1;
	}
	else{
		$donem1=1;
		$donem2=2;
	}
	$kaydet=$db->prepare("INSERT into tablo_ogrencidondeg set
		ogrenci_numara=:ogrenci_numara,
		ogrenci_adi=:ogrenci_adi,
		ogrenci_soyadi=:ogrenci_soyadi,
		normaldonem=:normaldonem,
		istedigidonem=:istedigidonem");
	$insert=$kaydet->execute(array(
		'ogrenci_numara' => $_POST['ogrenci_numara'],
		'ogrenci_adi' => $_POST['ogrenci_adi'],
		'ogrenci_soyadi' => $_POST['ogrenci_soyadi'],
		'normaldonem' =>  $donem1,
		'istedigidonem' =>  $donem2
	));
	if ($insert) {
		//echo "kayıt başarılı";
		$ogrenci_numara=$_POST['ogrenci_numara'];
		Header("Location:ilansayfasi.php?ogrenci_numara=$ogrenci_numara&donemi=$donem1");
		exit;

	} 
	else
	{
		//echo "kayıt başarısız";
		$ogrenci_numara=$_POST['ogrenci_numara'];
		Header("Location:ilansayfasi.php?durum=no&ogrenci_numara=$ogrenci_numara&donemi=$donem1");
		exit;
	}
}
?>