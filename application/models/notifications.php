<?php
    class Notifications extends CI_Model{
    	public function getNotifications($username){
    		$this->db->where('uname',$username);
			$this->db->order_by('id','desc');
			return $this->db->get('notification')->result();
    	}
		public function getCount($username){
			 $sql="select count(uname) as count from notification where uname='".$username."' and viewed=0";
			 $answer=$this->db->query($sql)->result();
			 foreach($answer as $count)
			 {
			 	return $count->count;
			 }
		}
		public function getPopupNotification($username){
			$id;
			$this->db->where('uname',$username);
			$this->db->where('notified',0);
			$this->db->limit(1);
			$answer=$this->db->get('notification')->result();
			$answer1=$answer;
			foreach($answer as $info){
				$id=$info->id;
				$this->db->where('id',$id);
				$this->db->update('notification',array('notified'=>1));
				break;
			}
			
			return $answer1;
		}
		public function getNotification($notid)
		{
			$this->db->where('id',$notid);
			return $this->db->get('notification')->result();
		}
		public function viewed($notid){
			$this->db->where('id',$notid);
			$this->db->update('notification',array('viewed'=>1));
		}
		public function getAllCount($username)
		{
			$sql="select count(uname) as count from notification where uname='".$username."'";
			 $answer=$this->db->query($sql)->result();
			 foreach($answer as $count)
			 {
			 	return $count->count;
			 }
		}
		public function getNewNotifications($username){
			$id;
			$this->db->where('uname',$username);
			$this->db->where('new',0);
			$this->db->order_by('id','desc');
			$answer=$this->db->get('notification')->result();
			$answer1=$answer;
			foreach($answer as $info){
				$id=$info->id;
				$this->db->where('id',$id);
				$this->db->update('notification',array('new'=>1));
				
			}
			
			return $answer1;
		}
		public function setNotification($uname,$topic,$content){
			$data=array(
			'uname'=>$uname,
			'topic'=>$topic,
			'content'=>$content
			);
			$this->db->insert('notification',$data);
		}
    }
?>