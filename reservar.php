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
        <form action="reservar.php" method="post">
        <fieldset>
        
            <?php
            session_start();
            $_SESSION['fecha']=$_POST['fecha1'];
            $_SESSION['hora']=$_POST['hora1'];
            $_SESSION['pista']=$_POST['img'];
            $fecha2=$_POST['hora1'];

         
        



            if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();

            } 

          
         
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");



            $query="
                select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                and fecha='".$_SESSION['fecha']."' and hora='".$_SESSION['hora']."';
            ";
        
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                      $codigo=$obj->CodRes;
                      
                      
                }
              
            }

            if ($result->num_rows==0) {

            if ( ($fecha2[3]=='0') && ($fecha2[4]=='0') ) {


              $query="INSERT INTO Reservas(CodUsu,CodPis,fecha,hora) VALUES ('".$_SESSION['cod']."','".$_POST['img']."'
          ,'".$_POST['fecha1']."','".$_POST['hora1']."');";
              
          if ($result = $connection->query($query)) {
            
              echo "<div>";
              echo "Confirmación de la reserva : </br>";   
              echo "El Usuario con codigo nº ".$_SESSION['cod']." ha reservado la pista con código nº ".$_POST['img'].
              "</br> el día ".$_POST['fecha1']." a las ".$_POST['hora1'];
              echo "</div>";
              echo "<div>";
              echo "<img src='iconos/success.png'>";
              echo "</div>";
                 
          } else {echo "Ha habido algun error";}
          } else {echo "Debe introducir una hora exacta";}

              
            } else {echo "Esta hora ya está reservada";}



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
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
