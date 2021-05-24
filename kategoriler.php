<?php
require("templates/oturumkontrol.php");
require("templates/vt.php");

$sorgu = $vt->query("select * from kategoriler order by id desc");
$kategoriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
$kayitsayisi = $sorgu->rowCount();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include("templates/header.php") ?>
    <script>

        function TumunuSec(btn) {
            var table = document.getElementsByClassName("dataTable");
            if (btn.checked)
                selectCheckBoxes(true, "dataTable");
            else
                selectCheckBoxes(false, "dataTable");
        }

        function selectCheckBoxes(bChecked, parentsId) {
            var oParent = document.getElementById(parentsId);
            var aElements = oParent.getElementsByTagName('input');
            for (var i = 0; i < aElements.length; i++) {
                if (aElements[i].type == 'checkbox') {
                    aElements[i].checked = bChecked;
                }
            }
        }
    </script>
</head>
<body id="page-top">
<div id="wrapper">
    <?php include("templates/leftnavbar.php") ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <?php include("templates/topnavbar.php") ?>
        <div id="content">
            <?php
            if (isset($_SESSION['durum'])) {
                ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php
                    echo $_SESSION['durum'];
                    unset($_SESSION['durum']);
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="container-fluid">
                <div class="container-fluid col-11 col-lg-11 col-sm-auto">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h5 class="text-primary m-0 font-weight-bold">Kategoriler</h5>
                            <a class="badge badge-info" href="kategori.php?islem=ekle">Yeni Kategori Ekle</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-auto" id="dataTable" role="grid"
                                 aria-describedby="dataTable_info">
                                <?php if ($kayitsayisi > 0) {
                                    ?>
                                    <table class="table table-bordered table-striped table-hover align-middle"
                                           id="kategoriTable">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th><input class="form-control" type="checkbox" style="width: 70%"
                                                       id="secimbutun" onchange="TumunuSec(this);"></th>
                                            <th scope="col">İd</th>
                                            <th scope="col">Ad</th>
                                            <th scope="col">Açıklama</th>
                                            <th scope="col" class="text-center">Aktif Mi</th>
                                            <th class="text-center">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kategoriler as $satir) { ?>
                                            <tr>
                                                <td><input deger="<?php echo $satir["id"]; ?>" class="form-control"
                                                           type="checkbox" style="width: 70%"></td>
                                                <td><?php echo $satir['id'] ?></td>
                                                <td><?php echo $satir['ad'] ?></td>
                                                <td><?php echo $satir['aciklama'] ?></td>
                                                <td class="text-center"><span
                                                            class="fa-2x <?php echo $satir['aktif'] == 0 ? 'fa fa-minus-square' : 'fa fa-check-square'; ?>"></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="kategori.php?islem=duzenle&id=<?php echo $satir['id'] ?>">
                                                        <span class="fa fa-pen-square fa-2x"></span></a>
                                                    <a href="kategori.php?islem=sil&id=<?php echo $satir['id'] ?>">
                                                        <span class="fa fa-trash-o fa-2x"></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                        <tfoot class="thead-dark">
                                        <tr>
                                            <th><input class="form-control" type="checkbox" style="width: 70%"></th>
                                            <th scope="col">İd</th>
                                            <th scope="col">Ad</th>
                                            <th scope="col">Açıklama</th>
                                            <th scope="col" class="text-center">Aktif Mi</th>
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
