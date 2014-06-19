<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/cat_menu.css'?>" rel="stylesheet">
	<title><?php if(isset($title)) echo $title;?></title>
</head>
<body style="background-color: #f1f1f1">
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
	<script type='text/javascript' src='<?php echo base_url().'menu_jquery.js';?>'></script>
	<div class="navbar navbar-default navbar-fixed-top navbar-set-margin-bottom">	
		<div class="container">
			<a href="<?php echo base_url()?>" class="navbar-brand">E - Marketing</a>
			
			<button class="navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-left col-md-offset-2 " style="margin-top: 10px">
						<?php 
							$formattributes = array('class' => 'form-inline', 'role' => 'search');
								echo form_open('site/search01',$formattributes);
									// Open the form and redirects to the "login_validation" function in the main controller
									echo '<div class="btn-group">';	
									$inputkeyword = array('class'=>'form-group form-control','name'=>'title','placeholder'=>'Search here...','style'=>'width:400px;height:34px;padding-right:7px;margin-right:-2px');
									echo form_input($inputkeyword);
									
									$registerbtnattributes = array('class' => 'form-group btn btn-primary pull-right','name'=>'search_submit','value'=>'Search');
									echo form_submit($registerbtnattributes);
									echo '</div>';
								echo form_close();
						?>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">	
					<a href="<?php echo base_url().'advertisement/createAd'?>"class="navbar-btn btn btn-warning" value="adnotifire" > Post Advertisement </a>
					<div class="btn-group">
						<a class="navbar-btn btn btn-sm btn-default" href="<?php if($this->session->userdata('username')){echo base_url().'profile/'.$this->session->userdata('username');}?>">
							<?php if($this->session->userdata('name')){echo $this->session->userdata('name');}?>
						</a>
					  	<a class="navbar-btn btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
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
<div id='cssmenu' style="margin-top: 53px; margin-bottom: 40px;">
<ul>
   <li><a href='index.html'><span>Electronic</span></a>
   	<ul>
         <li class=''><a href='#'><span>Men</span></a></li>
         <li class=''><a href='#'><span>Female</span></a></li>
      </ul>
   </li>
   <li><a href='#'><span>Fashion</span></a>
      <ul>
         <li class=''><a href='#'><span>Men</span></a></li>
         <li class=''><a href='#'><span>Female</span></a></li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a>
   	<ul>
         <li class=''><a href='#'><span>Men</span></a></li>
         <li class=''><a href='#'><span>Female</span></a></li>
      </ul>
   </li>
   <li class=''><a href='#'><span>Contact</span></a>
   	<ul>
         <li class=''><a href='#'><span>Men</span></a></li>
         <li class=''><a href='#'><span>Female</span></a></li>
      </ul>
   </li>
</ul>
</div>