<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_model {

	public function buscar($query)
	{
		$this->db->like('nombre',$query);
		$query=$this->db->get('producto');
		if ($query->num_rows()>0) {
			return $query;
		}else {
			return FALSE;
		}
	}
	public function buscarC($query2)
	{
		$this->db->like('nombre',$query2);
		$query2=$this->db->get('cliente');
		if ($query2->num_rows()>0) {
			return $query2;
		}else {
			return FALSE;
		}
	}
}