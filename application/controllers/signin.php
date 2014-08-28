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
				$data['is_logged_in'] = 1;
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
	
	public function reset_password(){
		
		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$this->load->library('form_validation');
			// first check if it's a valid email or not
			$this->form_validation->set_rules('email','Email Address','trim|required|min_length[6]|max_length[50]|valid_email|xss_clean');
			
			if ($this->form_validation->run() == FALSE) {
				// email didn't validate, send back to reset password form and show errors
				// this will likely never occur due to front end validation done on type = "email"
				$data['title']="Reset Password";
		        $this->header($data);
				$this->load->view('view_reset_password', array('error' => 'Please supply a valid email address.'));
				$this->load->view('footer');
			}
			else {
				$email = trim($this->input->post('email'));
				$this->load->model('m_signin');
				$result = $this->m_signin->email_exists($email);
				
				if ($result) {
					// if we found the email. $result is now their first name
					$this->send_reset_password_email($email, $result);
					$data['title']="Success";
					$this->header($data);
					$this->load->view('view_reset_password_sent', array('email' => $email));
					$this->load->view('footer');
				}
				else{
					$data['title']="Reset Password";
					$this->header($data);
					$this->load->view('view_reset_password', array('error' => 'Email address not registered with this website.'));
					$this->load->view('footer');
				}
			}
		}
		else{
				
				$this->header('Reset Password');
				$this->load->view('view_reset_password');
			    $this->footer();
		}
	}

	public function send_reset_password_email($email, $firstname){
			
	//	$this->load->library('email');
		$email_code = md5($this->config->item('salt') . $firstname);
		
	//	$this->email->set_mailtype('html');
	//	$this->email->from($this->config->item('bot_email'), 'CEP Project');
	//	$this->email->to($email);
	//	$this->email->subject('Please reset your password');
		
	//	$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	//	           "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
	//	           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	//	           </head><body>';
		$message = 'Dear ' . $firstname . ',';
		
		$message .= 'We want to help you reset your password! Please click here. ' . base_url() . 'login/reset_password_form/' . $email .'/'. $email_code . 'to reset your password.';
		$message .= ' Thank you!';
		
//	$message="<a href='".base_url()."/reset_password_form/hanafdo@gmail.com/f59dc300559bff68d035e097068c52cato'>click here</a>";
	
	//$this->email->message($message);
	//	$this->email->send();
	
		mail($email, 'Reset Password', $message, 'From: marketing@portal.com');
	}
	
	public function reset_password_form($email, $email_code){
		if (isset($email, $email_code)) {
			$email = trim($email);
			$email_hash = shal($email . $email_code);
			$this->load->model('m_signin');
			$verified = $this->m_signin->verify_reset_password_code($email, $email_code);
			
			if ($verified) {
				$data['title']="Update Password";
				$this->header($data);
				$this->load->view('view_update_password', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
				$this->load->view('footer');
			}
			else {
				// send back to reset_password page, not update_password, if there was a problem
				$data['title']="Update Password";
					$this->header($data);
				$this->load->view('view_reset_password', array('error' => 'There was a problem with your link. Please click it again or request 
				to reset your password again', 'email' => $email));
				$this->load->view('footer');
			}
		}
	}

	public function update_password() {
			
		if (isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])) {
			// Either a hacker or they changed their email in the email field, just die.
			die('Error updating your password');
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email_hash', 'Email Hash', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[password_conf]|xss_clean');
		$this->form_validation->set_rules('password_conf', 'Confirmed Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			// user didn't validate, send back to update password form and show errors
			$data['title']="Update Password";
			$this->header($data);
			$this->load->view('view_update_password');
			$this->load->view('footer');
		}
		else {
			// successful update
			// returns users first name if successful
			$result = $this->m_signin->update_password();
			
			if ($result) {
				$data['title']="Update Password Success";
				$this->header($data);
				$this->load->view('view_update_password_success');
				$this->load->view('footer');
			}
			else{
				$data['title']="Update Password";
				$this->header($data);
				$this->load->view('view_update_password', array('error' => 'Problem updating your password. Please contact' . 
				$this->config->item('admin_email')));
				$this->load->view('footer');
			}
		}
		
	}
	
	
}