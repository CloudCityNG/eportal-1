<?php

class M_permissions extends CI_Model{
	
	public function get_all_functions(){
		$query = "SELECT * FROM permission ";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function insert_permissions($arr){
		$i=1;
		foreach($arr as $row){		
			$this->db->where('pid',$i)->update('permission',array('normal'=>$row[1],'business'=>$row[2],'admin'=>$row[3],'unregistered'=>$row[4]));
			$i++;
		}

		
	}
	
	public function check_if_super($username){
		$query = "SELECT * FROM user_details WHERE super = 1 AND username = '$username'";
		$result = $this->db->query($query);
		
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function check_if_admin($username){
		$type = 'a';
		$query = 'SELECT * FROM users WHERE usertype = \''.$type.'\' AND username = \''.$username.'\'';
		$result = $this->db->query($query);
		
		if($result->num_rows() >= 0){return true;}
		else{return false;}
	}
	
	public function can_view_this($pid,$type){
		
		if($type = 'a'){
		$query = $this->db->query('select admin from permission where pid = \''.$pid.'\'');
		foreach ($query->result() as $row)
   				{
   					if($row->admin == 1){
   						return TRUE;
   					}
					else{
						return false;
					}
   				}
		}
	}
}