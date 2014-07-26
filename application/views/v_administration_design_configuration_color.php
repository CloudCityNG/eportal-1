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
		Colour theme configuration
	</div>
	<br>

	<!--Start colour configuration----------------------------------------------->
	<div class="col-md-12 breadcrumb-white img-thumbnail">
		<br />
		You can either select one of the following pre-defined colour theme or you can create your own colour theme as you wish from below.
		<br />
		<br />
		<div class="text-danger-2 text-justify">
			<b>Important!</b>
			<br />
			When you apply a theme, please wait untill browser rederects you to an another page or gives you an error message. If u accedentaly close the page, it might
			lead to an currpted theme configurations which will not work properly.
		</div>
		<br />
		<br />
		<!--Start colour theme history----------------------------------------------->
		<div class=" col-md-7 breadcrumb img-thumbnail">
			<div class="text-center">
				<b>Current color theme history</b>
			</div>
			<br />
			<div>
				Current color theme : Dark purple
				<br />
				Activated by : Jason Nelon
				<br />
				Activated on : 24th july 2013
			</div>
		</div>
		<!--End colour theme history------------------------------------------------->
		
		<div class="col-md-12"><br /><br /></div>
		
		<!--Start colour themes----------------------------------------------->
			<!--start theme 1----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Dark purple
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/dp'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 1------------------------------------------------->
			
			<div class="col-md-12"><hr /></div>
			
			<!--start theme 2----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Green lantern
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/gl'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 2------------------------------------------------->
			
			<div class="col-md-12"><hr /></div>
			
			<!--start theme 3----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Nigel blue
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/nb'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 3------------------------------------------------->
			
			<div class="col-md-12"><hr /></div>
			
			<!--start theme 4----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Nigel dark
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/nd'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 4 ------------------------------------------------->
			
			<div class="col-md-12"><hr /></div>
			
			<!--start theme 5----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Red flash
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/rf'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 5 ------------------------------------------------->
			
			<div class="col-md-12"><hr /></div>
			
			<!--start theme 6----------------------------------------------->
				<div class="col-md-12 margin-btm-1">
					<div class="h3">
						Venice
					</div>
					<br />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/vn'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 6------------------------------------------------->
		<!--End colour themes------------------------------------------------->
	</div>
	<!--End colour configuration------------------------------------------------->

</div>