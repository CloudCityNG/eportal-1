<?php
    class cart  extends CI_Controller
    {
    	function view_cart ($adid)
		{
			$this->header('Search');
			
			$this->load->model('cart_model');
			if($this->cart_model->add_to_cart($adid))
			{
				$this->load->view('cart_view');
			}
			
			else {
				//redirect("advertisement/viewAd/$adid");
				$this->load->view('cart_view');
			}
			
		}
		
		function my_cart()
		{
			$this->header('Search');
			
			$this->load->model('cart_model');
			$results = $this->cart_model->reserved_count();
			$data['ads'] = $results['rows'];
			$data['num_ads'] = $results['num_rows'];
			
			
			$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			foreach($country as $key)
			{
				$price=$key->currencysy;
			}
    		 
    		 $data['price'] = $price;
			
			$this->load->view('cart_view', $data);
			
		}
		
		function header ($tile)
	{
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
	
	}
?>
		