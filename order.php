<?php
session_start();
$user_id = $_SESSION['user']['user_id'];
$shift = $_SESSION['user']['id_shift'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=s, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./css/media.css" />
  </head>
  <body>
    <header>
      <img src="./img/logo.svg" alt="" class="lodo-img" />
    </header>
    <main>
      <article>
        <h1>Панель официанта</h1>
        <h2>Смена №<?=$shift?></h2>
        <div class="wrapper">
          <h2>Создать заказ</h2>
          <form action="state.php" method="POST">

          <?php
                if(isset($_SESSION['message'])) {
                    echo ' <label for="name" class="message-active"> ' . $_SESSION['message'] . ' </label>';
                }
                unset($_SESSION['message']);
                         ?>

            <label for="table">№Столика</label>
            <input type="text" name="table" required />

            <label for="dishes">Блюда</label>
            <input type="text" name="dishes" placeholder="указать через запятую" required />

            <label for="drinks">Напитки</label>
            <input type="text" name="drinks" placeholder="указать через запятую" required />

            <label for="company">Количество людей</label>
            <input type="number" name="company" required />

            <button type="submit">Отправить</button>
            <a href="waiter.php">Назад</a>
          </form>
        </div>
      </article>
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
  </body>
</html>
