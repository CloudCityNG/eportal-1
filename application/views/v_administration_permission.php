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

        <li class="sub-link dashLink"><a href="<?php echo base_url().'permissions'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Manage Permissions</a></li>  
 

          </ul>
</div>

<div class="col-md-10 col-md-offset-2 ">
<div class="">
	<?php

		$formattributes = array('class' => 'form-horizontal', 'role' => 'form');

		$formattributes = array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'post');

		echo form_open('permissions/index',$formattributes);
	?>
	<table class="table" data-toggle="table" data-url="data1.json" data-height="299" data-click-to-select="true" data-single-select="true">
    <thead>
    <tr>       
        <th data-field="function" data-align="right">Function</th>
        <th data-field="norstate" data-checkbox="true"> Normal User</th>
        <th data-field="busistate" data-checkbox="true"> Business User</th>
        <th data-field="adminstate" data-checkbox="true"> Administrator</th>
        <th data-field="unregstate" data-checkbox="true"> Unregistered User</th>          
    </tr>
    </thead>
    
    <tbody>
      	<?php foreach($func as $details){?>
        <tr>
       
          <td style="max-width: 210px;"><?php echo $details->function;?></td>

          <td> <div class="checkbox">
    			<input type="checkbox" align="center" id="checknor">
			  </div> 
			  </td>
          <td> <div class="checkbox">
    			<input type="checkbox" align="center" id="checkbusi">
			  </div> 
			  </td>
			<td> <div class="checkbox">
    			<input type="checkbox" align="center" id="checkadmin">
			  </div> 
			  </td>
			<td> <div class="checkbox">
    			<input type="checkbox" align="center" id="checkunreg">
			  </div> 

          <td> <?php 
          		if($details->normal==0){
          				echo '<input name="checkbox[][]" value="val1" id="checknor" type="checkbox">';
					}else{
						echo '<input name="checkbox[][]" value="val1" id="checknor" type="checkbox" checked="yes">';
					}          	
          	?> 
			  </td>
          <td> <?php 
          		if($details->business==0){
          				echo '<input name="checkbox[][]" value="val2" id="checkbusi" type="checkbox">';
					}else{
						echo '<input name="checkbox[][]" value="val2" id="checkbusi" type="checkbox" checked="yes">';
					}          	
          	?>  
			  </td>
			<td> <?php 
          		if($details->admin==0){
          				echo '<input name="checkbox[][]" value="val3" id="checkadmin" type="checkbox">';
					}else{
						echo '<input name="checkbox[][]" value="val3" id="checkadmin" type="checkbox" checked="yes">';
					}          	
          	?> 
			  </td>
			<td> <?php 
          		if($details->unregistered==0){
          				echo '<input name="checkbox[][]" value="val4" id="checkunreg" type="checkbox">';
					}else{
						echo '<input name="checkbox[][]" value="val4" id="checkunreg" type="checkbox" checked="yes">';
					}          	
          	?> 

			  </td>
         
        </tr>
        <?php } ?>
      </tbody>
      
	</table>
	<div class="col-sm-offset-6 col-sm-5" style="margin-top: 30px;" >
      			<?php
      				$generatebtnattributes = array('class' => 'btn btn-primary','name'=>'Submit','value'=>'Save');
					echo form_submit($generatebtnattributes);
					echo form_close();
      			?>
		</div>
</div>
</div>

