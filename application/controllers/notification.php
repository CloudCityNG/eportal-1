<?php	if (! defined('BASEPATH')) exit('No direct script access allowed');
    class Notification extends CI_Controller
    {
    	public function index()
    	{
    		if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			$this->load->model('notifications');
			$data['notifications']=$this->notifications->getNotifications($this->session->userdata('username'));
			$this->header('Notifications');
			$this->load->view('view_notification',$data);
			$this->footer();
    	}
    
	function header($tile){
		$this->load->model('notifications');
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
	public function getNotification()
	{
		$notid=$this->input->post('notid');
		$this->load->model('notifications');
		$results=$this->notifications->getNotification($notid);
		foreach($results as $result){
			echo '<div class="modal-header">';
			echo '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>';
			echo '<h4 class="modal-title">'.$result->topic.'</h4></div>';
			echo '<div class="modal-body">
        				<p>'.$result->content.'</p>
      				</div>';
			$this->notifications->viewed($notid);
		break;	
		}
	}
	public function getCount()
	{
		$uname=$this->input->post('uname');
		$this->load->model('notifications');
		$results=$this->notifications->getCount($uname);
		if($results<100){
			echo 'Notifications <span class="badge">'.$results.'</span>';
		}
		else
		{
			echo 'Notifications <span class="badge">100+</span>';
		}
	}
	public function getInstantMessages()
	{
		$uname=$this->input->post('uname');
		$this->load->model('notifications');
		$results=$this->notifications->getPopupNotification($uname);
		foreach($results as $result)
		{
			echo $result->topic;
		}
	}
	public function getAllCount(){
		$uname=$this->input->post('uname');
		$this->load->model('notifications');
		$results=$this->notifications->getAllCount($uname);
		echo $results;
	}
	public function getUnreadCount(){
		$uname=$this->input->post('uname');
		$this->load->model('notifications');
		$results=$this->notifications->getCount($uname);
		echo $results;
	}
	public function getNewNotifications(){
		$uname=$this->input->post('uname');
		$this->load->model('notifications');
		$results=$this->notifications->getNewNotifications($uname);
		foreach($results as $result){
			echo '<div data-toggle="modal" data-target="#myModal" class="col-md-12 table-bordered div-hover" id="'.$result->id.'" style="padding: 10px;
        		
        		background-color:#F7F7F7; ">'.
				$result->topic.
				'<div class="col-md-4 pull-right">
					'.$result->date.'
				</div>
        	</div>';
		}
	}
	}
?>