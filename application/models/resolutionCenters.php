<?php
   class ResolutionCenters extends CI_Model{
   	
	public function issueTicket($id,$accuser,$accused,$issue)
	{
		$this->db->insert('ticket',array('id'=>$id,'accuser'=>$accuser,'accused'=>$accused,'issue'=>$issue));
		
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
	
	public function request_reject($id)
	{
		$this->db->where('id',$id)->update('ticket',array('status'=>'reject'));
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
	public function getMessages($id)
	{
		return $this->db->where('ticketid',$id)->get('ticket_messages')->result();
	}
	public function setMessage($id,$from,$content)
	{
		$this->db->insert('ticket_messages',array('ticketid'=>$id,'from'=>$from,'content'=>$content));
	}
	
   }
?>