
   
<script>
  $(document).ready(function() { 

                
                /*$("#toggle").click(function(){
                   
                     /*dropdown post */
                  $('#toggle').click(function(){
                   
                    $('#contact').toggle('collapse');
                    
					});
					$('#toggle1').click(function(){
                   
                    $('#resolution').toggle('collapse');
                    
					});
					setInterval( function() {
					


					 $.ajax({
                    url:"<?php echo base_url(); ?>messaging/getOnlineContacts",    
                    data: {uname: "<?php echo $this->session->userdata('username');?>"},
                    type: "POST",
                    success: function(data){
                        $("#contact").html(data);
                    },
                    error: function(data){
                        
                       
                    }

                    
                    });
					
					
					
				} , 1000 );
                    
                   /* });*/
});
</script>
    

    <!-- Bootstrap Core CSS -->
    

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top navbar-inverse" style="min-height: 0px;margin-bottom: 0px;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav  side-nav ">
                    <li>
                        <a href="<?php echo base_url().'messaging'?>" style="padding:10px 10px;"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" id="toggle" data-target="#contact" class="collapse" style="padding:10px 15px;max-height: 200px"><i class="fa fa-fw fa-user"></i> Contacts<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="contact" class="collapse">
                        	
                        		
                        	<?php	$query = $this->db->select('user_data')->get('ci_sessions');
							$username=array();
							foreach($query->result() as $row){
								$udata=unserialize($row->user_data);
								
								$username[]=$udata['username'];
								
							}
							
							$usernames=array_unique($username);
/* array to store the user data we fetch */

foreach ($usernames as $row)
{
    

    /* put data in array using username as key */
    if(isset($row))
    echo "<li><a href=\"".base_url()."messaging/Conversation/".$row."\"><span class=\"img img-circle small label-success\">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;".$row."</a></li>"; 
}
?>
                        	
                        </ul>
                    </li>
                    <li>
                    	<a href="#" data-toggle="collapse" id="toggle1" data-target="#resolution" class="collapse" style="padding:10px 15px;"><i class="fa fa-fw fa-exclamation-triangle"></i> Resolution Center<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="resolution" class="collapse">
                        	<li>
                        <a href="<?php echo base_url().'resolutionCenter/tickets'?>" style="padding:10px 15px;"><i class="fa fa-fw fa-certificate"></i>Ticket info</a>
                        	</li>
                        	<li>
                        <a href="<?php echo base_url().'resolutionCenter/inbox'?>" style="padding:10px 15px;"><i class="fa fa-fw fa-envelope"></i>Ticket Inbox</a>
                        	</li>
                        	<li>
                        <a href="<?php echo base_url().'resolutionCenter/outbox'?>" style="padding:10px 15px;"><i class="fa fa-fw fa-send"></i>Ticket Outbox</a>
                        	</li>
                        </ul>	
                     </li>
                     
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
<style>
	.div-hover:hover{
		background-color:#F9F9F9 !important;
	}
</style>
            <div class="container-fluid">
	<div class="row">
	<h3 class='center-block' align="center">Messages</h3>
	</div>
	
	
	

<div class="col-sm-offset-1" id="NewNotification">	
   <?php if(isset($notifications))foreach($notifications as $notification){?>
      
        	<div class="col-md-8 table-bordered div-hover" id="<?php echo $notification->id; ?>" style="padding: 10px; margin-bottom:15px ">
				<a href="<?php echo base_url().'messaging/Conversation/'.$notification->from;?>">
					<?php echo '<strong>'.$notification->from.'</strong>'.$notification->Content;?>
				<div class="col-md-4 pull-right">
					<?php echo $notification->date;?>
				</div></a>
        	</div>
       		
       <?php } ?>
</div>
                <!-- Page Heading -->
                
                <!-- /.row -->


                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->


