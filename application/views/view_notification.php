<script type="text/javascript">
$(document).ready(function(){
	$('.div-hover').click(
		function(){
			
			 $.ajax({
                    url:"<?php echo base_url(); ?>notification/getNotification",    
                    data: {notid: $(this).attr('id')},
                    type: "POST",
                    success: function(data){
                        $(".modal-content").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });

	
	
	});
	
	$('.div-hover').click(
		function(){
			$(this).css('background-color','#F1F1F1');
			
		});
	
				setInterval( function() {
					


					 $.ajax({
                    url:"<?php echo base_url(); ?>notification/getAllCount",    
                    data: {uname: "<?php echo $this->session->userdata('username');?>"},
                    type: "POST",
                    success: function(data){
                        $("#read").html(data);
                    },
                    error: function(data){
                        
                       
                    }
					});
                    $.ajax({
                    url:"<?php echo base_url(); ?>notification/getUnreadCount",    
                    data: {uname: "<?php echo $this->session->userdata('username');?>"},
                    type: "POST",
                    success: function(data){
                        $("#unread").html(data);
                    },
                    error: function(data){
                        
                       
                    }
                    });
					
					$.ajax({
                    url:"<?php echo base_url(); ?>notification/getNewNotifications",    
                    data: {uname: "<?php echo $this->session->userdata('username');?>"},
                    type: "POST",
                    success: function(data){
                        $("#NewNotification").prepend(data);
                    },
                    error: function(data){
                        
                       
                    }
                    });
					
				} , 1000 );
	});
</script>
<style>
	.div-hover:hover{
		background-color:#F9F9F9 !important;
	}
</style>

<div class="container">
	<h3 class='center-block' align="center">Notifications</h3>
	<div class='col-md-offset-1'>
	<h4>Unread Notifications <span class="badge" id='unread'></span></h4>
	<h4>Total Notifications <span class="badge" id='read'></span></h4>
	</div>
<div class="col-sm-offset-1 col-md-12" id="NewNotification">	
    <?php foreach($notifications as $notification){?>
      
        	<div data-toggle="modal" data-target="#myModal" class="col-md-12 table-bordered div-hover" id="<?php echo $notification->id; ?>" style="padding: 10px;
        		<?php 
        		if($notification->viewed==0)
        		echo'background-color:#F7F7F7;';?> ">
				<?php echo $notification->topic;?>
				<div class="col-md-4 pull-right">
					<?php echo $notification->date;?>
				</div>
        	</div>
       
       <?php } ?>
</div>
    
    <div class="modal" id="myModal" role="dialog" >
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				</div>
				<div class="modal-body">
					<br/>
					<br />
					<img src="<?php echo base_url().'images/Notification/loading_animation.gif';?>" class="center-block"/>
					<br />
					<br/>
				</div>
				
			</div>
		</div>
	</div>
</div>	