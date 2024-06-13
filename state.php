<?php
require_once("db.php");
session_start();
$data_id=$_SESSION['user']['user_id'];
$shift = $_SESSION['user']['id_shift'];

$table = $_POST["table"];
$dishes = $_POST["dishes"];
$drinks = $_POST["drinks"];
$company = $_POST["company"];
$status = "принят";

try{
    $sql= $pdo->prepare("INSERT INTO orders (id_orders, id_table, dishes, drinks, status, id_shift, company, user_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bindParam(1, $table);
    $sql->bindParam(2, $dishes);
    $sql->bindParam(3, $drinks);
    $sql->bindParam(4, $status);
    $sql->bindParam(5, $shift, PDO::PARAM_INT);
    $sql->bindParam(6, $company, PDO::PARAM_INT);
    $sql->bindParam(7, $data_id, PDO::PARAM_INT);
    $sql_exe = $sql->execute();

    $_SESSION['message'] = "Заявление создано";
    header ("Location: ./order.php");
}  catch (PDOException $e) {
    echo $e->getMessage();
}


?>