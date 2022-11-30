<html>
<head>
    <meta charset="UTF-8">
    <style>
        .dz {
            border: 1px solid red;
        }
    </style>
</head>
</html>
<?php
//if ($_GET["key"] != "lol") {
//    exit;
//}
$dbh = new PDO('mysql:host=85.193.80.157; port=3306; dbname=default_db', 'gen_user', 'Qazwsx23e47');
foreach ($dbh->query("SELECT * FROM `homeworks` INNER JOIN `users_hw` ON 
`homeworks`.`id_user`=`users_hw`.`id`") as $row) {
    ?>
<div class="dz">
    Имя: <?php echo $row["name"];  ?> <br>
    ID дз: <?php echo $row["id_hw"];  ?> <br>
    Файл: <a href="<?php echo $row['file']; ?>">Ссылка на скачивание</a>
</div>
<?php
}
?>