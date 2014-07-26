<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>">Design Configuration</a></li>
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-md-7 col-md-offset-3 breadcrumb img-thumbnail">
	<div class="h2 text-center">
		Logo configuration
	</div>
	<div class="col-md-12 breadcrumb-white img-thumbnail">
		<div class="h3">
			Select an image
		</div>
		<div>
			<?php
				$formattributes = array('class' => 'form-horizontal', 'role' => 'form', 'enctype'=>'multipart/form-data' );
				echo form_open('administration/logo_configuration_update/',$formattributes);
			?>
			
			<?php
				$profilepictureattributes = array('class' => 'form-control','name'=>'userfile','size'=>'60');
				 echo form_upload($profilepictureattributes);
			?>
			<br />
			<br />
			<?php
				$submit = array('class' => 'btn btn-primary pull-right','name'=>'logo_submit ','value'=>'Update logo');
				echo '<div class="col-md-12">'.form_submit($submit).'</div>';
  				
  				echo form_close();
  			?>
		</div>
		<br />
		<hr />
	</div>
	<?php
		if(isset($message)){
			echo "$message";
		}
		if(isset($uploadErr)){
			echo "$uploadErr";
		}
	?>
</div>