<?php
include "baglanti.php";
    $sorgu = $db->prepare("select * from ziyaretciler");
    $sorgu->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ziyaretçiler</title>
        <link rel="stylesheet" href="css/styles.css">

    </head>
    <body>

        <h1>Ziyaretçi Ekle</h1>
        <form method="POST" action="#">
            AD:<input type="text" name="name"><br>
            SOYAD:<input type="text" name="soyad"><br>
            YAŞ:<input type="text" name="yas"><br>
            <input type="submit" name="ekle" value="Ekle">
        </form>
    <?php
        if (isset($_POST["ekle"])) {
            $ekle = $db->prepare("insert into ziyaretciler set
                ad=:ad,
                soyad=:soyad,
                yas=:yas
                ");
            $kontrol = $ekle->execute(array(
                "ad" => $_POST["name"],
                "soyad" => $_POST["soyad"],
                "yas" => $_POST["yas"],
            ));

            if ($kontrol) {
                header("Location:index.php");
                exit;
            }
            else{
                echo "hata";
            }
        
        }
    ?>

        <h1>Ziyaretçiler Listesi</h1>
        <table>
            <tr>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Yaş</th>
            </tr>
            <?php
                while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$satir["ad"]."</td>";
                    echo "<td>".$satir["soyad"]."</td>";
                    echo "<td>".$satir["yas"]."</td>";
                    echo "<tr>";
                }
            ?>
            <tr>
                <td>Berna</td>
                <td>Kalkan</td>
                <td>20</td>
            </tr>
        </table>

    </body>
</html>