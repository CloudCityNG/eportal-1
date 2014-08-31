<div id="page-wrapper">
	<div class="col-md-12">
	<div class="row">
		<div class="col-md-4">
			<div class="palette-alizarin palette breadcrumb">
				<div class="h2">
					<?php
						echo $counts['outdated'];
					?>
				</div>
				<div class="">
					Are out of delivery dates
					<hr />
					<a href="<?php echo base_url().'deliveries/out_of_date'?>" class="pull-right">View all outdated deliveries <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					<br />
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="palette-peter-river palette breadcrumb">
				<div class="h2">
					<?php
						echo $counts['pending'];
					?>
				</div>
				<div class="">
					Pending delivery requests
					<hr />
					<a href="<?php echo base_url().'deliveries/pending'?>" class="pull-right">View all pending requests <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					<br />
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="palette-emerald palette breadcrumb">
				<div class="h2">
					<?php
						echo $counts['today'];
					?>
				</div>
				<div class="">
					Deliveries today
					<hr />
					<a href="<?php echo base_url().'deliveries/accepted'?>" class="pull-right">View all deliveries <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					<br />
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12 " style="margin-top: 40px;">
		<div class="h4">
			Deliveries today
		</div>
		<hr />
		<?php foreach($deliveries_today as $datarow){?>
			<div class="col-md-8 col-md-offset-1 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50; margin-bottom: 25px;">
				<table class="table" >
					<tr>
						<td style="border: none">
							Delivery ID
						</td>
						<td style="border: none">
							<?php echo $datarow['id'] ?>
						</td>
					</tr>
					<tr>
						<td style="border: none">
							Advertisement 
						</td>
						<td style="border: none">
							<?php echo $datarow['ad_id'] ?>
						</td>
					</tr>
					<tr>
						<td style="border: none">
							Customer
						</td>
						<td style="border: none">
							<?php echo $datarow['customer_name'] ?>
						</td>
					</tr>
					<tr>
						<td style="border: none">
							Delivery location
						</td>
						<td style="border: none">
							<?php echo $datarow['delivery_location'] ?>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>
	</div>	
	.	
</div>
