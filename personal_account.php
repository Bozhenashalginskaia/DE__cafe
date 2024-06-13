<?php
session_start();
require_once("db.php");
$user_id = $_SESSION['user']['user_id'];
$name = $_SESSION['user']['login'];
$role = $_SESSION['user']['role'];
echo $role;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
</head>
<body>
    <header>
        <img src="./img/logo.svg" alt="" class="lodo-img">
    </header>
    <main>
        <article>
            <h1>Панель официанта</h1>
                <h2><?= $name ?></h2>
            <div class="wrapper">
                <h3>Заказы</h3>
                <?php
                require_once('db.php');
                $sql=$pdo->prepare("SELECT * FROM form where data_id = '$user_id'");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $num_auto = $row['num_auto'];
                    $description = $row['description'];
                    $status = $row['status'];
                ?>
                <h2>Смена №1</h2>
                <?php
            }
                ?>
                <table>
                <thead>
                    <tr>
                        <th>№Столика </th>
                        <th>Кол-во клиентов</th>
                        <th>Блюда</th>
                        <th>Напитки</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM form where data_id = '$user_id'");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $num_auto = $row['num_auto'];
                    $description = $row['description'];
                    $status = $row['status'];
                
                ?>
                
                    <tr>
                        <td><?=$num_auto?></td>
                        <td><?=$description?></td>
                        <td><?=$status?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
               </table>
               <button class="btn"><a href="statement.php">Создать заказ</a></button>
               <a href="exit.php">Выход</a>
            </div>
        </article>
        
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
</body>
</html>