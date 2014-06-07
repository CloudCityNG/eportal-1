<?php
class rating_m extends CI_Model
{
	public function get_rate($adid,$username)
	{
		$q = $this->db->get_where('rating', array('adid' => $adid));
		
		$rating = array('star1'=>0,'star2'=>0,'star3'=>0,'star4'=>0,'star5'=>0,);
		$ret['total_rate'] = 0;
		$ret['avg_rate'] = 0;
		
		if($q->num_rows()>0)
		{
		foreach ($q->result() as $row)
		{
				
			if($row->rate!=null)
			{
				if($row->rate==1)
				{$rating['star1']++;}
				if($row->rate==2)
				{$rating['star2']++;}
				if($row->rate==3)
				{$rating['star3']++;}
				if($row->rate==4)
				{$rating['star4']++;}
				if($row->rate==5)
				{$rating['star5']++;}
			}
			$ret['total_rate']++;
		}
		
		$ret['avg_rate'] = (1*$rating['star1']+2*$rating['star2']+3*$rating['star3']+4*$rating['star4']+5*$rating['star5'])/$ret['total_rate'];
		}
		
		$q = $this->db->get_where('rating', array('adid' => $adid, 'username' => $username));
		
		$temp = $q->result();
		if($temp)
		{	
		$ret['rate'] = $temp[0]->rate;
		$ret['is_rated'] = 1;
		}
		else {
		$ret['rate'] = 0;
		$ret['is_rated'] = 0;
		}
		
		return $ret;
	}
	
	public function put_rate($qarray)
	{
		$q = $this->db->get_where('rating', array('adid' => $qarray['adid'], 'username' => $qarray['username']));
		$temp = $q->result();
		if($temp)
		{	if($qarray['rate']==NULL||$qarray['rate']=="")
		{
			$this->db->delete('rating', array('adid' => $qarray['adid'], 'username' => $qarray['username'])); 
		}
			$this->db->where(array('adid' => $qarray['adid'], 'username' => $qarray['username']))
			->update('rating', $qarray); 
		}
		else {
			if($qarray['rate']!=NULL||$qarray['rate']!="")
			{$this->db->insert('rating', $qarray);}
		}	
	}

}
?>