<div id="container">
	<h1>Reset Password</h1>

	<?php
	
	echo form_open('signin/reset_password'); // Open the form and redirects to the "reset_password" function in the main controller
	
	echo "<p>Email: ";
	echo form_input('email');
	echo "</p>";
	
	echo "<p>";
	echo form_submit('reset_password_submit', 'Reset My Password');
	echo "</p>";
	
	echo validation_errors('<p class="error">'); // method of the form helper
		if(isset($error)) {
			echo '<p class="error">' . $error . '</p>';
		}
	
	echo form_close(); // close the form
	?>

	