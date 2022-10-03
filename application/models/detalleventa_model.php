<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class detalleventa_model extends CI_Model {
	
	public function listadetalleventas()
	{
		$this->db->select('dv.idVenta,dv.cantidad,dv.precioUnitario
			v.idVenta,p.idProducto'); // select *'); // select *
		$this->db->from('detalleventa dv'); // tabla
		//$this->db->where('v.estado','1');
		$this->db->join('venta v','dv.idVenta=v.idVenta');
		$this->db->join('producto p','v.idUsuario=p.idProducto');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregardetalleventa($data)
	{
		$this->db->insert('detalleventa',$data);
	}
// para eliminar usuario definitivamente---------------------------
	public function eliminarventa($idventa)
	{
		$this->db->where('idVenta',$idventa);
		$this->db->delete('venta');
	}
// End -----------------------------------------------------------
	public function recuperarventa($idventa)
	{
		$this->db->select('v.idVenta,v.fechaVenta,v.total,v.estado,v.idCliente,v.idUsuario,
			c.idCliente,c.nit_ci,u.idUsuario,u.nombres'); // select *
		$this->db->from('venta v');
		$this->db->where('v.idVenta',$idventa); 
		$this->db->join('cliente c','v.idCliente=c.idCliente');
		$this->db->join('usuario u','v.idUsuario=u.idUsuario');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarventa($idventa, $data)
	{		
		$this->db->where('idVenta',$idventa);		
		$this->db->update('venta',$data);
	}

	public function listaventasdeshabilitados()
	{
		/*$this->db->select('v.idVenta,v.fechaVenta,v.total,v.estado,v.idCliente,v.idUsuario,
			c.idCliente,c.nit_ci,u.idUsuario,u.nombres'); // select *'); // select *
		$this->db->from('venta v'); // tabla
		$this->db->where('v.estado','0');
		$this->db->join('cliente c','v.idCliente=c.idCliente');
		$this->db->join('usuario u','v.idUsuario=u.idUsuario');
		return $this->db->get(); // devolucion del resultado de la consulta*/

		$this->db->select('*'); // select *
		$this->db->from('venta'); // tabla
		$this->db->where('estado','0'); // estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}