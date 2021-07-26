<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['inicio'] = "inicio";
$route['iniciar_sesion'] = "Usuarios/iniciar_sesion";
$route['cerrar_sesion'] = "Usuarios/cerrar_sesion";
$route['pagina_principal'] = "Usuarios/pagina_principal";
$route['editar_perfil'] = "Usuarios/editar_perfil";
$route['configuracion'] = "Configuracion";
$route['eliminar_cuenta'] = "Usuarios/eliminar_usuario";
$route['novedades'] ="Usuarios/novedades";
$route['noticia_modificar/(:num)'] = "Noticia/modificar/$1";
$route['noticia_eliminar/(:num)'] = "Noticia/eliminar/$1";
$route['noticias_insertar'] = "Noticia/insertar";