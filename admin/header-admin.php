
      <div class="col-2">
      <div class="img-fluid " alt="Responsive image"><img src="../iconos/logo.png" width="70px"></div>
    </div>
    <div class="col-1">
    <?php 
    session_start();
    echo "<div>";
    echo "<div class='btn1'><H6>ADMINISTRADOR Nº ".$_SESSION['cod']."</H6></div>";
    echo "</div>";
    ?>
</div>
    <div class="col-6  " >
      <ul class="nav nav-tabs">
        <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MODIFICAR</a>
            <div class="dropdown-menu">
             <a class="dropdown-item" href="usuarios-admin.php">USUARIOS</a>
             <a class="dropdown-item" href="Usuarios.php">ARTICULOS</a>
             <a class="dropdown-item" href="Usuarios.php">RESERVAS</a>
             <a class="dropdown-item" href="pedidos-admin.php">PEDIDOS</a>
             <a class="dropdown-item" href="Usuarios.php">PISTAS</a>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">INSERTAR</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="principal-admin.php">USUARIOS</a>
              <a class="dropdown-item" href="Usuarios.php">ARTICULOS</a>
              <a class="dropdown-item" href="Usuarios.php">RESERVAS</a>
              <a class="dropdown-item" href="Usuarios.php">PEDIDOS</a>
              <a class="dropdown-item" href="Usuarios.php">PISTAS</a>
         </li>
      <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ELIMINAR</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="principal-admin.php">USUARIOS</a>
              <a class="dropdown-item" href="Usuarios.php">ARTICULOS</a>
              <a class="dropdown-item" href="Usuarios.php">RESERVAS</a>
              <a class="dropdown-item" href="Usuarios.php">PEDIDOS</a>
              <a class="dropdown-item" href="Usuarios.php">PISTAS</a>
         </li>
      <li class="nav-item">
      <a class="nav-link" href="../cerrarsesion.php" role="button" aria-haspopup="true" aria-expanded="false">CERRAR SESION</a>
      </li>
      </ul>
  </div>
        
        
       
                
              
       
        
  
        
    <div  class="col-2">
      <div id="redes">
        SIGUENOS EN
        <a href="#"><img src="../iconos/icono1.png" width="30px"></a>
        <a href="#"><img src="../iconos/icono2.png" width="30px"></a>
        <a href="#"><img src="../iconos/icono3.png" width="30px"></a>
        </div>
      </div>
