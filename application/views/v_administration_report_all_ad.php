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
        	<li class="sub-link dashLink"><a href="<?php echo base_url().'rules/approvebyrating'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Whitelist Blacklist Handling</a></li>          
        </ul>
</div>
<div class="col-md-10 col-md-offset-2 ">
<div class="">
	<table class="table table-striped ">
 		<table class="table table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Body</th>

          <th>Category</th>
          <th>Subcategory</th>
          <th>District</th>
          <th>Province</th>
          <th>Featured</th>
          <th>Created On</th>
          <th>Expires On</th>
          
          <th>User</th>
          <th>Price</th>
          
        </tr>
      </thead>
      
      <tbody>
      	<?php foreach($ads as $details){?>
        <tr>
        <td style="max-width: 210px;"><?php echo $details->title;?></td>
        <td style="max-width: 210px;"><?php echo $details->body;?></td>

        <td style="max-width: 210px;"><?php echo $details->name;?></td>

        <td style="max-width: 210px;">
        	<?php 
          		if($details->subcategoryid==0){
          				echo("No Subcategory");
					}else{
						$this->db->where('id',$details->subcategoryid);
						$result=$this->db->get('subcategory')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          	</td>
          	
          <td style="max-width: 210px;">
          	<?php 
          		if($details->districtid==0){
          				echo("No District");
					}else{
						$this->db->where('id',$details->districtid);
						$result=$this->db->get('district')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          </td>
          <td style="max-width: 210px;">
          	<?php 
          		if($details->provinceid==0){
          				echo("No Province");
					}else{
						$this->db->where('id',$details->provinceid);
						$result=$this->db->get('province')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          </td>
          <td style="max-width: 210px;">
          	<?php 
          		if($details->featured==1){
          				echo("Yes");
					}else{
						echo("No");
					}          	
          	?>
          </td>
          <td style="max-width: 210px;"><?php echo $details->createdate;?></td>
          <td style="max-width: 210px;"><?php echo $details->duration;?></td>
          <td style="max-width: 210px;"><?php echo $details->username;?></td>
          <td style="max-width: 240px;"><?php echo $details->price;?></td>
          
        </tr>
        <?php } ?>
      </tbody>
    </table>
	</table>
</div>
</div>