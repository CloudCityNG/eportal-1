<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="dashLink"><a href="">Advertisement Management</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>">User Management</a></li>

          </ul>
          
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>

          </ul>
</div>
<?php if(isset($status)){?>
<div class="col-md-6 col-md-offset-4">
	<?php if($status=='complete'){?>
		<div class="alert alert-success text-center"> A new business account has been successfully created.</div>
	<?php }?>
	<?php if($status=='email failed'){?>
		<div class="alert alert-danger text-center"> An error occured during sending an email to the user with their account details</div>
	<?php }?>
	<?php if($status=='db error'){?>
		<div class="alert alert-danger text-center"> An error occured during adding user to the database.</div>
	<?php }?>
</div>
<?php }?>
<div class="col-md-6 col-md-offset-4 breadcrumb img-thumbnail">
	<div class="h3 text-center">
		Create new account<br /> <small> Business account</small>
	</div>
	<br />
	<div class="thumbnail">
      <div class="caption text-center">
		<?php
			$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
			echo form_open('administration/add_user_business_validate',$formattributes);
		?>
	  	<div class="form-group">
	  	<label for="inputBusinessName" class="col-sm-3 control-label">Business Name </label>
    		<div class="col-sm-7">
      			<?php
					$bnameattributes = array('class' => 'form-control','name'=>'bname');
      				echo form_input($bnameattributes,$this->input->post('bname'));
					if(form_error('bname')!=null)
						echo '<div class="alert alert-danger">'.form_error('bname').'</div>';
      			?>
    		</div>
    		</div>
    		<div class="form-group">
    	<label for="inputUserame" class="col-sm-3 control-label">Username </label>
    		<div class="col-sm-7">
      			<?php
					$unameattributes = array('class' => 'form-control','name'=>'username');
      				echo form_input($unameattributes,$this->input->post('username'));
					if(form_error('username')!=null)
						echo '<div class="alert alert-danger">'.form_error('username').'</div>';
      			?>
    		</div>
    		</div>
    		<div class="form-group">
    	<label for="inputEmail" class="col-sm-3 control-label">Email </label>
    		<div class="col-sm-7">
      			<?php
					$emailattributes = array('class' => 'form-control','name'=>'email');
      				echo form_input($emailattributes,$this->input->post('email'));
					if(form_error('email')!=null)
						echo '<div class="alert alert-danger">'.form_error('email').'</div>';
      			?>
    		</div>
    		</div>
    		<div class="form-group">
    	<label for="inputPassword" class="col-sm-3 control-label">password </label>
    		<div class="col-sm-7">
      			<?php
					$passwordattributes = array('class' => 'form-control','name'=>'password');
      				echo form_password($passwordattributes);
					if(form_error('password')!=null)
						echo '<div class="alert alert-danger">'.form_error('password').'</div>';
      			?>
    		</div>
    		</div>
    		<div class="form-group">
    		<div class="">
      			<?php
					$sendmailattributes = array('name'=>'sendmailclient','checked'=>'check');
      				echo form_checkbox($sendmailattributes).' Send an email to the user with their username and password';
					
						
      			?>
    		</div>
    		</div>
    		
    		<div class="form-group">
	  	<div class="col-sm-3  pull-right">
      			<?php
      				$createuserbtnattributes = array('class' => 'btn btn-info','name'=>'create_submit','value'=>'Create User');
					echo form_submit($createuserbtnattributes);
      			?>
    		</div>
	  	</div>
		<?php
  			echo form_close();
  		?>
  		</div>
  	</div>
</div>