<?php
    class cart  extends CI_Controller
    {
    	function view_cart ($adid)
		{
			$this->header('Search');
			
			$this->load->model('cart_model');
			if($this->cart_model->add_to_cart($adid))
			{
				redirect(base_url().'cart/my_cart');
			}
			
			else {
				//redirect("advertisement/viewAd/$adid");
				$this->load->view('cart_view');
			}
			
		}
		
		function remove_item($adid)
		{
			if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			else {
			$this->load->model('cart_model');
			if($this->cart_model->remove_item($adid))
			{
				redirect(base_url().'cart/my_cart');
			}
				}
			
			
		}
		
		function my_cart()
		{
			if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			
			$this->header('Search');
			
			$this->load->model('cart_model');
			$results = $this->cart_model->get_reserved();
			$data['ads'] = $results['rows'];
			$data['num_ads'] = $results['num_rows'];
			
			$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			foreach($country as $key)
			{
				$curcode=$key->currencysy;
			}
    		 
    		 $data['curcode'] = $curcode;
			
			$this->load->view('cart_view', $data);
			
		}
		
		function checkout()
		{
			if(!$this->session->userdata('username'))
			{
				redirect(base_url().'signin');
			}
			//add items to purchase
			$this->load->model('history_model');
			$result = $this->history_model->add_to_purchase();
			
			//remove items from cart
			$this->load->model('cart_model');
			$result = $this->cart_model->delete_cart();
			if($result)
			{
				redirect(base_url().'history/view_history');
			}
			else
			{
				redirect(base_url().'cart/my_cart');
			}
			
			
			
			//$this->load->view('cart_view', $data);
			
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
		