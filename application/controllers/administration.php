<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends CI_Controller {
	
	public function index(){
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Dashboard');
		$this->load->view('v_administration');
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}	
		
	public function user_management(){
		$this->header('Administration');
		$this->load->model("admin");
		$this->load->model('site_model');
		$key=0;
		$dataset=array();
		
		$n_new = $this->admin->count_normal_new_updates();
		$n_all = $this->admin->count_normal_all_updates();
		$b_new = $this->admin->count_business_new_updates();
		$b_all = $this->admin->count_business_all_updates();
		$n_total_u = $this->admin->count_total_normal_users();
		$b_total_u = $this->admin->count_total_business_users();
		$total_u = $this->admin->count_total_users();
		$a_total_u = $this->admin->count_total_admin_users();
		$total_profile_reports = $this->admin->count_total_profile_reports();
		$top_5_reported_users = $this->admin->get_mostly_reported_users();
		
		foreach($top_5_reported_users as $key=>$value){
			$rp['accused_user_username'] = $value->accused_user;
			$rp['accused_user_name'] = $this->setup_names($value->accused_user);
			$rp['count'] = $value->count;
			$dataset[$key]=(object)$rp;
			$key++;
		}
		$data['top_5_reported_users']=$dataset;
		
		foreach($n_new as $info){$data['n_new'] = $info->n_new;}
		foreach($n_all as $info){$data['n_all'] = $info->n_all;}
		foreach($b_new as $info){$data['b_new'] = $info->b_new;}
		foreach($b_all as $info){$data['b_all'] = $info->b_all;}
		foreach($n_total_u as $info){$data['n_total_u'] = $info->n_total_u;}
		foreach($b_total_u as $info){$data['b_total_u'] = $info->b_total_u;}
		foreach($a_total_u as $info){$data['a_total_u'] = $info->a_total_u;}
		foreach($total_u as $info){$data['total_u'] = $info->total_u;}
		foreach($total_profile_reports as $info){$data['total_profile_reports'] = $info->total_profile_reports;}
		
		if($this->session->userdata('is_logged_in')){
		
		$data['total_ad_reports'] = $this->site_model->count_total_ad_reports();
		$this->load->view('v_administration_user_management',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function profileupdates($usertype,$reqtype){
		$this->load->model("admin");
		
		if($reqtype=='new' && $usertype=='n'){
			$data['update_data']= $this->admin->get_profileupdates($usertype,$reqtype);
			$data['panel_text']='Profile updates > Private users > New';
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Normal user new updates');
			$this->load->view("v_administration_new_updates_normal",$data);
			}
		else {
			$this->restricted();
		}
			
		}else if($reqtype=='new' && $usertype=='b'){
			$data['update_data']= $this->admin->get_profileupdates($usertype,$reqtype);
			$data['panel_text']='Profile updates > Business users > New';
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Business user new updates');
			$this->load->view("v_administration_new_updates_business",$data);
			}
		else {
			$this->restricted();
		}
		
		}else if($reqtype=='all' && $usertype=='n'){
			$data['update_data']= $this->admin->get_profileupdates($usertype,$reqtype);
			$data['panel_text']='Profile updates > Private users > all';
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Normal user updates');
			$this->load->view("v_administration_new_updates_normal",$data);
			}
		else {
			$this->restricted();
		}
		
		}else if($reqtype=='all' && $usertype=='b') {
			$data['update_data']= $this->admin->get_profileupdates($usertype,$reqtype);
			$data['panel_text']='Profile updates > Business users > all';
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Business user updates');
			$this->load->view("v_administration_new_updates_business",$data);
			}
		else {
			$this->restricted();
		}
		
		}else{
			$this->index();
		}
		$this->footer();
	}
	
	public function profile_update($usertype,$action,$username){
		$this->load->model("admin");
		if($action=='accept'){
			$db = $this->admin->get_user_update_data($usertype,$username);
			if($usertype=='n'){
				foreach($db as $info){
					if($info->fname!=null){$data0['fname']=$info->fname;}
					if($info->lname!=null){$data0['lname']=$info->lname;}
					if($info->profilepicture!=null){$data1['profilepicture']=$info->profilepicture;}
					if($info->telemarketer!=null){$data1['telemarketer']=$info->telemarketer;}
					if($info->description!=null){$data1['description']=$info->description;}
					if($info->add_ln_1!=null){$data1['add_ln_1']=$info->add_ln_1;}
					if($info->add_ln_2!=null){$data1['add_ln_2']=$info->add_ln_2;}
					if($info->add_ln_3!=null){$data1['add_ln_3']=$info->add_ln_3;}
					if($info->countryid!=null){$data1['countryid']=$info->countryid;}
					if($info->provinceid!=null){$data1['provinceid']=$info->provinceid;}
					if($info->districtid!=null){$data1['districtid']=$info->districtid;}
					if($info->password!=null){$data2['password']=$info->password;}
					if($info->contact_number!=null){$data1['contact_number']=$info->contact_number;}
				}
				
				if(isset($data0)){$stat1 = $this->admin->add_user_update_finish($usertype,$username,$data0);}
				if(isset($data1)){$stat2 = $this->admin->add_user_details_update_finish($username,$data1);}
				if(isset($data2)){$stat3 = $this->admin->add_user_password_update_finish($username,$data2);}
				$stat4 = $this->admin->delete_updates($usertype,$username);
				
				if(($stat1 || $stat2 || $stat3) && $stat4){
					redirect(base_url().'administration/profileupdates/n/new');
				}else{
					$this->header('not working');
				}
			}else if($usertype=='b'){
				foreach($db as $info){
					if($info->bname!=null){$data0['bname']=$info->bname;}
					if($info->profilepicture!=null){$data1['profilepicture']=$info->profilepicture;}
					if($info->telemarketer!=null){$data1['telemarketer']=$info->telemarketer;}
					if($info->description!=null){$data1['description']=$info->description;}
					if($info->add_ln_1!=null){$data1['add_ln_1']=$info->add_ln_1;}
					if($info->add_ln_2!=null){$data1['add_ln_2']=$info->add_ln_2;}
					if($info->add_ln_3!=null){$data1['add_ln_3']=$info->add_ln_3;}
					if($info->countryid!=null){$data1['countryid']=$info->countryid;}
					if($info->provinceid!=null){$data1['provinceid']=$info->provinceid;}
					if($info->districtid!=null){$data1['districtid']=$info->districtid;}
					if($info->password!=null){$data2['password']=$info->password;}
					if($info->contact_number!=null){$data1['contact_number']=$info->contact_number;}
				}
				
				if(isset($data0)){$stat1 = $this->admin->add_user_update_finish($usertype,$username,$data0);}
				if(isset($data1)){$stat2 = $this->admin->add_user_details_update_finish($username,$data1);}
				if(isset($data2)){$stat3 = $this->admin->add_user_password_update_finish($username,$data2);}
				$stat4 = $this->admin->delete_updates($usertype,$username);
				
				if(($stat1 || $stat2 || $stat3) && $stat4){
					redirect(base_url().'administration/profileupdates/b/new');
				}else{
					$this->header('redda');
				}
			}
		}else if($action=='reject'){
			if($this->admin->delete_updates($usertype,$username)){
				redirect(base_url().'administration');
			}else{
				$this->header('not working');
			}
		}else{
			redirect(base_url().'administration');
		}	
	}
	
	
	public function users($users){
		$this->load->model("admin");
		
		if($users=='n'){
			$data['users']=$this->admin->get_all_normal_user_details();
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - All Normal Users');
			$this->load->view("v_administration_users",$data);
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else if($users=='b'){
			$data['users']=$this->admin->get_all_business_user_details();
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - All Business Users');
			$this->load->view("v_administration_users",$data);
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else if($users=='a'){
			$data['users']=$this->admin->get_all_admin_user_details();
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - All Business Users');
			$this->load->view("v_administration_users",$data);
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else{
			$data['users']=$this->admin->get_all_user_details();
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - All Users');
			$this->load->view("v_administration_users",$data);
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}			
	}
	
	public function add_user($usertype){
		if($usertype=='a'){
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Add administrative user');
			$this->load->view("v_administration_add_user_admin");
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else if($usertype=='b'){
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Add business users');
			$this->load->view("v_administration_add_user_business");
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else if($usertype=='n'){
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Add normal users');
			$this->load->view("v_administration_add_user_normal");
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}else{
			
		}
	}
	
	public function add_user_admin_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|is_unique[waiting_normal_users.email]|is_unique[users.email]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|alpha_dash|is_unique[waiting_normal_users.username]|is_unique[users.username]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean|alpha');
		$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean|alpha');
		
		if($this->form_validation->run()){
			$this->load->model('admin');
			if($this->admin->add_user('a',$this->session->userdata('username'))){
				$name=$this->input->post('fname');
				$name.=' '.$this->input->post('lname');
				if($this->generate_and_send_email($name,$this->input->post('username'),$this->input->post('email'),$this->input->post('password'),'administrator')){
					$this->header('Administration - Add administrative user');
					$d['status']='complete';
					$this->load->view("v_administration_add_user_admin",$d);
					$this->footer();
				}else{
					//email not send
					$this->header('Administration - Add administrative user');
					$d['status']='email failed';
					$this->load->view("v_administration_add_user_admin",$d);
					$this->footer();
				}
			}else{
				//not added to db
				$this->header('Administration - Add administrative user');
				$d['status']='db error';
				$this->load->view("v_administration_add_user_admin",$d);
				$this->footer();
			}
		}else{
			//validations fails
			$this->add_user('a');
		}
	}
	
	public function add_user_business_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|is_unique[waiting_normal_users.email]|is_unique[users.email]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|alpha_dash|is_unique[waiting_normal_users.username]|is_unique[users.username]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('bname','Business Name','required|trim|xss_clean');
		
		if($this->form_validation->run()){
			$this->load->model('admin');
			if($this->admin->add_user('b',$this->session->userdata('username'))){
				$name=$this->input->post('bname');
				if($this->generate_and_send_email($name,$this->input->post('username'),$this->input->post('email'),$this->input->post('password'),'business-user')){
					$this->header('Administration - Add business user');
					$d['status']='complete';
					$this->load->view("v_administration_add_user_business",$d);
					$this->footer();
				}else{
					//email not send
					
					$this->header('Administration - Add business user');
					$d['status']='email failed';
					$this->load->view("v_administration_add_user_business",$d);
					$this->footer();
					
				}
			}else{
				//not added to db
				$this->header('Administration - Add business user');
				$d['status']='db error';
				$this->load->view("v_administration_add_user_business",$d);
				$this->footer();
			}
		}else{
			//validations fails
			$this->add_user('b');
		}
	}
	
	public function add_user_normal_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|is_unique[waiting_normal_users.email]|is_unique[users.email]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|alpha_dash|is_unique[waiting_normal_users.username]|is_unique[users.username]|is_unique[waiting_business_users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean|alpha');
		$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean|alpha');
		
		if($this->form_validation->run()){
			$this->load->model('admin');
			if($this->admin->add_user('n',$this->session->userdata('username'))){
				$name=$this->input->post('fname');
				$name.=' '.$this->input->post('lname');
				if($this->generate_and_send_email($name,$this->input->post('username'),$this->input->post('email'),$this->input->post('password'),'private-user')){
					$this->header('Administration - Add private user');
					$d['status']='complete';
					$this->load->view("v_administration_add_user_normal",$d);
					$this->footer();
				}else{
					//email not send
					$this->header('Administration - Add private user');
					$d['status']='email failed';
					$this->load->view("v_administration_add_user_normal",$d);
					$this->footer();
				}
			}else{
				//not added to db
				$this->header('Administration - Add private user');
				$d['status']='db error';
				$this->load->view("v_administration_add_user_normal",$d);
				$this->footer();
			}
		}else{
			//validations fails
			$this->add_user('a');
		}
	}
	
	function generate_and_send_email($name,$username,$email,$password,$acctType){
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
			$space='&nbsp;&nbsp;&nbsp;&nbsp;';
			
			$message='<b><u>E - Marketing Protal</u></b><br /><br />';
			$message.='An account has been created to you by,<br />';
			$message.='<a href="'.base_url().'profile/'.$this->session->userdata('username').'">'.$this->session->userdata('name').'</a>';
			$message.='<br />(administrator)<br/><br/>';
			$message.='Your account details are,<br />';
			$message.=''.$space.'Account type : '.$acctType;
			$message.='<br />'.$space.'Name : '.$name;
			$message.='<br />'.$space.'Username : '.$username;
			$message.='<br />'.$space.'Email : '.$email;
			$message.='<br />'.$space.'Password : '.$password;
			$message.='<br /><br />You can login to E - marketing portal by <a href="'.base_url().'signin">Clicking Here</a>';
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('jojocitytwo@gmail.com'); 
			$this->email->to($this->input->post('email'));
			$this->email->subject('E - Marketing portal');
			$this->email->message($message);
			
			if($this->email->send()){return true;}
			else{return false;}
	}
	
	public function users_reported($request){
		if($request=='view_all'){
			$this->load->model('admin');
			$key=0;
			$dataset=array();
			$profile_report=$this->admin->get_all_user_profile_reports();
			foreach($profile_report as $key=>$value){
				$data['rd_id'] = $value->rd_id;
				$data['ru_id'] = $value->ru_id;
				$data['accused_username'] = $value->accused_user;
				$data['reported_username'] = $value->reported_user;
				$data['accused_name'] = $this->setup_names($value->accused_user);
				$data['reported_name'] = $this->setup_names($value->reported_user);
				$data['reported_on'] = $value->reported_on;
				$data['report_type'] = $value->report_type_name;
				$data['description'] = $value->description;
				$dataset[$key]=(object)$data;
				$key++;
			}
			
			$reports['data']=$dataset;
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - User Profiles Reported');
			$this->load->view("v_administration_users_profile_reports",$reports);
			$this->footer();
			}
			else {
				$this->restricted();
			}
			
		}else{
			$this->load->model('admin');
			$key=0;
			$dataset=array();
			$profile_report=$this->admin->get_specific_user_profile_reports($request);
			
			foreach($profile_report as $key=>$value){
				$data['rd_id'] = $value->rd_id;
				$data['ru_id'] = $value->ru_id;
				$data['accused_username'] = $value->accused_user;
				$data['reported_username'] = $value->reported_user;
				$data['accused_name'] = $this->setup_names($value->accused_user);
				$data['reported_name'] = $this->setup_names($value->reported_user);
				$data['reported_on'] = $value->reported_on;
				$data['report_type'] = $value->report_type_name;
				$data['description'] = $value->description;
				$dataset[$key]=(object)$data;
				$key++;
			}
			
			$reports['data']=$dataset;
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - User Profiles Reported');
			$this->load->view("v_administration_users_profile_reports",$reports);
			$this->footer();
			}
			else {
				$this->restricted();
			}
		}
	}
	
	public function users_reported_resolved($rd_id,$ru_id){
		$this->load->model('admin');
		if($this->admin->users_reported_resolved($rd_id,$ru_id)){
			redirect(base_url().'administration/users_reported/view_all');
		}else{
			redirect(base_url().'administration/users_reported/view_all');
		}
	}
	
	function setup_names($username){
		$this->load->model('admin');
		$this->load->model("m_signin");
		$usertype = $this->admin->get_report_info_usertype($username);
		
		foreach($usertype as $userTyp){
			$usertype = $userTyp->usertype;
		}
		
		$name = $this->m_signin->get_user_dataset_type_2($usertype,$username);
		foreach ($name as $info){
			$name = $info->name;
		}
		
		return $name;
	}
	public function configDetails(){
		$data['success']=false;//creation inside the DB
		$this->load->model('advertisements');
		$data['title']='Create Advertisement';
		$answer=$this->advertisements->getCategory();
		if($this->input->post('category1')){
		
			$data['cat1']=$this->input->post('category1');
		}
		else
		{
			$data['cat1']=0;
		}
		if($this->input->post('category2')){
		
			$data['cat2']=$this->input->post('category2');
		}
		else
		{
			$data['cat2']=0;
		}
		if($this->input->post('subcategory1')){
		
			$data['subcat']=$this->input->post('subcategory1');
		}
		else
		{
			$data['subcat']=0;
		}
		if($this->input->post('country1')){
		
			$data['cou1']=$this->input->post('country1');
		}
		else
		{
			$data['cou1']=0;
		}
		if($this->input->post('country2')){
		
			$data['cou2']=$this->input->post('country2');
		}
		else
		{
			$data['cou2']=0;
		}
		if($this->input->post('country3')){
		
			$data['cou3']=$this->input->post('country3');
		}
		else
		{
			$data['cou3']=0;
		}
		if($this->input->post('country4')){
		
			$data['cou4']=$this->input->post('country4');
		}
		else
		{
			$data['cou4']=null;
		}
		
		if($this->input->post('province2')){
		
			$data['pro2']=$this->input->post('province2');
		}
		else
		{
			$data['pro2']=0;
		}
		if($this->input->post('province3')){
		
			$data['pro3']=$this->input->post('province3');
		}
		else
		{
			$data['pro3']=0;
		}
		if($this->input->post('district1')){
		
			$data['dis']=$this->input->post('district1');
		}
		else
		{
			$data['dis']=0;
		}
		
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post('country_submit'))
		{
		$this->form_validation->set_rules('country','New Country','required|trim|xss_clean|is_unique[country.name]');//setting rules for title
		$data['status_new_country']=false;
			if($this->form_validation->run())
			{
				
				$this->advertisements->setCountry($this->input->post('country'));
				//adding the country in the db
				$data['status_new_country']=true;
		
			}

		}
		if($this->input->post('country_config_submit'))
		{
		
		$data['status_set_country']=false;
			if($this->input->post('country4')>0)
			{
				
				$this->advertisements->setcountryconfig($this->input->post('baseurl'),$this->input->post('country4'));
				//adding the country in the db
				$data['status_set_country']=true;
		
			}

		}
		if($this->input->post('edit_country'))
		{
			$data['status_update_country']=false;
			if($this->input->post('country1')>0)
			{
				
		$this->form_validation->set_rules('country','New Country','required|trim|xss_clean|is_unique[country.name]');//setting rules for title
		
			if($this->form_validation->run())
			{
				
				$this->advertisements->updateCountry($this->input->post('country1'),$this->input->post('country'));
				//adding the country in the db
				$data['status_update_country']=true;
				
			
			}
			}
			else
			{
				$data['error']['country']='Please select Country';
			}
		}
		if($this->input->post('province_submit'))
		{
			$data['status_new_province']=false;
			if($this->input->post('country2')>0)
			{
				$this->form_validation->set_rules('province','New Province','required|trim|xss_clean');//setting rules for title
				
				if($this->form_validation->run())
				{
					if($this->advertisements->checkProvince($this->input->post('country2'),$this->input->post('province')))
					{
					$this->advertisements->setProvince($this->input->post('country2'),$this->input->post('province'));
					//adding the country in the db
					$data['status_new_province']=true;
					}
					else
					{
						$data['error']['province']='The New Province field must contain a unique value';
					}
		
				}
			}
			else 
			{
				$data['error']['province']='Please select Country';
			}
		}
		if($this->input->post('edit_province'))
		{
			$data['status_update_province']=false;
			if($this->input->post('country2')>0)
			{
				if($this->input->post('province2')>0)
				{
					$this->form_validation->set_rules('province','Province','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkProvince($this->input->post('country2'),$this->input->post('province')))
						{
							$this->advertisements->updateProvince($this->input->post('province2'),$this->input->post('province'));
							//adding the country in the db
							$data['status_update_province']=true;
						}
						else
						{
							$data['error']['province']='The New Province field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['province']='Please select Province';
				}
				
			}
			else
			{
				$data['error']['province']='Please select Country';
			}
			
		}
		
		if($this->input->post('district_submit'))
		{
			$data['status_new_district']=false;
			if($this->input->post('country3')>0)
			{
				if($this->input->post('province3')>0)
				{
					$this->form_validation->set_rules('district','District','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district')))
						{
						$this->advertisements->setDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district'));
						//adding the country in the db
						$data['status_new_district']=true;
						}
						else
						{
							$data['error']['district']='The New District field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['district']='Please select Province';
				}
				
			}
			else 
			{
				$data['error']['district']='Please select Country';
			}
		}
		if($this->input->post('edit_district'))
		{
			$data['status_update_district']=false;
			if($this->input->post('country3')>0)
			{
				if($this->input->post('province3')>0)
				{
					if($this->input->post('district1')>0)
					{
						
						$this->form_validation->set_rules('district','District','required|trim|xss_clean');//setting rules for title
						
						if($this->form_validation->run())
						{
							if($this->advertisements->checkDistrict($this->input->post('country3'),$this->input->post('province3'),$this->input->post('district')))
							{
								$this->advertisements->updateDistrict($this->input->post('district1'),$this->input->post('district'));
								//adding the country in the db
								$data['status_update_district']=true;
							}
							else
							{
								$data['error']['district']='The New District field must contain a unique value';
							}
			
						}
					}
					else
				 	{
						$data['error']['district']='Please select District';	
					}
				}
				else
				{
					$data['error']['district']='Please select Province';
				}
				
			}
			else
			{
				$data['error']['district']='Please select Country';
			}
			
		}
		if($this->input->post('category_submit'))
		{
		$this->form_validation->set_rules('category','New Category','required|trim|xss_clean|is_unique[category.name]');//setting rules for title
		$data['status_new_category']=false;
			if($this->form_validation->run())
			{
				
				$this->advertisements->setCategory($this->input->post('category'));
				//adding the country in the db
				$data['status_new_category']=true;
		
			}

		}
		if($this->input->post('edit_category'))
		{
			$data['status_update_category']=false;
			if($this->input->post('category1')>0)
			{
				
		$this->form_validation->set_rules('category','New Category','required|trim|xss_clean|is_unique[category.name]');//setting rules for title
		
			if($this->form_validation->run())
			{
				
				$this->advertisements->updateCategory($this->input->post('category1'),$this->input->post('category'));
				//adding the country in the db
				$data['status_update_category']=true;
				
			
			}
			}
			else
			{
				$data['error']['category']='Please select Category';
			}
		}
		if($this->input->post('subcategory_submit'))
		{
			$data['status_new_subcategory']=false;
			if($this->input->post('category2')>0)
			{
				$this->form_validation->set_rules('subcategory','New Subcategroy','required|trim|xss_clean');//setting rules for title
				
				if($this->form_validation->run())
				{
					if($this->advertisements->checkSubcategory($this->input->post('category2'),$this->input->post('subcategory')))
					{
					$this->advertisements->setSubcategory($this->input->post('category2'),$this->input->post('subcategory'));
					//adding the country in the db
					$data['status_new_subcategory']=true;
					}
					else
					{
						$data['error']['subcategory']='The New Subcategory field must contain a unique value';
					}
		
				}
			}
			else 
			{
				$data['error']['subcategory']='Please select Category';
			}
		}
		if($this->input->post('edit_subcategory'))
		{
			$data['status_update_subcategory']=false;
			if($this->input->post('category2')>0)
			{
				if($this->input->post('subcategory1')>0)
				{
					$this->form_validation->set_rules('subcategory','Subcategory','required|trim|xss_clean');//setting rules for title
					
					if($this->form_validation->run())
					{
						if($this->advertisements->checkSubcategory($this->input->post('category2'),$this->input->post('subcategory')))
						{
							$this->advertisements->updateSubcategory($this->input->post('subcategory1'),$this->input->post('subcategory'));
							//adding the country in the db
							$data['status_update_subcategory']=true;
						}
						else
						{
							$data['error']['subcategory']='The New Subcategory field must contain a unique value';
						}
			
					}
				}
				else
				{
					$data['error']['subcategory']='Please select Sub category';
				}
				
			}
			else
			{
				$data['error']['subcategory']='Please select Category';
			}
			
		}
		
		$answer=$this->advertisements->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		$data['category']=$send;
		$send=null;
		$send['0']='--Select--';
		if($data['cat2']>0){
		$answer=$this->advertisements->getSubCategories($data['cat2']);
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
		$data['country']=$send;
		$send=null;
		$send['0']='--Select--';
		if($data['cou2']>0){
			$answer=$this->advertisements->getProvinces($data['cou2']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province2']=$send;//loading the province in the dropdown list
		$send=null;	
		$send['0']='--Select--';
		if($data['cou3']>0){
			$answer=$this->advertisements->getProvinces($data['cou3']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province3']=$send;//loading the province in the dropdown list
		$send=null;
		$send['0']='--Select--';
		if($data['cou3']>0||$data['pro3']>0){
			$answer=$this->advertisements->getDistricts($data['cou3'],$data['pro3']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	
		if($this->session->userdata('is_logged_in')){
		$this->header('Configure Ad');
		$this->load->view('view_adconfig',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}

	}
	public function new_ads()
	{
		if( $this->input->post('continue')){
			$title = $this->input->post('title');
            $body = $this->input->post('body');
            $add  = $this->input->post('address');
            $tel  = $this->input->post ('tel');
			$img  = $this->input->post ('img');
		
		$this->load->model('m_rules');
        $this->m_rules->addCheck($title, $body, $add, $tel, $img);
		}
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		if($this->session->userdata('is_logged_in')){
		$this->header('View Fields');
		$this->load->view('v_check_fields',$data);
		$this->footer();
		}
		else {
			$this->restricted();
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
	
	function footer(){
		$this->load->view('footer');
	}
	public function acceptExtend($request,$id)
	{
		$this->load->model('advertisements');
		if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			if((isset($request))&&(isset($id)))
			{
				if($request=='accept')
				{
					if($this->advertisements->acceptExtend($id))
					{
						$data['status_accept']=true;
					}	
				}
				else if($request=='decline')
				{
					if($this->advertisements->declineExtend($id))
					{
						$data['status_decline']=true;
					}
				}
			}
			
			$this->load->model('advertisements');
			$data['Ads']=$this->advertisements->getExtendList();
			if($this->session->userdata('is_logged_in')){
			$this->header('Extend Requests');
			$this->load->view('view_extend_accept',$data);
			$this->footer();
			}
			else {
			$this->restricted();
		}
	}	
	public function acceptFeatured($request,$id)
	{
		$this->load->model('advertisements');
		if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			if((isset($request))&&(isset($id)))
			{
				if($request=='accept')
				{
					if($this->advertisements->acceptFeatured($id))
					{
						$data['status_accept']=true;
					}	
				}
				else if($request=='decline')
				{
					if($this->advertisements->declineFeatured($id))
					{
						$data['status_decline']=true;
					}
				}
			}
			
			$this->load->model('advertisements');
			$data['Ads']=$this->advertisements->getFeaturedList();
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Featured Requests');
			$this->load->view('view_featured_accept',$data);
			$this->footer();

	}
	}
	public function resolutionCenter($type=Null)
	{
		
			

	}	
	
	public function design_configuration(){
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Design configuration');
		$this->load->view('v_administration_design_configuration');
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function logo_configuration(){
		$this->load->model("admin");
		$log=$this->admin->get_logo_history('current');
		foreach($log as $info)
		{
			$data['original_name'] = $info->original_name;
			$data['size'] = $info->size;
			$data['dateandtime'] = $info->dateandtime;
			$data['name'] = $this->setup_names($info->username);
		}
		
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Logo configuration');
		$this->load->view('v_administration_design_configuration_logo',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function color_configuration(){
		$data=array();
		$this->load->model("admin");
		$log=$this->admin->get_theme_history('current');
		foreach($log as $info)
		{
			$data['theme'] = $info->theme;
			$data['name'] = $this->setup_names($info->username);
			$data['dateandtime'] = $info->dateandtime;
		}

		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Color theme configuration');
		$this->load->view('v_administration_design_configuration_color',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function dashboard_configuration(){
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Color theme configuration');
		$this->load->view('v_administration_design_configuration_dashboard');
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function icon_configuration(){
		$this->load->model("admin");
		$log=$this->admin->get_icon_history('current');
		foreach($log as $info)
		{
			$data['original_name'] = $info->original_name;
			$data['size'] = $info->size;
			$data['dateandtime'] = $info->dateandtime;
			$data['name'] = $this->setup_names($info->username);
		}
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Icon configuration');
		$this->load->view('v_administration_design_configuration_icon',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	
	
	public function apply_theme($theme){
		$this->load->helper('file');
		$this->load->model("admin");
		if($theme=='dp'){
			if($filedata = read_file('./css/themes/dark-purple.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Dark purple');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Dark purple</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/dark-purple.css)'.$path;
			}
		}else if($theme=='gl'){
			if($filedata = read_file('./css/themes/green-lantern.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Green Lantern');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Green lantern</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/green-lantern.css)';
			}
		}else if($theme=='nb'){
			if($filedata = read_file('./css/themes/nigel-blue.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Nigel blue');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Nigel blue</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/nigel-blue.css)';
			}
		}else if($theme=='nd'){
			if($filedata = read_file('./css/themes/nigel-dark.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Nigel dark');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Nigel dark</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';						
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';					
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/nigel-dark.css)';				
			}
		}else if($theme=='rf'){
			if($filedata = read_file('./css/themes/red-flash.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Red flash');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Red flash</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';						
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';					
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/red-flash.css)';				
			}
		}else if($theme=='vn'){
			if($filedata = read_file('./css/themes/venice.css')){
				if(unlink('./css/site-color-theme.css')){
					if(write_file('./css/site-color-theme.css',$filedata,'w')){
						$this->admin->site_theme_update($this->session->userdata('username'),'Venice');
						$data['status']='sucess';
						$data['message']='The theme has been successfully changed to <b>Venice</b>.';
					}else{
						$data['status']='fail';
						$data['message']='could not create and/or write the style sheet data to the site-color-theme.css file';
					}
				}else{
					$data['status']='fail';
					$data['message']='could not delete the current theme file (site-color-theme.css)';					
				}
			}else{
				$data['status']='fail';
				$data['message']='Could not read theme data from the original theme file. (css/themes/venice.css)';				
			}
		}else{
			$data['status']='info';
			$data['message']='unknown theme file selection';
		}

		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Color theme configuration');
		$this->load->view('v_administration_design_configuration_color_apply_status',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function logo_configuration_update(){
		$config['upload_path'] ='./images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']	= '5120'; //5mb
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()){
			$uploadData = $this->upload->data();
			if(file_exists('./images/site/logo.png')){
				if($delete = unlink('./images/site/logo.png')){
				}else{
					$delete = false;
					if($this->session->userdata('is_logged_in')){
					$this->header('Administration - Logo update fail');
					$data['message']='unable to delete the previous logo';
					$data['status']='fail';
					$this->load->view('v_administration_design_configuration_logo',$data);
					$this->footer();
					}
		else {
			$this->restricted();
		}
				}
			}else{
				$delete = true;	
			}
			
			if($delete){
				if(copy('./images/'.$uploadData['file_name'], './images/site/logo.png')){
					unlink('./images/'.$uploadData['file_name']);
					
					if($this->session->userdata('is_logged_in')){
					$this->header('Administration - Logo update fail');
					$this->load->model("admin");
					$this->admin->site_logo_update($this->session->userdata('username'),$uploadData['file_name'],$uploadData['file_size'],'logo');
					$log=$this->admin->get_logo_history('current');
					foreach($log as $info)
					{
						$data['original_name'] = $info->original_name;
						$data['size'] = $info->size;
						$data['dateandtime'] = $info->dateandtime;
						$data['name'] = $this->setup_names($info->username);
					}
					$data['message']='logo was successfully changed';
					$data['status']='success';
					$this->load->view('v_administration_design_configuration_logo',$data);
					$this->footer();
					}
					else {
						$this->restricted();
					}
				}else{
					if($this->session->userdata('is_logged_in')){
					$this->header('Administration - Logo update fail');
					$data['message']='unable to copy from original path to destination';
					$data['status']='fail';
					$this->load->view('v_administration_design_configuration_logo',$data);
					$this->footer();
					}
					else {
						$this->restricted();
					}
				}	
			}
		}else{
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Logo update fail');
			$data['uploadErr'] = $this->upload->display_errors();
			$data['message']='Upload error';
			$data['status']='fail';
			$this->load->view('v_administration_design_configuration_logo',$data);
			$this->footer();
			}
		else {
			$this->restricted();
		}
		}
	}

	
	public function icon_configuration_update(){
		$config['upload_path'] ='./images/';
		$config['allowed_types'] = 'ico';
		$config['max_size']	= '5120'; //5mb
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()){
			$uploadData = $this->upload->data();
			if(file_exists('./images/site/icon.ico')){
				if($delete = unlink('./images/site/icon.ico')){
				}else{
					$delete = false;
					if($this->session->userdata('is_logged_in')){
					$this->header('Administration - icon update fail');
					$data['message']='unable to delete the previous icon image';
					$data['status']='fail';
					$this->load->view('v_administration_design_configuration_icon',$data);
					$this->footer();
					}
		else {
			$this->restricted();
		}
				}
			}else{
				$delete = true;	
			}
			
			if($delete){
				if(copy('./images/'.$uploadData['file_name'], './images/site/icon.ico')){
					unlink('./images/'.$uploadData['file_name']);
					
					
					$this->header('Administration - Logo update fail');
					$this->load->model("admin");
					$this->admin->site_logo_update($this->session->userdata('username'),$uploadData['file_name'],$uploadData['file_size'],'icon');
					$log=$this->admin->get_icon_history('current');
					foreach($log as $info)
					{
						$data['original_name'] = $info->original_name;
						$data['size'] = $info->size;
						$data['dateandtime'] = $info->dateandtime;
						$data['name'] = $this->setup_names($info->username);
					}
		
					$data['message']='icon was successfully changed';
					$data['status']='success';
					if($this->session->userdata('is_logged_in')){
					$this->load->view('v_administration_design_configuration_icon',$data);
					$this->footer();
					}
					else {
						$this->restricted();
					}
				}else{
					if($this->session->userdata('is_logged_in')){
					$this->header('Administration - Logo update fail');
					$data['message']='unable to copy from original path to destination';
					$data['status']='fail';
					$this->load->view('v_administration_design_configuration_icon',$data);
					$this->footer();
					}
					else {
						$this->restricted();
					}
				}	
			}
		}else{
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Logo update fail');
			$data['uploadErr'] = $this->upload->display_errors();
			$data['message']='Upload error';
			$data['status']='fail';
			$this->load->view('v_administration_design_configuration_icon',$data);
			$this->footer();
			}
					else {
						$this->restricted();
					}
		}
	}

	public function custom_colour_theme(){
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Custom color theme configuration');
		$this->load->view('v_administration_design_configuration_color_custom');
		$this->footer();
		}
					else {
						$this->restricted();
					}
	}

	public function generate_colour_theme(){
		$find=array(
			'oneOne',
			'oneTwo',
			'oneThree',
			'oneFour',
			'twoOne',
			'twoTwo',
			'threeOne',
			'threeTwo',
			'threeThree',
			'threeFour',
			'threeFive',
			'fourOne',
			'fourTwo',
			'fiveOne',
			'fiveTwo'
		);
		
		$replaceWith=array(
			'#'.$this->input->post('oneOne'),
			'#'.$this->input->post('oneTwo'),
			'#'.$this->input->post('oneThree'),
			'#'.$this->input->post('oneFour'),
			'#'.$this->input->post('twoOne'),
			'#'.$this->input->post('twoTwo'),
			'#'.$this->input->post('threeOne'),
			'#'.$this->input->post('threeTwo'),
			'#'.$this->input->post('threeThree'),
			'#'.$this->input->post('threeFour'),
			'#'.$this->input->post('threeFive'),
			'#'.$this->input->post('fourOne'),
			'#'.$this->input->post('fourTwo'),
			'#'.$this->input->post('fiveOne'),
			'#'.$this->input->post('fiveTwo'),
		);
		$this->load->helper('file');
		if($filedata = read_file('./css/themes/custom.css')){
			if(file_exists('./css/site-color-theme.css')){
				if(unlink('./css/site-color-theme.css')){
					$delete=true;
				}else{
					$delete=false;
					$data['status']='fail';
					$data['message']='Deleting the current theme file failed';
				}
			}
			if($delete){
				if($generatedData=str_replace($find, $replaceWith, $filedata)){
					if(write_file('./css/site-color-theme.css',$generatedData,'w')){
						$this->load->model("admin");
						$this->admin->site_theme_update($this->session->userdata('username'),'Custom theme');
						$data['status']='sucess';
						$data['message']='A new custom theme has been successfully created in your preferences.';
					}else{
						$data['status']='fail';
						$data['message']='Saving the generated file theme failed.';
					}
				}else{
					$data['status']='fail';
					$data['message']='Generating the theme file with your preferences failed.';
				}
			}
		}else{
			$data['status']='fail';
			$data['message']='Reading custom.css file failed';
		}
		if($this->session->userdata('is_logged_in')){
		$this->header('Administration - Custom color theme generating');
		$this->load->view('v_administration_design_configuration_color_custom_status',$data);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function history($type,$get){
		$data['h_type'] = $type;
		$data['h_get'] = $get;
		$stat=false;
		$log=array();
		$this->load->model("admin");
		
		if($type=='icon'&& ($get=='all' || $get=='current')){
			$stat=true;
			$log=$this->admin->get_icon_history($get);
		}else if($type=='theme'&& ($get=='all' || $get=='current')){
			$stat=true;
			$log=$this->admin->get_theme_history($get);
		}else if($type=='logo'&& ($get=='all' || $get=='current')){
			$stat=true;
			$log=$this->admin->get_logo_history($get);
		}else{}
		
		if($stat && $type=='theme' && ($get=='all' || $get=='current')){
			$history=array();
			$dataset=array();
			$key=0;
			foreach($log as $key=>$value){
				$history['theme'] = $value->theme;
				$history['dateandtime'] = $value->dateandtime;
				$history['name'] = $this->setup_names($value->username);
				$dataset[$key]=(object)$history;
				$key++;
			}

			$data['history']=$dataset;
			
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Site history logo/icon');
			$this->load->view('v_administration_design_configuration_history_theme',$data);
			$this->footer();
					}
		else {
			$this->restricted();
		}
		}else if($stat && ($type=='logo' || $type=='icon') && ($get=='all' || $get=='current')){
			$history=array();
			$dataset=array();
			$key=0;
			foreach($log as $key=>$value){
				$history['original_name'] = $value->original_name;
				$history['size'] = $value->size;
				$history['dateandtime'] = $value->dateandtime;
				$history['name'] = $this->setup_names($value->username);
				$dataset[$key]=(object)$history;
				$key++;
			}
			
			$data['history']=$dataset;
			if($this->session->userdata('is_logged_in')){
			$this->header('Administration - Site history logo/icon');
			$this->load->view('v_administration_design_configuration_history_icon_logo',$data);
			$this->footer();
			}
		else {
			$this->restricted();
		}

		}else{
			show_404('asdasdasdasdasd','hmmmm');
		}
	}

	public function resolution()
	{
		$this->load->model('resolutionCenters');
		$data['complain']=$this->resolutionCenters->getAllComplains();
		$data['rejected']=$this->resolutionCenters->getAllRejectedComplains();
		$data['opened']=$this->resolutionCenters->getAllOpenedTickets();
		$data['resolved']=$this->resolutionCenters->getAllResolvedTickets();
		$this->header('Resolution Center');
			$this->load->view('view_admin_resolution',$data);
			$this->footer();
	}	

	public function resolution_status($request,$id)
	{
		$this->load->model('resolutionCenters');
		if((isset($request))&&(isset($id)))
			{
				if($request=='reject')
				{
					if($this->resolutionCenters->request_reject($id))
					{
						$data['status_reject']=true;
					}	
				}
				else if($request=='resolved')
				{
					if($this->resolutionCenters->request_resolved($id))
					{
						$data['status_resolved']=true;
					}
				}
			}
		$this->load->model('resolutionCenters');
		$data['complain']=$this->resolutionCenters->getAllComplains();
		$data['rejected']=$this->resolutionCenters->getAllRejectedComplains();
		$data['opened']=$this->resolutionCenters->getAllOpenedTickets();
		$data['resolved']=$this->resolutionCenters->getAllResolvedTickets();
		
		$this->header('Resolution Center');
			$this->load->view('view_admin_resolution',$data);
			$this->footer();	
		
		
		
	}
	public function resolution_history($id)
	{
		$this->load->model('resolutionCenters');
		$this->load->model('messages');
		$data['all']=$this->resolutionCenters->getAllTickets();
		$data['history']=true;
		$ticket=$this->resolutionCenters->getTicket($id);
		foreach($ticket as $row){
		$data['accused']=$row->accused;
		$data['accuser']=$row->accuser;
		}
		$data['conversation']=$this->messages->getConversation($data['accused'],$data['accuser']);
		$this->header('Resolution Center');
			$this->load->view('view_admin_resolution',$data);
			$this->footer();	
	}
	public function resolution_complain($id)
	{
		$this->load->model('resolutionCenters');
		$this->load->model('messages');
		$data['all']=$this->resolutionCenters->getAllTickets();
		$data['history']=true;
		$ticket=$this->resolutionCenters->getComplain($id);
		foreach($ticket as $row){
		$data['accused']=$row->accused;
		$data['accuser']=$row->accuser;
		}
		$data['conversation']=$this->messages->getConversation($data['accused'],$data['accuser']);
		$this->header('Resolution Center');
			$this->load->view('view_admin_resolution',$data);
			$this->footer();	
	}
	public function issueTicket()
	{
		$this->load->model('resolutionCenters');
		$complain=$this->resolutionCenters->getComplain($this->input->post('complainId'));
		foreach($complain as $result)
		{
			
			$this->resolutionCenters->issueTicket($result->id,$result->accuser,$result->accused,$this->input->post('description'));
			$this->db->where('id',$result->id)->update('complain',array('status'=>'read'));
		}		
	redirect(base_url().'administration/resolution'); 
			 
	}
	public function resolution_messaging($id)
	{
		$this->load->model('resolutionCenters');
		$this->load->model('messages');
		//$data['all']=$this->resolutionCenters->getAllTickets();
		$data['message']=true;
		$ticket=$this->resolutionCenters->getTicket($id);
		$data['id']=$id;
		foreach($ticket as $row){
		$data['accused']=$row->accused;
		$data['accuser']=$row->accuser;
		$data['issue']=$row->issue;
		$data['status']=$row->status;
		
		}
		$data['messages']=$this->messages->getMessages($id);
		$this->header('Resolution Center');
		$this->load->view('view_admin_resolution',$data);
		$this->footer();	
	} 
	public function set_issue_header()
	{
		$this->load->model('resolutionCenters');
		$complain=$this->resolutionCenters->getComplain($this->input->post('id'));
		foreach($complain as $result)
		{
			echo 'The Ticket will be Issued Against '.$result->accused.' Complained by <br/>'.$result->accuser
			.'  for  complaint id : '.$result->id;
		}
	}
	public function set_Message()
	{
		$this->load->model('resolutionCenters');
		$this->resolutionCenters->setMessage($this->input->post('id'),$this->input->post('from'),$this->input->post('message'));
	}
	public function getMessages(){
				$this->load->model('resolutionCenters');
			$conversation=$this->resolutionCenters->getMessages($this->input->post('id'));
			$ticket=$this->resolutionCenters->getTicket($this->input->post('id'));
			foreach($ticket as $info){
				$accuser=$info->accuser;
				$accused=$info->accused;
			}
			foreach($conversation as $message){
				if($message->from==$this->input->post('from')){
					echo '<div class="comment_right"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else if($message->from==$accuser||$message->from==$accused)
				{
					echo '<div class="comment_left"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else{
					echo '<div class="comment_left"><p style="color:#0066FF;">Admin<p>'.$message->content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
			}
	
	}
	


	public function restricted() {
		$this->header('Please Signin');
		$this->load->view("v_restricted");
		$this->footer();
	}

}
