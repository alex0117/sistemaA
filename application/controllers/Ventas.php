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



public function buscarCliente()
{	

$datas=array();


$query2=$this->input->get('query2',TRUE);


if ($query2) {
	$result=$this->venta_model->buscarC(trim($query2));
	if ($resulta!=FALSE) {
		$datas=array('resulta'=>$result);
	}else {
		$datas=array('resulta'=>'');
	}
}
else {
	$datas=array('resulta'=>'');
}

$this->load->view('inc/headersbadmin');
			
$this->load->view('inc/Sidebarsbadmin');

$this->load->view('realizarVenta',$datas);

$this->load->view('inc/creditos');

$this->load->view('inc/footersbadmin');

}





}