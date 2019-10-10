<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redireccion extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index(){
		$this->load->view("layouts/header");
		$this->load->view("content/redireccion");
		$this->load->view("layouts/footer");
	}


}