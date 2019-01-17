

    <!doctype html>


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
    <div class="row justify-content-center" id="tercero">
        <div class="col-md-6">
            <h1>Mensajes recibidos</h1>
            
            <div>
            <?php
                     session_start();
                     $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                     $connection->set_charset("uft8");
 
                     
 
                     $query="select * from Mensajes where Destinatario='".$_SESSION['cod']."';";
                     
                     if ($result = $connection->query($query)) {
                        $total=1;
                     while($obj = $result->fetch_object()) {

                          $cod=$obj->CodMen;
                          $nuevo=$obj->leido;
                            if ($nuevo==1) {
                                echo "<div class='row justify-content-center'>";
                            echo "<div class='col-2'>";   
                                echo "<img src='iconos/mensajeabierto.png' width='40px'> ".$total;
                                
                            echo "</div>";
                            echo "<div class='col-6'>";
                                echo "<button type='button' class='btn btn-primary btn-block' ><a style='color:black' href='leer.php?cod=$cod'>"
                                .$obj->Asunto."</a > ".$obj->hora_envio."</button>";
                                
                            echo "</div>";
                            echo "<div class='col-1'>";
                                echo "<a href='eleminarmensaje.php?cod=$obj->CodMen'>
                                <img src='iconos/delete-ad.png' height='30px' width='30px'></a>";
                            echo "</div>";
                           echo "</div>";
                                
                           $total++;
                            } else {
                                echo "<div class='row justify-content-center'>";
                            echo "<div class='col-2'>";   
                                echo "<img src='iconos/mensaje.png' width='40px'> ".$total;
                                
                            echo "</div>";
                            echo "<div class='col-6'>";
                                echo "<button type='button' class='btn btn-primary btn-block' ><a style='color:black' href='leer.php?cod=$cod'>"
                                .$obj->Asunto."</a > ".$obj->hora_envio."</button>";
                            echo "</div>";
                            echo "<div class='col-1'>";
                                echo "<a href='eleminarmensaje.php?cod=$obj->CodMen'>
                                <img src='iconos/delete-ad.png' height='30px' width='30px'></a>";
                            echo "</div>";
                           echo "</div>";
                           $total++;



                            }
                          
                            
                        }
                        
                    
                    } 
                     $result->close();
                     unset($obj);
                     unset($connection);
                    


                ?>

      
            </div>
            
        </div>
        <div class="col-md-2 funciones">
                    <button class="btn btn-light " ><a href="escribirmensaje.php">Escribir un mensaje</a></button>
                    <button class="btn btn-light " ><a href="enviados.php">Mensajes enviados</a></button>
                    <button class="btn btn-light " ><a href="mensajes.php">Mensajes importantes</a></button>
                    <button class="btn btn-light " ><a href="mensajes.php">Volver a mis mensajes</a></button>
        </div>
        
    </div>

    <?php
      include("includes/footer.html");
      ?>
    </div>
</body>

</html>
