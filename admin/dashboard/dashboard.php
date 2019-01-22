

    <!doctype html>
    <html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../admin.css">
  
  <link rel="shortcut icon" href="../../iconos/logo.png" />
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script src="../../code/highcharts.js"></script>
  <script src="../../code/highcharts-more.js"></script>

<script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <title>Hello, world!</title>
</head>

<body>



    

   
    <?php 
    session_start();
    if ($_SESSION['tipo']!='root') {
        session_destroy();
        header ("Location: ../index.php");
    }
    include("numusu.php");
    include("numped.php");
    include("numres.php");
    include("nummes.php");
    include("fusioncharts.php");
    include("diagrama1.php");
    include("diagrama2.php");
    include("diagrama3.php");
    
    ?>
     

    
   
    

<div class="container-fluid">
    
  
            <div class="row">
                <div class="col-1  pt-4">
                    <a href="../principal-admin.php"><img src="../../iconos/admin.png" width="70px"></a>
                </div>
                <div class="col-9 pt-5">
                    <h4>Hola administrador</h4>
                </div>
                <div class="col-2">
                    <div id="reloj"></div>
                </div>
    </div>
    <div class="row resumen">
        <div class="col-2" >
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Usuarios</h5>
                    <img src="../../iconos/usuarios-blanco.png" width="80px">
                    <span class="float-right"><h1><?php echo $usuarios ?></h1></span>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Reservas</h5>
                    <img src="../../iconos/calendario1.png" width="80px">
                    <span class="float-right"><h1><?php echo $reservas ?></h1></span>
                </div>
            </div>
        </div>
        <div class="col-2" >
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Pedidos</h5>
                    <img src="../../iconos/carrito.png" width="80px">
                    <span class="float-right"><h1><?php echo $pedidos ?></h1></span>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Mensajes</h5>
                    <img src="../../iconos/mensaje.png" width="80px">
                    <span class="float-right"><h1><?php echo $mensajes ?></h1></span>
                </div>
            </div>
        </div>
        <div class="col-4" id="chart-1"><!-- Fusion Charts will render here--></div>
        <div class="col-3" id="chart-2"><!-- Fusion Charts will render here--></div>
        </div>
        <div class="row">
            <div class="col-5" id="chart-3"><!-- Fusion Charts will render here--></div>
           
            
            <div class="col-7"><?php
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */

            $query="select * from Usuarios";
            if ($result = $connection->query($query)) {

                

            ?>

                <!-- PRINT THE TABLE AND THE HEADER -->
                <table style="border:1px solid white">
                <thead >
                <tr>
                    <th>CodUsuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Contraseña</th>
                    <th>Email</th>
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
                    ".$obj->CodUsu."
                    </td>";
                    echo "<td>".$obj->Nombre."</td>";
                    echo "<td>".$obj->Apellidos."</td>";
                    echo "<td>".$obj->Direccion."</td>";
                    echo "<td>".$obj->pass."</td>";
                    echo "<td>".$obj->email."</td>";
                    echo "<td><a href='../editarusuarios-admin.php?cod=$obj->CodUsu'>
                    <img src='../../iconos/lapiz-ad.png' height='30px' width='30px'></a></td>";
                    echo "<td><a href='../eliminarusuarios-admin.php?cod=$obj->CodUsu'>
                    <img src='../../iconos/delete-ad.png' height='30px' width='30px'></a></td>";
                    

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
    

       
    </div>

            
     <?php 
     include("reloj.php");
     ?>      

</body>

<html>