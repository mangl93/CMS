

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
    include("header-admin.php");
    session_start();
    if ($_SESSION['tipo']!='root') {
        session_destroy();
        header ("Location: ../index.php");
    }
    
    ?>
    
    </div>
      

    <div class="background">
    <div class="row justify-content-around" id="tercero">
        
    <?php  //CREATING THE CONNECTION

       
             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["Cod"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
            $query="select * from Reservas where CodPed=".$_GET['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {

                $CodRes=$obj->CodRes;
                $CodUsu=$obj->CodUsu;
                $CodPis=$obj->CodPis;
                
                }
            }

        ?>
        
        <form method="post">
        
        <fieldset>
            <legend>RESERVA CÓDIGO <?php echo $_GET['cod'] ?> </legend>
           
            ¿ESTÁ SEGURO QUE QUIERE ELIMINAR LA RESERVA? : 
            <input type="hidden" name="Cod" value="<?php echo $_GET['cod'] ?>">
            <select name="sel">
                <option>si</option>
                <option>no</option>
            </select>
            <br>
            <p><input class="btn btn-secondary mt-3" type="submit" value="Confirmar"></p>
          </fieldset>
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 

      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      if ($_POST['sel']=='si') {
        
        $query="Delete from Reservas where CodRes='".$_POST['Cod']."';";
       
        if ($result = $connection->query($query)) {
        
      
        header("location: reservas-admin.php");

        }
      
        } else {
            header("location: reservas-admin.php");  
        }
       
       ?>

      <?php endif ?>
      </div>
      </div>
    
    

    </body>

</html>
