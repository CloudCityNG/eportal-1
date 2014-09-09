
   
   
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
<style>
	.div-hover:hover{
		background-color:#F9F9F9;
	}
</style>
    

    <!-- Bootstrap Core CSS -->
    

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

            <div class="container-fluid">
	<div class="row">
	<h3 class='center-block' align="center">Resolution Center</h3>
	</div>
	
	
	<?php if(!isset($messaging)){?>

<div class="row" id="NewNotification">	
   <?php
   			if(isset($success))
			if($success)
			{
				echo '<div class="container">
	<div class="col-md-7">
		<div class="alert alert-success">
			<b>You have successfully Issued  a Ticket </b>
			against '.$accusing.' .	
			<br />
			Your ticket id is '.$id.'.
			
		</div>
	</div>
</div>';
			}
			?>
      <div class="col-md-6">
        	<div class="thumbnail">
				<div class="h3 text-center">Tickets Issued</div>
				<hr>
				<?php if(isset($ticket))foreach($ticket as $tick){?>
				<div class="caption text-center table-bordered div-hover"><a href="<?php echo base_url();?>resolutionCenter/messages/<?php echo $tick->id;?>">
        <div class=" text-left ">&nbsp;Ticket No :<?php echo $tick->id;?></div>
        <div class="text-left" style="word-wrap:break-word">&nbsp;<?php echo $tick->issue;?></div>
        <div class="pull-left text-muted"><?php echo $tick->date;?></div>
        <div class="col-md-offset-6">status : <?php echo $tick->status;?></div></a>
       	</div>
				
				<?php } ?>
        	</div>
       	</div>	
       	
     <div class="col-md-6">
        	<div class="thumbnail">
        		<div class="caption text-center bg-danger">

      		      
				<div class="h3 text-center">Tickets Against you</div>
				<hr>
				<?php if(isset($accused))foreach($accused as $accuse){?>
				<div class="caption text-center table-bordered div-hover"><a href="<?php echo base_url();?>resolutionCenter/messages/<?php echo $accuse->id;?>">
        <div class=" text-left ">&nbsp;Ticket No :<?php echo $accuse->id;?></div>
        <div class="text-left" style="word-wrap:break-word">&nbsp;<?php echo $accuse->issue;?></div>
        <div class="pull-left text-muted"><?php echo $accuse->date;?></div>
        <div class="col-md-offset-6">status : <?php echo $accuse->status;?></div></a>
       	</div>
				
				<?php } ?> 
				</div>
        	</div>
       	</div>	
		

</div>
<?php }else{?>
	<script>
  $(document).ready(function() { 

                

					$('#send').click(function(){
						$.ajax({
						url:"<?php echo base_url();?>administration/set_message",    
                    data: {message: CKEDITOR.instances.editor1.getData(),from:"<?php echo $this->session->userdata('username')?>",id:"<?php echo $id;?>"},
                    type: "POST",
                    success: function(data){
                        
                        $('#conversation1').scrollTop($('#conversation')[0].scrollHeight);
                        CKEDITOR.instances.editor1.setData();
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }	
							
							
						})
						
					}
						
					);

									
				setInterval( function() {
					


					 $.ajax({
                    url:"<?php echo base_url();?>administration/getMessages",    
                    data: {id:"<?php echo $id;?>",from:"<?php echo $this->session->userdata('username')?>"},
                    type: "POST",
                    success: function(data){
                        $("#conversation1").html(data);
                        
                    },
                    error: function(data){
                        
                       
                    }

                    
                    });
					
					
					
				} , 1000 );
					
                    
                   /* });*/
});
</script>
            	
            	
            	
            	
			<style>
   	.comment_left {
position: relative;
float:left;
width: 620px !important;
padding: 3px 10px;
background: #eee;
margin-bottom: 10px;
margin-left: 0;
margin-top: 10px;
display: inline-block;
word-wrap: break-word;
}

.comment_left:after {
content: "";
position: absolute;
top: 5px;
left: -15px;
border-style: solid;
border-width: 10px 15px 10px 0;
border-color: transparent #eee;
display: inline-block;
padding:1px;
width:0;
z-index: 1;
}
   	.comment_right {
position: relative;
float:right;
width: 620px !important;
padding: 3px 10px;
background: #D6E2F3;
margin-bottom: 10px;
margin-left: 0;
margin-top: 10px;
display: inline-block;
word-wrap: break-word;
}

.comment_right:after {
content: "";
position: absolute;
top: 5px;
right: -15px;
border-style: solid;
border-width: 10px 0px 10px 15px;
border-color: transparent #D6E2F3;
display: inline-block;
padding:1px;
width:0;
z-index: 1;
}
</style>		
	 <div class="container-fluid">
	<div class="row">

	<h3>Ticket id : <?php echo $id;?>
</h3>
<h3><?php echo $issue;?></h3>
	
	</div>
	<div>
	<div class="col-md-offset-1 col-md-8" style="background-color: #f8f8f8; height: 500px; overflow:scroll" id="conversation1">
		
		</div>
	</div>
		<div class="row col-md-offset-2 col-md-6">
	<form>
	<?php echo '<script type="text/javascript" src="'.base_url().'js/ckeditor/ckeditor.js"></script>' ;?>
	<textarea cols="50" id="editor1" name="editor1" rows="10"></textarea>

		<script type="text/javascript">
		//<![CDATA[
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var editor = CKEDITOR.replace( 'editor1',{height :'100px'} );
		//]]>
		</script>
		<div>
			<br />
		<?php
			      				$signin = array('class' => 'btn btn-md btn-primary pull-right','name'=>'send','content'=>'Send Message','id'=>'send');
								echo form_button($signin);
			      			?></div>
			     
	</form>
	</div>

				
            </div>
	<?php }?>

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



