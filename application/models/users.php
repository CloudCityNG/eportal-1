<?php

class Users extends CI_Model{

	/*
	 * when a user sign up. this function will add them to the user waiting list
	 * depending on thier user type 
	 * @param $type : the type of the user(normal , business) 
	 * @param $key : randomly generated key(used when acticating the account)
	 * returns TRUE if the database insert succeed
	 * returns FALSE if the database insert failed
	 *  */
	public function add_user_to_waiting($type,$key){
		if($type=='n'){
			$data = array (
				'email' => $this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'username'=>$this->input->post('username'),
				'fname'=>$this->input->post('fname'),
				'lname'=>$this->input->post('lname'),
				'key'=>$key);
			$query = $this->db->insert('waiting_normal_users',$data);
		}
		else if($type=='b'){
			$data = array (
				'email' => $this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'username'=>$this->input->post('username'),
				'bname'=>$this->input->post('bname'),
				'key'=>$key);
			$query = $this->db->insert('waiting_business_users',$data);
		}
		if($query){return true;} 
		else {return false;	}
	}
	
	/*
	 * this function will check wether theres a entrey exsist with the provided activation-key
	 * return TRUE if the activation key is valid and in the database
	 * return FALSE if the activation key is not in the database
	 * @param $type : the type of the user(normal , business) 
	 * @param $key : randomly generated key(used when acticating the account)
	 * */
	public function activation_key_valid($type,$key){
		if($type=='n'){
			$this->db->where('key',$key);
			$query = $this->db->get('waiting_normal_users');
		}
		else if($type=='b'){
			$this->db->where('key',$key);
			$query = $this->db->get('waiting_business_users');
		}
		
		if($query->num_rows()!= 0){return true;}
		else{return false;}
	}
	
	/*
	 * activate the user. add the user from waiting list to the activated user list.
	 * @param $type : the type of the user(normal , business) 
	 * @param $key : randomly generated key(used when acticating the account)
	 * */
	public function activate_user($type,$key){
		if($type=='n'){
			$this->db->where('key',$key);
			$activator_info = $this->db->get('waiting_normal_users');
			$info = $activator_info->row();
			$basicInfo = array (
				'email'=>$info->email,
				'username'=>$info->username,
				'password'=>$info->password,
				'usertype'=>'n');
				
			$userInfo = array (
				'username'=>$info->username,
				'fname'=>$info->fname,
				'lname'=>$info->lname);
			
			$data = array ('username'=>$info->username);
			
			$query1 = $this->db->insert('users',$basicInfo);
			$query2 = $this->db->insert('normal_users',$userInfo);
			$query3 = $this->db->insert('user_details',$data);
			
			if($query1 && $query2 && $query3){
				$this->db->where('key',$key);
				$this->db->delete('waiting_normal_users');
				return true;
			}else{ return false; }
				
		}else if($type=='b'){
			$this->db->where('key',$key);
			$activator_info = $this->db->get('waiting_business_users');
			$info = $activator_info->row();
			$basicInfo = array (
				'email'=>$info->email,
				'username'=>$info->username,
				'password'=>$info->password,
				'usertype'=>'b');
				
			$userInfo = array (
				'username'=>$info->username,
				'bname'=>$info->bname);
			
			$data = array ('username'=>$info->username);
			
			$query1 = $this->db->insert('users',$basicInfo);
			$query2 = $this->db->insert('business_users',$userInfo);
			$query3 = $this->db->insert('user_details',$data);
			
			if($query1 && $query2 && $query3){
				$this->db->where('key',$key);
				$this->db->delete('waiting_business_users');
				return true;
			}else{ return false; }
		}		
	}

	/* fetch all user specific data which should be showed in the profile
	 * */
	public function get_main_details($username){
		$query = "	SELECT u.email, u.usertype,ud.profilepicture,ud.telemarketer,ud.description,
							ud.add_ln_1,ud.add_ln_2,ud.add_ln_3,ud.countryid,ud.provinceid,ud.districtid,ud.contact_number
					FROM user_details ud, users u 
					WHERE u.username = '$username' 
						AND ud.username=u.username";
		
		$result = $this->db->query($query);
		return $result->result();
	}
	
	/* add user profile picture to the database
	public function add_user_profilepicture($picturename,$username){
			$data = array ('profilepicture'=>$picturename);	
			$this->db->where('username', $username);
    		$this->db->update('user_details', $data);
	}
	*/
	
	public function add_user_profilepicture_admin_confirm($picturename,$username,$usertype){
		$data = array ('profilepicture'=>$picturename);
		if($usertype=='n'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_normal_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_normal_users',$data);
			}
		}else if($usertype=='b'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_business_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_business_users',$data);
			}
		}else if($usertype=='a'){
			$admin = array ('profilepicture'=>$picturename);
			$this->db->where('username', $username);
    		$query = $this->db->update('user_details', $admin);
		}
		if($query){return true;} 
		else {return false;	}
	}

	/*
	 * when user makes any updates for his profile, all the changed 
	 * details would be added to the database for admins approval
	 * */
	public function add_basicdetails_admin_confirm($usertype,$username){
		if($usertype=='n'){
			$data = array (
				'fname'=>$this->input->post('fname'),
				'lname'=>$this->input->post('lname'));
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_normal_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_normal_users',$data);
			}
		}else if($usertype=='b'){
			$data = array ('bname'=>$this->input->post('bname'));
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_business_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_business_users',$data);
			}
		}else if($usertype=='a'){
			$admin = array ('fname'=>$this->input->post('fname'),
							'lname'=>$this->input->post('lname'));
			$this->db->where('username', $username);
    		$query = $this->db->update('admin_users', $admin);
		}
		if($query){return true;} 
		else {return false;	}
	}

	/*
	 * adds the profile details to the update_user table depending on the user
	 * type for admins approval process
	 * */
	public function add_profiledetails_admin_confirm($username,$usertype){
		$data = array (
			'description'=>$this->input->post('description'),
			'telemarketer'=>$this->input->post('telem')
			);
		if($usertype=='n'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_normal_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_normal_users',$data);
			}
		}else if($usertype=='b'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_business_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_business_users',$data);
			}
		}else if($usertype=='a'){
			$admin = array ('description'=>$this->input->post('description'),
							'telemarketer'=>$this->input->post('telem'));
			$this->db->where('username', $username);
    		$query = $this->db->update('user_details', $admin);
		}
		
		if($query){return true;} 
		else {return false;	}
	}
	
	
	/*
	 * adds the password to the user_updates table depending on the usertype for 
	 * admins approval
	 * */
	public function add_reset_passowrd_admin_confirm($username,$password,$usertype){
		$data = array (
			'username'=>$username,
			'password'=>$password
			);
		if($usertype=='n'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_normal_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_normal_users',$data);
			}
		}else if($usertype=='b'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_business_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_business_users',$data);
			}
		}else if($usertype=='a'){
			$admin = array ('password'=>md5($password));
			$this->db->where('username', $username);
    		$query = $this->db->update('users', $admin);
		}
		if($query){return true;} 
		else {return false;	}
	}
	
	
	public function add_address_admin_confirm($couid,$proid,$disid,$l1,$l2,$l3,$cn,$usertype,$username){
		$data = array (
			'countryid'=>$couid,
			'provinceid'=>$proid,
			'districtid'=>$disid,
			'add_ln_1'=>$l1,
			'add_ln_2'=>$l2,
			'add_ln_3'=>$l3,
			'contact_number'=>$cn
			);
		if($usertype=='n'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_normal_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_normal_users',$data);
			}
		}else if($usertype=='b'){
			if($this->check_username_availability_onupdate($username,$usertype)){
				$this->db->where('username', $username);
    			$query = $this->db->update('update_business_users', $data);
			}else{
				$data['username']=$username;
				$query = $this->db->insert('update_business_users',$data);
			}
		}else if($usertype=='a'){
			$admin = array ('countryid'=>$couid,
							'provinceid'=>$proid,
							'districtid'=>$disid,
							'add_ln_1'=>$l1,
							'add_ln_2'=>$l2,
							'add_ln_3'=>$l3,
							'contact_number'=>$cn
							);
			$this->db->where('username', $username);
    		$query = $this->db->update('user_details', $admin);
		}
		if($query){return true;} 
		else {return false;	}
	}
	
	
	
	/*
	 * checks whether the entered password is correct for the entered username
	 * */
	public function valid_password($username,$password){
		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	/*
	 * if theres already a new user update on the user_update table, then the new updates
	 * will be added to that username. if there was some old value, it will be replaced by the newly
	 * entered values
	 * */
	function check_username_availability_onupdate($username,$usertype){
		if($usertype=='n'){
			$query = "SELECT * FROM update_normal_users WHERE username = '$username'";
		}else if($usertype=='b'){
			$query = "SELECT * FROM update_business_users WHERE username = '$username'";
		}
		$result = $this->db->query($query);
		
		if($result->num_rows()==1){return true;}
		else{return false;}
	}
	
	/*
	 * adds the user reports to the database
	 * */
	 public function addReport($data){
	 	$db['reported_user']=$data['reported_user'];
	 	$db['accused_user']=$data['accused_user'];
		$db['type']=$data['type'];
		
		$q1 = $this->db->insert('report_description',$data);
		$q2 = $this->db->insert('reported_users',$db);
	 	
		if($q1 && $q2){return true;} 
		else {return false;	}
	 }
	 
	 public function p_get_country($id){
	 	$query = "	SELECT name 
	 				FROM country
	 				WHERE id=$id";
		
		$result = $this->db->query($query);
		return $result->result();
	 }
	 public function p_get_province($id){
	 	$query = "	SELECT name 
	 				FROM province
	 				WHERE id=$id";
		$result = $this->db->query($query);
		return $result->result();
	 }
	 public function p_get_district($id){
	 	$query = "	SELECT name 
	 				FROM district
	 				WHERE id=$id";
		$result = $this->db->query($query);
		return $result->result();
	 }

}