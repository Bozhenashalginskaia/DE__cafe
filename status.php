<?php
session_start();
require_once('db.php');


if(isset($_POST['status'])){
    $id = $_POST['status'];
    $status= $pdo->prepare("UPDATE orders SET status_pay = 'Оплачен' where id_orders='$id'");
    $status->execute();
    header('Location: waiter.php');
}

?>