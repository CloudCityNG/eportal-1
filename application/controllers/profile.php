<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index($username){
		$this->header('Profile');
		$data = $this->profile_details($username);
		$this->load->view('v_profile_user',$data);
		$this->footer();
	}
	
	private function profile_details($username){
		$this->load->model("users");
		$this->load->model("m_signin");
		
		$data['p_username'] = $username;
		$data['p_own']=false;
		if($this->session->userdata('username')==$username){$data['p_own']=true;}
		$dataset = $this->users->get_main_details($username);
		foreach ($dataset as $info){
			$data['p_email'] = $info->email;
			$data['p_usertype'] = $info->usertype;
			$data['p_prfilepicture'] = $info->profilepicture;
			$data['p_telemarketer'] = $info->telemarketer;
			$data['p_description'] = $info->description;
			$data['p_add_ln_1'] = $info->add_ln_1;
			$data['p_add_ln_2'] = $info->add_ln_2;
			$data['p_add_ln_3'] = $info->add_ln_3;
		}
		
		$dataset2 = $this->m_signin->get_user_dataset_type_2($data['p_usertype'],$data['p_username']);
		foreach ($dataset2 as $info){
			$data['p_name'] = $info->name;
		}
		return $data;
	}
	
	public function update(){
		if($this->session->userdata('username')!=NULL){
			$this->header('Profile Update');
			$data = $this->profile_details($this->session->userdata('username'));
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}else{
			redirect(base_url().'home');
		}
		
	}
	
	public function update_profilepicture(){
		$config['upload_path'] ='./images/prifilepictures/';
		$config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG';
		$config['max_size']	= '5120'; //5mb
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload())
		{
			$profilepicdata = array('upload_data' => $this->upload->data());
			$this->load->model("users");
			$this->users->add_user_profilepicture_admin_confirm($profilepicdata['upload_data']['file_name'],$this->session->userdata('username'),$this->session->userdata('usertype'));
			$data = $this->profile_details($this->session->userdata('username'));
			$this->header('Profile Update');
			$data['status_update_profilepicture']=TRUE;
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}
		else
		{
			$this->header('Profile Update');
			$data = $this->profile_details($this->session->userdata('username'));
			$data['upldPrfPicErr'] = $this->upload->display_errors();
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}
	}

	public function update_basicdetails(){
		$this->load->library('form_validation');
		if($this->session->userdata('usertype')=='n'){
				$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean|alpha');
				$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean|alpha');
			}
			if($this->session->userdata('usertype')=='b'){
				$this->form_validation->set_rules('bname','Bussiness Name','required|trim|xss_clean');
			}
		if($this->form_validation->run()){
			$this->load->model("users");
			if($this->users->add_basicdetails_admin_confirm($this->session->userdata('usertype'),$this->session->userdata('username'))){
				$this->header('Profile Update - basicdetails success');
				$data = $this->profile_details($this->session->userdata('username'));
				$data['status_update_basicdetails']=TRUE;
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}else{
				//not added to database
				$this->header('Profile Update - basicdetails not added to database');
				$data = $this->profile_details($this->session->userdata('username'));
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}
		}else{
			$this->header('Profile Update - validations failed');
			$data = $this->profile_details($this->session->userdata('username'));
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}
	}
	
	public function update_profiledetails(){
		$this->load->model('users');
		if($this->users->add_profiledetails_admin_confirm($this->session->userdata('username'),$this->session->userdata('usertype'))){
			$this->header('Profile Update - sucess');
			$data = $this->profile_details($this->session->userdata('username'));
			$data['status_update_profiledetails']=TRUE;
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}else{
			$this->header('Profile Update - not added to database');
			$data = $this->profile_details($this->session->userdata('username'));
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}
	}
	
	public function update_password(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','current Password','required|trim|callback_validate_password');
		$this->form_validation->set_rules('newpassword','new password','required|trim|callback_validate_equality');
		$this->form_validation->set_rules('newconfirmpassword','confirm password','required|trim|matches[newpassword]');
		
		if($this->form_validation->run()){
			$this->load->model('users');
			if($this->users->add_reset_passowrd_admin_confirm($this->session->userdata('username'),md5($this->input->post('newpassword')),$this->session->userdata('usertype'))){
				$this->header('Profile Update - success');
				$data = $this->profile_details($this->session->userdata('username'));
				$data['status_update_password']=TRUE;
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}else{
				$this->header('Profile Update - not added to database');
				$data = $this->profile_details($this->session->userdata('username'));
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}
		}else{
				$this->header('Profile Update - validation failed');
				$data = $this->profile_details($this->session->userdata('username'));
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
		}
	}
	
	public function update_contact_details(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('addline1','Address Line 1','required|trim|xss_clean');
		$this->form_validation->set_rules('addline2','Address Line 2','required|trim|xss_clean');
		$this->form_validation->set_rules('addline3','Address Line 3','required|trim|xss_clean');
		
		if($this->form_validation->run()){
			$this->load->model('users');
			if($this->users->add_address_admin_confirm($this->input->post('addline1'),$this->input->post('addline2'),$this->input->post('addline3'),$this->session->userdata('usertype'),$this->session->userdata('username'))){
				$this->header('Profile Update - success');
				$data = $this->profile_details($this->session->userdata('username'));
				$data['status_update_address']=TRUE;
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}else{
				$this->header('Profile Update - not added to database');
				$data = $this->profile_details($this->session->userdata('username'));
				$this->load->view('v_profile_user_update',$data);
				$this->footer();
			}
		}else{
			$this->header('Profile Update - validation failed');
			$data = $this->profile_details($this->session->userdata('username'));
			$this->load->view('v_profile_user_update',$data);
			$this->footer();
		}
	}


	function validate_equality(){
		if($this->input->post('password')!=$this->input->post('newpassword')){
			return true;
		}else{
			$this->form_validation->set_message('validate_equality','Your new password cannot match your current password.');
			return false;
		}
	}
	function validate_password(){
		$this->load->model('users');
		if($this->users->valid_password($this->session->userdata('username'),md5($this->input->post('password')))){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_password','Incorrect Password');
			return false;
		}
	}

	public function report($accused,$reported){
		$this->load->model('users');
		$data['description']=$this->input->post('reportOtherDescription');	
		$data['type']=$this->input->post('rt');
		$data['accused_user']=$accused;
		$data['reported_user']=$reported;	
		
		if($this->users->addReport($data)){
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