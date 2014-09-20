<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<script src="<?php echo base_url().'js/colpick.js'?>"></script>
<link href="<?php echo base_url().'css/colpick.css'?>" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;Design Configuration</a></li>
   			<li class="sub-link dashLink"><a href="<?php echo base_url().'permissions'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Manage Permissions</a></li>  
          </ul>
</div>
<style>
	.picker {
		margin:0;
		padding:10;
		border:3px solid #666;
		width:120px;
		height:30px;
		border-right:30px solid #666;
		line-height:20px;
	}

</style>
	
<div id="coz-txt">
</div>
<div class="col-md-8 col-md-offset-3 breadcrumb img-thumbnail">
	<div class="h2 text-center">
		Custom colour theme configuration
	</div>
	<br>
	
	<!--Start custom colour configuration----------------------------------------------->
	<div class="col-md-12 breadcrumb-white img-thumbnail">
		<br />
		<!-- Start nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#one" role="tab" data-toggle="tab">1st navigation bar</a></li>
			  <li><a href="#two" role="tab" data-toggle="tab"> 2n navigation bar</a></li>
			  <li><a href="#three" role="tab" data-toggle="tab">Navigation dropdown menue</a></li>
			  <li><a href="#four" role="tab" data-toggle="tab">Controller dropdown menue</a></li>
			  <li><a href="#five" role="tab" data-toggle="tab">Theme box</a></li>
			</ul>
		<!-- end nav tabs -->	
		
		<?php
			$formattributes = array('role' => 'form', 'enctype'=>'multipart/form-data' );
			echo form_open('administration/generate_colour_theme/',$formattributes);
		?>
		<!-- Start tab panes -->
			<div class="tab-content">
				<!--start one -->
			  		<div class="tab-pane fade in active" id="one">
			  			<br />
			  			<div class="form-horizontal col-md-12 col-md-offset-1">
			  				<!--1-->
			  				<div class="form-group">
			  					<div class="col-md-4 text-right pull-left">
						  			<label for="nav-1-bg-colour" class="control-label">
						  				Background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="1st navigation bar background colour" type="text" id="nav-1-bg-colour" class="picker" name="oneOne"></input>
					  			</div>
				  			</div>
				  			<!--2-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="nav-1-bdr-btm-colour" class="control-label">
						  				Border bottom colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="1st navigation bar border bottom colour" type="text" id="nav-1-bdr-btm-colour" class="picker" name="oneTwo"></input>
					  			</div>
				  			</div>
				  			<!--3-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="nav-1-link-colour" class="control-label">
						  				Text colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="1st navigation bar text colour" type="text" id="nav-1-link-colour" class="picker" name="oneThree"></input>
					  			</div>
				  			</div>
				  			<!--4-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="nav-1-link-hover-colour" class="control-label">
						  				Text hover colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="1st navigation bar text hover colour" type="text" id="nav-1-link-hover-colour" class="picker" name="oneFour"></input>
					  			</div>
				  			</div>
			  			</div>
			  		</div>
			 	<!--end one-->
			 	
			 	<!--start two-->
			  		<div class="tab-pane fade" id="two">
						<br />
			  			<div class="form-horizontal col-md-12 col-md-offset-1">
			  				<!--1-->
			  				<div class="form-group">
			  					<div class="col-md-4 text-right pull-left">
						  			<label for="nav-2-bg-colour" class="control-label">
						  				Background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="2n navigation bar background colour" type="text" id="nav-2-bg-colour" class="picker" name="twoOne"></input>
					  			</div>
				  			</div>
				  			<!--2-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="nav-2-bdr-btm-colour" class="control-label">
						  				Border bottom colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="2n navigation bar border bottom colour" type="text" id="nav-2-bdr-btm-colour" class="picker" name="twoTwo"></input>
					  			</div>
				  			</div>
						</div>
					</div>
				<!--end two-->
				
				<!--start three-->
			  		<div class="tab-pane fade" id="three">
			  			<br />
			  			<div class="form-horizontal col-md-12 col-md-offset-1">
			  				<!--1
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-bg-colour" class="control-label">
						  				Background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input type="text" id="nav-dropdown-bg-colour" class="picker"></input>
					  			</div>
				  			</div>
				  			<!--2-->
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-bg-hover-colour" class="control-label">
						  				Category background hover colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Navigation dropdown menue category background hover colour" alt="Category background hover colour" type="text" id="nav-dropdown-bg-hover-colour" class="picker" name="threeOne"></input>
					  			</div>
				  			</div>
				  			<!--3-->
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-text-colour" class="control-label">
						  				Text colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Navigation dropdown menue text colour" type="text" id="nav-dropdown-text-colour" class="picker" name="threeTwo"></input>
					  			</div>
				  			</div>
				  			<!--4-->
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-text-hover-colour" class="control-label">
						  				Text hover colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Navigation dropdown menue text hover colour" type="text" id="nav-dropdown-text-hover-colour" class="picker" name="threeThree"></input>
					  			</div>
				  			</div>
				  			<!--5-->
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-list-colour" class="control-label">
						  				Subcategory background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Navigation dropdown menue subcategory background colour" type="text" id="nav-dropdown-list-colour" class="picker" name="threeFour"></input>
					  			</div>
				  			</div>
				  			<!--6-->
			  				<div class="form-group">
			  					<div class="col-md-5 text-right pull-left">
						  			<label for="nav-dropdown-list-hover-colour" class="control-label">
						  				Subcategory background hover colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Navigation dropdown menue subcategory background hover colour" type="text" id="nav-dropdown-list-hover-colour" class="picker" name="threeFive"></input>
					  			</div>
				  			</div>
						</div>
			  		</div>
			  	<!--end three-->
			  	
			  	<!--start four-->
					<div class="tab-pane fade" id="four">
					  	<br />
			  			<div class="form-horizontal col-md-12 col-md-offset-1">
			  				<!--1
			  				<div class="form-group">
			  					<div class="col-md-4 text-right pull-left">
						  			<label for="controller-dropdown-bg-colour" class="control-label">
						  				Background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input type="text" id="controller-dropdown-bg-colour" class="picker"></input>
					  			</div>
				  			</div>
				  			<!--2
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="controller-dropdown-text" class="control-label">
						  				Text color
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input type="text" id="controller-dropdown-text" class="picker"></input>
					  			</div>
				  			</div>
				  			<!--3-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="controller-dropdown-text-hover" class="control-label">
						  				Text hover color
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Controller dropdown menue text hover color" type="text" id="controller-dropdown-text-hover" class="picker" name="fourOne"></input>
					  			</div>
				  			</div>
				  			<!--3-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="controller-dropdown-text-hover-bg" class="control-label">
						  				Text hover background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Controller dropdown menue text hover background colour" type="text" id="controller-dropdown-text-hover-bg" class="picker" name="fourTwo"></input>
					  			</div>
				  			</div>
						</div>
					</div>
				<!--end four-->
				
				<!--start five-->
					<div class="tab-pane fade" id="five">
					  	<br />
			  			<div class="form-horizontal col-md-12 col-md-offset-1">
			  				<!--1-->
			  				<div class="form-group">
			  					<div class="col-md-4 text-right pull-left">
						  			<label for="theme-box-bg-colour" class="control-label">
						  				Theme background colour
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Theme box background colour" type="text" id="theme-box-bg-colour" class="picker" name="fiveOne"></input>
					  			</div>
				  			</div>
				  			<!--2-->
				  			<div class="form-group">
				  				<div class="col-md-4 text-right pull-left">
						  			<label for="theme-box-text-colour" class="control-label">
						  				Theme text color
						  			</label>
					  			</div>
					  			<div class="col-md-3">
					  				<input alt="Theme box text color" type="text" id="theme-box-text-colour" class="picker" name="fiveTwo"></input>
					  			</div>
				  			</div>
							<br />
						</div>
						
						<div class="col-md-6 col-md-offset-3 theme-box-background-text breadcrumb theme-box-background">
							<div class="h4 text-center">
								Header text
							</div>
							<br />
							<hr style="margin-top: -10px" />
							<div class="h5 text-left">
								Online advertising, also called Internet advertising, is a form 
								of advertising which uses the Internet to deliver promotional 
								marketing messages to consumers. It includes email marketing, 
							</div>
							<div class="pull-right">
								<br />
								<a class="btn btn-default">default</a>
								<a class="btn btn-primary">primary</a>
								<a class="btn btn-info">info</a>
								<a class="btn btn-warning">warning</a>
								<a class="btn btn-danger">danger</a>
							</div>
						</div>
					</div>
				<!--end five-->
			</div>
		<!-- end tab panes -->
		
		<div class="col-lg-12">
		<br />
			<div id="txtbox-remain" class="pull-left text-danger-2">
				<b>important !</b>
				<br />
				You need to fill all the colour boxes in order to generate a theme.
			</div>
			<input type="submit" name="custom_theme_submit" id="generate" class="btn btn-primary disabled pull-right" href="<?php echo base_url().'administration/generate_colour_theme'?>" value="Generate and apply theme">
		</div>
		<?php
			echo form_close();
		?>
	</div>
	<!--Start custom colour configuration----------------------------------------------->
</div>


<script type="text/javascript" >
	  $('.picker').colpick({
			layout:'hex',
			submit:0,
			colorScheme:'light',
			onChange:function(hsb,hex,rgb,el,bySetColor) {
				$(el).css('border-color','#'+hex);
				// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
				if(!bySetColor) $(el).val(hex);
			}
		}).keyup(function(){
			$(this).colpickSetColor(this.value);
		});
</script>

<script type="text/javascript">
$(document).ready(function() {
	//1st nav bar bg
	$("#nav-1-bg-colour").blur(function(){
		if($(this).val().length != 0){
			$(".navbar-main-theme").css("background-color",$( this ).css( "border-color" ));
		}
	});
	
	//1st nav bar brdr btm colour
	$("#nav-1-bdr-btm-colour").blur(function(){
		$(".navbar-main-theme").css("border-color",$( this ).css( "border-color" ));
	});
	
	//1st nav bar text colour
	$("#nav-1-link-colour").blur(function(){
		$(".navbar-main-theme .navbar-nav > li > a").css("color",$( this ).css( "border-color" ));
		$(".nav > li > div > a").css("color",$( this ).css( "border-color" ));
	});
	
	//1st nav bar text hoover colour
	$("#nav-1-link-hover-colour").blur(function(){
		$(".navbar-main-theme .navbar-nav > li > a").hover(function(){
			$(this).css("color",$( "#nav-1-link-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-1-link-colour").css( "border-color" ));
		});
		
		$(".navbar-main-theme .navbar-nav > li > a").focus(function(){
			$(this).css("color",$( "#nav-1-link-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-1-link-colour").css( "border-color" ));
		});
		
		$(".nav > li > div > a").hover(function(){
			$(this).css("color",$( "#nav-1-link-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-1-link-colour").css( "border-color" ));
		});
		
		$(".nav > li > div > a").focus(function(){
			$(this).css("color",$( "#nav-1-link-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-1-link-colour").css( "border-color" ));
		});
	});
	
	//2nd nav bar bg colour
   $("#nav-2-bg-colour").blur(function(){
		$(".logo-background").css("background-color",$( this ).css( "border-color" ));
		$(".navbar-background").css("background-color",$( this ).css( "border-color" ));
	});
	
	//2nd nav bar border btm colour
   $("#nav-2-bdr-btm-colour").blur(function(){
		$(".navbar-background").css("border-bottom-color",$( this ).css( "border-color" ));
	});
	
	//navigation bar category hover 
	$("#nav-dropdown-bg-hover-colour").blur(function(){
		$("#coz-txt").html('<style id="coz">#cssmenu > ul > li:after {	background-color: '+$("#nav-dropdown-bg-hover-colour").css("border-color")+';}</style>');
	});
	
	//navigation bar text color
	$("#nav-dropdown-text-colour").blur(function(){
		$("#cssmenu > ul > li > a").css("color",$( this ).css( "border-color" ));
		$("#cssmenu ul li ul li a").css("color",$( this ).css( "border-color" ));
	});
	
	//navigation bar text hover color
	$("#nav-dropdown-text-hover-colour").blur(function(){
		$("#cssmenu > ul > li > a").hover(function(){
			$(this).css("color",$( "#nav-dropdown-text-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-dropdown-text-colour").css( "border-color" ));
		});
		
		$("#cssmenu ul li ul li a").hover(function(){
			$(this).css("color",$( "#nav-dropdown-text-hover-colour" ).css( "border-color" ));
		},function(){
			$(this).css("color",$("#nav-dropdown-text-colour").css( "border-color" ));
		});
	});
	
	//subcategory bg colour
	$("#nav-dropdown-list-colour").blur(function(){
		$("#cssmenu ul li ul li").css("background-color",$( this ).css( "border-color" ));
		$("#cssmenu > ul > li ul").css("border-top-color",$( this ).css( "border-color" ));
		$("#cssmenu > ul > li ul").css("border-left-color",$( this ).css( "border-color" ));
		$("#cssmenu > ul > li ul").css("border-right-color",$( this ).css( "border-color" ));
		$("#cssmenu > ul > li ul").css("border-bottom-color",$( this ).css( "border-color" ));
	});
	
	//subcategory bg hover colour
	$("#nav-dropdown-list-hover-colour").blur(function(){
		$("#cssmenu ul li ul li").hover(function(){
			$(this).css("background-color",$("#nav-dropdown-list-hover-colour").css( "border-color" ));
		},function(){
			$(this).css("background-color",$("#nav-dropdown-list-colour").css( "border-color" ));
		});
	});
	
	//controller drpdwn txt hover color
	$("#controller-dropdown-text-hover").blur(function(){
		$(".dropdown-menu > li > a").hover(function(){
			$(this).css("color",$( "#controller-dropdown-text-hover" ).css( "border-color" ));
		},function(){
			$(this).css("color","#333333");
		});
	});
	
	//controller drpdwn txt hover bg color
	 $("#controller-dropdown-text-hover-bg").blur(function(){
		$(".dropdown-menu > li > a").hover(function(){
			$(this).css("background-color",$( "#controller-dropdown-text-hover-bg" ).css( "border-color" ));
		},function(){
			$(this).css("background-color","#FFFFFF");
		});
	});
	
	//theme box colour
	$("#theme-box-bg-colour").blur(function(){
		$(".theme-box-background").css("background-color",$( this ).css( "border-color" ));
	});
	
	//theme box text color
	$("#theme-box-text-colour").blur(function(){
		$(".theme-box-background-text").css("color",$( this ).css( "border-color" ));
	});
	
	//enabling button
	var status=true;
	var boxName='';
	$(".picker").blur(function(){
		$(".picker").each(function() {
			if($(this).val().length == 0){
				status=false;
				boxName=$(this).attr( "alt");
				return false;	
			}
			status=true;
		});
		if(status){
			$( "#generate" ).removeClass( "disabled" );
			$("#txtbox-remain").html("");
		}else{
			$( "#generate" ).addClass( "disabled" );
			$("#txtbox-remain").html('<b>important !</b><br />You need to fill all the colour boxes in order to generate a theme.<br /><span class="label label-danger">'+boxName+'</span> needs to be filled');
		}
	});
});
</script>
