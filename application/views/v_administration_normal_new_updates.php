<div class="container">
	<?php
	foreach($update_data as $info){
	?>
	<div class="row">
		<div class="container breadcrumb">
			<h3><?php echo $info->name;?><small> would like to make these changes</small></h3>
			
			<p><?php if(isset($info->fname)){
				echo '<strong>First name</strong> => '.$info->fname ;
				}?>
			</p>
			<p><?php if(isset($info->lname)){
				echo '<strong>Last name</strong> =>'.$info->lname ;
				}?>
			</p>
			<p><?php if(isset($info->password)){
				echo '<strong>Reset Password</strong>';
				}?>
			</p>
			<p><?php if(isset($info->telemarketer)){
				echo '<strong>Telemarketer status</strong> => '.$info->telemarketer ;
				}?>
			</p>
			<p><?php if(isset($info->description)){
				echo '<strong>Description</strong> => '.$info->description ;
				}?>
			</p>
			<p><?php if(isset($info->add_ln_1)){
				echo '<strong>Address line 1</strong> => '.$info->add_ln_1 ;
				}?>
			</p>
			<p><?php if(isset($info->add_ln_2)){
				echo '<strong>Address line 2</strong> => '.$info->add_ln_2 ;
				}?>
			</p>
			<p><?php if(isset($info->add_ln_3)){
				echo '<strong>Address line 3</strong> => '.$info->add_ln_3 ;
				}?>
			</p>
			<p><?php if(isset($info->profilepicture)){
				echo '<strong>Profile picture</strong> => <img width="57" src="'.base_url().'images/prifilepictures/'.$info->profilepicture.'" class="img-thumbnail profile-picture"/>' ;
				}?>
			</p>
			<div class="pull-right">
				<a href="#" class="btn btn-default"> Reject </a>
				<a href="#" class="btn btn-success"> Accept </a>
			</div>
		</div>
	</div>
	<?php }?>
	
	
</div>