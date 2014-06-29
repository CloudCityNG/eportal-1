<div class="container">
	<div class="col-md-8">
		<div class="col-md-12 breadcrumb-white img-thumbnail">
			/*slide show*/
		</div>
	</div>
	<div class="col-md-4">
		<div class="md-md-12 text-white breadcrumb"style="background-color: #660066">
			<div class="h4 pull-left">
				Ad Notifier
			</div>
			<hr />
			<div class="h5 text-left">
				Subscribe to get email notifications when a new item is added to your favorite categories
			</div>
			
			<a class="btn btn-block btn-default">Subscribe</a>
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
		  		<div style="height: 200"align="center"><a href="<?php echo base_url().'advertisement/viewAd/'.$ad['id'];?>">
		  			<?php if(isset($ad['Image'])&&$ad['Image']!=null){?>
	      			<img style="max-height: 200; max-width: 250" src="<?php echo base_url().$ad['Image']?>">
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
	<br />
		<br />
			<br />
				<br />
					<br />
						<br />
						
</div>