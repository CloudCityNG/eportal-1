<?php
    class Messages extends CI_Model
    {
    	public function getMessages($user)
    	{
    		return $this->db->where('to',$user)->get('messages')->result();
			
    	}	
		public function setMessages($to,$from,$message)
		{
			$this->db->insert('messages',array('to'=>$to,'from'=>$from,'Content'=>$message));
		}	
		public function getContacts($user)
		{
			$sql="SELECT * FROM messages m where m.to='".$user."' or m.from='".$user."'";
			$answer=$this->db->query($sql)->result();
			$contacts=array();
			foreach($answer as $row){
				$contacts[]=$row->to;
				$contacts[]=$row->from;
			}
			
			return array_unique($contacts);
		}
		public function getBusinessContacts($user)
		{
			$sql="SELECT * FROM messages m where m.to='".$user."' or m.from='".$user."'";
			$answer=$this->db->query($sql)->result();
			$contacts=array();
			foreach($answer as $row){
				$contacts[]=$row->to;
				$contacts[]=$row->from;
			}
			$sql="SELECT * FROM messages m where m.to='".$user."' or m.from='".$user."'";
			$answer=$this->db->query($sql)->result();		
			foreach($answer as $row){
				$contacts[]=$row->to;
				$contacts[]=$row->from;
			}	
			return array_unique($contacts);
		}
		public function getMessageCount($user)
		{
			
		}
		public function getConversation($user,$from)
		{
			$sql="select * from messages m where m.to='".$user."' and m.from='".$from."'
				union 
				select * from messages m where m.to='".$from."' and m.from='".$user."'
				order by date";
			return $answer=$this->db->query($sql)->result();
			
		}
		public function getFullConversation($user,$from)
		{
			
		}
		public function getOnlineContacts()//ajax call
		{
			$query = $this->db->select('user_data')->get('ci_sessions');
			$username=array();
			foreach($query->result() as $row){
				$udata=unserialize($row->user_data);
				$username[]=$udata['username'];
								
			}
							
			$usernames=array_unique($username);

			return $usernames;
		}
		
		
    }
?>