<style type="text/css">
	body{
		background-color: #8A00B8;
	}
	
</style>
<script type="text/javascript" src="<?php echo base_url().'Jssor.Slider.FullPack';?>/js/jssor.slider.mini.js"></script>
<script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(bodyWidth, 980));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
<div class="container" style="margin-top: 50px;">
<div class="row" style="margin-bottom: 25px;">
	<div class="col-md-2">
		<div class="h2 text-white">
			ePortal
		</div>
	</div>
	<div class="col-md-10">
		<div class="col-md-12">
			<br />
			<?php 
				$formattributes = array('class' => 'form-inline', 'role' => 'search');
					echo form_open('site/search01',$formattributes);
						// Open the form and redirects to the "login_validation" function in the main controller
						echo '<div class="btn-group col-md-12">';	
						$inputkeyword = array('class'=>'form-group form-control pull-left','name'=>'title','placeholder'=>'Search here...','style'=>'width:89%;height:45px;padding-right:7px;margin-right:-2px');
						echo form_input($inputkeyword);
						
						$registerbtnattributes = array('class' => 'form-group btn btn-lg btn-primary','name'=>'search_submit','value'=>'Search');
						echo form_submit($registerbtnattributes);
						echo '</div>';
					echo form_close();
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-5 breadcrumb-white">
		
			<div id="slider1_container" style="position: relative; margin: 0 auto;
                top: 0px; left: 0px; width: 980px; height: 400px;">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(<?php echo base_url().'/Jssor.Slider.FullPack';?>/img/loading.gif) no-repeat center center;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- Slides Container -->
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 300px;
                    height: 400px; overflow: hidden;">
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">results driven</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                iT Solutions & Services </span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 1.5em; color: #FFFFFF;">
                                Our professional services help you address the ever evolving business and technological
                                challenges.</span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="auction slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="../img/major/s2.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s2t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">web design & development</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Visually Compelling & Functional </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay slideshow" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="../img/major/s3.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s3t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Online marketing</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                We enhance your brand, your website traffic and your bottom line online. </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="listing slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="../img/major/s4.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s4t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">web hosting</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                we offer the web's best hosting plans for every site. </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay store slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="../img/major/s5.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s5t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">domain name registration</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Secure your online identity and register your domain now. </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="listing template slider"
                                    width="215" height="50" /></a>
                        </div>
                        <img src="../img/major/s6.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s6t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">video production</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Make a greater impact on your clients through interactive Video Production.
                            </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="auction template slider"
                                    width="215" height="50" /></a>
                        </div>
                        <img src="../img/major/s7.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s7t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">mobile applications</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Stay connected to your customers on the go with a MajorMedia custom mobile app.
                                <br />
                                <br />
                                <a href="http://www.jssor.com">
                                    <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay slider" width="215"
                                        height="50" /></a>
                        </div>
                        <img src="../img/major/s8.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s8t.jpg" />
                    </div>
                </div>
                <!-- Arrow Navigator Skin Begin -->
                <style>
                    /* jssor slider arrow navigator skin 07 css */
                    /*
                    .jssora07l              (normal)
                    .jssora07r              (normal)
                    .jssora07l:hover        (normal mouseover)
                    .jssora07r:hover        (normal mouseover)
                    .jssora07ldn            (mousedown)
                    .jssora07rdn            (mousedown)
                    */
                    .jssora07l, .jssora07r, .jssora07ldn, .jssora07rdn
                    {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(../img/a07.png) no-repeat;
                        overflow: hidden;
                    }
                    .jssora07l
                    {
                        background-position: -5px -35px;
                    }
                    .jssora07r
                    {
                        background-position: -65px -35px;
                    }
                    .jssora07l:hover
                    {
                        background-position: -125px -35px;
                    }
                    .jssora07r:hover
                    {
                        background-position: -185px -35px;
                    }
                    .jssora07ldn
                    {
                        background-position: -245px -35px;
                    }
                    .jssora07rdn
                    {
                        background-position: -305px -35px;
                    }
                </style>
                <!-- Arrow Left -->
                <span u="arrowleft" class="jssora07l" style="width: 50px; height: 50px; top: 123px;
                    left: 8px;"></span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora07r" style="width: 50px; height: 50px; top: 123px;
                    right: 8px"></span>
                <!-- Arrow Navigator Skin End -->
                <!-- ThumbnailNavigator Skin Begin -->
                <div u="thumbnavigator" class="jssort04" style="position: absolute; width: 600px;
                    height: 60px; right: 0px; bottom: 0px;">
                    <!-- Thumbnail Item Skin Begin -->
                    <style>
                        /* jssor slider thumbnail navigator skin 04 css */
                        /*
                        .jssort04 .p            (normal)
                        .jssort04 .p:hover      (normal mouseover)
                        .jssort04 .pav          (active)
                        .jssort04 .pav:hover    (active mouseover)
                        .jssort04 .pdn          (mousedown)
                        */
                        .jssort04 .w, .jssort04 .pav:hover .w
                        {
                            position: absolute;
                            width: 60px;
                            height: 30px;
                            border: #0099FF 1px solid;
                        }
                        * html .jssort04 .w
                        {
                            width: /**/ 62px;
                            height: /**/ 32px;
                        }
                        .jssort04 .pdn .w, .jssort04 .pav .w
                        {
                            border-style: solid;
                        }
                        .jssort04 .c
                        {
                            width: 62px;
                            height: 32px;
                            filter: alpha(opacity=45);
                            opacity: .45;
                            transition: opacity .6s;
                            -moz-transition: opacity .6s;
                            -webkit-transition: opacity .6s;
                            -o-transition: opacity .6s;
                        }
                        .jssort04 .p:hover .c, .jssort04 .pav .c
                        {
                            filter: alpha(opacity=0);
                            opacity: 0;
                        }
                        .jssort04 .p:hover .c
                        {
                            transition: none;
                            -moz-transition: none;
                            -webkit-transition: none;
                            -o-transition: none;
                        }
                    </style>
                    <div u="slides" style="bottom: 25px; right: 30px;">
                        <div u="prototype" class="p" style="position: absolute; width: 62px; height: 32px; top: 0; left: 0;">
                            <div class="w">
                                <thumbnailtemplate style="width: 100%; height: 100%; border: none; position: absolute; top: 0; left: 0;"></thumbnailtemplate>
                            </div>
                            <div class="c" style="position: absolute; background-color: #000; top: 0; left: 0">
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- ThumbnailNavigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">jQuery Tabs</a>
            </div>
            <!-- Jssor Slider End -->
	</div>
	<div class="col-md-7">
		<div class="col-md-12 text-white">
			<a class="btn btn-warning btn-lg" href="<?php echo base_url().'advertisement/createAd';?>"> Post Advertisement</a>
			<a class="btn btn-danger btn-lg" href="<?php echo base_url().'home';?>"> Go to main page</a>
			<?php /*<div class="h1" style="font:50px; font-family:"Courier New", Courier, monospace">
				Ithin
			</div>
			 * 
			 */?>
			 <br />
			 <br />
			<div class="text-justify h4" style="font-family:Corbel">
			• Sprint planning: User stories chosen for sprint backlog. Describe reasons for the choice and any modifications to the user stories. Describe initial high level task breakdown and effort estimation. 
• Scrum meetings: Provide short reports on these meetings which are intended to report/review ongoing progress of the team during a sprint. 
• Details of the design. Include relevant details of the design (may use UML, ER diagram for the database, etc.). Provide reasons for decisions made. Report any changes to the user stories that occurred during the design process (in consultation with the Product Owner). 
• Implementation details. Document the implementation including (planned and actually completed) tasks, effort, features and task distribution. Provide screen shots of the various functions as appropriate. Describe any changes made to the initial design. Describe the testing that was carried out. 
			<br />
			<br />
				<a class="btn btn-link-white" href="#">Using cookies</a>
				-
				<a class="btn btn-link-white" href="#">Terms and conditions</a>
				-
				<a class="btn btn-link-white" href="#">Facebook</a>
			</div>
		</div>
	</div>
</div>
</div>