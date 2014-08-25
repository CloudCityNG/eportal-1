<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
     <script type="text/javascript">
$(function(){
   $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
    });
});
</script> 
</head>
</html>

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

<div class="col-md-offset-2">


<div class="">
	<div class="col-md-7 col-md-offset-2 breadcrumb img-thumbnail">
<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('report/generate_user_report',$formattributes);
	?>

<div class="panel panel-default">
    		 	<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Current Month Reports</small>
    		</div>
    		<div class="panel-body">	

<div class="form-group">	
	<div class="col-md-8 col-md-offset-2">
	<div class="row">
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_all_user'?>">		
				<h5 class="text-center">All Users</h5>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_business_user'?>">		
				<h5 class="text-center">Business Users</h5>		
		</a>
		</div>
		
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_normal_user'?>">		
				<h5 class="text-center">Normal Users</h5>		
		</a>
		</div>
		<!--
		<div class="col-md-4">
		<a href="<?php echo base_url().'report/generate_reported_user'?>">		
				<h5 class="text-center">Reported Users</h5>		
		</a>
		</div>	
		
		-->	
	</div>	
</div>
</div>

</br>

<div class="panel panel-default">
    		 	<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Customized Reports</small>
    		</div>
    		<div class="panel-body">
	<div class="form-group">
	
    <div class="col-md-5 col-md-offset-3" style="margin-top: 30px;">
			<?php 
				$list=array("0"=>"Select","1"=>"All Users","2"=>"Business Users","3"=>"Normal Users");
				echo form_dropdown('category',$list);		
			?>
			</div>
	</div>

	
	<div class="form-group">
    	<label for="inputStartDate" class="col-sm-3 control-label" style="color: #0088cc">From: &nbsp;&nbsp;</label>
    	<div class="col-sm-7">
      			<?php
      				$StartDateattributes = array('class' => 'datepicker','name'=>'startdate','id'=>'dp1');
      				echo form_input($StartDateattributes,$this->input->post('startdate'));
					if(form_error('startdate')!=null)
						echo '<div class="alert alert-danger">'.form_error('startdate').'</div>';
      			?>
    		</div>
  		</div>
  		
		<div class="form-group">
    		<label for="inputEndDate" class="col-sm-3 control-label" style="color: #0088cc">To: &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$EndDateattributes = array('class' => 'datepicker','name'=>'enddate','id'=>'dp2');
      				echo form_input($EndDateattributes,$this->input->post('enddate'));
					if(form_error('enddate')!=null)
						echo '<div class="alert alert-danger">'.form_error('enddate').'</div>';
      			?>
    		</div>
  		</div>
	  			
	
  		
  		</br>
	<div class="col-sm-offset-6 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'User_submit','value'=>'Generate');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
		</div>
  		
  		
    			
    		 </div>
    		 </div>
	
</div>
</div>
</div>
</div>
</div>