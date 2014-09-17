<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
          <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/design_configuration'?>">Design Configuration</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'administration/resolution'?>">Resolution Center</a></li>
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-lg-10 col-md-offset-2">
<h3 class="text-center">Resolution Center</h3>
	   			  <?php
    			if(isset($status_resolved) &&$status_resolved==TRUE){
			  				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Ticket is resolved.
			  				</div>'; 
			  			}
						else if(isset($status_reject) &&$status_reject==TRUE){
			  				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
			  				Complain is rejected.
			  				</div>'; 
			  			}?> 
<style>
	.div-hover:hover{
		background-color:#F9F9F9;
	}
</style>
<div class="container">
	<?php if(isset($history)){?>
		
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

	<h3>Message History
</h3>
	
	</div>
	<div>
	<div class="col-md-offset-1 col-md-8" style="background-color: #f8f8f8; height: 500px; overflow:scroll" id="conversation">
		<?php if(isset($conversation)) foreach($conversation as $message){
				if($message->to==$accused){
					echo '<div class="comment_left"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else{
					echo '<div class="comment_right"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
			}?>
		</div>
	</div>
	

				
            </div>
            <?php }else if(isset($message)){?>
            	<script>
  $(document).ready(function() { 
					$('#myTab a').click(function (e) {
 					 e.preventDefault()
 					 $(this).tab('show')
					})
                

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
		<?php if(isset($messages)) foreach($messages as $message){
				if(($message->to!=$accused)&&($message->to!=$accuser)){
					echo '<div class="comment_right"><p>Admin</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
				else{
					echo '<div class="comment_left"><p><a href="'.base_url().'profile/'.$message->from.'">'.$message->from.'</a><p>'.$message->Content.'<p class="text-muted">sent on '.$message->date.'</p></div>';
				}
			}?>
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
            
            	
            	
            <?php }else {?>
	<div class="col-md-10 col-md-offset-1">
		<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="active"><a href="#complain" role="tab" data-toggle="tab">Complaints</a></li>
  <li><a href="#opened" role="tab" data-toggle="tab">Opened Tickets</a></li>
  <li><a href="#resolved" role="tab" data-toggle="tab">Resolved Tickets</a></li>
  <li><a href="#rejected" role="tab" data-toggle="tab">Rejected Complains</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="complain">	<div class="panel panel-default">

	    
	    <div class="panel-body"> 
	    	<?php if(isset($complain))foreach($complain as $row){?>
<div class="col-md-10 col-md-offset-1  img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-4 pull-left btn btn-warning" style="margin-bottom: 10px"><a href="<?php echo base_url()?>profile/<?php echo $row->accused;?>">
				Accused User : <?php echo $row->accused;?></a>
				</div>
				<div class="col-sm-4 pull-right btn btn-info"><a href="<?php echo base_url()?>profile/<?php echo $row->accuser;?>">
				Accused by : <?php echo $row->accuser;?></a>
				</div>
				
			<div class="col-md-10 table-bordered div-hover"style="margin-bottom: 10px">
				<u><strong>Description :</strong></u>
				<p>
					<?php echo $row->issue;?>
					</p>
					
			</div>
			
			<div class="pull-right">
				<a href="<?php echo base_url()?>administration/resolution_history/<?php echo $row->id;?>" class="btn btn-default"><b> View Messages </b></a>
			<?php if(($row->status!='reject')&&($row->status!='resolved')){?>
			<a href="<?php echo base_url()?>administration/resolution_status/reject/<?php echo $row->id;?>" class="btn btn-danger"><b> Reject </b></a>
			<a href="<?php echo base_url()?>administration/resolution_status/resolved/<?php echo $row->id;?>" class="btn btn-primary"><b> Issue Ticket </b></a>
			<?php }?>
			</div>
			<div class="pull-left">
				Complain id : <?php echo $row->id;?>
				<br>
				Status : <?php echo $row->status;?>	
				<br>
				<div class="text-muted"><?php echo $row->date;?></div>			
			</div>
			
			
	</div>
	<?php }?>
</div>
</div></div>
  <div class="tab-pane" id="opened">
  	<div class="panel panel-default">
	    <div class="panel-body"> 
	    	<?php if(isset($opened))foreach($opened as $row){?>
<div class="col-md-10 col-md-offset-1  img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-4 pull-left btn btn-warning" style="margin-bottom: 10px"><a href="<?php echo base_url()?>profile/<?php echo $row->accused;?>">
				Accused User : <?php echo $row->accused;?></a>
				</div>
				<div class="col-sm-4 pull-right btn btn-info"><a href="<?php echo base_url()?>profile/<?php echo $row->accuser;?>">
				Accused by : <?php echo $row->accuser;?></a>
				</div>
				
			<div class="col-md-10 table-bordered div-hover"style="margin-bottom: 10px"><a href="<?php echo base_url();?>administration/resolution_messaging/<?php echo $row->id;?>">
				<u><strong>Description :</strong></u>
				<p>
					<?php echo $row->issue;?>
					</p>
					</a>
			</div>
			
			<div class="pull-right">
				<a href="<?php echo base_url()?>administration/resolution_history/<?php echo $row->id;?>" class="btn btn-default"><b> View Messages </b></a>
			<?php if(($row->status!='reject')&&($row->status!='resolved')){?>
			
			<a href="<?php echo base_url()?>administration/resolution_status/resolved/<?php echo $row->id;?>" class="btn btn-success"><b> Resolved </b></a>
			<?php }?>
			</div>
			<div class="pull-left">
				Ticket id : <?php echo $row->id;?>
				<br>				
				Status : <?php echo $row->status;?>	
				<br>
				<div class="text-muted"><?php echo $row->date;?></div>			
			</div>
			
			
	</div>
	<?php }?>
</div>
</div>
</div>
  <div class="tab-pane" id="resolved">
  	<div class="panel panel-default">
	    <div class="panel-body"> 
	    	<?php if(isset($resolved))foreach($resolved as $row){?>
<div class="col-md-10 col-md-offset-1  img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-4 pull-left btn btn-warning" style="margin-bottom: 10px"><a href="<?php echo base_url()?>profile/<?php echo $row->accused;?>">
				Accused User : <?php echo $row->accused;?></a>
				</div>
				<div class="col-sm-4 pull-right btn btn-info"><a href="<?php echo base_url()?>profile/<?php echo $row->accuser;?>">
				Accused by : <?php echo $row->accuser;?></a>
				</div>
				
			<div class="col-md-10 table-bordered div-hover"style="margin-bottom: 10px"><a href="<?php echo base_url();?>administration/resolution_messaging/<?php echo $row->id;?>">
				<u><strong>Description :</strong></u>
				<p>
					<?php echo $row->issue;?>
					</p>
					</a>
			</div>
			
			<div class="pull-right">
				<a href="<?php echo base_url()?>administration/resolution_history/<?php echo $row->id;?>" class="btn btn-default"><b> View Messages </b></a>
			<?php if(($row->status!='rejected')&&($row->status!='resolved')){?>
			<a href="<?php echo base_url()?>administration/resolution_status/reject/<?php echo $row->id;?>" class="btn btn-danger"><b> Reject </b></a>
			<a href="<?php echo base_url()?>administration/resolution_status/resolved/<?php echo $row->id;?>" class="btn btn-success"><b> Resolved </b></a>
			<?php }?>
			</div>
			<div class="pull-left">
				Ticket id : <?php echo $row->id;?>
				<br>
				Status : <?php echo $row->status;?>	
				<br>
				<div class="text-muted"><?php echo $row->date;?></div>			
			</div>
			
			
	</div>
	<?php }?>
</div>
</div>


</div>
  <div class="tab-pane" id="rejected">
  	<div class="panel panel-default">
	    <div class="panel-body"> 
	    	<?php if(isset($rejected))foreach($rejected as $row){?>
<div class="col-md-10 col-md-offset-1  img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-4 pull-left btn btn-warning" style="margin-bottom: 10px"><a href="<?php echo base_url()?>profile/<?php echo $row->accused;?>">
				Accused User : <?php echo $row->accused;?></a>
				</div>
				<div class="col-sm-4 pull-right btn btn-info"><a href="<?php echo base_url()?>profile/<?php echo $row->accuser;?>">
				Accused by : <?php echo $row->accuser;?></a>
				</div>
				
			<div class="col-md-10 table-bordered div-hover"style="margin-bottom: 10px"><a href="<?php echo base_url();?>administration/resolution_messaging/<?php echo $row->id;?>">
				<u><strong>Description :</strong></u>
				<p>
					<?php echo $row->issue;?>
					</p>
					</a>
			</div>
			
			<div class="pull-right">
				<a href="<?php echo base_url()?>administration/resolution_history/<?php echo $row->id;?>" class="btn btn-default"><b> View Messages </b></a>
			<?php if(($row->status!='rejected')&&($row->status!='resolved')){?>
			<a href="<?php echo base_url()?>administration/resolution_status/reject/<?php echo $row->id;?>" class="btn btn-danger"><b> Reject </b></a>
			<a href="<?php echo base_url()?>administration/resolution_status/resolved/<?php echo $row->id;?>" class="btn btn-success"><b> Resolved </b></a>
			<?php }?>
			</div>
			<div class="pull-left">
				Status : <?php echo $row->status;?>	
				<br>
				<div class="text-muted"><?php echo $row->date;?></div>			
			</div>
			
			
	</div>
	<?php }?>
</div>
</div>
  	
  	
  	
  </div>
</div>

</div>
<?php }?>


  

 </div> 