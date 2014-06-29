<script type="text/javascript">
		 $(document).ready(function() { 

                
               
              $("#country").click(function(){ 
                	$("#country").change();
				});
				$("#country").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getProvinces",    
                    data: {couid: <?php if($cou==null){
					$result=$this->advertisements->getconfigcountry(base_url());
					$id;
					foreach($result as $key)
					{

						$id=$key->id;
					}
					}
					else
					{
						$id=$cou;
					}
					echo $id;
                    ?>},
                    type: "POST",
                    success: function(data){
                        $("#province").html(data);
                        alert('country');
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });

				$("#province").click(function(){
					
                	$("#province").change();
				});
				$("#province").change(function(){
                                  
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getDistricts",    
                    data: {couid:<?php if($cou==null){
					$result=$this->advertisements->getconfigcountry(base_url());
					$name;
					$flag;
					$id;
					foreach($result as $key)
					{
						
						$id=$key->id;
					}
					}
					else
					{
						$id=$cou;
					}
					echo $id;
                    ?>,proid: $(this).val()},
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
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 breadcrumb img-thumbnail">
			<div class="panel panel-default">
				<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Profile Picture</small>
    		</div>
			  	<div class="panel-body">
			  		<?php
			  			if(isset($status_update_profilepicture) && $status_update_profilepicture=='TURE'){
			  				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Your profile picture has been successfully changed and it has been send to administration for approval process</div>'; 
			  			} 
						if(isset($upldPrfPicErr)){
								echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$upldPrfPicErr.'</div>';
							}
			  		?>
			  		
			  		<div class="col-md-6 pull-left">
			  			<?php
			  				if(isset($p_prfilepicture)){
			  					echo '<img width="250" src="'.base_url().'images/prifilepictures/'.$p_prfilepicture.'" class="img-thumbnail pull-left profile-picture"/>';
			  				}else{
			  					echo '<img width="250" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-thumbnail pull-left profile-picture"/>';
							}							
			  			?>
			  		</div>
			  		<div class="col-md-6 pull-right">
				  		<?php
							$formattributes = array('class' => 'form-horizontal', 'role' => 'form', 'enctype'=>'multipart/form-data' );
							echo form_open('profile/update_profilepicture/',$formattributes);
						?>
						<div class="form-group">
				      			<?php
									$profilepictureattributes = array('class' => 'form-control','name'=>'userfile','size'=>'60');
				      				echo form_upload($profilepictureattributes);
									if(isset($uploadStatus)){
										echo '<div class="alert alert-danger">';
										print_r($uploadStatus);
										echo '</div>';
									}
				      			?>
				    		</div>
				  		<br />
				  		<br />
				  		<?php
		      				$updatebtnattributes = array('class' => 'btn btn-primary pull-right','name'=>'update_submit','value'=>'Upload Profile Picture');
							echo form_submit($updatebtnattributes);
		      			
		      				echo form_close();
				  		?>
				  		</div>
			  		</div>
			  		</div>
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  		
			  	<div class="panel panel-default">
			  		<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Basic Details</small>
    		</div>
    				<div class="panel-body"> 
    					<?php
			  			if(isset($status_update_basicdetails) && $status_update_basicdetails=='TURE'){
			  				echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Your basic details has been successfully changed and it has been send to administration for approval process</div>'; 
			  			} 
			  			?>
						<?php
							$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
							echo form_open('profile/update_basicdetails/',$formattributes);
						?>
			  		<div class="form-group">
			    		<label for="inputUsername" class="col-sm-3 control-label">User Name &nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
			      				echo '<p class="form-control-static"><span class="glyphicon glyphicon-lock"></span> '.$p_username.'</p>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<label for="inputEmail" class="col-sm-3 control-label">Email Address &nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
								echo '<p class="form-control-static"><span class="glyphicon glyphicon-lock"></span> '.$p_email.'</p>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<?php if($p_usertype=='b'){?>
							<div id="businessuserPan">
					  			<div class="form-group">
						    		<label for="inputbusinessName" class="col-sm-3 control-label">Business Name &nbsp;&nbsp;</label>
						    		<div class="col-sm-7">
						      			<?php
											$bnameattributes = array('class' => 'form-control','name'=>'bname','value'=>$p_name);
						      				echo form_input($bnameattributes);
											if(form_error('bname')!=null)
												echo '<div class="alert alert-danger">'.form_error('bname').'</div>';
						      			?>
						    		</div>
						  		</div>
						  	</div>
						  	<br />
					  	<?php } ?>
					  		
			  		<?php if($p_usertype=='n' || $p_usertype=='a'){
						$p_name = explode(" ", $p_name);
			  			?>
			  		<div id="normaluserPan">
					<div class="form-group">
			    		<label for="inputFirstName" class="col-sm-3 control-label">First Name &nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
								$fnameattributes = array('class' => 'form-control','name'=>'fname','value'=>$p_name[0]);
			      				echo form_input($fnameattributes);
								if(form_error('fname')!=null)
									echo '<div class="alert alert-danger">'.form_error('fname').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<label for="inputLastName" class="col-sm-3 control-label">Last Name &nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$lnameattributes = array('class' => 'form-control','name'=>'lname','value'=>$p_name[1]);
			      				echo form_input($lnameattributes);
								if(form_error('lname')!=null)
									echo '<div class="alert alert-danger">'.form_error('lname').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		</div>
			  		<br />
			  		<?php } ?>
			  		<div class="form-group">
			    		<div class="col-sm-offset-7 col-sm-3">
			      			<?php
			      				$updatebtnattributes = array('class' => 'btn btn-primary pull-right','name'=>'update_profile_submit','value'=>'Update');
								echo form_submit($updatebtnattributes);
			      			?>
			    		</div>
			  		</div>
			  		
			  		<?php
			  			echo form_close();
			  		?>
			  		</div>
			  	</div>
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	<div class="panel panel-default">
			  		<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Profile Details</small>
    		</div>
    				<div class="panel-body"> 
    					<?php
			  			if(isset($status_update_profiledetails) && $status_update_profiledetails=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Your profile details has been successfully changed and it has been send to administration for approval process</div>'; 
			  			} 
			  			?>
						<?php
							$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
							echo form_open('profile/update_profiledetails/',$formattributes);
						?>
			  		<div class="form-group">
			    		<label for="inputUsername" class="col-sm-3 control-label">Description&nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
			      			
			      				$descriptionattributes = array('class' => 'form-horizontal', 'role' => 'form','name'=> 'description','value'=> $p_description,'rows'=> '5','cols'=> '10','style'=> 'width:100%');
								echo form_textarea($descriptionattributes,$this->input->post('lname'));
								if(form_error('description')!=null)
									echo '<div class="alert alert-danger">'.form_error('description').'</div>';
			      			
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<label for="inputEmail" class="col-sm-3 control-label">Telemarketers &nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<label for="yes" class="control-label">
								<?php
								$yesattributes = array('id'=>'yes','name'=>'telem','value'=>1);
			      				echo form_radio($yesattributes);
							?>&nbsp;&nbsp;Yes, I want to be contacted by telemarketers&nbsp;&nbsp;</label>
			      		<label for="no" class="control-label">
			      			
								<?php
								$noattributes = array('id'=>'no','name'=>'telem','value'=>0);
			      				echo form_radio($noattributes);
							?>&nbsp;&nbsp;No, I don't want to be contacted by telemarketers&nbsp;&nbsp;</label>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<div class="col-sm-offset-7 col-sm-3">
			      			<?php
			      				$updatebtnattributes = array('class' => 'btn btn-primary pull-right','name'=>'update_profile_submit','value'=>'Update');
								echo form_submit($updatebtnattributes);
			      			?>
			    		</div>
			  		</div>
			  		<?php
			  			echo form_close();
			  		?>
			  		</div>
			  	</div>
			  	
<?php if($p_telemarketer==1){?>
	<script type="text/javascript">
		window.onload = function() {
	 		//$("yes").attr("checked","checked");
	 		$("#yes").prop("checked", true);
 		};
 	</script>
<?php } ?>

<?php if($p_telemarketer==0){?>
	<script type="text/javascript">
		window.onload = function() {
	 		//$("yes").attr("checked","checked");
	 		$("#no").prop("checked", true);
 		};
 	</script>
<?php } ?>

			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	<div class="panel panel-default">
			  	<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Contact Details</small>
 				</div>
			  	<div class="panel-body">
			  		<div class="col-md-12">
			  		<?php
			  			if(isset($status_update_address) && $status_update_address=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Your Address has been successfully changed and it has been send to administration for approval process</div>'; 
			  			} 
			  		?>
			  		<?php
					$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
					echo form_open('profile/update_contact_details/',$formattributes);
					?>
					   		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$this->load->model('advertisements');
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
					if($cou==null){
					$result=$this->advertisements->getconfigcountry(base_url());
					$name;
					$flag;
					$id;
					foreach($result as $key)
					{
						$name=$key->name;
						$flag=$key->alpha_2;
						$id=$key->id;
					}
					}
					else
					{
						$id=$cou;
						$name=$this->advertisements->getusercountryname($id);
						$flag=$this->advertisements->getalpha_2($id);
					}
					echo '<input type="hidden" name="country" value="'.$id.'">';
      				echo '<p class="form-control-static"><img id="flag" src="'.base_url().'images/countries/'.$flag.'.png"></img>'.$name;
					      			?></p>
    		</div>
  		</div>
  		<br />
  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Province &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
				//	$fnameattributes = array('class' => 'form-control','name'=>'province');
					$this->load->model('advertisements');
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
					$result=$this->advertisements->getconfigcountry(base_url());
					$id;
					
					foreach($result as $key)
					{
						$id=$key->name;
						
					}
					$result1=$this->advertisements->getProvinces($id);
					foreach($result1 as $key1)
					{
						$province[$key1->id]=$key1->name;
						
					}
					if($pro==null)
					{
						$pro=0;
					}
					
      				echo form_dropdown('province',$province,$pro,'id="province"');
					if(form_error('province')!=null)
						echo '<div class="alert alert-danger">'.form_error('province').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">District &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'district');
      				echo form_dropdown('district',$district,$dis,'id="district"');
					if(form_error('district')!=null)
						echo '<div class="alert alert-danger">'.form_error('district').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
					<div class="form-group">
			    		<label for="inputPassword" class="col-sm-3 control-label">Address Line 1</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$addline1attributes = array('class' => 'form-control','value'=> $p_add_ln_1,'name'=>'addline1');
			      				echo form_input($addline1attributes);
								if(form_error('addline1')!=null)
									echo '<div class="alert alert-danger">'.form_error('addline1').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<label for="inputPassword" class="col-sm-3 control-label">Address Line 2</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$addline2attributes = array('class' => 'form-control','value'=> $p_add_ln_2,'name'=>'addline2');
			      				echo form_input($addline2attributes);
								if(form_error('addline2')!=null)
									echo '<div class="alert alert-danger">'.form_error('addline2').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />			  		
			  		<div class="form-group">
			    		<label for="inputConfirmPassword" class="col-sm-3 control-label">Address Line 3</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$addline3attributes = array('class' => 'form-control','value'=> $p_add_ln_1,'name'=>'addline3');
			      				echo form_input($addline3attributes);
								if(form_error('addline3')!=null)
									echo '<div class="alert alert-danger">'.form_error('addline3').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<div class="form-group">
			    		<label class="col-sm-3 control-label">Contact number</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$contactnumberattributes = array('class' => 'form-control','value'=> $p_cn,'name'=>'contactnumber');
			      				echo form_input($contactnumberattributes);
								if(form_error('contactnumber')!=null)
									echo '<div class="alert alert-danger">'.form_error('contactnumber').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
					<div class="form-group">
			    		<div class="col-sm-offset-7 col-sm-3">
			      			<?php
			      				$updatebtnattributes = array('class' => 'btn btn-primary pull-right','name'=>'update_profile_submit','value'=>'Update');
								echo form_submit($updatebtnattributes);
			      			?>
			    		</div>
			  		</div>
			  		
					<?php echo form_close();?>
					</div>
			  		</div>
			  	</div>
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	
			  	<div class="panel panel-default">
			  	<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Reset Password</small>
    		</div>
			  	<div class="panel-body">
			  		<?php
			  			if(isset($status_update_password) && $status_update_password=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Your password has been successfully changed and it has been send to administration for approval process</div>'; 
			  			} 
			  		?>
			  		<?php
					$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
					echo form_open('profile/update_password/',$formattributes);
					?>
					<div class="form-group">
			    		<label for="inputPassword" class="col-sm-3 control-label">Password&nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$passwordattributes = array('class' => 'form-control','name'=>'password');
			      				echo form_password($passwordattributes);
								if(form_error('password')!=null)
									echo '<div class="alert alert-danger">'.form_error('password').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
			  		<br />
			  		<div class="form-group">
			    		<label for="inputPassword" class="col-sm-3 control-label">New Password</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$newpasswordattributes = array('class' => 'form-control','name'=>'newpassword');
			      				echo form_password($newpasswordattributes);
								if(form_error('newpassword')!=null)
									echo '<div class="alert alert-danger">'.form_error('newpassword').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />			  		
			  		<div class="form-group">
			    		<label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm New Password&nbsp;&nbsp;</label>
			    		<div class="col-sm-7">
			      			<?php
			      				$confirmpasswordattributes = array('class' => 'form-control','name'=>'newconfirmpassword');
			      				echo form_password($confirmpasswordattributes);
								if(form_error('newconfirmpassword')!=null)
									echo '<div class="alert alert-danger">'.form_error('newconfirmpassword').'</div>';
			      			?>
			    		</div>
			  		</div>
			  		<br />
					<div class="form-group">
			    		<div class="col-sm-offset-7 col-sm-3">
			      			<?php
			      				$updatebtnattributes = array('class' => 'btn btn-primary pull-right','name'=>'update_profile_submit','value'=>'Update');
								echo form_submit($updatebtnattributes);
			      			?>
			    		</div>
			  		</div>
			  		
					<?php echo form_close();?>
			  		</div>
			  	</div>
			 	</div>
			 </div>
		</div>
	</div>