<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveries extends CI_Controller {
	
	public function index(){
		$this->accepted('today');
	}
	
	public function pending($view=null,$id=null){
		if($view==null || $view=='all'){
			$this->pending_all();
		}else if($this->is_a_username($view)){
			$this->pending_client_username($view);
		}else if(($view=='reject' || $view=='accept') && $id!=null){
			if($type = $this->pending_accept_or_reject($view,$id)){
				$data['status']=$type;
				$data['request_id']=$id;
				$this->pending_all($data);
			}else{
				show_error("unable to $view id: $id",'','ERROR!');
			}
		}else{
			show_404();
		}
	}
	
	public function accepted($view=null,$a_id=null){
		if($view==null || $view=='all'){
			$this->accepted_all();
		}else if($view=='today'){
			$this->accepted_today();
		}else if(($view=='cancel' || $view=='delivered') && $a_id!=null){
			if($type = $this->accepted_cancel_or_complete($view,$id)){
				$data['status']=$type;
				$data['request_id']=$id;
				$this->accepted_all($data);
			}else{
				show_error("unable to $view id: $a_id",'','ERROR!');
			}	
		}else{
			show_404();
		}
	}
	
	public function rejected($view=null){
		if($view==null || $view=='all'){
			$this->rejected_all();
		}else if($this->is_a_username($view)){
			$this->rejected_client_username($view);
		}else{
			show_404();
		}
	}
	
	public function out_of_date($view=null){
		if($view==null || $view=='all'){
			$this->out_of_date_all();
		}else{
			show_404();
		}
	}
	
	
	/*****************************Private functions*******************************************/
		private function pending_all($status_info=null)
		{
			if($status_info!=null){
				$data['status_info']['status']=$status_info['status'];
				$data['status_info']['request_id']=$status_info['request_id'];
			}
			
			$this->load->model('m_delivery');
			$requests = $this->m_delivery->pending_all($this->session->userdata('company_id'));
			foreach($requests as $key=>$value){
				$data['pending_requests'][$key]['dp_id']=$value->dp_id;
				$data['pending_requests'][$key]['ad_id']=$value->ad_id;
				$data['pending_requests'][$key]['client_username']=$value->client_username;
				$data['pending_requests'][$key]['client_name']=$this->setup_names('client',$value->client_username);
				$data['pending_requests'][$key]['delivery_location']=$value->delivery_location;
				$data['pending_requests'][$key]['delivery_date']=$value->delivery_date;
				$data['pending_requests'][$key]['requested_on']=$value->requested_on;
				$data['pending_requests'][$key]['profilepicture']=$value->profilepicture;
				$data['pending_requests'][$key]['ad_title']=$value->title;
				$data['pending_requests'][$key]['ad_body']=$value->body;
				$data['pending_requests'][$key]['ad_category']=$this->setup_ad_category($value->categoryid);
				$data['pending_requests'][$key]['ad_subcategory']=$this->setup_ad_subcategory($value->subcategoryid);
			}
			
			$data['viewing']['type']='all requests';
			
			$this->header('Pending deliveries');
			$this->load->view('v_delivery_pending',$data);
			$this->footer();
			
		}

		private function pending_client_username($username){
			echo 'pending by username';
		}
		
		private function pending_accept_or_reject($type,$id){
			$this->load->model('m_delivery');
			if($type=='reject'){
				if($this->m_delivery->pending_reject($this->session->userdata('username'),$id)){
					return 'rejected';
				}else{return false;}
			}
			
			if($type=='accept'){
				if($this->m_delivery->pending_accept($this->session->userdata('username'),$id)){
					return 'accepted';
				}else{return false;}
			}
		}

		private function accepted_all($status_info=null){
				
			if($status_info!=null){
				$data['status_info']['status']=$status_info['status'];
				$data['status_info']['request_id']=$status_info['accept_id'];
			}

			$this->load->model('m_delivery');
			$acepted = $this->m_delivery->accepted_all($this->session->userdata('company_id'));
			
			foreach($acepted as $key=>$value){
				$data['accepted_requests'][$key]['accept_id']=$value->id;
				$data['accepted_requests'][$key]['ad_id']=$value->ad_id;
				$data['accepted_requests'][$key]['accepted_on']=$value->accepted_on;
				$data['accepted_requests'][$key]['accepted_username']=$value->accepted_username;
				$data['accepted_requests'][$key]['accepted_name']=$this->setup_names('delivery',$value->accepted_username);
				$data['accepted_requests'][$key]['customer_username']=$value->customer_username;
				$data['accepted_requests'][$key]['customer_name']=$this->setup_names('client',$value->customer_username);
				$data['accepted_requests'][$key]['delivery_location']=$value->delivery_location;
				$data['accepted_requests'][$key]['delivery_on']=$value->delivery_on;
				$data['accepted_requests'][$key]['requested_on']=$value->requested_on;
			}
			
			$data['viewing']['type']='all accepted requests';
			
			$this->header('Pending deliveries');
			$this->load->view('v_delivery_accepted',$data);
			$this->footer();
		}
		
		private function accepted_today(){
			echo 'accepted today';
		}
		
		
		
		private function rejected_all(){
			echo 'rejected all';
		}
		
		private function rejected_client_username($username){
			echo 'rejected by username';
		}
		
		private function out_of_date_all(){
			echo 'out of date all';
		}

		
	/*****************************Private functions*******************************************/
	private function is_a_username($username){
			$this->load->model('m_clients');
			return $this->m_clients->is_a_username($username);
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
			$name = $this->m_company->get_name($username);
			foreach ($name as $info){$name = $info->name;}
			return $name;
		}else{
			return 'the return :P ';
		}
	}
	
	private function setup_ad_category($id){
		$this->load->model('m_advertisement');
			$cname = $this->m_advertisement->get_category_name($id);
			foreach ($cname as $info){$cname = $info->name;}
			return $cname;
	}

	private function setup_ad_subcategory($id){
		$this->load->model('m_advertisement');
		$sname = $this->m_advertisement->get_subcategory_name($id);
		foreach ($sname as $info){$sname = $info->name;}
		return $sname;
	}
	
	private function show_success($type,$header,$array){
		$data['info']=$array;
		$data['type']=$type;
		
		$this->header($header);
		$this->load->view('v_status_reply',$data);
		$this->footer();
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