<?php
    class history_model extends CI_Model{
   
   function get_bought ()
		
		{
		
		$username = $this->session->userdata('username');
		
		if(strlen($username))
		{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
			
		
				
		$q1 = $this->db->select('buyer,seller,adid, DATE_FORMAT(boughtdate,\'%d-%m-%Y\') as bDATE', FALSE)
			->from ('history')
			->where('buyer',$username);
			$ret['rows'] = $q1->get()->result();
			
		//count	
			$q = $this->db->select('COUNT(*) as count', FALSE)
				-> from ('history')
				->where('buyer',$username);
				
			$temp = $q->get()->result();
		
			$ret['num_rows'] = $temp[0]->count;	
			
			return $ret;
		
		}
		
		}
		
	function view_sold ()
		
		{
		
		$username = $this->session->userdata('username');
		
		if(strlen($username))
		{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
			
		
				
		$q1 = $this->db->select('buyer,seller,adid, DATE_FORMAT(boughtdate,\'%d-%m-%Y\') as bDATE', FALSE)
			->from ('history')
			->where('seller',$username);
			$ret['rows'] = $q1->get()->result();
			
		//count	
			$q = $this->db->select('COUNT(*) as count', FALSE)
				-> from ('history')
				->where('seller',$username);
				
			$temp = $q->get()->result();
		
			$ret['num_rows'] = $temp[0]->count;	
			
			return $ret;
		}
		
		}
		
	function add_to_purchase()
	{
		$username = $this->session->userdata('username');
			//reserved ads
			$q = $this->db->select('cartid, adid, DATE_FORMAT(bookdate,\'%d-%m-%Y\') as bDATE', FALSE)
			-> from ('cart')
			->where('username',$username);
			$ret['rows'] = $q->get()->result();
			
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();
			
			foreach ($ret['rows'] as $row)
			{
			$q = $this->db->select('username as owner', FALSE)
			-> from ('advertisement')
			->where('id',$row->adid);
			$results = $q->get()->result();	
				
						
			$data = array(
			'boughtdate' => mdate($datestring, $time),
			'buyer' => $username,
			'adid' => $row->adid,
			'seller' =>	$results[0]->owner		
			);
			
			$q1 = $this->db->insert('history',$data);
			
			}
			
			
	}
		
	}
?>