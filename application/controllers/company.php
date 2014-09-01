<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	
	public function index()
	{
		$this->home_page();
	}
	
	public function by_id($companyid=null){
		if($companyid!=null){
			$basic = $this->get_company_basic_details($companyid);
			$address = $this->get_company_address_details($companyid);
			$contact = $this->get_company_contact_details($companyid);
			$email = $this->get_company_email_details($companyid);
			
			foreach ($basic as $key=>$value) {
				$data['company']['basic_details']['id'] = $value->id;
				$data['company']['basic_details']['company_name'] = $value->company_name;
				$data['company']['basic_details']['profile_picture'] = $value->profile_picture;
				$data['company']['basic_details']['description'] = $value->description;
				$data['company']['basic_details']['registered_dateandtime'] = $value->registered_dateandtime;
			}
			
			foreach ($address as $key=>$value) {
				$data['company']['address_details'][$key]['address_line_1'] = $value->address_line_1;
				$data['company']['address_details'][$key]['address_line_2'] = $value->address_line_2;
				$data['company']['address_details'][$key]['identity_name'] = $value->identity_name;
			}
			
			foreach ($contact as $key=>$value) {
				$data['company']['contact_details'][$key]['contact_number'] = $value->contact_number;
				$data['company']['contact_details'][$key]['identity_name'] = $value->identity_name;
			}
			
			foreach ($email as $key=>$value) {
				$data['company']['email_details'][$key]['email'] = $value->email;
				$data['company']['email_details'][$key]['identity_name'] = $value->identity_name;
			}
			
			$this->header('Delivery - Company');
			$this->load->view('v_delivery_company_profile',$data);
			$this->footer();
		}else{
			show_404();			
		}
	}
	
	public function create(){
		
	}
	
	
	private function home_page(){
		if($company_id = $this->session->userdata('company_id')){
			$this->load->model('m_company');
			
			$outdated = $this->m_company->get_counters_outdated($company_id);
			$pending = $this->m_company->get_counters_pending($company_id);
			$today = $this->m_company->get_counters_deliveries_today($company_id);
			$today_deliveries = $this->m_company->get_deliveries_today($company_id);
			
			
			foreach($outdated as $datarow){$data['counts']['outdated'] = $datarow->count;}
			foreach($pending as $datarow){$data['counts']['pending'] = $datarow->count;}
			foreach($today as $datarow){$data['counts']['today'] = $datarow->count;}
			foreach($today_deliveries as $key=>$value){
				$data['deliveries_today'][$key]['id'] = $value->id;
				$data['deliveries_today'][$key]['ad_id'] = $value->ad_id;
				$data['deliveries_today'][$key]['customer_username'] = $value->customer_username;
				$data['deliveries_today'][$key]['customer_name'] = $this->setup_names('client',$value->customer_username);
				$data['deliveries_today'][$key]['delivery_location'] = $value->delivery_location;
			}
			
			$this->header('Pending deliveries');
			$this->load->view('v_delivery_home',$data);
			$this->footer();	
		}else{
			show_404();
		}
	}
	
	private function get_company_basic_details($companyid){
		$this->load->model('m_company');
		return $this->m_company->get_basic_details($companyid);
	}
	
	private function get_company_address_details($companyid){
		$this->load->model('m_company');
		return $this->m_company->get_address_details($companyid);
	}
	
	private function get_company_contact_details($companyid){
		$this->load->model('m_company');
		return $this->m_company->get_contact_details($companyid);
	}
	
	private function get_company_email_details($companyid){
		$this->load->model('m_company');
		return $this->m_company->get_email_details($companyid);
	}
	
	private function setup_names($type,$username){
		if($type=='client'){
			$this->load->model('m_clients');
			$usertype = $this->m_clients->get_usertype($username);
			foreach($usertype as $info){$usertype = $info->usertype;}
			$name = $this->m_clients->get_name($usertype,$username);
			foreach ($name as $info){$name = $info->name;}
			return $name;
		}else if($type=='delivery'){
			$this->load->model('m_company');
			$usertype = $this->m_company->get_usertype($username);
			foreach($usertype as $info){$usertype = $info->usertype;}
			$name = $this->m_company->get_name($usertype,$username);
			foreach ($name as $info){$name = $info->name;}
			return $name;
		}else{
			return 'the return :P ';
		}
	}
	
	private function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->load->view('header_admin',$data);
			}else{
				$this->load->view('header_loggedin_delivery',$data);
			}
		}else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	private function footer()
	{
		$this->load->view('footer_delivery');
	}
}