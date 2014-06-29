<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	
	public function index()
	{
		$this->header('Generate Report');
		$this->load->view("v_report_main");
		$this->footer();
	}
}