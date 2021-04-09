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
                    <?php
                    $durum = 0;
                    if (isset($_POST['kenar']))
                        $durum = 1;
                    if (isset($_POST['satir']) && isset($_POST['sutun'])) {
                        if ($durum == 1)
                            echo '<table border="1">';
                        else
                            echo '<table>';
                        for ($i = 0; $i < $_POST['satir']; $i++) {
                            echo '<tr>';
                            for ($j = 0; $j < $_POST['sutun']; $j++)
                                echo '<td>' . ($i + 1) . '-' . ($j + 1) . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    }

                    ?>


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
