<?php
session_start();
if (isset($_POST['eposta']) && isset($_POST['parola'])) {
    $eposta = $_POST['eposta'];
    $parola = $_POST['parola'];

    if ($eposta == 'a@mail.com' && $parola == '12345') {
        $_SESSION["oturum"] = "Ekrem Eşref KILINÇ";
        header("Location:index.php");
    } else
        header("Location:giris.php");

}