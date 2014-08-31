<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<script type="text/javascript">
		 $(document).ready(function() { 
                $("#province").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>delivery/get_district",    
                    data: {proid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#district").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
			    
             });
             </script>
             
             <script type="text/javascript">
             	$("body").on("click",".btnMakeRequest",function () {
			    	$("#modal-company-details").html('<div class="h3 text-center">'+$("#com-" + $(this).attr('id')).text()+'</div>');
			    	$("#company-id").val($(this).attr('id'));
			    });
             </script>
             
             <script type="text/javascript">
                $(document).ready(function() { 
				    $( "#datepicker" ).datepicker({ minDate: "+3D", maxDate: "+1Y" });
				    $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
				 });
             </script>


<div class="container breadcrumb-white" style="border: 1px solid #CCCCCC">
	<div class="h3" style="margin-left: 30px">
		Filter delivery companies
	</div>
	<hr />
	<div class="col-md-12">
		<div class="col-md-4">
			<label for="company_name">Delivery company</label>
			<input id="company_name" type="text" class="form-control" />
		</div>
		<?php
			$formattributes = array('class' => '', 'role' => 'form');
			echo form_open('kkk/llll',$formattributes);
		?>
		<div class="col-md-4">
			<label for="delivery_province">Delivery province</label>
		<?php
			echo form_dropdown('province',$province,0,'id="province" class="form-control"');
		?>
		</div>
		<div class="col-md-4">
			<label for="delivery_district">Delivery district</label>
			<?php
				echo form_dropdown('district',$district,0,'id="district" class="form-control"');
			?>
		</div>
		<?php
  			echo form_close();
  		?>
	</div>
	<div class="col-md-12">
		<a class="btn btn-link" onclick=""> Show advance filtering</a>
	</div>
	<div class="col-md-12">
		<a class="btn btn-success pull-right">Filter search</a>
	</div>
</div>
<?php echo validation_errors(); ?>
<div class="container breadcrumb-white" style="border: 1px solid #CCCCCC">
	<div class="h3"	style="margin-left: 30px">
		Delivery companies
	</div>
	<hr />
	<?php foreach($delivery_company as $key=>$record){?>
		<div class="row" >
			<div class="col-md-12">
				<div class="pull-left">
					<?php if($record['profile_picture'] != null){?>
						<img width="75px" style="max-height: 280px" src="<?php echo base_url().'images/delivery_profile_pictures/'.$record['profile_picture'] ?>" />
					<?php }else{?>
						<img width="75px" style="max-height: 280px" src="<?php echo base_url().'images/delivery_profile_pictures/default.jpg' ?>" />
					<?php }?>
				</div>
				<div class="pull-left h3" style="margin-left: 25px; margin-top: 0px;">
					<a id="com-<?php echo $record['id']; ?>" action="_blank" href="<?php echo base_url().'company/'.$record['id'] ?>">
						<?php 
							echo $record['company_name'];
						?>
					</a>
				</div>
				<br /><br />
				<div class="pull-left" style="margin-left: 25px; margin-top: 0px;">
					<?php 
						echo $record['description'];
					?>
				</div>
				<div class="pull-right">
					<a data-toggle="modal" class="btn btn-primary btnMakeRequest" href="#myModal" id="<?php echo $record['id'] ?>">
					<!--
					<a data-toggle="modal" href="#myModal" class="btn btn-primary" class="btn-make-request" id="<?php echo $record['id'] ?>">
						-->
						Make request
					</a>
				</div>
			</div>
		</div>
		<hr />
	<?php } ?>
</div>

<div class="modal" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a herf="#" class="btn pull-right pull-up" data-dismiss="modal"> X </a></h4>
				<div id="modal-company-details">
					
				</div>
			</div>
			<?php
				$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
				echo form_open('delivery/make_request',$formattributes);
			?>
			<div class="modal-body">
				<input name="companyID" type="hidden" id="company-id" />
				<br />
				<label for="item-id">Item id</label>
				<input name="itemID" id="item-id" type="text" class="form-control" />
				<br />
				<label for="datepicker">Delivery date</label>
				<input id="datepicker" type="text" name="datepicker" class="form-control" />
				<br />
				<label for="delivery-location">Delivery location</label>
				<!--<input name="location" id="delivery-location" type="" class="form-control"  style="height: 200px"/>-->	
				<br />
				<textarea name="location" id="delivery-location" class="form-control" rows="10"></textarea>
				<!--<a class="btn btn-primary pull-right" href=""> send request </a>-->
			</div>
			<div class="modal-footer">
				<?php
					$reportattributes = array('class' => 'btn btn-primary pull-right','name'=>'report_submit','value'=>'Send request');
					echo form_submit($reportattributes);
				?>
			</div>
			<?php
				echo form_close();
			?>
		</div>	
	</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				<?php
				/*	$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
					echo form_open('profile/report/',$formattributes);*/
				?>
				</div>
				</div>
				<div class="modal-footer">
					<?php
	      				$reportattributes = array('class' => 'btn btn-primary','name'=>'report_submit','value'=>'Submit Report');
						echo form_submit($reportattributes);
	      			?>
				</div>
				
				<?php/*
					echo form_close();
				 
				 */
				?>
			</div>
	</div>