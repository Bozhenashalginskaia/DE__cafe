<?php
require_once('db.php');
session_start();

$login = $_POST["login"];
$password = $_POST["password"];

try {
    $sql = $pdo->prepare("SELECT * FROM user WHERE `pass`=:password and `login`=:login");

    $sql->bindParam(':password', $password);
    $sql->bindParam(':login', $login);
    $sql->execute();
    $sql_execute=$sql->fetchAll(PDO::FETCH_ASSOC);
    

    if($sql_execute) {
        foreach($sql_execute as $user){
            $_SESSION['user'] = [
                "user_id" => $user['user_id'],
                "login" => $user['login'],
                "role" => $user['role'],
                "id_shift" => $user['id_shift']
            ];
            $pass = $user['pass'];
            $role = $user['role'];
            
            if($pass == $password) {
                if($role == 2){ 
                    header("Location: ./admin.php");
                 }
                    else if ($role == 3) {
                        header("Location: ./cook.php"); 
                    }
                    else if ($role == 1) {
                        header("Location: ./waiter.php"); 
                    }
                    else {
                        header ("Location:./login.php");
                        $_SESSION['message'] = "Неправильный логин или пароль";
                                exit(0);
                    }
            }
            
        }
    }

    $sql = $pdo->prepare("SELECT * FROM data_user WHERE data_id='$user_id'");
        $sql->bindParam(':name', $name);
        $sql->execute();
        $sql_executes=$sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($sql_executes as $row){
        $_SESSION['info'] = [
            "name" => $row['name']
        ];
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>