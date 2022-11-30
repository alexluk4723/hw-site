<?php 
 session_start();
 $id = $_POST["login"];
 $pass = $_POST["password"];
 $dbh = new PDO('mysql:host=85.193.80.157; port=3306; dbname=default_db', 'gen_user', 'Qazwsx23e47');
 $arr = array("result" => false, "name" => "");
 foreach ($dbh->query("SELECT * FROM `users_hw` WHERE `id`=$id AND `password`=\"$pass\"") as $row){
    $arr["result"]=true;
    $arr["name"]=$row["name"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    header("Location: http://дз.site/add_hw.php");
    exit;
 }
 header("Location: http://дз.site/");
/// echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>
