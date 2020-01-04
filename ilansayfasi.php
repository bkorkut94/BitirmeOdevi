<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dönem Değişikliği Yapmak İsteyen Öğrencilerin İlanı</title>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Beliz Korkut">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h1 align="center">Dönem Değişikliği Yapmak İsteyen Öğrencilerin İlanı</h1>
    <div class="container">
         <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Numarası</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Normal Dönemi</th>
                    <th>Yapmak İstediği Dönemi</th>
                    <th>Değiştirme İşemi Yap</th>
                </tr>
            </thead>
            <?php
            $donem=$_GET['donemi'];
            if($donem==1)
            {
                $donem=2;
            }
            else
            {
                $donem=1;
            }
            $bilgilerimsor=$db->prepare("SELECT * from tablo_ogrencidondeg where normaldonem=$donem");
            $bilgilerimsor->execute();
            $say=0;
            while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>  
                <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_numara'] ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_adi'] ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_soyadi'] ?></td>
                    <td><?php echo $bilgilerimcek['normaldonem'] ?></td>
                    <td><?php echo $bilgilerimcek['istedigidonem'] ?></td>
                    <td align="center"><a href="degisiklik.php?ogrenci_numara_1=<?php echo $_GET['ogrenci_numara']?>&ogrenci_numara_2=<?php echo $bilgilerimcek['ogrenci_numara']?>&ogrenci_donem_1=<?php echo $_GET['donemi']?>&ogrenci_donem_2=<?php echo $bilgilerimcek['normaldonem']?>">
                        <button class="btn btn-info">Değişiklik Yap</button></a></td>
                </tr>
        <?php } ?>
        </table>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>