<?php

class M_rules extends CI_Model {

function addCheck($title, $body, $add, $tel, $img) {
        $data = array(
            'title' => $title,
            'body' => $body,
            'add' => $add,
            'tel' => $tel,
            'img' => $img
        );
		
		$query = "select COUNT(rid) FROM rules";
		$result = $this->db->query($query)->result();
		
		if($result > 0)
		{
			$this->db->where('rid',0);
			$this->db->update('rules', $data);
		}
		else {
			$this->db->insert('rules', $data);
		}
    }

	public function getAdlist()
	{
		$answer=array();
		
		$sql1='SELECT id,title,price From new_advertisement union (SELECT id,title,price From edit_advertisement)';
		$result=$this->db->query($sql1);
		$answer1= $result->result();
		foreach ($answer1 as $key) {
			
			$this->db->where('adId',$key->id);
			$result=$this->db->get('images');
			$answer2;
			if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer2= $result->row_array();
				
			}
			else
			{
				$answer2['Image']=null;
			}
			$answer[]=array('title'=>$key->title,'price'=>$key->price,'Image'=>$answer2['Image'],'id'=>$key->id);
		}
		return $answer;
		
	}
	
	public function getNewAdlist()
	{
		$answer=array();
		
		$sql1='SELECT id,title,body From new_advertisement union (SELECT id,title,body From edit_advertisement)';
		$result=$this->db->query($sql1);
		$answer1= $result->result();
		foreach ($answer1 as $key) {
			
			$this->db->where('adId',$key->id);
			$result=$this->db->get('images');
			$answer2;
			if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer2= $result->row_array();
				
			}
			else
			{
				$answer2['Image']=null;
			}
			$answer[]=array('title'=>$key->title,'body'=>$key->body,'Image'=>$answer2['Image'],'id'=>$key->id);
		}
		return $answer;
	}
	
	
/*
public function getAdvertisement($adid)
	{
		$this->db->where('id',$adid);
		$result=$this->db->get('new_advertisement');
		$answer;
		if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer= $result->row_array();
			}
			else
			{
				$answer=null;
			}
		
		return $answer;
	}
}*/


public function getAdvertisement($adid)
	{
		$this->db->where('id',$adid);
		$result=$this->db->get('new_advertisement');
		$answer;
		if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer= $result->row_array();
				/*$this->load->model("users");
				$dataset1 = $this->users->get_main_details($answer['username']);
			
			foreach ($dataset1 as $info) { 
				$answer['usertype'] = $info->usertype;
				$answer['email'] = $info->email;
				$answer['telemarketer']=$info->telemarketer;	
			}
			$this->load->model('m_signin');
			$dataset2 = $this->m_signin->get_user_dataset_type_2($answer['usertype'],$answer['username']);
			foreach ($dataset2 as $info){
				$answer['name'] = $info->name;	
			}*/	
			}
			else
			{
				$answer=null;
			}
		
		return $answer;
	}
		public function get_edit_images($ad_id)
	{
		$this->db->where('adId',$ad_id);
		$this->db->where('edit',1);
		return $this->db->get('images')->result_array();
		
		
	}
		public function get_images($ad_id)
	{
		$this->db->where('adId',$ad_id);
		$this->db->where('edit',0);
		return $this->db->get('images')->result_array();
		
		
	}
	
	public function getCategory(){
		$sql="SELECT name,id FROM category";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	
	public function getSubCategories($id){
		$sql='SELECT name,id FROM subcategory where categoryid=\''.$id.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	
	public function getCountry(){
		$sql="SELECT name,id FROM country";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	
	public function getProvinces($id){
		$sql='SELECT name,id FROM province where countryid=\''.$id.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	
	public function getDistricts($cid,$pid){
		$sql='SELECT name,id FROM district where countryid=\''.$cid.'\' AND provinceid=\''.$pid.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	
	public function accept_ad($adid){
		$result=$this->db->get_where('new_advertisement', array('id'=>$adid));
		$temp = $result->result();
		//print_r($temp);return;
		$this->db->insert('advertisement',$temp[0]);	
		$this->db->where('id',$adid);
		$this->db->delete('new_advertisement');
		
		$data=array('approved'=>1);
		$this->db->where('id',$adid);
		$this->db->update('advertisement',$data);
	}
	
	//new
	public function algorithm($inputstring){
		
		//first check for links and emails
		//if positive don't continue, reject the ad
/*		if($this->find_urls($inputstring)){
			return TRUE;
		
		}
		else{
*/	
		//then divide it into words
		$exploded = $this->multiexplode(array(" ","\t","\n","\r","\0","\x0B","~","`","@","#","$","%","^","&","*","(",")","+","=","*","'","","<",">",",",".","|","/",":",";","?","!","-","_"),$inputstring);
		
		$query = $this->db->query("select * from bad_words");

		foreach ($exploded as $key) {
			if ($query->num_rows() > 0)
			{
   				foreach ($query->result() as $row)
   				{     		
					$str1  = (string)$key;
					$str2 = (string)$row->word;        		
        			while(strcasecmp($str1, $str2) == 0){
            			return TRUE;
						
						break;
        			}
       			}       	
   			}
		}	
/*		}	*/
		}
	
	//new
	public function multiexplode($delimiters,$string) {
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}
	
	//not working 
	public function find_urls($text)
	{
    	// The Regular Expression filter
   		// 	$pattern = '#(www\.|https?:\/\/)?[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}(\S*)#i';
   
		$regex = '\b(https?|ftp|file)://[-A-Z0-9+&@#/%?=~_|!:,.;]*[-A-Z0-9+&@#/%=~_|]';

		//Your RegEx is missing some parts
		//Start and End character
		//aslo your RegEx is case-sensitive add the i ro make it insensitive
		$regex = '$'.$regex.'$i';  
		
    	preg_match_all($regex, $text, $matches);
		//	var_dump($matches);
		$count = 0;
		foreach($matches as $key) {
			$count = $count++;
		}
	
    	if ($count > 0)
    	{
    		return TRUE;
			//echo(count($matches));
			echo("have links");
    	}
		else{
			return FALSE;
			echo("no links");
		}
    }

	// not working 
	public function identify_urls($text){
	function do_reg($text, $regex)
	{
	preg_match_all($regex, $text, $result, PREG_PATTERN_ORDER);
	return $result[0];
	}

	$regex = '\b(https?|ftp|file)://[-A-Z0-9+&@#/%?=~_|!:,.;]*[-A-Z0-9+&@#/%=~_|]';

	//Your RegEx is missing some parts
	//Start and End character
	//aslo your RegEx is case-sensitive add the i ro make it insensitive
	$regex = '$'.$regex.'$i';

	$A =do_reg($string, $regex);	
	foreach($A as $B)
	{
		echo ($B."<BR>");
	}
	}
	
	}	