<?php

class M_permissions extends CI_Model{
	
	public function get_all_functions(){
		$query = "SELECT * FROM permission ";
							
		$result = $this->db->query($query);
		return $result->result();
	}
}