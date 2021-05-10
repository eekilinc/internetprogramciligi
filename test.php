<?php

try {
    $vt = new PDO("mysql:host=localhost;dbname=okul;charset=utf8", "root", "");

} catch (PDOException $ex) {
    /* if ($hata->getCode() == 2002)
         echo "servera bağlanamadı";*/
    echo $ex->getMessage();
}

$ad = "ekrem";
$soyad = "kilinc";
$kad = "ekrem";
$parola = "123";
// 1 .yöntem
/*$sonuc = $vt->exec("Insert Into Kullanici(Ad,Soyad,Kad,Parola) Values('{$ad}','{$soyad}','{$kad}','{$parola}')");
if ($sonuc > 0)
    echo "Kaydetme işlemi Başarılı";
*/

//2.yöntem
/*$sonuc = $vt->prepare("Insert Into Kullanici(Ad,Soyad,Kad,Parola) Values(?,?,?,?)");
// isimsiz parametre
$sonuc->bindParam(1, $ad);
$sonuc->bindParam(2, $soyad);
$sonuc->bindParam(3, $kad);
$sonuc->bindParam(4, $parola);
$donen=$sonuc->execute();
if ($donen>0)
    echo "Kayıt ekleme işlemi başarılı";*/

/*
$sonuc = $vt->prepare("Insert Into Kullanici(Ad,Soyad,Kad,Parola) Values(:ad,:soyad,:kad,:parola)");
// isimli parametre
$sonuc->bindParam(':ad', $ad);
$sonuc->bindParam(':soyad', $soyad);
$sonuc->bindParam(':kad', $kad);
$sonuc->bindParam(':parola', $parola);
$donen = $sonuc->execute();
if ($donen > 0)
    echo "Kayıt ekleme işlemi başarılı";*/


$vt->beginTransaction();
/*
try {
    $data = array('ad' => "ekrem", 'soyad' => "kilinc", 'kad' => "ekrem", 'parola' => 'asd');
    $sonuc = $vt->prepare("Insert Into Kullanici(Ad,Soyad,Kad,Parola) Values(:ad,:soyad,:kad,:parola)");
// dizi ile parametre
    $donen = $sonuc->execute($data);
    if ($donen > 0)
        echo "Kayıt ekleme işlemi başarılı";
    $vt->commit();
} catch (Exception $exception) {
    $vt->rollBack();
}


$vt = null;
*/
