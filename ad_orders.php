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
          <h3>Заказы</h3>
          <table class="table-admin">
            <thead>
              <tr>
              
              <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM shift order by id_shift");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $id_shift = $row['id_shift'];
                    
                    
                   
                      
                
                ?>
                        <th>Смена<?=$id_shift?></th>
               
                <!-- <th>Смена</th>
                <th>Заказы</th> -->
              </tr>
            </thead>
            <tbody>
          
            <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM orders join user on orders.user_id = user.user_id");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $id_orders = $row['id_orders'];
                    $dishes = $row['dishes'];
                    $drinks = $row['drinks'];
                    $name = $row['name'];
                    $company = $row['company'];


                    
                ?>
              <tr>
                <td>Блюда: <?=$dishes?></td>
                <td>Напитки: <?=$drinks?></td>
                <td>Кол-во людей: <?=$company?></td>
                <td>Официант: <?=$name?></td>
              </tr>
              <?php
                }
              }
              
                ?>
            </tbody>
          </table>
          <a href="exit.php">Выход</a>
        </div>
      </article>
    </main>
  </body>
</html>