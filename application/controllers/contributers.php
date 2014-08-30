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
		echo '1';
		$this->load->model('m_company');
		echo '1';
		$contributers = $this->m_company->get_contributers($this->session->userdata('company_id'));
		echo '1';
		
		foreach($contributers as $key=>$value){
			$data['contributers'][$key]['id']=$value->id;
			$data['contributers'][$key]['username']=$value->username;
			$data['contributers'][$key]['email']=$value->email;
			$data['contributers'][$key]['name']=$value->name;
			$data['contributers'][$key]['activation_type']=$value->activation_type;
			$data['contributers'][$key]['registered_on']=$value->registered_on;
			$data['contributers'][$key]['last_updated_on']=$value->last_updated_on;
		}
		
		$this->header('Delivery contributers');
		$this->load->view('v_contributers',$data);
		$this->footer();
	}
	/************** End private function****************************************************************/
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
	
	private function footer(){
		$this->load->view('footer');
	}
	
}