<!doctype html>
<html lang="en">

<head>
  
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>


<body>
<style>
        body {
          font-family: 'Staatliches', serif;
          font-size: 20px;
        color: white;
        }
        
      </style>


<?php if (!isset($_POST["img"])) : ?>
                    <form method="post">
                    <button type="submit" name="img" value="1"  style="cursor:pointer">
                        <h4>RAQUETA DE TENIS</h4>  
                        <br>   
                        <img src="fotos/raqueta.jpg" width="135">
                        </button>
                        <input type="text" name="codusu" placeholder="CODUSU" required><br>
                        <input type="number" name="CANTIDAD" placeholder="cantidad" required><br>
                        
                        
                    </form>

                  <!-- DATA IN $_POST['mail']. Coming from a form submit -->
                  <?php else: ?>

                    <?php

            
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("uft8");



                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                
                      
                        $query="INSERT INTO Pedidos(CodUsu,CodArt,cantidad) VALUES ('".$_POST['codusu']."','".$_POST['img']."'
                        ,'".$_POST['cantidad']."');";
            
                        
                        
                        if ($result = $connection->query($query)) {
                            echo "SE HA HECHO EL PEDIDO";
                            echo $query;
                        } else {
                            echo "ERROR";
                            echo $_POST['cantidad'];
                        }
                            
                     
                        
                        
                    ?>

                  <?php endif ?>


                  </body>

</html>
