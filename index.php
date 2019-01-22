

    <!doctype html>
    <html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="shortcut icon" href="iconos/logo.png" />
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
            background-color: black;
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
  <?php
    session_start();
    ?>
      <div class="row justify-content-around header">
        <div class="col-md-3 col-sm-12">
            <div class="row">
            <div class="col-4 icono">
              <img src="iconos/logo.png" width="200px">
            </div>
            <div class="col-4 ">
            <h1>AERO SPORT</h1>
            </div>
        </div>
        </div>
        
   
        <div class="col-md-1 col-sm-6 botones">
            <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">INGRESAR</button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" style="color:black;">
                        <img src="iconos/reloj.png" width="45px">  
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
                            <img src="iconos/login2.png" width="100px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-1 col-sm-6 botones">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">REGISTRARSE</button>
                <!-- Modal -->
                <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" style="color:black;">
                        <img src="iconos/reloj.png" width="45px">  
                        <h4 class="modal-title">REGISTRO</h4>
                    </div>
                    <div class="modal-body" style="color:black;">
                      
                  <?php if (!isset($_POST["mail"])) : ?>
                    <form method="post">
                      <div id="prueba">
                        CREAR CUENTA:<br>
                        
                        <input type="text" name="Nombre" placeholder="Nombre *" required><br>
                        <input type="text" name="Apellidos" placeholder="Apellidos usuario *" required><br>
                        <input type="text" name="Direccion" placeholder="Direccion usuario *" required><br>
                        <input type="password" name="pass" placeholder="Contraseña (5 digitos)*" required><br>
                        <input type="password" name="pass1" placeholder="Repita Contraseña *" required><br>
                        <input type="email" name="mail" placeholder="Email *" required><br>
                       <p> <input type="submit" style="font-family: 'Staatliches',serif; font-size: 20px;" 
                       value="SEND"></p>
                      </div>
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

                    if ( $_POST['pass'] == $_POST['pass1']) {
                      $query="INSERT INTO Usuarios(Nombre,Apellidos,Direccion,pass,email) values 
                    ('".$_POST['Nombre']."','".$_POST['Apellidos']."'
                    ,'".$_POST['Direccion']."','".$_POST['pass']."','".$_POST['mail']."');";
                    
                    
                    if ($result = $connection->query($query)) {
                        $last_id = $connection->insert_id;
                        $_SESSION['cod']=$last_id;
                        header("Location: principal.php");
                        
                        
                    } else {
                        echo "Ha habido algun error";
                        echo $query;
                    } 
                    }
                      else {

                      echo "LAS CONTRASEÑAS NO COINCIDEN";
                    } 
                    
                     
                        
                        
                    ?>

                  <?php endif ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>

                
    </div>
                </div>  
                <hr>
                <div class="row justify-content-between">
                    <div class="col-md-4 col-sm-9 info">
                        
                    <div class="letras">
                        <center>
                        <div class="jumbotron">
                        <h2> Plataforma online para la gestión deportiva</h2></div>
                      
                        <p>Software de deportes gratuito para ayuntamientos, clubes y gimnasios.</p></center>
        
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="fotos/pista1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="fotos/pista2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="fotos/pista3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                    </div>

                </div>
                
                <div class="row justify-content-center precio">
                <div class="col-md-4">
                <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cubierta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">TENIS</th>
                            <td>2,5 €</td>
                            <td>NO</td>
                            </tr>
                            <tr>
                            <th scope="row">FUTBOL</th>
                            <td>12,5 €</td>
                            <td>SI</td>
                            </tr>
                            <tr>
                            <th scope="row">BALONCESTO</th>
                            <td>12,5 €</td>
                            <td>NO</td>
                            </tr>
                            <th scope="row">PADEL</th>
                            <td>2,5 €</td>
                            <td>SI</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-9 info">
                        
                    <div class="letras">
                       
                        
                        <div class="jumbotron"> 
                            <h1 class="display-4">PRECIOS</h1>
                            
                        </div>
                        <hr class="my-4">
                        <p>Software de deportes gratuito para ayuntamientos, clubes y gimnasios.</p>
                    </div>
                    </div>
                </div>



                    <div class="row justify-content-between footer">
                      <div class="col-md-4">
                      <button type="button" class="btn btn-outline-primary">Warning</button>
                      <button type="button" class="btn btn-outline-secondary">Warning</button>
                      <button type="button" class="btn btn-outline-success">Warning</button>
                      <button type="button" class="btn btn-outline-warning">Warning</button>
                      </div>
                      <div class="col-md-4">
                      <button type="button" class="btn btn-outline-danger">Warning</button>
                      <button type="button" class="btn btn-outline-dark">Warning</button>
                      <button type="button" class="btn btn-outline-info">Warning</button>
                      <button type="button" class="btn btn-outline-light">Warning</button>
                      </div>
                    </div>
                    
                </div>
                

                
      
            
        <div>
            
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
    
    </body>
    </html>