<!DOCTYPE html>
<html>
	<!--style>
	
		*{
			font-family: Arial;
			font-size: 15px;
			
		}
		table#ads {
			width: 300px;
			margin-bottom: 10px;
		}
		table#ads td,th {
			border: 1px solid Blue;
			
			padding: 1em;
			
		}
		table#ads th:hover
		{
			background-color: Gray;
		}
		#container
		{
			width: 60px;
			
		}
		tr:(odd) {background: #FFFFFF}
		#pagination strong{
			background-color: #e3e3e3;
			padding: 4px, 7px;
			text-decoration: none;
		}
		label
		{
			display: inline-block;
			width: 100px;
		}
		div{
			height: 25px;
		}
		
		table#comments
		{
			width: none;
			margin-bottom: 10px;
			border: none;
			padding: .1em;
		}
		
		table#comments td
		{
			width: none;
			margin-bottom: 10px;
			border: none;
			padding: .1em;
		}
		table#comments tbody
		{
			width: px;
			margin-bottom: 20px;
			border: 1px solid Blue;
			padding: 5em;
		}
		
		a:link
		{
			color: red;
		}
		a:hover
		{
			color: red;
			cursor: pointer; cursor: hand;
			text-decoration: underline;
		}
		
		
	</style-->
	
	<style>
	@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);


body {
        background-color:#f0f0ee;
		/*font:1em "Trebuchet MS";*/
        }
.bubble img {/*
  float:left;
  width:70px;
  height:70px;
  border:3px solid #ffffff;
  border-radius:10px*/
                  }
.bubble-content {
position:relative;
float:left;
margin-left:0px;
width:400px;
padding:1px 10px;
border-radius:10px;
background-color:#FFFFFF;
box-shadow:1px 1px 5px rgba(0,0,0,.2);
}
.bubble {
    margin-top:20px;
    }
.point {
  border-top:10px solid transparent;
  border-bottom:10px solid transparent;
          border-right: 12px solid #FFF;
  position:absolute;
  left:-10px;
  top:12px;
  }
a:link
		{
			color: red;
		}
		a:hover
		{
			color: red;
			cursor: pointer; cursor: hand;
			text-decoration: underline;
		}
/*
.clearfix:after {
    visibility:hidden;
    display:block;
    font-size:0;
    content: ".";
    clear:both;
    height:0;
    line-height:
    }
.clearfix {
     display: inline-block;
     }
* html .clearfix {
       height: 1%;
  }*/
	</style>
	
<head>
	<title>View Ad</title>
</head>
<body>

	<table id="ads">
			<tbody>
				<?php foreach ($ads as $ad): ?>
					 <tr>
					 	<!--td>ID</td><td> <?php echo form_hidden('adid', set_value($ad->id, $ad->id), 'id="adid"') ?> </td-->
					 </tr>
					 <tr>
					 	<td>Title</td><td> <?php echo $ad->title; ?> </td>
					 </tr>
					 <tr>
					 	<td>Body</td><td> <?php echo $ad->body; ?> </td>
					 </tr>
					 <tr>
					 	<td>Price</td><td> <?php echo $ad->price ?> </td>
					 </tr>
					 <tr>
					 	<td>Created Date</td><td><?php echo $ad->cDATE ?> </td>
					 </tr>
					 
					<?php endforeach; ?>
	
				</tbody>
		</table>

<div class="pull-left">
<?php	echo form_open('advertisement/submit_rate/'.$this->uri->segment(3));
		
		if($this->session->userdata('username'))
		{$radio_level = "";}
		else {$radio_level = "disabled";}
		
		for($i = 1;$i <= 5;$i++)
    	{
        if ($i == round($avg_rate))
        {
       	
       echo'<input name="star" type="radio" class="star" checked="checked" '.$radio_level.' value='.$i.' "/>';
	   
        }
        else
        {
         echo'<input name="star" type="radio" class="star" '.$radio_level.' value='.$i.' "/>';
        }
    } //end of for
    echo '</br>';
    echo '<div class="row"><b>Total Rating: '.$total_rate.'</b>'; echo'</div>' ?>
    <?php echo form_hidden('is_rated', $is_rated);; ?>
   <?php if($this->session->userdata('username')) {?>
    
    <?php if($is_rated==1) {
    	echo '<div class="row"> Your Rating: '.$rate.' </div>';
    }?>
    <div><?php echo form_submit(array('class' => 'form-control btn-sm btn-primary','name'=>'rate','value'=>'Rate')); ?></div> <?php } else { ?>
    	
    <div><?php
      				$signin = array('class' => 'form-control btn-sm btn-primary','name'=>'signin','value'=>'Sign in to rate','formaction'=>base_url().'signin');
					echo form_submit($signin);
      			?></div>
     <?php } ?>
     
     <?php echo form_close(); ?> 			
</div>

		
		<!--table id="comments">
			<tbody>
				<?php foreach ($comments as $comment): ?>
					 <tr>
					 	<td> <b><?php echo $comment->username; ?></b></td>
					 	<td> <?php echo $comment->comment; ?> </td>
					 	<td><font color="RED"> <a title="delete" onclick="DelCom(<?php echo $comment->cmid;?>)">x</a></font></td>
					 <tr></tr>
					 	<td></td>
					 	<td> <font color="#C0C0C0"> <?php echo $comment->cDATE ?> </font></td>
					 </tr>
					 
					<?php endforeach; ?>
	
				</tbody>
		</table-->
		
		
		
		<div>
			
                    <?php foreach ($comments as $comment): ?>
                    	
                    <div class="bubble-list">
      					<div class="bubble clearfix">
                        <div class="pull-left">
                            <img src="http://api.randomuser.me/portraits/women/90.jpg" alt="Jean Myers" class="img-responsive img-circle" width="150px" height="150px">
                        </div>
                        <div class="bubble-content">
        				<div class="point"></div>
        				<div><b><?php echo $comment->username; ?></b></div>
						<p><?php echo $comment->comment; ?></p>
						<div class="col-md-4 col-md-4"><font color="#C0C0C0"> <?php echo $comment->cDATE ?> </font></div>
						<div class="col-md-4 col-lg-offset-4"><font color="RED"> <a title="delete" onclick="DelCom(<?php echo $comment->cmid;?>)">x</a></font></div>
       					</div>
       					<div class="clearfix"></div>
       					</div>
       						</div>
                     
                     <?php endforeach; ?>
                     
        </div>             
                     
                     <?php echo form_open("ad_control/add_comment/".$this->uri->segment(3)); ?>	
		
	<div><?php echo form_label('Logged User:','logged_user')?>
		<?php echo form_input('username',set_value('username') ,'id="username"')?></div>
		
	<div><?php echo form_label('Comment:','comment')?>
		<?php echo form_input('comment', set_value('comment') ,'id="comment"')?> 
	
	<?php echo form_submit('action', 'Comment'); ?></div>
	
	<?php echo form_close(); ?>
                     
                        <!--div class="col-sm-15 col-sm-9">
                            <span class="name">Steeve</span><br>
                            <span class="text-muted">this is my comment.......sdweuioefnmd vcbkfiuelkrew ref vifuoitueakarbekfvudf dgfdiigudi</span><br>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="col-xs-com col-xs-com">
                            <img src="http://api.randomuser.me/portraits/women/90.jpg" alt="Jean Myers" class="img-responsive img-circle">
                        </div>
                        <div class="col-sm-15 col-sm-9">
                            <span class="name">Steeve</span><br>
                            <span class="visible-md"> is my comment.......sdweuioefnmd vcbkfiuelkrew ref vifuoitueakarbekfvudf dgfdiigudi</span><br>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="col-xs-com col-sm-com">
                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                        </div>
                        <div class="col-sm-15 col-sm-9">
                            <span class="name">Scott Stevens</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                            <span class="visible-xs"> <span class="text-muted">5842 Hillcrest Rd</span><br/></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                            <span class="visible-xs"> <span class="text-muted">(870) 288-4149</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                            <span class="visible-xs"> <span class="text-muted">scott.stevens@example.com</span><br/></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
       </div-->	
		
		<!-- DC Comment Boxes Start -->
  <!--div class="tsc_clean_comment">
     <div class="col-xs-com col-xs-com">
                            <img src="http://api.randomuser.me/portraits/women/90.jpg" alt="Jean Myers" class="img-responsive img-circle">
                        </div>
      <p class="name">Joe Blogs</p>
    </div>
    <div class="comment_box fr">
      <p class="comment_paragraph" contenteditable="true">This field is completely editable. To disable this feature remove the "contenteditable=true" tag from this code.</p>
      <a href="#" class="reply">Reply</a> <span class="date">1st January 2020</span> </div>
    <div class="tsc_clear"></div-->
    
    <!--div class="bubble-list">
      <div class="bubble clearfix">
      	<div class="col-xs-com col-xs-com">
        <img src="http://localhost:8080/eportal/images/Advertisement/imagenotfound.png" alt="Jean Myers" class="img-responsive img-circle">
                        </div>
   <div class="bubble-content">
        <div class="point"></div>
	<p>Welcome To ThePCwizard.in - Helping Beginners. Developing Experts.</p>
       </div>
</div>
  </div>
  
<div class="bubble-list">
      <div class="bubble clearfix">
      	<div class="col-xs-com col-xs-com">
        <img src="http://localhost:8080/eportal/images/Advertisement/imagenotfound.png" alt="Jean Myers" class="img-responsive img-circle">
                        </div>
   <div class="bubble-content">
        <div class="point"></div>
	<p>Welcome To ThePCwizard.in - Helping Beginners. Developing Experts.</p>
       </div>
</div>
  </div>  
  
<!-- DC Comment Boxes End -->
	</body>
	
	<script>
	function DelCom(id) {
    var url="<?php echo base_url();?>";
    	if (confirm("Delete this comment?") == true) {
    		var adid = "<?php echo $this->uri->segment(3);?>";
        	window.location = url+"ad_control/del_comment/"+id+"/"+adid;
    	} else {
        	return false;
    	}
	}
	</script>
	
	</html>