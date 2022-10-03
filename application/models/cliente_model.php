<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_model extends CI_model {

	public function listaClientes()
	{
		$this->db->select('*');         //select *
        $this->db->from('cliente');
		$this->db->where('estado','1');    	//tabla
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarCliente($data)
	{
		$this->db->insert('cliente',$data);       //devolucion de resultado de la consulta
	}
	
	
	public function eliminarCliente($idCliente)
	{
		$this->db->where('idCliente',$idCliente);        
        $this->db->delete('cliente'); 
	} 



	public function recuperarCliente($idCliente)
	{
		$this->db->select('*');         //select *
        $this->db->from('cliente');    	//tabla
        $this->db->where('idCliente',$idCliente);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarCliente($idCliente,$data)
	{
		$this->db->where('idCliente',$idCliente);
		$this->db->update('cliente',$data);        
	}

	public function listaClientedeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('cliente'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}
}
