<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danışman Sayfası</title>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Beliz Korkut">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        h1{
            color: #3d003d;
        }
        table{
            background-color: #312d9a;
        }
        #kaydetbutonu{
            position: relative;
            left: 71%;
            margin-left: -360px;
        }
    </style>
</head>
<body>
    <h1 class="display-1" align="center">Öğrenci Kaydı Yap</h1>
    <br><br>
    <div align="center" class="container">
        <form action="ogrenciislem.php" method="POST">
            <div class="form-group">
                <input type="number" required="" name="danisman_kullaniciadi" value="<?php echo $_GET['danisman_kullaniciadi']?>" 
                style="display: none" placeholder="Öğrenci Numarasını Girin" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="number" required="" name="ogrenci_numara" placeholder="Öğrenci Numarasını Girin" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="number" required="" name="ogrenci_tcnumara" placeholder="Öğrenci TcNumarasını Girin" class="form-control is-invalid">
            </div>
            <div class="form-group">
                <input type="text" required="" name="ogrenci_adi" placeholder="Öğrenci Adını Girin" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="text" required="" name="ogrenci_soyadi" placeholder="Öğrenci Soyadını Girin" class="form-control is-invalid">
            </div>
            <div class="form-group">
                <input type="text" required="" name="ogrenci_sifre" placeholder="Öğrenci Şifresini Girin" class="form-control is-valid">
            </div>
             <button class="btn btn-default" type="submit" name="insertislemi">Gönder</button>
        </form>
    </div>
    <div>

        <div class="container text-center" style="margin-top:35px;margin-bottom:35px">
                <form action="siniflistesikaydet.php?danisman_kullaniciadi=<?php echo $_GET['danisman_kullaniciadi'] ?>" method ="POST"
            name="FRMEXCELIMPORT" id="FRMEXCELIMPORT" enctype="multipart/form-data">
            <div>
                <h5>Sınıf Listesi Kaydet</h5> <br> 
                <input type="file" name="file"
                    id="file" accept=".XLS,.XLSX">
                    <br>
                <button type="submit" id="sub" name="import"
                    class ="btn btn-success">IMPORT</button>
        
            </div>
        
        </form>
        <h5><?php 
        echo "$_GET[import_status]"
         ?> </h5>
        </div>
    
        
    </DİV>
    </div>
    <h1 class="display-1" align="center">Öğrenci Bilgileri</h1>
    <br><br>
    <div class="container">
         <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Numarası</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Dönemi</th>
                    <th>Danışmanı</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
            </thead>
            <?php
            $bilgilerimsor=$db->prepare("SELECT * from tablo_ogrenci");
            $bilgilerimsor->execute();
            $say=0;
            while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>  
                <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_numara'] ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_adi'] ?></td>
                    <td><?php echo $bilgilerimcek['ogrenci_soyadi'] ?></td>
                    <td><?php echo $bilgilerimcek['donemi'] ?></td>
                    <td><?php echo $bilgilerimcek['danisman_kodu'] ?></td>
                    <td align="center"> <a href="duzenleogrenci.php?ogrenci_numara=<?php echo $bilgilerimcek['ogrenci_numara']?>&danisman=<?php echo $_GET['danisman_kullaniciadi']?>"><button class="btn btn-success">Düzenle</button></a></td>
                    <td align="center"><a href="ogrenciislem.php?ogrenci_numara=<?php echo $bilgilerimcek['ogrenci_numara']?>&danisman=<?php echo $_GET['danisman_kullaniciadi']?>&bilgilerimsil=ok">
                        <button class="btn btn-danger">Sil</button></a></td>
                </tr>
        <?php } ?>
        </table>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>