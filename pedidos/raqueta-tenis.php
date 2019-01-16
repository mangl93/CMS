<!doctype html>
<html lang="en">
<meta charset="utf-8">

<head>

    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilos.css">

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

session_start();  
$connection = new mysqli("localhost", "tf", "123456", "proyecto");
$connection->set_charset("uft8");



if ($connection->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


  
    $query="Select Precio from Articulos where CodArt='1';";

    
    
    if ($result = $connection->query($query)) {
        while($obj = $result->fetch_object()) {
            $precio=$obj->Precio;}
        
    } 
 
    
    
?>

    <?php if (!isset($_POST["img"])) : ?>
    <form method="post">
        <style>
            .button {
                        -webkit-transition-duration: 0.4s; 
                        transition-duration: 0.4s;
                        cursor:pointer;
                        
                    }

                    .button:hover {
                        background-color: grey; 
                        color: white;
                        border: 2px solid white;
                    }
                    </style>
        <button class="button" type="submit" name="img" value="1">

            <h4>RAQUETA DE TENIS<br> WILSON</h4>
            <p>
                <?php echo $precio ?> €</p>
            <?php echo $id ?>
            <br>
            <img src="fotos/1.jpg" width="135">
        </button>
        <div>
        <style>
            
        </style>
            <input class="input" type="number" name="cantidad" placeholder="cantidad" required><br>
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