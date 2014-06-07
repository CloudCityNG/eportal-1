<?php

class M_signin extends CI_Model {
	
	public function can_log_in(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		$result = $this->db->query($query);
		
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function get_user_dataset_type_1($email,$password){
		$query = "SELECT username, usertype,email FROM users WHERE email = '$email' AND password = '$password'";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function get_user_dataset_type_2($usertype,$username){
		if($usertype=='n'){
			$query = "SELECT  CONCAT(fname, ' ', lname) As name FROM normal_users WHERE username = '$username'";
		}else if($usertype=='b'){
			$query = "SELECT bname As name FROM business_users WHERE username = '$username'";
		}else if($usertype=='a'){
			$query = "SELECT CONCAT(fname, ' ', lname) As name FROM admin_users WHERE username = '$username'";
		}
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function email_exists($email){
		
		$sql = "SELECT fname, email FROM users WHERE email = '{$email}' LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row();
		
		if($query->num_rows() == 1 && $row->email){
			return $row->fname;
		}
		else{
			return false;
		}
	}
	
	public function check_admin($email){
		
		$sql = "SELECT email FROM admin WHERE email = '{$email}' ";
		$result = $this->db->query($sql);
		$row = $result->row();
		
		if($result->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
}
