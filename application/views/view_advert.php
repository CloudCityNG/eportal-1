<style>
.bubble img {/*
  float:left;
  width:70px;
  height:70px;
  border:3px solid #ffffff;
  border-radius:10px*/
                  }
.bubble-content {
position:relative;
float:left;
margin-left:0px;
width:500px;
padding:1px 10px;
border-radius:10px;
background-color:#FFFFFF;
box-shadow:1px 1px 5px rgba(0,0,0,.2);
}
.bubble {
    margin-top:20px;
    }
.point {
  border-top:10px solid transparent;
  border-bottom:10px solid transparent;
  border-right: 12px solid #FFF;
  position:absolute;
  left:-10px;
  top:12px;
  }
a:link
		{
			color: red;
		}
		a:hover
		{
			color: red;
			cursor: pointer; cursor: hand;
			text-decoration: underline;
		}
/*
.clearfix:after {
    visibility:hidden;
    display:block;
    font-size:0;
    content: ".";
    clear:both;
    height:0;
    line-height:
    }
.clearfix {
     display: inline-block;
     }
* html .clearfix {
       height: 1%;
  }*/

</style>
<div class="container">
	<script type="text/javascript">
		function back()
		{
			window.history.back();
		}
	</script>
			<!--<div class="pull-left">
			<input type="" onclick="back()" value="Back to search results" class="btn btn-info" />
		</div>-->
	<div class="col-md-8 col-md-offset-2 breadcrumb img-thumbnail">

	<!--<script type="text/javascript" src="<?php echo base_url().'Jssor.Slider.FullPack';?>/js/jquery-1.9.1.min.js"></script>-->

    <script type="text/javascript" src="<?php echo base_url().'Jssor.Slider.FullPack';?>/js/jssor.slider.mini.js"></script>
    <script>

        $(document).ready(function ($) {
            var options = {
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        });
    </script>
    <script>
	function DelCom(id) {
    var url="<?php echo base_url();?>";
    	if (confirm("Delete this comment?") == true) {
    		var adid = "<?php echo $this->uri->segment(3);?>";
        	window.location = url+"ad_control/del_comment/"+id+"/"+adid;
    	} else {
        	return false;
    	}
	}
	</script>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles (except 'top', 'left', 'width' and 'height') to css file or css block. -->
    <!-- Bullet Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Tabs</a>
    
    <!-- Jssor Slider End -->

		<div class="h3 text-center" style="margin-bottom: 26px;">
			<?php echo $Title; ?>
		</div>
	
		<div class="panel panel-default " >
    		<div class="panel-body">
    		<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px;
        height: 300px;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo base_url().'/Jssor.Slider.FullPack';?>/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
            overflow: hidden;">
            <?php 
        if(isset($images)&&count($images)){
    		foreach ($images as $image) {
    			
				
				echo '<div><img u="image" src="'.base_url().$image['url'].'" /></div>';
				
				
			}
		}
		else{
			echo '<div><img u="image" src="'.base_url().'images/Advertisement/imagenotfound.png" /></div>';
		}
            ?>
        </div>
        
        <!-- Bullet Navigator Skin Begin -->
        <style>
            /* jssor slider bullet navigator skin 03 css */
            /*
            .jssorb03 div           (normal)
            .jssorb03 div:hover     (normal mouseover)
            .jssorb03 .av           (active)
            .jssorb03 .av:hover     (active mouseover)
            .jssorb03 .dn           (mousedown)
            */
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av
            {
                background: url(<?php echo base_url().'/Jssor.Slider.FullPack';?>/img/b03.png) no-repeat;
                overflow:hidden;
                cursor: pointer;
            }
            .jssorb03 div { background-position: -5px -4px; }
            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
            .jssorb03 .av { background-position: -65px -4px; }
            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb03" style="position: absolute; bottom: 4px; left: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
        </div>
           
    		
    		
		</div>
		<br />
		<br />
		<p><?php echo $body;?></p>
		<br /><div class="pull-left">
    		<p><b><span class="glyphicon glyphicon-shopping-cart"></span> Price Rs./= <?php echo $price; ?></b></p>
    		 <?php 
    		if($telemarketer==0)
    		{
    			echo '<p><b><span class="glyphicon glyphicon-exclamation-sign"></span> ';
    			echo 'I dont want to be contacted by telemarketers.</b></p>';
    		}
    		 ?>
    		     		 <?php 
    		if($featured!=0)
    		{
    			echo '<p><b><span class="glyphicon glyphicon-star-empty"></span> ';
    			echo 'Featured</b></p>';
    		}
    		 ?><?php if($countryid!=0||$categoryid!=0){?>
    		 <p><span class="glyphicon glyphicon-tags"></span> 
    		 <?php if($categoryid!=0){?>
 				<a href="<?php echo base_url();?>site/search02/category/<?php echo $categoryid;?>"><span class="label label-info"><?php echo $category;?></span></a>
    		    		 	
    		 
    		 <?php if($subcategoryid!=0){?>
    		 	<a href="<?php echo base_url();?>site/search02/sub_category/<?php echo $subcategoryid;?>"><span class="label label-info"><?php echo $subcategory;?></span></a>
    		 	<?php }?>
    		 	</p>
    		 	<?php }?>
    		 <?php if($countryid!=0){?>
    		 	<p><span class="glyphicon glyphicon-globe"></span> 
    		 	<a href="<?php echo base_url();?>site/search02/country/<?php echo $countryid;?>""><span class="label label-info"><?php echo $country;?></span></a>
    		 			<?php if($provinceid!=0){?>
    		 				<a href="<?php echo base_url();?>site/search02/province/<?php echo $provinceid;?>""><span class="label label-info"><?php echo $province;?></span></a>
    		 					<?php if($districtid!=0){?>
    		 						<a href="<?php echo base_url();?>site/search02/district/<?php echo $districtid;?>""><span class="label label-info"><?php echo $district;?></span></a>
    		 	
    		 					<?php }?>
    		 			<?php }?>
    		 	<?php }?>
    		 	</p>
    		 <?php }?>
    		
    		 </div>
    		 <!--<div class="pull-left"><a href="<?php echo base_url();?>site/search02/category/1">cat01</a></div>-->
    		<div class="pull-right">
<?php	echo form_open('advertisement/submit_rate/'.$this->uri->segment(3));
		
		if($this->session->userdata('username'))
		{$radio_level = "";}
		else {$radio_level = "disabled";}
		
		for($i = 1;$i <= 5;$i++)
    	{
        if ($i == round($avg_rate))
        {
       	
       echo'<input name="star" type="radio" class="star" checked="checked" '.$radio_level.' value='.$i.' "/>';
	   
        }
        else
        {
         echo'<input name="star" type="radio" class="star" '.$radio_level.' value='.$i.' "/>';
        }
    } //end of for
    echo '</br>';
    echo '<div class="row"><b>Total Rating: '.$total_rate.'</b>'; echo'</div>' ?>
    <?php echo form_hidden('is_rated', $is_rated);; ?>
   <?php if($this->session->userdata('username')) {?>
    
    <?php if($is_rated==1) {
    	echo '<div class="row"> Your Rating: '.$rate.' </div>';
    }?>
    <div><?php echo form_submit(array('class' => 'form-control btn btn-default','name'=>'rate','value'=>'Rate this Ad')); ?></div> <?php } else { ?>
    	
    <div><?php
      				$signin = array('class' => 'form-control btn btn-primary','name'=>'signin','value'=>'Sign in to rate','formaction'=>base_url().'signin');
					echo form_submit($signin);
      			?></div>
     <?php } ?>
     
     <?php echo form_close(); ?> 			
</div>  
    		 
    	</div>
  </div>
    		<div class="panel panel-default " >
    			<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Contact Details</small>
    		</div>
    		<div class="panel-body">
    		<p><strong><b><span class="glyphicon glyphicon-user"></span> Name :</b> <a class="btn btn-link" href="<?php echo base_url().'profile/'.$username;?>"><?php echo $name;?></a></strong></p>
    		<p><strong><b><span class="glyphicon glyphicon-envelope"></span> Email : </b><?php echo $email;?></strong></p>
    		<p><strong><b><span class="glyphicon glyphicon-home"></span> Address : </b><?php echo $address;?></strong></p>
    		<p><strong><b><span class="glyphicon glyphicon-earphone"></span> Telephone : </b><?php echo $telephone;?></strong></p>
    		</div>
    		</div>
    		</div>

	<div class="col-md-8 col-md-offset-2 img-thumbnail breadcrumb">
		<div>
			
                    <?php foreach ($comments as $comment): ?>
                    	
                    <div class="bubble-list">
      					<div class="bubble clearfix">
                        <div class="col-xs-2">
                            <img src="<?php echo base_url().'images/prifilepictures/'.$comment->image;?>" alt="" class="img-responsive img-circle" width="75px" height="75px">
                        </div>
                        <div class="bubble-content">
        				<div class="point"></div>
        				<div><a href="<?php echo base_url().'profile/'.$comment->username;?>"><b><?php echo $comment->fullname; ?></b></a></div>
						<p><?php echo $comment->comment; ?></p>
						<div class="col-md-4 col-md-4"><font color="#C0C0C0"> <?php echo $comment->cDATE ?> </font></div>
						<div class="col-md-4 col-lg-offset-4 pull-right"><font color="RED"> <a title="delete" onclick="DelCom(<?php echo $comment->cmid;?>)">x</a></font></div>
       					</div>
       					<div class="clearfix"></div>
       					</div>
       						</div>
                     
                     <?php endforeach; ?>
                     
        </div>
	<div>
						<div class="col-md-offset-2">
							<?php if($this->session->userdata('username'))
							{
								echo form_open("ad_control/add_comment/".$this->uri->segment(3));
								//echo '<div><span class="glyphicon glyphicon-comment"></span>';
								//echo form_label('Comment:','comment');
								$commentInput=array('value'=>'','id'=>'comment','name'=>'comment','style'=>"width: 400px;height: 40px;margin-bottom: 5px;margin-top: 10px;padding: 5px",'placeholder'=>'Comment here');
								echo form_input($commentInput);
								echo '<br>';
								$commentBtn=array('value'=>'Post Comment','id'=>'comment','name'=>'action','class'=>'btn btn-warning col-md-offset-5');
								echo form_submit($commentBtn);
								
								echo form_close();
							} 
							else 
							{
								echo '<a class="btn btn-default btn-block btn-lg" href="'.base_url().'signin"> Signin to comment</a>';
								echo '<br / >';								
								echo '<a class="btn btn-warning btn-block btn-lg" href="'.base_url().'registration"> You don\'t have an account ? </a>';
							}?>
						</div>
					</div>

</div>
</div>
