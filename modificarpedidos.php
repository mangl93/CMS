

    <!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
          font-family: 'Staatliches', serif;
          font-size: 20px;
          background-color: grey;
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
    
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("includes/header.html");
    ?>
    
    </div>

    <div class="background">
    <div class="row justify-content-around" id="tercero">
        
    <?php  //CREATING THE CONNECTION

        session_start();
             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["Con"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
            $query="select * from Pedidos where CodPed=".$_GET['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                
                $cp=$obj->CodPed;
                $ca=$obj->CodArt;
                $cant=$obj->cantidad;
                $pass=$obj->pass;
                }
            }

        ?>
        
        <form method="post">
        
        <fieldset>
            <legend>ACTUALIZAR PEDIDO NÚMERO <?php echo $cp ?> : </legend>
           
            Cantidad : <input type="text" name="Con" value="<?php echo $cant ?>" required><br>
            <br>
            <p><input type="submit" value="Enviar"></p>
          </fieldset>
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 
      $COD=$_SESSION['cod'];
      $cant1=$_POST['Con'];
      $cp1=$_POST['cp'];
      $ca1=$_POST['ca'];
      $ped=$_GET['cod'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("uft8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


      $query="UPDATE Pedidos set cantidad='$cant1' where CodPed='$ped';"; 
        
        if ($result = $connection->query($query)) {
            echo "<div>";
            echo "<h3>ACTUALIZACIÓN DE PEDIDO: </h3>";
            echo "Codigo de Usuario : ".$COD."<br>";
            echo "CANTIDAD : ".$cant1."<br>";
            echo "CODIGO PEDIDO : ".$cp1."<br>";
            echo "CODIGO ARTICULO : ".$ca1."<br><br>";
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='pedidos.php'>VOLVER A MIS PEDIDOS</a>
          </button>";
            echo "</div>";
            
            
        }
       
       
       ?>

      <?php endif ?>



    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>