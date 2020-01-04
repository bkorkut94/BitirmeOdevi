<?php 
require_once 'baglan2.php';
if (isset($_POST['updateislemi'])) 
{
	$danisman_tcnnumara=$_POST['danisman_tcnnumara1'];
	$kaydet=$db->prepare("UPDATE tablo_danisman set
		danisman_kullaniciadi=:danisman_kullaniciadi,
		danisman_adi=:danisman_adi,
		danisman_soyadi=:danisman_soyadi,
		danisman_tcnnumara=:danisman_tcnnumara,
		danisman_sifre=:danisman_sifre
		where danisman_tcnnumara={$_POST['danisman_tcnnumara1']}
		");

	$insert=$kaydet->execute(array(
		'danisman_kullaniciadi' => $_POST['danisman_kullaniciadi'],
		'danisman_adi' => $_POST['danisman_adi'],
		'danisman_soyadi' => $_POST['danisman_soyadi'],
		'danisman_tcnnumara' => $_POST['danisman_tcnnumara'],
		'danisman_sifre' => $_POST['danisman_sifre']
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