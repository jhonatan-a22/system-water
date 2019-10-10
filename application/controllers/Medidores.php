<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidores extends CI_Controller {

	private $privilegios;
	public function __construct(){
		parent::__construct();
		$this->privilegios = $this->backend_lib->control();
		$this->load->model("Medidores_model");
		$this->load->model("Facturacion_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index(){
		$data = array('medidores' => $this->Medidores_model->getMedidores(), 'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/medidores/medidores", $data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array('usuarios' => $this->Medidores_model->getUsuarios(), );
		$this->load->view("layouts/header");
		$this->load->view("content/medidores/medidoresadd", $data);
		$this->load->view("layouts/footer");
	}

	public function register(){
		$medidor = $this->input->post("medidor");
		$id_usuarios = $this->input->post("id_usuarios");
		$lectura = $this->input->post("lectura");
		$estado = $this->input->post("estado");
		$fecha = date("Y-m-d");

		$this->form_validation->set_rules("medidor", "medidor", "required|is_unique[medidores.medidor]|alpha_numeric_spaces");
		$this->form_validation->set_rules("id_usuarios", "afiliado", "required");
		$this->form_validation->set_rules("lectura", "lectura", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("estado", "estado", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
	
		if ($this->form_validation->run()) {
			$data = array('medidor' => $medidor, 'id_usuarios' => $id_usuarios, 'lectura' => $lectura, 'fecha' => $fecha, 'estado' => $estado, 'status' => 1);
			if ($this->Medidores_model->save($data)) {
				$this->session->set_flashdata("success"," Registro realizado exitosamente.");
				redirect(base_url()."Medidores");
			}
		}else{
			$this->add();
		}	
	}

	public function reading($id){
		$data = array(
					'medidor' => $this->Medidores_model->getMedidor($id), 
					'lectura' => $this->Medidores_model->getLectura($id), 
					'precios' => $this->Medidores_model->getPrecios(), );
		$this->load->view("layouts/header");
		$this->load->view("content/medidores/reading", $data);
		$this->load->view("layouts/footer");
	}

	public function readingadd(){
		$id_medidor = $this->input->post("id_medidor");
		$medidor = $this->input->post("medidor");
		$lectura_anterior = $this->input->post("lectura_anterior");
		$lectura_actual = $this->input->post("lectura_actual");
		$observacion = $this->input->post("observacion");
		$id_usuarios = $this->input->post("id_usuarios");
		$fecha_anterior = $this->input->post("fecha_anterior");
		$precioafiliado = $this->input->post("precioafiliado");
		$precioregante = $this->input->post("precioregante");

		$hoy = getdate();
		$periodo = $hoy['month'] .'/'. $hoy['year'];
		$fecha_emision = date("Y-m-d");

		$this->form_validation->set_rules("lectura_actual", "lectura actual", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("observacion", "observacion", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
	
		
		if ($this->form_validation->run()) {
			if ($lectura_actual >= $lectura_anterior) {
				$data = array('id_medidores' => $id_medidor, 'lectura_anterior' => $lectura_anterior, 'lectura_actual' => $lectura_actual, 'fecha_anterior' => $fecha_anterior, 'fecha_actual' => $fecha_emision, 'observacion' => $observacion);

				$importe = (($lectura_actual - $lectura_anterior ) * $precioafiliado);
				$res = $this->Medidores_model->getUsuario($id_usuarios);
				if ($res->regante == 1) {
					$total = $importe + $precioregante;
				} else {
					$total = $importe;
				}
				

				$datafac = array('id_medidores' => $id_medidor, 'l_anterior' => $lectura_anterior, 'l_actual' => $lectura_actual, 'periodo' => $periodo, 'fecha_anterior' => $fecha_anterior, 'fecha_actual' => $fecha_emision, 'id_usuarios' => $id_usuarios, 'fecha_emision' => $fecha_emision, 'importe' => $importe,  'total' => $total, 'status' => 0,);			 
				$this->Facturacion_model->save($datafac);

				if ($this->Medidores_model->saver($data)) {
					$this->session->set_flashdata("success"," Lectura registrada correctamente.");
					redirect(base_url()."Medidores");
				}
			} else {
				$this->session->set_flashdata("error"," Lectura actual es menor a lectura anterior.");
				$this->reading($id_medidor, $medidor);
			}	
		}else{
			$this->reading($id_medidor, $medidor);
		}	
	}

	public function edit($id){
		$data = array(
					'medidor' => $this->Medidores_model->getMedidor($id),
					'lectura' => $this->Medidores_model->getLectura($id), 
					'usuarios' => $this->Medidores_model->getUsuarios(), );
		$this->load->view("layouts/header");
		$this->load->view("content/medidores/medidoresedit", $data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$medidorId = $this->input->post("medidorId");
		$medidor = $this->input->post("medidor");
		$id_usuarios = $this->input->post("id_usuarios");
		$lectura = $this->input->post("lectura");
		$estado = $this->input->post("estado");
		$fecha = date("Y-m-d");

		$medidorActual = $this->Medidores_model->getMedidor($medidorId);
		if ($medidor == $medidorActual->medidor) {
			$is_unique = '';
		}else{
			$is_unique = '|is_unique[medidores.medidor]';
		}

		$this->form_validation->set_rules("medidor", "medidor", "required".$is_unique);
		$this->form_validation->set_rules("id_usuarios", "afiliado", "required");
		$this->form_validation->set_rules("lectura", "lectura", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("estado", "estado", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
	
		if ($this->form_validation->run()) {
			$data = array('medidor' => $medidor, 'id_usuarios' => $id_usuarios, 'lectura' => $lectura, 'fecha' => $fecha, 'estado' => $estado, 'status' => 1);
			if ($this->Medidores_model->update($medidorId, $data)) {
				$this->session->set_flashdata("success"," Modificacion realizado exitosamente.");
				redirect(base_url()."Medidores");
			}
		}else{
			$this->update($medidorId);
		}	
	}

	public function delete($id){
		$data = array('estado' => 0);
		if ($this->Medidores_model->update($id, $data)) {
			redirect(base_url()."Medidores");
		}
	}



}

