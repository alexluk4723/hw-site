
<?php
if($_GET["key"]!="lol"){
    exit;
}
$dbh = new PDO('mysql:host=85.193.80.157; port=3306; dbname=default_db', 'gen_user', 'Qazwsx23e47');
$arr = array();
foreach($dbh->query("SELECT * FROM `homeworks` INNER JOIN `users_hw` ON 
`homeworks`.`id_user`=`users_hw`.`id`") as $row){
echo '
<div>
    Имя: '. $row["name"] .'<br>
    ID дз: '. $row["id_hw"] .'<br>
    Файл: <a href="'. $row["file"] .'">Ссылка</a>
</div><br>';
echo '------------------------------------------------<br>';
}