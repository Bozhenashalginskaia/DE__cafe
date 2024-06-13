<?php
session_start();
require_once('db.php');


if(isset($_POST['status'])) {
    $id = $_POST['status'];
    $status= $pdo->prepare("UPDATE user SET status = 'Уволен' where user_id='$id'");
    $status->execute();
    header('Location: ad_user.php');
}

?>