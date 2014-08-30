
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function index(){
		$this->header('Delivery');
		$this->load->model('advertisements');
		$result=$this->advertisements->getconfigcountry(base_url());
					
					foreach($result as $key)
					{

						$data['cou']=$key->id;
					}
					

					
			$answer=$this->advertisements->getProvinces($data['cou']);
		$send[0]='-Select-';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['province']=$send;
		$data['district']=array('0'=>'-Select-');
		 
		$this->load->view('v_delivery_request',$data);
		$this->footer();
	}
	
	public function get_district(){
		$this->load->model('advertisements');
		$result=$this->advertisements->getconfigcountry(base_url());
					
					foreach($result as $key)
					{

						$data['cou']=$key->id;
					}
			$answer=$this->advertisements->getDistricts($data['cou'],$this->input->post('proid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."-No District-"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
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