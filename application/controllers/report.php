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
	
	public function get_ad_list()
	{
		$this->load->model('m_report');
	//	rows = $this->m_report->getAdlist();
		
		
		
		foreach($rows as $row) {
        echo "<tr>  SELECT id, title, body, createdate, price, address, email
              <td>{$row['id']}</td>
              <td>{$row['title']}</td>
              <td>{$row['body']}</td>
              <td>{$row['createdate']}</td>
              <td>{$row['price']}</td>
              <td>{$row['address']}</td>
              <td>{$row['email']}</td></tr>";
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