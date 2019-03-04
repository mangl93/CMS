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
  <div class="container">
    
  
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("includes/header.html");
    ?>
    
    </div>

    <div class="background">
    <div class="row justify-content-around" id="tercero">
        <div>
        <form action="encuentraUsuarios.php" method="post">
        <fieldset>
          <?php 
          
          $connection = new mysqli("localhost", "tf", "123456", "proyecto");
          $connection->set_charset("utf8");



          if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
          }


          $query="SELECT * from Usuarios where Nombre like '%".$_POST["nombre"]."'";

          
          if ($result = $connection->query($query)) {

              if ($result->num_rows==0) {
                  echo "Ningun cliente ".$_POST["nombre"];
                  
              } else { 
                  echo "<h4>Usuarios : </h4>";

                  while($obj = $result->fetch_object()) {
                      
                      
                      echo "<ul>";
                      echo "<li>Codigo Usuario : ".$obj->CodUsu."</li>";
                      echo "<li>Nombre : ".$obj->Nombre."</li>";
                      echo "<li>Apellidos : ".$obj->Apellidos."</li>";
                      echo "<li>Direccion : ".$obj->Direccion."</li>";
                      echo "<li>Contraseña : ".$obj->pass."</a></li>";
                      
                      echo "</ul>";
                      }

              } 

          ?>


          <?php 

          $result->close();
          unset($obj);
          unset($connection);
          } 


          ?>
        </fieldset>
      </form>
        </div>
    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
