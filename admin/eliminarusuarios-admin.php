

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
            $connection->set_charset("uft8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["cod"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
            $query="select * from Usuarios where CodUsu=".$_GET['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                
                $CodUsu=$obj->CodUsu;
                $Nombre=$obj->Nombre;
                $Apellidos=$obj->Apellidos;
                $Direccion=$obj->Direccion;
                $pass=$obj->pass;
                }
            }

        ?>
        
        <form method="post">
        
        <fieldset>
            <legend>USUARIO CÓDIGO <?php echo $CodUsu ?> : </legend>
           
            ¿ESTÁ SEGURO QUE QUIERE ELIMINAR EL USUARIO <?php echo $CodUsu ?>? : 
            <input type="hidden" name="cod" value="<?php echo $CodUsu ?>">
            <select name="sel">
                <option>si</option>
                <option>no</option>
            </select>
            <br>
            <center><p><input type="submit" value="Enviar"></p></center>
          </fieldset>
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 

      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("uft8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      if ($_POST['sel']=='si') {
        
        $query="Delete from Usuarios where CodUsu='".$_POST['cod']."';";
        echo $query;
        if ($result = $connection->query($query)) {
        
        echo "USUARIO ELIMINADO";
        echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='usuarios-admin.php'>VOLVER A USUARIOS</a>
          </button>";    

        }
      
        } else {
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='usuarios-admin.php'>VOLVER A USUARIOS</a>
          </button>";  
        }
       
       ?>

      <?php endif ?>
      </div>
      </div>
    
      <?php
      include("footer-admin.html");
      ?>
     

    </body>

</html>