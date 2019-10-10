<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectores_model extends CI_Model {

	public function getSectores(){
		$this->db->where("status", 1);
		$resultado = $this->db->get("sectores");
		return $resultado->result();
	}

	public function save($data){
		return $this->db->insert("sectores", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("sectores", $data);
	}

	public function getSector($id){
		$this->db->where("id", $id);
		$this->db->where("status", 1);
		$resultado = $this->db->get("sectores");
		return $resultado->row();
	}


}
