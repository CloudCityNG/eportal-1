<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
         <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-md-10 col-md-offset-2 ">
	<table class="table table-striped ">
 		<table class="table table-hover">
      <thead>
        <tr>
          <th>Accused user</th>
          <th>Report submited by</th>
          <th>Reported on</th>
          <th>Report type</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($data as $details){?>
        <tr>
          <td style="max-width: 180px;">
          	<?php 
          		echo '<a class="btn-link pull-left" href="'.base_url().'profile/'.$details->accused_username.'">'.$details->accused_name.'</a></p></div>';          	
          	?>
          </td>
           <td style="max-width: 180px;">
          	<?php 
          		echo '<a class="btn-link pull-left" href="'.base_url().'profile/'.$details->reported_username.'">'.$details->reported_name.'</a></p></div>';          	
          	?>
          </td>
          
          <td style="max-width: 180px;"><?php echo $details->reported_on;?></td>
          <td style="max-width: 180px;"><?php echo $details->report_type;?></td>
          <td style="max-width: 180px;"><?php echo $details->description;?></td>
          <td>
          	<a href="<?php echo base_url().'administration/users_reported_resolved/'.$details->rd_id.'/'.$details->ru_id; ?>" class="btn btn-info"> Resolved </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
	</table>
</div>