<!DOCTYPE html>
<html>
<title>My Purchase History</title>
<div class="container">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			<strong>My Purchase History</strong><span class="glyphicon glyphicon-shopping-cart" ></span> 
			<hr />
		</div>
		
		<ul class="nav nav-tabs" role="tablist" id="myTab">
			  <li class="active"><a href="#one" role="tab" data-toggle="tab">Items Bought</a></li>
			  <li><a href="#two" role="tab" data-toggle="tab"> Items Sold</a></li>
		</ul>
		
		<div class="tab-content">
				<!--start tab one-->
				<div class="tab-pane active" id="one">
				<?php if($num_bads<=0): ?>
			<div class="h2 text-center" style="margin-bottom: 26px;">
				<small>No items bought so far</small>
			</div>
		<?php endif; ?>
		
		<?php if($num_bads>0): ?>
		<div class="h2 text-left" style="margin-bottom: 26px;margin-left: 90px"><small>
			<?php
					if($num_bads<=0){
						echo '<span class="label label-danger">'.$num_bads.'</span>'; 
					}else if($num_bads<7){
						echo '<span class="label label-warning">'.$num_bads.'</span>';
					}else{
						echo '<span class="label label-success">'.$num_bads.'</span>';
					}
					 
				?> Items have been bought</small>
				
		</div>
		
		
		<div class="panel-body">
			<?php $sum=0; ?>
	<?php foreach ($bads as $bad)
	{
	 
	 
		echo '<div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-2 pull-left">';
				 
				    	
				    	if(isset($bad->image) && $bad->image!=NULL){
				    		echo '<img  height="100" src="'.base_url().$bad->image.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
				<div class="col-sm-9">
				<div class="row" style="height:30px">';
					
			echo '<a href="'.base_url().'advertisement/viewAd/'.$bad->adid.'" class="text-primary"><b>'.$bad->adid.'</b></a>'; 
		
				//echo '<div class="pull-right"><h4><b>'.$curcode.' '.$bad->price.'/=</b></h4></div>';
				//$sum = $sum + $bad->price;
				//echo '</div>';
				echo '<div class="row" style="height:20px"><p>Bought on :'.$bad->bDATE.'</p></div>';
				echo '<div class="row" style="height:20px"><p>Seller :<a href="'.base_url().'profile/'.$bad->seller.'">'.$bad->seller.'</a></p></div>';
				//echo '<div class="row" style="height:20px"><p>Location :'.$bad->location.'</p></div>';
				
				
				
				
	//echo '<div class="pull-right">';
	//echo '<a href="'.base_url().'cart/remove_item/'.$bad->adid.'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span><b>&nbspRemove&nbsp;</b></a>';
    //echo '</br>';			
	//echo'</div>';
					
	echo '</div>';
	echo '</div>';
	echo '</div>';
	} ?>
	
	<!--total panel-->
		
	</div>
	<?php endif; ?>	
				</div>
				<!--end tab one-->
				<!--start tab two-->
  				<div class="tab-pane" id="two">
  					
  					<?php if($num_sads<=0): ?>
			<div class="h2 text-center" style="margin-bottom: 26px;">
				<small>No items sold so far</small>
			</div>
		<?php endif; ?>
		
		<?php if($num_sads>0): ?>
		<div class="h2 text-left" style="margin-bottom: 26px;margin-left: 90px"><small>
			<?php
					if($num_sads<=0){
						echo '<span class="label label-danger">'.$num_sads.'</span>'; 
					}else if($num_sads<7){
						echo '<span class="label label-warning">'.$num_sads.'</span>';
					}else{
						echo '<span class="label label-success">'.$num_sads.'</span>';
					}
					 
				?> Items have been sold</small>
				
		</div>
		
		
		<div class="panel-body">
			<?php $sum=0; ?>
	<?php foreach ($sads as $sad)
	{
	 
	 
		echo '<div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-2 pull-left">';
				 
				    	
				    	if(isset($sad->image) && $sad->image!=NULL){
				    		echo '<img  height="100" src="'.base_url().$sad->image.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
				<div class="col-sm-9">
				<div class="row" style="height:30px">';
					
			echo '<a href="'.base_url().'advertisement/viewAd/'.$sad->adid.'" class="text-primary"><b>'.$sad->adid.'</b></a>'; 
		
				//echo '<div class="pull-right"><h4><b>'.$curcode.' '.$bad->price.'/=</b></h4></div>';
				//$sum = $sum + $bad->price;
				//echo '</div>';
				echo '<div class="row" style="height:20px"><p>Sold on :'.$sad->bDATE.'</p></div>';
				echo '<div class="row" style="height:20px"><p>Buyer :<a href="'.base_url().'profile/'.$sad->buyer.'">'.$sad->buyer.'</a></p></div>';
				//echo '<div class="row" style="height:20px"><p>Location :'.$bad->location.'</p></div>';
				
				
				
				
	//echo '<div class="pull-right">';
	//echo '<a href="'.base_url().'cart/remove_item/'.$bad->adid.'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span><b>&nbspRemove&nbsp;</b></a>';
    //echo '</br>';			
	//echo'</div>';
					
	echo '</div>';
	echo '</div>';
	echo '</div>';
	} ?>
	
	<!--total panel-->
		
	</div>
	<?php endif; ?>	
  					
  						  				
  				</div>
  				<!--end tab two-->
		
	
	</div>							
		
</div>
</div>
</div>


</html>