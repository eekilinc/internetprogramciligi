<?php

try {
    $vt = new PDO("mysql:host=localhost;dbname=okul;charset=utf8", "root", "");

} catch (PDOException $ex) {
    /* if ($hata->getCode() == 2002)
         echo "servera bağlanamadı";*/
    echo $ex->getMessage();
}

$sorgu = $vt->query('select * from kullanici');

$sonuc = $sorgu->fetchAll(PDO::FETCH_ASSOC);
/*foreach ($sonuc as $satir) {
    echo $satir["id"] . $satir["Ad"] . $satir["Soyad"] . "<br>";
}*/

/*$satirsayisi = $sorgu->rowCount();
for ($i = 0; $i < $satirsayisi; $i++)
    echo $sonuc[$i]["id"] . $sonuc[$i]["Ad"] . $sonuc[$i]["Soyad"] . "<br>";
*/
if ($sorgu->rowCount() > 0) {
    echo '<table border="1">';
    foreach ($sonuc as $item) {
        echo "<tr>";
        foreach ($item as $veri)
            echo "<td>" . $veri . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
$vt = null;

