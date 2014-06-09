<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-md-10 col-md-offset-2">
	<div class="row">
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/daily_reports'?>">		
				<h4 class="text-center">Daily Reports</h4>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/monthly_reports'?>">		
				<h4 class="text-center">Monthly Reports</h4>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/annually_reports'?>">		
				<h4 class="text-center">Annual Reports</h4>		
		</a>
		</div>
		
	</div>	
</div>