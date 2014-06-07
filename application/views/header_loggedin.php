<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.min.css'?>" rel="stylesheet">
	<title><?php if(isset($title)) echo $title;?></title>
</head>
<body style="background-color: #f6f7f8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!--<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>" ></script>
	<script src="<?php echo base_url().'js/jquery-1.11.0.js'?>"></script>-->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>"></script>
	<script src="<?php echo base_url().'js/jquery-migrate-1.2.1.min.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script src="<?php echo base_url().'js/tooltip.js'?>"></script>
	<script src="<?php echo base_url().'js/modal.js'?>"></script>
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
	<div class="navbar navbar-inverse navbar-fixed-top navbar-set-margin-bottom">	
		<div class="container">
			<a href="<?php echo base_url()?>" class="navbar-brand">E - Marketing</a>
			
			<button class="navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				
			<div class="collapse navbar-collapse navHeaderCollapse">
				
				<ul class="nav navbar-left col-md-offset-2 " style="margin-top: 7px">
				
						<?php 
					
						echo validation_errors();
						
						$formattributes = array('class' => 'form-inline', 'role' => 'search');
						echo form_open('site/search01',$formattributes);
						// Open the form and redirects to the "login_validation" function in the main controller
						
							$inputkeyword = array('class'=>'form-group','name'=>'title','placeholder'=>'Search','style'=>'width:280px;height:33px;padding:5px');
							echo form_input($inputkeyword);
							
							$registerbtnattributes = array('class' => 'form-group btn btn-primary','name'=>'search_submit','value'=>'Search');
							echo form_submit($registerbtnattributes);
						echo form_close();
						
					
						?>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">	
					<a href="<?php echo base_url().'advertisement/createAd'?>"class="navbar-btn btn btn-warning" value="adnotifire" > Post Advertisement </a>
					<div class="btn-group">
						<a class="navbar-btn btn btn-primary" href="<?php if($this->session->userdata('username')){echo base_url().'profile/'.$this->session->userdata('username');}?>">
							<?php if($this->session->userdata('name')){echo $this->session->userdata('name');}?>
						</a>
					  	<a class="navbar-btn btn btn-primary dropdown-toggle" data-toggle="dropdown">
					   		<span class="glyphicon glyphicon-cog"></span>
					   		<span class="caret"></span>
					  	</a>
					  	<ul class="dropdown-menu" role="menu">
					    	<li><a href="<?php echo base_url()."advertisement/adList"; ?>">My advertisements</a></li>
					    	<li><a href="#">Notifications</a></li>
					    	<li class="divider"></li>
					    	<li><a href="<?php echo base_url()."profile/update"; ?>">Profile settings</a></li>
					    	<li class="divider"></li>
					    	<li><a href="<?php echo base_url()."signin/signout" ?>">Sign out</a></li>
					  	</ul>
					</div>
				</ul>
			</div>
		</div>
	</div>
	<div class="navbar navbar-default navbar-static-top navbar-set-margin-bottom"></div>