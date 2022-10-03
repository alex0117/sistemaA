<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cliente extends CI_Controller {

	public function index()
	{
		$listaClientes=$this->cliente_model->listaClientes();
		$data['clientes']=$listaClientes;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('listaCliente',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function listaxlsx()
	{
		$lista=$this->cliente_model->listaClientes();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaClientes.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Apellido paterno');
		$sheet->setCellValue('D1', 'Apellido materno');
		$sheet->setCellValue('E1', 'Ci');
		$sheet->setCellValue('F1', 'Telefono');
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idCliente);
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->apellidoPaterno);
			$sheet->setCellValue('D'.$sn,$row->apellidoMaterno);
			$sheet->setCellValue('E'.$sn,$row->ci);
			$sheet->setCellValue('F'.$sn,$row->telefono);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaClientes=$this->cliente_model->listaClientes();
		$data['clientes']=$listaClientes;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('formularioC');

		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$listaClientes=$this->cliente_model->agregarcliente($data);
		redirect('cliente/index','refresh');
	}

	public function eliminarbd()
	{
		$idCliente=$_POST['idCliente'];
		$this->cliente_model->eliminarcliente($idCliente);
		redirect('cliente/index','refresh');
	}

	public function modificar()
	{
		$idCliente=$_POST['idCliente'];
		$data['infocliente']=$this->cliente_model->recuperarcliente($idCliente);
		
		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');
		
		$this->load->view('formulariomodificar',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idCliente=$_POST['idCliente'];
		$data['nombre']=$_POST['nombre'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['tipo']=$_POST['tipo'];
		$data['login']=$_POST['login'];
		$data['password']=md5($_POST['password']);
		
	
		//$nombrearchivo=$idCliente.".jpg";
		//$config['upload_path']='./uploads2';
		//$config['file_name']=$nombrearchivo;
		//$direccion="./uploads2/".$nombrearchivo;
		//if (file_exists($direccion)) {
		//	unlink($direccion);
		//}
		

		//$config['allowed_types']='jpg';
		//$this->load->library('upload',$config);

		//if (!$this->upload->do_upload()) {
		//	$data['error']=$this->upload->display_errors();
		//}
		//else {
		//	$data['imagen']=$nombrearchivo;
		//	$this->upload->data();
		//}


		$this->cliente_model->modificarcliente($idCliente,$data);
		redirect('cliente/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idCliente=$_POST['idCliente'];
		$data['estado']='0';

		$this->cliente_model->modificarcliente($idCliente,$data);
		redirect('cliente/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaClientes=$this->cliente_model->listaClientesdeshabilitados();
		$data['cliente']=$listaClientes;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('listadeshabilitados',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idCliente=$_POST['idCliente'];
		$data['estado']='1';

		$this->cliente_model->modificarcliente($idCliente,$data);
		redirect('cliente/deshabilitados','refresh');
	
	}
}
