<?php
session_start();
if (isset($_POST['eposta']) && isset($_POST['parola'])) {
    $eposta = $_POST['eposta'];
    $parola = $_POST['parola'];
    $benihatirla = isset($_POST['benihatirla']) ? true : false;

    if ($eposta == 'a@mail.com' && $parola == '12345') {
        $_SESSION["oturum"] = "Ekrem Eşref KILINÇ";
        $sifreli=urlencode(base64_encode($_SESSION["oturum"]));
        if ($benihatirla)
            setcookie('oturum', $sifreli, time() + 60 * 60 * 24);

        $url = isset($_SESSION['url']) ? $_SESSION['url'] : 'index.php';
        unset($_SESSION['url']);
        header("Location:" . $url);
    } else {
        //yöntem 1 url olarak hatadeğişkeni yollama
        //  header("Location:giris.php?hata");

        //yöntem 2 session oluşturma
        $_SESSION['hata'] = "Kullanıcı Adı Ya da Parola Hatalı";
        header("Location:giris.php");
    }
}

if (isset($_GET['cikis'])) {
    unset($_SESSION["oturum"]);
    //session_destroy();
    setcookie('oturum', '', time() - 3600);
    header("Location:giris.php");
}