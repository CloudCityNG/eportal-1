<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
	    		<center><h3 class="panel-title"><strong>Private users</strong></h3></center>
	    </div>
	    
	    <div class="panel-body"> 
<?php
	foreach ($db_normaluser as $info) 
	{
		echo '<div class="col-md-10 col-md-offset-1 navbar-set-margin-bottom">
			<div class="col-sm-2 pull-left">';
				 
				    	if(isset($info->profilepicture) && $info->profilepicture!=NULL){
				    		echo '<img  height="100" src="'.base_url().'images/prifilepictures/'.$info->profilepicture.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-7">
				<div class="row">';
					if(isset($info->fname) || isset($info->lname)){
						echo '<u><b>'.$info->fname.'&nbsp;'.$info->lname.'</b></u>'; 
					}
					
					if ((time()-$info->registeredon) > 432000) {
						//registered before to 5 days
 					   echo '<sup><span class="text-danger">&nbsp;new</span></sup>';
					}
					
				echo '</div>';
				echo '<div class="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : '.$info->email.'</div>';
				echo '<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username : '.$info->username.'</div>';
				echo '<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registered on : '.$info->registeredon.'</div>';
				//echo '<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business Registration on : '.$info->addedtobusiness.'</div>';
			echo '</div>';
			
			echo '<div class="col-sm-3 pull-right">
					<a href="'.base_url().'profile/'.$info->username.'" class="text-primary">View Profile</a>
					<br />
					<a href="#" class="text-danger">Delete User</a>
					';
			echo '</div>';
			
		echo '</div>';
	}
?>
</div>
</div>
</div>