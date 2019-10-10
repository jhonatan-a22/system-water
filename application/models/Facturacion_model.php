<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion_model extends CI_Model {

	public function getPrecios(){
		$resultado = $this->db->get("precios");
		return $resultado->row();
	}

	public function savep($data){
		$this->db->where("id", 1);
		return $this->db->update("precios", $data);
	}

	public function getFacturacion(){
		$this->db->select("d.*, CONCAT(nombres,' ',apellidos) as nombres, m.medidor as medidor");
		$this->db->from("detalle d");
		$this->db->join("usuarios u", "d.id_usuarios=u.id");
		$this->db->join("medidores m", "d.id_medidores=m.id");
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getUsuario($ci){
		$this->db->where("usuario", $ci);
		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function getFacturausuario($ci){
		$this->db->select("d.*");
		$this->db->from("detalle d");
		$this->db->join("usuarios u", "d.id_usuarios=u.id");
		$this->db->join("medidores m", "d.id_medidores=m.id");
		$this->db->where("u.usuario", $ci);
		$this->db->where("d.status", 0);
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getMedidor($ci){
		$this->db->select("m.*, CONCAT(nombres,' ',apellidos) as nombres, u.usuario as ci, u.direccion as direccion, u.regante as regante, u.regante as regante");
		$this->db->from("medidores m");
		$this->db->join("usuarios u", "m.id_usuarios=u.id");
		$this->db->where("u.usuario", $ci);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save($data){
		return $this->db->insert("detalle", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("detalle", $data);
	}

	public function getPagar($id){
		$this->db->select("d.*, CONCAT(nombres,' ',apellidos) as nombres, m.medidor as medidor, u.regante as regante, u.usuario as ci");
		$this->db->from("detalle d");
		$this->db->join("usuarios u", "d.id_usuarios=u.id");
		$this->db->join("medidores m", "d.id_medidores=m.id");
		$this->db->where("d.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getCorrelativo(){
		$this->db->order_by("id", "desc");
		$this->db->limit(null,null);
		$resultado = $this->db->get('factura');
		return $resultado->row();
	}

	public function factura($data){
		return $this->db->insert("factura", $data);
	}





}
