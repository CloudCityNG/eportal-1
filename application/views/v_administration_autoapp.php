
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
     		<li class="sub-link dashLink"><a href="<?php echo base_url().'rules/approvebyrating'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Whitelist Blacklist Handling</a></li>          
 
          </ul>
</div>

<div class="col-md-7 col-md-offset-3 breadcrumb img-thumbnail">
	<div class="h3 text-center">
		Automatic Approval settings
	</div>
	<br>
		<div class="container breadcrumb-white img-thumbnail">
			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('rules/approvebyrating',$formattributes);
			?>
			<div class="h4">
				Set Whitelist Boundary
			</div>
							
	<div class="form-group">
    		<label for="inputWhiteRate" class="col-sm-7 control-label">Set the boundary value to select users to Whitelist: &nbsp;&nbsp;</label>
    		<div class="col-sm-2">
      			<?php  			 
				
					$rateattributes = array('class' => 'form-control','name'=>'white','value'=>$whitevalue);
      				echo form_input($rateattributes,$this->input->post('white'));
					if(form_error('white')!=null){
						echo '<div class="alert alert-danger">'.form_error('white').'</div>';
					}
					else if(isset($error['white']))
						{
							echo '<div class="alert alert-danger">'.$error['white'].'</div>';
						}
      			?>
    		</div>
  		</div>
						
			<div class="col-sm-offset-8 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'Save_whiterate','value'=>'Save');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
			</div>
		
	</div>
</br>
	<div class="container breadcrumb-white img-thumbnail">
			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('rules/approvebyrating',$formattributes);
			?>
			<div class="h4">
				Set Blacklist Boundary
			</div>
							
	<div class="form-group">
    		<label for="inputBlackRate" class="col-sm-7 control-label">Set the boundary value to select users to Blacklist: &nbsp;&nbsp;</label>
    		<div class="col-sm-2">
      			<?php  			 
				
					$blackattributes = array('class' => 'form-control','name'=>'black','value'=>$blackvalue);
      				echo form_input($blackattributes,$this->input->post('black'));
					if(form_error('black')!=null){
						echo '<div class="alert alert-danger">'.form_error('black').'</div>';
					}
					else if(isset($error['black']))
						{
							echo '<div class="alert alert-danger">'.$error['black'].'</div>';
						}
      			?>
    		</div>
  		</div>
						
			<div class="col-sm-offset-8 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'Save_blackrate','value'=>'Save');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
			</div>
		
	</div>
</br>
	<div class="container breadcrumb-white img-thumbnail">
		 <div class="col-md-10 col-md-offset-2">
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