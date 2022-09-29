<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('tipo')=='admin')
		{
		$realizarVenta=$this->venta_model->realizarVenta();
		$data['cliente']=$realizarVenta;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('realizarVenta',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
		}
		else{
			redirect('Usuarios/panel','refresh');
		}	
}	

public function buscarProducto()
{	
	$data=array();


	$query=$this->input->get('query',TRUE);
	

	if ($query) {
		$result=$this->venta_model->buscar(trim($query));
		if ($result!=FALSE) {
			$data=array('result'=>$result);
		}else {
			$data=array('result'=>'');
		}
	}
	else {
		$data=array('result'=>'');
	}

	$this->load->view('inc/headersbadmin');
			
	$this->load->view('inc/Sidebarsbadmin');

	$this->load->view('realizarVenta',$data);

	$this->load->view('inc/creditos');

	$this->load->view('inc/footersbadmin');
}
}