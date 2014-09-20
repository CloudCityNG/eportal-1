<div id="page-wrapper" style="background-color: #ECF0F1;min-height: 400px;">
	<div class="col-md-12">
		<div class="" style=" margin-top: 30px; margin-left: 10px; position: fixed;">
			<?php
				if($company['basic_details']['profile_picture']!=null){
					echo '<img style="margin-bottom:10px;border:1px solid #ddd" width="250px" class="" src="'.base_url().'images/delivery_profile_pictures/'.$company['basic_details']['profile_picture'].'">';
				}else{
					echo '<img style="margin-bottom:10px;border:1px solid #ddd" width="250px" class="" src="'.base_url().'images/delivery_profile_pictures/default.jpg" >';
				}

				/*if($company['basic_details']['id']!=$this->session->userdata('company_id')){
					echo '<a class="btn btn-block btn-embossed btn-danger">Report this user</a>';
					echo '<a class="btn btn-block btn-embossed btn-info">Make delivery request</a>';
				}else{
					echo '<a class="btn btn-block btn-embossed btn-danger">Report this user</a>';
					echo '<a class="btn btn-block btn-embossed btn-info">Make delivery request</a>';
				}*/
			?>
		</div>
		<div class="col-md-8" style="margin-left: 300px; margin-top: 30px; background-color: #FFFFFF; -webkit-border-radius: 5px;border:1px solid #ddd;padding:5px 35px 20px 35px; ">
			<div class="h3 text-center" style="margin-bottom: 30px;">
				<?php echo $company['basic_details']['company_name']; ?>
			</div>
			<!-- Start nav tabs -->
			<ul class="nav nav-tabs" role="tablist" data-tabs="tabs" >
			  <li class="active"><a href="#one" role="tab" data-toggle="tab">Basic info</a></li>
			  <li><a href="#two" role="tab" data-toggle="tab"> Delivery</a></li>
			  <li><a href="#three" role="tab" data-toggle="tab">Contact</a></li>
			</ul>
			<br />
		<!-- end nav tabs -->

			<!-- Start tab panes -->
			<div class="tab-content">
				<!--start basic info -->
			  		<div class="tab-pane fade in active" id="one">
			  			<label>
							<b>Company id : </b><?php echo $company['basic_details']['id']; ?>
						</label>
						<br />
						<label>
							<b>Joined on : </b><?php echo $company['basic_details']['registered_dateandtime']; ?>
						</label>
						<br />
						<label>
							<b>Description : </b><?php echo $company['basic_details']['description']; ?>
						</label>
			  		</div>
			 	<!--end basic info-->
			 	
			 	<!--start delivery info -->
			  		<div class="tab-pane fade  " id="two">
			  			<div class="col-md-6 pull-left">
			  				<div class=" text-left">
			  					Contact numbers
			  				</div>
			  				<hr />
				  			<?php foreach ($company['contact_details'] as $value) {?>
				  				<label>
									<b><?php echo $value['identity_name'];?> : </b><?php echo $value['contact_number']; ?>
								</label>
								<br />
							<?php } ?>
						</div>
						<div class="col-md-6 pull-right">
							<div class=" text-left">
			  					Email addresses
			  				</div>
			  				<hr />
				  			<?php foreach ($company['email_details'] as $value) {?>
				  				<label>
									<b><?php echo $value['identity_name'];?> : </b><?php echo $value['email']; ?>
								</label>
								<br />
							<?php } ?>
						</div>
			  		</div>
			 	<!--end delivery info-->
			 	
			 	<!--start contactinfo -->
			  		<div class="tab-pane fade  " id="three">
			  			<?php foreach ($company['address_details'] as $value) {?>
			  				<address>
								<strong>
								<?php echo $value['identity_name'].' :';?>
								</strong><br>
								<?php echo $company['basic_details']['company_name'].','; ?><br>
							  	<?php echo $value['address_line_1'].',';?><br>
							  	<?php echo $value['address_line_2'].'.';?><br>
							</address>
							<br />
							<br />
						<?php } ?>
			  		</div>
			 	<!--end contactinfo-->
			 	</div>
			 	<!-- Start tab panes -->
		</div>
	</div>
	.

</div>
