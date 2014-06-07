<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	
	public function index()
	{
		$this->header('Generate Report');
			$this->load->view("v_report");
		$this->footer();
	}
	
	public function daily_reports(){
		$this->header('Daily Report');
			$this->load->view("v_report_daily");
		$this->footer();
	}
	
	public function monthly_reports(){
		$this->header('Monthly Report');
			$this->load->view("v_report_monthly");
		$this->footer();
	}
	
	public function annually_reports(){
		$this->header('Annual Report');
			$this->load->view("v_report_annually");
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