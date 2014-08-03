<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	
<!-------------------------------Start site icon----------------------------->
	<link rel="shortcut icon" href="<?php echo base_url().'images/site/icon.ico'?>">
<!--------------------------------End site icon------------------------------>
		
<!-------------------------------Theme stylesheet----------------------------->
	<link href="<?php echo base_url().'css/site-color-theme.css'?>" rel="stylesheet">
<!--------------------------------End Theme stylesheet------------------------>
<style type="text/css">
/*
::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }
*/
body {
	background: url(<?php echo base_url().'images/f412f189945e4fba13fdf7840fdae357.jpg'; ?>) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

#oop{
	margin-top: 8%;
	margin-left:30%;
}

</style>
</head>
<body>
	<div id="oop" class="col-md-5">
		<div id="container" class=" col-md-12 breadcrumb-white img-thumbnail">
			<div class="pull-left">
				<a href="<?php echo base_url();?>home">
					<img class="site-logo" src="<?php echo base_url()?>images/site/logo.png" />
				</a>
			</div>
			<div class="">
				<div class="h1 text-left">
					<?php echo $heading; ?>
				</div>
				<br />
			</div>
			<br /><br />
			<div class="h5">
				<?php echo $message; ?>
			</div>
			<br />
			<div class="">
				<a class="btn btn-primary btn-block " href="<?php echo base_url().'home'?>"> Go back to home page</a>
			</div>
		</div>
	</div>
</body>
</html>