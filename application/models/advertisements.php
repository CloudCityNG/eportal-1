<?php

class Advertisements extends CI_Model{
	public function getCategory(){
		$sql="SELECT name,id FROM category";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	public function getCategoryId($key){

		$this->db->where('name',$key);
		$result=$this->db->get('category');
		if($result->num_rows()>0){
		$answer= $result->row_array();
		return $answer['id'];
		}
		return null;

	}
	public function getCountryConfigCountryid($baseurl){

		$this->db->where('url',$baseurl);
		$result=$this->db->get('country_config');
		if($result->num_rows()>0){
		$answer= $result->row_array();
		return $answer['countryid'];
		}
		return 210;

	}
	public function getalpha_2($countryid)
	{
		$this->db->where('id',$countryid);
		$result=$this->db->get('country');
		if($result->num_rows()>0){
		$answer= $result->row_array();
		return $answer['alpha_2'];
		}
		return 'lk';
	}
	public function getusercountryname($countryid)
	{
		$this->db->where('id',$countryid);
		$result=$this->db->get('country');
		if($result->num_rows()>0){
		$answer= $result->row_array();
		return $answer['name'];
		}
		return 'lk';
	}
	

	public function getSubCategory(){
		$sql="SELECT name,id FROM subcategory";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	public function getSubCategoryId($key){
		$this->db->where('name',$key);
		$result=$this->db->get('subcategory');

		if($result->num_rows()>0){
			
		}
		$answer= $result->row_array();
		return $answer['id'];


	}
	public function getCountry(){
		$sql="SELECT name,id FROM country";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	public function getconfigcountry($baseurl)
	{
		$couid=$this->getCountryConfigCountryid($baseurl);
		$sql="SELECT * FROM country where id='$couid'";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;
	}
	public function getCountryId($key){
		
		$this->db->where('name',$key);
		$result=$this->db->get('country');
		
		if($result->num_rows()>0){
			
		}
		$answer= $result->row_array();
		return $answer['id'];


	}
	public function getProvince(){
		$sql="SELECT name,id FROM province";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	public function getProvinceId($key){
		$this->db->where('name',$key);
		$result=$this->db->get('province');
		
		if($result->num_rows()>0){
			
		}
		$answer= $result->row_array();
		return $answer['id'];


	}
	public function getDistrict(){
		$sql="SELECT name,id FROM district";
		$result=$this->db->query($sql);
		$answer= $result->result();
		return $answer;

	}
	public function getDistrictId($key){
		$this->db->where('name',$key);
		$result=$this->db->get('district');
	
		if($result->num_rows()>0){
			
		}
		$answer= $result->row_array();
		return $answer['id'];


	}
	public function setAdvertisement($id,$title,$body,$cat,$subcat,$country,$district,$province,$price,$address,$telephone,$email,$username,$duration
	/*,$image*/)
	{
			/*$categoryid=$this->getCategoryId($cat);
		
			$subcategoyid=$this->getSubCategoryId($subcat);
			$countryid=$this->getCountryId($country);
			$districtid=$this->getDistrictId($district);
			$provinceid=$this->getProvinceId($province);*/
			$data=array(
			'id'=>$id,
			'title'=>$title,
			'body'=>$body,
			'categoryid'=>$cat,
			'subcategoryid'=>$subcat,
			'countryid'=>$country,
			'districtid'=>$district,
			'provinceid'=>$province,
			'price'=>$price,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>$email,
			'username'=>$username,
			'duration'=>$duration
			//,
			//'image'=>$image
			);
			
			$this->db->insert('new_advertisement',$data);
			
			
	}
	public function updateAdvertisement($id,$title,$body,$cat,$subcat,$price)
	{
		$data=array(
			'id'=>$id,
			'title'=>$title,
			'body'=>$body,
			'categoryid'=>$cat,
			'subcategoryid'=>$subcat,
			//'countryid'=>$country,
			//'districtid'=>$district,
			//'provinceid'=>$province,
			'price'=>$price
			//'address'=>$address,
			//'telephone'=>$telephone,
			//'email'=>$email,
			//'username'=>$username
			//,
			//'image'=>$image
			);
			$this->db->where('id',$id);
			$result=$this->db->get('edit_advertisement');
			
			if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$this->db->where('id',$id);
				$this->db->update('edit_advertisement',$data);
			}
			else
			{
				$this->db->insert('edit_advertisement',$data);
			}
			
	}
	public function setCountry($country)
	{
		$data=array('name'=>$country);
		$this->db->insert('country',$data);
		
	}
	public function updateCountry($id,$country)
	{
		$data =array('name'=>$country,'id'=>$id);
		$this->db->where('id',$id);
		$this->db->update('country',$data);
		
	}
	public function checkProvince($countryid,$provincename)
	{
		$this->db->where('countryid',$countryid);
		$this->db->where('name',$provincename);
		$result=$this->db->get('province');
		if($result->num_rows()>0){
			return false;
		}
			return true;
	}
	public function setProvince($countryid,$province)
	{
		$data=array('name'=>$province,'countryid'=>$countryid);
		$this->db->insert('province',$data);
		
	}
	public function updateProvince($provinceid,$province)
	{
		$data =array('name'=>$province,'id'=>$provinceid);
		$this->db->where('id',$provinceid);
		$this->db->update('province',$data);
		
	}
	public function checkDistrict($countryid,$provinceid,$districtname)
	{
		$this->db->where('countryid',$countryid);
		$this->db->where('provinceid',$provinceid);
		$this->db->where('name',$districtname);
		$result=$this->db->get('district');
		if($result->num_rows()>0){
			return false;
		}
			return true;
	}
	public function setDistrict($countryid,$provinceid,$district)
	{
		$data=array('name'=>$district,'countryid'=>$countryid,'provinceid'=>$provinceid);
		$this->db->insert('district',$data);
		
	}
	public function updateDistrict($districtid,$district)
	{
		$data =array('name'=>$district,'id'=>$districtid);
		$this->db->where('id',$districtid);
		$this->db->update('district',$data);
		
	}
	public function setCategory($category)
	{
		$data=array('name'=>$category);
		$this->db->insert('category',$data);
		
	}
	public function updateCategory($id,$category)
	{
		$data =array('name'=>$category,'id'=>$id);
		$this->db->where('id',$id);
		$this->db->update('category',$data);
		
	}
	public function setSubcategory($categoryid,$subcategory)
	{
		$data=array('name'=>$subcategory,'categoryid'=>$categoryid);
		$this->db->insert('subcategory',$data);
		
	}
	public function updateSubcategory($subcategoryid,$subcategory)
	{
		$data =array('name'=>$subcategory,'id'=>$subcategoryid);
		$this->db->where('id',$subcategoryid);
		$this->db->update('subcategory',$data);
		
	}
	public function checkSubcategory($categoryid,$subcategoryname)
	{
		$this->db->where('categoryid',$categoryid);
		$this->db->where('name',$subcategoryname);
		$result=$this->db->get('subcategory');
		if($result->num_rows()>0){
			return false;
		}
			return true;
	}
	public function do_upload($dirname,$Ad_id)
	{
			/*if(!file_exists('./images/Advertisement/'.$dirname)){
		mkdir('./images/Advertisement/'.$dirname,0777);
			}*/
		$config=array(
		'allowed_types'=>'jpg|jpeg|gif|png',
		'upload_path'=>'./images/Advertisement',//.$dirname,
		'max_size'=>'5120'
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload())
		{
			$file=$this->upload->data();
			$data=array('adId'=>$Ad_id,
			'Image'=>'images/Advertisement/'.$file['file_name'],
			'edit'=>0
			);
			$this->db->insert('images',$data);
			return TRUE;
		}
		return FALSE;
		
		
	}
	public function do_edit_upload($dirname,$Ad_id)
	{
			/*if(!file_exists('./images/Advertisement/'.$dirname)){
		mkdir('./images/Advertisement/'.$dirname,0777);
			}*/
		$config=array(
		'allowed_types'=>'jpg|jpeg|gif|png',
		'upload_path'=>'./images/Advertisement',//.$dirname,
		'max_size'=>'5120'
		);
		$this->load->library('upload',$config);
		if($this->upload->do_upload())
		{
			$file=$this->upload->data();
			$data=array('adId'=>$Ad_id,
			'Image'=>'images/Advertisement/'.$file['file_name'],
			'edit'=>1
			);
			$this->db->insert('images',$data);
			return TRUE;
		}
		return FALSE;
		
		
	}
	public function get_images($ad_id)
	{
		$this->db->where('adId',$ad_id);
		$this->db->where('edit',0);
		return $this->db->get('images')->result_array();
		
		
	}
	public function get_edit_images($ad_id)
	{
		$this->db->where('adId',$ad_id);
		$this->db->where('edit',1);
		return $this->db->get('images')->result_array();
		
		
	}
	public function remove_image($img_id,$img_url)
	{
		$this->db->where('id',$img_id);
		$this->db->delete('images');
		unlink($img_url);
		
		
	}
	public function getSubCategories($id){
		$sql='SELECT name,id FROM subcategory where categoryid=\''.$id.'\'';
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
	public function getAdlist($uname)
	{
		$answer=array();
		if((!isset($uname))||($uname==null))
		{
			$sql1='SELECT id,title,price,createdate,duration,username,featured,expired From advertisement order by duration desc';
		}
		else{
		$sql1='SELECT id,title,price,createdate,duration,username,featured,expired From advertisement where username=\''.$uname.'\' order by duration desc';
		}
		$result=$this->db->query($sql1);
		$answer1= $result->result();
		foreach ($answer1 as $key) {
			
			$this->db->where('adId',$key->id);
			$this->db->where('edit',0);
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

			$answer[]=array('title'=>$key->title,'price'=>$key->price,'Image'=>$answer2['Image'],'id'=>$key->id,
			'createdate'=>$key->createdate,'duration'=>$key->duration,'featured'=>$key->featured,'expired'=>$key->expired);
		}
		return $answer;
		
	}
	public function getAdvertisement($adid)
	{
		$this->db->where('id',$adid);
		$result=$this->db->get('advertisement');
		$answer;
		if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$answer= $result->row_array();
				$this->load->model("users");
				$dataset1 = $this->users->get_main_details($answer['username']);
			
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
	public function deleteAd($ad_id)
	{
		$this->db->where('id',$ad_id);
		$this->db->delete('advertisement');
		$this->db->where('id',$ad_id);
		$this->db->delete('edit_advertisement');
		$this->db->where('adid',$ad_id);
		$this->db->delete('comments');
		$this->db->where('adId',$ad_id);
		$this->db->delete('featured');
		$this->db->where('id',$ad_id);
		$this->db->delete('new_advertisement');
	}
	public function extendAd($ad_id,$duration)
	{
		$this->db->where('adId',$ad_id);
			$result=$this->db->get('extend');
			
			if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$this->db->where('adId',$ad_id);
				$this->db->update('extend',array('duration'=>$duration));
			}
			else
			{
				$this->db->insert('extend',array('adId'=>$ad_id,'duration'=>$duration));
			}
	}
	public function featuredAd($ad_id,$duration)
	{
			$this->db->where('adId',$ad_id);
			$result=$this->db->get('featured');
			
			if($result->num_rows()>0)
			{
				//$answer2['Image']=null;
				$this->db->where('adId',$ad_id);
				$this->db->update('featured',array('duration'=>$duration,'approved'=>0));
			}
			else
			{
				$this->db->insert('featured',array('adId'=>$ad_id,'duration'=>$duration,'approved'=>0));
			}
		
	}
	public function getExtendList()
	{
				$answer=array();

			$sql1='SELECT id,adId,duration from extend order by duration desc';
		

		$result=$this->db->query($sql1);
		$answer1= $result->result();
		foreach ($answer1 as $key) {
			
			$this->db->where('adId',$key->adId);
			$this->db->where('edit',0);
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
			$this->db->where('id',$key->adId);
			$result=$this->db->get('advertisement');
			$answer3=$result->row_array();
			$answer[]=array('title'=>$answer3['title'],'Image'=>$answer2['Image'],'id'=>$key->id,
			'duration'=>$key->duration,'adId'=>$key->adId,'username'=>$answer3['username']);
		}
		return $answer;
	}
	public function acceptExtend($id)
	{
		$this->db->where('id',$id);
		$result=$this->db->get('extend');
			if($result->num_rows()>0)
			{
				
				$result=$this->db->get('extend');
				$answer2= $result->row_array();
				$answer2['duration']=$answer2['duration']*7;
				$this->db->where('id',$answer2['adId']);
				$result=$this->db->get('advertisement');
				$answer3= $result->row_array();
				$this->db->where('id',$answer2['adId']);
				$this->db->update('advertisement',array('duration'=>date('Y-m-d H:i:s',strtotime('+ '.$answer2['duration'].' day' ,strtotime($answer3['duration']))),'expired'=>0));
				$this->db->where('id',$id);
				$this->db->delete('extend');
				return true;
			}
			return false;
	}
	public function declineExtend($id)
	{
		$this->db->where('id',$id);
		$result=$this->db->get('extend');
			if($result->num_rows()>0)
			{
				
				$answer2= $result->row_array();
				
				$this->db->where('id',$id);
				$this->db->delete('extend');
				return true;
			}
			return false;
	}
	public function getFeaturedList()
	{
				$answer=array();

			$sql1='SELECT id,adId,duration from featured where approved=0 order by duration desc';
		

		$result=$this->db->query($sql1);
		$answer1= $result->result();
		foreach ($answer1 as $key) {
			
			$this->db->where('adId',$key->adId);
			$this->db->where('edit',0);
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
			$this->db->where('id',$key->adId);
			$result=$this->db->get('advertisement');
			$answer3=$result->row_array();
			$answer[]=array('title'=>$answer3['title'],'Image'=>$answer2['Image'],'id'=>$key->id,
			'adId'=>$key->adId,'username'=>$answer3['username']);
		}
		return $answer;
	}
	public function acceptFeatured($id)
	{
		$this->db->where('id',$id);
		$result=$this->db->get('featured');
			if($result->num_rows()>0)
			{
				
				
				$answer2= $result->row_array();
				
				$this->db->where('id',$answer2['adId']);
				
				$this->db->where('id',$answer2['adId']);
				$this->db->update('advertisement',array('featured'=>1));
				$this->db->where('adId',$answer2['adId']);
				$this->db->update('featured',array('approved'=>1));
				
				return true;
			}
			return false;
	}
	public function declineFeatured($id)
	{
		$this->db->where('id',$id);
		$result=$this->db->get('featured');
			if($result->num_rows()>0)
			{
				
				$answer2= $result->row_array();
				$this->db->where('id',$answer2['adId']);
				$this->db->update('advertisement',array('featured'=>0));
				$this->db->where('id',$id);
				$this->db->delete('featured');
				return true;
			}
			return false;
	}
	public function getHomeList()
	{
		$answer=array();
		$result1=$this->getCategory();
		foreach($result1 as $key)
		{
			$sql='SELECT * FROM advertisement where categoryid=\''.$key->id.'\'and expired=0 ORDER BY createdate desc LIMIT 1';
			$result=$this->db->query($sql);
			$answer1= $result->result();
			if(count($answer1)>0)
			{
				$answer2;
				foreach($answer1 as $key1)
				{
					$answer2=$key1;
				}
				$this->db->where('edit',0);
				$this->db->where('adId',$answer2->id);
				$answer3=$this->db->get('images');
				if($answer3->num_rows()>0)
				{
					$answer4=$answer3->row_array();
					
				}
				else
				{
					$answer4['Image']=null;
				}
				$answer[]=array('id'=>$answer2->id,'title'=>$answer2->title,'price'=>$answer2->price,'Image'=>$answer4['Image']);
			}
		}
		return $answer;
		
	}
	public function setcountryconfig($baseurl,$countryid)
	{
		$sql='SELECT * FROM country_config where url=\''.$baseurl.'\'';
			$result=$this->db->query($sql);
			$answer1= $result->result();
			if(count($answer1)>0)
			{
				$this->db->where('url',$baseurl);
				$this->db->update('country_config',array('countryid'=>$countryid));
			}
			else
			{
				$this->db->insert('country_config',array('url'=>$baseurl,'countryid'=>$countryid));
			}
		
		
	}
	
}