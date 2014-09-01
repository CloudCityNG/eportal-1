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
		}else if($view=='delivered' && $a_id!=null){
			if($id = $this->accepted_complete($a_id,$this->session->userdata('username'))){
				$data['confirm_id']=$id;
				//$this->accepted_all($data);
				redirect(base_url().'deliveries/accepted');
			}else{
				show_error("unable to $view id: $a_id",'','ERROR!');
			}	
		}else if($view=='cancel'){
			$accepted_id=$this->input->post('reject_id');
			$reason=$this->input->post('reject_reason');
			
			if($type = $this->accepted_reject($accepted_id,$reason,$this->session->userdata('username'),$this->session->userdata('company_id'))){
				$data['reject_id']=$accepted_id;
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
	
	public function completed($view=null){
		if($view==null || $view=='all'){
			$this->completed_all();
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
			//$requests = $this->m_delivery->pending_all('1');
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
				
			if($status_info!=null && isset($status_info['confirm_id'])){
				$data['status_info']['confirm_id']=$status_info['confirm_id'];
			}

			if($status_info!=null && isset($status_info['reject_id'])){
				$data['status_info']['reject_id']=$status_info['reject_id'];
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
		
		private function accepted_complete($id,$username){
			$this->load->model('m_delivery');
			if($this->m_delivery->delivery_complete($id,$username)){
				return $id;
			}else{
				return false;
			}
		}
		
		public function accepted_reject($accepted_id,$reason,$username,$company_id){
			$this->load->model('m_delivery');
			if($this->m_delivery->delivery_reject($accepted_id,$reason,$username,$company_id)){
				return true;
			}else{
				return false;
			}
		}
		
		private function rejected_all(){
			echo 'rejected all';
		}
		
		private function rejected_client_username($username){
			echo 'rejected by username';
		}

		private function completed_all(){
			$this->load->model('m_delivery');
			$delivered = $this->m_delivery->delivery_completed_all($this->session->userdata('company_id'));
			
			foreach($delivered as $key=>$value){
				$data['delivered_items'][$key]['delivery_id']=$value->delivery_id;
				
				$data['delivered_items'][$key]['accepted_username']=$value->accepted_username;
				$data['delivered_items'][$key]['accepted_name']=$this->setup_names('client',$value->accepted_username);
				
				$data['delivered_items'][$key]['accepted_dateandtime']=$value->accepted_dateandtime;
				
				$data['delivered_items'][$key]['requested_dateandtime']=$value->requested_dateandtime;
				
				$data['delivered_items'][$key]['customer_username']=$value->customer_username;
				$data['delivered_items'][$key]['customer_name']=$this->setup_names('client',$value->customer_username);
				
				$data['delivered_items'][$key]['delivery_location']=$value->delivery_location;
				
				$data['delivered_items'][$key]['delivery_dateandtime']=$value->delivery_dateandtime;
				
				$data['delivered_items'][$key]['delivered_username']=$value->delivered_username;
				$data['delivered_items'][$key]['delivered_name']=$this->setup_names('client',$value->delivered_username);
				
				$data['delivered_items'][$key]['ad_title']=$value->ad_title;
				
				$data['delivered_items'][$key]['ad_id']=$value->ad_id;
			}
			
			$data['viewing']['type']='all completed deliveries';
			
			$this->header('Pending deliveries');
			$this->load->view('v_delivery_completed',$data);
			$this->footer();
		}
		
		private function out_of_date_all($status_info=null){
			$this->load->model('m_delivery');
			$out_of_date = $this->m_delivery->delivery_out_of_date($this->session->userdata('company_id'));
			
			if($status_info!=null && isset($status_info['confirm_id'])){
				$data['status_info']['confirm_id']=$status_info['confirm_id'];
			}

			if($status_info!=null && isset($status_info['reject_id'])){
				$data['status_info']['reject_id']=$status_info['reject_id'];
			}
			
			foreach($out_of_date as $key=>$value){
				$data['out_of_delivery_date_items'][$key]['id']=$value->id;
				$data['out_of_delivery_date_items'][$key]['accepted_username']=$value->accepted_username;
				$data['out_of_delivery_date_items'][$key]['accepted_name']=$this->setup_names('client',$value->accepted_username);
				$data['out_of_delivery_date_items'][$key]['accepted_dateandtime']=$value->accepted_dateandtime;
				$data['out_of_delivery_date_items'][$key]['requested_dateandtime']=$value->requested_dateandtime;
				$data['out_of_delivery_date_items'][$key]['ad_id']=$value->ad_id;
				$data['out_of_delivery_date_items'][$key]['customer_username']=$value->customer_username;
				$data['out_of_delivery_date_items'][$key]['customer_name']=$this->setup_names('client',$value->customer_username);
				$data['out_of_delivery_date_items'][$key]['delivery_location']=$value->delivery_location;
				$data['out_of_delivery_date_items'][$key]['delivery_dateandtime']=$value->delivery_dateandtime;
				$data['out_of_delivery_date_items'][$key]['no_of_dates_expired']=$value->no_of_dates_expired;
			}
			
			$data['viewing']['type']='all outdated deliveries';
			
			$this->header('Pending deliveries');
			$this->load->view('v_delivery_expired',$data);
			$this->footer();

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
			$usertype = $this->m_company->get_usertype($username);
			foreach($usertype as $info){$usertype = $info->usertype;}
			$name = $this->m_company->get_name($usertype,$username);
			foreach ($name as $info){$name = $info->name;}
			return $name;
		}else{
			return 'the return :P ';
		}
	}
	
	private function setup_ad_category($id){
		$this->load->model('m_advertisement_delivery');
			$cname = $this->m_advertisement_delivery->get_category_name($id);
			foreach ($cname as $info){$cname = $info->name;}
			return $cname;
	}

	private function setup_ad_subcategory($id){
		$this->load->model('m_advertisement_delivery');
		$sname = $this->m_advertisement_delivery->get_subcategory_name($id);
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
				$this->load->view('header_loggedin_delivery',$data);
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