<!DOCTYPE html>
<html>
	<style>
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
		
		<table id="comments">
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
		</table>
	
	<?php echo form_open("ad_control/add_comment/".$this->uri->segment(3)); ?>	
		
	<div><?php echo form_label('Logged User:','logged_user')?>
		<?php echo form_input('username',set_value('username') ,'id="username"')?></div>
		
	<div><?php echo form_label('Comment:','comment')?>
		<?php echo form_input('comment', set_value('comment') ,'id="comment"')?> 
	
	<?php echo form_submit('action', 'Comment'); ?></div>
	
	<?php echo form_close(); ?>
	
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