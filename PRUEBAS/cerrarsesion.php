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
          background-color: grey;
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- VARIABLES DE SESION -->
 

  <!-- VARIABLES DE SESION -->
  <div class="container">
    
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("includes/header.html");
    ?>
    
    </div>

    <div class="background">
      <div class="row justify-content-center" id="tercero">

            <div class="col-3" >
                <img src="iconos/cerrar.png" width="50%">
            </div>
              <?php 
              session_start();
              session_destroy(); 
              ?>
            <div>
            LA SESIÓN SE HA CERRADO<br>
            
            <a href='index.php'>Ir al inicio</a>
            </div>

            
      </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
