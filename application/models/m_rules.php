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
		
		$sql1='SELECT id,title,price From new_advertisement';
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
	}
	
	}	