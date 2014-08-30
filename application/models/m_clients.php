<?php

class M_clients extends CI_Model {
	
	public function is_a_username($username){
		$result = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function get_usertype($username){
		$result = $this->db->query("SELECT usertype	FROM users	WHERE username = '{$username}'");
		return $result->result();
	}
	
	public function get_name($usertype,$username){
		if($usertype=='n'){
			$query = "SELECT  CONCAT(fname, ' ', lname) As name FROM normal_users WHERE username = '{$username}'";
		}else if($usertype=='b'){
			$query = "SELECT bname As name FROM business_users WHERE username = '{$username}'";
		}else if($usertype=='a'){
			$query = "SELECT CONCAT(fname, ' ', lname) As name FROM admin_users WHERE username = '{$username}'";
		}
		$result = $this->db->query($query);
		return $result->result();
	}
}