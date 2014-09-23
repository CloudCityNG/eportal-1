<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends CI_Controller {
	
	public function index()
	{
		$this->header('Accept Advertisements');
		$this->load->view("v_administration_rules_main");
		$this->footer();
	}
	
	public function new_ads()
	{
	/*	if( $this->input->post('continue')){
			$title = $this->input->post('title');
            $body = $this->input->post('body');
            $add  = $this->input->post('address');
            $tel  = $this->input->post ('tel');
			$img  = $this->input->post ('img');
		
		$this->load->model('m_rules');
        $this->m_rules->addCheck($title, $body, $add, $tel, $img);
		}*/
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('Advertisement List');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	
	public function testing(){
		$this->load->model('m_rules');
		$test1 = 'good';
		$result1 = $this->m_rules->algorithm($test1);
		$test2 = 'good very ';
		$result2 = $this->m_rules->algorithm($test2);

		if($result1 || $result2){
						// send reject email
						echo("reject");
		}
		else {
			//$this->accept_ad($ad_id);
			//$this->testmail();
			echo("accepted");
			//send approve notification
		}
	}

	public function testing1(){
		$this->load->model('m_rules');
		$this->m_rules->find_urls('hello this link www.google.lk');
	}
	
	public function back1(){
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('View Fields');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	public function editAd($adid)
	{
		
		$this->load->model('m_rules');
		$answer1=$this->m_rules	->getAdvertisement($adid);
		
		$this->load->model('m_rules');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[14]');//setting rules for price
		
	
		$data['title']='Edit Advertisement';
		$data['success']=false;
		$data['ad_id']=$adid;
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
		if($this->input->post('country')){
		
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
		}
		/*if($this->input->post('duration')){
		
			$data['dur']=$this->input->post('duration');
		}
		else
		{
			$data['dur']=14;
		}*/

		
		
			
			if($this->input->post('back'))
			{
				redirect('/rules/back1');
				//$data['state']='data';
	
			}
			
			
			if($this->input->post('advertisment_accept'))
			{
				redirect('/rules/accept_ad/'.$adid);
				//$data['state']='data';
	
			}
			
			if($this->input->post('advertisment_deny'))
			{
				redirect('/rules/deny_ad/'.$adid);
				//$data['state']='data';
	
			}
				
				
			
				$imagedata=$this->m_rules->get_edit_images($adid);
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
				$imagedata=$this->m_rules->get_images($adid);
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
		$answer=$this->m_rules->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['category']=$send;//loading categories in the dropdown list
		$send=null;
		
		
		$send['0']='--Select--';
		if($data['cat']>0){
		$answer=$this->m_rules->getSubCategories($data['cat']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
				
		$answer=$this->m_rules->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
			
		}
		$data['country']=$send;
		$send=null;
		
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->m_rules->getProvinces($data['cou']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';
		if($data['cou']>0||$data['pro']>0){
			$answer=$this->m_rules->getDistricts($data['cou'],$data['pro']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	
		$data['title']='Accept Ad';
		$this->header('Accept Ad');
		$this->load->view('v_view_fields',$data);
		$this->footer();		
	}

	public function viewAd($adid)//view for displaying ads
		{
			$this->load->model('m_rules');
			$this->load->model('advertisements');
			$answer1;
			if(!isset($adid)&&($this->m_rules->getAdvertisement($adid)==null))
			{
				
				
				redirect('/rules/new_ads');
			
			}
			$imagedata=$this->m_rules->get_images($adid);
				$images=array();
				foreach ($imagedata as $img) 
				{	
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
			$data['adid']=$adid;
			$data['images']=$images;
			$answer1=$this->m_rules->getAdvertisement($adid);
			if($answer1['approved']==0)
			{
				if($this->session->userdata('username')!=$answer1['username'])
				{
					redirect('/rules/new_ads');
				}
			}
			$data['Title']=$answer1['title'];
			$data['body']=$answer1['body'];
			$data['price']=$answer1['price'];
			$data['email']=$answer1['email'];
			$data['name']=$answer1['name'];
			$data['address']=$answer1['address'];
			$data['telephone']=$answer1['telephone'];
			$data['featured']=$answer1['featured'];
			$data['username']=$answer1['username'];
			$data['countryid']=$answer1['countryid'];
			$data['provinceid']=$answer1['provinceid'];
			$data['districtid']=$answer1['districtid'];	
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


			$this->header('View Ad');
			$this->load->view('v_administration_view_approvingad',$data);
			$this->footer();
			
		}
	
	private function send_subscription_mail($a){
		$this->load->model('m_rules');
		
		if($this->m_rules->check_if_new($a)){
			$table = 'new_advertisement';
		}
		else{
			$table = 'edit_advertisement';
		}
		
		$result = $this->m_rules->get_cid_sid_subscription($a,$table);
		$count=0;
		
		foreach($result as $record){
			$cid=$record->categoryid;
			$sid=$record->subcategoryid;
			$un=$record->username;
			$count++;
		}
		if($count>0){
		$result = $this->m_rules->get_email_subscription($cid,$sid,$un);
		$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'jojocitytwo@gmail.com',
			  	'smtp_pass' => 'jojocity',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('jojocitytwo@gmail.com'); 
			$this->email->subject('E - Marketing portal');
			$message="<b>E - Marketing Protal</b><br />";
			$message.="A new Advertisement has been posted for your subscription.<br /><br />";
			$message.="<a href='".base_url()."advertisement/viewAd/$a'>click here</a> to view the ad.";
			$this->email->message($message);
		
		foreach($result as $record){
			$this->email->to($record->email);
			$this->email->send();
		}
		}
	}
	
	
	public function accept_ad($a){
		$this->load->model('m_rules');
		if($this->m_rules->check_if_new($a)){
			$table = "new_advertisement";
			//accept from new table
			$username = $this->m_rules->get_username($a,$table);
			foreach($username as $key){
				$usr = $key->username;
			}
			
		}
		else{
			$table = 'edit_advertisement';
			//accept from edit table
			$username = $this->m_rules->get_username($a,$table);
			foreach($username as $key){
				$usr = $key->username;
			}
		}
		try{
		$this->send_subscription_mail($a);
		}
		catch(exception $e){
			
		}
		if($this->m_rules->check_if_new($a)){
			$this->m_rules->accept_ad($a,$table);
		}
        else{
        	$this->m_rules->accept_edit($a,$table);
        }
		
		$rate = $this->m_rules->get_whiterate($usr);
				foreach($rate as $hana){
					$whiterate=$hana->whiterate;
					$whiterate++;
					$this->m_rules->set_whiterate_of_user($usr,$whiterate);
				}
	//	$this->m_rules->increase_whiterate($a);
		//$status_accept  = TRUE;
		$this->new_ads();
	}
	
	public function deny_ad($a){
		
		$this->load->model('m_rules');
		if($this->m_rules->check_if_new($a)){
			$table = "new_advertisement";
					//reject from new table
			$username = $this->m_rules->get_username($a,$table);
			foreach($username as $key){
			$usr = $key->username;
			}
		}
		else{
			$table = "edit_advertisement";
			//reject from edit table
			$username = $this->m_rules->get_username($a,$table);
			foreach($username as $key){
			$usr = $key->username;
			}
		}
			if($this->m_rules->check_if_new($a)){
			$this->m_rules->deny_ad($a,$table);
		}
        else{
        	$this->m_rules->deny_edit($a,$table);
        }
		
		$rate = $this->m_rules->get_blackrate($usr);
				foreach($rate as $hana){
					$blackrate=$hana->blackrate;
					$blackrate++;
					$this->m_rules->set_blackrate_of_user($usr,$blackrate);
				}
		
		$this->new_ads();

	}
	
	//new
	public function algorithm($inputstring){
		
		//first check for links and emails
		//if positive don't continue, reject the ad
		
		//then divide it into words
		$exploded = $this->multiexplode(array(",",".","|",":","?","!","-","_"),$inputstring);
		
		//ignore the case
		
		//check the words with the Bad Word List
		
		
	}
	
	//new
	public function multiexplode($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
	}
	
	public function send_denial_email(){
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
			
			$message = 'Your Advertisement has been denied ';
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to('gcrescape@gmail.com');
			$this->email->subject('Advertisement Denied(Eportal)');
			$this->email->message($message);
			if($this->email->send())
			{
				//echo("success");
			}
			else
			{
				echo("fail");
			}
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
	
	public function approvebyrating(){
		if($this->session->userdata('is_logged_in')){
			
			$this->load->model("m_rules");
			
		
			
		if($this->input->post('Save_whiterate')){	
			$this->m_rules->set_white_boundary($this->input->post('white'));
		}

		if($this->input->post('Save_blackrate')){	
			$this->m_rules->set_black_boundary($this->input->post('black'));
		}
		
		$test1=$this->m_rules->get_white_boundary();
		foreach($test1 as $hana){
			$result1['whitevalue']=$hana->value;
		}
		
		$test2=$this->m_rules->get_black_boundary();
		foreach($test2 as $han){
			$result1['blackvalue']=$han->value;
		}
		$this->header('Automatic Approval');
		$this->load->view('v_administration_autoapp',$result1);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function whitelist(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('m_rules');
			
			if($this->input->post('Submit'))
			{				
				foreach($this->m_rules->get_whitelist_count()as $row)
				{
					$num=$row->count;
				}				
					$arr=array();
					$j=0;
					for($i=1;$i<=$num;$i++){
						$a=0;
						
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
										$a=1;
						}
						$user = $this->input->post('usr'.$j);			
						$arr[]=array('1'=>$a,'2'=>$user);
					}
					$this->m_rules->remove_from_whitelist($arr);									
			}
			$data['users']=$this->m_rules->get_whitelist_users();
			$this->header('White List');
			$this->load->view("v_administration_auto_whitelist",$data);
			$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function blacklist(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('m_rules');
			
			if($this->input->post('Submit'))
			{
				foreach($this->m_rules->get_blacklist_count()as $row)
				{
					$num=$row->count;
				}
					$arr=array();
					$j=0;
					for($i=1;$i<=$num;$i++){
						$a=0;
						
						$j++;
						$str='chk'.$j;
						if(isset($_POST[$str]))
						{
			//				echo $_POST[$str];
										$a=1;
						}
						$user = $this->input->post('usr'.$j);
						$arr[]=array('1'=>$a,'2'=>$user);
					}
					$this->m_rules->remove_from_blacklist($arr);						
			}
			$data['users']=$this->m_rules->get_blacklist_users();
			$this->header('Black List');
			$this->load->view("v_administration_auto_blacklist",$data);
			$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function restricted() {
		$this->header('Please Signin');
		$this->load->view("v_restricted");
		$this->footer();
	}

	function footer(){
		$this->load->view('footer');
	}
}