
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
					$('#send').click(function(){
						$.ajax({
						url:"<?php echo base_url(); ?>messaging/sendMessage",    
                    data: {message: CKEDITOR.instances.editor1.getData(),to:"<?php echo $from?>",from:"<?php echo $this->session->userdata('username')?>"},
                    type: "POST",
                    success: function(data){
                        
                        $('#conversation').scrollTop($('#conversation')[0].scrollHeight);
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
									
									setInterval( function() {
					


					 $.ajax({
                    url:"<?php echo base_url(); ?>messaging/getConversation",    
                    data: {to:"<?php echo $from?>",from:"<?php echo $this->session->userdata('username')?>"},
                    type: "POST",
                    success: function(data){
                        $("#conversation").html(data);
                        
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
        <nav class="navbar navbar-fixed-top navbar-inverse " style="min-height: 0px;margin-bottom: 0px;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav  side-nav">
                    <li>
                        <a href="<?php echo base_url().'messaging'?>" style="padding:10px 15px;"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" id="toggle" data-target="#contact" class="collapse" style="padding:10px 15px;"><i class="fa fa-fw fa-user"></i> Contacts<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="contact" class="collapse">
                        	
                        	<?php	$query = $this->db->select('user_data')->get('ci_sessions');

$user = array(); /* array to store the user data we fetch */

foreach ($query->result() as $row)
{
    $udata = unserialize($row->user_data);

    /* put data in array using username as key */
    if(isset($udata['username']))
    echo "<li><a href=\"".base_url()."messaging/Conversation/".$udata['username']."\"><span class=\"img img-circle small label-success\">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;".$udata['username']."</a></li>"; 
 
}
?>
                        	
                        </ul>
                    </li>
                    <li>
                    	<a href="#" data-toggle="collapse" id="toggle1" data-target="#resolution" class="collapse" style="padding:10px 15px;"><i class="fa fa-fw fa-exclamation-triangle"></i> Resolution Center<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="resolution" class="collapse">
                        	<li>
                        <a href="<?php echo base_url().'resolutionCenter/complain'?>" style="padding:10px 15px;"><i class="fa fa-fw fa-warning"></i>Complain info</a>
                        	</li>
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
					   		<a data-toggle="modal" href="#myModal" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;&nbsp;Resolve&nbsp;Problem&nbsp;</a>

	<h3><img class="img img-thumbnail" style="max-height: 100px;max-width: 100px" src="<?php 
	if(isset($profile['profilepicture'])){
	echo base_url()."images/prifilepictures/".$profile['profilepicture'];
	}
	else{
			echo base_url()."images/prifilepictures/default_profile.jpg";
		
	}
	
	?>"/>
<?php echo $from;
$this->load->helper('download');
$data = file_get_contents("images/prifilepictures/default_profile.jpg");
$name = 'gi';

force_download($name, $data);
;?></h3>
	
	</div>
	<div>
	<div class="col-md-offset-1 col-md-8" style="background-color: #f8f8f8; height: 500px; overflow:scroll" id="conversation">
		<br />
		<br />
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
<div class="modal" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php
						$formattributes = array('class' => 'form-horizontal', 'role' => 'form');
						echo form_open('resolutionCenter/issueComplain/'.$from,$formattributes);
					?>
				<div class="modal-header">
					<a herf="#" class="btn btn-sm text-white pull-right pull-up" data-dismiss="modal"> X </a>
					<h4 class="text-center">Whats the problem that you need to report?</h4>
				</div>
				<div class="modal-body" style="min-height: 80px;">
				<h4>Description</h4>
					<div class="col-md-offset-1">
					
					
					<?php
			      			
			      		$rt5 = array('id'=>'reportTypeOtherText','class' => 'form-horizontal', 'role' => 'form','name'=> 'description','rows'=> '5','cols'=> '10','style'=> 'width:100%');
						echo form_textarea($rt5);
					?>
					</div>
				</div>
				<div class="modal-footer">
					<?php
	      				$reportattributes = array('class' => 'btn btn-primary','name'=>'issue_ticket','value'=>'Issue Complain');
						echo form_submit($reportattributes);
	      			?>
				</div>
				
				<?php
					echo form_close();
				?>
				</div>
			</div>
		</div>
	</div>

