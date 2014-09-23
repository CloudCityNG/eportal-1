<?php
	 class history  extends CI_Controller
    {
    	function view_history ()
		{
			$this->header('Search');

			$this->load->model('history_model');
			$results = $this->history_model->get_bought();
			$data['bads'] = $results['rows'];
			$data['num_bads'] = $results['num_rows'];
			
			$results = $this->history_model->view_sold();
			$data['sads'] = $results['rows'];
			$data['num_sads'] = $results['num_rows'];
			
			$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			foreach($country as $key)
			{
				$curcode=$key->currencysy;
			}
    		 
    		 $data['curcode'] = $curcode;
			
			
			$this->load->view('history_view',$data);
			
		}
		
		function header ($tile)
	{
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
	
	}
?>