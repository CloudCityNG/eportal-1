<div class="container breadcrumb text-white" style="background-color: #196CE8">
	<br />
</div>

<br />

<div class="container breadcrumb">
	
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