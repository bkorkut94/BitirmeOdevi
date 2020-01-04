<?php
require_once 'baglan2.php';
require_once 'vendor/php-excel-reader/excel_reader2.php';
require_once 'vendor/SpreadsheetReader.php';

if (isset($_POST["import"])) {
    $danisman_kullaniciadi = $_GET["danisman_kullaniciadi"];
    $html = "";

    $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/p5/upload/' . $_FILES['file']['name'];
    echo $targetPath;
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $Reader = new SpreadsheetReader($targetPath);

    $sheetCount = count($Reader->sheets());
    $j = 0;
    for ($i = 0; $i < $sheetCount; $i++) {
        echo "1\n";
        $html .= "<div class='row'>";
        $Reader->ChangeSheet($i);

        foreach ($Reader as $Row) {
            if ($j > 0) {

                $danisman_kullaniciadi = $_POST['danisman_kullaniciadi'];

                $donem = $Row[0] % 2;
                echo $donem . "\n";
                echo "<br>";
                if ($donem == 0) {
                    $donem = 2;
                } else {
                    $donem = 1;
                }
                $kaydet = $db->prepare("INSERT into tablo_ogrenci set
					ogrenci_tcnumara=:ogrenci_tcnumara,
					ogrenci_numara=:ogrenci_numara,
					ogrenci_adi=:ogrenci_adi,
					ogrenci_soyadi=:ogrenci_soyadi,
					ogrenci_sifre=:ogrenci_sifre,
					danisman_kodu=:danisman_kodu,
					donemi=:donemi");

                echo "kaydet";
                echo "<br>";
                echo $Row[0] . " " . $Row[1] . " " . $Row[2] . " " . $Row[3] . " " . $Row[4] . " ". $_GET['danisman_kullaniciadi'];
                echo "<br>";
                $insert = $kaydet->execute(array(
                    'ogrenci_tcnumara' => $Row[1],
                    'ogrenci_numara' => $Row[0],
                    'ogrenci_adi' => $Row[2],
                    'ogrenci_soyadi' => $Row[3],
                    'ogrenci_sifre' => $Row[4],
                    'danisman_kodu' => $_GET['danisman_kullaniciadi'],
                    'donemi' => $donem,
                ));
                echo $insert;
                if ($insert) {
                    //echo "kayıt başarılı";
                    echo "insert";

                } else {
                    echo "kayıt başarısız";

                }

			}
			
			$j = $j + 1;

        }

    }

} 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="ogrenciislemi.php?danisman_kullaniciadi=<?php echo $_GET['danisman_kullaniciadi'] ?>">Geri Dön</a>
</body>
</html>