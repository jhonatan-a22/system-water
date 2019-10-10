<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_model");
	}
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url()."inicio");
		}
		else{
			$this->load->view("content/login");
		}
	}

	public function login(){
		$usuario = $this->input->post("usuario");
		$clave = $this->input->post("clave");
		$res = $this->Login_model->login($usuario, sha1($clave));

		if (!$res) {
			$this->session->set_flashdata("error"," El usuario y/o contraseña son incorrectos");
			redirect(base_url());
		} else {
			$data = array(
				'id' => $res->id, 
				'nombres' => $res->nombres,
				'apellidos' => $res->apellidos,
				'direccion' => $res->direccion,
				'usuario' => $res->usuario,
				'rol' => $res->id_roles,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."inicio");


			$fechahoy = date("Y-m-d h:i:s");
			$log =  array('id_usuarios' => $res->id, 'fecha' => $fechahoy);
			$this->Login_model->historial($log);


			$email = 'administrador@gmail.com';
			$titulo = "Sistema OTB Maica";
			$mail = "Estimado/a.</b><br><br>El afiliado " . $res->nombres . " " . $res->apellidos . ", ingreso al sistema en fecha/hora: " . $fechahoy  . " <br><br> Atentamente, <br> Sistema OTB Maica.";

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: < soportemedios@hotmail.com >\r\n";

			mail($email, $titulo, $mail, $headers);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
