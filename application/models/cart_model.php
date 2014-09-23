<?php

class cart_model extends CI_Model{
   
   function add_to_cart ($adid)
		
		{
		
		$username = $this->session->userdata('username');
		
		if(strlen($adid)&& strlen($username))
		{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
			
		$qarray = array(
		'username' => $username,
		'adid' => $adid,
		'bookdate' => mdate($datestring, $time)
		);
				
		$q1 = $this->db->insert('cart', $qarray); 
		if($q1){return true;} 
		else {return false;	}
		}
		
		}
		
		function get_reserved()
		{
			$username = $this->session->userdata('username');
			//reserved ads
			$q = $this->db->select('cartid, adid, DATE_FORMAT(bookdate,\'%d-%m-%Y\') as bDATE', FALSE)
			-> from ('cart')
			->where('username',$username);
			$ret['rows'] = $q->get()->result();
			
			//images
			foreach ($ret['rows'] as &$row) {
			$results = $this->db->get_where('images',array('adid'=>$row->adid))->result();
			if($results)
				{
					$temp = $results[0];
					$row->image = $temp->Image;
				}
			}
			
			//ad_details
			$this->load->model('site_model');
			foreach ($ret['rows'] as &$row) {
			$q = $this->db->select('title, price, username as owner, districtid, provinceid, DATE_FORMAT(createdate,\'%d-%m-%Y\') as cDATE', FALSE)
			-> from ('advertisement')
			->where('id',$row->adid);
			$results = $q->get()->result();
			
			if($results)
				{
					$temp = $results[0];
					$row->title = $temp ->title;
					$row->price = $temp ->price;
					$row->owner = $temp ->owner;
					$row->owner_name = $this->site_model->get_fullname($temp->owner);
					$row->cDATE = $temp ->cDATE;
					
					$this->db->where('id',$temp ->provinceid);
					$result=$this->db->get('province');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['province']=$answer['name'];
			}
			else
				{$data['province']='';}
			
			$this->db->where('id',$temp ->districtid);
			$result=$this->db->get('district');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['district']=$answer['name'];
			}
			else
				{$data['district']='';}
				
			if($data['district']==NULL || $data['province']==NULL)
			{
				$data['location']= 'Not Specified';
			}
			else{$data['location']= $data['district'].', '.$data['province'];}
					
					$row->location=$data['location'];
				}
			}
			
			//count	
			$q = $this->db->select('COUNT(*) as count', FALSE)
				-> from ('cart')
				->where('username',$username);
				
			$temp = $q->get()->result();
		
			$ret['num_rows'] = $temp[0]->count;	
			return $ret;
		}

		function remove_item($adid)
		{
			$username = $this->session->userdata('username');
		
		if(strlen($adid)&& strlen($username))
		{
		/*$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
			
		$qarray = array(
		'username' => $username,
		'adid' => $adid,
		'bookdate' => mdate($datestring, $time)
		);*/
				
		$q1 = $this->db->delete('cart', array('adid' => $adid,'username' => $username)); 
		if($q1){return true;} 
		else {return false;	}
		}
		}
		
		function delete_cart()
		{
			$username = $this->session->userdata('username');
		
		if(strlen($username))
		{		
		$q1 = $this->db->delete('cart', array('username' => $username)); 
		if($q1){return true;} 
		else {return false;	}
		}
		}

		function reserved_ad($adid)
		{
			$q = $this->db->select('adid, username, DATE_FORMAT(bookdate,\'%d-%m-%Y\') as bDATE', FALSE)
			-> from ('cart')
			->where('adid',$adid);
			$ret['rows'] = $q->get()->result();
			
			return $ret['rows'][0]; 
		}
}
?>