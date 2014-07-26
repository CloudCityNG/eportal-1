	<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/cat_menu.css'?>" rel="stylesheet">
	
	<!-------------------------------Theme stylesheet----------------------------->
	<link href="<?php echo base_url().'css/site-color-theme.css'?>" rel="stylesheet">
	<!--------------------------------End Theme stylesheet------------------------>
	
	<title><?php if(isset($title)) echo $title;?></title>
</head>
<body class="welcome-body-background">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!--<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>" ></script>-->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>"></script>
	<script src="<?php echo base_url().'js/jquery-migrate-1.2.1.min.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script src="<?php echo base_url().'js/modal.js'?>"></script>
	<script src="<?php echo base_url().'js/tooltip.js'?>"></script>
	<script src="<?php echo base_url().'js/jquery.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'js/jquery.MetaData.js'?>" type="text/javascript" language="javascript"></script>
 	<script src="<?php echo base_url().'js/jquery.rating.js'?>" type="text/javascript" language="javascript"></script>
 	<link href="<?php echo base_url().'js/jquery.rating.css'?>" type="text/css" rel="stylesheet"/>
 	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.3/less.min.js"></script>
 	
	<script type="text/javascript">
	    $(function () {
	        $('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
	    });
	    
</script>

	<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/bootstrap.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url().'menu_jquery.js';?>'></script>
	
	<div class="navbar navbar-main-theme navbar-fixed-top" style="max-height: 25px; min-height: 25px;" >	
		<div class="container">
			<ul class="nav navbar-nav navbar-right">	
					<li><a href="<?php echo base_url().'registration'?>" value="Signup" > Signup </a></li>
					<li><a href="<?php echo base_url().'signin'?>" value="Signin" > Signin </a></li>		
			</ul>
		</div>
	</div>
