<?php

class M_subscribe extends CI_Model {

	public function add_new_subcription($cid,$sid){
		if($this->check_subscription_availability($cid,$sid,$this->session->userdata('username'))){
			$data['catid']=$cid;
			$data['subcatid']=$sid;
			$data['username']=$this->session->userdata('username');
			
			$query = $this->db->insert('subscribes',$data);
			if($query){return true;} 
		}else{
			return false;
		}
	}
	
	private function check_subscription_availability($cid,$sid,$username){
		$query = "SELECT * FROM subscribes WHERE catid='$cid' and subcatid='$sid' and username = '$username'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return false;}
		else{return true;}
	}
	
	public function get_user_subcription_details($username){
		$query = "SELECT subscribes.id,category.name as ct,subcategory.name as subcat,DATE_FORMAT(subscribes.dateandtime,'%D %M %Y') as dateandtime
					FROM category
					JOIN subscribes ON subscribes.catid = category.id
					JOIN subcategory ON subscribes.subcatid = subcategory.id
					where subscribes.username='$username'";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function remove_subcription($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('subscribes');
		if($query){return true;}
		else{return false;}
	}
}	