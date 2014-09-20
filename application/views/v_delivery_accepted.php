<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Accepted deliveries
			<br />
			<small> viewing <?php echo $viewing['type'] ?></small>			 			
		</div>
		<hr />
		
		<?php 
			if(isset($status_info)){
				echo '<div class="col-md-12 palette-emerald" style="border: 1px solid #27AE60;color: #FFFFFF;padding:10px 0px 10px 20px;margin-bottom: 15px">';
				echo 'Request successfully '.$status_info['status'].' [request id : '.$status_info['request_id'].']';
				echo '</div>';
			}
		?>
		
		<?php foreach ($accepted_requests as $value) {?>
			<!--print_r($pending_requests);-->
			<div class="col-md-12 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50; margin-bottom: 20px">
				<br />
				<b>
					Accept ID : <?php echo $value['accept_id'];?>
				</b>
				<br />
				Customer : <a target="_blank" href="http://localhost/eportal/profile/<?php echo $value['customer_username'];?>"><?php echo $value['customer_name']; ?></a>
				<br />
				Accepted on : <?php echo $value['accepted_on'];?>
				<br /><br />
				<b>Delivery</b> 
				<div class="col-md-offset-1">
					<table class="table" >
						<tr>
							<td style="border: none;  width:150px">
								Date :
							</td>
							<td style="border: none;">
								<?php echo $value['delivery_on']; ?>
							</td>
						</tr>
						<tr>
							<td style="border: none; width:150px">
								Location :
							</td>
							<td style="border: none;">
								<?php echo $value['delivery_location'];?>
							</td>
						</tr>
					</table>
				</div>
				
				<br />
				<b>Other details</b>
				<div class="col-md-offset-1">
					<table class="table" >
						<tr>
							<td style="border: none;  width:200px">
								Accepted by 
							</td>
							<td style="border: none;"> 
								<?php echo $value['accepted_name']; ?> [<?php echo $value['accepted_username']; ?>]
							</td>
						</tr>
						<tr>
							<td style="border: none;  width:200px">
								Requested on : 
								</td>
							<td style="border: none;"> 
								<?php echo $value['requested_on'];?>
							</td>
						</tr>
						<tr>
							<td style="border: none;width:200px""> 
								Advertisement ID : 
							</td>
							<td style="border: none;"> 
							<?php echo $value['ad_id'];?> <a target="_blank" href="http://localhost/eportal/advertisement/viewAd/<?php echo $value['ad_id'];?>">[view advertisement]</a>
							</td>
						</tr>
					</table>
					
				</div>
				<div class="pull-right">
					<a class="btn btn-danger btn-embossed" href="<?php echo base_url()?>deliveries/accepted/cancel/<?php echo $value['accept_id'];?>"> <span class="fui-cross"></span> Cancel delivery</a>
					<a class="btn btn-success btn-embossed" href="<?php echo base_url()?>deliveries/accepted/delivered/<?php echo $value['accept_id'];?>"> <span class="fui-check"></span> Delivery complete</a>
				</div>
				<br />
				<br />
			</div>
		<?php } ?>
	</div>
	.

</div>
