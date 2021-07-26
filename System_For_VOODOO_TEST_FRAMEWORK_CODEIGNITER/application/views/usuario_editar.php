<?php
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
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&family=Martel:wght@200&Poppins:wght@100&display=swap" rel="stylesheet">
    <title>EDITAR PERFIL</title>
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
<div class="container mt-5 w-100">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-start">
                <div class="position-relative">
                    <div class="w-50">
                        <img src="img/editar/aprobacion.gif" class="img-fluid" alt="" >
                    </div>
                    <br>
                    <div class="position-absolute top-100 start-0 poppins text-center w-50">
                        SE PRECAVIDO CON LOS DATOS QUE ALTERAS
                    </div>
                </div>
            </div>
        </div>
        <div class="col w-50">
            <div class="d-flex justify-content-center w-50">
                <?php 
                    echo form_open(''); 
                ?> 
                <div class='form-group'>
                <?php 

                    if(isset($_SESSION['nombre_usuario_sesion'])){
                        $nombre = $_SESSION['nombre_usuario_sesion'];
                    }else $nombre = "";
                    
                    if(isset($_SESSION['apellido_usuario_sesion'])){
                        $apellido = $_SESSION['apellido_usuario_sesion'];
                    }else $apellido = "";
                    
                    if(isset($_SESSION['email_usuario_sesion'])){
                        $email = $_SESSION['email_usuario_sesion'];
                    }else $email = "";
                    echo form_label('Nombre', 'Nombre'); 
                    $nombre_input = array('name'=>'nombre', 'value' => $nombre, 'class'=> 'form-control input-lg'); 
                    echo form_input($nombre_input); 
                    
                    echo form_label('Apellido', 'Apellido'); 
                    $apellido_input = array('name'=>'apellido', 'value' => $apellido, 'class'=> 'form-control input-lg'); 
                    echo form_input($apellido_input); 
                    
                    echo form_label('email', 'email'); 
                    $email_input = array('name'=>'email', 'value' => $email, 'class'=> 'form-control input-lg'); 
                    echo form_input($email_input); 

                    echo form_submit("mysubmit", "Enviar", "class='btn btn-primary mt-5'");
                    echo form_close();
                ?> 

            </div>        
        </div>
    </div>

  <!-- Button trigger modal -->
  <div class="container mt-5 pe-5 d-flex justify-content-end">
    <div class="mt-5 pe-5">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        ELIMINAR CUENTA
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
                    ESTA OPCIÓN ES IRREVERSIBLE, ¿SEGURO DESEA ELIMINAR SU CUENTA?.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">NO</button>
            <a type="button" class="btn btn-danger w-25 text-white" href="eliminar_cuenta">SI</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FIN CONTENIDO -->







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="js/interface.js"></script>
  </body>
</html>