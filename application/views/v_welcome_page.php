<style type="text/css">
	body{
		background-color: #8A00B8;
	}
	
</style>
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
		slide show
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
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