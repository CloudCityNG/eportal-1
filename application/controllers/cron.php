<?php
    class Cron extends CI_Controller {
    	public function allcron()
    	{
    		set_time_limit(0);
			$emaillist=$this->db->query('select a.id,u.email from advertisement a,users u where DATEDIFF(a.duration,CURRENT_TIMESTAMP)<=0 and a.expired=0 and a.username=u.username')->result();
			foreach($emaillist as $email)
			{
				$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'it12030736@my.sliit.lk',
			  	'smtp_pass' => 'It12030736@#1',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
				);
			
			$message = 'Your Advertisement has been expired.Check through this link\n <a href="'.base_url().'advertisement/viewAd/'.$email->id.'">'.base_url().'advertisement/viewAd/'.$email->id.'</a>';
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to($email->email);
			$this->email->subject('Advertisement Expiration');
			$this->email->message($message);
			try{
				if($this->email->send())
				{
					echo("success");
				}
				else
				{
					echo("fail");
				}
			}
			catch(Exception $e)
			{
				print($e);
			}
		}
		$this->db->simple_query('update advertisement set expired=1 
where DATEDIFF(duration,CURRENT_TIMESTAMP)<=2 and expired=0');

			$emaillist=$this->db->query('select a.id,u.email from advertisement a,users u where DATEDIFF(a.duration,CURRENT_TIMESTAMP)<=0 and a.expired=0 and a.username=u.username')->result();
			foreach($emaillist as $email)
			{
				$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'it12030736@my.sliit.lk',
			  	'smtp_pass' => 'It12030736@#1',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
				);
			
			$message = 'Your Advertisement will be expired in 2 days time.Check through this link\n <a href="'.base_url().'advertisement/viewAd/'.$email->id.'">'.base_url().'advertisement/viewAd/'.$email->id.'</a>';
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to($email->email);
			$this->email->subject('Advertisement Expiration Warning');
			$this->email->message($message);
			try{
				if($this->email->send())
				{
					echo("success");
				}
				else
				{
					echo("fail");
				}
			}
			catch(Exception $e)
			{
				print($e);
			}
		}
		$this->db->simple_query('update advertisement set notified=1 
where DATEDIFF(duration,CURRENT_TIMESTAMP)<=2 and expired=0');
			
			
			$emaillist=$this->db->query('SELECT f.adId, u.email FROM featured f,advertisement a,users u where DATEDIFF(f.duration,CURRENT_TIMESTAMP)<=0 and f.adId=a.id and u.username=a.username')->result();
			foreach($emaillist as $email)
			{
				$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'it12030736@my.sliit.lk',
			  	'smtp_pass' => 'It12030736@#1',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
				);
			
			$message = 'Your Featured Advertisement has been expired.Check through this link\n <a href="'.base_url().'advertisement/viewAd/'.$email->adId.'">'.base_url().'advertisement/viewAd/'.$email->id.'</a>';
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to($email->email);
			$this->email->subject('Advertisement Featured Expiration');
			$this->email->message($message);
			try{
				if($this->email->send())
				{
					echo("success");
				}
				else
				{
					echo("fail");
				}
			}
			catch(Exception $e)
			{
				print($e);
			}
		}
		$featured=$this->db->query('SELECT adId FROM featured where DATEDIFF(duration,CURRENT_TIMESTAMP)<=0')->result();
		foreach($featured as $feature)
		{
			$this->db->where('adId',$feature->adId);
			$this->db->delete('featured');
			$this->db->where('id',$feature->adId);
			$this->db->update('advertisement',array('featured'=>0));
				
		}
			//$this->db->query('call featuredAd()');
			
 			
			
    	}
	}
?>