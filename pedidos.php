
<!doctype html>
<html lang="esp">

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
        



    <?php
session_start();
//CREATING THE CONNECTION
$connection = new mysqli("localhost", "tf", "123456", "proyecto");
$connection->set_charset("uft8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */

  $query="select p.CodUsu,p.CodPed,p.CodArt,p.cantidad,a.Nombre,a.Marca,a.Precio from Pedidos p join Articulos a on p.CodArt=a.CodArt
  where p.CodUsu=".$_SESSION['cod'];
if ($result = $connection->query($query)) {

    

?>

    
    

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    
  
    while($obj = $result->fetch_object()) {
        $id=$obj->CodPed;
        $total=$obj->cantidad*$obj->Precio;
        //PRINTING EACH ROW
        
    

     
        echo "<div class='row justify-center' style='border:3px dotted orange'>";
        echo "<ul>";
        echo "<h3> DETALLES DEL PEDIDO :</h3>";
        echo "<li>Código del pedido : ".$obj->CodPed."</li>"; 
        echo "<li>Articulo : ".$obj->Nombre."</li>"; 
        echo "<li>Marca : ".$obj->Marca."</li>";
        echo "<li>Cantidad : ".$obj->cantidad." / Precio : ".$obj->Precio." €</li>";
        echo "<li>Precio total del pedido : ".$total." €</li>";
        echo "</ul>";
        echo "<br>";

       
        echo "<div style='margin:30px'>";
        echo "<img src='pedidos/fotos/$obj->CodArt.jpg' width='120px'>";
        echo "<p style='text-align:center'> <a href='modificarpedidos.php?cod=$id'>
          <img src='iconos/lapiz.png' height='30px' width='40px' style='float:left' ></a>
          <a href='eliminarpedido.php?cod=$id'>
          <img src='iconos/delete.png' height='30px' width='40px' style='float:right'></a>
          </p>";
          echo "<br>";

       
        echo "</div>";
        echo "</div>";
        
     
        
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>




    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
