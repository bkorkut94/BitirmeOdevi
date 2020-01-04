<?php 

function console_log( $data ){
	echo '<script>';
	echo 'console.log('+$data+')';
	echo '</script>';
  }
require_once 'baglan2.php';
try {
	$ogrenci_numara_1=$_GET['ogrenci_numara_1'];
	$ogrenci_donem_1=$_GET['ogrenci_donem_1'];
	$ogrenci_numara_2=$_GET['ogrenci_numara_2'];
	$ogrenci_donem_2=$_GET['ogrenci_donem_2'];
	$donem=$_GET['donem'];
	console_log("1" );
	$kaydet=$db->prepare("UPDATE tablo_ogrenci set
		donemi=:ogrenci_donem_2
		where ogrenci_numara=:ogrenci_numara_1");
	$UPDATE=$kaydet->execute(array(
		'ogrenci_donem_2' => $ogrenci_donem_2,
		'ogrenci_numara_1' => $ogrenci_numara_1 
	));
	if ($UPDATE) {
		echo "kayıt başarılı";
		$kaydet=$db->prepare("UPDATE tablo_ogrenci set
		donemi=:ogrenci_donem_1
		where ogrenci_numara=:ogrenci_numara_2");
	$UPDATE=$kaydet->execute(array(
		'ogrenci_donem_1' => $ogrenci_donem_1,
		'ogrenci_numara_2' => $ogrenci_numara_2
	));
	$delete1=$db->prepare("Delete from tablo_ogrencidondeg where ogrenci_numara=:ogrenci_numara");
		
	
		$delete11=$delete1->execute(array(
			'ogrenci_numara' => $ogrenci_numara_1
		));
		if(!$delete11)
		{throw new Exception("HATA!"); //hata tanımlanır
		}

		$delete2=$db->prepare("Delete from tablo_ogrencidondeg where ogrenci_numara=:ogrenci_numara");
		
	
		$delete22=$delete2->execute(array(
			'ogrenci_numara' => $ogrenci_numara_2
		));

		$ogrenci_numara=$ogrenci_numara_1;
		Header("Location:ogrencianasayfasi.php?ogrenci_numara=$ogrenci_numara&durum=ok");
		exit;
	} 
	else
	{
		throw new Exception("HATA!"); //hata tanımlanır
		echo "kayıt başarısız";
		$ogrenci_numara=$ogrenci_numara_1;
		Header("Location:ogrencianasayfasi.php?durum=no?ogrenci_numara=$ogrenci_numara");
		exit;
	}

}catch(Exception $e){
	//hata var ise burada yakalanır
echo "mesaj -> ".$e->getMessage(); //hata çıktısı üretilir
}
?>