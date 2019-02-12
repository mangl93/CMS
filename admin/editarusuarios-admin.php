<!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
          
          color: black;
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
                    $nick=$obj->Nickname;
                    $mail=$obj->email;
                    
                    }
                }

            ?>
            
            <form class="form-group" method="post">

            
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nombre</label>
                  
                  <input type="text" class="form-control" name="Nom" value="<?php echo $Nombre ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Apellidos</label>
                  <input type="text" class="form-control" name="Ape" value="<?php echo $Apellidos ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Direccion</label>
                <input type="text" class="form-control" name="Dir" value="<?php echo $Direccion ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Nickname</label>
                  <input type="text" class="form-control" name="nick" value="<?php echo $nick ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Email</label>
                  <input type="text" class="form-control" name="mail" value="<?php echo $mail ?>">
                </div>
              
              </div>
              <center>
              <button type="submit" class="btn btn-primary">Editar</button>

                </center>
                </form>

              <!-- DATA IN $_POST['mail']. Coming from a form submit -->
              <?php else:  ?>
              
              <?php 
              $codigo=$_POST['Cod'];
              $nombre1=$_POST['Nom'];
              $Apellidos1=$_POST['Ape'];
              $Direccion1=$_POST['Dir'];
              $Contraseña1=$_POST['Con'];
              $nick1=$_POST['nick'];
              $mail1=$_POST['mail'];

              
              
              $connection = new mysqli("localhost", "tf", "123456", "proyecto");
              $connection->set_charset("uft8");

              //TESTING IF THE CONNECTION WAS RIGHTNombre
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }


              $query="UPDATE Usuarios set Nombre='$nombre1', Apellidos='$Apellidos1'
              , Direccion='$Direccion1', Nickname='$nick1' ,email='$mail1' 
              where CodUsu='".$_GET['cod']."';"; 

                
                if ($result = $connection->query($query)) {
                    echo "<div class='card'>";
                    echo "<div class='card-header bg-secondary '>";

                    echo "<h3>ACTUALIZACIÓN DE USUARIO ".$_GET['cod']." : </h3>";
                    echo "</div>";
                    echo "<div class='card-body' style='color:black;'>";

                    echo "Nuevo nombre : ".$nombre1."<br>";
                    echo "Nuevos apellidos : ".$Apellidos1."<br>";
                    echo "Nueva dirección : ".$Direccion1."<br>";
                    echo "Nuevo nickname : ".$nick1."<br>";
                    echo "Nuevo email : ".$mail1."<br><br>";

                    echo "<center><button type='button' class='btn btn-PRIMARY lista btn-lg'>
                    <a href='usuarios-admin.php'>VOLVER</a>
                  </button></center>"; 
                  echo "</div>";

                    echo "</div>";
                    
                    
                    
                    
                } else {
                    echo $query;
                }
              
              
              ?>

              <?php endif ?>
              </div>
              </div>
            
            

            </body>

        </html>
