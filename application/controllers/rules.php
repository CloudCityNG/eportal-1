<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends CI_Controller {
	
	public function index()
	{
		$this->header('Select Fields');
		$this->load->view("v_select_rules");
		$this->footer();
	}
	
	public function new_ads()
	{
		if( $this->input->post('continue')){
			$title = $this->input->post('title');
            $body = $this->input->post('body');
            $add  = $this->input->post('address');
            $tel  = $this->input->post ('tel');
			$img  = $this->input->post ('img');
		
		$this->load->model('m_rules');
        $this->m_rules->addCheck($title, $body, $add, $tel, $img);
		}
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('View Fields');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	public function back(){
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('View Fields');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	public function editAd($adid)
	{
		/*if(!isset($adid))
		{
			redirect(base_url().'advertisement/adList');	
		}

		if(!$this->session->userdata('username'))
		{
				redirect(base_url().'signin');
		}*/
		$this->load->model('m_rules');
		$answer1=$this->m_rules	->getAdvertisement($adid);
		/*if($answer1!=null&&$this->session->userdata('username')!=$answer1['username'])
		{
			redirect(base_url().'advertisement/adList');
		}*/		
		
		$this->load->model('m_rules');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[14]');//setting rules for price
		
	
		$data['title']='Edit Advertisement';
		$data['success']=false;
		$data['ad_id']=$adid;
		$data['title1']=$answer1['title'];
		$data['body']=$answer1['body'];
		$data['address']=$answer1['address'];
		$data['telephone']=$answer1['telephone'];
		$data['price']=$answer1['price'];
		if($this->input->post('category')){
		
			$data['cat']=$this->input->post('category');
		}
		else
		{
			$data['cat']=$answer1['categoryid'];
		}
		if($this->input->post('subcategory')){
		
			$data['subcat']=$this->input->post('subcategory');
		}
		else
		{
			$data['subcat']=$answer1['subcategoryid'];
		}
		if($this->input->post('country')){
		
			$data['cou']=$this->input->post('country');
		}
		else
		{
			$data['cou']=$answer1['countryid'];
		}
		if($this->input->post('province')){
		
			$data['pro']=$this->input->post('province');
		}
		else
		{
			$data['pro']=$answer1['provinceid'];
		}
		if($this->input->post('district')){
		
			$data['dis']=$this->input->post('district');
		}
		else
		{
			$data['dis']=$answer1['districtid'];
		}
		/*if($this->input->post('duration')){
		
			$data['dur']=$this->input->post('duration');
		}
		else
		{
			$data['dur']=14;
		}*/

		if($this->input->post('advertisment_submit'))
		{
			
			if($this->form_validation->run())
			{
				$data['state']='upload';
			}
			/*{//if validations are comppleted
			
				
				
				$adid=uniqid();
				$this->session->set_userdata('ad_id',$adid);
				$this->advertisements->setAdvertisement(
				$adid,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				$this->input->post('country'),
				$this->input->post('district'),
				$this->input->post('province'),
				$this->input->post('price'),
				$this->input->post('address'),
				date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				$data['success']=true;
				//}
			
			}*/
		}
		
			if($this->input->post('Finish_submit'))
			{
				$data['state']='upload';
				if(!$this->form_validation->run())
				{
					$data['state']='data';
				}
				else
				{
				$this->advertisements->updateAdvertisement(
				$adid,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				$this->input->post('country'),
				$this->input->post('district'),
				$this->input->post('province'),
				$this->input->post('price'),
				$this->input->post('address'),
				$this->input->post('telephone'),
				$this->session->userdata('email'),
				$this->session->userdata('username')
				//date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				//$data['success']=true;
				//}
					$data['success']=true;
				}
			}
			if($this->input->post('back'))
			{
				redirect('/rules/back');
				//$data['state']='data';
	
			}
			
			
			if($this->input->post('advertisment_accept'))
			{
				redirect('/rules/accept_ad/'.$adid);
				//$data['state']='data';
	
			}
				
				if($this->input->post('image_submit'))
				{
					$data['state']='upload';
					$this->advertisements->do_edit_upload('skds',$adid);
				
				}
				
			
				$imagedata=$this->m_rules->get_edit_images($adid);
				$images=array();
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				$imagedata=$this->m_rules->get_images($adid);
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				
				$data['images']=$images;
		
		//$data['titles']='Create Advertisement';
		$answer=$this->m_rules->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['category']=$send;//loading categories in the dropdown list
		$send=null;
		
		
		$send['0']='--Select--';
		if($data['cat']>0){
		$answer=$this->m_rules->getSubCategories($data['cat']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
				
		$answer=$this->m_rules->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
			
		}
		$data['country']=$send;
		$send=null;
		
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->m_rules->getProvinces($data['cou']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';
		if($data['cou']>0||$data['pro']>0){
			$answer=$this->m_rules->getDistricts($data['cou'],$data['pro']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	
		$data['title']='Edit Ad';
		$this->header('Edit Ad');
		$this->load->view('v_view_fields',$data);
		$this->footer();
	
			
			
		
	}
	
	/*	
	public function viewAd($adid)//view for displaying ads
		{
			$this->load->model('advertisements');
			$answer1;
			if(!isset($adid)&&($this->advertisements->getAdvertisement($adid)==null))
			{
				
				
				redirect('/advertisement/adList');
			
			}
			$imagedata=$this->advertisements->get_images($adid);
				$images=array();
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
			$data['images']=$images;
			$answer1=$this->advertisements->getAdvertisement($adid);
			$data['Title']=$answer1['title'];
			$data['body']=$answer1['body'];
			$data['price']=$answer1['price'];
			$data['email']=$answer1['email'];
			
			$this->load->model('site_model');			
			$comments = $this->site_model->getcommnets($adid);
			$data['comments'] = $comments['rows'];
			
			$this->header('View Ad');
			$this->load->view('v_view_fields',$data);
			$this->footer();
			
		}
	*/
	
	public function accept_ad($adid){
		$this->load->model('m_rules');
        $this->m_rules->accept_ad($adid);
		
		$this->back();
	}
	
	function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){$this->load->view('header_loggedin',$data);}
		else{$this->load->view('header_not_loggedin',$data);}
	}	
	
	function footer(){
		$this->load->view('footer');
	}
}