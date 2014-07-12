<?php

class Admin extends CI_Model{
	
	public function get_profileupdates($usertype,$reqtype){
		if($reqtype=='new'){
			if($usertype=='n'){
				$query = "SELECT ud.profilepicture as p_profilepicture, unu.username,unu.fname,unu.lname,unu.password,unu.profilepicture,unu.telemarketer,unu.description,unu.add_ln_1,unu.add_ln_2,unu.add_ln_3,unu.countryid,unu.provinceid,unu.districtid, DATE_FORMAT(unu.dateandtime,'%D %M %Y') as _when, DATE_FORMAT(unu.dateandtime,'%r') as _time, CONCAT(nu.fname, ' ', nu.lname) as name,unu.contact_number 
							FROM update_normal_users unu, normal_users nu, user_details ud
							WHERE TIMESTAMPDIFF(DAY,unu.dateandtime,now()) < 5 AND
									nu.username=unu.username AND 
									ud.username=nu.username";
			}else if($usertype=='b'){
				$query = "SELECT ud.profilepicture as p_profilepicture,ubu.username,ubu.bname,ubu.password,ubu.profilepicture,ubu.telemarketer,ubu.description,ubu.add_ln_1,ubu.add_ln_2,ubu.add_ln_3,ubu.countryid,ubu.provinceid,ubu.districtid,DATE_FORMAT(ubu.dateandtime,'%D %M %Y') as _when, DATE_FORMAT(ubu.dateandtime,'%r') as _time,bu.bname as name,ubu.contact_number
							FROM update_business_users ubu, business_users bu, user_details ud
							WHERE TIMESTAMPDIFF(DAY,ubu.dateandtime,now()) < 5 AND 
									bu.username=ubu.username AND
									ud.username=bu.username";
			}
		}else if($reqtype=='all'){
			if($usertype=='n'){
				$query = "SELECT ud.profilepicture as p_profilepicture,unu.username,unu.fname,unu.lname,unu.password,unu.profilepicture,unu.telemarketer,unu.description,unu.add_ln_1,unu.add_ln_2,unu.add_ln_3,unu.countryid,unu.provinceid,unu.districtid,DATE_FORMAT(unu.dateandtime,'%D %M %Y') as _when, DATE_FORMAT(unu.dateandtime,'%r') as _time, CONCAT(nu.fname, ' ', nu.lname) as name,unu.contact_number 
							FROM update_normal_users unu, normal_users nu, user_details ud
							WHERE nu.username=unu.username AND 
									ud.username=nu.username";
			}else if($usertype=='b'){
				$query = "SELECT ud.profilepicture as p_profilepicture, ubu.username,ubu.bname,ubu.password,ubu.profilepicture,ubu.telemarketer,ubu.description,ubu.add_ln_1,ubu.add_ln_2,ubu.add_ln_3,ubu.countryid,ubu.provinceid,ubu.districtid,DATE_FORMAT(ubu.dateandtime,'%D %M %Y') as _when, DATE_FORMAT(ubu.dateandtime,'%r') as _time,bu.bname as name,ubu.contact_number
							FROM update_business_users ubu, business_users bu, user_details ud
							WHERE bu.username=ubu.username AND
									ud.username=bu.username";
			}
		}
		$result = $this->db->query($query);
		return $result->result();
	}

	public function get_user_update_data($usertype,$username){
		if($usertype=='n'){
			$query="Select * from update_normal_users where username='$username'";
		}else if($usertype=='b'){
			$query="Select * from update_business_users where username='$username'";
		}
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function add_user_update_finish($usertype,$username,$data){
		$this->db->where('username', $username);	
		if($usertype=='n'){
			$query = $this->db->update('normal_users', $data);
		}else if($usertype=='b'){
			$query = $this->db->update('business_users', $data);
		}
		if($query){return true;}
		else{return false;}
	}
	
	public function add_user_details_update_finish($username,$data){
		$this->db->where('username', $username);
		$query = $this->db->update('user_details', $data);
		if($query){return true;}
		else{return false;}
	}
	
	public function add_user_password_update_finish($username,$data){
		$this->db->where('username', $username);
		$query = $this->db->update('users', $data);
		if($query){return true;}
		else{return false;}
	}
	
	public function delete_updates($usertype,$username){
		$this->db->where('username', $username);
		if($usertype=='n'){
			$query = $this->db->delete('update_normal_users');
		}else if($usertype=='b'){
			$query = $this->db->delete('update_business_users');
		}
		if($query){return true;}
		else{return false;}
	}

	public function count_normal_new_updates(){
		$query = "SELECT count(unu.username) as n_new
					FROM update_normal_users unu
					WHERE TIMESTAMPDIFF(DAY,unu.dateandtime,now()) < 5";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_normal_all_updates(){
		$query = "SELECT count(unu.username) as n_all
					FROM update_normal_users unu";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_business_new_updates(){
		$query = "SELECT count(bnu.username) as b_new
					FROM update_business_users bnu
					WHERE TIMESTAMPDIFF(DAY,bnu.dateandtime,now()) < 5";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_business_all_updates(){
		$query = "SELECT count(bnu.username) as b_all
					FROM update_business_users bnu";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_total_business_users(){
		$query = "SELECT count(u.username) as b_total_u
					FROM users u
					WHERE u.usertype='b'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_total_normal_users(){
		$query = "SELECT count(u.username) as n_total_u
					FROM users u
					WHERE u.usertype='n'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_total_admin_users(){
		$query = "SELECT count(u.username) as a_total_u
					FROM users u
					WHERE u.usertype='a'";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function count_total_users(){
		$query = "SELECT count(u.username) as total_u
					FROM users u";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_mostly_reported_users(){
		$query = "SELECT accused_user, COUNT(accused_user) AS count 
					FROM reported_users
					GROUP BY accused_user 
					ORDER BY count DESC
					limit 5";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_all_normal_user_details(){
		$query = "SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered, DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate, CONCAT(nu.fname, ' ', nu.lname) as name 
							FROM normal_users nu, user_details ud, users u
							WHERE ud.username=nu.username AND u.username=nu.username";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_all_business_user_details(){
		$query = "SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered,DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate,bu.bname as name 
					FROM business_users bu, user_details ud, users u 
					WHERE ud.username=bu.username AND u.username=bu.username";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_all_admin_user_details(){
		$query = "SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered, DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate, CONCAT(au.fname, ' ', au.lname) as name 
							FROM admin_users au, user_details ud, users u
							WHERE ud.username=au.username AND u.username=au.username";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_all_user_details(){
		$query = "SELECT * FROM ((SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered,DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate, CONCAT(nu.fname, ' ', nu.lname) as name 
							FROM normal_users nu, user_details ud, users u
							WHERE ud.username=nu.username AND u.username=nu.username)
				UNION 
				(SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered,DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate,bu.bname as name 
							FROM business_users bu, user_details ud, users u 
							WHERE ud.username=bu.username AND u.username=bu.username)
              
 				UNION
    			(SELECT u.usertype,u.email,ud.profilepicture,u.username,DATE_FORMAT(u.registered_datenadtime,'%D %M %Y %r') as registered,DATE_FORMAT(u.dateandtime,'%D %M %Y %r') as lastupdate, CONCAT(au.fname, ' ', au.lname) as name 
							FROM admin_users au, user_details ud, users u
							WHERE ud.username=au.username AND u.username=au.username))as T ORDER BY registered; ";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function add_user($type,$admin_username){
		$admin_user_app_add = array (
								'admin_username' => $admin_username,
								'user_username' =>$this->input->post('username'),
								'type'=>'add');
		$user_details = array('username'=>$this->input->post('username'));
		$users = array(
					'username'=>$this->input->post('username'),
					'email'=>$this->input->post('email'),
					'password'=>md5($this->input->post('password')),
					'activation_type'=>'admin_add',
					'usertype'=>$type);
		$q4 = false;			
		if($type == 'a'){
			$user_specific_table = array(
							'username'=>$this->input->post('username'),
							'fname'=>$this->input->post('fname'),
							'lname'=>$this->input->post('lname'));
			$q4 = $this->db->insert('admin_users',$user_specific_table);
		}else if($type == 'b' ){
			$user_specific_table = array(
							'username'=>$this->input->post('username'),
							'bname'=>$this->input->post('bname'));
			$q4 = $this->db->insert('business_users',$user_specific_table);
		}else if($type == 'n'){
			$user_specific_table = array(
							'username'=>$this->input->post('username'),
							'fname'=>$this->input->post('fname'),
							'lname'=>$this->input->post('lname'));
			$q4 = $this->db->insert('normal_users',$user_specific_table);
		}
		
		$q1 = $this->db->insert('admin_user_approval_add',$admin_user_app_add);
		$q2 = $this->db->insert('user_details',$user_details);
		$q3 = $this->db->insert('users',$users);
		
		if($q1 && $q2 && $q3 && $q4){return true;} 
		else {return false;	}
	}
	
	public function count_total_profile_reports(){
		$query = "SELECT count(ru.id) as total_profile_reports
					FROM reported_users ru";
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_all_user_profile_reports(){
		$query = "SELECT  rd.id as rd_id,ru.id as ru_id,ru.accused_user, ru.reported_user,DATE_FORMAT(ru.dateandtime,'%D %M %Y %r') as reported_on ,rt.report_type_name, rd.description
				FROM report_description rd,reported_users ru, report_type rt
				WHERE rd.accused_user=ru.accused_user AND rd.reported_user=ru.reported_user AND rd.type=ru.type and rt.type=ru.type";
				
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_specific_user_profile_reports($username){
		$query = "SELECT  rd.id as rd_id,ru.id as ru_id,ru.accused_user, ru.reported_user,DATE_FORMAT(ru.dateandtime,'%D %M %Y %r') as reported_on ,rt.report_type_name, rd.description
				FROM report_description rd,reported_users ru, report_type rt
				WHERE ru.accused_user='$username'and rd.accused_user=ru.accused_user AND rd.reported_user=ru.reported_user AND rd.type=ru.type and rt.type=ru.type";
				
		$result = $this->db->query($query);
		return $result->result();
	}
	
	
	public function get_report_info_usertype($username){
		$query = "	SELECT u.usertype
					FROM user_details ud, users u 
					WHERE u.username = '$username' 
						AND ud.username=u.username";
		
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function users_reported_resolved($rd_id,$ru_id){
		if($rd_id!=null){
			$this->db->where('id', $rd_id);
			$q1 = $this->db->delete('report_description');
		}
		if($ru_id!=null){
			$this->db->where('id', $ru_id);
			$q2 = $this->db->delete('reported_users');
		}
		if($q1 && $q2){return true;}
		else{return false;}
	}
	
	
	
	













	/*public function get_all_normaluser_details(){
		$sql = "select u.id,u.dateandtime as registeredon, u.fname, u.lname, u.email, u.username, ud.bio, ud.profilepicture, ud.telemarketer
				from  users u,user_details ud
				where  u.username nOT IN (select bu.username from businessusers bu) and ud.username = u.username 
				order by  u.dateandtime desc
				"; 
		$result = $this->db->query($sql);
		return $result->result();
	}
	
	public function get_all_business_user_details(){
		$sql = "select u.id,u.dateandtime as registeredon,u.fname,u.lname,u.email,u.username,ud.bio,ud.profilepicture,ud.telemarketer,bu.bname,bu.dateandtime as addedtobusiness
				from businessusers bu, users u,user_details ud
				where ud.username = u.username and bu.username = u.username
				order by  u.dateandtime desc
				"; 
		$result = $this->db->query($sql);
		return $result->result();
	}
	*/


	/*public function get_all_user_basic_details($username){
		$sql = "SELECT u.fname, u.lname,u.email 
				 FROM users u"; 
		$result = $this->db->query($sql);
		return $result->result();
	}

	public function get_all_user_profile_details($username){
		$sql = "SELECT ud.bio,ud.profilepicture,ud.telemarketer
				 FROM user_details ud"; 
		$result = $this->db->query($sql);
		return $result->result();
	}
	
	public function get_all_user_business_details($username){
		$sql = "SELECT bu.bname 
				 FROM businessusers bu"; 
		$result = $this->db->query($sql);
		return $result->result();
	}*/
}