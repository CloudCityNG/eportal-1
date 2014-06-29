<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	
	public function index()
	{
		$this->header('Generate Report');
			$this->load->view("v_administration_report_main");
		$this->footer();
	}
	
	public function ad_reports(){
		$this->header('Advertisement Reports');
			$this->load->view("v_administration_report_ad");
		$this->footer();
	}
	
	public function user_reports(){
		$this->header('User Reports');
			$this->load->view("v_administration_report_user");
		$this->footer();
	}
	
	public function other_reports(){
		$this->header('Other Report');
			$this->load->view("v_administration_report_other");
		$this->footer();
	}
	
	public function generate_all_ad(){
		$this->load->model('m_report');
		$data['ads']=$this->m_report->get_current_month_all_ad();
		$this->header('All Advertisements');
		$this->load->view("v_administration_report_all_ad",$data);
		$this->footer();
		
/*		$this->load->library('table');
		$this->table->set_heading('Title', 'Description', 'Category', 'Sub Category', 'District', 'Provice', 'Featured', 'Create Date', 'Expiry Date', 'Username', 'Price');
		$query = $this->db->query("SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
		FROM advertisement a, category c
		WHERE (expired=1 AND approved=1 AND a.categoryid=c.id) OR (expired=1 AND approved=1 AND a.categoryid=0)");
		echo $this->table->generate($query);
 * 
 */
	}
	
	public function generate_reported_ad(){
		$this->load->model('m_report');
		$data['ads']=$this->m_report->get_current_reported_ad();
		$this->header('Reported Advertisements');
		$this->load->view("v_administration_report_reported_ad",$data);
		$this->footer();
	}
	
	public function generate_highest_ad(){
		
	}
	
	public function generate_all_user(){
		$this->load->model('m_report');
		$data['users']=$this->m_report->get_current_al_users();
		$this->header('All Users');
		$this->load->view("v_administration_report_all_users",$data);
		$this->footer();
	}

	public function generate_business_user(){
		$this->load->model('m_report');
		$data['users']=$this->m_report->get_current_busi_users();
		$this->header('Business Users');
		$this->load->view("v_administration_report_busi_users",$data);
		$this->footer();
	}
	
	public function generate_normal_user(){
		$this->load->model('m_report');
		$data['users']=$this->m_report->get_current_nor_users();
		$this->header('Normal Users');
		$this->load->view("v_administration_report_nor_users",$data);
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

	public function generate_ad_report(){
		if($this->input->post('Advertisement_submit'))
			{
				if($this->input->post('category') == $list[1]){
					$this->load->library('table');
					$query = $this->db->query("SELECT * FROM my_table");
					echo $this->table->generate($query);
				}
			}
	}
	
	function footer(){
		$this->load->view('footer');
	}
}