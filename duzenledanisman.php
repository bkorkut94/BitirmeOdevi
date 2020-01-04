<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Düzenle</title>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Beliz Korkut">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .disdiv{
            position: absolute;
            top: 200px;
            right: 450px;
        }
    </style>
</head>
<body>
    <div class="disdiv">
    <h1 class="display-3" align="center">Danışman Bilgisini Düzenle</h1>
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
    <?php 
    $bilgilerimsor=$db->prepare("SELECT * from tablo_danisman where danisman_kullaniciadi=:kullaniciadi");
    $bilgilerimsor->execute(array('kullaniciadi' => $_GET['danisman_kullaniciadi']));
    $bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
    ?>
    <div align="center" class="container">
        <form action="islem.php" method="POST">
            <div class="form-group">
                <input type="text" required="" name="danisman_kullaniciadi" value="<?php echo $bilgilerimcek['danisman_kullaniciadi'] ?>" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="text" required="" name="danisman_adi" value="<?php echo $bilgilerimcek['danisman_adi'] ?>" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="text" required="" name="danisman_soyadi" value="<?php echo $bilgilerimcek['danisman_soyadi'] ?>" class="form-control is-invalid">
            </div>
        <input type="hidden" value="<?php echo $bilgilerimcek['danisman_kullaniciadi'] ?>" name="danisman_kullaniciadi1">
        <button onclick="yap()" class="btn btn-info" type="submit" name="updateislemi">Düzenle</button>
        <br>
        <a href="yonetici.php">Geri Dön</a>
        </form>
    </div>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" language="javascript">
        //document.querySelector(".display-3").innerHTML="Düzenleme İşlemi Tamamdır";
    </script>
</body>
</html>