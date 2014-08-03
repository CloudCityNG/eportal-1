<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;Design Configuration</a></li>
          </ul>
</div>
<div class="col-md-offset-2">


<div class="">
	<div class="col-md-7 col-md-offset-2 breadcrumb img-thumbnail">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			Configure Advertisement Details
		</div>
		<script type="text/javascript">
		 $(document).ready(function() { 
		 $("#country2").click(function(){ 
                	$("#country2").change();
				});
				$("#country2").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getProvinces",    
                    data: {couid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#province2").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
                
                $("#country3").click(function(){ 
                	$("#country3").change();
				});
				$("#country3").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getProvinces",    
                    data: {couid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#province3").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
                 $("#country4").click(function(){ 
                	$("#country4").change();
				});
				$("#country4").change(function(){
                   
                     /*dropdown post */
                  
                  $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getflag",    
                    data: {couid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#flag").attr("src",<?php echo '"'.base_url()."images/countries/".'"';?>+data+<?php echo '".png"'; ?>);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });

                
                $("#province3").click(function(){ 
                	$("#province3").change();
				});
				$("#province3").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getDistricts",    
                    data: {couid:$("#country3").val(),proid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#district1").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
               });
                 $("#category2").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getSubCategories",    
                    data: {subcatid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#subcategory1").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
               
                });
                 $("#category2").click(function(){ 
                	$("#category2").change();
				});
         });
        </script>
        		<div class="panel panel-default">
    			<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Configure Country</small>
    		</div>
    <div class="panel-body"> 
    	<?php
    	    			if(isset($status_set_country) &&$status_set_country=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Country has been saved.
			  				</div>'; 
			  			}
						/*else if(isset($status_update_country) &&$status_update_country=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Country has been updated.
			  				</div>'; 
			  			} */
						?>
    			
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
	<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-8">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
					$this->load->model('advertisements');
					if((!isset($cou4))||$cou4==null){
						$cou4=$this->advertisements->getCountryConfigCountryid(base_url());
							echo '<img id="flag" src="'.base_url().'images/countries/'.$this->advertisements->getalpha_2($cou4).'.png"></img>';
						}
					else{
						echo '<img id="flag" src="'.base_url().'images/countries/'.$this->advertisements->getalpha_2($cou4).'.png"></img>';
						
						}
      				echo form_dropdown('country4',$country,$cou4,'id="country4"');
					echo form_hidden('baseurl',base_url());
					if(form_error('country4')!=null)
						echo '<div class="alert alert-danger">'.form_error('country4').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">

      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'country_config_submit','value'=>'Save Changes');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>
  		
  		
		</div>
    		</div>
	<!--	<div class="panel panel-default">
    			<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Country</small>
    		</div>
    <div class="panel-body"> 
    	<?php
    	    			if(isset($status_new_country) &&$status_new_country=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				New Country has been saved.
			  				</div>'; 
			  			}
						else if(isset($status_update_country) &&$status_update_country=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Country has been updated.
			  				</div>'; 
			  			} 
						?>
    			
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
	<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
      				echo form_dropdown('country1',$country,$cou1);
					if(form_error('country1')!=null)
						echo '<div class="alert alert-danger">'.form_error('country1').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">New Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'country');
      				echo form_input($fnameattributes,$this->input->post('country'));
					if(form_error('country')!=null){
						echo '<div class="alert alert-danger">'.form_error('country').'</div>';
						}else if(isset($error['country']))
						{
							echo '<div class="alert alert-danger">'.$error['country'].'</div>';
						}
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'edit_country','value'=>'Edit');
      				echo form_submit($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'country_submit','value'=>'Create');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>
  		
  		
		</div>
    		</div>
    	-->
    		<div class="panel panel-default">	
    			<div class="h2 text-left breadcrumb" style="padding-left:20px; margin-left: 0px;margin-top: 0px;">
			<small>Province</small>
    		</div>
    		<div class="panel-body">
    			<?php
    			if(isset($status_new_province) &&$status_new_province=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				New Province has been saved.
			  				</div>'; 
			  			}
						else if(isset($status_update_province) &&$status_update_province=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Province has been updated.
			  				</div>'; 
			  			}?> 
    			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
	<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
      				echo form_dropdown('country2',$country,$cou2,'id=country2');
					if(form_error('country2')!=null)
						echo '<div class="alert alert-danger">'.form_error('country2').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Province &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
				//	$fnameattributes = array('class' => 'form-control','name'=>'province');
					
      				echo form_dropdown('province2',$province2,$pro2,'id="province2"');
					if(form_error('province2')!=null)
						echo '<div class="alert alert-danger">'.form_error('province').'</div>';
					

      			?>
    		</div>
  		</div>
  		<br />
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">New Province &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'province');
      				echo form_input($fnameattributes,$this->input->post('province'));
					if(form_error('province')!=null){
						echo '<div class="alert alert-danger">'.form_error('province').'</div>';
					}
					else if(isset($error['province']))
						{
							echo '<div class="alert alert-danger">'.$error['province'].'</div>';
						}
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'edit_province','value'=>'Edit');
      				echo form_submit($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'province_submit','value'=>'Create');
					echo form_submit($registerbtnattributes);
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
			<small>District</small>
    		</div>
    		<div class="panel-body">
    			<?php
			  			if(isset($status_new_district) &&$status_new_district=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				New District has been saved.
			  				</div>'; 
			  			}
						else if(isset($status_update_district) &&$status_update_district=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				District has been updated.
			  				</div>'; 
			  			} 
			  		?>
    			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
	  			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Country &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'country');
      				echo form_dropdown('country3',$country,$cou3,'id="country3"');
					if(form_error('country3')!=null)
						echo '<div class="alert alert-danger">'.form_error('country3').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
	<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Province &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
				//	$fnameattributes = array('class' => 'form-control','name'=>'province');
					
      				echo form_dropdown('province3',$province3,$pro3,'id="province3"');
					if(form_error('province3')!=null)
						echo '<div class="alert alert-danger">'.form_error('province3').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">District &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'district');
      				echo form_dropdown('district1',$district,$dis,'id="district1"');
					if(form_error('district1')!=null)
						echo '<div class="alert alert-danger">'.form_error('district1').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">New District &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'district');
      				echo form_input($fnameattributes,$this->input->post('district'));
					if(form_error('district')!=null)
					{
						echo '<div class="alert alert-danger">'.form_error('district').'</div>';
					}
					else if(isset($error['district']))
					{
							echo '<div class="alert alert-danger">'.$error['district'].'</div>';
					}
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'edit_district','value'=>'Edit');
      				echo form_submit($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'district_submit','value'=>'Create');
					echo form_submit($registerbtnattributes);
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
			<small>Category</small>
    		</div>
    			
    		<div class="panel-body">
    			    			<?php
    			if(isset($status_new_category) &&$status_new_category=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				New Category has been saved.
			  				</div>'; 
			  			}
						else if(isset($status_update_category) &&$status_update_category=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Category has been updated.
			  				</div>'; 
			  			}?> 
    			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
		  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'category');
					
					
      				echo form_dropdown('category1',$category,$cat1);
					
					if(form_error('category1')!=null)
						echo '<div class="alert alert-danger">'.form_error('catgory1').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">New Category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'category');
      				echo form_input($fnameattributes,$this->input->post('category'));
					if(form_error('category')!=null)
					{
						echo '<div class="alert alert-danger">'.form_error('category').'</div>';
					}
					else if(isset($error['category']))
					{
							echo '<div class="alert alert-danger">'.$error['category'].'</div>';
					}
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'edit_category','value'=>'Edit');
      				echo form_submit($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'category_submit','value'=>'Create');
					echo form_submit($registerbtnattributes);
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
			<small>Subcategory</small>
    		</div>
    		<div class="panel-body">
    			  <?php
    			if(isset($status_new_subcategory) &&$status_new_subcategory=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				New subcategory has been saved.
			  				</div>'; 
			  			}
						else if(isset($status_update_subcategory) &&$status_update_subcategory=='TURE'){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Subcategory has been updated.
			  				</div>'; 
			  			}?> 
    			<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administration/configDetails',$formattributes);
	?>
	  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'category');
					
					
      				echo form_dropdown('category2',$category,$cat2,'id="category2"');
					
					if(form_error('category2')!=null)
						echo '<div class="alert alert-danger">'.form_error('category2').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">Sub category &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					//$fnameattributes = array('class' => 'form-control','name'=>'subcategory');
      				echo form_dropdown('subcategory1',$subcategory,$subcat,'id="subcategory1"');
					if(form_error('subcategory1')!=null)
						echo '<div class="alert alert-danger">'.form_error('subcatgory1').'</div>';
      			?>
    		</div>
  		</div>
  		<br />
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-3 control-label">New Subcategory &nbsp;&nbsp;</label>
    		<div class="col-sm-7">
      			<?php
					$fnameattributes = array('class' => 'form-control','name'=>'subcategory');
      				echo form_input($fnameattributes,$this->input->post('subcategory'));
					if(form_error('subcategory')!=null)
					{
						echo '<div class="alert alert-danger">'.form_error('subcategory').'</div>';
					}
					else if(isset($error['subcategory']))
					{
							echo '<div class="alert alert-danger">'.$error['subcategory'].'</div>';
					}
      			?>
    		</div>
  		</div>
  		<br />
  		  		<div class="form-group">
    		<div class="col-sm-offset-8 col-sm-5">
      			<?php
      				$clearbtnattributes = array('class' => 'btn btn-default','name'=>'edit_subcategory','value'=>'Edit');
      				echo form_submit($clearbtnattributes);
      			?>
      			&nbsp;
      			<?php
      				$registerbtnattributes = array('class' => 'btn btn-primary','name'=>'subcategory_submit','value'=>'Create');
					echo form_submit($registerbtnattributes);
      			?>
    		</div>
  		</div>
  		
  		<?php
  			echo form_close();
  		?>
    			
    		 </div>
    		 </div>	 
	</div>
	</div>
</div>
</div>