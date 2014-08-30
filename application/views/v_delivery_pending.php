<div id="page-wrapper" style="background-color: #FFFFFF;min-height: 400px;">
	<div class="col-md-12">
		<div class="h3 text-center">
			Pending deliveries
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
		
		<?php foreach ($pending_requests as $value) {?>
			<!--print_r($pending_requests);-->
			<div class="col-md-12 palette-clouds" style="border: 1px solid #BDC3C7;color: #2C3E50">
				<br />
				<b>
					Request ID : <?php echo $value['dp_id'];?>
				</b>
				<br />
				<a target="_blank" href="http://localhost/eportal/profile/<?php echo $value['client_username'];?>"><?php echo $value['client_name']; ?></a>
				<br />
				<?php echo $value['requested_on'];?>
				<br /><br />
				<b>Delivery</b> 
				<div class="col-md-offset-1">
					Date : <?php echo $value['delivery_date']; ?>
					<br />
					Location : <?php echo $value['delivery_location'];?>
				</div>
				
				<br />
				<b>Advertisement</b>
				<div class="col-md-offset-1">
					 ID : <?php echo $value['ad_id']; ?>
					<br />
					Type : <?php echo $value['ad_category'];?> > <?php echo $value['ad_subcategory']; ?>
					<br />
					Details: <a target="_blank" href="http://localhost/eportal/advertisement/viewAd/<?php echo $value['ad_id'];?>"><?php echo $value['ad_title']; ?></a>
					, <?php echo $value['ad_body']; ?>
				</div>
				<div class="pull-right">
					<a class="btn btn-danger btn-embossed" href="<?php echo base_url()?>deliveries/pending/reject/<?php echo $value['dp_id'];?>"> <span class="fui-cross"></span> Reject</a>
					<a class="btn btn-success btn-embossed" href="<?php echo base_url()?>deliveries/pending/accept/<?php echo $value['dp_id'];?>"> <span class="fui-check"></span> Accept</a>
				</div>
				<br />
				<br />
			</div>
			
		<?php } ?>
	</div>
	.

</div>
