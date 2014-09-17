
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function index(){
		$this->view_delivery_companies();
	}
	
	/*******************************Start private functions**************************************************/
	
	private function view_delivery_companies(){
		$this->header('Delivery');
		$this->load->model('advertisements');
		$this->load->model('m_company');
		
		$result=$this->advertisements->getconfigcountry(base_url());
		foreach($result as $key){$data['cou']=$key->id;}
		$answer=$this->advertisements->getProvinces($data['cou']);
		$send[0]='-Select-';
		foreach ($answer as $key ) {$send[$key->id]=$key->name;}
		$data['province']=$send;
		$data['district']=array('0'=>'-Select-');
		
		$comapanies=$this->m_company->comapany_details();
		foreach ($comapanies as $key=>$value){
			$data['delivery_company'][$key]['id']=$value->id;
			$data['delivery_company'][$key]['company_name']=$value->company_name;
			$data['delivery_company'][$key]['profile_picture']=$value->profile_picture;
			$data['delivery_company'][$key]['description']=$value->description;
		}
		
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
		}
		}
	/*******************************End private functions****************************************************/
	
	public function make_request(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('itemID','','required|trim|xss_clean|alpha_numeric|callback_check_item_id');
		$this->form_validation->set_rules('location','','required|trim|xss_clean|callback_by_email');
		$this->form_validation->set_rules('companyID','','required|trim|xss_clean|callback_check_company_id');
		$this->form_validation->set_rules('datepicker','','required|trim|xss_clean');
		
		if($this->form_validation->run()){
			$company_id=$this->input->post('companyID');
			$item_id=$this->input->post('itemID');
			$delivery_location=$this->input->post('location');
			$delivery_date=$this->input->post('datepicker');
			
			$this->load->model('m_delivery');
			
			if($this->m_delivery->add_delivery_request($company_id,$item_id,$delivery_location,$delivery_date)){
				$this->view_delivery_companies();
			}else{
				show_error('error while processing your request');
			}
		}else{
			$this->view_delivery_companies();

		}
	}
	
	public function check_company_id(){
		/*if($this->input->post('companyID')==NULL){*/
			$this->load->model('m_delivery');
			if($this->m_delivery->check_delivery_company_availability($this->input->post('companyID'))){
				return true;
			}else{
				$this->form_validation->set_message('check_company_id','There is no company available for your selection');
				return false;
			}
		/*}else{
			$this->form_validation->set_message('check_company_id','Please select a delivery company');
			return false;
		}*/
	}

	public function check_item_id(){
		$this->load->model('m_delivery');
		if($this->m_delivery->check_item_availability($this->session->userdata('username'),$this->input->post('itemID'))){
			return true;
		}else{
			$this->form_validation->set_message('check_item_id','There is no item ID available from your stock');
			return false;
		}
	}
	
	
	
	
	public function get_district(){
		$this->load->model('advertisements');
		$result=$this->advertisements->getconfigcountry(base_url());
		foreach($result as $key){$data['cou']=$key->id;}
		$answer=$this->advertisements->getDistricts($data['cou'],$this->input->post('proid'));
		$output=null;
		
		if(count($answer)<1){
			$output .= "<option value='"."0"."'>"."-No District-"."</option>";
		}else{
			$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
		}
		
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';

		if($data['cou']>0&&$data['pro']>0){

		if($data['cou']>0||$data['pro']>0){

			$answer=$this->advertisements->getDistricts($data['cou'],$data['pro']);

		foreach ($answer as $key ) {
			 $output .= "<option value='".$key->id."'>".$key->name."</option>";
		}
		echo $output;
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
		}else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	function footer(){
		$this->load->view('footer');
	}	

}