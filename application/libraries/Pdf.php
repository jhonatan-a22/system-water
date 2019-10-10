<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image(base_url().'vendors/images/admin-text-dark.png',13,14,0);
            $this->SetFont('Arial','B',25);
            $this->Cell(0,14,'FACTURA DE PAGO',0,0,'C');
            $this->Ln(20);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',6);
           $this->Cell(0,5,'"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"',0,0,'C');
           $this->Ln(5);
           $this->Cell(0,5,'Ley No 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.',0,0,'C');
      }
    }
?>