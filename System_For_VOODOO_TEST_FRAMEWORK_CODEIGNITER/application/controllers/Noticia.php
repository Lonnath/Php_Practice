<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("form");
	}
    
	public function index(){
		$this->load->view('noticias_modificar');
	}
	public function modificar($id){
        session_start();
		$this->load->model("Noticias");
		$datos['noticia_editar'] = $this->Noticias->find($id);
		$this->load->view('noticias_modificar', $datos);
		if($this->input->server("REQUEST_METHOD")=="POST"){
			$data['titulo'] = $this->input->post("titulo");
			$data['descripcion'] = $this->input->post("descripcion");
			$data['cc_autor'] = $this->input->post("cc_autor");
			$data['validado'] = $this->input->post("validado");
			$data['img_url'] = $this->input->post("imagen");
			$data['relevante'] = $this->input->post("relevante");
			$data['fecha_publicacion'] = $this->input->post("fecha");
			$this->Noticias->actualizarNoticia($id, $data);
			header("Location: ../pagina_principal");
		}
	}
    public function eliminar($id){
        if(!isset($id)){
            show_404();
        }
        $this->load->model("Noticias");
        $this->Noticias->eliminar($id);
        header("Location: ../pagina_principal");

    }
	public function insertar(){
        session_start();
		$this->load->model("Noticias");
		$this->load->view('noticias_insertar');
		if($this->input->server("REQUEST_METHOD")=="POST"){
			$data['titulo'] = $this->input->post("titulo");
			$data['descripcion'] = $this->input->post("descripcion");
			$data['cc_autor'] = $this->input->post("cc_autor");
			$data['validado'] = $this->input->post("validado");
			$data['img_url'] = $this->input->post("imagen");
			if($this->input->post("relevante")==NULL){
				$data['relevante'] = 0;
			}else $data['relevante'] = $this->input->post("relevante");
			$data['fecha_publicacion'] = $this->input->post("fecha");
			$this->Noticias->insertarNoticia($data);
			header("Location: pagina_principal");
		}
	}
    
}
