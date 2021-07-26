<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {
	
    public $usuarios = "usuarios";
    public $usuarios_id = "user_name";
	function __construct(){
	}

    function find($reference){
        $this->db->select();
        $this->db->from($this->usuarios);
        $this->db->where($this->usuarios_id, $reference);
        $consulta = $this->db->get();
        return $consulta->row();
    }
    function findAll(){
        $this->db->select();
        $this->db->from($this->usuarios);
        $consulta = $this->db->get();
        return $consulta->result();
    }
    function insertarUsuario($data){
        $consulta = $this->find($data['user_name']);
        if($consulta==NULL){
            $this->load->model('Persona');
            $personaInsert = $this->Persona->insertarPersona($data['cc_usuario']);
            if($personaInsert){
                $this->db->insert($this->usuarios,$data);
                return $this->db->insert_id();
            }else return 0;
        }else return -1;
    }
    function getLogin($peticionParametro){
        $this->db->select();
        $this->db->from($this->usuarios);
        $this->db->where("user_name, password",$peticionParametro);
        $consulta = $this->db->get();
        return $consulta->row();
    }
    function eliminarUsuario($identificador){
        $this->db->where($this->usuarios_id, $identificador);
        $this->db->delete($this->usuarios);
    }
}