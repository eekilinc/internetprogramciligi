<?php
require("templates/oturumkontrol.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- include
     include_once
     require
     require_once-->

    <?php include("templates/header.php") ?>
</head>
<body id="page-top">
<div id="wrapper">
    <?php include("templates/leftnavbar.php") ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <?php include("templates/topnavbar.php") ?>

        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Kulanıcılar</h3>
                </div>
                <div class="row">
                    Kullanıcılar
                </div>
                <?php /*
                if (isset($_COOKIE['deneme']))
                    echo "cookie var" ." - ". $_COOKIE['deneme'];
                else {
                    setcookie("deneme", "aglasun", time() + 60 * 60 * 24);
                    echo "Oluşturulam zamanı:" . time();
                }
                //  setcookie('deneme','',time()-60);*/
                ?>


            </div>
        </div>
        <?php include("templates/footer.php") ?>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<?php include("templates/footerscript.php") ?>
</body>
</html>
