<script type="text/javascript">

$(document).ready(function() {
    $('input:radio[name=usertype]').change(function() {
        if (this.value == 'normal') {
            $("#businessuserPan").hide();
 			$("#normaluserPan").show();
        }
        else if (this.value == 'business') {
        	$("#businessuserPan").show();
 			$("#normaluserPan").hide();
        }
    });
});

</script>
<style type="text/css">
	body{
		background: url(<?php echo base_url().'images/3574f899daef41d2f145eba13ff7840f.jpg'; ?>) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
</style>
<div class="container">
	<div class="col-md-7 col-sm-offset-2">
		
    <div class=" breadcrumb"> 
    	<p class="lead text-center">Sign up</p>
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('registration/signup_validate',$formattributes);
	?>
		<div class="form-group">
    		<div class="col-sm-5">
				<label for="normaluser" class="col-sm-8 pull-right control-label">
					<?php
					$normaluserattributes = array('id'=>'normaluser','name'=>'usertype','value'=>'normal');
      				echo form_radio($normaluserattributes);
				?>&nbsp;&nbsp;Normal User&nbsp;&nbsp;</label>
    		</div>
    		<div class="col-sm-6 pull-right">
				<label for="businessuser" class="col-sm-8 pull-left control-label">
					<?php
					$bussinessuserattributes = array('id'=>'businessuser','name'=>'usertype','value'=>'business');
      				echo form_radio($bussinessuserattributes);
				?>&nbsp;&nbsp;Bussiness User&nbsp;&nbsp;</label>
    		</div>
  		</div>
  		
  		<div id="businessuserPan">
  			<div class="form-group">
	    		<label for="inputbusinessName" class="col-sm-3 control-label">Business Name &nbsp;&nbsp;</label>
	    		<div class="col-sm-7">
	      			<?php
						$bnameattributes = array('class' => 'form-control','name'=>'bname');
	      				echo form_input($bnameattributes,$this->input->post('bname'));
						if(form_error('bname')!=null)
							echo '<div class="alert alert-danger">'.form_error('bname').'</div>';
	      			?>
	    		</div>
	  		</div>
	  	<br />
  		</div>
  		<div id="normaluserPan">
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
  		</div>
  		
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
    		<label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm Password</label>
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
  			<div class="col-sm-12 col-sm-offset-3">
  				<p class="text-muted">By signingup you accept these <a href="#" class="text-primary">terms and conditions.</a></p>
  			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-7 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'clear','value'=>'Clear','type'=>'reset','content'=>'Clear','data-toggle'=>'tooltip', 'data-original-title'=>'this button will reset all the values in the text feilds');
      				echo form_button($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'register_submit','value'=>'Signup');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>
  		
		</div>
	</div>
</div>

<?php if(form_error('bname')!=null){?>
	<script type="text/javascript">
		window.onload = function() {
	 		$("#businessuserPan").show();
	 		$("#normaluserPan").hide();
	 		//$("businessuser").attr("checked","checked");
	 		$("#businessuser").prop("checked", true);
 		};
 	</script>
<?php } ?>

<?php if(form_error('fname')!=null || form_error('lname')!=null){ ?>
	<script type="text/javascript">
		window.onload = function() {
	 		$("#businessuserPan").hide();
	 		$("#normaluserPan").show();
	 		//$("normaluser").attr("checked","checked");
	 		$("#normaluser").prop("checked", true)
		};
	</script>
<?php } ?>

<?php if(form_error('fname')==null && form_error('lname')==null && form_error('bname')==null){ ?>
	<script type="text/javascript">
		window.onload = function() {
	 		$("#businessuserPan").hide();
	 		$("#normaluserPan").show();
	 		//$("normaluser").attr("checked","checked");
	 		$("#normaluser").prop("checked", true)
		};
	</script>
<?php } ?>