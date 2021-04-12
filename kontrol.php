<?php
session_start();
if (isset($_POST['eposta']) && isset($_POST['parola'])) {
    $eposta = $_POST['eposta'];
    $parola = $_POST['parola'];

    if ($eposta == 'a@mail.com' && $parola == '12345') {
        $_SESSION["oturum"] = "Ekrem Eşref KILINÇ";
        $url = $_SESSION['url'];
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
    header("Location:giris.php");
}