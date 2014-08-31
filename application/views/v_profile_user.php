<!--
<script type="text/javascript">
		$(document).ready(function() {
		    $('input:radio[name=rt]').change(function() {
		        if (this.value == 'type5') {
		        	$("#reportTypeOtherText").show();
		        }else if(this.value != 'type5'){
		        	$("#reportTypeOtherText").hide();
				}
			});
		});
</script>-->
<script type="text/javascript">
		$(document).ready(function() {
		   $("#reportType1").prop("checked", true);
		});
</script>


<div class="container">
	<div class="row" style="margin-top: 15px;">
		<div class="col-md-4 col-md-offset-1" style="margin-right:-140px;">
		 <?php 
	    	if($p_prfilepicture!=NULL){
	    		echo '<img width="240" src="'.base_url().'images/prifilepictures/'.$p_prfilepicture.'" class="img-thumbnail pull-left profile-picture"/>';
			}else{
				echo '<img width="240" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-thumbnail  pull-left profile-picture"/>';
			}
		?>
		</div>	
		<div class="col-md-7 col-sm-8">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <div class=" col-md-offset-1">
			    	<?php if($p_own==false){?>
			    	<a data-toggle="modal" href="#myModal" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;&nbsp;Report&nbsp;</a><br/>
			    	<?php }?>
			    	<?php if($p_own==true){?>
			    	<a href="<?php echo base_url().'profile/update'?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit&nbsp;</a><br/>
			    	<?php }?>
			   		<div class="text-left h3">
			   			<?php 
				   			if($p_usertype=='n'){
				   				 echo '<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<a class="btn-link" href="'.base_url().'profile/'.$p_username.'">'.$p_name.'</a>'; 
							}else if($p_usertype=='b'){
								 echo '<span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;<a class="btn-link" href="'.base_url().'profile/'.$p_username.'">'.$p_name.'</a>'; 
							}else if($p_usertype=='a'){
								echo '<a class="btn-link" href="'.base_url().'profile/'.$p_username.'">'.$p_name.'</a>&nbsp;<small><label class="label label-primary">administrator</label></small>';
							}
						?>
					</div>
					<br />
					<p class="col-md-offset-1"><?php if(isset($p_email)){ echo '<strong>E-mail : </strong>'.$p_email; }?></p>
					<p class="col-md-offset-1"><?php if(isset($p_description)){ echo '<strong>Description : </strong>'.$p_description; }?></p>
					<p class="col-md-offset-1"><?php 
							if(isset($p_telemarketer) && $p_telemarketer=='1'){
						 		echo '<strong>Telemarketers : </strong> <span class="label label-success">Yes</span>&nbsp;&nbsp;Available for contact'; 
							}else if(isset($p_telemarketer) && $p_telemarketer=='0'){
						 		echo '<strong>Telemarketers : </strong> <span class="label label-success">No</span>&nbsp;&nbsp;I don\'t want to be contacted by telemarketers'; 
							}
						?>
					</p>
					<br />
					<div class="pull-left col-md-offset-1 col-md-6 ">
						<div class="col-md-12">
						<p class=" pull-left"><strong>Address : </strong></p>
						<address class="pull-left" >
						    <?php if(isset($p_add_ln_1)){echo $p_add_ln_1; }?><br>
						  	<?php if(isset($p_add_ln_2)){ echo $p_add_ln_2;}?><br>
						  	<?php if(isset($p_add_ln_3)){ echo $p_add_ln_3;}?><br>
						  	<?php if(isset($p_dis)){ echo $p_dis;}?><br>
							<?php if(isset($p_pro)){ echo $p_pro;}?><br>
							<?php if(isset($p_cou)){ echo $p_cou;}?>
						</address>
						</div>
					</div>
					<div class="pull-right  col-md-5">
						<p class=" pull-left"><strong>Contact number : &nbsp;</strong></p>
						<?php echo $p_cn;?>
						
					</div>
			   	</div>
			   	
			  </div><!--
			  <div class="panel-footer">
			   		<a href="<?php echo base_url().'profile/update'?>" class="btn">Advertisements</a>
			  </div>-->
			</div>
		</div>
	</div>
	
	<div class="modal " id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4><strong>Report user : </strong> <?php echo $p_name ;?><a herf="#" class="btn pull-right pull-up" data-dismiss="modal"> X </a></h4>
				</div>
				<div class="modal-body">
					<h4>Select the type of report</h4>
					<div class="col-md-offset-1">
					<?php
						$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
						echo form_open('profile/report/'.$p_username.'/'.$this->session->userdata('username'),$formattributes);
					?>
					<label for="reportType1" class="control-label">
					<?php
						$rt1 = array('id'=>'reportType1','name'=>'rt','value'=>'type1');
	      				echo form_radio($rt1);
					?>&nbsp;Posting fake advertisemesnts</label>
					<br />
					<label for="reportType2" class="control-label">
					<?php
						$rt2 = array('id'=>'reportType2','name'=>'rt','value'=>'type2');
	      				echo form_radio($rt2);
					?>&nbsp;Posting inappropriate advertisements
					</label>
					<br />
					<label for="reportType3" class="control-label">
					<?php
						$rt3 = array('id'=>'reportType3','name'=>'rt','value'=>'type3');
	      				echo form_radio($rt3);
					?>&nbsp;Posting inappropriate comments
					</label>
					<br />
					<label for="reportType4" class="control-label">
					<?php
						$rt4 = array('id'=>'reportType4','name'=>'rt','value'=>'type4');
	      				echo form_radio($rt4);
					?>&nbsp;Fake profile
					</label>
					<br />
					<label for="reportType5" class="control-label">
					<?php
						$rt5 = array('id'=>'reportType5','name'=>'rt','value'=>'type5');
	      				echo form_radio($rt5);
					?>&nbsp;Other&nbsp;
					</label>
					<br /><br />
					<label for="reportTypeOtherText" class="control-label"> Discribe your situation more : </label>
					<?php
			      			
			      		$rt5 = array('id'=>'reportTypeOtherText','class' => 'form-horizontal', 'role' => 'form','name'=> 'reportOtherDescription','rows'=> '5','cols'=> '10','style'=> 'width:100%');
						echo form_textarea($rt5);
					?>
					</div>
				</div>
				<div class="modal-footer">
					<?php
	      				$reportattributes = array('class' => 'btn btn-primary','name'=>'report_submit','value'=>'Submit Report');
						echo form_submit($reportattributes);
	      			?>
				</div>
				
				<?php
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>