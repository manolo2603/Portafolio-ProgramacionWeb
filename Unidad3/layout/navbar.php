<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="d-flex flex-nowrap">
      <div class="circulo">
        <img src="../Database/obtenerImagen.php?IdProducto=<?php echo $imagenUsuario->idUsuario ?>" class="imagen">
      </div>
      <a class="navbar-brand" href="../pages/control.php"><?php echo $_SESSION['NombreUsuario'] ?></a>
      
    </div>

    <div class="col-auto">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../pages/control.php"> Principal <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cuenta
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../pages/ajustes.php"><i class="fas fa-tools" id="iconsItems"></i>Ajustes</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../Database/cerrarSesion.php"><i class="fas fa-sign-out-alt" id="iconsItems"></i>Cerrar Sesión</a>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>