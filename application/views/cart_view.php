<!DOCTYPE html>
<html>
<title>Your ePortal Shopping Cart</title>
<div class="container">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			<strong>Your ePortal Shopping Cart </strong><span class="glyphicon glyphicon-shopping-cart" ></span> 
			<hr />
		</div>
		<?php if($num_ads<=0): ?>
			<div class="h2 text-center" style="margin-bottom: 26px;">
				<small>Your cart is empty</small>
				
		</div>
		<?php endif; ?>
		
		<?php if($num_ads>0): ?>
		<div class="h2 text-left" style="margin-bottom: 26px;margin-left: 90px"><small>
			<?php
					if($num_ads<=0){
						echo '<span class="label label-danger">'.$num_ads.'</span>'; 
					}else if($num_ads<7){
						echo '<span class="label label-warning">'.$num_ads.'</span>';
					}else{
						echo '<span class="label label-success">'.$num_ads.'</span>';
					}
					 
				?> Items Pending to Checkout</small>
				
		</div>
		
	<div class="panel-body">
			<?php $sum=0; $cartids = array(); ?>
	<?php foreach ($ads as $ad)
	{
		echo '<div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-2 pull-left">';
				 
				    	
				    	if(isset($ad->image) && $ad->image!=NULL){
				    		echo '<img  height="100" src="'.base_url().$ad->image.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-9">
				<div class="row" style="height:30px">';
					
			echo '<a href="'.base_url().'advertisement/viewAd/'.$ad->adid.'" class="text-primary"><b>'.$ad->title.'</b></a>'; 

				echo '<div class="pull-right"><h4><b>'.$curcode.' '.$ad->price.'/=</b></h4></div>';
				$sum = $sum + $ad->price;
				echo '</div>';
				echo '<div class="row" style="height:20px"><p>Reserved on :'.$ad->bDATE.'</p></div>';
				echo '<div class="row" style="height:20px"><p>Seller :<a href="'.base_url().'profile/'.$ad->owner.'">'.$ad->owner_name.'</a></p></div>';
				echo '<div class="row" style="height:20px"><p>Location :'.$ad->location.'</p></div>';
				
				
				
				
	echo '<div class="pull-right">';
	echo '<a href="'.base_url().'cart/remove_item/'.$ad->adid.'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span><b>&nbspRemove&nbsp;</b></a>';
    //echo '</br>';			
	echo'</div>';
					
	echo '</div>';
	echo '</div>';
	} ?>
	
	<!--total panel-->
	
	<div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;">
	<div class="col-sm-2 pull-left">
				 
				    	
	<?php /*			    	if(isset($ad->image) && $ad->image!=NULL){
				    		echo '<img  height="100" src="'.base_url().$ad->image.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
	*/?>				
	</div>
			<div class="col-sm-9">
				<div class="row">
					
	

	<div class="pull-right"><h3><strong>Total&nbsp;(<?php echo $num_ads.' '; ?>Items): <?php echo $curcode.' '.$sum; ?>/=</strong></h3></div>	
	</div>
	<div class="row pull-right">
	<a href="<?php echo base_url().'cart/checkout/' ?>" class="btn btn-sm btn-primary"><b>&nbsp;&nbsp;Proceed to Checkout&nbsp;</b></a>
	</div>
				
	</div>
	</div>
	
		
	</div>
	<?php endif; ?>
</div>
</div>
</div>


</html>