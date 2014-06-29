<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>datepicker demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
</head>
</html>

<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
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

<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('report/generate_ad_report',$formattributes);
	?>

<div class="form-group">
	
	<label style="margin-top: 30px; for="heading" class="col-md-offset-3 control-label">Basic Reports &nbsp;&nbsp;</label>
	
	<div class="col-md-7 col-md-offset-4">
	<div class="row">
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_all_ad'?>">		
				<h5 class="text-center">All Advertisements</h5>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_reported_ad'?>">		
				<h5 class="text-center">Reported Advertisements</h5>		
		</a>
		</div>	
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_highest_ad'?>">		
				<h5 class="text-center">Highest Rated Advertisements</h5>		
		</a>
		</div>	
			
	</div>	
</div>
</br>
	<label style="margin-top: 30px; for="heading" class="col-md-offset-3 control-label">Choose a Report Type and time period : &nbsp;&nbsp;</label>
	
    <div class="col-md-5 col-md-offset-3" style="margin-top: 30px;">
		<?php 
		$list=array("0"=>"Select","1"=>"All Advertisements","2"=>"Reported Advertisements","3"=>"Highest Rated Advertisements");
		echo form_dropdown('category',$list);
		
		?>
	</div>
	

		<div class="col-md-5 col-md-offset-5" id="datepicker"></div>
 		<script>
		$( "#datepicker" ).datepicker();
		</script>
		
	<div class="col-sm-offset-6 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'Advertisement_submit','value'=>'Generate');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
		</div>
	
</div>
