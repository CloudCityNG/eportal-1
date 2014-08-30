<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Contributers			 			
		</div>
		<hr />
		
		
			<table class="table table-bordered">
				<thead>
						<td><b>ID</b></td>
						<td><b>Username</b></td>
						<td><b>Email address</b></td>
						<td><b>Name</b></td>
						<td><b>Activation type</b></td>
						<td><b>Registered on</b></td>
						<td><b>Last updated on</b></td>
				</thead>
				<tbody>
					<?php foreach($contributers as $info){?>
						<tr>
							<td><?php echo $info['id']?></td>
							<td><?php echo $info['username']?></td>
							<td><?php echo $info['email']?></td>
							<td><?php echo $info['name']?></td>
							<td><?php echo $info['activation_type']?></td>
							<td><?php echo $info['registered_on']?></td>
							<td><?php echo $info['last_updated_on']?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tr></tr>
			</table>
		
	</div>
	.

</div>

