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
		<div class=" col-md-12 breadcrumb img-thumbnail">
			<div class=" h3 text-center">
				Current color theme history
			</div>
			<hr />
			<div>
				<b>Activated by :</b>  <?php if(isset($name)){ echo $name;}?>
				<br />
				<b>Current color theme :</b>  <?php if(isset($theme)){ echo $theme;}?>
				<br />
				<b>Activated on :</b>  <?php if(isset($dateandtime)){ echo $dateandtime;}?>
			</div>
			<br />
			<a class="btn btn-default pull-right" href="<?php echo base_url().'administration/history/theme/all'?>">View entire theme history</a>
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Dark-purple.png'?>" />
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Green-lantern.png'?>" />
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Nigel-blue.png'?>" />
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Nigel dark.png'?>" />
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Red-flash.png'?>" />
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
					<img width="650px" src="<?php echo base_url().'images/theme-images/Venice.png'?>" />
					<br />
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo base_url().'administration/apply_theme/vn'?>">Apply theme</a>
					</div>
				</div>
			<!--End theme 6------------------------------------------------->
		<!--End colour themes------------------------------------------------->
	</div>
	
	<!--Start custom color theme------------------------------------------------->
		<div class="col-md-12 margin-btm-1 breadcrumb-white img-thumbnail">
			<div class="h3">
				Create your own color theme
			</div>
			<br />
			<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url().'administration/custom_colour_theme'?>">Start creating a custom theme</a>
			</div>
		</div>
		<!--End custom color theme--------------------------------------------------->
	<!--End colour configuration------------------------------------------------->

</div>