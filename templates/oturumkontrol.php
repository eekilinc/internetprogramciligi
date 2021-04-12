<?php
session_start();
if (empty($_SESSION['oturum'])) {
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    header("Location:giris.php");
} ?>
