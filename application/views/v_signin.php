<style type="text/css">
	body{/*
		background: url(<?php /*echo base_url().'images/3574f899daef41d2f145eba13ff7840f.jpg'; ?>) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		 */?>
	}
	
</style>
<div class="container">
	<div class="col-md-6 col-md-offset-3 img-thumbnail" style="margin-top: 20px;">
		<div class="col-md-10 col-md-offset-1">
			<p class="lead text-center">Sign in</p>
			<?php
				echo validation_errors();
				
				$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
				echo form_open('signin/signin_validation',$formattributes);
				// Open the form and redirects to the "login_validation" function in the main controller
				echo '<div class="form-group">';
				
					$inputemail = array('class' => 'form-control','name'=>'email','placeholder'=>'E-mail Address');
					echo form_input($inputemail).'<br />';
					
					$inputpassword = array('class' => 'form-control','name'=>'password','placeholder'=>'Password');
					echo form_password($inputpassword).'<br />';
					
					$registerbtnattributes = array('class' => 'form-control btn btn-primary pull-right','name'=>'login_submit','value'=>'Signin');
					echo form_submit($registerbtnattributes).'<br />';
				echo '</div>';
				echo form_close();
			?>
			<a class="pull-left" href='<?php echo base_url()."signin/reset_password" ?>'>Forgot your password ?</a>
			<br>
			<a class="pull-left" href='<?php echo base_url()."registration" ?>'>Need to create an account ?</a>
		</div>
	</div>
</div>