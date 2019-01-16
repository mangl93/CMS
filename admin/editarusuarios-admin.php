

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




      <?php if (!isset($_POST["Nom"])) : ?>
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
            <legend>ACTUALIZAR USUARIO : </legend>
            <input type="hidden" name="Cod" value="<?php echo $CodUsu?>" ><br>
            Nombre : <input type="text" name="Nom" value="<?php echo $Nombre?>"required><br>
            Apellidos : <input type="text" name="Ape" value="<?php echo $Apellidos?>" required><br>
            Direccion : <input type="text" name="Dir" value="<?php echo $Direccion?>" required><br>
            Contraseña : <input type="text" name="Con" value="<?php echo $pass?>" required><br>
            <br>
            <p><input type="submit" value="Enviar"></p>
          </fieldset>
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 
      $COD=$_SESSION['cod'];
      $nombre1=$_POST['Nom'];
      $Apellidos1=$_POST['Ape'];
      $Direccion1=$_POST['Dir'];
      $Contraseña1=$_POST['Con'];
      
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("uft8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


      $query="UPDATE Usuarios set Nombre='$nombre1', Apellidos='$Apellidos1'
      , Direccion='$Direccion1',pass='$Contraseña1' where CodUsu='$COD';"; 
        
        if ($result = $connection->query($query)) {
            echo "<div>";
            echo "<h3>ACTUALIZACIÓN DE USUARIO: </h3>";
            echo "Codigo de Usuario : ".$COD."<br>";
            echo "Nuevo nombre de usuario : ".$nombre1."<br>";
            echo "Nuevos apellidos del usuario : ".$Apellidos1."<br>";
            echo "Nueva dirección del usuario : ".$Direccion1."<br><br>";
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='principal.php'>VOLVER A MI INFORMARCION</a>
          </button>"; 
            echo "</div>";
            
            
             
            
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
