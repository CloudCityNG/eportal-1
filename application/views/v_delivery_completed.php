<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Completed Deliveries
		</div>
		<div class="h6 text-center">
			viewing <?php echo $viewing['type'] ?>
		</div>	
		<hr />
		
		<?php 
			if(isset($status_info)){
				echo '<div class="col-md-12 palette-emerald" style="border: 1px solid #27AE60;color: #FFFFFF;padding:10px 0px 10px 20px;margin-bottom: 15px">';
				echo 'Request successfully '.$status_info['status'].' [request id : '.$status_info['request_id'].']';
				echo '</div>';
			}
		?>
		<?php
			if(isset($delivered_items) && $delivered_items!=null){
		 foreach ($delivered_items as $value) {?>
			<div class="col-md-12 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50; margin-bottom: 25px;">
				<table class="table" style="border: none">
					<tbody>
						<tr>
							<td style="border: none">
								<b>Delivery ID  </b>
							</td>
							<td style="border: none">
								<?php echo $value['delivery_id'] ?> 
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery confirmed by  </b>
							</td>
							<td style="border: none">
								<a href="<?php echo base_url().'profile/'.$value['delivered_username']?>">
								 	<?php echo $value['delivered_name'].' [ '.$value['delivered_username'].' ]' ?>
								 </a>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivered confirmed on  </b>
							</td>
							<td style="border: none">
								<?php echo $value['delivery_dateandtime'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery requested on  </b>
							</td>
							<td style="border: none">
								<?php echo $value['requested_dateandtime'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery accepted on   </b>
							</td>
							<td style="border: none">
								<?php echo $value['accepted_dateandtime'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery accepted by  </b>
							</td>
							<td style="border: none">
								<a href="<?php echo base_url().'profile/'.$value['accepted_username']?>">
									<?php echo $value['accepted_name'].' [ '.$value['accepted_username'].' ]' ?>
								</a>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Customer </b>
							</td>
							<td style="border: none">
								<a href="<?php echo base_url().'profile/'.$value['customer_username']?>">
								<?php echo $value['customer_name'].' [ '.$value['customer_username'].' ]' ?>
								</a>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery on  </b>
							</td>
							<td style="border: none">
								<?php echo $value['delivery_dateandtime'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Delivery location  </b>
							</td>
							<td style="border: none">
								<?php echo $value['delivery_location'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Advertisement ID  </b>
							</td>
							<td style="border: none">
								<?php echo $value['ad_id'] ?>
							</td>
						</tr>
						<tr>
							<td style="border: none">
								<b>Advertisement  </b>
							</td>
							<td style="border: none">
								<a href="<?php base_url().'advertisement/viewAd/'.$value['ad_id']?>">
									<?php echo $value['ad_title'] ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php }
		}else{ ?>
			<div class="col-md-12 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50; margin-bottom: 20px">
				There are no deliveries completed.
			</div>
		<?php }?>
	</div>
	.
</div>
