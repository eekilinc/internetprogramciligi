<?php
require("templates/oturumkontrol.php");
require("templates/vt.php");

if (isset($_POST["ad"])) {
    $id = $_GET['id'];
    $ad = $_POST["ad"];
    $soyad = $_POST['soyad'];
    $aktif = isset($_POST["aktif"]) ? 1 : 0;

    $guncelle = $vt->prepare("Update kullanici set Ad=:ad,Soyad=:soyad,Aktif=:aktif where id=:id  ");
    $guncelle->bindParam(":id", $id);
    $guncelle->bindParam(":ad", $ad);
    $guncelle->bindParam(":soyad", $soyad);
    $guncelle->bindParam(":aktif", $aktif);
    $guncelle->execute();
}

if (isset($_POST["adek"])) {
    $eposta = $_POST['emailek'];
    $kontrol = $vt->query("select * from Kullanici where Eposta='" . $eposta . "'");
    if ($kontrol->rowCount() > 0) {
        $_SESSION["durum"] = "Bu eposta adresi kullanılıyor, Lütfen farklı bir eposta adresi kullanın";

    } else {
        $ad = $_POST["adek"];
        $soyad = $_POST['soyadek'];
        $parola = $_POST['parolaek'];
        $parola = password_hash($parola, PASSWORD_DEFAULT);
        $aktif = isset($_POST["aktifek"]) ? 1 : 0;
        $ekle = $vt->prepare("insert into Kullanici(Ad,Soyad,Eposta,Parola,Aktif) values(:ad,:soyad,:eposta,:parola,:aktif)");
        $ekle->bindParam(":ad", $ad);
        $ekle->bindParam(":soyad", $soyad);
        $ekle->bindParam(":eposta", $eposta);
        $ekle->bindParam(":parola", $parola);
        $ekle->bindParam(":aktif", $aktif);
        $ekle->execute();
        $_SESSION["durum"] = "Yeni bir kullanıcı eklendi";
        header("Location:kullanicilar.php");
    }


}

if (isset($_GET['islem'])) {
    $islem = $_GET['islem'];
    if ($islem == "sil") {
        if (isset($_GET["id"])) {
            try {
                $sorgu = $vt->prepare("delete from kullanici where id=?");
                $sorgu->bindParam(1, $id);
                $id = $_GET["id"];
                $donen = $sorgu->execute();
                if ($donen != 0)
                    $_SESSION["durum"] = "Kayıt Başarılı Bir şekilde Silindi";
                else $_SESSION["durum"] = "Kayıt Silenemedi.";
            } catch (Exception $ex) {
                $_SESSION["durum"] = 0;
            }
            header("Location:kullanicilar.php");
        } else
            header("Location:kullanicilar.php");
    } else if ($islem == "duzenle") {
        if (isset($_GET["id"])) {
            $durum = 1;
            $sorgu = $vt->query("Select * from Kullanici where id=" . $_GET['id']);
            $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
            if ($sorgu->rowCount() == 0)
                header("Location:kullanicilar.php");
        } else
            header("Location:kullanicilar.php");
    } else if ($islem == "ekle") {
        $durum = 2;

    } else
        header("Location:kullanicilar.php");
} else
    header("Location:kullanicilar.php");

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
                    ?>
                    <div class="row text-center">
                        <div class="col">
                            <div class="badge badge-danger">
                                <?php
                                echo $_SESSION['durum'];
                                unset($_SESSION['durum']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


                <div class="row">
                    <?php if ($durum == 1) { ?>

                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h5 class="text-primary m-0 font-weight-bold">Kullanıcı Bilgileri</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post"
                                          action="kullanici.php?islem=duzenle&id=<?php echo $sonuc["id"]; ?> ">
                                        <div class="form-row">
                                            <div class="form-group"><label
                                                        for="aktif"><strong>Aktif Mi :</strong></label><input
                                                        class="form-control" type="checkbox" id="aktif"
                                                        name="aktif"
                                                    <?php echo $sonuc["Aktif"] == 1 ? "checked" : ""; ?> ></div>
                                        </div>
                                        <div class=" form-row">
                                            <div class="form-group"><label for="email"><strong>E- posta :
                                                    </strong></label><input class="form-control"
                                                                            type="email" id="email"
                                                                            placeholder="user@example.com"
                                                                            name="email"
                                                                            value="<?php echo $sonuc["Eposta"]; ?>"
                                                                            disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label for="ad"><strong>Ad :
                                                    </strong></label><input class="form-control" type="text"
                                                                            id="ad"
                                                                            placeholder="John"
                                                                            name="ad"
                                                                            value="<?php echo $sonuc["Ad"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label
                                                        for="soyad"><strong>Soyad :</strong></label><input
                                                        class="form-control" type="text"
                                                        id="soyad" placeholder="Doe"
                                                        name="soyad" value="<?php echo $sonuc["Soyad"]; ?>">
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
                    <?php } else if ($durum == 2) { ?>
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h5 class="text-primary m-0 font-weight-bold">Kullanıcı Ekle</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post"
                                          action="kullanici.php?islem=ekle">
                                        <div class=" form-row">
                                            <div class="form-group"><label for="email"><strong>E-posta :
                                                    </strong></label><input class="form-control"
                                                                            type="email" id="email"
                                                                            placeholder="a@mail.com"
                                                                            name="emailek">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label for="ad"><strong>Ad :
                                                    </strong></label><input class="form-control" type="text"
                                                                            id="ad"
                                                                            placeholder="Ad"
                                                                            name="adek">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label
                                                        for="soyad"><strong>Soyad :</strong></label><input
                                                        class="form-control" type="text"
                                                        id="soyad" placeholder="Soyad"
                                                        name="soyadek">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label
                                                        for="parola"><strong>Parola :</strong></label><input
                                                        class="form-control" type="password"
                                                        id="parola" placeholder="Parola"
                                                        name="parolaek">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group"><label
                                                        for="aktif"><strong>Aktif Mi :</strong></label><input
                                                        class="form-control" type="checkbox" id="aktif"
                                                        name="aktifek"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" type="submit">Kaydet
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
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
