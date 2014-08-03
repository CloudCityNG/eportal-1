<?php

class site_model extends CI_Model{
	
	public function test123($qarray, $limit, $offest)
	{
		//results
		if($qarray['sort_by'] == 'recent_post')
		{
			$sort_by = 'createdate';
			$sort_ord = 'desc';
		}
		else if($qarray['sort_by'] == 'price')
		{
			$sort_by = 'price';
			$sort_ord = 'asc';
		}
		else
		{
			$sort_by = 'id';
			$sort_ord = 'asc';
		}

		$q = $this->db->select('advertisement.id, title, body, price, DATE_FORMAT(createdate,\'%d-%m-%Y\') as cDATE, categoryid, subcategoryid, countryid, provinceid, districtid, ', FALSE)
		-> from ('advertisement')
		//->join('images', 'images.adid = advertisement.id','left')
		->where('expired',0)
		->where('approved',1)
		->limit($limit, $offest)
		->order_by($sort_by, $sort_ord);
		
		if(strlen($qarray['title']))
		{
			//$q->like('title', $qarray['title']);
			$q->where($this->keyword_search($qarray['title']));			
		}
		
		if(strlen($qarray['low_price']))
		{
			$q->where('price >=', $qarray['low_price']);
		}
		
		if(strlen($qarray['high_price']))
		{
			$q->where('price <=', $qarray['high_price']);
		}
		
		if(strlen($qarray['category']))
		{
			$q->where('categoryid =', $qarray['category']);
		}
		
		if(strlen($qarray['sub_category']))
		{
			$q->where('subcategoryid =', $qarray['sub_category']);
		}
		
		if(strlen($qarray['province']))
		{
			$q->where('provinceid =', $qarray['province']);
		}
		
		if(strlen($qarray['district']))
		{
			$q->where('districtid =', $qarray['district']);
		}
		
		$ret['rows'] = $q->get()->result();
		
		//rating
		$this->load->model('rating_m');
		
		$i=0;
		foreach($ret['rows'] as &$row)
		{
		$results = $this->rating_m->get_rate($row->id, "");	
	    $row->avg_rate = $results['avg_rate'];
		$row->total_rate = $results['total_rate'];
		}

		if($qarray['sort_by'] == 'rated')
		{
			usort($ret['rows'], array($this, "cmp"));
		}
		
		//images
		foreach ($ret['rows'] as &$row) {
			$results = $this->db->get_where('images',array('adid'=>$row->id))->result();
			if($results)
			{
				$temp = $results[0];
				$row->image = $temp->Image;
			}
		}
		
		//count
		$q = $this->db->select('COUNT(*) as count', FALSE)
		-> from ('advertisement')
		->where('expired',0)
		->where('approved',1);
		
		if(strlen($qarray['title']))
		{
			//$q->like('title', $qarray['title']);
			$q->where($this->keyword_search($qarray['title']));
		}
		
		if(strlen($qarray['low_price']))
		{
			$q->where('price >=', $qarray['low_price']);
		}
		
		if(strlen($qarray['high_price']))
		{
			$q->where('price <=', $qarray['high_price']);
		}

		if(strlen($qarray['category']))
		{
			$q->where('categoryid = ', $qarray['category']);
		}
		
		if(strlen($qarray['sub_category']))
		{
			$q->where('subcategoryid =', $qarray['sub_category']);
		}
		
		if(strlen($qarray['province']))
		{
			$q->where('provinceid =', $qarray['province']);
		}
		
		if(strlen($qarray['district']))
		{
			$q->where('districtid =', $qarray['district']);
		}
		
		$temp = $q->get()->result();
		
		$ret['num_rows'] = $temp[0]->count;
		
		//minprice
		$q = $this->db->select('MIN(price) as min', FALSE)
		-> from ('advertisement');
		
		if(strlen($qarray['title']))
		{
			//$q->like('title', $qarray['title']);
			$q->where($this->keyword_search($qarray['title']));
		}
		
		$temp = $q->get()->result();
		
		$ret['min_price'] = $temp[0]->min;
		
		//maxprice
		$q = $this->db->select('MAX(price) as max', FALSE)
		-> from ('advertisement');
		
		if(strlen($qarray['title']))
		{
			//$q->like('title', $qarray['title']);
			$q->where($this->keyword_search($qarray['title']));
		}
		
		$temp = $q->get()->result();
		
		$ret['max_price'] = $temp[0]->max;

		
		return $ret;
	}
	  
    public function category_opt()
	{
		$cat_row= $this->db->select('id,name')
		->from('category')
		->get()->result();
		
		$categroy_opt = array('' => '');
		
		foreach ($cat_row as $row) {
			$categroy_opt[$row->id] = $row->name;
			
			
		}
		return $categroy_opt;
	}
	
	public function sub_category_opt()
	{
		$subcat_row= $this->db->select('id,name')
		->from('subcategory')
		->where('categoryid',$this->input->get('category'))
		->get()->result();
		
		$sub_categroy_opt = array('' => '');
		
		foreach ($subcat_row as $row) {
			$sub_categroy_opt[$row->id] = $row->name; 
			
		} 
		return $sub_categroy_opt;
	}

	public function province_opt()
	{
		$this->load->model('advertisements');
		$counid = $this->advertisements->getCountryConfigCountryid(base_url());
		$pro_row= $this->db->select('id,name')
		->from('province')
		->where('countryid',$counid)
		->get()->result();
		
		$province_opt = array('' => '');
		
		foreach ($pro_row as $row) {
			$province_opt[$row->id] = $row->name;
			
			
		}
		return $province_opt;
	}
	
	public function distirct_opt()
	{
		$this->load->model('advertisements');
		$counid = $this->advertisements->getCountryConfigCountryid(base_url());
		$dis_row= $this->db->select('id,name')
		->from('district')
		->where('countryid',$counid)
		->where('provinceid',$this->input->get('province'))
		->get()->result();
		
		$distirct_opt = array('' => '');
		
		foreach ($dis_row as $row) {
			$distirct_opt[$row->id] = $row->name;
			
			
		}
		return $distirct_opt;
	}
	
	public function keyword_search($string)
	{
		$words = explode(' ', trim($string));
		$searchFields = array('title', 'body');
		
		$where_string='';
		foreach ($words as $word) {
    		foreach ($searchFields as $field) {
        	$where_string .= ' OR ' . $field . ' LIKE \'%' . $word . '%\'';
    		}
    }
    // Remove first ' OR ' and close parenthesis
    $where_string = '('.substr($where_string, 3) . ')';
     
	 return $where_string;
		
	}
	
	public function getad($id)
	{
	
	 $q = $this->db->select('id, title, body, price, DATE_FORMAT(createdate,\'%d-%m-%Y\') as cDATE', FALSE)
		-> from ('advertisement')
		->where('id =', $id);
		
		
	$ret['rows'] = $q->get()->result();
	
	return $ret;	
	}
	
	public function getcommnets($id)
	{
	
	 $q = $this->db->select('cmid, comment, username, DATE_FORMAT(createdate,\'%d-%m-%Y\') as cDATE', FALSE)
		-> from ('comments')
		->where('adid =', $id)
		->order_by ('createdate');
		
	$ret['rows'] = $q->get()->result();
	
	//fullname
		
		$i=0;
		foreach($ret['rows'] as &$row)
		{
		$results = $this->get_fullname($row->username);
	    $row->fullname = $results;
		//$row->total_rate = $results['total_rate'];
		}
		
		foreach ($ret['rows'] as &$row) {
			$results = $this->db->get_where('user_details',array('username'=>$row->username))->result();
			if($results)
			{
				
				$temp = $results[0];
				if($temp->profilepicture==null)
				{
				$row->image = "default_profile.jpg";	
				}
				else
				{$row->image = $temp->profilepicture;}
			}
		}
	
	return $ret;	
	}
	
	public function get_rate($adid,$username)
	{
		$q = $this->db->get_where('rating', array('adid' => $adid));
		
		$rating = array('star1'=>0,'star2'=>0,'star3'=>0,'star4'=>0,'star5'=>0,);
		$ret['total_rate'] = 0;
		
		foreach ($q->result() as $row)
		{
				
			if($row->rate!=null)
			{
				if($row->rate==1)
				{$rating['star1']++;}
				if($row->rate==2)
				{$rating['star2']++;}
				if($row->rate==3)
				{$rating['star3']++;}
				if($row->rate==4)
				{$rating['star4']++;}
				if($row->rate==5)
				{$rating['star5']++;}
			}
			$ret['total_rate']++;
		}
		
		$ret['avg_rate'] = (1*$rating['star1']+2*$rating['star2']+3*$rating['star3']+4*$rating['star4']+5*$rating['star5'])/$ret['total_rate'];
		
		$q = $this->db->get_where('rating', array('adid' => $adid, 'username' => $username));
		
		$temp = $q->result();
		if($temp)
		{	
		$ret['rate'] = $temp[0]->rate;
		$ret['is_rated'] = 1;
		}
		else {
		$ret['rate'] = 0;
		$ret['is_rated'] = 0;
		}
		
		return $ret;
	}
	
	public function del_comment($cmid)
	{
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->db->delete('comments', array('cmid' => $cmid));
			}else{
				$q=$this->db->select('username')
				->get_where('comments', array('cmid' => $cmid));
				$username=$q->result();
				if($username[0]->username==$this->session->userdata('username'))
				{$this->db->delete('comments', array('cmid' => $cmid));}
				else {return false;}
			}
		}
		else{
			return false;
		}
		
		
		
		//$this->db->select('username');
		//$this->db->get_where('comments', );
		//$this->db->delete('comments', array('cmid' => $cmid));
	}

	function get_fullname($username){
		$this->load->model('admin');
		$this->load->model("m_signin");
		$usertype = $this->admin->get_report_info_usertype($username);
		
		foreach($usertype as $userTyp){
			$usertype = $userTyp->usertype;
		}
		
		$name = $this->m_signin->get_user_dataset_type_2($usertype,$username);
		foreach ($name as $info){
			$name = $info->name;
		}
		
		return $name;
	}
	
	function suggestion($title)
	{
		$q = $this->db->select('title, categoryid', FALSE)
		-> from ('advertisement')
		->like('title', $title)
		->limit(5)
		->get();
		
		if($q->num_rows()>0)
		{
			$output = '<ul>';
			foreach($q->result() as $row)
			{
				$output .= '<li>'.$row->title.'</li>'; 
			}
			$output .= '</ul>';
			return $output;
		}
		//else {return '';}
	}
	
	function get_autocomplete($term)
	{
		$this->db->select('id, title');
		$this->db->like('title', $term);
		$q = $this->db->get('advertisement');
		return  $q->result();
		
	}
	
	function cmp($a, $b)
	{
    if ($a->total_rate == $b->total_rate) {
        return 0;
    }
    
    return ($a->total_rate < $b->total_rate) ? 1 : -1;
	}
	
	function best_match($array, $title)
	{
		foreach($array as &$row)
		{
			$row->hits = 0;
		}
		$words = explode(' ', trim($array->title));
		$title_words = explode(' ', trim($title));
		
		foreach ($title_words as $term) {
    		foreach ($words as $word) {
        		if(strcmp($word, $term))
					$array->hits++;
    		}
    	}	
    
	}
	
	function cmp2($a, $b)
	{
    if ($a->hits == $b->hits) {
        return 0;
    }
    
    return ($a->hits < $b->hits) ? 1 : -1;
	}
}
?>