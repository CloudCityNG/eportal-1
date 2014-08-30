<?php

class M_company extends CI_Model {
	
	public function get_basic_details($companyid){
		if($this->company_exists($companyid)){
			$query = "SELECT * FROM delivery_company_user_details WHERE id = '{$companyid}'";
			$result = $this->db->query($query);
			return  $result->result();
		}else{
			return false;
		}
	}
	
	public function get_address_details($companyid){
		if($this->company_exists($companyid)){
			$query = "SELECT address_line_1,address_line_2,identity_name FROM delivery_company_address WHERE company_id = '{$companyid}'";
			$result = $this->db->query($query);
			return  $result->result();
		}else{
			return false;
		}
	}
	
	public function get_contact_details($companyid){
		if($this->company_exists($companyid)){
			$query = "SELECT contact_number,identity_name FROM delivery_company_contact_numbers WHERE company_id = '{$companyid}'";
			$result = $this->db->query($query);
			return  $result->result();
		}else{
			return false;
		}
	}
	
	public function get_email_details($companyid){
		if($this->company_exists($companyid)){
			$query = "SELECT email,identity_name FROM delivery_company_email WHERE company_id = '{$companyid}'";
			$result = $this->db->query($query);
			return  $result->result();
		}else{
			return false;
		}
	}
	
	private function company_exists($companyid){
		$query = "SELECT * FROM delivery_company_user_details WHERE id = '{$companyid}'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}

	public function is_a_username($username){
		$result = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function get_name($username){
		$query="SELECT  CONCAT(first_name, ' ', last_name) As name 
				FROM delivery_company_users 
				WHERE username = '{$username}'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_contributers($company_id){
		$query="SELECT id,username,email,CONCAT(first_name, ' ', last_name) As name,activation_type,DATE_FORMAT(registered_dateandtime,'%D %M %Y') as registered_on,DATE_FORMAT(dateandtime,'%D %M %Y') as last_updated_on 
				FROM delivery_company_users
				WHERE company_id='{$company_id}'";
		
		$result = $this->db->query($query);
		return $result->result();
	}
}