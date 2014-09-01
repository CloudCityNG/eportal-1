<div class="container">
	<div class="col-md-4 col-md-offset-4 breadcrumb-white" style="border:1px solid #ccc">
		<div class="col-md-12" style="margin-bottom: 25px">
		<div class="h4 text-black text-center">
			<b>New delivery company</b>
		</div>
		<hr />
		<div class="pull-left text-danger">
			<?php //echo validation_errors(); ?>
		</div>
		<?php
			$formattributes = array('role' => 'form', 'enctype'=>'multipart/form-data' );
			echo form_open('company/create_submit/',$formattributes);
		?>
			<div class="form-group">
				<input type="text" class="form-control" name="company_name" placeholder="Conpany name" value="<?php echo $this->input->post('company_name') ?>" />
				<div class="text-danger"><?php echo form_error('company_name') ?></div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="contact_number" placeholder="Company contact number" value="<?php echo $this->input->post('contact_number') ?>" />
				<div class="text-danger"><?php echo form_error('contact_number') ?></div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="email" placeholder="Company email address" value="<?php echo $this->input->post('email') ?>" />
				<div class="text-danger"><?php echo form_error('email') ?></div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="address_one" placeholder="Address line one" value="<?php echo $this->input->post('address_one') ?>" />
				<div class="text-danger"><?php echo form_error('address_one') ?></div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="address_two" placeholder="Address line two" value="<?php echo $this->input->post('address_two') ?>" />
				<div class="text-danger"><?php echo form_error('address_two') ?></div>
			</div>
			<input type="submit" name="btnCreate"  class="btn btn-embossed btn-primary btn-block" value="CREATE">
		<?php
			form_close();
		?>
		</div>
	</div>
</div>