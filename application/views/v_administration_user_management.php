<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
          <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-lg-10 col-md-offset-2">
<div class="row">
  <div class="col-sm-5 col-md-4">
    <div class="thumbnail">
      <div class="caption text-center">
        <div class="h4 text-left " ><a href="<?php echo base_url().'administration/add_user/a'?>" role="button"><span class="label label-danger"><span class="glyphicon glyphicon-star"></span></span>&nbsp;Create administrative account</a></div>
       	</div>
       	<div class="caption text-center">
       	<div class="h4 text-left "><a href="<?php echo base_url().'administration/add_user/n'?>" role="button"><span class="label label-warning"><span class="glyphicon glyphicon-user"></span></span>&nbsp;Create private account </a></div>
       	</div>
        <div class="caption text-center">
        <div class="h4 text-left "><a href="<?php echo base_url().'administration/add_user/b'?>" role="button"><span class="label label-primary"><span class="glyphicon glyphicon-briefcase"></span></span>&nbsp;Create business account </a></div>
      </div>
    </div>
  </div>
  

  
 		<div class="col-sm-5 col-md-4">
    <div class="thumbnail">
      <div class="caption text-left">
      	<div class="h3"><a href="<?php echo base_url().'administration/users/all'?>"><span class="label label-success"><?php echo $total_u; ?></span> Total registered users</a></div>
      	<hr />
            <p><a href="<?php echo base_url().'administration/users/n'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-warning">'.$n_total_u.'</span> Private users';?> </a> <br />
        	   <a href="<?php echo base_url().'administration/users/b'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-primary">'.$b_total_u.'</span> Business users'?> </a><br />
        	   <a href="<?php echo base_url().'administration/users/a'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-danger">'.$a_total_u.'</span> Administrative users'?> </a>
        </p>
      </div>
    </div>
  </div>
  
  
  <div class="col-sm-4 col-md-3">
    <div class="thumbnail">
      <div class="caption text-center <?php if($total_profile_reports>1)echo 'bg-danger';?>">
      		<div class="h4"><a href="<?php echo base_url().'administration/users_reported/view_all'?>"><span class="label label-danger"><?php echo $total_profile_reports; ?></span> Profiles reports on users</a></div>
      		<?php 
      			if(isset($top_5_reported_users)){
      				foreach($top_5_reported_users as $info){
      		?>
      			<hr />
      			<a href="<?php echo base_url().'administration/users_reported/'.$info->accused_user_username; ?>" class="btn-link">
      			<p class="text-justify text-danger"><span class="label label-info"><?php echo $info->count.'</span> reports has been submitted on '.$info->accused_user_name; ?> </p>
      			</a>
      		<?php 
					}
				}
      		?>
      </div>
    </div>
  </div>

    	<div class="col-sm-4 col-md-3">
    <div class="thumbnail">
      <div class="caption text-center">
        <h3>Profile updates
        <hr />
        <small><br />Private users</small></h3>
        <p><a href="<?php echo base_url().'administration/profileupdates/n/new'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-warning">'.$n_new.'</span> new updates';?> </a> <br />
        	<a href="<?php echo base_url().'administration/profileupdates/n/all'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-warning">'.$n_all.'</span> total updates'?> </a>
        </p>
      <div class="text-center">
      	<h3><small><br />Business users</small></h3>
      	
            <p><a href="<?php echo base_url().'administration/profileupdates/b/new'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-primary">'.$b_new.'</span> new updates';?> </a> <br />
        	<a href="<?php echo base_url().'administration/profileupdates/b/all'?>" class="btn btn-link" role="button"><?php echo '<span class="label label-primary">'.$b_all.'</span> total updates'?> </a>
        </p>
      </div>
    </div>
  </div>
</div>
  

 </div> 