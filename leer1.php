

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

            <div>
            <?php
                     session_start();
                     $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                     $connection->set_charset("uft8");
 
                     
                     
                     $query="select * from Mensajes where CodMen='".$_GET['cod']."';";
                     
                     if ($result = $connection->query($query)) {
                     while($obj = $result->fetch_object()) {
                        
                          echo "<div class='row justify-content-center'>";
                            echo "<div class='col-4'>";
                                echo "<img src='iconos/mensaje.png' width='40px'><br>";
                                echo "To : ".$obj->Destinatario;
                                echo "<br>";
                                echo "Fecha : ".$obj->hora_envio;
                            echo "</div>";
                            echo "<div class='col-8 mensaje'>";


                                    echo "<div class='card text-white bg-info mb-3' style='max-width: 18rem;'>";
                                        echo "<div class='card-header'>".$obj->Asunto."</div>";
                                        echo "<div class='card-body'>";
                                        echo "<p class='card-text'>".$obj->Cuerpo."</p>";
                                        echo "</div>";
                                    echo "</div>";


                                
                                

                            echo "</div>";
                           echo "</div>";
                        
                        }}

                        
                     $result->close();
                     unset($obj);
                     unset($connection);
                    


                ?>
                <?php 
                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("uft8");

             
             
                $query2="update Mensajes set leido=TRUE where CodMen='".$_GET['cod']."';";
             
                if ($result = $connection->query($query2)) {

                   
                    
                }
                
                ?>
            </div>
        </div>
        <div class="col-md-2 funciones">
            <button class="btn btn-light " ><a href="mensajes.php">Escribir un mensaje</a></button>
            <button class="btn btn-light " ><a href="mensajes.php">Mensajes enviados</a></button>
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
