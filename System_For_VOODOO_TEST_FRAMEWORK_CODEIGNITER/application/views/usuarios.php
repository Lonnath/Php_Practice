<?php
session_start();
  if(!isset($_SESSION['user_name_session']) && $_SESSION["user_name_session"]==NULL){
    header("Location: inicio");
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/basics.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&family=Martel:wght@200&Poppins:wght@100&family=Krona+One&display=swap" rel="stylesheet">
    <title>MODIFICAR NOTICIA</title>
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
<table class="table">
  <thead class="table-dark">
    <tr>
      <td>
        Noticias 
      </td>
      <td >
        <div class="d-flex justify-content-end">
          <a href="noticias_insertar" class="btn btn-success text-white">AÑADIR</a> 
        </div>
      </td>
    </tr>
  </thead>
  <tbody>
  
    <?php 
        if(count($noticias)==0){
          ?>
          <tr>
            <td colspan="2">
              <div class="mt-5">
                Lo sentimos, por el momento no hay noticias registradas, si desea ingrese una.
            
              </div>
            </td>
          </tr>
          <?php
        }else {
        foreach($noticias as $noticias => $valor){
      
    ?>
    <tr>
      <td colspan="2">
    
        <div class="card" style="width: 100%;">
          <div class="mx-3 mt-2">
            <img src="img/noticias/<?php echo $valor->img_url; ?>.jpg" class="card-img-top" alt="..." style="width:20%;">
          </div>
          
          <div class="card-body">
            <h5 class="krona"><?php echo $valor->titulo;?></h5>
            <p class="card-text"><?php echo $valor->descripcion; ?></p>
            <br>
            <span class=""><?php echo $valor->fecha_publicacion; ?> ~ <?php echo $valor->nombre_autor;?></span>
            <div class="d-flex justify-content-end mb-5">
            
              <div>
                <a href="noticia_modificar/<?php echo $valor->id?>" class="btn btn-warning mt-5 me-5">
                  MODIFICAR
                </a>
              </div>
              <div class="mt-5 pe-5">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  ELIMINAR
                </button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">ADVERTENCIA</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                              ESTA OPCIÓN ES IRREVERSIBLE, ¿SEGURO DESEA ELIMINAR LA NOTICIA?.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">NO</button>
                      <a type="button" class="btn btn-danger w-25 text-white" href="noticia_eliminar/<?php echo $valor->id?>">SI</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <?php
        
      } 
    }
    ?>
  
  </tbody>
</table>
</div>

<!-- FIN CONTENIDO -->

<!-- MODALES -->

<div class="modalSesion" id="modalSesion">
    <div class="card pos-card" style="width: 18rem;">
    <div class="card-body">
        <p class="text-card d-flex justify-content-center poppins f-24p">Bienvenido</p>
    </div>
    <img src="img/login/access_granted.gif" class="card-img-top" alt="...">
    <div class="card-footer text-muted d-flex justify-content-center">
        <button type='button' class='btn btn-dark' onclick="modalLogueadoCierre()">
                CERRAR
        </button>
    </div>
    </div>
</div> 


<?php
    echo "<script type='text/javascript'>";
    if(!$_SESSION["FALLO_SESION"] && !isset($_SESSION['CHECK_LOGIN'])){
          echo "modalLogueado()";  
          $_SESSION['CHECK_LOGIN'] = true;
    }
    echo "</script>";

?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="js/interface.js"></script>
  </body>
</html>