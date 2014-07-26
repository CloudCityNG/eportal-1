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
<div class="col-md-7 col-md-offset-3 breadcrumb img-thumbnail">
	<div class="h2 text-center">
		Design configuration settings
	</div>
	<br>
	
	<!--Start Logo configuration----------------------------------------------->
	<div class="container breadcrumb-white img-thumbnail">
		<div class="h3">
			Logo configuration
		</div>
		<div class="col-md-offset-1">
			You can change the main logo of the web-portal from here.
			 You can put an <b>Image</b> as your logo.
			<br />
			<br />
			<div class="pull-right">
				<a class="btn btn-default " href="#">Learn how to configure</a>
				<a class="btn btn-primary " href="<?php echo base_url().'administration/logo_configuration'?>">Configure</a>
			</div>
		</div>
	</div>
	<!--End Logo configuration---------------------------------------------------->
	
	<!--Start Color theme configuration------------------------------------------->
		<div class="container breadcrumb-white img-thumbnail">
			<div class="h3">
				Color theme configuration
			</div>
			<div class="col-md-offset-1">
				You can change the main color theme from here. You can select one of the pre defined themes, or you can come up with
				your own color theme you prefer.
				<br>
				<br>
				<div class="col-md-offset-1">
					Pre defined themes are,
					<ul class="col-md-offset-1">
						<li>Dark purple (default)</li>
						<li>Green lantern</li>
						<li>Nigel blue</li>
						<li> Nigel dark</li>
						<li>Red flash</li>
						<li>Venice</li>
					</ul>
				</div>
				<br />
				<br />
				<div class="pull-right">
					<a class="btn btn-default " href="#">Learn how to configure</a>
					<a class="btn btn-primary " href="<?php echo base_url().'administration/color_configuration'?>">Configure</a>
				</div>
			</div>
		</div>
	<!--End Color theme configuration------------------------------------------------>
	
	<!--Start Dashboard color configuration------------------------------------------>
		<div class="container breadcrumb-white img-thumbnail">
			<div class="h3">
				Dashboard color configuration
			</div>
			<div class="col-md-offset-1">
				Changing the color theme settings of the administrator dashboard.
				<br />
				<br />
				<div class="pull-right">
					<a class="btn btn-default " href="#">Learn how to configure</a>
					<a class="btn btn-primary " href="<?php echo base_url().'administration/dashboard_configuration'?>">Configure</a>
				</div>
			</div>
		</div>
	<!--End Dashboard color configuration-------------------------------------------->
</div>