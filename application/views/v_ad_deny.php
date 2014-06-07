<div class="container">
	<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
	
	    
	<div class="panel-body"> 

		<h4 class="text-left"> Choose the fields with errors</h5>
		
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('rules/send_denial_email',$formattributes);
	?>
	
	<div class="form-group">						
		<div class="col-sm-7">
	    	<?php
				$bodycheckattributes = array('name'=>'body','value'=>'1');
				echo form_checkbox($bodycheckattributes);
	    		?>&nbsp;&nbsp;Title&nbsp;&nbsp;</label><br/>
	    </div>
    </div>
	
	<div class="form-group">		
		<div class="col-sm-7">
	    	<?php
				$titlecheckattributes = array('name'=>'title','value'=>'1');
				echo form_checkbox($titlecheckattributes);
	    		?>&nbsp;&nbsp;Body&nbsp;&nbsp;</label><br/>
	    		
	    </div>
	</div> 		
	
    <div class="form-group">		
		<div class="col-sm-7">
	    	<?php
				$catcheckattributes = array('name'=>'category','value'=>'1');
				echo form_checkbox($catcheckattributes);
	    		?>&nbsp;&nbsp;Category&nbsp;&nbsp;</label><br/>
	    		
	    </div>
	</div> 	
    
    <div class="form-group">		
		<div class="col-sm-7">
	    	<?php
				$subcatcheckattributes = array('name'=>'subcategory','value'=>'1');
				echo form_checkbox($subcatcheckattributes);
	    		?>&nbsp;&nbsp;Sub Category&nbsp;&nbsp;</label><br/>
	    		
	    </div>
	</div> 	
    
    <div class="form-group">
		<div class="col-sm-7">
	    	<?php
				$addcheckattributes = array('name'=>'address','value'=>'1');
				echo form_checkbox($addcheckattributes);
	    		?>&nbsp;&nbsp;Address&nbsp;&nbsp;</label>
	 	</div>
	</div>
 
 	<div class="form-group">						
		<div class="col-sm-7">
	    	<?php
				$telcheckattributes = array('name'=>'tel','value'=>'1');
				echo form_checkbox($telcheckattributes);
	    		?>&nbsp;&nbsp;Telephone&nbsp;&nbsp;</label><br/>
	    </div>
    </div>
    
    <div class="form-group">						
		<div class="col-sm-7">
	    	<?php
				$imgcheckattributes = array('name'=>'img','value'=>'1');
				echo form_checkbox($imgcheckattributes);
	    		?>&nbsp;&nbsp;Image&nbsp;&nbsp;</label><br/>
	    </div>
    </div>
 
 	


		   	
      	<div class="col-sm-offset-6 col-sm-5">
      			<?php
      				$emailbtnattributes = array('class' => 'btn btn-default','name'=>'sendemail','value'=>'sendemail','type'=>'submit', 'content'=>'Send Email');
      				echo form_submit($emailbtnattributes);
      			?>
      	</div>
	</div>
</div>
</div>
</div>