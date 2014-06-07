<div class="container">
	<script type="text/javascript">
		function back()
		{
			window.history.back();
		}
	</script>
			<div class="pull-left">
			<input type="button" onclick="back()" value="Back" class="btn btn-info" />
		</div>
	<div class="col-md-7 col-md-offset-2">
		<?php
			if($success)
			{
				echo '<div class="container">
	<div class="col-md-8">
		<div class="alert alert-success">
			<b>You have successfully sent an Extention request for the Advertisement For admin\'s approval.</b>
			
		</div>
	</div>
</div>';
			}
			?>
	</div>
</div>