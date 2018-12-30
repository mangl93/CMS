<!doctype html>
<html lang="en">

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
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
    
  <div class="row justify-content-between" id="cabecera">
      <div class="col-3">
        <div class="img-fluid " alt="Responsive image"><img src="iconos/logo3.png" width="50px"></div>
      </div>
      <div class="col-6  " >
        <table>
          <button type="button"  class="btn btn-warning dropdown-toggle lista btn-lg " data-toggle="dropdown">Usuarios</button>
          <div class="dropdown-menu">
            <a href="Usuarios.php" class="dropdown-item">Editar usuarios</a>
            <a href="buscaUsuarios.php" class="dropdown-item">Buscar usuarios</a>
            <a href="login.html" class="dropdown-item">Cerrar sesión</a>
          </div>
          <button type="button" class="btn btn-secondary lista btn-lg">
          <a href="articulos.php">Articulos</a>
          </button>
          <button type="button" class="btn btn-secondary lista btn-lg">
            <a href="hacerreserva.php">Reservas</a>
          </button>
          <button type="button" class="btn btn-secondary lista btn-lg">Contacto</button>
        </table>
      </div>
      <div class="col-2">
        <a href="#"><img src="iconos/icono1.png" width="30px"></a>
        <a href="#"><img src="iconos/icono2.png" width="30px"></a>
        <a href="#"><img src="iconos/icono3.png" width="30px"></a>
      </div>

      </div>

    <div class="background">
    <div class="row justify-content-around" id="tercero">
        <div>
        <form action="reservar.php" method="post">
        <fieldset>
        <?php

            $fecha2=$_POST['hora1'];
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");



            if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();

            } 
            
            if ( ($fecha2[3]=='0') && ($fecha2[4]=='0') ) {


                $query="INSERT INTO Reservas(CodUsu,CodPis,fecha,hora) VALUES ('".$_POST['Codusu']."','".$_POST['img']."'
            ,'".$_POST['fecha1']."','".$_POST['hora1']."');";

            
            
            if ($result = $connection->query($query)) {
                
                
                echo "<div>";
                echo "Confirmación de la reserva : </br>";   
                echo "El Usuario ".$_POST['Codusu']." ha reservado la pista con código  : ".$_POST['img'].
                "</br> el día ".$_POST['fecha1']." a las ".$_POST['hora1'];
                echo "</div>";
                echo "<div>";
                echo "<img src='iconos/success.png'>";
                echo "</div>";
                
                
               
            } else {
                echo "Ha habido algun error";
            }
            } else  {
                echo "Debe introducir una hora exacta";
            }
            


            ?>


            <?php 

            $result->close();
            unset($obj);
            unset($connection);


            ?>
        </fieldset>
      </form>
        </div>
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
