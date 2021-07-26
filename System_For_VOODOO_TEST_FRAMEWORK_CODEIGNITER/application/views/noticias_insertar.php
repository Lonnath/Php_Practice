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
    <title>INSERTAR NOTICIA</title>
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
            <div class="w-50">
            <?php 
                  echo form_open(''); 
              ?> 
              <div class='form-group w-100'>
                <?php 
                  echo form_label('TITULO', 'TITULO'); 
                  $titulo_input = array('name'=>'titulo', 'class'=> 'mb-4 form-control w-100'); 
                  echo form_input($titulo_input); 
                ?>
                    
                <?php
                echo form_label('imagen', 'imagen'); 
                $imagen = array(
                  '1'         => 'IMAGEN ESTANDAR',
                  '2'         => 'IMAGEN INTERNACIONAL',
                  '3'         => 'MUNDIAL',
                  );

                  
                  echo form_dropdown('imagen', $imagen, null, "class='form-select mb-4'");
                  
                  echo form_label('RELEVANTE', 'RELEVANTE'); 
                ?>
                <div class="form-check">
                  <?php 
                   
                      $data = array(
                        'name'          => 'relevante',
                        'id'            => 'relevante',
                        'value'         => '1',
                        'checked'       => false,
                        'class'         => 'form-check-input'
                      );
            
                    echo form_checkbox($data);
                  ?>
                </div>
            </div>        
          </div>
          </div>
          <div class="col">
            <div class="form-check">
              <?php 
              
                echo form_label('IDENTIFICACION DEL AUTOR', 'IDENTIFICACION DEL AUTOR'); 
                $cc_autor_input = array('name'=>'cc_autor', 'class'=> 'mb-4 form-control'); 
                echo form_input($cc_autor_input);
                echo form_label('FECHA', 'FECHA'); 
                $fecha_input = array('name'=>'fecha', 'class'=> 'form-control mb-4', 'type' => 'date'); 
                echo form_input($fecha_input); 
                
              ?> 
              <div class="mx-1 mt-2">
                  DOCUMENTO VALIDO
              </div>
              <label class="form-check-label mx-4" for="flexRadioDefault1">
                SI
                <?php 
                    $validado_input = array('name'=>'validado', 'value' => 1, 'class'=> 'form-check-input', 'type' => 'radio'); 
                    $validado1_input = array('name'=>'validado', 'value' =>0, 'class'=> 'form-check-input', 'type' => 'radio', 'checked' =>true);
                  
                  
                  echo form_input($validado_input); 
                ?>
              </label>
              
              <label class="form-check-label mx-4" for="flexRadioDefault1">
                NO 
                <?php  
                  echo form_input($validado1_input); 
                ?>
              </label>
            </div>
          </div>
          <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label" name="descripcion">DESCRIPCION</label>
                    <?php 
                    $descripcion_input = array('name'=>'descripcion', 'type' => 'textarea', 'class'=>'form-control'); 
                    echo form_input($descripcion_input); 
                    ?>
          </div>
          <div class="row" >
                    <div class="col">
                      <div class="d-flex justify-content-end">
                        <?php
                          echo form_submit("mysubmit", "Enviar", "class='btn btn-success'");
                          echo form_close();
                        ?> 
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