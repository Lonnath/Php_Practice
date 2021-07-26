
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/basics.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&family=Martel:wght@200&display=swap" rel="stylesheet">
    <title>INICIO</title>
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
                <a class="nav-link martel f-15p" href="inicio">INICIO</a>
                <div class="line-text-nav">
                </div>
              </li>
              <li class="nav-item dropdown martel f-15p padre-dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  USUARIO
                </a>
                <div class="line-text-nav">
                </div>
                <ul class="dropdown-menu pos-login-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" class="btn btn-primary" id="iniciarSesionBoton" data-whatever="@mdo" onclick="modalLogin()" data-bs-toggle="modal" data-bs-target="#exampleModal">INICIAR SESION</a></li>
                  <li><a class="dropdown-item" href="#" class="btn btn-primary" id="iniciarSesionBoton" data-whatever="@mdo" data-bs-toggle="modal" data-bs-target="#exampleModal1">REGISTRARSE</a></li>
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
              <img src="img/<?php echo $valor->img_url ?>" class="d-block" style="width:500px; height:300px;" alt="...">
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

<!-- MODALES -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modalLoginCierre()"></button>
      </div>
      <div class="modal-body" id="texto-modal">
        
      
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >REGISTRARSE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
          echo form_open(''); 
        ?> 
        <div class='form-group'>
        <?php 
          echo form_label('Nombre de Usuario', 'Nombre de Usuario'); 
          $name = array('name'=>'usuario', 'value' => '', 'class'=> 'form-control input-lg'); 
          echo form_input($name); 
          echo form_label('Contraseña', 'Contraseña'); 
          $pass = array('type' => 'password', 'name'=>'password', 'value' => '', 'class'=> 'form-control input-lg'); 
          echo form_input($pass); 
          echo form_label('Documento de Identidad', 'Documento de Identidad'); 
          $email = array('type' => 'text', 'name'=>'cc_usuario', 'value' => '', 'class'=> 'form-control input-lg'); 
          echo form_input($email);
        ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        
        <?php 
          echo form_submit("mysubmit", "Enviar", "class='btn btn-primary'");
          echo form_close();
        ?> 
      </div>
    </div>
  </div>
</div>
<div class="modalSesion" id="modalSesion">
    <div class="card pos-card" style="width: 18rem;">
    <img src="img/login/verificar.gif" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Usuario o Contraseña incorrectos. verifique los datos ingresados.</p>
        </div>
        <div class="card-footer text-muted d-flex justify-content-center">
            <button type='button' class='btn btn-secondary' onclick="modalLogueadoCierre()">
                    CERRAR
            </button>
        </div>
    </div>
</div> 


<?php
    session_start();
    echo "<script type='text/javascript'>";
    if(in_array("FALLO_SESION",$_SESSION)){
        
      if(isset($_SESSION['FALLO_SESION']) && $_SESSION['FALLO_SESION']){
          echo "modalNoLogueado()";
          session_unset();
          session_destroy();
      }
      
    }
    echo "</script>";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="js/interface.js"></script>
  </body>
