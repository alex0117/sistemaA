<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Productos extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('tipo')=='admin')
			{
				$lista=$this->producto_model->listaProducto();
				$data['producto']=$lista;

				$this->load->view('inc/headersbadmin');
				
				$this->load->view('inc/Sidebarsbadmin');

				$this->load->view('lista',$data);
				
				$this->load->view('inc/creditos');

				$this->load->view('inc/footersbadmin');
			}
		else{
			redirect('Usuarios/panel','refresh');
		}	
	}
	public function listaxlsx()
	{
		$lista=$this->producto_model->listaProducto();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaproductos.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Codigo');
		$sheet->setCellValue('C1', 'Nombre');
		$sheet->setCellValue('D1', 'Descripcion');
		$sheet->setCellValue('E1', 'Saldo');
		$sheet->setCellValue('F1', 'Imagen');
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idProducto);
			$sheet->setCellValue('B'.$sn,$row->codigo);
			$sheet->setCellValue('C'.$sn,$row->nombre);
			$sheet->setCellValue('D'.$sn,$row->descripcion);
			$sheet->setCellValue('E'.$sn,$row->saldo);
			$sheet->setCellValue('F'.$sn,$row->imagen);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$lista=$this->producto_model->listaProducto();
		$data['producto']=$lista;

		$this->load->view('inc/headersbadmin');
				
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('formulario');

		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['codigo']=$_POST['codigo'];
		$data['nombre']=$_POST['nombre'];
		$data['descripcion']=$_POST['descripcion'];
		$data['saldo']=$_POST['saldo'];
		$lista=$this->producto_model->agregarproducto($data);

		if($this->session->userdata('tipo')=='admin')
			{	
				redirect('Productos/index','refresh');
			}
			else
			{
				redirect('Productos/empleado','refresh');
			}

	}

	public function eliminarbd()
	{
		
		$idProducto=$_POST['idProducto'];
		$this->producto_model->eliminarproducto($idProducto);
		if($this->session->userdata('tipo')=='admin')
		{
			redirect('Productos/index','refresh');
		}
		else
		{
			redirect('Productos/empleado','refresh');
		}
	}



	public function modificar()
	{
		$idProducto=$_POST['idProducto'];
		$data['infoproducto']=$this->producto_model->recuperarproducto($idProducto);
		
		$this->load->view('inc/headersbadmin');
				
		$this->load->view('inc/Sidebarsbadmin');

		$this->load->view('formulariomodificarproducto',$data);

		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
		
	}
	public function modificarbd()
	{
		$idProducto=$_POST['idProducto'];
		$data['codigo']=$_POST['codigo'];
		$data['nombre']=$_POST['nombre'];
		$data['descripcion']=$_POST['descripcion'];
		$data['saldo']=$_POST['saldo'];

		$nombrearchivo=$idProducto.".jpg";
		$config['upload_path']='./uploads';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads/".$nombrearchivo;
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

		$this->producto_model->modificarproducto($idProducto,$data);
		if($this->session->userdata('tipo')=='admin')
		{
			redirect('Productos/index','refresh');
		}
		else
		{
			redirect('Productos/empleado','refresh');
		}
	}

	public function deshabilitarbd()
	{
		$idProducto=$_POST['idProducto'];
		$data['estado']='0';

		$this->producto_model->modificarproducto($idProducto,$data);

		if($this->session->userdata('tipo')=='admin')
		{
			
			redirect('Productos/index','refresh');
		}
		else
		{
			
			redirect('Productos/empleado','refresh');
		}
	
	}
	
	public function deshabilitados()
	{
		$lista=$this->producto_model->listaproductodeshabilitados();
		$data['producto']=$lista;

		$this->load->view('inc/headersbadmin');
		if($this->session->userdata('tipo')=='admin')
		{
			$this->load->view('inc/Sidebarsbadmin');
		}
		else
		{
			$this->load->view('inc/Sidebarsbadmin2');
		}
		if($this->session->userdata('tipo')=='admin')
		{
			$this->load->view('productosdeshabilitados',$data);
		}
		else
		{
			$this->load->view('productosdeshabilitados2',$data);
		}
		
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idProducto=$_POST['idProducto'];
		$data['estado']='1';

		$this->producto_model->modificarproducto($idProducto,$data);
		if($this->session->userdata('tipo')=='admin')
		{
			
			redirect('Productos/deshabilitados','refresh');
		}
		else
		{
			
			redirect('Productos/deshabilitados','refresh');
		}
	
	}


	public function empleado()
	{
		$lista=$this->producto_model->listaProducto();
		$data['producto']=$lista;

		$this->load->view('inc/headersbadmin');
		
		$this->load->view('inc/Sidebarsbadmin2');

		$this->load->view('lista',$data);
		
		$this->load->view('inc/creditos');

		$this->load->view('inc/footersbadmin');
	}

}