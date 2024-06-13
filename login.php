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
        <!-- <img src="./img/logo.svg" alt="" class="lodo-img"> -->
    </header>
    <main>
        <article>
            <h1>Личный кабинет</h1>
            <div class="wrapper">
                <h2>Вход</h2>
                <form action="autorization.php" method="POST">

                <!-- Message -->
                <?php
                if(isset($_SESSION['message'])) {
                    echo ' <label for="name"> ' . $_SESSION['message'] . ' </label>';
                }
                unset($_SESSION['message']);
                ?>
                  <!-- Message -->

                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login" required>

                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Вход</button>
                    <a href="index.php">Нет аккаунта? Зарегистрироваться</a>
                </form>
            </div>
        </article>
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
</body>
</html>