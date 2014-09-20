<?php
   class ResolutionCenters extends CI_Model{
   	
	public function issueComplain($id,$accuser,$accused,$issue)
	{
		$this->db->insert('complain',array('id'=>$id,'accuser'=>$accuser,'accused'=>$accused,'issue'=>$issue));
		
	}
	public function issueTicket($complainId,$accuser,$accused,$issue)
	{
		$this->db->insert('ticket',array('id'=>uniqid(),'accuser'=>$accuser,'accused'=>$accused,'issue'=>$issue,'complainId'=>$complainId));
		
	}
	
	public function getTickets($accuser)
	{
		return $this->db->where('accuser',$accuser)->get('ticket')->result();
	}
	public function getAccusedTickets($accused)
	{
		return $this->db->where('accused',$accused)->get('ticket')->result();
	}
	public function getAllTickets()
	{
		return $this->db->get('ticket')->result();
	}
	public function getAllOpenedTickets()
	{
		return $this->db->where('status','opened')->get('ticket')->result();
	}
	public function getAllResolvedTickets()
	{
		return $this->db->where('status','resolved')->get('ticket')->result();
	}
	public function getAllComplains()
	{
		return $this->db->where('status','unread')->get('complain')->result();
	}
	public function getAllRejectedComplains()
	{
		return $this->db->where('status','rejected')->get('complain')->result();
	}
	
	public function request_reject($id)
	{
		$this->db->where('id',$id)->update('complain',array('status'=>'rejected'));
		return TRUE;
	}
		public function request_resolved($id)
	{
		$this->db->where('id',$id)->update('ticket',array('status'=>'resolved'));
		return TRUE;
	}
	public function getTicket($id)
	{
		return $this->db->where('id',$id)->get('ticket')->result();
	}
	public function getComplain($id)
	{
		return $this->db->where('id',$id)->get('complain')->result();
	}
	public function getMessages($id)
	{
		return $this->db->where('ticketid',$id)->get('ticket_messages')->result();
	}
	public function setMessage($id,$from,$content)
	{
		$this->db->insert('ticket_messages',array('ticketid'=>$id,'from'=>$from,'content'=>$content));
	}
	public function getComplains($accuser)
	{
		return $this->db->where('accuser',$accuser)->get('complain')->result();
	}
	
   }
?>