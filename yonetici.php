<?php 
require_once 'baglan2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Yönetici Sayfası</title>
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
            color:#271616;
        }
    </style>
</head>
<body>
    <h1 class="display-1" align="center">Danışman Kaydı Yap</h1>
    <br><br>
    <div align="center" class="container">
        <form action="islem.php" method="POST">
            <div class="form-group">
                <input type="number" required="" onblur="kontrol1()" onkeydown="islem1()" onmouseleave="ayril1()" onmouseenter="degistir1()" oncontextmenu="duzen1()" name="danisman_kullaniciadi" placeholder="Danışman Kullanıcı Adını Girin" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="number" required="" onblur="kontrol2()" onkeypress="islem2()" onmouseleave="ayril3()" onmouseover="degistir3()" oncontextmenu="duzen2()" name="danisman_tcnnumara" placeholder="Danışman TC Numarasını Girin" class="form-control is-invalid">
            </div>
            <div class="form-group">
                <input type="text" required="" onmouseout="ayril2()" onmouseenter="degistir2()" name="danisman_adi" placeholder="Danışman Adını Girin" class="form-control is-valid">
            </div>
            <div class="form-group">
                <input type="text" required="" onmouseout="ayril4()" onmouseover="degistir4()" name="danisman_soyadi" placeholder="Danışman Soyadını Girin" class="form-control is-invalid">
            </div>
             <button class="btn btn-default" type="submit" name="insertislemi">Gönder</button>
        </form>
    </div>
    <h1 class="display-1" align="center">Danışman Bilgileri</h1>
    <br><br>
    <div class="container">
         <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Kullanıcı Adı</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
            </thead>
            <?php
            $bilgilerimsor=$db->prepare("SELECT * from tablo_danisman");
            $bilgilerimsor->execute();
            $say=0;
            while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>  
                <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $bilgilerimcek['danisman_kullaniciadi'] ?></td>
                    <td><?php echo $bilgilerimcek['danisman_adi'] ?></td>
                    <td><?php echo $bilgilerimcek['danisman_soyadi'] ?></td>
                    <td align="center"> <a href="duzenledanisman.php?danisman_kullaniciadi=<?php echo $bilgilerimcek['danisman_kullaniciadi']?>">
                        <button class="btn btn-success">Düzenle</button></a></td>
                    <td align="center"><a href="islem.php?danisman_kullaniciadi=<?php echo $bilgilerimcek['danisman_kullaniciadi']?>&bilgilerimsil=ok">
                        <button class="btn btn-danger">Sil</button></a></td>
                </tr>
        <?php } ?>
        </table>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.js" ></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" language="javascript"> 
        /*document.body.style.backgroundImage= "url('arkaplan1.jpg')";
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
            document.getElementsByClassName("form-control is-valid")[0].style.backgroundColor = "yellow"; 
        }
        function degistir2()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.backgroundColor = "yellow"; 
        }
        function degistir3()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.backgroundColor = "orange"; 
        }
        function degistir4()
        {
            document.getElementsByClassName("form-control is-invalid")[1].style.backgroundColor = "orange"; 
        }
        function ayril1()
        {
            document.getElementsByClassName("form-control is-valid")[0].style.backgroundColor = "skyblue"; 
        }
        function ayril2()
        {
            document.getElementsByClassName("form-control is-valid")[1].style.backgroundColor = "skyblue"; 
        }
        function ayril3()
        {
            document.getElementsByClassName("form-control is-invalid")[0].style.backgroundColor = "pink";
        }
         function ayril4()
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