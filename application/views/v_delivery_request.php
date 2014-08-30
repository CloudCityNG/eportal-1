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


<div class="container breadcrumb-white" style="border: 1px solid #CCCCCC">
	<div class="h3">
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

<div class="container breadcrumb-white" style="border: 1px solid #CCCCCC">
	<div class="h4">
		Companies
	</div>	
	<?php foreach($delivery_company as $record){?>
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<?php if($record['profile_picture'] != null){?>
						<img width="75px" style="max-height: 280px" src="<?php echo base_url().'images/delivery_profile_pictures/'.$record['profile_picture'] ?>" />
					<?php }else{?>
						<img width="75px" style="max-height: 280px" src="<?php echo base_url().'images/delivery_profile_pictures/default.jpg' ?>" />
					<?php }?>
				</div>
				<div class="pull-left h3" style="margin-left: 25px; margin-top: 0px;">
					<a action="_blank" href="<?php echo base_url().'company/'.$record['id'] ?>">
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
					<a data-toggle="modal" href="#myModal" class="btn btn-primary">
						Make request
					</a>
				</div>
			</div>
		</div>
	<?php } ?>
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