<!doctype html>
<html lang="en">
<meta charset="utf-8">

<head>
  
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>


<body>
<style>
        body {
          font-family: 'Staatliches', serif;
          font-size: 20px;
        
        }
        
      </style>
<?php

            
$connection = new mysqli("localhost", "tf", "123456", "proyecto");
$connection->set_charset("uft8");



if ($connection->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


  
    $query="Select Precio from Articulos where CodArt='11';";

    
    
    if ($result = $connection->query($query)) {
        while($obj = $result->fetch_object()) {
            $precio=$obj->Precio;}
        
    } 
 
    
    
?>

<?php if (!isset($_POST["img"])) : ?>
                    <form method="post">
                    <button type="submit" name="img" value="11"  style="cursor:pointer">
                        <h4>RAQUETA PADEL<br>FILA</h4> 
                        <p><?php echo $precio ?> €</p> 
                        <br>   
                        <img src="fotos/raqueta-padel3.jpg" width="135">
                        </button>
                        <div >
                        
                        <input type="number" name="cantidad" placeholder="cantidad" required><br>
                        </div>
                        
                    </form>

                  <!-- DATA IN $_POST['mail']. Coming from a form submit -->
                  <?php else: ?>

                    <?php

                        session_start();  

                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("uft8");



                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                
                      
                        $query="INSERT INTO Pedidos(CodUsu,CodArt,cantidad) VALUES ('".$_SESSION['cod']."','".$_POST['img']."'
                        ,'".$_POST['cantidad']."');";
            
                        
                        
                        if ($result = $connection->query($query)) {
                            echo "SE HA HECHO EL PEDIDO";
                            
                        } else {
                            echo "ERROR";
                            echo $_POST['cantidad'];
                        }
                            
                     
                        
                        
                    ?>

                  <?php endif ?>


                  </body>

</html>
