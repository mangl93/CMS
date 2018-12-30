

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
    <div class="col-3">
      <div class="img-fluid " alt="Responsive image"><img src="iconos/logo.png" width="50px"></div>
    </div>
    <div class="col-6  " >
      <table>
        <button type="button"  class="btn btn-warning dropdown-toggle lista btn-lg " data-toggle="dropdown">Usuarios</button>
        <div class="dropdown-menu">
          <a href='principal.php'class='dropdown-item'>Página principal</a>
          <a href='Usuarios.php'class='dropdown-item'>Editar usuarios</a>
          <a href="buscaUsuarios.php" class="dropdown-item">Buscar usuarios</a>
          <a href="cerrarsesion.php" class="dropdown-item">Cerrar sesión</a>
        </div>
        <button type="button" class="btn btn-secondary lista btn-lg">
          <a href='articulos.php'>Articulos</a>
        </button>
        <button type="button" class="btn btn-secondary lista btn-lg">
          <a href='hacerreserva.php'>Reservas</a>
        </button>
        <button type="button" class="btn btn-secondary lista btn-lg">Contacto</button>
      </table>
    </div>
    <div  class="col-2">
      <div id="redes">
        SIGUENOS EN
        <a href="#"><img src="iconos/icono1.png" width="30px"></a>
        <a href="#"><img src="iconos/icono2.png" width="30px"></a>
        <a href="#"><img src="iconos/icono3.png" width="30px"></a>
        </div>
      </div>
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




      <?php if (!isset($_POST["Nom"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
            $query="select * from Usuarios where CodUsu=".$_SESSION['cod'];
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
            <input type="hidden" name="Cod" value="<?php echo $_SESSION['cod']?>" ><br>
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
            echo "Nueva dirección del usuario : ".$Direccion1."<br>";
            echo "</div>";
            
        }
       
       
       ?>

      <?php endif ?>



    </div>
    </div>
      <div class="row justify-content-around" id="quinto">
        <div class="col-md-2 "><img src="iconos/logo2.png" width="100px" height="100px"></div>
        <div class="col-md-6 text-align-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est libero eius, minus beatae iste minima asperiores eaque illo a similique unde maxime earum molestias. Dolorem a commodi veritatis sequi est?</div>
        <div class="col-md-2 "><img src="iconos/logo2.png" width="100px" height="100px"></div>


      </div>
      <div class="row justify-content-around" id="sexto">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary">Usuarios</button>
              <button type="button" class="btn btn-secondary">Deportes</button>
              <button type="button" class="btn btn-secondary">Materiales</button>
              <button type="button" class="btn btn-secondary">Reservas</button>
              <button type="button" class="btn btn-secondary">Contacto</button>
            </div>
            <div>Copyright@ 2010 MANUELGARCIA. All rights reserved.
            </div>
      </div>
    </div>
      <div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
