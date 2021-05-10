<?php
require("templates/oturumkontrol.php");
require("templates/vt.php");

$sorgu = $vt->query("select * from kullanici");
$kullanicilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
$kayitsayisi = $sorgu->rowCount();
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
                    <h3 class="text-dark mb-0">Kulanıcılar</h3>
                </div>
                <div class="row">
                    <?php if ($kayitsayisi > 0) {
                    ?>
                    <table class="table border">
                        <thead>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>E-Posta</th>
                            <th>Aktif Mi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($kullanicilar as $satir) { ?>
                            <tr>
                                <td><?php echo $satir['id'] ?></td>
                                <td><?php echo $satir['Ad'] ?></td>
                                <td><?php echo $satir['Soyad'] ?></td>
                                <td><?php echo $satir['Eposta'] ?></td>
                                <td><?php echo $satir['Aktif'] == 0 ? 'Aktif Değil' : 'Aktif'; ?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>E-Posta</th>
                            <th>Aktif Mi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <?php
                }
                else
                    echo "Gösterilecek kayıt bulunamadı";
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
