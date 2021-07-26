<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("form");
		$this->load->model('Usuario');
	}
	public function index(){
		$this->load->model('Noticias');
		$vista['noticias_principales'] = $this->Noticias->findPrincipal();
		
		$this->load->view('inicio', $vista);
		
		if($this->input->server("REQUEST_METHOD")=="POST"){
			$data['user_name'] = $this->input->post("usuario");
			$data['password'] = $this->input->post("password");
			$data['cc_usuario'] = $this->input->post("cc_usuario");
			$res = $this->Usuario->insertarUsuario($data);
			if($res>0){
				echo "<script type='text/javascript'>alert('USUARIO REGISTADO CORRECTAMENTE')</script>";
			}else if($res== 0){
				echo "<script type='text/javascript'>alert('DOCUMENTO DE IDENTIDAD REGISTRADO ANTERIORMENTE')</script>";
			}else if($res == -1){
				echo "<script type='text/javascript'>alert('EL NOMBRE DE USUARIO SE ENCUENTRA EN USO')</script>";
			}
		}
	}
}
