<div class="container">
	<div class="col-md-8 col-md-offset-2 img-thumbnail breadcrumb">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			My Advertisements
		</div>
	    
	<div class="panel panel-default">
		<script type="text/javascript">
			function deleteAd(clicked_id)
			{
				var r=confirm("Are you sure You want to Delete this Ad");
				if (r==true)
  				{
  					window.location="<?php echo base_url().'advertisement/deleteAd/'?>"+clicked_id;
  				}
				
			}
			function featuredAd()
			{
				window.open('https://www.paypal.com','_blank');	
			}
		</script>
	
	    
<?php
	if(count($Ads)==0)
	{
		echo '<center><h3 class="text-muted">No Advertisements Posted</h3></center>';
	}
	foreach ($Ads as $info) 
	{
		echo '<div class="panel-body"><div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;" >';
		if($info['expired']==0){
		echo '<p class="text-muted pull-right">Created On '.$info['createdate'].'<br>Expires On '.$info['duration'].'</p>';
		}
		else
		{
			echo '<p class="text-danger pull-right">Expired</p>';
		}
		echo	'<div class="col-sm-2 pull-left">';
				 
				    	if(isset($info['Image']) && $info['Image']!=NULL){
				    		echo '<img style="margin-top: 20px" height="100" src="'.base_url().$info['Image'].'" class="img-thumbnail pull-left profile-picture"/>';
							
						}else{
							echo '<img style="margin-top: 20px" height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-5" style="margin-top: 20px;margin-bottom: 10px">
				<div class="row pull-up">';
								
							//	echo '<p class="text-muted">Expires In '.$info['duration'].'</p>';
				   				 echo '<a href="'.base_url().'advertisement/viewAd/'.$info['id'].'" class="text-primary"><u><b>'.$info['title'].'</b></u></a>'; 

					
				echo '</div></br>';
				echo '<div class="row"> &nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;<b>Price ';
				
    		$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			$price;
			foreach($country as $key)
			{
				$price=$key->currencysy;
			}
    		 echo $price;
    		 echo ' '.$info['price'].'/=</b></div>';
				
			echo '</div>';
			echo '<div class="pull-right">';
				if($info['expired']==0)
				{
				if($info['featured']>0)
				{
					echo '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Featured&nbsp;</a>';
				}
				else
				{
					echo '<a href="'.base_url().'advertisement/featuredAd/'.$info['id'].'" onclick="featuredAd();"class="btn btn-default">&nbsp;&nbsp;Featured&nbsp;</a>';
				}	
				}
				echo '<a href="'.base_url().'advertisement/viewAd/'.$info['id'].'" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;View&nbsp;</a>';
				if($info['expired']==0)
				{
				echo '<a href="'.base_url().'advertisement/editAd/'.$info['id'].'" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit&nbsp;</a>';
				}
			   	echo '<a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Extend&nbsp;<span class="caret"></span></a>';
				echo'<ul class="dropdown-menu" role="menu">
					    	<li><a href="'.base_url().'advertisement/extendAd/'.$info['id'].'/2">2 weeks</a></li>
					    	<li><a href="'.base_url().'advertisement/extendAd/'.$info['id'].'/3">3 weeks</a></li>
					  	</ul>';
			   	echo '<a href="#" id="'.$info['id'].'" onclick="deleteAd(this.id)"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete&nbsp;</a>';
					echo '</div>';
			
			
		echo '</div></div>';
		
	}
?>

</div>
</div>
</div>