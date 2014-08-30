<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contributers extends CI_Controller {

	public function index(){
		$this->contributer();	
	}
	
	public function contributer($view=null){
		if($view==null || $view=='view' ){
			$this->contributer_view_all();
		}
		
	}
	/************** Start private function****************************************************************/
	private function contributer_view_all(){
		$this->load->model('m_company');
		$contributers = $this->m_company->get_contributers($this->session->userdata('company_id'));
		
		foreach($contributers as $key=>$value){
			$data['contributers'][$key]['id']=$value->id;
			$data['contributers'][$key]['c_username']=$value->username;
			$data['contributers'][$key]['c_name']=$this->setup_names('delivery',$value->username);
			$data['contributers'][$key]['added_on']=$value->added_on;
			$data['contributers'][$key]['role']=$value->role;
			$data['contributers'][$key]['email']=$value->email;
			
			if($value->added_by != null){
				$data['contributers'][$key]['added_by_name']=$this->setup_names('delivery',$value->added_by);
				$data['contributers'][$key]['added_by_username']=$value->added_by;
			}else{
				$data['contributers'][$key]['added_by_name']=null;
				$data['contributers'][$key]['added_by_username']=null;
			}
		}
		
		$this->header('Delivery contributers');
		$this->load->view('v_delivery_company_contributers',$data);
		$this->footer();
	}

	/************** End private function****************************************************************/
	
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
	
	private function footer(){
		$this->load->view('footer');
	}
	
}