<?php

class M_company extends CI_Model {
	
	public function get_basic_details($companyid){
		if($this->company_exists($companyid)){
			$query = "SELECT * FROM delivery_company_details WHERE id = '{$companyid}'";
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
		$query = "SELECT * FROM delivery_company_details WHERE id = '{$companyid}'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}

	public function is_a_username($username){
		$result = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	/*public function get_name($username){
		$query="SELECT  CONCAT(first_name, ' ', last_name) As name 
				FROM delivery_company_contributors 
				WHERE username = '{$username}'";
		$result = $this->db->query($query);
		return $result->result();
	}
	*/
	
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
	
	public function get_contributers($company_id){
		$query="SELECT con.id,con.username,DATE_FORMAT(con.dateandtime,'%D %M %Y') as added_on, con.role,u.email,con.added_by
				FROM delivery_company_contributors con,users u
				WHERE con.company_id='{$company_id}' AND con.username = u.username
				ORDER BY con.id ASC";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function comapany_details(){
		$query="SELECT id, company_name,profile_picture,description
				FROM delivery_company_details";
				
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_counters_outdated($company_id){
		$query="SELECT count(id) as count
				FROM delivery_requests_accepted
				WHERE DATEDIFF(NOW(),delivery_dateandtime) > 0 AND company_id = '{$company_id}'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_counters_pending($company_id){
		$query="SELECT count(id) as count
				FROM delivery_requests_pending
				WHERE company_id = '{$company_id}'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_counters_deliveries_today($company_id){
		$query="SELECT count(id) as count
				FROM delivery_requests_accepted
				WHERE DATEDIFF(NOW(),delivery_dateandtime) = 0 AND company_id = '{$company_id}'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_deliveries_today($company_id){
		$query = "SELECT id,
						ad_id,
						customer_username,
						delivery_location
					FROM delivery_requests_accepted
					WHERE DATEDIFF(NOW(),delivery_dateandtime) = 0 AND company_id = '{$company_id}'
					ORDER BY id";
		$result = $this->db->query($query);
		return  $result->result();
	}
	
	public function check_username_availability($contributor_username){
		$result = $this->db->query("SELECT * FROM users WHERE username = '{$contributor_username}'");
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	public function check_username_can_add($contributor_username){
		$result = $this->db->query("SELECT * FROM delivery_company_contributors WHERE username = '{$contributor_username}'");
		if($result->num_rows() == 1){return false;}
		else{return true;}
	}
	public function add_new_contributor($company_id,$username,$contributor_username){
		$this->db->trans_begin();
		
		$data['company_id']=$company_id;
		$data['username']=$contributor_username;
		$data['added_by']=$username;
		$data['role']='contributor';
		
		$this->db->insert('delivery_company_contributors', $data);
		
		if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
			return false;
		}else{
		    $this->db->trans_commit();
			return true;
		} 
	}
	
	public function create_new_company($company_name,$uername){
		$company = array(
					'company_name'=>$company_name,
					'created_by'=>$uername
				);	
		
		if($this->db->insert('delivery_company_details', $company)){
			$query = "SELECT id
					FROM delivery_company_details
					WHERE company_name='{$company_name}' AND created_by = '{$uername}'";
			$result = $this->db->query($query);
			return  $result->result();
		}else{
			return false;
		}
	}
	
	public function new_company_email($id,$email,$username){
		$company = array(
					'company_id'=>$id,
					'email'=>$email,
					'identity_name'=>'Primary',
					'username'=>$username
				);
		if($this->db->insert('delivery_company_email', $company)){
			return true;
		}else{
			return false;
		}
	}
	
	public function new_company_address($id,$line_one,$line_two,$username){
		$company = array(
					'company_id'=>$id,
					'address_line_1'=>$line_one,
					'address_line_2'=>$line_two,
					'identity_name'=>'Primary',
					'username'=>$username
				);
		if($this->db->insert('delivery_company_address', $company)){
			return true;
		}else{
			return false;
		}
	}
	
	public function new_company_contact($id,$contact_number,$username){
		$company = array(
					'company_id'=>$id,
					'contact_number'=>$contact_number,
					'identity_name'=>'Primary',
					'username'=>$username
				);
		if($this->db->insert('delivery_company_contact_numbers', $company)){
			return true;
		}else{
			return false;
		}
	}
	
	public function new_company_owner($id,$username){
		$company = array(
					'company_id'=>$id,
					'role'=>'owner',
					'username'=>$username
				);
		if($this->db->insert('delivery_company_contributors', $company)){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_delivery_client_email($comapny_id){
		$query = "select email
				from users
				where username in
		                (select customer_username 
		                from delivery_requests_delivered 
		                where company_id = '{$comapny_id}'
		                group by customer_username)";
		$result = $this->db->query($query);
		return  $result->result();
	}
}