<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="dashLink"><a href="">Advertisement Management</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'administration/user_management'?>">User Management</a></li>

          </ul>
          
          <ul class="nav nav-sidebar ">
            <li class="dashLink active"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>

          </ul>
</div>
<div class="col-md-10 col-md-offset-2">
	<div class="row">
		<div class="col-md-3">
		<h5 class="text-center"> Normal Users Joined Today Report</h5>
		<a href="<?php echo base_url().'reportico-3.2/run.php?execute_mode=EXECUTE& project=Reporting&xmlin=DailyNormalUsers.xml& target_format=HTML
		'?>">		
				<h6 class="text-center">View</h4>		
		</a>
		<a href="<?php echo base_url().'reportico-3.2/run.php?execute_mode=EXECUTE& project=Reporting&xmlin=DailyNormalUsers.xml& target_format=PDF
		'?>">		
				<h6 class="text-center">Download</h4>		
		</a>
		</div>
		
		<div class="col-md-3">
		<h5 class="text-center"> Business Users Joined Today Report</h5>
		<a href="<?php echo base_url().'reportico-3.2/run.php?execute_mode=EXECUTE& project=Reporting&xmlin=DailyBusinessUsers.xml& target_format=HTML
		'?>">		
				<h6 class="text-center">View</h4>		
		</a>
		<a href="<?php echo base_url().'reportico-3.2/run.php?execute_mode=EXECUTE& project=Reporting&xmlin=DailyBusinessUsers.xml& target_format=PDF
		'?>">		
				<h6 class="text-center">Download</h4>		
		</a>
		</div>
		
	</div>	
</div>