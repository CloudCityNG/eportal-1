<?php

class M_delivery extends CI_Model {
	
	public function pending_all($company_id){
		$query = "SELECT dp.id as dp_id,
						dp.delivery_location, 
						dp.username as client_username, 
						DATE_FORMAT(dp.delivery_date,'%D %M %Y') as delivery_date,
						ad.id as ad_id,
						ad.title,
						ad.body,
						ad.categoryid, 
						ad.subcategoryid,
						DATE_FORMAT(dp.dateandtime,'%D %M %Y, %r') as requested_on,
						ud.profilepicture
				  FROM delivery_requests_pending dp, advertisement ad,user_details ud
				  WHERE ad.id in (SELECT ad_id 
                  				  FROM delivery_requests_pending
                  				  WHERE company_id ='{$company_id}')
                  		 AND
      					ud.username = dp.username
      				GROUP BY dp.id
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
		
		$query="SELECT *
				FROM delivery_requests_pending
				WHERE id='{$id}'";
		$result = $this->db->query($query);
		$info = $result->row_array();
		
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
		$query = "SELECT id,
						accepted_username,
						DATE_FORMAT(accepted_dateandtime,'%D %M %Y, %r') as accepted_on,
						DATE_FORMAT(requested_dateandtime,'%D %M %Y, %r') as requested_on,
						ad_id,
						customer_username,
						delivery_location,
						DATE_FORMAT(delivery_dateandtime,'%D %M %Y') as delivery_on
					FROM delivery_requests_accepted
					ORDER BY accepted_dateandtime";
		$result = $this->db->query($query);
		return  $result->result();
	}
	
	public function check_item_availability($username,$itemID){
		$query = "SELECT * FROM advertisement WHERE username = '{$username}' AND id = '{$itemID}'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function check_delivery_company_availability($company_id){
		$query = "SELECT * FROM delivery_company_details WHERE id = '{$company_id}'";
		$result = $this->db->query($query);
		if($result->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function add_delivery_request($company_id,$item_id,$delivery_location,$delivery_date){
		$data = array(
					'company_id' => $company_id,
					'ad_id'=>$item_id,
					'delivery_location'=>$delivery_location,
					'username'=>$this->session->userdata('username'),
					'delivery_date'=>$delivery_date
				);
				
		$query = $this->db->insert('delivery_requests_pending',$data);
			
		if($query){return true;} 
		else {return false;	}
	}
	
	public function delivery_complete($id,$username){
		$this->db->trans_begin();
		
		$query="SELECT *
				FROM delivery_requests_accepted
				WHERE id='{$id}'";
				
		$result = $this->db->query($query);
		$info = $result->row_array();
		
		$data['company_id']=$info['company_id'];
		$data['accepted_username']=$info['accepted_username'];
		$data['accepted_dateandtime']=$info['accepted_dateandtime'];
		$data['requested_dateandtime']=$info['requested_dateandtime'];
		$data['ad_id']=$info['ad_id'];
		$data['customer_username']=$info['customer_username'];
		$data['delivery_location']=$info['delivery_location'];
		$data['delivery_dateandtime']=$info['delivery_dateandtime'];
		$data['delivered_username']=$username;
		
		$this->db->insert('delivery_requests_delivered',$data);
		
		$this->db->where('id', $id);
		$this->db->delete('delivery_requests_accepted');
		
		if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
			return false;
		}else{
		    $this->db->trans_commit();
			return true;
		} 
	}

	public function delivery_completed_all($company_id){
		$query = "select drd.id as delivery_id,
						drd.accepted_username ,
				        DATE_FORMAT(drd.accepted_dateandtime,'%D %M %Y, %r') as accepted_dateandtime ,
				        DATE_FORMAT(drd.requested_dateandtime,'%D %M %Y, %r') as requested_dateandtime ,
				        drd.customer_username ,
				        drd.delivery_location ,
				        DATE_FORMAT(drd.delivery_dateandtime,'%D %M %Y') as delivery_dateandtime ,
				        drd.delivered_username ,
				        adv.title as ad_title,
				        adv.id as ad_id 
				FROM delivery_requests_delivered drd, advertisement adv
				WHERE adv.id in (SELECT ad_id 
				                FROM delivery_requests_delivered
				                WHERE company_id ='{$company_id}')
					AND drd.company_id = '{$company_id}'
			    GROUP BY drd.id
			    ORDER BY drd.id DESC";
		$result = $this->db->query($query);
		return  $result->result();
	}
	
	public function delivery_out_of_date($company_id){
	$query="SELECT	id,
					accepted_username,
					DATE_FORMAT(accepted_dateandtime,'%D %M %Y, %r') as accepted_dateandtime,
					DATE_FORMAT(requested_dateandtime,'%D %M %Y, %r') as requested_dateandtime,
					ad_id,
					customer_username,
					delivery_location,
					DATE_FORMAT(delivery_dateandtime,'%D %M %Y') as delivery_dateandtime,
					DATEDIFF(NOW(),delivery_dateandtime) as no_of_dates_expired
			FROM delivery_requests_accepted
			WHERE DATEDIFF(NOW(),delivery_dateandtime) > 0 AND company_id = '{$company_id}'
			ORDER BY accepted_dateandtime DESC";
			
		$result = $this->db->query($query);
		return  $result->result();
	}
	
	public function delivery_reject($accepted_id,$reason,$username,$company_id){
		$this->db->trans_begin();
		
		$query="SELECT *
				FROM delivery_requests_accepted
				WHERE id='{$accepted_id}' AND company_id='{$company_id}'";
				
		$result = $this->db->query($query);
		$info = $result->row_array();
		
		$data['accept_id']=$info['id'];
		$data['company_id']=$info['company_id'];
		$data['accepted_username']=$info['accepted_username'];
		$data['accepted_dateandtime']=$info['accepted_dateandtime'];
		$data['requested_dateandtime']=$info['requested_dateandtime'];
		$data['ad_id']=$info['ad_id'];
		$data['customer_username']=$info['customer_username'];
		$data['delivery_location']=$info['delivery_location'];
		$data['delivery_dateandtime']=$info['delivery_dateandtime'];
		$data['rejected_by']=$username;
		$data['rejected_reason']=$reason;
		
		$this->db->insert('delivery_requests_accepted_rejects',$data);
		
		$this->db->where('id', $accepted_id);
		$this->db->delete('delivery_requests_accepted');
		
		if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
			return false;
		}else{
		    $this->db->trans_commit();
			return true;
		} 
	}
}