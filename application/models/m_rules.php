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
		
		$sql1='SELECT id,title,price From new_advertisement WHERE approved=1 union (SELECT id,title,price From edit_advertisement WHERE approved=1)';
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
/*		$this->db->where('id',$adid);
		$result=$this->db->get('new_advertisement');
		$answer;
		if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer= $result->row_array();
 * /
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
/*			}
			else
			{
				$answer=null;
			}
		
		return $answer;			*/
		$username;
		$this->load->model('m_rules');
		if($this->m_rules->check_if_new($adid)){
			$this->db->where('id',$adid);
		//$this->db->where('approved',1);
		$result=$this->db->get('new_advertisement');
		}
		else{
			$this->db->where('id',$adid);
		//$this->db->where('approved',1);
		$result=$this->db->get('edit_advertisement');
						$this->db->where('id',$adid);
				$result1=$this->db->get('advertisement')->result();
				foreach($result1 as $row){
					$username=$row->username;
				}
		}
				
		
		$answer;
		if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer= $result->row_array();
				if((isset($username))&&(!is_null($username))){
					$answer['username']=$username;
				}
				$this->load->model("users");
				$dataset1 = $this->users->get_main_details($answer['username']);
				$answer['ad_id'] = $adid;
			foreach ($dataset1 as $info) { 
				$answer['usertype'] = $info->usertype;
				$answer['email'] = $info->email;
				$answer['telemarketer']=$info->telemarketer;
				$answer['countryid']=$info->countryid;
				$answer['provinceid']=$info->provinceid;	
				$answer['districtid']=$info->districtid;
				$answer['add_ln_1']=$info->add_ln_1;		
				$answer['add_ln_2']=$info->add_ln_2;
				$answer['add_ln_3']=$info->add_ln_3;
				$answer['telephone']=$info->contact_number;
			}
			$this->load->model('m_signin');
			$dataset2 = $this->m_signin->get_user_dataset_type_2($answer['usertype'],$answer['username']);
			foreach ($dataset2 as $info){
				$answer['name'] = $info->name;	
			}
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
	
	public function accept_new_ad($adid){
		$result=$this->db->get_where('new_advertisement', array('id'=>$adid));
		$temp = $result->result();
		//print_r($temp);return;
	//	$this->db->insert('advertisement',$temp[0]);	
	//	$this->db->where('id',$adid);
	//	$this->db->delete('new_advertisement');
		
		$data=array('approved'=>1);
		$this->db->where('id',$adid);
		$this->db->update('new_advertisement',$data);
	}
	
	public function accept_edit_ad($adid){
			
		$data=array('approved'=>1);
		$this->db->where('id',$adid);
		$this->db->update('edit_advertisement',$data);
	}
	/*************************************************************/
	public function get_cid_sid_subscription($a,$table){
		$sql='SELECT categoryid, subcategoryid, username
				From '.$table.'
				WHERE id=\''.$a.'\'';
			$result=$this->db->query($sql);
			return $result->result();
		
	}
	
	public function get_email_subscription($cid,$sid,$un){
		$sql='select u.email
				from users u
				where u.username in (SELECT s.username
									From subscribes s
									WHERE s.catid='.$cid.' and s.subcatid='.$sid.' and s.username<>\''.$un.'\')';
		$result=$this->db->query($sql);
		return $result->result();
	}
	
	
	/*************************************************************/
	
	public function accept_ad($a,$table){
				
			$sql1='SELECT id,title,body,categoryid, subcategoryid, countryid, districtid, provinceid, featured, createdate, duration, expired, username, price, approved 
					From new_advertisement 
					WHERE id=\''.$a.'\'';
			$result=$this->db->query($sql1);
			$temp= $result->result();
			/*************************************************************
			$this->subscription_send_mail($a);
			/*************************************************************/
			
	//		$result=$this->db->get_where('new_advertisement', array('id'=>$a));
		//	$temp = $result->result();
			$this->db->insert('advertisement',$temp[0]);	
			$this->db->where('id',$a);
			$this->db->delete('new_advertisement');
			
			$data=array('approved'=>1);
			$this->db->where('id',$a);
			$this->db->update('advertisement',$data);
		
	}

	public function accept_edit($a,$table){
		
			$sql1='SELECT title,body,categoryid, subcategoryid, countryid, districtid, provinceid, username, price, approved 
					From edit_advertisement 
					WHERE id=\''.$a.'\'';
			$result=$this->db->query($sql1);
			$temp= $result->result();
			
	//		$result=$this->db->get_where('edit_advertisement', array('id'=>$a));
	//		$temp = $result->result();

			$temp1=(array)$temp[0];
			 foreach ($temp1 as $key => $value) {
        if (is_null($value)) {
        unset($temp1[$key]);
        }
    }
			//array_filter($temp1);
			print_r($temp1);
			
			$this->db->where('id',$a);
			$this->db->update('advertisement',$temp1);	
			$this->db->where('id',$a);
			$this->db->delete('edit_advertisement');
			
			$data=array('approved'=>1);
			$this->db->where('id',$a);
			$this->db->update('advertisement',$data);

	}

	public function deny_ad($a,$table){
		/*	$sql1='SELECT id,title,body,categoryid, subcategoryid, countryid, districtid, provinceid, featured, createdate, duration, expired, username, price, approved 
					From new_advertisement 
					WHERE id=\''.$a.'\'';
			$result=$this->db->query($sql1);
			$temp= $result->result();
			
	//		$result=$this->db->get_where('new_advertisement', array('id'=>$a));
		//	$temp = $result->result();
			$this->db->insert('advertisement',$temp[0]);	
			$this->db->where('id',$a);
			$this->db->delete('new_advertisement'); */
			
			$data=array('approved'=>0);
			$this->db->where('id',$a);
			$this->db->update('new_advertisement',$data);
			}
	
	public function deny_edit($a,$table){
			$this->db->where('id',$a);
			$this->db->delete('edit_advertisement');
	}
	
	public function check_if_new($a){
		$this->db->where('id',$a);
		$result=$this->db->get('new_advertisement');
		
		if($result->num_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
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
	
	
		
	public function get_white_boundary(){
		$id = '1';	
		$sql='SELECT value FROM boundary where id=\''.$id.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	
	public function get_black_boundary(){
		$id = '2';	
		$sql='SELECT value FROM boundary where id=\''.$id.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	
	public function set_white_boundary($white){
		$this->db->where('id',1)->update('boundary',array('value'=>$white));
	}
	
	public function set_black_boundary($black){
		$this->db->where('id',2)->update('boundary',array('value'=>$black));
	}
	
	
	public function get_whitelist_users(){
		$query = "SELECT u.username, u.usertype, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM users u, user_details d
					WHERE u.username=d.username and white=1";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_blacklist_users(){
		$query = "SELECT u.username, u.usertype, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM users u, user_details d
					WHERE u.username=d.username and white=0";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function remove_from_whitelist($arr){
		foreach($arr as $row){
			if($row[1]==1){
				$this->db->where('username',$row[2])->update('user_details',array('white'=>0));
			}		
		}	
	}
	
	public function remove_from_blacklist($arr){
		
		foreach($arr as $row){
			if($row[1]==1){		
			$this->db->where('username',$row[2])->update('user_details',array('black'=>0));
			}	
		}
	}
	
	public function get_whitelist_count(){
		$query = "SELECT COUNT(*) as count
					FROM users u, user_details d
					WHERE u.username=d.username and white=1";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_blacklist_count	(){
		$query = "SELECT COUNT(*) as count
					FROM users u, user_details d
					WHERE u.username=d.username and white=0";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_whiterate($username){	
		$sql='SELECT whiterate FROM user_details where username=\''.$username.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	
	public function set_whiterate_of_user($username,$whiterate){
		$data=array(
			'whiterate'=>$whiterate);
		$this->db->where('username',$username);
		$this->db->update('user_details',$data);
	}
	
	public function get_blackrate($username){	
		$sql='SELECT blackrate FROM user_details where username=\''.$username.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	
	public function set_blackrate_of_user($username,$rate){
		$data=array(
			'blackrate'=>$rate);
		$this->db->where('username',$username);
		$this->db->update('user_details',$data);
	}
	

	
	public function is_whitelisted($username){
		/*
		$query3 = 'SELECT value FROM boundary WHERE id=1';						
		$result3 = $this->db->query($query3);
		$boundary = $result3->result();*/
		
		$bound = $this->get_white_boundary();
		
		foreach ($bound as $key){
		$query1 = 'SELECT * FROM user_details WHERE username=\''.$username.'\' AND whiterate>=\''.$key->value.'\'';
		$result1 = $this->db->query($query1);}
		
		$query2 = 'SELECT * FROM user_details WHERE username=\''.$username.'\' AND white=1';
		$result2 = $this->db->query($query2);
		
		if($result1->num_rows() == 1 || $result2->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function is_blacklisted($username){
		
		/*
		$query3 = 'SELECT value FROM boundary WHERE id=2';						
		$result3 = $this->db->query($query3);
		$boundary = $result3->result();*/
		
		$bound = $this->get_black_boundary();
		
		print_r($bound);
		
		foreach ($bound as $key){
		$query1 = 'SELECT * FROM user_details WHERE username=\''.$username.'\' AND blackrate>=\''.$key->value.'\'';
		$result1 = $this->db->query($query1);}
		
		
		$query2 = 'SELECT * FROM user_details WHERE username=\''.$username.'\' AND black=1';
		$result2 = $this->db->query($query2);
		
		if($result1->num_rows() == 1 || $result2->num_rows() == 1){return true;}
		else{return false;}
	}
	
	public function get_username($a,$table){
		$sql='SELECT `username` FROM '.$table.' WHERE `id`=\''.$a.'\'';
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	
	}	