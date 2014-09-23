<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('is_logged_in') ){
			
				$this->load->model("m_permissions");
			
			
				/*$data['func']=$this->m_permissions->get_all_functions();
				$this->header('Manage User Permissions');
				$this->load->view("v_administration_permission",$data);
				$this->footer();*/
			
				if($this->input->post('Submit'))
				{
					$arr=array();
					$j=0;
					for($i=1;$i<=4;$i++){
						$a=0;$b=0;$c=0;$d=0;
						
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
							$a=1;
						}
						
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
							$b=1;
						}
				
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
							$c=1;
						}
				
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
							$d=1;
						}
						$arr[]=array(1=>$a,2=>$b,3=>$c,4=>$d);
					}
			
					$this->load->model("m_permissions");
					$this->m_permissions->insert_permissions($arr);
					
					
				}
				$data['func']=$this->m_permissions->get_all_functions();
					$this->header('Manage User Permissions');
					$this->load->view("v_administration_permission",$data);
					$this->footer();
		}
		else {
			$this->restricted();
		}
          
        	
	}
	
	public function can_view($pid){
		
		$username = $this->session->userdata('username');
		$usertype = $this->session->userdata('usertype');
		
		$this->load->model('m_permissions');
		
		if($this->m_permissions->check_if_super($username)){
			return true;
		}
		else {
			
			if($this->m_permissions->check_if_admin($username)){
				return true;
			}
			else{
				return FALSE;
			}
		}
		
	}
	
	public function restricted() {
		$this->header('Please Signin');
		$this->load->view("v_restricted");
		$this->footer();
	}
	
	public function cannotview() {
		$this->header('No Permission');
		$this->load->view("v_cannotview");
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