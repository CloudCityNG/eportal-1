<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisement extends CI_Controller {

	public function index(){
	
	}	
	public function createAd(){
		if(!$this->session->userdata('username'))
		{
			redirect(base_url().'signin');
		}
		$this->load->model('advertisements');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		//$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		//$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[14]');//setting rules for price
		
	
		$data['title']='Create Advertisement';
		$data['success']=false;
		$ad_id;
		if(!$this->input->post('ad_id')){
		$ad_id=uniqid();
			$data['ad_id']=$ad_id;
		}
		else
		{
			$data['ad_id']=$this->input->post('ad_id');
			$ad_id=$data['ad_id'];
		}
		if($this->input->post('category')){
		
			$data['cat']=$this->input->post('category');
		}
		else
		{
			$data['cat']=0;
		}
		if($this->input->post('subcategory')){
		
			$data['subcat']=$this->input->post('subcategory');
		}
		else
		{
			$data['subcat']=0;
		}
		if($this->input->post('country')){
		
			$data['cou']=$this->input->post('country');
		}
		else
		{
			$data['cou']=0;
		}
		if($this->input->post('province')){
		
			$data['pro']=$this->input->post('province');
		}
		else
		{
			$data['pro']=0;
		}
		if($this->input->post('district')){
		
			$data['dis']=$this->input->post('district');
		}
		else
		{
			$data['dis']=0;
		}
		if($this->input->post('duration')){
		
			$data['dur']=$this->input->post('duration');
		}
		else
		{
			$data['dur']=0;
		}

		if($this->input->post('advertisment_submit'))
		{
			if($this->form_validation->run())
			{
				$data['state']='upload';
			}
			/*{//if validations are comppleted		
				
				$ad_id=uniqid();
				$this->session->set_userdata('ad_id',$ad_id);
				$this->advertisements->setAdvertisement(
				$ad_id,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				$this->input->post('country'),
				$this->input->post('district'),
				$this->input->post('province'),
				$this->input->post('price'),
				$this->input->post('address'),
				date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				$data['success']=true;
				//}
			
			}*/
		}
		$this->load->model('users');
      			$dataset = $this->users->get_main_details($this->session->userdata('username'));
		foreach ($dataset as $info){
			$data['p_email'] = $info->email;
			$data['p_usertype'] = $info->usertype;
			$data['p_prfilepicture'] = $info->profilepicture;
			$data['p_telemarketer'] = $info->telemarketer;
			$data['p_description'] = $info->description;
			$data['p_add_ln_1'] = $info->add_ln_1;
			$data['p_add_ln_2'] = $info->add_ln_2;
			$data['p_add_ln_3'] = $info->add_ln_3;
			$data['telephone']=$info->contact_number;
			$data['cou']=$info->countryid;
			$data['pro']=$info->provinceid;
			$data['dis']=$info->districtid;
		}
			if($this->input->post('Finish_submit'))
			{
				$data['state']='upload';
				if(!$this->form_validation->run())
				{
					$data['state']='data';
				}
				else
				{
									$this->advertisements->setAdvertisement(
				$ad_id,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				$data['cou'],
				$data['dis'],
				$data['pro'],
				$this->input->post('price'),
				$this->input->post('address'),
				$this->input->post('telephone'),
				$this->session->userdata('email'),
				$this->session->userdata('username'),
				date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				//$data['success']=true;
				//}
					$data['success']=true;
					
					//hansila
					$this->load->model('m_rules');
					$result1 = $this->m_rules->algorithm($this->input->post('title'));
					$result2 = $this->m_rules->algorithm($this->input->post('body'));
					$this->load->model('notifications');
					if($result1 || $result2){
						// send reject email
						echo("reject");
						$this->notifications->setNotification($this->session->userdata('username'),'Advertisement rejected',
						'Your Advertisement is not accepted please create a new ad from the link <a href="'.base_url().'advertisement/createAd">'.base_url().'/advertisement/createAd</a>');
					}
					else {
						$this->m_rules->accept_new_ad($ad_id);
						//$this->testmail();
						echo("accepted");
						$this->notifications->setNotification($this->session->userdata('username'),'Advertisement Pending',
						'Your Advertisement is pendng for admins approval.');
						
						//send approve notification
					}
				}
				
			}
			
			if($this->input->post('back')){
				$data['state']='data';
			}
			
				
			if($this->input->post('image_submit')){
				$data['state']='upload';
				$this->advertisements->do_upload('skds',$ad_id);
			}
				
			
				$imagedata=$this->advertisements->get_images($ad_id);
				$images=array();
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				$data['images']=$images;
		
		//$data['titles']='Create Advertisement';
		$answer=$this->advertisements->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['category']=$send;//loading categories in the dropdown list
		$send=null;
		
		
		$send['0']='--Select--';
		if($data['cat']>0){
		$answer=$this->advertisements->getSubCategories($data['cat']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
		$this->load->model('users');
      			$dataset = $this->users->get_main_details($this->session->userdata('username'));
		foreach ($dataset as $info){
			$data['p_email'] = $info->email;
			$data['p_usertype'] = $info->usertype;
			$data['p_prfilepicture'] = $info->profilepicture;
			$data['p_telemarketer'] = $info->telemarketer;
			$data['p_description'] = $info->description;
			$data['p_add_ln_1'] = $info->add_ln_1;
			$data['p_add_ln_2'] = $info->add_ln_2;
			$data['p_add_ln_3'] = $info->add_ln_3;
			$data['telephone']=$info->contact_number;
			$data['cou']=$info->countryid;
			$data['pro']=$info->provinceid;
			$data['dis']=$info->districtid;
		}		
		$answer=$this->advertisements->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			if($data['cou']==$key->id){
			$data['country']=$key->name;
				break;
			}
		}
		
		$send=null;
		$data['province']=null;
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->advertisements->getProvinces($data['cou']);
			foreach($answer as $key){
		if($data['pro']==$key->id){
			$data['province']=$key->name;
			break;
			}
			}
		}
		
		$data['district']=null;
		$send['0']='--Select--';
		if($data['cou']>0&&$data['pro']>0){
			$answer=$this->advertisements->getDistricts($data['cou'],$data['pro']);
			foreach($answer as $key){
		if($data['dis']==$key->id){
			$data['district']=$key->name;
			break;
			}
			}
		}
		
		
		$data['title']='Create Ad';
		$this->header('Create Ad');
		$this->load->view('view_ad',$data);
		$this->footer();
	}

	/*public function advertisement_validate(){
		$this->load->model('advertisements');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[13]');//setting rules for price
		
		
	
		$data['title']='Create Advertisement';
		$data['success']=false;
		$config['upload_path'] ='./images/Advertisement/';
		$config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG';
		$config['max_size']	= '5120'; //5mb
		$this->load->library('upload', $config);
		

		if($this->form_validation->run())
		{//if validations are comppleted
		if (!$this->upload->do_upload())
		{
			
			//$data['profileData'] = $this->profile_details('kasun');
			$data['uploadStatus'] = $this->upload->display_errors();
	
		}else{
			$data2 = array('upload_data' => $this->upload->data());
			$data2['upload_data']['file_name'];
			$ad_id=uniqid();
			$this->session->set_userdata('ad_id',$ad_id);
			//$this->load->model("users");
			//$this->users->add_user_profilepicture($data2['upload_data']['file_name'],'Ad',$ino);
			$this->advertisements->setAdvertisement(
			$ad_id,
			$this->input->post('title'),
			$this->input->post('body'),
			$this->input->post('category'),
			$this->input->post('subcategory'),
			$this->input->post('country'),
			$this->input->post('district'),
			$this->input->post('province'),
			$this->input->post('price'),
			$this->input->post('address'),
			
			date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
			//,	$data2['upload_data']['file_name']
			);//adding the advertisementin the db
			$data['success']=true;
			//}
			
		}
		
			$this->load->model('advertisements');
			$data['title']='Create Advertisement';
			$answer=$this->advertisements->getCategory();
		
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
			
			}
	
			$data['category']=$send;
			$send=null;
			$answer=$this->advertisements->getSubCategory();

			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;

			}
			$data['subcategory']=$send;
			$send=null;
				
			$answer=$this->advertisements->getCountry();
					
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
				
			}
			$data['country']=$send;
			$send=null;
			$answer=$this->advertisements->getProvince();
			
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
		
			}
			$data['province']=$send;
			$send=null;	
			$answer=$this->advertisements->getDistrict();
				
			foreach ($answer as $key ) {
				$send[$key->id]=$key->name;
			
			}
			$data['district']=$send;
			$send=null;	
			$this->header('Create Ad');
			$this->load->view('view_ad',$data);
			$this->footer();
			
			
		}	*/


		public function viewAd($adid)//view for displaying ads
		{
			$this->load->model('advertisements');
			$answer1;
			if(!isset($adid)&&($this->advertisements->getAdvertisement($adid)==null))
			{
				
				
				redirect('/advertisement/adList');
			
			}
			$imagedata=$this->advertisements->get_images($adid);
				$images=array();
				foreach ($imagedata as $img) 
				{	
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
			$data['adid']=$adid;
			$data['images']=$images;
			$answer1=$this->advertisements->getAdvertisement($adid);
			if($answer1['approved']==0)
			{
				if($this->session->userdata('username')!=$answer1['username'])
				{
					redirect('/advertisement/adList');
				}
			}
			$data['Title']=$answer1['title'];
			$data['body']=$answer1['body'];
			$data['price']=$answer1['price'];
			$data['email']=$answer1['email'];
			$data['name']=$answer1['name'];
			$data['address']=$answer1['address'];
			$data['telephone']=$answer1['telephone'];
			$data['telemarketer']=$answer1['telemarketer'];
			$data['featured']=$answer1['featured'];
			$data['username']=$answer1['username'];
			$data['countryid']=$answer1['countryid'];
			$data['provinceid']=$answer1['provinceid'];
			$data['districtid']=$answer1['districtid'];	
			$data['p_add_ln_1'] = $answer1['add_ln_1'];
			$data['p_add_ln_2'] = $answer1['add_ln_2'];
			$data['p_add_ln_3'] = $answer1['add_ln_3'];
			$data['categoryid']=$answer1['categoryid'];
			$data['subcategoryid']=$answer1['subcategoryid'];
			$data['ad_id']=$answer1['ad_id'];
			
			$this->db->where('id',$answer1['categoryid']);
			$result=$this->db->get('category');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['category']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['subcategoryid']);
			$result=$this->db->get('subcategory');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['subcategory']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['countryid']);
			$result=$this->db->get('country');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['country']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['provinceid']);
			$result=$this->db->get('province');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['province']=$answer['name'];
			}

			$this->db->where('id',$answer1['districtid']);
			$result=$this->db->get('district');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['district']=$answer['name'];
			}


			$this->load->model('site_model');			
			$comments = $this->site_model->getcommnets($adid);
			$data['comments'] = $comments['rows'];
			
			$this->load->model('rating_m');			
			$rating = $this->rating_m->get_rate($adid,$this->session->userdata('username'));
			$data['avg_rate'] = $rating['avg_rate'];
			$data['total_rate'] = $rating['total_rate'];
			$data['is_rated'] = $rating['is_rated'];
			$data['rate'] = $rating['rate'];
			
			$this->header('View Ad');
			$this->load->view('view_advert',$data);
			$this->footer();
			
		}
		public function validate_title()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
			if($this->form_validation->run())
			{
				
			}
		}
		public function testmail()
		{
			/*while(1)
			{
				echo("infinite/n");
				sleep(5);
			}*/
			$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'it12030736@my.sliit.lk',
			  	'smtp_pass' => 'It12030736@#1',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			
			$message = 'testmail';
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to('gcrescape@gmail.com');
			$this->email->subject('Gayam');
			$this->email->message($message);
			if($this->email->send())
			{
				echo("success");
			}
			else
			{
				echo("fail");
			}
		}
		public function image_gallery()
		{
			if($ad_id=$this->session->userdata('ad_id')){
				$this->load->model('advertisements');
				if($this->input->post('image_submit'))
				{
				
					$this->advertisements->do_upload('skds',$ad_id);
				
				}
				
			
				$imagedata=$this->advertisements->get_images($ad_id);
				$images=array();
				foreach ($imagedata as $img) {
					$images[]=array('url'=>$img['Image']);
				}
				$data['images']=$images;
				$this->load->view('header',$data);
				$this->load->view('set_gallery',$data);
				$this->load->view('footer');

			}
			else{
				redirect('/advertisement/createAd');
			}
		}
		public function getSubCategories()
		{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getSubcategories($this->input->post('subcatid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."-No Subcategory-"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
		}
		public function getProvinces()
		{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getProvinces($this->input->post('couid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."-No Province-"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
		}
		public function getDistricts()
		{
			$this->load->model('advertisements');
			$answer=$this->advertisements->getDistricts($this->input->post('couid'),$this->input->post('proid'));
						
			$output=null;
			if(count($answer)<1){
				$output .= "<option value='"."0"."'>"."-No District-"."</option>";
			}
			else
			{
				$output .= "<option value='"."0"."' selected>"."-Select-"."</option>";
			}
			foreach ($answer as $key ) {
				 $output .= "<option value='".$key->id."'>".$key->name."</option>";

			}

			echo $output;
		}

	function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->load->view('header_admin',$data);
			}else{
				$this->load->view('header_loggedin',$data);
			}
		}
		else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	function footer(){
		$this->load->view('footer');
	}
	public function adList()
	{
			if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			
			$this->load->model('advertisements');
			$data['Ads']=$this->advertisements->getAdlist($this->session->userdata('username'));
			$this->header('My Advertisements');
			$this->load->view('viewad_list',$data);
			$this->footer();
	}
	public function deleteAd($ad_id)
	{
		if(!isset($ad_id))
		{
			redirect(base_url().'advertisement/adList');	
		}
		if(!$this->session->userdata('username'))
		{
				redirect(base_url().'signin');
		}

		$this->load->model('advertisements');
				$imagedata=$this->advertisements->get_images($ad_id);
		foreach ($imagedata as $img) 
		{
			$this->advertisements->remove_image($img['id'],$img['Image']);
		}
		
		$this->advertisements->deleteAd($ad_id);
		$data['success']=true;
			$this->header('Delete Advertisement');
			$this->load->view('view_delete_ad',$data);
			$this->footer();
	}
	public function extendAd($ad_id,$duration)
	{
		if(!isset($ad_id))
		{
			redirect(base_url().'advertisement/adList');	
		}
		else if(!isset($duration))
		{
			redirect(base_url().'advertisement/adList');
		}
		if(!$this->session->userdata('username'))
		{
				redirect(base_url().'signin');
		}
		$this->load->model('advertisements');
		$answer1=$this->advertisements->getAdvertisement($ad_id);
		if($answer1!=null&&$this->session->userdata('username')!=$answer1['username'])
		{
			redirect(base_url().'advertisement/adList');
		}
		$this->load->model('advertisements');
		$this->advertisements->extendAd($ad_id,$duration);
			$data['success']=true;
		$this->header('Delete Advertisement');
		
			$this->load->view('view_extend_ad',$data);
			$this->footer();
		
	}
	public function featuredAd($ad_id)
	{
		if(!isset($ad_id))
		{
			redirect(base_url().'advertisement/adList');	
		}
		if(!$this->session->userdata('username'))
		{
				redirect(base_url().'signin');
		}
		$this->load->model('advertisements');
		$answer1=$this->advertisements->getAdvertisement($ad_id);
		if($answer1!=null&&$this->session->userdata('username')!=$answer1['username'])
		{
			redirect(base_url().'advertisement/adList');
		}

		$this->advertisements->featuredAd($ad_id,$answer1['duration']);
			$data['success']=true;
		$this->header('Featured Advertisement');
		
			$this->load->view('view_featured_ad',$data);
			$this->footer();
		
	}
	public function editAd($ad_id)
	{
		if(!isset($ad_id))
		{
			redirect(base_url().'advertisement/adList');	
		}

		if(!$this->session->userdata('username'))
		{
				redirect(base_url().'signin');
		}
		$this->load->model('advertisements');
		$answer1=$this->advertisements->getAdvertisement($ad_id);
		if($answer1!=null&&$this->session->userdata('username')!=$answer1['username'])
		{
			redirect(base_url().'advertisement/adList');
		}
		
		$this->load->model('advertisements');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		//$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		//$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[14]');//setting rules for price
		
	
		$data['title']='Edit Advertisement';
		$data['success']=false;
		$data['ad_id']=$ad_id;
		$data['title1']=$answer1['title'];
		$data['body']=$answer1['body'];
		$data['address']=$answer1['address'];
		$data['telephone']=$answer1['telephone'];
		$data['price']=$answer1['price'];
		if($this->input->post('category')){
		
			$data['cat']=$this->input->post('category');
		}
		else
		{
			$data['cat']=$answer1['categoryid'];
		}
		if($this->input->post('subcategory')){
		
			$data['subcat']=$this->input->post('subcategory');
		}
		else
		{
			$data['subcat']=$answer1['subcategoryid'];
		}
		/*if($this->input->post('country')){
		
			$data['cou']=$this->input->post('country');
		}
		else
		{
			$data['cou']=$answer1['countryid'];
		}
		if($this->input->post('province')){
		
			$data['pro']=$this->input->post('province');
		}
		else
		{
			$data['pro']=$answer1['provinceid'];
		}
		if($this->input->post('district')){
		
			$data['dis']=$this->input->post('district');
		}
		else
		{
			$data['dis']=$answer1['districtid'];
		}*/


		if($this->input->post('advertisment_submit'))
		{
			
			if($this->form_validation->run())
			{
				$data['state']='upload';
			}
			/*{//if validations are comppleted
			
				
				
				$ad_id=uniqid();
				$this->session->set_userdata('ad_id',$ad_id);
				$this->advertisements->setAdvertisement(
				$ad_id,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				$this->input->post('country'),
				$this->input->post('district'),
				$this->input->post('province'),
				$this->input->post('price'),
				$this->input->post('address'),
				date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				$data['success']=true;
				//}
			
			}*/
		}
		
			if($this->input->post('Finish_submit'))
			{
				$data['state']='upload';
				if(!$this->form_validation->run())
				{
					$data['state']='data';
				}
				else
				{
				$this->advertisements->updateAdvertisement(
				$ad_id,
				$this->input->post('title'),
				$this->input->post('body'),
				$this->input->post('category'),
				$this->input->post('subcategory'),
				//$this->input->post('country'),
				//$this->input->post('district'),
				//$this->input->post('province'),
				$this->input->post('price')
				//$this->input->post('address'),
				//$this->input->post('telephone'),
				//$this->session->userdata('email'),
				//$this->session->userdata('username')
				//date('Y-m-d H:i:s',strtotime('+ '.$this->input->post('duration').' day' ,strtotime(date('Y-m-d H:i:s'))))
				//,	$data2['upload_data']['file_name']
				);//adding the advertisementin the db
				//$data['success']=true;
				//}
					$data['success']=true;
				}
				
				//hansila
					$this->load->model('m_rules');
					$result1 = $this->m_rules->algorithm($this->input->post('title'));
					$result2 = $this->m_rules->algorithm($this->input->post('body'));
					$this->load->model('notifications');
					if($result1 || $result2){
						// send reject email
						echo("reject");
						$this->notifications->setNotification($this->session->userdata('username'),'Edit Advertisement rejected',
						'Your Advertisement is not accepted please create a new ad from the link <a href="'.base_url().'advertisement/editAd'.$ad_id.'">'.base_url().'/advertisement/editAd'.$ad_id.'</a>');
						
					}
					else {
						$this->m_rules->accept_edit_ad($ad_id);
						//$this->testmail();
						echo("accepted");
						$this->notifications->setNotification($this->session->userdata('username'),'Edit Advertisement Pending',
						'Your Edit Advertisement is pendng for admins approval.');
						//send approve notification
					}
				
			}
			if($this->input->post('back'))
			{
				$data['state']='data';
	
			}
			
				
				if($this->input->post('image_submit'))
				{
					$data['state']='upload';
					$this->advertisements->do_edit_upload('skds',$ad_id);
				
				}
				
			
				$imagedata=$this->advertisements->get_edit_images($ad_id);
				$images=array();
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				$imagedata=$this->advertisements->get_images($ad_id);
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				
				$data['images']=$images;
		
		//$data['titles']='Create Advertisement';
		$answer=$this->advertisements->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['category']=$send;//loading categories in the dropdown list
		$send=null;
		
		
		$send['0']='--Select--';
		if($data['cat']>0){
		$answer=$this->advertisements->getSubCategories($data['cat']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
				
		$answer=$this->advertisements->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
			
		}
		/*$data['country']=$send;
		$send=null;
		
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->advertisements->getProvinces($data['cou']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';
		if($data['cou']>0||$data['pro']>0){
			$answer=$this->advertisements->getDistricts($data['cou'],$data['pro']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	*/
		$data['title']='Edit Ad';
		$this->header('Edit Ad');
		$this->load->view('view_edit_ad',$data);
		$this->footer();
	}

	function submit_rate($adid=0)
	{
		$qarray = array(
		'username' => $this->session->userdata('username'),
		'adid' => $adid,
		'rate' => $this->input->post("star",TRUE),
		'ratedate' => date("Y-m-d H:i:s") 
		);
		
		$this->load->model('rating_m');
		$results = $this->rating_m->put_rate($qarray);
		
		redirect("advertisement/viewAd/$adid");
	}
	
	public function getflag()
	{
		$this->load->model('advertisements');
			$answer=$this->advertisements->getalpha_2($this->input->post('couid'));
						
			
			
				 //$output = "<img id='flag' src='".$this->input->post('baseurl')."images/countries/".$answer.".png";

			

			echo $answer;
		
	}
	public function getContactDetails()
	{
			$this->load->model('advertisements');
			$answer1;
			$adid=$this->input->post('adid');
			if(!isset($adid)&&($this->advertisements->getAdvertisement($adid)==null))
			{
				
				
				redirect('/advertisement/adList');
			
			}
			
			$answer1=$this->advertisements->getAdvertisement($adid);
			
			$data['email']=$answer1['email'];
			$data['name']=$answer1['name'];
			$data['address']=$answer1['address'];
			$data['telephone']=$answer1['telephone'];
			$data['countryid']=$answer1['countryid'];
			$data['provinceid']=$answer1['provinceid'];
			$data['districtid']=$answer1['districtid'];	
			$data['p_add_ln_1'] = $answer1['add_ln_1'];
			$data['p_add_ln_2'] = $answer1['add_ln_2'];
			$data['p_add_ln_3'] = $answer1['add_ln_3'];
			
			
			$this->db->where('id',$answer1['categoryid']);
			$result=$this->db->get('category');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['category']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['subcategoryid']);
			$result=$this->db->get('subcategory');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['subcategory']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['countryid']);
			$result=$this->db->get('country');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['country']=$answer['name'];
			}
			
			$this->db->where('id',$answer1['provinceid']);
			$result=$this->db->get('province');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['province']=$answer['name'];
			}
			else
			{
				$data['province']=null;
			}

			$this->db->where('id',$answer1['districtid']);
			$result=$this->db->get('district');

			if($result->num_rows()>0){
				$answer= $result->row_array();
		 		$data['district']=$answer['name'];
			}
			else
			{
				$data['district']=null;
			}
			
			echo 	'<div class="panel-body">
	    		<label for="inputEmail3" class="col-md-4 control-label"><span class="glyphicon glyphicon-user"></span> Name :</label><div class="col-md-7"><p><a  href="'.base_url().'profile/'.$answer1['username'].'">'
	    		.$answer1['name'].'</a></p></div>';
	    		
	    	echo	'<label for="inputEmail3" class="col-md-4 control-label"><span class="glyphicon glyphicon-envelope"></span> Email :</label>
	    			<div class="col-md-7"><p>'
	    			.$answer1['email'].'</p>
	    		</div>
				</br/>';
				
    		echo '<label for="inputEmail3" class="col-md-4 control-label"><span class="glyphicon glyphicon-home"></span> Address :</label>
    		
    		<div class="col-md-7">';
      			
      			echo '<p>'.$answer1['add_ln_1'].'</p>';
				echo '<p>'.$answer1['add_ln_2'].'</p>';
				echo '<p>'.$answer1['add_ln_3'].'</p>';
				if(isset($data['province'])||$data['province']!=null)
				{
					echo '<p>'.$data['province'];
					if(isset($data['district'])||$data['district']!=null)
					{
						echo ','.$data['district'];
						
					}
					echo '</p>';
				}
				echo $data['country'];
      				/*$emailattributes = array('class' => 'form-control','name'=>'address');
      				echo form_input($emailattributes,$this->input->post('address'));
					if(form_error('address')!=null)
						echo '<div class="alert alert-danger">'.form_error('address').'</div>';*/
      			
    		echo '</div>
  			
  		<br />
  		
	    		
	    			<label for="inputEmail3" class="col-md-4 control-label"><span class="glyphicon glyphicon-earphone"></span> Telephone : </strong>&nbsp;&nbsp;</label>
    		<div class="col-md-7">
	    			';
	    			echo $answer1['telephone'];
	    		
	    		echo '</div>
	    		</div>
	    		</div>';
	}

	public function accept_ad($a){
		$this->load->model('m_rules');
        $this->m_rules->accept_ad($a);
	}

	public function words(){
		$this->header('My Advertisements');
		$this->load->view('v_rules_words');
		$this->footer();
	}
}
	