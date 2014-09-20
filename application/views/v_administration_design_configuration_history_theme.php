<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
          <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
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
	<table class=" table table-striped table-hover">
      <thead>
        <tr>
          <th class="text-center">User</th>
          <th class="text-center">Theme</th>
          <th class="text-center">Updated on</th>
        </tr>
      </thead>
      
      <tbody>
      	<?php foreach($history as $entry){?>
        <tr>
        <td class="text-center" style="max-width: 210px;">
        	<?php echo $entry->name;?>
        </td>
        <td class="text-center" style="max-width: 210px;">
        	<?php echo $entry->theme;?>
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