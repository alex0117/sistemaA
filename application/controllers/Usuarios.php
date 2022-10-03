<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if ($this->session->userdata('login')) 
		{
			redirect('Usuarios/panel','refresh');
		}
		else
		{
			$this->load->view('inc/headerLog');
			$this->load->view('login',$data);
			$this->load->view('inc/footerLog');
		}
	}
	public function validar()
	{
		$login=$_POST["login"];
		$password = md5($_POST["password"]);

		$consulta=$this->usuario_model->validar($login,$password);

		if ($consulta->num_rows()>0) 
		{
			foreach ($consulta->result() as $row)
			{
				$this->session->set_userdata('idempleado',$row->idEmpleado);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('Usuarios/panel','refresh');
			}
		}
		else 
		{
			redirect('Usuarios/index/2','refresh');
		}
		
	}
	public function panel()
	{

		if ($this->session->userdata('login')) 
		{
			if($this->session->userdata('tipo')=='admin')
			{
				redirect('Productos/index','refresh');
			}
			else
			{
				redirect('Productos/empleado','refresh');
			}

		}
		else
		{
			redirect('Usuarios/index/3','refresh');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Usuarios/index/1','refresh');
	}



	public function vender()
    {
        //-----BDD tabla-------formulario.php
        $data['infoclientes']=$this->usuario_model->listaClientes();
        $data['infousuarios']=$this->usuario_model->listaUsers();
		$data['infoproductos']=$this->usuario_model->listaProductos();

        $this->load->view('inc/headersbadmin'); // archivos de cabecera
        $this->load->view('inc/sidebarsbadmin');       
        $this->load->view('venderform',$data);        // contenido
        $this->load->view('inc/creditos');      
        $this->load->view('inc/footersbadmin'); // archivos de pie
    }
    public function venderbd()
    {
        //-----BDD tabla-------formulario.php
        $data['nombre']=$_POST['nombre'];
        $data['apellidoPaterno']=$_POST['apellidoPaterno'];
        $data['telefono']=$_POST['telefono'];
        $idCliente=$_POST['idCliente'];
        $idEmpleado=$_POST['idEmpleado'];

        $this->usuario_model->venderUser($idCliente,$idUsuario,$data);
        redirect('usuarios/index1','refresh');
    }

}