<?php
require("templates/oturumkontrol.php");
require("templates/vt.php");

$sorgu = $vt->query("select * from kullanici order by id desc");
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


                <?php
                if (isset($_SESSION['durum'])) {
                    if ($_SESSION['durum'] == 1)
                        echo "Kayıt Silme Başarılı";
                    else
                        echo "Maalesef Kayıt silinemedi";
                    unset($_SESSION['durum']);
                }

                ?>

                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h5 class="text-primary m-0 font-weight-bold">Kullanıcılar</h5>
                            <a class="badge badge-info" href="kullanici.php?islem=ekle">Yeni Kullanıcı Ekle</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                 aria-describedby="dataTable_info">
                                <?php if ($kayitsayisi > 0) {
                                    ?>
                                    <table class="table table-bordered table-striped table-hover" id="kullaniciTablo">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">İd</th>
                                            <th scope="col">Ad</th>
                                            <th scope="col">Soyad</th>
                                            <th scope="col">E-Posta</th>
                                            <th scope="col" class="text-center">Aktif Mi</th>
                                            <th class="text-center">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kullanicilar as $satir) { ?>
                                            <tr>
                                                <td><?php echo $satir['id'] ?></td>
                                                <td><?php echo $satir['Ad'] ?></td>
                                                <td><?php echo $satir['Soyad'] ?></td>
                                                <td><?php echo $satir['Eposta'] ?></td>
                                                <td class="text-center"><span
                                                            class=" <?php echo $satir['Aktif'] == 0 ? 'fa fa-times-circle' : 'fa fa-check-circle'; ?>"></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="kullanici.php?islem=duzenle&id=<?php echo $satir['id'] ?>">
                                                        <span class="fa fa-edit"></span></a> |
                                                    <a href="kullanici.php?islem=sil&id=<?php echo $satir['id'] ?>">
                                                        <span class="fa fa-remove"></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                        <tfoot class="thead-dark">
                                        <tr>
                                            <th>İd</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>E-Posta</th>
                                            <th class="text-center">Aktif Mi</th>
                                            <th class="text-center">İşlemler</th>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <?php
                                } else
                                    echo "Gösterilecek kayıt bulunamadı";
                                ?>

                            </div>
                        </div>
                    </div>
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
