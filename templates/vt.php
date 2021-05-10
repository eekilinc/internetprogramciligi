<?php
try {
    $vt = new PDO("mysql:host=localhost;dbname=okul;charset=utf8", "root", "");
} catch (PDOException $ex) {
    echo "Bir hata oluştu = ". $ex->getMessage();
}
