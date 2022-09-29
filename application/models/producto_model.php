<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_model {

	public function listaProducto()
	{
		$this->db->select('*');         //select *
        $this->db->from('producto');
		$this->db->where('estado','1');    	//tabla
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarproducto($data)
	{
		$this->db->insert('producto',$data);       //devolucion de resultado de la consulta
	}
	
	
	public function eliminarproducto($idProducto)
	{
		$this->db->where('idProducto',$idProducto);        
        $this->db->delete('producto'); 
	} 



	public function recuperarproducto($idProducto)
	{
		$this->db->select('*');         //select *
        $this->db->from('producto');    	//tabla
        $this->db->where('idProducto',$idProducto);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarproducto($idProducto,$data)
	{
		$this->db->where('idProducto',$idProducto);
		$this->db->update('producto',$data);        
	}

	public function listaproductodeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('producto'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}
}
