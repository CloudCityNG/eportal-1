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
<script>
  $(document).ready(function() { 

                
                /*$("#toggle").click(function(){
                   
                     /*dropdown post */
                  $('#toggle').click(function(){
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getContactDetails",    
                    data: {adid: $('#adid').val()},
                    type: "POST",
                    success: function(data){
                        $("#contact").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }}).done(function(){
                    
                    $('#contact').toggle('slow');
                    });
					});
                    
                   /* });*/
});
</script>
<input id="adid"type="hidden" name="adid" value="<?php echo $adid?>" />
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
	<div class="col-md-12 breadcrumb img-thumbnail">

	<!--<script type="text/javascript" src="<?php echo base_url().'Jssor.Slider.FullPack';?>/js/jquery-1.9.1.min.js"></script>-->

    <script type="text/javascript" src="<?php echo base_url().'Jssor.Slider.FullPack';?>/js/jssor.slider.mini.js"></script>
    <script>

        $(document).ready(function ($) {
        	var _SlideshowTransitions = [
            //Fade in L
                {$Duration: 1200, $During: { $Left: [0.3, 0.7] }, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade out R
                , { $Duration: 1200, $SlideOut: true, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade in R
                , { $Duration: 1200, $During: { $Left: [0.3, 0.7] }, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade out L
                , { $Duration: 1200, $SlideOut: true, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }

            //Fade in T
                , { $Duration: 1200, $During: { $Top: [0.3, 0.7] }, $FlyDirection: 4, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade out B
                , { $Duration: 1200, $SlideOut: true, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade in B
                , { $Duration: 1200, $During: { $Top: [0.3, 0.7] }, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade out T
                , { $Duration: 1200, $SlideOut: true, $FlyDirection: 4, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }

            //Fade in LR
                , { $Duration: 1200, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $FlyDirection: 1, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade out LR
                , { $Duration: 1200, $Cols: 2, $SlideOut: true, $FlyDirection: 1, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade in TB
                , { $Duration: 1200, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $FlyDirection: 4, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade out TB
                , { $Duration: 1200, $Rows: 2, $SlideOut: true, $FlyDirection: 4, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }

            //Fade in LR Chess
                , { $Duration: 1200, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $FlyDirection: 4, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade out LR Chess
                , { $Duration: 1200, $Cols: 2, $SlideOut: true, $FlyDirection: 8, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade in TB Chess
                , { $Duration: 1200, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $FlyDirection: 1, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }
            //Fade out TB Chess
                , { $Duration: 1200, $Rows: 2, $SlideOut: true, $FlyDirection: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2 }

            //Fade in Corners
                , { $Duration: 1200, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $FlyDirection: 5, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2 }
            //Fade out Corners
                , { $Duration: 1200, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $FlyDirection: 5, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2 }

            //Fade Clip in H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip in V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];
            var options = {
            	$FillMode: 1,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actuall size, default value is 0
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
				$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,  
				$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds
				 $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
               },
                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },
                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
                }
               
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
  			function ScaleSlider() {
  			 	var paddingWidth = 20;

                //minimum width should reserve for text
                var minReserveWidth = 225;
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth){
                	var availableWidth = parentWidth - paddingWidth;

                    //calculate slider width as 70% of available width
                    var sliderWidth = availableWidth * 0.7;

                    //slider width is maximum 600
                    sliderWidth = Math.min(sliderWidth, 600);

                    //slider width is minimum 200
                    sliderWidth = Math.max(sliderWidth, 200);
                    var clearFix = "none";

                    //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
                    if (availableWidth - sliderWidth < minReserveWidth) {

                        //set slider width to available width
                        sliderWidth = availableWidth;

                        //slider width is minimum 200
                        sliderWidth = Math.max(sliderWidth, 200);

                        clearFix = "both";
                    }

                    //clear fix for safari 3.1, chrome 3
                    //$('#clearFixDiv').css('clear', clearFix);

                    jssor_slider1.$SetScaleWidth(sliderWidth);
                }
                    
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
            
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

		
	
		<div class="panel panel-default " >
    		<div class="panel-body">
    			<div class="col-md-6 pull-left">
    		<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px;
        height: 400px; background: #191919;">

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
    			
				
				echo '<div><img u="image" src="'.base_url().$image['url'].'" /><img u="thumb" src="'.base_url().$image['url'].'" /></div>';
				
				
			}
		}
		else{
			echo '<div><img u="image" src="'.base_url().'images/Advertisement/imagenotfound.png" /><img u="thumb" src="'.base_url().'images/Advertisement/imagenotfound.png" /></div>';
		}
            ?>
            
        </div>
        <style>
            /* jssor slider arrow navigator skin 03 css */
            /*
            .jssora03l              (normal)
            .jssora03r              (normal)
            .jssora03l:hover        (normal mouseover)
            .jssora03r:hover        (normal mouseover)
            .jssora03ldn            (mousedown)
            .jssora03rdn            (mousedown)
            */
            .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(<?php echo base_url().'/Jssor.Slider.FullPack';?>/img/a03.png) no-repeat;
                overflow:hidden;
            }
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03ldn { background-position: -243px -33px; }
            .jssora03rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Tabs</a>

        <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 600px; height: 100px; left:0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <style>
                /* jssor slider thumbnail navigator skin 01 css */
                /*
                .jssort01 .p           (normal)
                .jssort01 .p:hover     (normal mouseover)
                .jssort01 .pav           (active)
                .jssort01 .pav:hover     (active mouseover)
                .jssort01 .pdn           (mousedown)
                */
                .jssort01 .w {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                }

                .jssort01 .c {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 68px;
                    height: 68px;
                    border: #000 2px solid;
                }

                .jssort01 .p:hover .c, .jssort01 .pav:hover .c, .jssort01 .pav .c {
                    background: url(<?php echo base_url().'/Jssor.Slider.FullPack';?>/img/t01.png) center center;
                    border-width: 0px;
                    top: 2px;
                    left: 2px;
                    width: 68px;
                    height: 68px;
                }

                .jssort01 .p:hover .c, .jssort01 .pav:hover .c {
                    top: 0px;
                    left: 0px;
                    width: 70px;
                    height: 70px;
                    border: #fff 1px solid;
                }
            </style>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                    <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                    <div class=c>
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>	
		</div>
		</div>
		<div class="col-md-6 pull-right">
		<div class="h3 text-left" style="margin-bottom: 26px;">
			<?php echo $Title; ?>
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
 
    	</div>	 
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
			    echo '<div class=""><b>Total Rating: '.$total_rate.'</b>'; echo'</div>' ?>
			    <?php echo form_hidden('is_rated', $is_rated);; ?>
			   <?php if($this->session->userdata('username')) {?>
			    
			    <?php if($is_rated==1) {
			    	echo '<div class=""> Your Rating: '.$rate.' </div>';
			    }?>
			    <div><?php echo form_submit(array('class' => 'btn btn-sm btn-primary','name'=>'rate','value'=>'Rate this Ad')); ?></div> <?php } else { ?>
			    	
			    <div><?php
			      				$signin = array('class' => 'btn btn-sm btn-primary','name'=>'signin','value'=>'Sign in to rate','formaction'=>base_url().'signin');
								echo form_submit($signin);
			      			?></div>
			     <?php } ?>
			     
			     <?php echo form_close(); ?> 			
		</div> 
    	</div>
    	
 	 </div>
  			<div class="col-md-5 pull-right">	
	    		<div class="panel panel-default">
	    			<div id="toggle" class=" text-left breadcrumb btn btn-lg btn-block btn-default" style="padding-left:20px; margin-left: 0px;margin-top: 0px;margin:0px;">
				Seller information
	    		</div>
	    		<div id="contact" style="display: none">
	    	
	    		</div>
    		</div>
    		<div class="col-md-7 pull-left">	
	    		<div class="panel panel-default">
	    			<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
				<small>Recomendations</small>
	    		</div>
	    		<div class="panel-body">
	    		</div>
	    		</div>
    		</div>
    			
    </div>
<div class="col-md-7 img-thumbnail breadcrumb-white pull-left">
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
						<div>
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
