
<html lang="en">
<head>
  <meta charset="utf-8">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="/resources/demos/external/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script>
$( "#spinner" ).spinner();
</script>
  
</head>
</html>


<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
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
		Automatic Approval settings
	</div>
	<br>
		<div class="container breadcrumb-white img-thumbnail">
			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('report/generate_ad_report',$formattributes);
			?>
			<div class="h4">
				Set Value
			</div>
							
	<div class="form-group">
    		<label for="inputRate" class="col-sm-7 control-label">Set the boundary value to select users to white list: &nbsp;&nbsp;</label>
    		<div class="col-sm-2">
      			<?php  			 
					
					$rateattributes = array('class' => 'form-control','name'=>'rate','value'=>'10');
      				echo form_input($rateattributes,$this->input->post('rate'));
					if(form_error('rate')!=null){
						echo '<div class="alert alert-danger">'.form_error('rate').'</div>';
					}
					else if(isset($error['rate']))
						{
							echo '<div class="alert alert-danger">'.$error['rate'].'</div>';
						}
      			?>
    		</div>
  		</div>
						
			<div class="col-sm-offset-8 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'Save_rate','value'=>'Save');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
			</div>
		
	</div>
	
	<div class="container breadcrumb-white img-thumbnail">
		 <div class="col-md-8 col-md-offset-2">
      	<div class="row">
		<div class="col-md-4">
		<a href="<?php echo base_url().'rules/whitelist'?>">		
				<h4 class="text-center">White List</h4>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'rules/blacklist'?>">		
				<h4 class="text-center">Black List</h4>		
		</a>
		</div>	
			
		</div>	
	   </div>
		</div>
	</div>