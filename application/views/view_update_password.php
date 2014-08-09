<div id="container">
	<h1>Update your password</h1>
	<div id="update_password_form">
		<form action="/login/update_password" method="POST">
			<div>
				<label for="email">Email: </label>
				<?php if (isset($email_hash, $email_code)) { ?>
					<input type="hidden" value="<?php echo $email_hash ?>" name="email_hash" />
					<input type="hidden" value="<?php echo $email_code ?>" name="email_code" />
				<?php } ?>
				<input type="email" value="<?php echo (isset($email)) ? $email : ''; ?>" name="email" />				
			</div>
			<<div>
				<label for="password">New Password: </label>
				<input type="password" value="" name="password"/>
			</div>
			<<div>
				<label for="password_conf">New Password Again: </label>
				<input type="password" value="" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Update My Password" />
			</div>
		</form>
		<?php
			echo validation_errors('<p class="error">');
			?>
	</div>
	
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
