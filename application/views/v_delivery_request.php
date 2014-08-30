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
		Ads
	</div>
	
	<hr />
	
	<div class="h4">
		Top rated
	</div>	
</div>