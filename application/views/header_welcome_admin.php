<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/cat_menu.css'?>" rel="stylesheet">
	<title><?php if(isset($title)) echo $title;?></title>
</head>
<body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>" ></script>
	<script src="<?php echo base_url().'js/jquery-1.11.0.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script src="<?php echo base_url().'js/tooltip.js'?>"></script>
	<script src="<?php echo base_url().'js/jquery.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'js/jquery.MetaData.js'?>" type="text/javascript" language="javascript"></script>
 	<script src="<?php echo base_url().'js/jquery.rating.js'?>" type="text/javascript" language="javascript"></script>
 	<link href="<?php echo base_url().'js/jquery.rating.css'?>" type="text/css" rel="stylesheet"/>
	<script type="text/javascript">
	    $(function () {
	        $('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
	        $('.dropdown-toggle').dropdown();
	    });
	    
</script>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/bootstrap.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url().'menu_jquery.js';?>'></script>
	
		<div class="navbar navbar-default navbar-fixed-top" style="max-height: 25px; min-height: 25px;" >	
		<div class="container">
			<ul class="nav navbar-nav navbar-right">	
					<a class="btn btn-sm btn-link"  href="<?php echo base_url().'administration/user_management'?>"class="btn btn-sm btn-link" value="adminPanel" > Administrative Panel </a>
					
						<a class="btn btn-sm btn-link" href="<?php if($this->session->userdata('username')){echo base_url().'profile/'.$this->session->userdata('username');}?>">
							<?php if($this->session->userdata('name')){echo $this->session->userdata('name');}?>
						</a>
						<div class="btn-group btn-group-xs">
					  	<a class="btn btn-sm btn-link dropdown-toggle" data-toggle="dropdown">
					   		<span class="glyphicon glyphicon-cog"></span>
					   		<span class="caret"></span>
					  	</a>
					  	<ul class="dropdown-menu" role="menu" style="margin-top:-1px;">
					    	<li><a href="<?php echo base_url()."advertisement/adList"; ?>">My advertisements</a></li>
					    	<li><a href="#">Notifications</a></li>
					    	<li><a href="<?php echo base_url().'report'; ?>">Generate Reports</a></li>
					    	<li class="divider"></li>
					    	<li><a href="<?php echo base_url().'profile/update'; ?>">Profile settings</a></li>
					    	<li><a href="<?php echo base_url().'advertisement/createAd'; ?>">Post Advertisement</a></li>
					    	<li class="divider"></li>
					    	<li><a href="<?php echo base_url().'signin/signout'; ?>">Sign out</a></li>
					  	</ul>
					</div>
				</ul>
		</div>
	</div>