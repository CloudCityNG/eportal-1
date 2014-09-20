<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;Design Configuration</a></li>
  			<li class="sub-link dashLink"><a href="<?php echo base_url().'permissions'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Manage Permissions</a></li>  
        	<li class="sub-link dashLink"><a href="<?php echo base_url().'rules/approvebyrating'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Whitelist Blacklist Handling</a></li>          
 
          </ul>
</div>
<?php 
	if($status=='sucess'){
		echo '<div class="col-md-7 col-md-offset-3  alert alert-success">';
		echo '<div class="h3 text-center"> Color theme successfully changed</div>';
		echo '<hr />';
		echo '<b>Server status</b> : Success<br />';
		echo '<b>Server reply</b> :'.$message;
	}else if($status=='fail'){
		echo '<div class="col-md-7 col-md-offset-3  alert alert-danger">';
		echo '<div class="h3 text-center"> Error while changing the theme </div>';
		echo '<hr />';
		echo '<b>Server status</b> : Fail<br />';
		echo '<b>Server reply</b> :'.$message;
	}else if($status=='info'){
		echo '<div class="col-md-7 col-md-offset-3  alert alert-info">';
		echo '<div class="h3 text-center"> Operation error occurred </div>';
		echo '<hr />';
		echo '<b>Server status</b> : Fail<br />';
		echo '<b>Server reply</b> : '.$message;
	}else{
		echo '<div class="col-md-7 col-md-offset-3 breadcrumb">';
		echo '<div class="h3 text-center"> Unknown fault </div>';
		echo '<hr />';
		echo '<b>Server status</b> : unknown server error<br />';
		echo '<b>Server reply</b> : &lt;no message recieved&gt;</b>';
	}
?>
	
</div>