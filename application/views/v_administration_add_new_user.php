<div class="container">
	<div class="col-md-7 col-md-offset-2">
		<div class="panel panel-default ">
			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>Add new user</strong></h3></center>
    		</div>
    <div class="panel-body">
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/new_user_validate',$formattributes);
	?>
	<div class="form-group">
		<label for="inputFirstName" class="col-sm-3 control-label">User type &nbsp;&nbsp;</label>
		<div class="col-sm-7 ">
			<?php
				$fnameattributes = array('class' => 'form-control','name'=>'type');
	      				//echo form_input($fnameattributes,$this->input->post('fname'));
	      				$data1 = array(
						    'name'        => 'usertype',
						    'value'       => 'private',
						    );
						
						echo form_radio($data1).' Private user &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						
						$data2 = array(
						    'name'        => 'usertype',
						    'value'       => 'business',
						    );
						echo form_radio($data2).' Business user ';
	
						if(form_error('usertype')!=null)
							echo '<div class="alert alert-danger">'.form_error('usertype').'</div>';
			?>
		</div>
	</div>
		<div class="form-group">
    		<label for="inputFirstName" class="col-sm-3 control-label">First Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'fname');
      				echo form_input($fnameattributes,$this->input->post('fname'));
					if(form_error('fname')!=null)
						echo '<div class="alert alert-danger">'.form_error('fname').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputLastName" class="col-sm-3 control-label">Last Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$lnameattributes = array('class' => 'form-control','name'=>'lname');
      				echo form_input($lnameattributes,$this->input->post('lname'));
					if(form_error('lname')!=null)
						echo '<div class="alert alert-danger">'.form_error('lname').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail" class="col-sm-3 control-label">Email Address &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'email');
      				echo form_input($emailattributes,$this->input->post('email'));
					if(form_error('email')!=null)
						echo '<div class="alert alert-danger">'.form_error('email').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputUsername" class="col-sm-3 control-label">User Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$usernameattributes = array('class' => 'form-control','name'=>'username');
      				echo form_input($usernameattributes,$this->input->post('username'));
					if(form_error('username')!=null)
						echo '<div class="alert alert-danger">'.form_error('username').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputPassword" class="col-sm-3 control-label">Password&nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$passwordattributes = array('class' => 'form-control','name'=>'password');
      				echo form_password($passwordattributes);
					if(form_error('password')!=null)
						echo '<div class="alert alert-danger">'.form_error('password').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm Password&nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$confirmpasswordattributes = array('class' => 'form-control','name'=>'confirmpassword');
      				echo form_password($confirmpasswordattributes);
					if(form_error('confirmpassword')!=null)
						echo '<div class="alert alert-danger">'.form_error('confirmpassword').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		
  		<div class="form-group">
    		<div class="col-sm-offset-7 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'register_submit','value'=>'Add user');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		<?php
  			if(isset($s_msg)){
				echo '<div class="alert alert-success">'.$s_msg.'</div>';
				}
  		?>
  		<?php	echo form_close();
  		?>
  		
		</div>
	</div>
	</div>
	
  		
</div>