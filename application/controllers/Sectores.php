<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectores extends CI_Controller {

	private $privilegios;
	public function __construct(){
		parent::__construct();
		$this->privilegios = $this->backend_lib->control();
		$this->load->model("Sectores_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index(){
		$data = array('sectores' => $this->Sectores_model->getSectores(), 'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/sectores/sectores", $data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("content/sectores/sectoresadd");
		$this->load->view("layouts/footer");
	}

	public function register(){
		$sector = ucwords($this->input->post("sector"));

		$this->form_validation->set_rules("sector", "sector", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");

		if ($this->form_validation->run()) {
			$data = array('sector' => $sector, 'status' => 1,);
			if ($this->Sectores_model->save($data)) {
				$this->session->set_flashdata("success"," Registro realizado exitosamente.");
				redirect(base_url()."Sectores");
			}
		}else{
			$this->add();
		}	
	}

	public function edit($id){
		$data = array('sector' => $this->Sectores_model->getSector($id), );
		$this->load->view("layouts/header");
		$this->load->view("content/sectores/sectoresedit", $data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$sectorId = $this->input->post("sectorId");
		$sector = ucwords($this->input->post("sector"));

		$this->form_validation->set_rules("sector", "sector", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");

		if ($this->form_validation->run()) {
			$data = array('sector' => $sector, 'status' => 1,);
			if ($this->Sectores_model->update($sectorId, $data)) {
				$this->session->set_flashdata("success"," Modificacion realizado exitosamente.");
				redirect(base_url()."Sectores");
			}
		}else{
			$this->edit($sectorId);
		}	
	}

	public function delete($id){
		$data = array('status' => 0);
		if ($this->Sectores_model->update($id, $data)) {
			redirect(base_url()."Sectores");
		}
	}



}

