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
        <?php
    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
$connection->set_charset("uft8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */

  $query="select * from Pedidos";
if ($result = $connection->query($query)) {

    

?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table style="border:1px solid black">
    <thead >
      <tr>
        <th>Pedido</th>
        <th>Usuario</th>
        <th>Articulo</th>
        <th>Cantidad</th>
        
        <th></th>
        <th></th>
        
        </tr>


    </thead>
    

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    
    
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        
        echo "<tr >";
        echo  "<td align='center'>
        ".$obj->CodPed."
        </td>";
          echo "<td>".$obj->CodUsu."</td>";
          echo "<td>".$obj->CodArt."</td>";
          echo "<td>".$obj->cantidad."</td>";
          echo "<td><a href='editarpedidos-admin.php?cod=$obj->CodPed'>
          <img src='../iconos/lapiz.png' height='30px' width='30px'></a></td>";
          echo "<td><a href='eliminarpedidos-admin.php?cod=$obj->CodPed'>
          <img src='../iconos/delete.png' height='30px' width='30px'></a></td>";
          

        echo "</tr>";
        
    }echo "</table>";

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
      </div>
      </div>
    </div>

      <?php
      include("footer-admin.html");
      ?>




    </body>

</html>