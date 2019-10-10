<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidores_model extends CI_Model {

	public function getMedidores(){
		$this->db->select("m.*, CONCAT(nombres,' ',apellidos) as nombres");
		$this->db->from("medidores m");
		$this->db->join("usuarios u", "m.id_usuarios=u.id");
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getUsuarios(){
		$this->db->where("estatus", 1);
		$resultados =$this->db->get("usuarios");
		return $resultados->result();
	}

	public function getMedidor($id){
		$this->db->select("m.*, CONCAT(nombres,' ',apellidos) as nombres, u.id as uid");
		$this->db->from("medidores m");
		$this->db->join("usuarios u", "m.id_usuarios=u.id");
		$this->db->where("m.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save($data){
		return $this->db->insert("medidores", $data);
	}

	public function getLectura($medidor){
		$this->db->select("l.*, m.lectura as lectura");
	    $this->db->from("lecturas l");
	    $this->db->join("medidores m", "l.id_medidores = m.id");
	    $this->db->where("l.id_medidores", $medidor);
	    $this->db->order_by('id', "desc");
	    $this->db->limit(1);
	    $resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function saver($data){
		return $this->db->insert("lecturas", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("medidores", $data);
	}

	public function getPrecios(){
		$resultado =$this->db->get("precios");
		return $resultado->row();
	}

	public function getUsuario($id){
		$this->db->where("id", $id);
	    $resultado = $this->db->get('usuarios');
		return $resultado->row();
	}


}
