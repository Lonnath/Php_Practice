<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {
	
    public $personas = "Personas";
    public $personas_id = "cc_usuario";
	function __construct(){
	}

    function find($reference){
        $this->db->select();
        $this->db->from($this->personas);
        $this->db->where($this->personas_id, $reference);
        $consulta = $this->db->get();
        return $consulta->row();
    }
    function findAll(){
        $this->db->select();
        $this->db->from($this->personas);
        $consulta = $this->db->get();
        return $consulta->result();
    }
    function insertarPersona($data){
        $consulta = $this->find($data);
        if($consulta==NULL){
            $datos['cc_usuario'] = $data;
            $res =$this->db->insert($this->personas,$datos);
            return $res;
            
        }else return NULL;
    }
    function actualizarPersona($identificador, $datos){
        $this->db->set("nombre_usuario", "apellido_usuario", "email");
        $this->db->where($this->personas_id, $identificador);
        $this->db->update($this->personas, $datos);
    }
    
    function eliminarPersona($identificador){
        $this->db->where($this->personas_id, $identificador);
        $this->db->delete($this->personas);
    }
}