<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {
	
	public function index()
	{
		$lista=$this->venta_model->listaventas();
		$data['ventas']=$lista;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/sidebarsbadmin');		
		 
		$this->load->view('listaVenta',$data);
		$this->load->view('inc/creditossbadmin'); 		
		$this->load->view('inc/footersbadmin');

		/*$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('listaP',$data); // lista de la tabla
		$this->load->view('inc/footer'); // pie de la tabla */
	}
	public function agregar()
	{
		$lista=$this->cliente_model->listaClientes();
		$data['cli']=$lista;

		$listau=$this->usuario_model->listaUsuarios();
		$data['usu']=$listau;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/sidebarsbadmin');		
		 
		$this->load->view('formularioVenta',$data);		
		$this->load->view('inc/creditossbadmin'); 		
		$this->load->view('inc/footersbadmin');
		/*$this->load->view('inc/header');
		$this->load->view('formularioP');
		$this->load->view('inc/footer');*/
	}

	public function agregarbd()
	{
		//-----BDD tabla-------formularioP.php		
		$data['fechaVenta']=$_POST['Fecha'];
		$data['total']=$_POST['Total'];
		$data['idCliente']=$_POST['idCliente'];
		$data['idUsuario']=$_POST['idUsuario'];

		//$data['fechaRegistro']=$_POST['FechaRegistro'];
		//$data['fechaActualizacion']=$_POST['FechaActualizacion'];

		$lista=$this->venta_model->agregarventa($data);
		redirect('venta/index','refresh');
	}
	public function modificar()
	{
		//-----BDD tabla-------formulario.php
		$idventa=$_POST['idventa'];		
		$data['infoventa']=$this->venta_model->recuperarventa($idventa);

		$lista=$this->cliente_model->listaClientes();
		$data['cli']=$lista;

		$listau=$this->usuario_model->listaUsuarios();
		$data['usu']=$listau;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/sidebarsbadmin');		
		 
		$this->load->view('formulariomodificarVenta',$data);		
		$this->load->view('inc/creditossbadmin'); 		
		$this->load->view('inc/footersbadmin');
		
		/* $this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificarP',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla */
	}

	public function modificarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['fechaVenta']=$_POST['Fecha'];
		$data['total']=$_POST['Total'];
		$data['idCliente']=$_POST['idCliente'];
		$data['idUsuario']=$_POST['idUsuario'];

		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/index','refresh'); // cargamos la lista	
	}
	public function deshabilitarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/index','refresh'); // cargamos la lista	
	}
	// lista de productos deshabilitados
	public function deshabilitados()
	{
		$lista=$this->venta_model->listaventasdeshabilitados();
		$data['ventas']=$lista; // array relacional de tabla productos

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/sidebarsbadmin');		
		 
		$this->load->view('listadeshabilitadosVentas',$data);		
		$this->load->view('inc/creditossbadmin'); 		
		$this->load->view('inc/footersbadmin');

		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitadosP',$data); // 
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/deshabilitados','refresh'); // cargamos la lista	
	}
	// ---------- hasta aqui-------------------------------
}