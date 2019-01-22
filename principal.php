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
    session_start();
    if (!isset($_SESSION['cod'])) {
        header("Location: index.php");
    }
    ?>

    </div>
         
    <div class="background">
      <div class="row justify-content-around" id="tercero">
        <div id="cuadro1" class="col-md-3 "><img src="iconos/reloj.png" ><br><b>Informacion</b><br><br>
                  
                  <?php 
                    
                    
            

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
                
                $query="select * from Usuarios where CodUsu=".$_SESSION['cod'];
              if ($result = $connection->query($query)) {
              
               
              
              ?>
              
                  <!-- PRINT THE TABLE AND THE HEADER -->
                  
              
              <?php
              
                  //FETCHING OBJECTS FROM THE RESULT SET
                  //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                  
                  
                  while($obj = $result->fetch_object()) {
                   
                      //PRINTING EACH ROW
                      
                        echo "<ul>";
                        echo "<li>Codigo Usuario : ".$obj->CodUsu."</li>";
                        echo "<li>Nombre : ".$obj->Nombre."</li>";
                        echo "<li>Apellidos : ".$obj->Apellidos."</li>";
                        echo "<li>Direccion : ".$obj->Direccion."</li>";
                        echo "<li>Contraseña : ".$obj->pass."</li>";
                        echo "<li>Email : ".$obj->email."</li>";
                        
              
                      echo "</ul>";
                      
                  }
              
                  //Free the result. Avoid High Memory Usages
                  $result->close();
                  unset($obj);
                  unset($connection);
              
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
              
              ?>
                    
          
          
        </div>
        <div id="cuadro2" class="col-md-3 "><img src="iconos/diagrama.png" ><br><b>
        
        Reservas</b><br><br>
                   
        <?php 
                    
            

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
                      
                      $query="select CodRes,fecha,hora,CodPis from Reservas 
                      where CodUsu=".$_SESSION['cod'];
                    if ($result = $connection->query($query)) {
                        
                     
                        
                    ?>
                    
                        <!-- PRINT THE TABLE AND THE HEADER -->
                        
                    
                    <?php
                    
                        //FETCHING OBJECTS FROM THE RESULT SET
                        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                        
                        
                        while($obj = $result->fetch_object()) {
                          
                            //PRINTING EACH ROW
                            
                              echo "<ul>";
                              echo "<li>Codigo de Reserva : ".$obj->CodRes."</li>";
                              echo "<li>fecha : ".$obj->fecha."</li>";
                              echo "<li>hora : ".$obj->hora."</li>";
                              echo "<li>Codigo de Pista : ".$obj->CodPis."</li>";
                              
                              
                    
                            echo "</ul>";
                            
                        }
                    
                        //Free the result. Avoid High Memory Usages
                        $result->close();
                        unset($obj);
                        unset($connection);
                    
                    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
                    
                    ?>
                
        </div>
        <div id="cuadro3" class="col-md-3 "><img src="iconos/calendario.png" ><br><b>Pedidos</b><br><br>
        <?php 
                    
            

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
                      
                      $query="select p.CodPed,p.cantidad,a.Nombre,a.Marca,a.Precio 
                      from Pedidos p join Articulos a on p.CodArt=a.CodArt
                      where CodUsu=".$_SESSION['cod'];
                    if ($result = $connection->query($query)) {
                        
                     
                        
                    ?>
                    
                        <!-- PRINT THE TABLE AND THE HEADER -->
                        
                    
                    <?php
                    
                        //FETCHING OBJECTS FROM THE RESULT SET
                        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                        
                        
                        while($obj = $result->fetch_object()) {
                          
                            //PRINTING EACH ROW
                            
                              echo "<ul>";
                              echo "<li>Producto : ".$obj->Nombre." (".$obj->cantidad.")</li>";
                              echo "<li>Precio total : ".$obj->Precio*$obj->cantidad." €</li>";
                              
                              
                    
                            echo "</ul>";
                            
                        }
                    
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
      include("includes/footer.html");
      ?>




    </body>

</html>
