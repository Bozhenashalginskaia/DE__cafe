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
        <h1>Администратор</h1>
        <div class="wrapper">
          <h2>Добавить сотрудника</h2>
          <form action="admin__add__user.php" method="POST">

          <?php
                if(isset($_SESSION['message'])) {
                    echo ' <label for="name" class="message-active"> ' . $_SESSION['message'] . ' </label>';
                }
                unset($_SESSION['message']);
                         ?>

            <label for="name">ФИО</label>
            <input type="text" name="name" required />

            <label for="pass">Пароль</label>
            <input type="password" name="pass" required />

            <label for="login">Логин</label>
            <input type="text" name="login" placeholder="указать уникальный логин" required />

            <label for="role">Роль</label>
            <input type="text" name="role" placeholder="с маленькой буквы" required />

            <label for="shift">Смена</label>
            <input type=number" name="shift" placeholder="цифра" required />


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