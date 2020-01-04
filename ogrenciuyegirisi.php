<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danışman Kayıt Olma</title>
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
    </style>
</head>
<body>
    <?php 
   
    $bilgilerimsor=$db->prepare("SELECT * from tablo_ogrenci where ogrenci_tcnumara=:ogrenci_tcnumara");
    $bilgilerimsor->execute(array('ogrenci_tcnumara' => $_GET['ogrenci_tcnumara']));
    $bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
    ?>
    <div id="sonuc"></div>
    <h1 class="display-3" align="center">Bilgilerinizi Gözden Geçirip Kaydolun</h1>
    <br><br>
    <div align="center" class="container">
        <form action="ogrenciuyeislemi.php" method="POST">
            <div class="form-group">
                <label for="ogrenci_adi" class="col-form-label">Adınız:</label>
                <input type="text" onfocus="degistir1()" onfocusout="degistir2()" onblur="kontrol1()" onkeydown="islem1()" onmouseup="gel1()" onmousedown="ayril1()" oncontextmenu="duzen1()" value="<?php echo $bilgilerimcek['ogrenci_adi'] ?>"  name="ogrenci_adi" required="" class="form-control is-valid">
            </div>
            <div class="form-group">
                <label for="ogrenci_soyadi" class="col-form-label">Soyadınız:</label>
                <input type="text" onfocus="degistir3()" onfocusout="degistir4()" onmouseup="gel3()" onmousedown="ayril3()" value="<?php echo $bilgilerimcek['ogrenci_soyadi'] ?>" name="ogrenci_soyadi" required="" class="form-control is-invalid">
            </div>
            <div class="form-group">
                <label for="ogrenci_tcnumara" class="col-form-label">TC Numaranız:</label>
                <input type="number" onfocusin="degistir7()" onfocusout="degistir8()" onblur="kontrol2()" onkeypress="islem2()" onmouseup="gel5()" onmousedown="ayril5()" oncontextmenu="duzen1()" value="<?php echo $bilgilerimcek['ogrenci_tcnumara'] ?>" name="ogrenci_tcnumara" required=""  class="form-control is-invalid">
            </div>
            <div class="form-group">
                <label for="ogrenci_sifre" class="col-form-label">Danışman Tarafından Verilen Şifre</label>
                <input type="text" onmouseup="gel4()" onmousedown="ayril4()"  value="<?php echo $bilgilerimcek['ogrenci_sifre'] ?>" required="" name="ogrenci_sifre" placeholder="Şifre Oluşturun" class="form-control is-valid">
            </div>
            <input hidden="" value="<?php echo $bilgilerimcek['ogrenci_tcnumara']?>" name="ogrenci_tcnumara1">
            <button class="btn btn-info" type="submit" name="updateislemi">Bilgilerimi Düzenle</button>
        </form>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" language="javascript">
        /*
        function duzen1()
        {
            alert("Kullnıcı adı 4 karakter olmalıdır");
        }
        function duzen2()
        {
            alert("Tc numara 11 karakter olmalıdır");
        }
        function degistir1()
        {
            document.getElementsByClassName("form-control is-valid")[0].style.color="purple";
        }
        function degistir2()
        {
            document.getElementsByClassName("form-control is-valid")[0].style.color="black";
        }
        function degistir3()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.color="purple";
        }
        function degistir4()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.color="black";
        }
        function degistir5()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.color="purple";
        }
        function degistir6()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.color="black";
        }
         function degistir7()
        {
            document.getElementsByClassName("form-control is-invalid")[1].style.color="purple";
        }
        function degistir8()
        {
            document.getElementsByClassName("form-control is-invalid")[1].style.color="black";
        }
        function gel1()
        {
            document.getElementsByClassName("form-control is-valid")[0].style.backgroundColor = "lightgrey";
        }
        function ayril1()
        {
            document.getElementsByClassName("form-control is-valid")[0].style.backgroundColor = "pink";
        }
        function gel2()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.backgroundColor = "lightgrey";
        }
        function ayril2()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.backgroundColor = "pink";
        }
        function gel3()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.backgroundColor = "lightgrey";
        }
        function ayril3()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.backgroundColor = "pink";
        }
        function gel4()
        {
            document.getElementsByClassName("form-control is-valid")[2].style.backgroundColor = "lightgrey";
        }
        function ayril4()
        {
            document.getElementsByClassName("form-control is-valid")[2].style.backgroundColor = "pink";
        }
        function gel5()
        {
            document.getElementsByClassName("form-control is-invalid")[1].style.backgroundColor = "lightgrey";
        }
        function ayril5()
        {
            document.getElementsByClassName("form-control is-invalid")[1].style.backgroundColor = "pink";
        }
        i=0;
        function islem1()
        {
            i+=1;
            if(i>5)
            {
                alert("Kullanıcı adı 5 karakter olmalıdır");
            }
        }
        j=0;
         function islem2()
        {
            j+=1;
            if(j>11)
            {
                alert("Tc numara 11 karakterden oluşur");
            }
        }
        function kontrol1()
        {
            var e=document.getElementsByClassName("form-control is-valid")[0].value;
            var say=e.length;
            if (say<5)
            {
                alert("ad 5 karakter olmalıdır");
            }
        }
        function kontrol2()
        {
            var e=document.getElementsByClassName("form-control is-invalid")[0].value;
            var say=e.length;
            if (say<11)
            {
                alert("Tc numara 11 karakterden oluşur");
            }
        }*/
    </script>
</body>
</html>