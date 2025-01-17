<?php

try {
    //veritabanına bağlanmak
    $db = new PDO("mysql:host=localhost;dbname=ziyaretci;charset=utf8", "root","");
    //echo "Bağlanıldı.";

} catch (PDOException $e) {
    echo $e->getMessage();
    //echo "Bağlanılamadı.";
}
?>
