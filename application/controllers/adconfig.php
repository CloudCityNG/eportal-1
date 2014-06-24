<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adconfig extends CI_Controller {

	public function index(){
	
	}	
	public function configDetails(){
		$data['success']=false;//creation inside the DB
		$this->load->model('advertisements');
		$data['title']='Create Advertisement';
		$answer=$this->advertisements->getCategory();
		if($this->input->post('category1')){
		
			$data['cat1']=$this->input->post('category1');
		}
		else
		{
			$data['cat1']=0;
		}
		if($this->input->post('category2')){
		
			$data['cat2']=$this->input->post('category2');
		}
		else
		{
			$data['cat2']=0;
		}
		if($this->input->post('subcategory1')){
		
			$data['subcat']=$this->input->post('subcategory1');
		}
		else
		{
			$data['subcat']=0;
		}
		if($this->input->post('country1')){
		
			$data['cou1']=$this->input->post('country1');
		}
		else
		{
			$data['cou1']=0;
		}
		if($this->input->post('country2')){
		
			$data['cou2']=$this->input->post('country2');
		}
		else
		{
			$data['cou2']=0;
		}
		if($this->input->post('country3')){
		
			$data['cou3']=$this->input->post('country3');
		}
		else
		{
			$data['cou3']=0;
		}
		if($this->input->post('country4')){
		
			$data['cou4']=$this->input->post('country4');
		}
		else
		{
			$data['cou4']=$this->advertisementsgetCountryConfigCountryid(baseurl());	
		}
		if($this->input->post('province2')){
		
			$data['pro2']=$this->input->post('province2');
		}
		else
		{
			$data['pro2']=0;
		}
		if($this->input->post('province3')){
		
			$data['pro3']=$this->input->post('province3');
		}
		else
		{
			$data['pro3']=0;
		}
		if($this->input->post('district1')){
		
			$data['dis']=$this->input->post('district1');
		}
		else
		{
			$data['dis']=0;
		}
		
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post('country_submit'))
		{
		$this->form_validation->set_rules('country','New Country','required|trim|xss_clean|is_unique[country.name]');//setting rules for title
		$data['status_new_country']=false;
			if($this->form_validation->run())
			{
				
				$this->advertisements->setCountry($this->input->post('country'));
				//adding the country in the db
				$data['status_new_country']=true;
		
			}

		}
		if($this->input->post('edit_country'))
		{
			$data['status_update_country']=false;
			if($this->input->post('country1')>0)
			{
				
		$this->form_validation->set_rules('country','New Country','required|trim|xss_clean|is_unique[country.name]');//setting rules for title
		
			if($this->form_validation->run())
			{
				
				$this->advertisements->updateCountry($this->input->post('country1'),$this->input->post('country'));
				//adding the country in the db
				$data['status_update_country']=true;
				
			
			}
			}
			else
			{
				$data['error']['country']='Please select Country';
			}
		}
		if($this->input->post('province_submit'))
		{
			$data['status_new_province']=false;
			if($this->input->post('country2')>0)
			{
				$this->form_validation->set_rules('province','New Province','required|trim|xss_clean');//setting rules for title
				
				if($this->form_validation->run())
				{
					if($this->advertisements->checkProvince($this->input->post('country2'),$this->input->post('province')))
					{
					$this->advertisements->setProvince($this->input->post('country2'),$this->input->post('province'));
					//adding the country in the db
					$data['status_new_province']=true;
					}
					else
					{
						$data['error']['province']='The New Province field must contain a unique value';
					}
		
				}
			}
			else 
			{
				$data['error']['province']='Please select Country';
			}
		}
		if($this->input->post('edit_province'))
		{
			$data['status_update_province']=false;
			if($this->input->post('country2')>0)
			{
				if($this->input->post('province2')>0)
				{
					$this->form_validation->set_rules('province','Province','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkProvince($this->input->post('country2'),$this->input->post('province')))
						{
							$this->advertisements->updateProvince($this->input->post('province2'),$this->input->post('province'));
							//adding the country in the db
							$data['status_update_province']=true;
						}
						else
						{
							$data['error']['province']='The New Province field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['province']='Please select Province';
				}
				
			}
			else
			{
				$data['error']['province']='Please select Country';
			}
			
		}
		
		if($this->input->post('district_submit'))
		{
			$data['status_new_district']=false;
			if($this->input->post('country3')>0)
			{
				if($this->input->post('province3')>0)
				{
					$this->form_validation->set_rules('district','District','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district')))
						{
						$this->advertisements->setDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district'));
						//adding the country in the db
						$data['status_new_district']=true;
						}
						else
						{
							$data['error']['district']='The New District field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['district']='Please select Province';
				}
				
			}
			else 
			{
				$data['error']['district']='Please select Country';
			}
		}
		if($this->input->post('edit_district'))
		{
			$data['status_update_district']=false;
			if($this->input->post('country3')>0)
			{
				if($this->input->post('province3')>0)
				{
					if($this->input->post('district1')>0)
					{
						
						$this->form_validation->set_rules('district','District','required|trim|xss_clean');//setting rules for title
						
						if($this->form_validation->run())
						{
							if($this->advertisements->checkDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district')))
							{
								$this->advertisements->updateDistrict($this->input->post('district1'),$this->input->post('district'));
								//adding the country in the db
								$data['status_update_district']=true;
							}
							else
							{
								$data['error']['district']='The New District field must contain a unique value';
							}
			
						}
					}
					else
				 	{
						$data['error']['district']='Please select District';	
					}
				}
				else
				{
					$data['error']['district']='Please select Province';
				}
				
			}
			else
			{
				$data['error']['district']='Please select Country';
			}
			
		}
		if($this->input->post('category_submit'))
		{
		$this->form_validation->set_rules('category','New Category','required|trim|xss_clean|is_unique[category.name]');//setting rules for title
		$data['status_new_category']=false;
			if($this->form_validation->run())
			{
				
				$this->advertisements->setCategory($this->input->post('category'));
				//adding the country in the db
				$data['status_new_category']=true;
		
			}

		}
		if($this->input->post('edit_category'))
		{
			$data['status_update_category']=false;
			if($this->input->post('category1')>0)
			{
				
		$this->form_validation->set_rules('category','New Category','required|trim|xss_clean|is_unique[category.name]');//setting rules for title
		
			if($this->form_validation->run())
			{
				
				$this->advertisements->updateCategory($this->input->post('category1'),$this->input->post('category'));
				//adding the country in the db
				$data['status_update_category']=true;
				
			
			}
			}
			else
			{
				$data['error']['category']='Please select Category';
			}
		}
		if($this->input->post('subcategory_submit'))
		{
			$data['status_new_subcategory']=false;
			if($this->input->post('category2')>0)
			{
				$this->form_validation->set_rules('subcategory','New Subcategroy','required|trim|xss_clean');//setting rules for title
				
				if($this->form_validation->run())
				{
					if($this->advertisements->checkSubcategory($this->input->post('category2'),$this->input->post('subcategory')))
					{
					$this->advertisements->setSubcategory($this->input->post('category2'),$this->input->post('subcategory'));
					//adding the country in the db
					$data['status_new_subcategory']=true;
					}
					else
					{
						$data['error']['subcategory']='The New Subcategory field must contain a unique value';
					}
		
				}
			}
			else 
			{
				$data['error']['subcategory']='Please select Category';
			}
		}
		if($this->input->post('edit_subcategory'))
		{
			$data['status_update_subcategory']=false;
			if($this->input->post('category2')>0)
			{
				if($this->input->post('subcategory1')>0)
				{
					$this->form_validation->set_rules('subcategory','Subcategory','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkSubcategory($this->input->post('category2'),$this->input->post('subcategory')))
						{
							$this->advertisements->updateSubcategory($this->input->post('subcategory1'),$this->input->post('subcategory'));
							//adding the country in the db
							$data['status_update_subcategory']=true;
						}
						else
						{
							$data['error']['subcategory']='The New Subcategory field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['subcategory']='Please select Sub category';
				}
				
			}
			else
			{
				$data['error']['subcategory']='Please select Category';
			}
			
		}
		
		$answer=$this->advertisements->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		$data['category']=$send;
		$send=null;
		$send['0']='--Select--';
		if($data['cat2']>0){
		$answer=$this->advertisements->getSubCategories($data['cat2']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
		
		$answer=$this->advertisements->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
			
		}
		$data['country']=$send;
		$send=null;
		$send['0']='--Select--';
		if($data['cou2']>0){
			$answer=$this->advertisements->getProvinces($data['cou2']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province2']=$send;//loading the province in the dropdown list
		$send=null;	
		$send['0']='--Select--';
		if($data['cou3']>0){
			$answer=$this->advertisements->getProvinces($data['cou3']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province3']=$send;//loading the province in the dropdown list
		$send=null;
		$send['0']='--Select--';
		if($data['cou3']>0||$data['pro3']>0){
			$answer=$this->advertisements->getDistricts($data['cou3'],$data['pro3']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	
		$this->header('Configure Ad');
		$this->load->view('view_adconfig',$data);
		$this->footer();

	}
	/*public function country_validate(){
		$this->load->model('advertisements');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('country','Country','required|trim|xss_clean|is_unique[country.name]|alpha');//setting rules for title
		$data['success']=false;
		if($this->form_validation->run())
		{
			
			$this->advertisements->setCountry($this->input->post('country'));
			//adding the country in the db
			$data['success']=true;
				$this->load->view('header',$data);
			$this->load->view('view_adconfig');
			$this->load->view('footer');
			
			}else{
			
			$this->load->view('header',$data);
			$this->load->view('view_adconfig');
			$this->load->view('footer');
			}
		
			
		
		}	

*/
	
	function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			$this->load->view('header_loggedin',$data);
		}
		else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	function footer(){
		$this->load->view('footer');
	}


}