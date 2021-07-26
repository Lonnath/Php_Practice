<?php
session_start();
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/basics.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&family=Martel:wght@200&Poppins:wght@100&display=swap" rel="stylesheet">
    <title>Novedades</title>
  </head>
  
  <script src="js/interface.js"></script>
  <body>
<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg bg-nav-light fondiu mx-1 mt-2">
  <div class="container-fluid">
    <a class="navbar-brand zen-dots f-24p text-nav" href="#">ADMINISTRADOR NOTICIAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100 d-flex justify-content-end">
        <div class="d-flex mr-5">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link martel f-15p" href="pagina_principal">INICIO</a>
                <div class="line-text-nav">
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link martel f-15p" href="novedades">NOVEDADES</a>
                <div class="line-text-nav">
                </div>
              </li>
              <li class="nav-item dropdown martel f-15p padre-dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['user_name_session']; ?>
                </a>
                <div class="line-text-nav">
                </div>
                <ul class="dropdown-menu pos-login-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="editar_perfil">EDITAR PERFIL</a></li>
                  <li><a class="dropdown-item" href="configuracion">CONFIGURACION</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="cerrar_sesion">Cerrar Sesion</a></li>
                </ul>
              </li>
              
          </div>
        </div>
      </div>
  </div>
</nav>
<!-- FIN NAVBAR -->
    
<!-- CONTENIDO -->
<div class="container mt-5">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    <?php 
      $count = 0;
      $countCantidad = count($noticias_principales);
      if($countCantidad == 0){
        ?>
<div class="carousel-item <?php if($count==0){echo "active"; $count++;} ?>" data-bs-interval="10000">
          <div class="d-flex justify-content-center height-50">
              <img src="img/login/cargando.gif" class="d-block" style="width:500px; height:300px;" alt="...">
          </div>
          <div class="mt-5 d-flex justify-content-center">
            <p>POR EL MOMENTO NO SE ENCUENTRAN NOTICIAS REGISTRADAS</p>
          </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>
        <?php
      }else {
      foreach($noticias_principales as $noticias => $valor){
    
    ?>
      <div class="carousel-item <?php if($count==0){echo "active"; $count++;} ?>" data-bs-interval="10000">
          <div class="d-flex justify-content-center height-50">
              <img src="img/noticias/<?php echo $valor->img_url ?>.jpg" class="d-block" style="width:500px; height:300px;" alt="...">
          </div>
          <div class="mt-5 d-flex justify-content-center">
            <p><?php echo $valor->descripcion; ?></p>
          </div>
      </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>

<?php 
  }
?>
<!-- FIN CONTENIDO -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="js/interface.js"></script>
  </body>
</html>