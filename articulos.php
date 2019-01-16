<!doctype html>
<html lang="es">

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
    session_start();
    ?>
    
    </div>

    <div class="background">
    <div class="row justify-content-around" id="tercero">
        <div>
        <form action="pedir.php" method="post">
          <span ><h3>REALIZAR PEDIDO  </h3></span>
          
          <div>

          <iframe src="pedidos/raqueta-tenis.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          <iframe src="pedidos/raqueta-tenis2.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          <iframe src="pedidos/raqueta-tenis3.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          
          </div>
          <div>
          
          <iframe src="pedidos/raqueta-padel.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          <iframe src="pedidos/raqueta-padel2.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          <iframe src="pedidos/raqueta-padel3.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          
          </div>
          <div>
          
          <iframe src="pedidos/balon-futbol.php" width="260px" height="400px"  style="border:0px;">
          </iframe>
          
          
          </div>
      </form>
        </div>
    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
