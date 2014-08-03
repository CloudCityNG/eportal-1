<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
          <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
         <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>">Design Configuration</a></li>
          </ul>
</div>

<div class="col-md-8 col-md-offset-3 breadcrumb img-thumbnail">
	<div class="h2 text-center">
		<?php echo $h_type;?>
		<br />
		<small>
			<?php echo $h_get;?>
		</small>
	</div>
	<br />
	<?php if(isset($history)){?>
	<table class="table table-striped table-hover">
      <thead>
        <tr>
          <th class="text-center">User</th>
          <th class="text-center">Original image name</th>
          <th class="text-center">Size(Kilobytes)</th>
          <th class="text-center">Updated on</th>
        </tr>
      </thead>
      
      <tbody>
      	<?php foreach($history as $entry){?>
        <tr>
        <td class="text-center" style="max-width: 210px;">
        	<?php echo $entry->name;?>
        </td>
        <td style="max-width: 210px;">
        	<?php echo $entry->original_name;?>
		</td>
        <td class="text-center" style="max-width: 210px;">
        	<?php echo $entry->size;?>
        </td>
        
        <td class="text-center" style="max-width: 210px;">
        	<?php echo $entry->dateandtime;?>
        </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php }else{ ?>
    	<div class="h2 text-left">
    		No history data was found!
		</div>
    <?php } ?>
</div>