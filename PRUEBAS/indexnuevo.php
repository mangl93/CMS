

    <!doctype html>
    <html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="index.css">
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
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
      <div class="row justify-content-around">
        
      <div class="col-md-6 info">
          <div class="icono">
              <img src="/iconos/logo.png" width="100px">
          </div>    
          <div class="letras">
          <h3>AERO SPORT</h3>
          <h2> Plataforma online para la gestión deportiva</h2>
          <p>Software de deportes gratuito para ayuntamientos, clubes y gimnasios.</p>
          </div>
      </div>
     
        <div class="col-md-1 botones">
            <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">INGRESAR</button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">  
                        <h4 class="modal-title">INGRESO</h4>       
                    </div>
                    <div class="modal-body" style="color:black;">
                        <div class="login1">
                        <?php if (!isset($_POST["mail"])) : ?>
                    <form method="post">
                    
                        
                        
                        <input type="email" name="mail" placeholder="email *" required><br>
                        <input type="password" name="pass" placeholder="password *" required><br>
                        <p><input style="margin-top:10px"type="submit" value="Send"></p>
        
                            </form>

                            <!-- DATA IN $_POST['mail']. Coming from a form submit -->
                            <?php else: ?>

                            <?php

                    
                            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                            $connection->set_charset("uft8");



                            if ($connection->connect_errno) {
                            printf("Connection failed: %s\n", $connection->connect_error);
                            exit();
                            }


                            $query="SELECT CodUsu,pass,tipo from Usuarios where email like '%".$_POST["mail"]."'";

                                
                            if ($result = $connection->query($query)) {

                                if ($result->num_rows==0) {
                                    echo "ERROR";
                                    
                                } else { 
                                    while($obj = $result->fetch_object()) {
                                    $passwd=$obj->pass;
                                    $id=$obj->CodUsu;
                                    $tipo=$obj->tipo;
                                    session_start();
                                    $_SESSION['cod']=$id;
                                    $_SESSION['tipo']=$tipo;
                                    }
                                    if ($passwd==$_POST['pass']) {
                                        header("Location: principal.php");
                                        
                                        
                                        if ($tipo=='root') {
                                            header("Location: ./admin/principal-admin.php");
                                        }
                                    } else {
                                        echo $passwd;
                                        echo "<br>";
                                        echo $tipo;
                                    }
                                    

                                } }
                                
                                
                            ?>

                            <?php endif ?>


                        </div>
                        <div class="login2">
                            <img src="../iconos/login2.png" width="100px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-1 botones">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">REGISTRARSE</button>
                <!-- Modal -->
                <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">   
                        <h4 class="modal-title">REGISTRO</h4>
                    </div>
                    <div class="modal-body" style="color:black;">
                    <iframe src="ingresar.php" width="480px" height="300px"  style="border:0px;"></iframe>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                    <button type="button"><a href="cerrarsesion.php">CERRARSESION</a>
                    </button>
                <div>

                </div>
            </div>

                <div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                </div>
      
            </div>
        </div>
        
    
    </body>
    </html>