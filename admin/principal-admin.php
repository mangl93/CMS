<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
        
          font-family: 'Concert One', cursive;
          font-size: 18px;
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
        <div id="cuadro1" class="col-md-3 "><center><img src="../iconos/reloj.png" ><br><b>Informacion</b></center><br>
       
            
    


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
                        echo "<li>Codigo Administrador : ".$obj->CodUsu."</li>";
                        echo "<li>Nombre : ".$obj->Nombre."</li>";
                        echo "<li>Contraseña : ".$obj->pass."</li>";
                        echo "<li>Email : ".$obj->email."</li>";
                        if ( (isset($_SESSION['tipo'])) && ($_SESSION['tipo']='root')) {
                            echo $_SESSION['tipo'];
                        }
                        
              
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
      include("footer-admin.html");
      ?>




    </body>

</html>
