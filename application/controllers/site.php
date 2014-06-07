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
		'country' => $this->input->get('country'),
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
			$data['sub_category_opt'] = array('0' =>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
			$answer = $this->advertisements->getCountry();
			
			$send['0']='          ';
			foreach ($answer as $key) {$send[$key->id]=$key->name;}
			$data['country_opt']=$send;
			
			$data['province_opt'] = array('0' => '         ');
			$data['district_opt'] = array('0' => '         ');
			
			$data['sort_by_opt'] = array (
			'' => '',
			'recent_post' => 'Recently Posted',
			'price' => 'Lowest Price'
			);
			
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('site_view', $data);
		}
		
		function search()
		{
			$qarray = array(
		'title' => $this->input->post('title'),	
		'category' => $this->input->post('category'),
		'sub_category' => $this->input->post('sub_category'),
		'country' => $this->input->get('country'),
		'province' => $this->input->get('province'),
		'district' => $this->input->get('district'),
		'sort_by' => $this->input->post('sort_by'),
		'low_price' => $this->input->post('low_price'),
		'high_price' => $this->input->post('high_price')
		);
		
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
    }

?>