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
      <!-- <img src="./img/logo.svg" alt="" class="lodo-img" /> -->
    </header>
    <main>
      <article>
        <h1>Личный кабинет</h1>
        <h2>Администратор</h2>
        <div class="wrapper">
          <h3></h3>
          <table class="tb-user">
            <thead>
              <tr>
                <th>Сотрудники</th>
                <th>Статус</th>
              </tr>
            </thead>
            <tbody>
            <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM user");
                $sql->execute();

                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                  $_SESSION["info"] = [
                    "name" => $row["name"],
                    "status" => $row["status"],
                    "user_id" => $row["user_id"]
                  ];
                $user = $_SESSION['info']['name'];
                $status = $_SESSION['info']['status'];
                $user_id = $_SESSION['info']['user_id'];
                ?>

                
         
              <tr>
                <td><?=$user?></td>
                <td><?=$status?>
                <form action="status__users.php" method='POST'>
            <input type="hidden" name="status" value="<?=$user_id?>">
            <input type="submit" name="id" value="Уволить">
                </form>
        
            </td>
              </tr>
              <?php
                }
            
            ?>
            </tbody>
          </table>
          <a href="exit.php">Выход</a>
          <button class="btn"><a href="add_user.php">Добавить сотрудника</a></button>
        </div>
      </article>
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
  </body>
</html>