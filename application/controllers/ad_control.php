<?php
    class ad_control extends CI_Controller
    {
    	function view_ad ($id=0)
		{
			$this->load->model('site_model');
			$result = $this->site_model->getad($id);
			$this->load->view('ad_view', $result);
		
		}
		
		function add_comment ($adid=0)
		
		{
		
		if(strlen($this->input->post('comment')))
		{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
			
			$qarray = array(
		'comment' => $this->input->post('comment'),
		'username' => $this->session->userdata('username'),
		'adid' => $adid,
		'createdate' => mdate($datestring, $time)
		);
		
			//$adid = $qarray['adid'];	
				
		$this->db->insert('comments', $qarray); 
		}
		
		redirect("advertisement/viewAd/$adid");
		}
		
		function del_comment ($cmid=0, $adid=0)
		{
			$this->load->model('site_model');
			$reply = $this->site_model->del_comment($cmid);
			//$this->db->delete('comments', array('cmid' => $cmid));
			redirect("advertisement/viewAd/$adid");
			
		}
		
	}
?>