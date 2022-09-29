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
}