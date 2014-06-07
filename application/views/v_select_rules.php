<div class="container">
	
	<h4 class="text-left"> Choose the fields needed to be checked</h5>
		
	<?php
		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('rules/new_ads',$formattributes);
	?>
	
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
				$bodycheckattributes = array('name'=>'body','value'=>'1');
				echo form_checkbox($bodycheckattributes);
	    		?>&nbsp;&nbsp;Title&nbsp;&nbsp;</label><br/>
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
 
 	<div class="form-group">
    	<div class="col-sm-offset-3 col-sm-5">
      			<?php
      				$acceptbtnattributes = array('class' => 'btn btn-primary','name'=>'continue','value'=>'Continue');
					echo form_submit($acceptbtnattributes);
      			?>
    	</div>
	</div>
 
 <?php
  			echo form_close();
 ?>
</div>	
	
	
	
	
	