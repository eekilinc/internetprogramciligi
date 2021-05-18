<?php
require("templates/oturumkontrol.php");
require("templates/vt.php");


if (isset($_POST['sitebaslik'])) {
    $sitebaslik = $_POST['sitebaslik'];
    $sitedil = $_POST['sitedil'];
    $siteanahtarkelime = $_POST['anahtarkelime'];
    $sitekarakterset = $_POST['karakterset'];
    $siteyapimcisi = $_POST['siteyapimcisi'];

    $sorgu = "Update ayarlar set Sitebaslik= :sitebaslik, SiteAnahtarKelime= :anahtarkelime, SiteDil= :sitedil, SiteYapimcisi= :siteyapimcisi, 
                   SitekarakterSet= :sitekarakterset where id=1";
    $sonuc = $vt->prepare($sorgu);
    $sonuc->bindParam(":sitebaslik", $sitebaslik);
    $sonuc->bindParam(":sitedil", $sitedil);
    $sonuc->bindParam(":anahtarkelime", $siteanahtarkelime);
    $sonuc->bindParam(":siteyapimcisi", $siteyapimcisi);
    $sonuc->bindParam(":sitekarakterset", $sitekarakterset);
    $sonuc->execute();
    $_SESSION["durum"] = "Başarı ile kayıt edildi";
}

$sonuc = $vt->query("Select * from ayarlar where id=1");
$ayar = $sonuc->fetch(PDO::FETCH_ASSOC);
$vt = null;
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
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Ayarlar</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h5 class="text-primary m-0 font-weight-bold">Ayarlar</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="ayarlar.php">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="sitebaslik"><strong>Site Başlık</strong></label>
                                            <input class="form-control" type="text" id="" sitebaslik" name="sitebaslik"
                                            placeholder="Sitenin Başlığı"
                                            value="<?php echo $ayar["SiteBaslik"]; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="form-group"><label for="sitedil"><strong>Sitenin Dili :
                                                </strong></label><input class="form-control"
                                                                        type="text" id="sitedil"
                                                                        placeholder="Sitenin Gösterim Dili"
                                                                        name="sitedil"
                                                                        value="<?php echo $ayar["SiteDil"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group"><label for="anahtarkelime"><strong>Anahtar Kelimeler :
                                                </strong></label><input class="form-control" type="text"
                                                                        id="anahtarkelime"
                                                                        placeholder="Sitenin Anahtar Kelimeleri"
                                                                        name="anahtarkelime"
                                                                        value="<?php echo $ayar["SiteAnahtarKelime"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group"><label for="karakterset"><strong>Karakter Set :
                                                </strong></label><input class="form-control" type="text"
                                                                        id="karakterset"
                                                                        placeholder="Sitenin Karakter Seti"
                                                                        name="karakterset"
                                                                        value="<?php echo $ayar["SitekarakterSet"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group"><label
                                                    for="siteyapimcisi"><strong>Site Yapımcısı :</strong></label><input
                                                    class="form-control" type="text"
                                                    id="siteyapimcisi" placeholder="Sistenin Tasarlayıcısı"
                                                    name="siteyapimcisi" value="<?php echo $ayar["SiteYapimcisi"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm" type="submit">Kaydet</button>
                                        </div>
                                    </div>
                                </form>
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
