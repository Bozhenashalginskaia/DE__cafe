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
        <h3>Смены</h3>
        
        <div class="wrapper">
        <table class="table-shift">
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
                        
                        <th>Сотрудники</th>
                        
                       
                    </tr>
                </thead>
                <tbody>
                
                
                    <tr>
                    <?php
                require_once('db.php');

                $sql=$pdo->prepare("SELECT * FROM shift join user on shift.id_shift = user.id_shift");
                $sql->execute();
                $data=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($data as $row){
                    $id_shift = $row['id_shift'];
                    $name = $row['name'];
                    
                    
                   
                      
                
                ?>
                        <td></td>
                        <td><?=$name?></td>
                          
                    </tr>
                    <?php
                }
              }
              
                ?>
                </tbody>
               </table>
            
          <a href="exit.php">Выход</a>
          <button class="btn"><a style="color:white" href="add__shift.php">Создать новую смену</a></button>
        </div>
      </article>
    </main>
    <!-- <footer></footer> -->
    <script src="./js/main.js"></script>
  </body>
</html>