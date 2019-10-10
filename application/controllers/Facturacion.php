<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {

	private $privilegios;
	public function __construct(){
		parent::__construct();
		$this->privilegios = $this->backend_lib->control();
		$this->load->library('pdf');
		$this->load->model("Facturacion_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index(){
		$data = array(
					'facturacion' => $this->Facturacion_model->getFacturacion(), 
					'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/facturacion/facturacion", $data);
		$this->load->view("layouts/footer");
	}

	public function precios(){
		$data = array(
					'precios' => $this->Facturacion_model->getPrecios(), 
					'permisos'=>$this->privilegios);
		$this->load->view("layouts/header");
		$this->load->view("content/facturacion/precios", $data);
		$this->load->view("layouts/footer");
	}

	public function registerp(){
		$costoafiliado = $this->input->post("costoafiliado");
		$costoregante = $this->input->post("costoregante");

		$this->form_validation->set_rules("costoafiliado", "costoafiliado", "required|numeric");
		$this->form_validation->set_rules("costoregante", "costoregante", "required|numeric");
		if ($this->form_validation->run()) {

			$data = array('costoafiliado' => $costoafiliado, 'costoregante' => $costoregante);
			if ($this->Facturacion_model->savep($data)) {
				$this->session->set_flashdata("success"," Modificacion realizada con exitosamente.");
				redirect(base_url()."facturacion/precios");
			}
		}else{
			$this->precios();
		}
	}

	public function search(){
		$this->load->view("layouts/header");
		$this->load->view("content/facturacion/pagar");
		$this->load->view("layouts/footer");
	}

	public function searchfactura(){
		if ($this->input->post("pagar")){
			$buscar = $this->input->post("buscar");
			$this->form_validation->set_rules("buscar", "Ingrese C.I. para buscar", "required");
		} else {
			$buscar = $this->session->userdata("usuario");
		}

		if ($this->form_validation->run()) {
			if ($this->Facturacion_model->getUsuario($buscar)) {
				$data = array(
							'facturas' => $this->Facturacion_model->getFacturausuario($buscar), 
							'medidor' => $this->Facturacion_model->getMedidor($buscar), 
							'permisos'=>$this->privilegios);

				$this->load->view("layouts/header");
				$this->load->view("content/facturacion/pagar", $data);
				$this->load->view("layouts/footer");
			} else {
				$this->session->set_flashdata("error"," No existe ningun afiliado con ese C.I.");
				$this->search();
			}
		}else{
			$this->search();
		}	
	}

	public function generarnumero($numero){
	    if ($numero>= 99999 && $numero< 999999) {
	        return ($numero)+1;
	    }
	    if ($numero>= 9999 && $numero< 99999) {
	        return "0" + ($numero)+1;
	    }
	    if ($numero>= 999 && $numero< 9999) {
	        return "00" + ($numero)+1;
	    }
	    if ($numero>= 99 && $numero< 999) {
	        return "000" + ($numero)+1;
	    }
	    if ($numero>= 9 && $numero< 99) {
	        return "0000" + ($numero)+1;
	    }
	    if ($numero < 9 ){
	        return "00000" + ($numero)+1;
	    }
	}


	public function generarfactura($id, $ci){
		$data = array('status' => 1);
		if ($this->Facturacion_model->update($id, $data)) {
			$fechahoy = date("Y-m-d h:i:s");

			$corr = $this->Facturacion_model->getCorrelativo();
			if ($corr) {
				$correlativo = $this->generarnumero($corr->correlativo);
			} else {
				$correlativo = 000001;
			}
			
			$data = array('correlativo' => $correlativo, 'fecha' => $fechahoy, 'id_detalle' => $id);
			$this->Facturacion_model->factura($data);

			$this->pdf = new Pdf();
	        $this->pdf->AddPage("L", "A5");
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetFont('Arial','B',20);
	        $this->pdf->SetTitle("Factura de pago");

	        $this->pdf->SetLeftMargin(10);
	        $this->pdf->SetRightMargin(10);
	        $this->pdf->SetFillColor(200,200,200);
	     
	        $this->pdf->SetFont('Arial', 'B', 12);

	        $factura = $this->Facturacion_model->getPagar($id);
	        $this->pdf->Cell(50,10, utf8_decode('N° MEDIDOR: '.$factura->medidor), 'TBRL',0,'L','0');
	        $this->pdf->Cell(45,10, utf8_decode('C.I.: '.$factura->ci), 'TBRL',0,'C','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,10, utf8_decode('N° FACTURA: '.$correlativo), 'TRL',0,'L','0');
	        $this->pdf->Ln(10);
			$this->pdf->SetX(110);
			$this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Cell(90,10, utf8_decode('Fecha: '.$fechahoy), 'BRL',0,'L','0');
	        $this->pdf->Ln(10);
	        $this->pdf->Cell(95,7, utf8_decode('NOMBRE: '.$factura->nombres), '',0,'L','0');
	        
	        $this->pdf->Ln(7);
	        $this->pdf->Cell(55,7, 'LECTURA ANTERIOR: '.$factura->l_anterior, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'FECHA: ' .$factura->fecha_anterior, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7, utf8_decode('PERIODO: '.$factura->periodo), '',0,'L','0');
	        $this->pdf->Ln(7);
	        $this->pdf->Cell(55,7, 'LECTURA ACTUAL: '.$factura->l_actual, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'FECHA: '.$factura->fecha_actual, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7,'CONSUMO: '.($factura->l_actual-$factura->l_anterior).' m3','',0,'L','0');
	  
	        $this->pdf->Ln(15);
	        $this->pdf->SetFont('Arial', 'B', 10);
	        $this->pdf->Cell(15,7,'#','TBL',0,'C','1');
	        $this->pdf->Cell(100,7,'CONCEPTOS','TBRL',0,'C','1');
	        $this->pdf->Cell(40,7,'CONSUMO','TBRL',0,'C','1');
	        $this->pdf->Cell(35,7,'TOTAL','TBRL',0,'C','1');
	        
	        $this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Ln(8);
	        $this->pdf->Cell(15,7,'1','',0,'C','0');
	        $this->pdf->Cell(100,7,'Consumo de agua','',0,'L','0');
	        $this->pdf->Cell(40,7, ($factura->l_actual-$factura->l_anterior).' m3', '',0,'C','0');
	        $this->pdf->Cell(35,7, $factura->importe, '',0,'C','0');

	        if ($factura->regante == 1) {
	        	$this->pdf->Ln(7);
		        $this->pdf->Cell(15,7,'2','',0,'C','0');
		        $this->pdf->Cell(100,7,'Consumo de agua para riego','',0,'L','0');
		        $this->pdf->Cell(40,7,'1 Hr','',0,'C','0');
		        $this->pdf->Cell(35,7,'10','',0,'C','0');
	        }
				
	        $this->pdf->Ln(15);
	        $this->pdf->SetX(165);
	        $this->pdf->Cell(35,0,'','T',0,'C','0');
	        $this->pdf->Ln(3);
	        $this->pdf->SetX(165);
	        $this->pdf->SetFont('Arial', 'B', 12);
	        $this->pdf->Cell(35,10,'Total: ' .$factura->total .' Bs', 'TBRL',0,'L','0');

	        $this->pdf->Output('I', 'factura.pdf');

	        $data = array('usuario' => $ci);
			$this->session->set_userdata($data);
			$this->searchfactura();
		} else {
			
		}
		

		
	}








}

