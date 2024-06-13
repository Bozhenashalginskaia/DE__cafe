<?php
session_start();
require_once("db.php");
$user_id = $_SESSION['user']['user_id'];
$name = $_SESSION['user']['login'];
$shift = $_SESSION['user']['id_shift'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/media.css">
</head>
<body>
    <header>
        <img src="./img/logo.svg" alt="" class="lodo-img">
    </header>
    <main>
        <article>
            <h1>Панель повара</h1>
                <h2>Смена №<?=$shift?></h2>
            <div class="wrapper">
                <h3>Заказы</h3>
               <?php
                require_once('db.php');
                $sql=$pdo->prepare("SELECT * FROM orders where id_shift = '$shift'");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $id_table = $row['id_table'];
                    $dishes = $row['dishes'];
                    $drinks = $row['drinks'];
                    $status_pay = $row['status_pay'];
                    $status_ready = $row['status_ready'];
                    $company = $row['company']
                ?>
                
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
                        <th>Статус готовности</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM orders where id_shift = '$shift'");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $id_orders = $row["id_orders"];
                    $id_table = $row['id_table'];
                    $dishes = $row['dishes'];
                    $drinks = $row['drinks'];
                    $status_pay = $row['status_pay'];
                    $status_ready = $row['status_ready'];
                    $company = $row['company']
                
                ?>
                
                    <tr>
                        <td><?=$id_table?></td>
                        <td><?=$company?></td>
                        <td><?=$dishes?></td>
                        <td><?=$drinks?></td>
                        <td><?=$status_pay?>/<?=$status_ready?></td>
                        <td> <form action="status__cook.php" method='POST'>
            <input type="hidden" name="status" value="<?=$id_orders?>">
            <input class="btn-input" type="submit" name="id" value="Готов">
          </form></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
               </table>
               <a href="exit.php">Выход</a>
            </div>
        </article>
        
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
</body>
</html>