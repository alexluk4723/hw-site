<html>
<head>
    <meta charset="UTF-8">
    <style>
        .dz {
            border: 1px solid red;
            margin: 10px;
            border-radius: 7px;
            padding: 5px;
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
`homeworks`.`id_user`=`users_hw`.`id` INNER JOIN `hw_description` ON `homeworks`.`id_hw`=`hw_description`.`id`") as $row) {
    ?>
<div class="dz">
    <p><b>Имя</b>: <?php echo $row["name"];  ?> </p>
    <p><b>ID дз</b>: <?php echo $row["id_hw"];  ?> </p>
    <p><b>Иия дз</b>: <?php echo $row["name"];  ?> </p>
    <p><b>Файл</b>: <a href="<?php echo $row['file']; ?>">Ссылка на скачивание</a></p>
</div>
<?php
}
?>