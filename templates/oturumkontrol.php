<?php
session_start();
if (empty($_SESSION['oturum'])) {
    if (isset($_COOKIE['oturum'])) {
        $cozulmus = base64_decode(urldecode($_COOKIE['oturum']));
        $_SESSION['oturum'] = $cozulmus;
    } else {
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        header("Location:giris.php");
    }
} ?>
