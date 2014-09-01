<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function index(){
		$this->header('Delivery');
		$data= $this->get_province_district();
		$this->load->view('v_delivery_request',$data);
		$this->footer();
	}
	
	private function get_province_district(){
		if($this->session->userdata('username')){
			$this->load->model('advertisements');
		if($this->input->post('country')){
			$data['cou']=$this->input->post('country');
		}

		else
		{
			$data['cou']=0;
		}

		
		if($this->input->post('province')){
			$data['pro']=$this->input->post('province');
		}

		else {
			$data['pro']=0;
		}



		if($this->input->post('district')){
			$data['dis']=$this->input->post('district');
		}


			$answer=$this->advertisements->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		}
		$data['country']=$send;
		$send=null;
		
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->advertisements->getProvinces($data['cou']);
		}else{
			$result=$this->advertisements->getconfigcountry(base_url());
					foreach($result as $key){
						$data['cou']=$key->id;
					}
			$answer=$this->advertisements->getProvinces($data['cou']);
		}
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		}
		
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';

		if($data['cou']>0&&$data['pro']>0){

		if($data['cou']>0||$data['pro']>0){

			$answer=$this->advertisements->getDistricts($data['cou'],$data['pro']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		}
		}
		$data['district']=$send;
			return $data;
		}else{
			return false;
		}
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