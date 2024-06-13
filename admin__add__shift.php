<?php
require_once("db.php");
session_start();
$data_id=$_SESSION['user']['user_id'];

$name = $_POST["name"];



try{
    $sql= $pdo->prepare("INSERT INTO shift (id_shift) VALUES (NULL)");
    
    $sql_exe = $sql->execute();

    $_SESSION['message'] = "Заявление создано";
    header ("Location: ./ad_user.php");
}  catch (PDOException $e) {
    echo $e->getMessage();
}


?>