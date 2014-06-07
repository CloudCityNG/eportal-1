<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="alert alert-<?php if(strcmp($status,"success")){echo 'danger';} else{echo 'success';}?>">
			<?php echo $message;?>
		</div>
	</div>
</div>