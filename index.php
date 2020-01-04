<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Beliz Korkut">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #resim2{
            position: absolute;
            bottom: 0;
        }
        .dropdown-menu{
            background-color: #acb3b3;
        }
    </style>
</head>
<body>
    <img id="resim1" width="100%" src="resim1.png">
    <br><br><br><br><br><br>
    <div class="container">
        <h1 align="center" class="display-1">Giriş Sayfası</h1>
        <br><br><br><br><br><br>
        <div align="center"  class="row">
            <div class="col-md-4">Yönetici Girişi:<button type="button" class="btn btn-primary" id="dropdownMenuButton" data-toggle="dropdown">Giriş Yap</button>
                <div class="dropdown-menu">
                    <form action="yoneticigirisayari.php" method="POST">
                        <label for="yonetici_kullaniciadi" class="col-form-label">Kullanıcı Adını Girin</label>
                        <input type="text" class="form-control" name="yonetici_kullaniciadi" required="">
                        <label for="yonetici_sifre" class="col-form-label">Şifreyi Girin</label>
                        <input type="password" class="form-control" name="yonetici_sifre" required="">
                        <button class="btn btn-warning">  Giriş Yap </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">Danışman Girişi:<button type="button" class="btn btn-success" id="dropdownMenuButton" data-toggle="dropdown">Giriş Yap</button>
                <div class="dropdown-menu">
                    <form action="danimanilkkezgiris.php" method="POST">
                        <h1>İlk Kez Giriş</h1>
                        <label for="danisman_tcnnumara" class="col-form-label">TC Kimlik Numaranı Girin</label>
                        <input type="text" class="form-control" name="danisman_tcnnumara" required="">
                        <button class="btn btn-success">Düzenle</button>
                    </form>
                    <form action="danismangiris.php" method="POST">
                        <h1>Üye Girişi</h1>
                        <label for="danisman_kullaniciadi" class="col-form-label">Kullanıcı Adını Girin</label>
                        <input type="text" class="form-control" name="danisman_kullaniciadi" required="">
                        <label for="danisman_sifre" class="col-form-label">Şifreyi Girin</label>
                        <input type="password" class="form-control" name="danisman_sifre" required="">
                        <button class="btn btn-warning">  Giriş Yap </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">Öğrenci Girişi:<button name="" class="btn btn-info" id="dropdownMenuButton" data-toggle="dropdown">Giriş Yap</button>
                <div class="dropdown-menu">
                    <form action="ogrenciilkkezgiris.php" method="POST">
                        <h1>İlk Kez Giriş</h1>
                        <label for="ogrenci_tcnumara" class="col-form-label">TC Kimlik Numaranı Girin</label>
                        <input type="text" class="form-control" name="ogrenci_tcnumara" required="">
                        <button class="btn btn-success">Düzenle</button>
                    </form>
                    <form action="ogrencigiris.php" method="POST">
                        <h1>Üye Girişi</h1>
                        <label for="ogrenci_numara" class="col-form-label">Okul Numaranızı Girin</label>
                        <input type="text" class="form-control" name="ogrenci_numara" required="">
                        <label for="ogrenci_sifre" class="col-form-label">Şifreyi Girin</label>
                        <input type="password" class="form-control" name="ogrenci_sifre" required="">
                        <button class="btn btn-warning">  Giriş Yap </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <img id="resim2" width="100%" src="resim2.png">
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
   <script type="text/javascript" language="javascript">
        document.body.style.backgroundColor = "lightgrey";
    </script>
</body>
</html>