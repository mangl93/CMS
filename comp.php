            <?php
            session_start();

         
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");



            $query="
                select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                and fecha='".$_SESSION['fecha']."' and hora='".$_SESSION['hora']."';
            ";
        
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                      $codigo=$obj->CodRes;
                      echo $codigo;
                }
              
            }


            ?>