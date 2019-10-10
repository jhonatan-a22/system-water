<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {

	public function getFacturas($id){

		$this->db->where('id_usuarios', $id);
		$this->db->order_by('id', 'asc');
		$resultados =$this->db->get('detalle');
		return $resultados->result();
	}

	public function getMedidor($id){
		$this->db->where("id_usuarios", $id);
		$resultado = $this->db->get('medidores');
		return $resultado->row();
	}

	public function getAdeudo($id){
		$this->db->select("COUNT(id) as cant");
		$this->db->from("detalle");
		$this->db->where("id_usuarios", $id);
		$this->db->where("status", 0);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getUsuario($id){
		$this->db->select("u.*, s.sector as sector, r.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("sectores s", "u.id_sectores=s.id");
		$this->db->join("roles r", "u.id_roles=r.id");
		$this->db->where("u.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}







}
