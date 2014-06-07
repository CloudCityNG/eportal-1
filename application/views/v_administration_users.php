<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="dashLink"><a href="">Advertisement Management</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'administration/user_management'?>">User Management</a></li>

          </ul>
          
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>

          </ul>
          <ul class="nav nav-sidebar ">
            <li class="dashLink"><a href="<?php echo base_url().'rules'?>">Accept Advertisements</a></li>

          </ul>
</div>
<div class="col-md-10 col-md-offset-2 ">
<div class="">
	<table class="table table-striped ">
 		<table class="table table-hover">
      <thead>
        <tr>
          <th></th>
          <th>Profile</th>
          <th>Email</th>
          <th>Username</th>
          <th>Usertype</th>
          <th>Registered On</th>
          <th>Last updated on</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($users as $details){?>
        <tr>
        <td style="max-width: 210px;">
        	<?php 
          		if($details->profilepicture!=NULL){
			    		echo '<img width="35" src="'.base_url().'images/prifilepictures/'.$details->profilepicture.'" class="img-circle pull-right profile-picture"/>';
					}else{
						echo '<img width="35" src="'.base_url().'images/prifilepictures/default_profile.jpg" class="img-circle  pull-right profile-picture"/>';
				}          	
          	?>
        </td>
          <td style="max-width: 210px;">
          	<?php 
          		echo '<a class="btn-link pull-left" href="'.base_url().'profile/'.$details->username.'">'.$details->name.'</a></p></div>';          	
          	?>
          </td>
          <td style="max-width: 210px;"><?php echo $details->email;?></td>
          <td style="max-width: 210px;"><?php echo $details->username;?></td>
          <td style="max-width: 210px;">
          	<?php if($details->usertype=='n'){
          		echo '<span class="label label-success">Normal user</span>';
          	}else if($details->usertype=='b'){
          		echo '<span class="label label-primary">Business user</span>';
          	}else if($details->usertype=='a'){
          		echo '<span class="label label-danger">Administrator</span>';
          	}
          	?>
          </td>
          <td style="max-width: 240px;"><?php echo $details->registered;?></td>
          <td style="max-width: 240px;"><?php echo $details->lastupdate;?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
	</table>
</div>
</div>