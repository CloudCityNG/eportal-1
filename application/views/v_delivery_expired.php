<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Outdated deliveries		
		</div>
		<div class="h5 text-center">
			viewing <?php echo $viewing['type'] ?>
		</div>
		<hr />
		
		<?php 
			if(isset($status_info)){
				echo '<div class="col-md-12 palette-emerald" style="border: 1px solid #27AE60;color: #FFFFFF;padding:10px 0px 10px 20px;margin-bottom: 15px">';
				echo 'Status changed as delivered. [id = '.$status_info['confirm_id'].']';
				echo '</div>';
			}
		?>
		
		<?php foreach ($out_of_delivery_date_items as $value) {?>
			<div class="col-md-12 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50; margin-bottom: 20px">
				<br />
				<b>
					Accept ID : <?php echo $value['id'];?>
				</b>
				<br />
				Customer : <a target="_blank" href="http://localhost/eportal/profile/<?php echo $value['customer_username'];?>"><?php echo $value['customer_name']; ?></a>
				<br />
				Accepted on : <?php echo $value['accepted_dateandtime'];?>
				<br /><br />
				<b>Delivery</b> 
				<div class="col-md-offset-1">
					<table class="table" >
						<tr>
							<td style="border: none; width:150px">
								<b>Outdated by :</b>
							</td>
							<td style="border: none;">
								<b><?php echo $value['no_of_dates_expired'];?> Days</b>
							</td>
						</tr>
						<tr>
							<td style="border: none;  width:150px">
								Date
							</td>
							<td style="border: none;">
								<?php echo $value['delivery_dateandtime']; ?>
							</td>
						</tr>
						<tr>
							<td style="border: none; width:150px">
								Location
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
								<?php echo $value['accepted_name']; ?> [ <?php echo $value['accepted_username']; ?> ]
							</td>
						</tr>
						<tr>
							<td style="border: none;  width:200px">
								Requested on 
								</td>
							<td style="border: none;"> 
								<?php echo $value['requested_dateandtime'];?>
							</td>
						</tr>
						<tr>
							<td style="border: none;width:200px""> 
								Advertisement ID 
							</td>
							<td style="border: none;"> 
							<?php echo $value['ad_id'];?> <a target="_blank" href="http://localhost/eportal/advertisement/viewAd/<?php echo $value['ad_id'];?>">[view advertisement]</a>
							</td>
						</tr>
					</table>
					
				</div>
				<div class="pull-right">
					<a class="btn btn-danger btn-embossed" href="<?php echo base_url()?>deliveries/accepted/cancel/"> <span class="fui-cross"></span> Cancel delivery</a>
					<a class="btn btn-success btn-embossed" href="<?php echo base_url()?>deliveries/accepted/delivered/"> <span class="fui-check"></span> Delivery complete</a>
				</div>
				<br />
				<br />
			</div>
		<?php } ?>
	</div>
	.

</div>
