<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Empleados extends CI_Controller {

	public function index()
	{
		$listaEmpleados=$this->empleado_model->listaEmpleados();
		$data['empleados']=$listaEmpleados;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('listaEmpleados',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function listaxlsx()
	{
		$lista=$this->empleado_model->listaEmpleados();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaempleados.xlsx"');
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
			$sheet->setCellValue('A'.$sn,$row->idEmpleado);
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
		$listaEmpleados=$this->empleado_model->listaEmpleados();
		$data['empleados']=$listaEmpleados;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('formulario1');

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
		$data['tipo']=$_POST['tipo'];
		$data['login']=$_POST['login'];
		$data['password']=md5($_POST['password']);
		$listaEmpleados=$this->empleado_model->agregarempleado($data);
		redirect('Empleados/index','refresh');
	}

	public function eliminarbd()
	{
		$idEmpleado=$_POST['idEmpleado'];
		$this->empleado_model->eliminarempleado($idEmpleado);
		redirect('Empleados/index','refresh');
	}

	public function modificar()
	{
		$idEmpleado=$_POST['idEmpleado'];
		$data['infoempleado']=$this->empleado_model->recuperarempleado($idEmpleado);
		
		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');
		
		$this->load->view('formulariomodificar',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idEmpleado=$_POST['idEmpleado'];
		$data['nombre']=$_POST['nombre'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['tipo']=$_POST['tipo'];
		$data['login']=$_POST['login'];
		$data['password']=md5($_POST['password']);
		
	
		$nombrearchivo=$idEmpleado.".jpg";
		$config['upload_path']='./uploads2';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads2/".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
		}
		else {
			$data['imagen']=$nombrearchivo;
			$this->upload->data();
		}


		$this->empleado_model->modificarempleado($idEmpleado,$data);
		redirect('Empleados/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idEmpleado=$_POST['idEmpleado'];
		$data['estado']='0';

		$this->empleado_model->modificarempleado($idEmpleado,$data);
		redirect('Empleados/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaEmpleados=$this->empleado_model->listaEmpleadosdeshabilitados();
		$data['empleados']=$listaEmpleados;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('listadeshabilitados',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idEmpleado=$_POST['idEmpleado'];
		$data['estado']='1';

		$this->empleado_model->modificarempleado($idEmpleado,$data);
		redirect('Empleados/deshabilitados','refresh');
	
	}
}
