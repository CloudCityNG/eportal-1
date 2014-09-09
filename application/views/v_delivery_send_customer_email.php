<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Send customer emails		
		</div>
		<hr />
		<div class="pull-left text-danger">
				<?php echo validation_errors(); ?>
			</div>
		<div class=" col-md-6 col-md-offset-3 breadchumb" style="padding-bottom: 25px">
			<?php
				$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
				echo form_open('company/send_customer_email',$formattributes);
			?>
			<label for="label-title">Title</label>
			<input name="title" id="label-title" type="text" class="form-control" />
			<br>
			<label for="label-message">Message</label>
			<textarea id="label-message" class="form-control" name="message" rows="10"></textarea>
			<br />
			<?php
				$reportattributes = array('class' => 'btn btn-primary pull-right btn-embossed','name'=>'report_submit','value'=>'Send email');
				echo form_submit($reportattributes);
			?>
			<?php
				echo form_close();
			?>
		</div>
		
	</div>
	.
</div>
