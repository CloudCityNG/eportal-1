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
             });
             </script>
<div class="container">
	
	<div class="row">
		<div class="col-md-12 breadcrumb-white img-thumbnail" style="padding-bottom: 20px;">
			<?php
					$formattributes = array('class' => '', 'role' => 'form');
					echo form_open('subscribe/new_subcription',$formattributes);
				?>
			<div class="col-md-4">
				<label for="category">Category</label>
				<?php
				echo form_dropdown('category',$category,0,'id="category" class="form-control"');
				?>
			</div>
			<div class="col-md-4">
				<label for="subcategory">Sub-category</label>
				<?php
				echo form_dropdown('subcategory',$subcategory,0,'id="subcategory" class="form-control"');
				?>
			</div>
			<div class="col-md-2 pull-right">
				<br />
				<?php
      				$registerbtnattributes = array('class' => 'btn btn-success pull-right','name'=>'register_submit','value'=>'Subscribe');
					echo form_submit($registerbtnattributes);
      			?>
			</div>
			<?php
  			echo form_close();
  		?>
  		
		</div>
	</div>
	<?php if(isset($message)){?>
	<div class="row">
		<div class="alert alert-info" role="alert">
			<?php echo $message;?>
		</div>
		</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-12 breadcrumb-white img-thumbnail">
			<?php if($subcription_details!=NULL){?>
			<table class="table table-hover table-striped">
		      <thead>
		        <tr>
		          <th>Category</th>
		          <th>Subcategory</th>
		          <th>Subscribed on</th>
		          <th></th>
		        </tr>
		      </thead>
		      <tbody>
		      	<?php foreach($subcription_details as $key=>$value){?>
		        <tr>
		          <td ><?php echo $value->ct;?></td>
		          <td ><?php echo $value->subcat;?></td>
		          <td ><?php echo $value->dateandtime;?></td>
		          <td style="width: 10px;"><a class="btn btn-danger pull-right" href="<?php echo base_url().'subscribe/remove/'.$value->id;?>">Unsubcribe</a></td>
		        </tr>
		        <?php } ?>
		      </tbody>
	    </table>
	    <?php }else{ ?>
	    	You currently have no subcriptions available. Try adding some categories for Ad-Email Notifier.
	    <?php } ?>
		</div>
	</div>
</div>