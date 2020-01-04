<?php 
require_once 'baglan2.php';
if (isset($_POST['updateislemi'])) 
{
	$ogrenci_tcnumara=$_POST['ogrenci_tcnumara1'];
	$kaydet=$db->prepare("UPDATE tablo_ogrenci set
		ogrenci_adi=:ogrenci_adi,
		ogrenci_soyadi=:ogrenci_soyadi,
		ogrenci_tcnumara=:ogrenci_tcnumara,
		ogrenci_sifre=:ogrenci_sifre
		where ogrenci_tcnnumara={$_POST['ogrenci_tcnumara1']}
		");

	$insert=$kaydet->execute(array(
		'ogrenci_adi' => $_POST['ogrenci_adi'],
		'ogrenci_soyadi' => $_POST['ogrenci_soyadi'],
		'ogrenci_tcnumara' => $_POST['ogrenci_tcnumara'],
		'ogrenci_sifre' => $_POST['ogrenci_sifre']
	));
	if ($insert) 
	{
		echo "Kayıt İşlemi Başarılı..."; ?>
		<a href="index.php">Sisteme Giriş Yapın</a>
		<?exit;

	} 
	else
	{
		echo "Kayıt İşlemi Başarısız."; ?>
		<a href="index.php">Yeniden Deneyin</a>
		<?exit;
	}
}
?>