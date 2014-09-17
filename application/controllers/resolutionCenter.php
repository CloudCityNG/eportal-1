<?php
    class ResolutionCenter extends CI_Controller{
    	public function tickets()
    	{
    		$this->header('Ticket info');
			$this->load->model('resolutionCenters');
			$data['ticket']=$this->resolutionCenters->getTickets($this->session->userdata('username'));
			$data['accused']=$this->resolutionCenters->getAccusedTickets($this->session->userdata('username'));
			$this->load->view('view_resolution',$data);
			$this->footer();
    	}
		public function messages($id)
    	{
    		
    		$this->header('Ticket info');
			$this->load->model('resolutionCenters');
			$ticket=$this->resolutionCenters->getTicket($id);
		$data['id']=$id;
		foreach($ticket as $row){
		$data['accused']=$row->accused;
		$data['accuser']=$row->accuser;
		$data['issue']=$row->issue;
		
		}
			$data['messaging']=TRUE;
			
			$data['ticket']=$this->resolutionCenters->getTickets($this->session->userdata('username'));
			$data['accused']=$this->resolutionCenters->getAccusedTickets($this->session->userdata('username'));
			$this->load->view('view_resolution',$data);
			$this->footer();
    	}
		public function inbox()
		{
			
		}
		public function outbox()
		{
			
		}
		public function complain()
		{
			$this->header('Complains');
			$this->load->model('resolutionCenters');
			$data['notifications']=$this->resolutionCenters->getComplains($this->session->userdata('username'));
			
			$this->load->view('view_complain',$data);
			$this->footer();
		}
		public function issueComplain($accused)
		{
			 $this->header('Ticket info');
			
			
			$this->load->model('resolutionCenters');
			$data['ticket']=$this->resolutionCenters->getTickets($this->session->userdata('username'));
			$data['accused']=$this->resolutionCenters->getAccusedTickets($this->session->userdata('username'));
			$id=uniqid();
			$this->resolutionCenters->issueComplain($id,$this->session->userdata('username'),$accused,$this->input->post('description'));
			$data['success']=TRUE;
			$data['accusing']=$accused;
			$data['id']=$id;
			
			$this->load->view('view_resolution',$data);
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
?>