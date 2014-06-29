<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function index()
	{
		$this->load->model('advertisements');
		$answer=$this->advertisements->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {$send[$key->id]=$key->name;}
		
		$data['category']=$send;
		$send=null;
		$send['0']='--Select--';
		$data['subcategory']=$send;
		
		$this->load->model('m_subscribe');
		$data['subcription_details']=$this->m_subscribe->get_user_subcription_details($this->session->userdata('username'));
	   	$this->header('Subscribe');
	   	$this->load->view('v_subscribe_loggedin',$data);
		$this->footer();
	   
	}

	public function new_subcription(){
		$this->load->model('m_subscribe');
		$data['subcription_details']=$this->m_subscribe->get_user_subcription_details($this->session->userdata('username'));
		if($this->input->post('category')!=0){
			if($this->input->post('subcategory')!=0){
				if($this->m_subscribe->add_new_subcription($this->input->post('category'),$this->input->post('subcategory'))){
					$this->load->model('advertisements');
					$answer=$this->advertisements->getCategory();
					$send['0']='--Select--';
					foreach ($answer as $key ) {
						$send[$key->id]=$key->name;
			
					}
					$data['category']=$send;
					$send=null;
					$send['0']='--Select--';
					$data['subcategory']=$send;
					
					$data['message']='Your subscription has been successfully added.';
					$this->header('Subscribe');
					$this->load->view('v_subscribe_loggedin',$data);
					$this->footer();
				}else{
					$this->load->model('advertisements');
					$answer=$this->advertisements->getCategory();
					$send['0']='--Select--';
					foreach ($answer as $key ) {
						$send[$key->id]=$key->name;
			
					}
					$data['category']=$send;
					$send=null;
					$send['0']='--Select--';
					$data['subcategory']=$send;
					
					$data['message']='You already have a subcription on this category. Please try on a different category to subscribe.';
					$this->header('Subscribe');
					$this->load->view('v_subscribe_loggedin',$data);
					$this->footer();
				}
			}else{
				$this->load->model('advertisements');
				$answer=$this->advertisements->getCategory();
				$send['0']='--Select--';
				foreach ($answer as $key ) {
					$send[$key->id]=$key->name;
		
				}
				$data['category']=$send;
				$send=null;
				$send['0']='--Select--';
				$data['subcategory']=$send;
				
				$data['message']='Please select a <b>sub-category</b> to subscribe.';
				$this->header('Subscribe');
				$this->load->view('v_subscribe_loggedin',$data);
				$this->footer();
			}
		}else{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getCategory();
			$send['0']='--Select--';
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
	
			}
			$data['category']=$send;
			$send=null;
			$send['0']='--Select--';
			$data['subcategory']=$send;
			
			$data['message']='Please select a <b>category</b> to subscribe.';
			$this->header('Subscribe');
			$this->load->view('v_subscribe_loggedin',$data);
			$this->footer();
		}
		
	}

	public function remove($id){
		$this->load->model('m_subscribe');
		$data['subcription_details']=$this->m_subscribe->get_user_subcription_details($this->session->userdata('username'));
		if($this->m_subscribe->remove_subcription($id)){
			$this->load->model('advertisements');
			$answer=$this->advertisements->getCategory();
			$send['0']='--Select--';
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
	
			}
			$data['category']=$send;
			$send=null;
			$send['0']='--Select--';
			$data['subcategory']=$send;
			
			$data['message']='You have successfully removed your subscription';
			$this->header('Subscribe');
			$this->load->view('v_subscribe_loggedin',$data);
			$this->footer();
		}else{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getCategory();
			$send['0']='--Select--';
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
	
			}
			$data['category']=$send;
			$send=null;
			$send['0']='--Select--';
			$data['subcategory']=$send;
			
			$data['message']='Some error occured while unsubscribing. Please try again later';
			$this->header('Subscribe - Error');
			$this->load->view('v_subscribe_loggedin',$data);
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