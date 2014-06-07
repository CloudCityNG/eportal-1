<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	public function index(){
		$this->header('Register');
		$this->load->view("v_registration"); 
		$this->footer();
	}
	
	public function signup_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usertype','User type','required');
		/*$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|callback_valid_email');*/
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|is_unique[waiting_normal_users.email]|is_unique[users.email]|is_unique[waiting_business_users.email]');
		/*$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_valid_username');*/
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|is_unique[waiting_normal_users.username]|is_unique[users.username]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('confirmpassword','Confirm password','required|trim|matches[password]');
		
		if($this->input->post('usertype')=='normal'){
				$type='n';
				$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean|alpha');
				$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean|alpha');
			}
			if($this->input->post('usertype')=='business'){
				$type='b';
				$this->form_validation->set_rules('bname','Bussiness Name','required|trim|xss_clean');
			}
		
		if($this->form_validation->run()){
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
			$key=md5(uniqid());
			
			$message="<b>E - Marketing Protal</b><br />";
			$message.="Thank you for registering on our web portal.<br /><br />";
			$message.="<a href='".base_url()."registration/activate/$type/$key'>click here</a> to activate your account.";
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('jojocitytwo@gmail.com'); 
			$this->email->to($this->input->post('email'));
			$this->email->subject('E - Marketing portal');
			$this->email->message($message);

			$this->load->model('users');

			if($this->users->add_user_to_waiting($type,$key)){
				if($this->email->send()){
					$this->header('Registration - success');
					$this->load->view('v_registration_success');
					$this->footer();			
				} else {
					show_error($this->email->print_debugger());
					$this->header('Registration - email not send');
					$this->load->view('v_registration');
					$this->footer();					
				}
			}else{
				$this->header('Registration - Not added to DB');
				$this->load->view('v_registration');
				$this->footer();
			}
		}else{
			$this->header('Registration - Validation failed');
			$this->load->view('v_registration');
			$this->footer();
		}
	}

	public function activate($type,$key){
		$this->load->model('users');
		if($this->users->activation_key_valid($type,$key)){
			if($this->users->activate_user($type,$key)){
				$operations = array (
					'status' => "success",
					'message' => 'This account has being successfully activated. Please <a href="#">click here</a> to Login');
				$this->header('Account Activation - Success');
				$this->load->view("v_registration_account_activation_status",$operations);
				$this->footer();
			}else{
				$operations = array (
					'status' => 'fail',
					'message' => 'Error activating this account. Please try again later.');
				$this->header('Account Activation - Database Error');
				$this->load->view("v_registration_account_activation_status",$operations);
				$this->footer();
			}
		}else{
			$operations = array (
					'status' => 'Invalid-key',
					'message' => 'Invalid activation-key. Please specify a valid activation-key to activate an account.
									<br /><br /> This error might have being occurred because,
									<br /> 
									<ul>
										<li> This profile is already being activated.</li>
										<li> There\'s no user with this activation-key in the user-waiting list.</li>
									</ul>');
				$this->header('Account Activation - Invalid Key');
				$this->load->view("v_registration_account_activation_status",$operations);
				$this->footer();
		}
	}
	
	function header($tile){
		$data['title']=$tile;
		$this->load->view('header_not_loggedin',$data);
	}	
	
	function footer(){
		$this->load->view('footer');
	}
}