<?php
    class site extends CI_Controller
    {
    	function display ($qid = 0, $offest = 0)
		{
			$this->header('Search');
			$this->load->library('pagination');			
			$limit = 5;
			
			$this->input->load_query($qid);
			
			$qarray = array(
		'title' => $this->input->get('title'),
		'category' => $this->input->get('category'),
		'sub_category' => $this->input->get('sub_category'),
		'province' => $this->input->get('province'),
		'district' => $this->input->get('district'),
		'sort_by' => $this->input->get('sort_by'),
		'low_price' => $this->input->get('low_price'),
		'high_price' => $this->input->get('high_price')
		);
		
		//print_r($qarray);
		
			
			$this->load->model('site_model');
			$this->load->model('advertisements');
		
		//print_r($this->site_model->keyword_search('abc 123')); return;	
		
			$results = $this->site_model->test123($qarray, $limit, $offest);
			
			$data['ads'] = $results['rows'];
			//$data['images'] = $results['images'];
			$data['num_ads'] = $results['num_rows'];
			$data['min_price'] = $results['min_price'];
			$data['max_price'] = $results['max_price'];
			$data['logged_in'] = 0;
			$data['avg_rate'] = 3;
			
			$config = array();
			$config['base_url'] = site_url("site/display/$qid");
			$config['total_rows'] = $data['num_ads'];
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			
			$data['category_opt'] = $this->site_model->category_opt();
			$data['sub_category_opt'] = $this->site_model->sub_category_opt();
			//$answer = $this->advertisements->getCountry();
			//$send['0']='          ';
			//foreach ($answer as $key) {$send[$key->id]=$key->name;}
			//$data['country_opt']=$send;
			
			$data['province_opt'] = $this->site_model->province_opt();
			$data['district_opt'] = $this->site_model->distirct_opt();
			
			//$data['province_opt'] = array('0' => '');
			//$data['district_opt'] = array('0' => '');
			
			$data['sort_by_opt'] = array (
			'' => '',
			'recent_post' => 'Recently Posted',
			'price' => 'Lowest Price',
			'rated' => 'Most Rated'
			);
			
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('site_view', $data);
			
			
			$this->footer();
		}
		
		function search()
		{
			$qarray = array(
		'title' => $this->input->post('title'),	
		'category' => $this->input->post('category'),
		'sub_category' => $this->input->post('sub_category'),
		'province' => $this->input->post('province'),
		'district' => $this->input->post('district'),
		'sort_by' => $this->input->post('sort_by'),
		'low_price' => $this->input->post('low_price'),
		'high_price' => $this->input->post('high_price')
		);
		
		if($qarray['sub_category']==0)
		{$qarray['sub_category']="";}
		
		if($qarray['province']==0)
		{$qarray['province']="";}
		
		if($qarray['district']==0)
		{$qarray['district']="";}
		
		if(strlen($this->input->post('title')))
		{
		$qid = $this->input->save_query($qarray);
		redirect("site/display/$qid");
		}
		else
		{redirect("site/display");}
		}

		function search01()
		{
			$qarray = array(
		'title' => $this->input->post('title'));
		
		if(strlen($this->input->post('title')))
		{
		$qid = $this->input->save_query($qarray);
		redirect("site/display/$qid");
		}
		else
		{
			redirect("home");
		}
		}
		
		function gotoad($id)
		{
			$this->load->model('site_model');
			$result = $this->site_model->getad($id);
			$data['ads'] = $result['rows'];
			
			$comments = $this->site_model->getcommnets($id);
			$data['comments'] = $comments['rows'];
			
			$this->load->view('ad_view', $data);
		}

		function add_comment ()
		{
			$qarray = array(
		'comment' => $this->input->post('comment'),
		'username' => $this->input->post('username'),
		'adid' => $this->db->get('cmid')
		);
		print_r($qarray);
		
		//$qid = $this->input->save_query($qarray);
		}
		
		public function getSubCategories()
		{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getSubcategories($this->input->post('subcatid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
		}
		
		function search02($param, $val)
		{
			$qarray = array(
		$param => $val);
		//print_r($qarray);return;
		if($param&&$val)
		{
		$qid = $this->input->save_query($qarray);
		redirect("site/display/$qid");
		}
		else
		{
			redirect("home");}
		}
		
		function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->load->view('header_admin',$data);
			}else{
				$this->load->view('header_loggedin',$data);
			}
		}
		else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	function footer(){
		$this->load->view('footer');
	}
	
	public function getDistricts()
		{
			$this->load->model('advertisements');
			$counid = $this->advertisements->getCountryConfigCountryid(base_url());
			$answer=$this->advertisements->getDistricts($counid, $this->input->post('proid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."-No District-"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
		}
		
	function ajaxsearch()
		{
			$title = $this->input->post('qtitle');
			$this->load->model('site_model');
			echo $this->site_model->suggestion($title);
		}

	function suggestions()
	    {
	        // Search term from jQuery
	    $this->load->model('site_model');
	    $term = $this->input->post('term',TRUE);
	 
	    if (strlen($term) < 2) break;
	 
	    $rows = $this->site_model->get_autocomplete($term);
	 
	    $json_array = array();
	    foreach ($rows as $row)
	         array_push($json_array, $row->title);
	 
	    echo json_encode($json_array);
			
	    }
		
	public function reportads($adid,$user){
		$this->load->model('site_model');
		$data['description']=$this->input->post('reportOtherDescription');	
		$data['type']=$this->input->post('rt');
		$data['adid']=$adid;
		$data['user']=$user;	
		
		if($this->site_model->reportads($data)){
			$stat['status']=true;
			$this->header('Profile Report - success');
			$this->load->view('v_profile_user_report',$stat);
			$this->footer();
		}else{
			$stat['status']=false;
			$this->header('Profile Report - failed');
			$this->load->view('v_profile_user_report',$stat);
			$this->footer();
		}
	}
	
	public function ads_reported($request)
	{
		if($request=='view_all'){
			$this->load->model('site_model');
			$results = $this->site_model->get_all_ad_reports();
			
			$data['ads'] = $results['rows'];
			$data['total_ad_reports'] = $this->site_model->count_total_ad_reports();
			//if($results['rows'][0]->count>0)
			{
			$this->header('Administration - User Profiles Reported');
			$this->load->view("ad_reports",$data);
			$this->footer();
			}
			//else{
			//	redirect(base_url().'administration/user_management');}
		}
	}	
	
	public function ads_reported_resolved($rid){
		$this->load->model('site_model');
		if($this->site_model->ads_reported_resolved($rid)){
			redirect(base_url().'site/ads_reported/view_all');
		}else{
			redirect(base_url().'site/ads_reported/view_all');
		}
	}
	
    }

?>