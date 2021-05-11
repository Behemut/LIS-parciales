<div id="main">
<div class="top2_wrapper">
  <div class="container">
    <div class="top2 clearfix">
      <header>
        <div class="logo_wrapper">
          <a href="logindex.php" class="logo">
            <img src="images/logo-udb.png" alt="" class="img-responsive">
          </a>
        </div>
      </header>
      <div class="navbar navbar_ navbar-default">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-collapse navbar-collapse_ collapse">
          <ul class="nav navbar-nav sf-menu clearfix">
          <li><a href="index.php">Inicio</a></li>
         
<?php

  if (empty($_SESSION['fullname']) ){
  echo " <li><a href=\"login.php\">Iniciar sesión</a></li>
        <li><a href=\"register.php\">Registrarse</a></li>";
  }


  if (!empty($_SESSION['fullname']) &&  !empty($_SESSION['Rol']) ){
    echo "<li><a href=\"registertour.php\">Añadir viajes disponibles</a></li>";
  }

if (!empty($_SESSION['fullname'])){
        echo "<li><a href=\"logout.php\">Cerrar sesion</a></li>
          <li><a href=\"myReservations.php\"><strong>";
         echo "Hola ".$_SESSION['fullname']. "</strong></a></li>";
    }

?>
      
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>