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
		
		function reserved_count()
		{
			//reserved ads
			$q = $this->db->select('adid, DATE_FORMAT(bookdate,\'%d-%m-%Y\') as bDATE', FALSE)
			-> from ('cart')
			->where('username','hutMUG');
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
			foreach ($ret['rows'] as &$row) {
			$q = $this->db->select('title, price, username as owner, DATE_FORMAT(createdate,\'%d-%m-%Y\') as cDATE', FALSE)
			-> from ('advertisement')
			->where('id',$row->adid);
			$results = $q->get()->result();
			
			if($results)
				{
					$temp = $results[0];
					$row->title = $temp ->title;
					$row->price = $temp ->price;
					$row->owner = $temp ->owner;
					$row->cDATE = $temp ->cDATE;
					
				}
			}
			
			//count	
			$q = $this->db->select('COUNT(*) as count', FALSE)
				-> from ('cart')
				->where('username','hutMUG');
				
			$temp = $q->get()->result();
		
			$ret['num_rows'] = $temp[0]->count;	
			return $ret;
		}
}
?>