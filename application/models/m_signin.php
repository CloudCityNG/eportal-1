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
		
		$sql = "SELECT usertype FROM users WHERE email = '{$email}' LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row();
		$username = $row->username;
		
		if($row->usertype == 'a'){
			$sql = "SELECT fname FROM admin_users WHERE username = '{$username}' LIMIT 1";
			$query = $this->db->query($sql);
			$row = $query->row();
			
			if($query->num_rows() == 1 && $row->email){
				return $row->fname;
			}
			else{
				return false;
			}
		}
		elseif($row->usertype == 'b'){
			$sql = "SELECT fname FROM admin_users WHERE username = '{$username}' LIMIT 1";
			$query = $this->db->query($sql);
			$row = $query->row();
			
			if($query->num_rows() == 1 && $row->email){
				return $row->fname;
			}
			else{
				return false;
			}
		}
		elseif($row->usertype == 'n'){
			$sql = "SELECT fname FROM normal_users WHERE username = '{$username}' LIMIT 1";
			$query = $this->db->query($sql);
			$row = $query->row();
			
			if($query->num_rows() == 1 && $row->email){
				return $row->fname;
			}
			else{
				return false;
			}
		}
		else{
			$sql = "SELECT bname FROM business_users WHERE username = '{$username}' LIMIT 1";
			$query = $this->db->query($sql);
			$row = $query->row();
			
			if($query->num_rows() == 1 && $row->email){
				return $row->fname;
			}
			else{
				return false;
			}
		}
		
		
	}
	
	public function verify_reset_password_code($email, $code){
				
			
		
		$sql = "SELECT username 
				FROM users 
				WHERE email = '{$email}' LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		
		if($result->num_rows() == 1){
			return ($code == md5($this->config->item('salt') . $row->fname)) ? true : FALSE;
		}
		else{
			return false;
		}
	}
	
	public function update_password(){
		
		$email = $this->input->post('email');
		$password = sha1($this->config->item('salt') . $this->input->post('password'));
		
		$sql = "UPDATE users SET password = '{$password}' WHERE email = '{$email}' LIMIT 1";
		$this->db->query($sql);
		
		if ($this->db->affected__rows() === 1){
			return true;
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
	
	public function get_delivery_details($username){
		if($this->is_delivery_company_user_exist($username)){
			$query="SELECT comp.id,comp.company_name
					FROM delivery_company_contributors cont,delivery_company_details comp
					WHERE cont.id = comp.id and cont.username = '{$username}'";
			$result = $this->db->query($query);
		return $result->result();
		}else{
			return false;
		}
	}
	
	private function is_delivery_company_user_exist($username){
		$query = "SELECT * FROM delivery_company_contributors WHERE username = '{$username}' ";
		$result = $this->db->query($query);
		$row = $result->row();
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	
}
