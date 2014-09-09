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
		$this->header_two('Create new delivery company');
		$this->load->view('v_delivery_signup');
		$this->footer();
	}

	public function create_submit(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name','Company name','required|trim|xss_clean');
		$this->form_validation->set_rules('contact_number','Contact number','required|trim|xss_clean|numeric||min_length[9]|max_length[10]');
		$this->form_validation->set_rules('email','Email address','required|trim|xss_clean|valid_email');
		$this->form_validation->set_rules('address_one','Address line one','required|trim|xss_clean');
		$this->form_validation->set_rules('address_two','Address line two','required|trim|xss_clean');
		
		if($this->form_validation->run()){
			
			$company_name=$this->input->post('company_name');
			$contact_number=$this->input->post('contact_number');
			$email=$this->input->post('email');
			$address_one=$this->input->post('address_one');
			$address_two=$this->input->post('address_two');
			
			$this->load->model('m_company');
			
			if($queryResult = $this->m_company->create_new_company($company_name,$this->session->userdata('username'))){
					
				foreach($queryResult as $result){$company_id = $result->id;}
				
				if($this->m_company->new_company_owner($company_id,$this->session->userdata('username')) &&$this->m_company->new_company_email($company_id,$email,$this->session->userdata('username')) && $this->m_company->new_company_address($company_id,$address_one,$address_two,$this->session->userdata('username')) && $this->m_company->new_company_contact($company_id,$contact_number,$this->session->userdata('username'))){
					$session_data = $this->session->userdata('ci_session');
					$session_data['company_id'] = $company_id;
					$session_data['company_name'] = $company_name;
					$this->session->set_userdata($session_data);
					
					redirect(base_url().'company/'.$company_id);
				}else{
					show_error('error while processing your profile requests');
				}
			}else{
				show_error('error while processing your request');
			}
		}else{
			$this->create();
		}
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

	public function customer_email(){
		$this->header('Send comapany emails');
		$this->load->view('v_delivery_send_customer_email');
		$this->footer();
	}
	
	public function send_customer_email(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run()){
			$title = $this->input->post('title');
			$message = $this->input->post('message');
			
			$this->send_delivery_client_mail($title,$message);
			
			echo 'sucess';
		}else{
			$this->customer_email();
		}
	}

	public function send_delivery_client_mail($title,$message){
		$this->load->model('m_company');
		
		$emails = $this->m_company->get_delivery_client_email($this->session->userdata('company_id'));
		
		$cid = $this->session->userdata('company_id');
		$cname = $this->session->userdata('company_name') ;
		
		$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'jojocitytwo@gmail.com',
			  	'smtp_pass' => 'jojocity',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('jojocitytwo@gmail.com'); 
			$this->email->subject('E - Marketing portal');
			$message="<b>";
			$message.=$title;
			$message.="</b><br />";
			$message.=$message;
			$message.="<br /><br />";
			$message.="This message was sent to you by <a href='".base_url()."company/$cid'>$cname</a>";
			$this->email->message($message);
		
		foreach($emails as $email){
			$this->email->to($email->email);
			$this->email->send();
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
	
	private function header_two($tile){
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
		$this->load->view('footer_delivery');
	}
}