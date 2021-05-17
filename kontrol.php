<?php
session_start();
require("templates/vt.php");
if (isset($_POST['eposta']) && isset($_POST['parola'])) {
    $eposta = $_POST['eposta'];
    $parola = $_POST['parola'];
    $benihatirla = isset($_POST['benihatirla']) ? true : false;

    $sonuc = $vt->query("Select * from Kullanici where eposta='" . $eposta . "'");
    if ($sonuc->rowCount()) {
        $kayit = $sonuc->fetch(PDO::FETCH_ASSOC);
        if (password_verify($parola, $kayit['Parola'])) {
            $_SESSION["oturum"] = $kayit['id'];
            $sifreli = urlencode(base64_encode($_SESSION["oturum"]));
            if ($benihatirla)
                setcookie('oturum', $sifreli, time() + 60 * 60 * 24);

            $url = isset($_SESSION['url']) ? $_SESSION['url'] : 'index.php';
            unset($_SESSION['url']);
            header("Location:" . $url);
        } else {
            $_SESSION['hata'] = "Parola Yanlış";
            header("Location:giris.php");
        }
    } else {
        $_SESSION['hata'] = "Böyle bir kullanıcı sistemde mevcut değil.";
        header("Location:giris.php");
    }
}
if (isset($_GET['cikis'])) {
    unset($_SESSION["oturum"]);
    //session_destroy();
    setcookie('oturum', '', time() - 3600);
    header("Location:giris.php");
}