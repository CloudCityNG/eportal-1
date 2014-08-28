<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('is_logged_in')){
			$this->load->model("m_permissions");
			$data['func']=$this->m_permissions->get_all_functions();
			$this->header('Manage User Permissions');
			$this->load->view("v_administration_permission",$data);
			$this->footer();
		}
		else {
			$this->restricted();
		}
		
		
		if($this->input->post('Submit'))
		{
			if(isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
             foreach($_POST['checkbox'] as $checkbox){
               $checkbox = explode('-', $checkbox);
               
			    $this->load->model("m_permissions");
				$this->m_permissions->insert_permissions($checkbox);
             }
          }else{
            $this->load->model("m_permissions");
			$data['func']=$this->m_permissions->get_all_functions();
			$this->header('Manage User Permissions');
			$this->load->view("v_administration_permission",$data);
			$this->footer();
          }
        }
				
			
	}
	
	public function restricted() {
		$this->header('Please Signin');
		$this->load->view("v_restricted");
		$this->footer();
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