<?php
// backend kontrol paneli
// arayüz tasarımı
// veri tabanı tasarımı
// veritabanı bağlantısı
// kullanıcı girişimiz
// veritabanı işlemlerimiz

// bootstrap


// php veritabanı javascript html css

// frontend html css javascript

?>

<!DOCTYPE html>
<html lang="tr">
<head>
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
                    <h3 class="text-dark mb-0">Anasayfa</h3>
                </div>
                <div class="row">
                    Burası anasasayfadır burada ana içerikller oluşturlacak
                </div>

            </div>
        </div>
        <?php include("templates/footer.php") ?>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<?php include("templates/footerscript.php") ?>
</body>
</html>
