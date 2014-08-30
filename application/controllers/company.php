<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	
	public function index()
	{
		
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
			$this->load->view('v_profile',$data);
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
	
	public function contributers($view=null){
		if($view==null){
			echo 'asda';
		}else if($view=='add'){
			
		}else if($view=''){
			
		}else{
			
		}
	}
	
	private function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->load->view('header_admin',$data);
			}else{
				$this->load->view('header_loggedin',$data);
			}
		}else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	private function footer()
	{
		$this->load->view('footer');
	}
}