<div class="container">
	<div class="col-md-7 col-md-offset-2">
		
		<script type="text/javascript">
		 $(document).ready(function() { 

                
                $("#category").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getSubCategories",    
                    data: {subcatid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#subcategory").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
                $("#country").click(function(){ 
                	$("#country").change();
				});
				$("#country").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getProvinces",    
                    data: {couid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#province").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
                $("#category").click(function(){ 
                	$("#category").change();
				});
				$("#province").click(function(){ 
                	$("#province").change();
				});
				$("#province").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getDistricts",    
                    data: {couid:$("#country").val(),proid: $(this).val()},
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

/*$(document).ready(function() {
    $('input:button[name=advertisment_submit]').onclick(function() {
        
          $("#data").hide();
 			$("#upload").show();
          });
        $('input:button[name=upload_back]').onclick(function() {
        
            $("#upload").hide();
 			$("#data").show();
           });
});*/

</script>
			<?php
			if($success)
			{
				echo '<div class="container">
	<div class="col-md-8">
		<div class="alert alert-success">
			<b>You have successfully Edited the Advertisement.</b>
			your advertisement is sent to admins\'s approval	
			<br />
			Thank you.
			
		</div>
	</div>
</div>';
			}
			?>
		<div class="panel panel-default " <?php if($success){echo 'style="display:none ;"';}?>>

			<div class="panel-heading">
    			<center><h3 class="panel-title"><strong>View Advertisement</strong></h3></center>
    		</div>
    			<?php
		//$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		//echo form_open('advertisement/createAd',$formattributes);
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open_multipart('rules/editAd/'.$ad_id,$formattributes);
	?>
    <div id="data" class="panel-body" <?php if(isset($state)&&$state=='upload'){echo 'style="display:none ;"';}?>> 
	<input type="hidden" name="state" value="<?php if(isset($state))echo $state;?>">
		<input type="hidden" name="ad_id" value="<?php echo $ad_id;?>">
		<input type="hidden" name="cat" value="<?php echo $cat;?>">
		<input type="hidden" name="subcat" value="<?php echo $subcat;?>">
		<input type="hidden" name="cou" value="<?php echo $cou;?>">
		<input type="hidden" name="pro" value="<?php echo $pro;?>">
		<input type="hidden" name="dis" value="<?php echo $dis;?>">
		
	<div class="form-group">
	
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Title &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'title');
					if(isset($state)){
      				echo form_input($fnameattributes,$this->input->post('title'));
					}
					else{
						echo form_input($fnameattributes,$title1); 
					}
					if(form_error('title')!=null)
						echo '<div class="alert alert-danger">'.form_error('title').'</div>';
      			?>
    		</div>
  		</div>
  		<br />

  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Body &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'body');
					if(isset($state))
					{
						echo form_textarea($fnameattributes,$this->input->post('body'));
					}
					else
					{
						echo form_textarea($fnameattributes,$body);
					}
					if(form_error('body')!=null)
						echo '<div class="alert alert-danger">'.form_error('body').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'category');
					
					
      				echo form_dropdown('category',$category,$cat,'id="category"');
					
					if(form_error('category')!=null)
						echo '<div class="alert alert-danger">'.form_error('catgory').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Sub category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'subcategory');
      				echo form_dropdown('subcategory',$subcategory,$subcat,'id="subcategory"');
					if(form_error('subcategory')!=null)
						echo '<div class="alert alert-danger">'.form_error('subcatgory').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
      				echo form_dropdown('country',$country,$cou,'id="country"');
					if(form_error('country')!=null)
						echo '<div class="alert alert-danger">'.form_error('country').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Province &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
				//	$fnameattributes = array('class' => 'form-control','name'=>'province');
					
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
    		<label for="inputEmail3" class="col-sm-3 control-label">Address &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'address');
					if(isset($state))
					{
						echo form_input($emailattributes,$this->input->post('address'));
					}
					else
					{
						echo form_input($emailattributes,$address);
					}
					if(form_error('address')!=null)
						echo '<div class="alert alert-danger">'.form_error('address').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		 <div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Telephone &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'telephone');
					if(isset($state))
					{
						echo form_input($emailattributes,$this->input->post('telephone'));
					}
					else
					{
						echo form_input($emailattributes,$telephone);
					}
      				
					if(form_error('telephone')!=null)
						echo '<div class="alert alert-danger">'.form_error('telephone').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Price Rs. &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				$emailattributes = array('class' => 'form-control','name'=>'price');
					if(isset($state))
					{
						echo form_input($emailattributes,$this->input->post('price'));
					}
					else
					{
						echo form_input($emailattributes,$price);
					}
      				
					if(form_error('price')!=null)
						echo '<div class="alert alert-danger">'.form_error('price').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Email Address &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				echo '<p class="form-control-static"><span class="glyphicon glyphicon-lock"></span> '.$this->session->userdata('email').'</p>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">User Name &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
      				//$usernameattributes = array('class' => 'form-control','name'=>'username','value'=>$this->session->userdata('username'));
      				//echo form_input($usernameattributes,$this->input->post('username'));
					//if(form_error('username')!=null)
						//echo '<div class="alert alert-danger">'.form_error('username').'</div>';
						echo '<p class="form-control-static"><span class="glyphicon glyphicon-lock"></span> '.$this->session->userdata('username').'</p>';
      			?>
    		</div>
  		</div>
  		<br />

  		<br />
  		
  		<div class="form-group">
    		<div class="col-sm-offset-6 col-sm-5">
      			<?php
      				$backbtnattributes = array('class' => 'btn btn-default','name'=>'back','value'=>'Back','type'=>'submit', 'content'=>'Back');
      				echo form_button($backbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$acceptbtnattributes = array('class' => 'btn btn-primary','name'=>'advertisment_accept','value'=>'Accept');
					echo form_submit($acceptbtnattributes);
      			?>
    		</div>
  		</div>

  		
		</div>
	</div>
	
	
	<div id="upload" class="panel-body" <?php if((!isset($state))){echo 'style="display:none ;"';}else if($state=='data'){echo 'style="display:none ;"';}?>> 
	    	<?php 
    	$width=150;
		$height=100;
    	echo '<div class="col-md-10 col-md-offset-1">';
    	if(isset($images)&&count($images)){
    		foreach ($images as $image) {
    			echo '<div class="row">';
				
				echo '<img   src="'.base_url().$image['url'].'" height=\'100\' width=\'150\' class="img-thumbnail" >&nbsp&nbsp';
				
				//echo '</div>';
				//<div class="col-sm-7">
				//echo '<div class="row">';
				echo'<input type="submit" name="'.$image['name'].'" value="Delete" class="btn btn-danger btn-delete"> </div>';
			}
		}
		else{
			echo 'No file found';
		}
		echo '</div>';
    	
    	?>
    	
    	<div class="form-group">

			    		<?php 
    			$Uploadbtnattributes = array('class' => 'btn btn-primary','name'=>'image_submit','value'=>'Upload Picture');
		echo form_submit($Uploadbtnattributes); 
    		?>
    		<div class="col-sm-5">
			    			    		<?php
		$Browsebtnattributes = array('class' => 'form-control','name'=>'userfile');
		echo form_upload($Browsebtnattributes);
			?>

	</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-6 col-sm-5">
			      			<?php
      				$backbtnattributes = array('class' => 'btn btn-default','name'=>'back','value'=>'Back','type'=>'submit', 'content'=>'Back');
      				echo form_button($backbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'Finish_submit','value'=>'Finish');
					echo form_submit($registerbtnattributes);
      			?>
		</div>
	</div>
	

	</div>
	
		<?php
		echo form_close();
	 ?>
	
	
	
	
	</div>
	</div>
</div>