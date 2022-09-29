<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_model {

	public function listaEmpleados()
	{
		$this->db->select('*');         //select *
        $this->db->from('empleado'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarempleado($data)
	{
		$this->db->insert('empleado',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarempleado($idEmpleado)
	{
		$this->db->where('idEmpleado',$idEmpleado);
		$this->db->delete('empleado');
	}
	
	public function recuperarempleado($idEmpleado)
	{
		$this->db->select('*');         //select *
        $this->db->from('empleado');    	//tabla
        $this->db->where('idEmpleado',$idEmpleado);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarempleado($idEmpleado,$data)
	{
		$this->db->where('idEmpleado',$idEmpleado);
		$this->db->update('empleado',$data);        
	}

	public function listaEmpleadosdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('empleado'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
