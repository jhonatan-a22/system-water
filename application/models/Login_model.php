<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($usuario, $clave){
		$this->db->where("usuario", $usuario);
		$this->db->where("clave", $clave);
		$this->db->where("estatus", 1);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function historial($data){
		return $this->db->insert("log", $data);
	}
}
