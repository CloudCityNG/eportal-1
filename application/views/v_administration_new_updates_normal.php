<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar">
          <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="dashLink"><a href="">Advertisement Management</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'administration/user_management'?>">User Management</a></li>

          </ul>
          
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>

          </ul>
</div>
<div class="col-md-6 col-md-offset-3 breadcrumb img-thumbnail">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $panel_text; ?></h4>
			<?php
				if(!$update_data){
					echo 'Theres no new business updates to display';
				}
				else{
					foreach($update_data as $info){
			?>
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-body col-md-offset-1">
						<div class="">
							<?php
							if($info->p_profilepicture){
								echo '<div class="h3"><img width="47" src="'.base_url().'images/prifilepictures/'.$info->p_profilepicture.'" class="img-circle pull-left profile-picture"/>&nbsp;<a href="'.base_url().'profile/'.$info->username.
								'">'.$info->name.'</a><br /><small class="col-md-offset-1">'.$info->_when.' at '.$info->_time.'</small></div>';
				    			
							}else{
								echo '<div class="h3"><img width="47" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-circle pull-left profile-picture"/>&nbsp;<a href="'.base_url().'profile/'.$info->username.
								'">'.$info->name.'</a><br /><small class="col-md-offset-1">'.$info->_when.' at '.$info->_time.'</small></div>';
							}
							 
							 ?>
						</div>
						<br>
						<div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2">	
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
						</div>
						<div class="pull-right">
								<a href="<?php echo base_url().'administration/profile_update/n/reject/'.$info->username;?>" class="btn btn-default"> Reject </a>
								<a href="<?php echo base_url().'administration/profile_update/n/accept/'.$info->username;?>" class="btn btn-primary"> Accept </a>
						</div>
					</div>
				</div>
			</div>
		<?php }
		} ?>
	</div>

</div>