<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {
	
	public function index()
	{
		$this->header('Sign in');
		$this->load->view("v_signin");
		$this->footer();
	}
	
	public function signin_validation() // validates the input rmail and password 
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run()){ // run() function will return true only when all rules have been verified
			
			$this->load->model('m_signin');
			
			$dataset1 = $this->m_signin->get_user_dataset_type_1($this->input->post('email'),md5($this->input->post('password')));
			foreach ($dataset1 as $info) {
				$data['username'] = $info->username; 
				$data['usertype'] = $info->usertype;
				$data['email'] = $info->email;	
			}
			
			$dataset2 = $this->m_signin->get_user_dataset_type_2($data['usertype'],$data['username']);
			foreach ($dataset2 as $info){
				$data['name'] = $info->name;	
			}
			
			$this->session->set_userdata($data);
			redirect('home'); // redirect to members view
		}
		else{ // if the validation fails load the login view again
			$this->header('Sign in');
			$this->load->view('v_signin');
			$this->footer();
		}
	}
	
	function validate_credentials() 
	{
		$this->load->model('m_signin');
		if($this->m_signin->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials','Incorrect Email address and/or password.');
			return false;
		}
	}
	
	public function signout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	function header($tile){
		$data['title']=$tile;
		$this->load->view('header_not_loggedin',$data);
	}	
	
	function footer(){
		$this->load->view('footer');
	}
}