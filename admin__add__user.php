<?php
require_once("db.php");
session_start();
$data_id=$_SESSION['user']['user_id'];

$name = $_POST["name"];
$pass = $_POST["pass"];
$login = $_POST["login"];
$role = $_POST["role"];
$shift = $_POST["shift"];

if ($role == "официант") {
    $role = 1;
} else {
    $role = 3;
}

try{
    $sql= $pdo->prepare("INSERT INTO user (name, pass, login, role, user_id, id_shift) VALUES (?,?,?,?, NULL, ?)");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $pass);
    $sql->bindParam(3, $login);
    $sql->bindParam(4, $role);
    $sql->bindParam(5, $shift);
    $sql_exe = $sql->execute();

    $_SESSION['message'] = "Заявление создано";
    header ("Location: ./ad_user.php");
}  catch (PDOException $e) {
    echo $e->getMessage();
}


?>