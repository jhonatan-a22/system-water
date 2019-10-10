<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $privilegios;
	public function __construct(){
		parent::__construct();
		$this->privilegios = $this->backend_lib->control();
		$this->load->model("Usuarios_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index(){
		$data = array('usuarios' => $this->Usuarios_model->getUsers(), 'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/usuarios/usuarios", $data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
					'roles' => $this->Usuarios_model->getRoles(), 
					'sectores' => $this->Usuarios_model->getSectores(),);
		$this->load->view("layouts/header");
		$this->load->view("content/usuarios/usuariosadd", $data);
		$this->load->view("layouts/footer");
	}

	public function register(){
		$nombres = ucwords($this->input->post("nombres"));
		$apellidos = ucwords($this->input->post("apellidos"));
		$direccion = $this->input->post("direccion");
		$provincia = ucwords($this->input->post("provincia"));
		$id_sectores = $this->input->post("id_sectores");
		$telefono = $this->input->post("telefono");
		$usuario = $this->input->post("usuario");
		$clave = $this->input->post("clave");
		$rclave = $this->input->post("rclave");
		$id_roles = $this->input->post("id_roles");
		$regante = $this->input->post("regante");

		$this->form_validation->set_rules("nombres", "nombres", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("apellidos", "apellidos", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("direccion", "direccion", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("provincia", "provincia", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("id_sectores", "sector", "required");
		$this->form_validation->set_rules("telefono", "celular", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("usuario", "usuario", "required|is_unique[usuarios.usuario]|min_length[4]");
		$this->form_validation->set_rules("clave", "clave", "required|min_length[4]|matches[rclave]");
		$this->form_validation->set_rules("rclave", "confirmar clave", "required|min_length[4]");
		$this->form_validation->set_rules("id_roles", "tipo de usuario", "required");
		
		if ($this->form_validation->run()) {
			$data = array('nombres' => $nombres, 'apellidos' => $apellidos, 'direccion' => $direccion, 'provincia' => $provincia, 'id_sectores' => $id_sectores, 'telefono' => $telefono, 'usuario' => $usuario, 'clave' => sha1($clave), 'estatus' => 1, 'id_roles' =>$id_roles, 'regante' =>$regante);
			if ($this->Usuarios_model->save($data)) {
				$this->session->set_flashdata("success"," Registro realizado exitosamente.");
				redirect(base_url()."Usuarios");
			}
		}else{
			$this->add();
		}	
	}

	public function edit($id){
		$data = array(
					'roles' => $this->Usuarios_model->getRoles(), 
					'sectores' => $this->Usuarios_model->getSectores(),
					'usuario' => $this->Usuarios_model->getUsuario($id),);
		$this->load->view("layouts/header");
		$this->load->view("content/usuarios/usuariosedit", $data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$usuarioId = $this->input->post("usuarioId");
		$nombres = ucwords($this->input->post("nombres"));
		$apellidos = ucwords($this->input->post("apellidos"));
		$direccion = $this->input->post("direccion");
		$provincia = ucwords($this->input->post("provincia"));
		$id_sectores = $this->input->post("id_sectores");
		$telefono = $this->input->post("telefono");
		$usuario = $this->input->post("usuario");
		$pass = $this->input->post("pass");
		if ($pass == 1) {
			$clave = $this->input->post("clave");
			$rclave = $this->input->post("rclave");
		}
		
		$id_roles = $this->input->post("id_roles");
		$regante = $this->input->post("regante");


		$usuarioActual = $this->Usuarios_model->getUsuario($usuarioId);
		if ($usuario == $usuarioActual->usuario) {
			$is_unique = '';
		}else{
			$is_unique = '|is_unique[usuarios.usuario]';
		}

		$this->form_validation->set_rules("nombres", "nombres", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("apellidos", "apellidos", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("direccion", "direccion", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("provincia", "provincia", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("id_sectores", "sector", "required");
		$this->form_validation->set_rules("telefono", "celular", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("usuario", "usuario", "required".$is_unique);
		if ($pass == 1) {
			$this->form_validation->set_rules("clave", "clave", "required|min_length[4]|matches[rclave]");
			$this->form_validation->set_rules("rclave", "confirmar clave", "required|min_length[4]");
		}
		$this->form_validation->set_rules("id_roles", "tipo de usuario", "required");

		if ($this->form_validation->run()) {
			if ($pass == 1) {
			$data = array('nombres' => $nombres, 'apellidos' => $apellidos, 'direccion' => $direccion, 'provincia' => $provincia, 'id_sectores' => $id_sectores, 'telefono' => $telefono, 'usuario' => $usuario, 'clave' => sha1($clave), 'estatus' => 1, 'id_roles' =>$id_roles, 'regante' =>$regante);
			} else {
			$data = array('nombres' => $nombres, 'apellidos' => $apellidos, 'direccion' => $direccion, 'provincia' => $provincia, 'id_sectores' => $id_sectores, 'telefono' => $telefono, 'usuario' => $usuario, 'estatus' => 1, 'id_roles' =>$id_roles, 'regante' =>$regante);
			}
			if ($this->Usuarios_model->update($usuarioId, $data)) {
				$this->session->set_flashdata("success"," Modificacion realizado exitosamente.");
				redirect(base_url()."Usuarios");
			}
		}else{
			$this->edit($usuarioId);
		}
	}


	public function delete($id){
		$data = array('estatus' => 0);
		if ($this->Usuarios_model->update($id, $data)) {
			redirect(base_url()."Usuarios");
		}
	}



}

