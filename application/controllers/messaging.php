<?php
    class Messaging extends CI_Controller
    {
    	public function index()
    	{
    		$this->header('Messages');
			
			$this->load->model('messages');
			$data['notifications']=$this->messages->getMessages($this->session->userdata('username'));
			$this->load->view('view_messaging',$data);
			$this->footer();
    	}
		function sendMessage()
		{
			$this->load->model('messages');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->form_validation->set_rules('message','Title','required|trim|xss_clean');
			if($this->form_validation->run())
			{
			$this->messages->setMessages($this->input->post('to'),$this->input->post('from'),$this->input->post('message'));
			}
			$conversation=$this->messages->getConversation($this->input->post('to'),$this->input->post('from'));
			
			
			/*foreach($conversation as $message){
				if($message->to==$this->input->post('from')){
					echo '<div class="comment_left"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else{
					echo '<div class="comment_right"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
			}*/
		}
		public function getConversation()
		{
			$this->load->model('messages');
			$conversation=$this->messages->getConversation($this->input->post('to'),$this->input->post('from'));
			
			
			foreach($conversation as $message){
				if($message->to==$this->input->post('from')){
					echo '<div class="comment_left"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else{
					echo '<div class="comment_right"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
			}
		}
		public function getMessages()
		{
			
		}
		public function getContacts()
		{
			
		}
		public function getMessageCount()//ajax call
		{
			
		}
		public function getOnlineContacts()//ajax call
		{
			$this->load->model('messages');
			$online=$this->messages->getOnlineContacts();
			$offline=$this->messages->getContacts($this->input->post('uname'));
			$usernames=array_intersect($offline, $online);
			foreach ($usernames as $row)
			{
    			if($row==$this->input->post('uname'))
    			{
    				continue;
    			}

    
    			if(isset($row))
    			echo "<li><a href=\"".base_url()."messaging/Conversation/".$row."\"><span class=\"img img-circle small label-success\">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;".$row."</a></li>"; 
			}
			$usernames=array_diff($offline, $usernames);
			foreach ($usernames as $row)
			{


    
    			if(isset($row))
    			echo "<li><a href=\"".base_url()."messaging/Conversation/".$row."\">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;".$row."</a></li>"; 
			}
			
		}
		public function Conversation($from=null)
		{
			$this->load->model('messages');
			$this->header('Messages');
			$data=$this->messages->getConversation($this->session->userdata('username'),$from);
			$data['from']=$from;
			$this->db->where('username',$from);
			$profilepic=$this->db->get('user_details')->row_array();
			$data['profile']=$profilepic;
			$this->load->view('view_message_conversation',$data);
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