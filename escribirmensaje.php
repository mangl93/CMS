

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
    session_start();
    include("includes/header.html");
    ?>
    
    </div>

    <?php if (!isset($_POST["dest"])) : ?>
    

    <form method="post">

    <div class="background">
        <div class='row justify-content-center mens'>
            <div class="col-md-10 ">
                <h1 >Nuevo Mensaje</h1>
            </div>
        </div>
        <div class="row justify-content-around" id="tercero">
            
            
            <div class='col-2'>
                <img src='iconos/mensaje.png' width='40px'><br>
                Para :  <input type="text" name="dest" required><br>
            </div>
            <div class='col-7 mensaje'>
                <div class='card text-white bg-info mb-3' style='max-width: 18rem;'>
                <div class="card-header">
                <p class='card-text'>
                        Asunto :<input type="text" name="asun" required>
                    </p>
                </div>
                <div class='card-body'>
                    <p class='card-text'>
                        Mensaje :<textarea type="text" name="body" required>    </textarea>

                    </p>
                <input type="submit">
                </div>
            </div>                
            </form>
            <?php else:  ?>
      
      <?php 
      $cod=$_SESSION['cod'];
      $dest=$_POST['dest'];
      $asun=$_POST['asun'];
      $body=$_POST['body'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("uft8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


      $query="insert into Mensajes(Destinatario,Remitente,Asunto,Cuerpo) 
      values ('$dest','$cod','$asun','$body')";
      
        
        if ($result = $connection->query($query)) {
            echo "<div class='background'>";
            echo "<div class='row justify-content-around' id='tercero'>";
            echo "<div class='col-6'>";
                echo "MENSAJE ENVIADO";
            echo "</div>";
            echo "<div class='col-2'>";
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
                </button>";  
            echo "</div>";
            echo "</div>";
            echo "</div>";
             
            
        } else {
            echo "<div class='background'>";
            echo "<div class='row justify-content-around' id='tercero'>";
            echo "<div class='col-6'>";
                echo "ERROR";
            echo "</div>";
            echo "<div class='col-2'>";
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
                </button>";  
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
       
       
       ?>

      <?php endif ?>
            
        </div>

        
    </div>

    <?php
      include("includes/footer.html");
      ?>
    </div>
</body>