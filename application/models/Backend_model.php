<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("modulos");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("id_modulos",$menu);
		$this->db->where("id_roles",$rol);
		$resultado = $this->db->get("privilegios");
		return $resultado->row();
	}
	
	
}