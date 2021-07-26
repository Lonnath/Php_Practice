<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("form");
	}
	public function index(){
		$this->load->view('usuarios');
	}
	public function cerrar_sesion(){
        
        session_start();
		session_unset();
        session_destroy();
        $this->db->close();
        header("location:inicio");
	}
    public function iniciar_sesion(){   
        session_start();
        $_SESSION['user_name_session'] = $this->input->post("usuario");
        $this->load->model('Usuario');
        $this->load->model('Noticias');
        $this->load->model('Persona');
        $res = $this->Usuario->find($_SESSION['user_name_session']);
        if($res == NULL){
            $_SESSION['FALLO_SESION'] = true;
            header("location: inicio");
        }else{
            if($this->input->post("pass") == $res->password){ 
                $_SESSION['cc_usuario'] = $res->cc_usuario;
                $this->Noticias->findPrincipal();
                $_SESSION['FALLO_SESION'] = false;
                $sqlPersona = $this->Persona->find($res->cc_usuario);
                if($sqlPersona!=NULL){
                    $_SESSION['nombre_usuario_sesion'] = $sqlPersona->nombre_usuario;
                    $_SESSION['apellido_usuario_sesion'] = $sqlPersona->apellido_usuario;
                    $_SESSION['email_usuario_sesion'] = $sqlPersona->email;
                }
                header("location: pagina_principal");
            }else {
                $_SESSION['FALLO_SESION'] = true;
                header("location: inicio");
            }
            
        }
        
        
    }
    public function pagina_principal(){
        
		$this->load->model('Noticias');
        $this->load->model("Persona");
		$data['noticias'] = $this->Noticias->findAll();
        foreach($data['noticias'] as $posicion => $valor){
            $usuario = $this->Persona->find($valor->cc_autor);
            if($usuario != NULL){
                $data['noticias'][$posicion]->nombre_autor = $usuario->nombre_usuario." ".$usuario->apellido_usuario;
            }else $data['noticias'][$posicion]->nombre_autor = "SIN NOMBRE DE AUTOR";
            
            
        }
        $this->load->view("usuarios", $data);
    }
    
    public function novedades(){
        
		$this->load->model('Noticias');
		$data['noticias_principales'] = $this->Noticias->findPrincipal();
        $this->load->view("novedades", $data);
    }

    public function recuperar_contrasenia(){
        $this->load->view("recuperar_contrasenia");
    }

    public function editar_perfil(){
        session_start();
        $this->load->model('Persona');
        $sqlPersona = $this->Persona->find($_SESSION['cc_usuario']);
        $_SESSION['nombre_usuario_sesion'] = $sqlPersona->nombre_usuario;
        $_SESSION['apellido_usuario_sesion'] = $sqlPersona->apellido_usuario;
        $_SESSION['email_usuario_sesion'] = $sqlPersona->email;
        
        $this->load->view("usuario_editar");
        
        
        if($this->input->server("REQUEST_METHOD")=="POST"){
            
			$data['nombre_usuario'] = $this->input->post("nombre");
			$data['apellido_usuario'] = $this->input->post("apellido");
			$data['email'] = $this->input->post("email");
            $this->Persona->actualizarPersona($_SESSION['cc_usuario'], $data);
            header("Location: editar_perfil");
		}
    }
    public function eliminar_usuario(){
        session_start();
        $this->load->model("Persona");
        $this->load->model("Usuario");
        $this->Persona->eliminarPersona($_SESSION['cc_usuario']);
        $this->Usuario->eliminarUsuario($_SESSION['user_name_session']);
        session_unset();
        session_destroy();
        header("Location: inicio");
    }
}
