<?php

class M_delivery extends CI_Model {
	
	public function pending_all($company_id){
		$query = "SELECT dp.id as dp_id,dp.delivery_location, dp.username as client_username, DATE_FORMAT(dp.delivery_date,'%D %M %Y') as delivery_date,ad.id as ad_id,ad.title,ad.body,ad.categoryid, ad.subcategoryid,DATE_FORMAT(dp.dateandtime,'%D %M %Y, %r') as requested_on,ud.profilepicture
				  FROM delivery_requests_pending dp, advertisement ad,user_details ud
				  WHERE dp.id in (SELECT id 
                        				  FROM delivery_requests_pending
                        				  WHERE company_id ='{$company_id}') 
         				AND 
        					ad.id in (SELECT ad_id 
                  					  FROM delivery_requests_pending
                  					  WHERE company_id ='{$company_id}')
                  		 AND
      						ud.username = dp.username
                	ORDER BY dp.dateandtime ASC";
		$result = $this->db->query($query);
		return  $result->result();
	}
	
	public function pending_reject($username,$id){
		$this->db->trans_begin();
		
		$this->db->where('id', $id);
		$this->db->delete('delivery_requests_pending');
		
		if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
			return false;
		}else{
		    $this->db->trans_commit();
			return true;
		} 
	}
	
	public function pending_accept($username,$id){
		$this->db->trans_begin();
			
		$this->db->where('id',$id);
		$query=$this->db->get('delivery_requests_pending');
		
		$info = $query->row_array();
		
		$data['company_id']=$info['company_id'];
		$data['accepted_username']=$username;
		$data['requested_dateandtime']=$info['dateandtime'];
		$data['ad_id']=$info['ad_id'];
		$data['customer_username']=$info['username'];
		$data['delivery_location']=$info['delivery_location'];
		$data['delivery_dateandtime']=$info['delivery_date'];
		
		$this->db->insert('delivery_requests_accepted', $data);
		
		$this->db->where('id', $id);
		$this->db->delete('delivery_requests_pending');
		
		if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
			return false;
		}else{
		    $this->db->trans_commit();
			return true;
		} 
	}
	
	public function accepted_all($company_id){
		$query = "SELECT id,accepted_username,DATE_FORMAT(accepted_dateandtime,'%D %M %Y, %r') as accepted_on,DATE_FORMAT(requested_dateandtime,'%D %M %Y, %r') as requested_on,ad_id,customer_username,delivery_location,DATE_FORMAT(delivery_dateandtime,'%D %M %Y') as delivery_on
					FROM delivery_requests_accepted
					ORDER BY accepted_dateandtime";
		$result = $this->db->query($query);
		return  $result->result();
	}
}