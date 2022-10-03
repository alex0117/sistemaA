<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_model {
    
    public function validar($login,$password)
	{
        $this->db->select('*');         //select *
        $this->db->from('empleado'); 
		$this->db->where('login',$login);
        $this->db->where('password',$password);
        return $this->db->get();
    }
    
    public function listaClientes()
{
    $this->db->select('*'); // select *
    $this->db->from('cliente'); // tabla
    // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
    return $this->db->get(); // devolucion del resultado de la consulta
}
public function listaUsers()
{
    $this->db->select('*'); // select *
    $this->db->from('empleado'); // tabla
    // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
    return $this->db->get(); // devolucion del resultado de la consulta
}

public function listaProducto()
{
    $this->db->select('*'); // select *
    $this->db->from('producto'); // tabla
    // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
    return $this->db->get(); // devolucion del resultado de la consulta
}

public function venderUser($idCliente,$idempleado,$data)
    {
    	// transaccion unica o atomica
    	$this->db->trans_start(); // transaccion inicia

    	$this->db->insert('empleado',$data);
    	$idempleado=$this->db->insert_id(); // devuelve la ultima id generada
    	$data2['idCliente']=$idCliente;
    	$data2['idEmpleado']=$idempleado;
    	$this->db->insert('venta',$data2);

    	$this->db->trans_complete(); // transaccion completada con exito

    	/* // manejo de errores
    	if($this->db->trans_status()===FALSE)
    	{
    		return false;
    	}   -----*/			
    }
}

