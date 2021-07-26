<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Model {
	
    public $noticias = "noticias";
    public $noticias_id = "id";
	function __construct(){
	}

    function find($reference){
        $this->db->select();
        $this->db->from($this->noticias);
        $this->db->where($this->noticias_id, $reference);
        $consulta = $this->db->get();
        return $consulta->row();
    }
    function findAll(){
        $this->db->select();
        $this->db->from($this->noticias);
        $consulta = $this->db->get();
        return $consulta->result();
    }
	function findPrincipal(){
        $this->db->select();
        $this->db->from($this->noticias);
        $this->db->limit(3);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    function insertarNoticia($data){
        $res =$this->db->insert($this->noticias,$data);
        return $res;
    }
    function actualizarNoticia($identificador, $datos){
        $this->db->set("titulo", "descripcion", "cc_autor", "fecha_publicacion", "img_url", "validado","relevante");
        $this->db->where($this->noticias_id, $identificador);
        $this->db->update($this->noticias, $datos);
    }
    function eliminar($id){
        $this->db->where($this->noticias_id, $id);
        $this->db->delete($this->noticias);
    }
}
