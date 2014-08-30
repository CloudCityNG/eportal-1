<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
    	<?php echo $title; ?>
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>css/delivery_bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/delivery_bootstrap-glyphicons.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/delivery_flat-ui.css" rel="stylesheet">
     <link href="<?php echo base_url()?>css/delivery_sb-admin.css" rel="stylesheet">

	<script src="<?php echo base_url()?>js/delivery_jquery-2.0.3.min.js"></script>
    <script src="<?php echo base_url()?>js/delivery_bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/delivery_bootstrap-select.js"></script>
    <script src="<?php echo base_url()?>js/delivery_bootstrap-switch.js"></script>
    <script src="<?php echo base_url()?>js/delivery_flatui-checkbox.js"></script>
    <script src="<?php echo base_url()?>js/delivery_flatui-radio.js"></script>
    <script src="<?php echo base_url()?>js/delivery_jquery.tagsinput.js"></script>
    <script src="<?php echo base_url()?>js/delivery_jquery.placeholder.js"></script>
    <script src="<?php echo base_url()?>js/delivery_tab.js"></script>
    <script src="<?php echo base_url()?>js/delivery_tooltip.js"></script>
    
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url()?>js/html5shiv.js"></script>
      <script src="<?php echo base_url()?>js/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="palette-wet-asphalt" >

<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-embossed navbar-fixed-top" role="navigation" style="padding-right: 30px;">
		<a class="navbar-brand" href="<?php echo base_url()?>">
			ePortal - Delivery service
		</a>
		<ul class="nav navbar-nav navbar-right">
			 	<!-- Split button -->	
		    <li><a href="<?php echo base_url().'company/'.$this->session->userdata('company_id'); ?>"><?php echo $this->session->userdata('company_name'); ?></a></li>
		    <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></a>
		    <span class="dropdown-arrow"></span>
		    <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Edit company profile</a></li>
			    <li class="divider"></li>
			    <li><a href="<?php echo base_url().'signin/signout'?>" class="">Sign out</a></li>
		    </ul>
		    </li>
	    </ul>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav side-nav">
		        <li>
		            &nbsp;
		        </li>
		        <li>
		            <a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Calendar</a>
		        </li>
		        <li>
		            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Deliveries <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
		            <ul id="demo" class="collapse">
		                <li>
		                    <a href="<?php echo base_url()?>deliveries/pending">Pending</a>
		                </li>
		                <li>
		                    <a href="<?php echo base_url()?>deliveries/accepted">Accepted</a>
		                </li>
		                <li>
		                    <a href="<?php echo base_url()?>deliveries/rejected">Rejected</a>
		                </li>
		                <li>
		                    <a href="<?php echo base_url()?>deliveries/out_of_date">Out of date</a>
		                </li>
		            </ul>
		        </li>
		        <li>
		            <a href="<?php echo base_url()?>contributers"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Contributers</a>
		        </li>
		        <li>
		            <a href="bootstrap-elements.html"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Send customer e-mail</a>
		        </li>
		    </ul>
		</div>     
	</nav>