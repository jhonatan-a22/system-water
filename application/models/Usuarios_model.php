<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function getUsers(){
		$this->db->select("u.*, r.nombre as rol, s.sector as sector");
		$this->db->from("usuarios u");
		$this->db->join("roles r", "u.id_roles=r.id");
		$this->db->join("sectores s", "u.id_sectores=s.id");
		$this->db->where("u.estatus", 1);
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getRoles(){
		$this->db->order_by("id", "asc");
		$resultado = $this->db->get("roles");
		return $resultado->result();
	}
	public function getSectores(){
		$this->db->where("status", 1);
		$this->db->order_by("id", "asc");
		$resultado = $this->db->get("sectores");
		return $resultado->result();
	}

	public function save($data){
		return $this->db->insert("usuarios", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("usuarios", $data);
	}

	public function getUsuario($id){
		$this->db->select("u.*, r.nombre as rol, s.sector as sector");
		$this->db->from("usuarios u");
		$this->db->join("roles r", "u.id_roles=r.id");
		$this->db->join("sectores s", "u.id_sectores=s.id");
		$this->db->where("u.id", $id);
		$this->db->where("u.estatus", 1);
		$resultado =$this->db->get();
		return $resultado->row();
	}


}
