<?php 
session_start();

if ($_SESSION['tipo']=='user') {
    session_destroy();
    echo $_SESSION['tipo'];
    header ("Location: ../index.php");
} 

?>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
 
</head>

<body>
    <style>
        body {
        
          font-family: 'Concert One', cursive;
          font-size: 18px;
         
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="container">
 
    <?php
   include("header-admin.php");
    
    
    ?>

   
         
    <div class=" row justify-content-center background">
      
      <div id="tercero">
        <div id="cuadro1" class="col-12 "><center><img src="../iconos/usuarios-blanco.png" width="50px"><br><b>Informacion</b></center><br>
       
            
    


                  <?php 

              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "tf", "123456", "proyecto");
              $connection->set_charset("utf8");
              
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
                        echo "<li>Email : ".$obj->email."</li>";
                        echo $_SESSION['tipo'];
                        
                        
                        
              
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




</body>

</html>
