<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar  navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>">User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="container col-md-offset-2">


<div class="container">
	<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
	<div class="panel-heading">
	    		<center><h3 class="panel-title"><strong>New Advertisments</strong></h3></center>
	  </div>
	    
	    <div class="panel-body"> 
<?php
	
	foreach ($Ads as $info) 
	{
		echo '<div class="col-md-10 col-md-offset-1 navbar-set-margin-bottom img-thumbnail">
			<div class="col-sm-2 pull-left">';
				 
				    	if(isset($info['Image']) && $info['Image']!=NULL){
				    		echo '<img  height="100" src="'.base_url().$info['Image'].'" class="img-thumbnail pull-left profile-picture"/>';
							
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-7">
				<div class="row">';
					
				   				 echo '<a href="'.base_url().'rules/editAd/'.$info['id'].'" class="text-primary"><u><b>'.$info['title'].'</b></u></a>'; 

					
				echo '</div>';
				
				
			echo '</div>';
						
					
					echo '<a href="'.base_url().'rules/deny_ad/'.$info['id'].'" class="btn btn-danger"><b> Deny </b></a>';
			
			//echo '</br>';
					echo '<a href="'.base_url().'rules/accept_ad/'.$info['id'].'" class="btn btn-success"><b> Accept </b></a>';
			
		echo '</div>';
	}
?>
</div>
</div>
</div>
</div>
</div>