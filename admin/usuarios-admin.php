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
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          color: black;
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
 
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("header-admin.php");
  
    ?>

    </div>
         
    <div class="background"><center>

    <div  id="tercero">
    <div class="col-10 card" style="color:black;">
        <?php
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
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Email</th>
            
            <th>Acciones</th>
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

            echo "<td>".$obj->email."</td>";

            echo "<td><center><button class='btn'><a href='editarusuarios-admin.php?cod=$obj->CodUsu'>
            <i class='fa fa-pencil' style='color:blue;' aria-hidden='true'></i></a></button>
            <button class='btn'><a href='eliminarusuarios-admin.php?cod=$obj->CodUsu'>
            <i class='fa fa-trash'  style='color:red;' 
            aria-hidden='true'></i></a></button></center></td>";
            echo "<td><td>";

            

                        
            echo "</tr>";
            
        }echo "</table>";

        //Free the result. Avoid High Memory Usages
        $result->close();
        unset($obj);
        unset($connection);

    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

        ?>
       
        <div class="card-footer">
        <button type="button" target="_blank" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            NUEVO USUARIO
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CREAR CUENTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php if (!isset($_POST["mail"])) : ?>
                                <form method="post">
                                <div id="prueba" style="font-family:serif;">
                                    
                                    
                                    <input type="text" name="Nombre" placeholder="Nombre *" required><br>
                                    <input type="text" name="Apellidos" placeholder="Apellidos usuario *" required><br>
                                    <input type="text" name="Direccion" placeholder="Direccion usuario *" required><br>
                                    <input type="password" name="pass" placeholder="Contraseña (5 digitos)*" required><br>
                                    <input type="password" name="pass1" placeholder="Repita Contraseña *" required><br>
                                    <input type="email" name="mail" placeholder="Email *" required><br>
                                    <input type="text" name="Nickname" placeholder="Nickname *" required><br>
                                <p> <input type="submit" class="sub" value="Send"></p>
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
                                $query="INSERT INTO Usuarios(Nombre,Apellidos,Direccion,pass,email,Nickname,tipo) values 
                                ('".$_POST['Nombre']."','".$_POST['Apellidos']."'
                                ,'".$_POST['Direccion']."',md5('".$_POST['pass']."'),'".$_POST['mail']."','".$_POST['Nickname']."','user');";
                                
                                
                                if ($result = $connection->query($query)) {
                                    
                                    header("Location: usuarios-admin.php");
                                    
                                    
                                } 
                                }else {

                                echo "LAS CONTRASEÑAS NO COINCIDEN";
                                } 
                                
                                
                                    
                                    
                                ?>

                            <?php endif ?>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  

      </div></center>
      </div>
    </div>

 



    </body>

</html>