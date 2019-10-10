<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	private $privilegios;
	public function __construct(){
		parent::__construct();
		$this->privilegios = $this->backend_lib->control();
		$this->load->model("Inicio_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index(){
		$sesion = $this->session->userdata("id");

		$data = array(
					'facturas' => $this->Inicio_model->getFacturas($sesion),
					'medidor' => $this->Inicio_model->getMedidor($sesion), 
					'cantadeudo' => $this->Inicio_model->getAdeudo($sesion), 
					'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/inicio", $data);
		$this->load->view("layouts/footer");
	}

	public function perfil(){
		$sesion = $this->session->userdata("id");

		$data = array(
					'usuario' => $this->Inicio_model->getUsuario($sesion), );
		$this->load->view("layouts/header");
		$this->load->view("content/perfil", $data);
		$this->load->view("layouts/footer");
	}



}