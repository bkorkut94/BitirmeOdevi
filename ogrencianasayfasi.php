<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Sayfası</title>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Beliz Korkut">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h1 class="display-1" align="center">Bilgilerim</h1>
    <br><br>
    <?php 
    if ($_GET['durum']=="ok")
    {
        
        echo "İşlem başarılı";
    }
    elseif ($_GET['durum']=="no") {

        echo "İşlem başarısız";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a href="#ogrenci_numara" data-toggle="tab" class="nav-link">Numara</a>
                    </li>
                    <li class="nav-item">
                        <a href="#ogrenci_adi" data-toggle="tab" class="nav-link">Adı</a>
                    </li>
                    <li class="nav-item">
                        <a href="#ogrenci_soyadi" data-toggle="tab" class="nav-link">Soyadı</a>
                    </li>
                    <li class="nav-item">
                        <a href="#donemi" data-toggle="tab" class="nav-link">Dönemi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sifredegistir" data-toggle="tab" class="nav-link">Şifre Değiştirmek İstiyorum</a>
                    </li>
                    <li class="nav-item">
                        <a href="#donemdegistir" data-toggle="tab" class="nav-link">Dönem Değişikliği Yapmak İstiyorum</a>
                    </li>
                </ul>
            </div>
        <?php 
        $bilgilerimsor=$db->prepare("SELECT * from tablo_ogrenci where ogrenci_numara=:numara");
        $bilgilerimsor->execute(array('numara' => $_GET['ogrenci_numara']));
        $bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="col-md-6">
                <div class="tab-content">
                    <div class="tab-pane" id="ogrenci_numara">
                        <?php
                        $ogrenci_numara=$bilgilerimcek['ogrenci_numara']; 
                        echo $ogrenci_numara; ?>
                    </div>
                    <div class="tab-pane" id="ogrenci_adi"> 
                        <?php 
                        $ogrenci_adi=$bilgilerimcek['ogrenci_adi']; 
                        echo $ogrenci_adi; ?>
                    </div>
                    <div class="tab-pane" id="ogrenci_soyadi">
                        <?php 
                        $ogrenci_soyadi=$bilgilerimcek['ogrenci_soyadi'];
                        echo $ogrenci_soyadi; ?>
                    </div>
                    <div class="tab-pane" id="donemi">
                        <?php $donemi=$bilgilerimcek['donemi']; 
                        echo $donemi; ?>
                    </div>
                    <div class="tab-pane" id="sifredegistir">
                    <h1 class="display-1">Şifre Değiştir</h1>
                    <br>
                    <form action="ogrencisifredegistir.php" method="POST">
                        <label for="ogrenci_numara" class="col-form-label">Öğrenci Numaranı Gir</label>
                        <input type="text" class="form-control" name="ogrenci_numara" required="">
                        <label for="ogrenci_sifre" class="col-form-label">Eski Şifrenizi Girin</label>
                        <input type="password" class="form-control" name="ogrenci_sifre" required="">
                        <label for="ogrenci_sifre" class="col-form-label">Yeni Şifrenizi Girin</label>
                        <input type="password" class="form-control" name="ogrenci_sifreyeni" required="">
                        <button class="btn btn-dark">  Şifreyi Değiştir </button> 
                    </form>
                    </div>
                    <div class="tab-pane" id="donemdegistir">
                        <form action="ilanver.php?ogrenci_numara=$ogrenci_numara&donemi=<?php echo $donemi?>" method="POST">
                            <input type="text" hidden="" name="ogrenci_numara" value="<?php echo $ogrenci_numara?>">
                            <input type="text" hidden="" name="ogrenci_adi" value="<?php echo $ogrenci_adi?>">
                            <input type="text" hidden="" name="ogrenci_soyadi" value="<?php echo $ogrenci_soyadi?>">
                            <input type="text" hidden="" name="donemi" value="<?php echo $donemi?>">
                            <button class="btn btn-warning" name="ilanver">Dönem Değişiliği İlanı Ver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>