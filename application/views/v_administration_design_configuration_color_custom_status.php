<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>">Design Configuration</a></li>
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<?php 

			if($status=='sucess'){
				echo '<div class="col-md-12 alert alert-success">';
				echo '<div class="h3 text-center"> Color theme successfully changed</div>';
				echo '<hr />';
				echo '<b>Server status</b> : Success<br />';
				echo '<b>Server reply</b> :'.$message;
				echo '</div>';
			}else if($status=='fail'){
				echo '<div class="col-md-7 col-md-offset-3  alert alert-danger">';
				echo '<div class="h3 text-center"> Error while changing the theme </div>';
				echo '<hr />';
				echo '<b>Server status</b> : Fail<br />';
				echo '<b>Server reply</b> :'.$message;
				echo '</div>';
			}else{
				echo '<div class="col-md-7 col-md-offset-3 breadcrumb">';
				echo '<div class="h3 text-center"> Unknown fault </div>';
				echo '<hr />';
				echo '<b>Server status</b> : unknown server error<br />';
				echo '<b>Server reply</b> : &lt;no message recieved&gt;</b>';
				echo '</div>';
			}
		
	?>
	
</div>