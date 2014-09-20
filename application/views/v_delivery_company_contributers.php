<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Contributors			 			
		</div>
		<hr />
		<div class="col-md-12" style="margin-bottom: 25px;">
			<a href="#" class="btn btn-success btn-embossed pull-right">
				  <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add new contributor
			</a>
		</div>
		<table class="table table-bordered">
			<thead>
					<td><b>ID</b></td>
					<td><b>Username</b></td>
					<td><b>Email address</b></td>
					<td><b>Name</b></td>
					<td><b>Role</b></td>
					<td><b>Added by</b></td>
					<td><b>Added on</b></td>
			</thead>
			<tbody>
				<?php foreach($contributers as $info){?>
					<tr>
						<td><?php echo $info['id']?></td>
						<td><?php echo $info['c_username']?></td>
						<td><?php echo $info['email']?></td>
						<td><a href="<?php echo base_url().'profile/'.$info['c_username'];?>"><?php echo $info['c_name']?></a></td>
						<td><?php echo $info['role']?></td>
						<td><a href="<?php echo base_url().'profile/'.$info['added_by_username'];?>"><?php echo $info['added_by_name']?></a></td>
						<td><?php echo $info['added_on']?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tr></tr>
		</table>
	</div>
	.

</div>

