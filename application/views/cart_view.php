<!DOCTYPE html>
<html>
<title>Your ePortal Shopping Cart</title>
<div class="container">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			Your ePortal Shopping Cart
			<hr />
		</div>
		<div class="h2 text-left" style="margin-bottom: 26px;margin-left: 90px"><small>
			<?php
					if($num_ads<=0){
						echo '<span class="label label-danger">'.$num_ads.'</span>'; 
					}else if($num_ads<7){
						echo '<span class="label label-warning">'.$num_ads.'</span>';
					}else{
						echo '<span class="label label-success">'.$num_ads.'</span>';
					}
					 
				?> Advertisments Found</small>
				
		</div>
	<div class="panel-body">
			<?php $j=0; ?>
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
			<div class="col-sm-7">
				<div class="row">';
					
				   				 echo '<a href="'.base_url().'advertisement/viewAd/'.$ad->adid.'" class="text-primary"><u><b>'.$ad->title.'</b></u></a>'; 

					
				echo '</div></br>';
				echo '<div class="row"><p>Posted on '.$ad->cDATE.'</p></div>';
				//echo '<div class="pull-right"><input name="star'.$i.'" type="radio" class="star" checked="checked" disabled="disabled"/></div>';
				echo '<div class="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Price ';
				
    		/*$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			$price;
			foreach($country as $key)
			{
				$price=$key->currencysy;
			}*/
    		 echo $price.$ad->price.'</b>';
	echo '<div class="pull-right">';
	
	
    echo '</br>';
	echo'</div>';			
	echo'</div>';
					
	echo '</div>';
	echo '</div>';
	} ?>	
	</div>
	
</div>
</div>
</div>


</html>