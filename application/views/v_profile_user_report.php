<div class="container">
	<?php if($status==true){ ?>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-success">
				Thank you for taking your time on completing this report. Administration will take necessary actions if needed.
				<br /><br />
				Thank You,<br /> <b><?php echo $this->session->userdata('name')?><b/>
			</div>
		</div>
	<?php } else {?>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-warning">
				There has been an error occured while processing your request to the administration staff.
				Please try again later.
			</div>
		</div>
	<?php }?>
</div>