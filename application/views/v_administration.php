<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="dashLink"><a href="">Advertisement Management</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/new_ads'?>">New Advertisements</a></li>

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
<div class="container col-md-offset-2">

</div>