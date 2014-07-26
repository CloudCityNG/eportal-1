<div class="container">
	<div class="col-md-8">
		<div class="col-md-12">
			<img width="720px" src="<?php echo base_url().'images/3702_GBH_ROW_SellerBanners_Week_26_MFBB_868x250_Tech_EN_C02_6_5_2014_7_16_56_552.jpg'?>" />
		</div>
	</div>
	<div class="col-md-4">
		<div class="md-md-12 theme-box-background-text breadcrumb theme-box-background">
			<div class="h4 text-center">
				Ad-Email Notifier
			</div>
			<br />
			<hr style="margin-top: -10px" />
			<div class="h5 text-left">
				Want a E-mail notifications?<br /><br />
				Subscribe to get email notifications when a new item is added to your favorite categories
			</div>
			
			<a <?php if($this->session->userdata('username')){?>href="<?php echo base_url().'subscribe'?>" <?php }else{ ?> data-toggle="modal" href="#myModal" <?php } ?>class="btn btn-block btn-default">Subscribe</a>
		</div>
	</div>
</div>

<br />

<div class="container breadcrumb-white ">
	
	<?php $count=0; $adcount=count($Ads); foreach($Ads as $ad){?>
	<?php if(($count%4)==0){?>	
	<div class="row">
		<?php }?>
		<div class="col-md-3">
			
		  	<div class="thumbnail">
		  		<div style="height: 200px"align="center"><a href="<?php echo base_url().'advertisement/viewAd/'.$ad['id'];?>">
		  			<?php if(isset($ad['Image'])&&$ad['Image']!=null){?>
	      			<img style="max-height: 200px; max-width: 250px; width:auto !important; height:auto !important;" src="<?php echo base_url().$ad['Image']?>">
	      			<?php }else{?>
	      			<img width="250px" height="200px" src="<?php echo base_url().'images/Advertisement/imagenotfound.png'?>">
	      				<?php }?></a>
	       		</div>
	      		<div class=" h4 caption text-center">
	      			<?php echo $ad['title'];?>
	       		</div>
	       		<div class="caption text-center">
		       		<div class="text-left">
		       	 		<span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Price&nbsp;<?php
    		$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			$price;
			foreach($country as $key)
			{
				$price=$key->currencysy;
			}
    		 echo $price; ?>&nbsp;<?php echo $ad['price'];?>
		       		</div>
	    		</div>
	    		<div class="caption text-center">
	       			<div class="text-right">
	       	 			<a href="<?php echo base_url().'advertisement/viewAd/'.$ad['id'];?>" class="btn btn-default">View Ad</a>
	       			</div>
	   	 		</div>
	    	</div>
	    	
		</div>
			<?php if(($count%4)==3||($count==$adcount)){?>	
			</div>
		<?php }?>
	<?php $count++;}?>
</div>	

<div class="col-lg-4">				
</div>
<?php if(!$this->session->userdata('username')){?>
<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #660066">
					<a herf="#" class="btn btn-sm text-white pull-right pull-up" data-dismiss="modal"> X </a>
					<h4 class="text-white text-center">Please login to subscribe to this service</h4>
				</div>
				<div class="modal-body" style="min-height: 80px;">
					<div class="col-md-6">
						<div class="col-md-12">
							<a class="btn btn-block btn-default">Login</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12">
							<a class="btn btn-block btn-default">Signup</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>