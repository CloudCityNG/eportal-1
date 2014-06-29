
<style>
label
{
			  
	display: inline-block;
	alignment-baseline: central; 
	width: 100px;
	color: #000000;
}	

#pagination strong{
	background-color: #e3e3e3;
	padding: 4px, 7px;
	text-decoration: none;
}
#pagination a:hover
{
	color: RED;
}

</style>
	<!--style>
		*{
			font-family: Arial;
			font-size: 15px;
			
		}
		table {
			width: 600px;
			margin-bottom: 10px;
		}
		td,th {
			border: 1px solid Blue;
			
			padding: 1em;
			
		}
		th:hover
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
		button#advsrch
		{
			color: blue;
			border: none;
			background: none;
		}
		button#advsrch:hover
		{
			color: blue;
			text-decoration: underline;
			border: none;
			background: none;
			cursor: pointer; cursor: hand;
		}
		
	</style-->

<script>
$(document).ready(function(){
  $("button#advsrch").click(function(){
    $("div#advsrchopt").toggle();
    return false;
  });
  
  $("#category").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>advertisement/getSubCategories",    
                    data: {subcatid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#sub_category").html(data);
                    },
                    error: function(data)
                    {alert('Ajax Error');}
                    });
                });
                
  $("#category").click(function(){ 
                	$("#category").change();
				});			
	
	/*			
  $("#country").change(function(){
                   
                   
                   $.ajax({
                    url:"<!--?php echo base_url(); ?>advertisement/getProvinces",    
                    data: {couid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#province").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
            });
                
  
  $("#country").click(function(){ 
                	$("#country").change();
				});
		*/		
$("#province").change(function(){
                   
                     /*dropdown post */
                  
                   $.ajax({
                    url:"<?php echo base_url(); ?>site/getDistricts",    
                    data: {proid: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#district").html(data);
                    },
                    error: function(data){
                        alert('Ajax Error');
                       
                    }

                    
                    });
            });
                
  
  $("#province").click(function(){ 
                	$("#province").change();
				});	
	
					
});
</script>
<script type="text/javascript">
			function deleteAd(clicked_id)
			{
				var r=confirm("Are you sure You want to Delete this Ad");
				if (r==true)
  				{
  					window.location="<?php echo base_url().'advertisement/deleteAd/'?>"+clicked_id;
  				}
				
			}
			function featuredAd()
			{
				window.open('https://www.paypal.com','_blank');	
			}
		</script>

	<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
	<div class="col-sm-3 col-md-2 sidebar" id="search_opt" style="margin-top: 70px">
	<?php echo form_open('site/search'); ?>
	<div class="search-block"><?php echo form_label('Title:','title')?>
		<?php echo form_input(array(
               'name'        => 'title',
               'id'          => 'title',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:100%',
                'class'=>"form-control",
             ), set_value('title'))?></div>
		
	<div ><?php echo form_label('Sort By:','sort_by')?>
		<?php echo form_dropdown('sort_by', $sort_by_opt, set_value('sort_by') ,'id="sort_by"; style="width:100%" class="form-control"')?></div>
			
	<!--div><button id="advsrch">Advanced Search</button></div>
	<div id="advsrchopt" style="display: none"-->
	<div><?php echo form_label('Category:','category')?>
		<?php echo form_dropdown('category', $category_opt, set_value('category') ,'id="category"; style="width:100%" class="form-control"')?>
	<?php echo form_label('Sub-category:','sub_category')?>
		<?php echo form_dropdown('sub_category', $sub_category_opt, set_value('sub_category') ,'id="sub_category"; style="width:100%" class="form-control"')?></div>
	
	<div>
	<?php echo form_label('Province:','province')?>
		<?php echo form_dropdown('province', $province_opt, set_value('province') ,'id="province"; style="width:100%" class="form-control"')?>
	<?php echo form_label('District:','district')?>
		<?php echo form_dropdown('district', $district_opt, set_value('district') ,'id="district"; style="width:100%" class="form-control"')?></div>	
		
		
	<div><?php echo form_label('Price:','price')?>
		<div class="form-group form-inline">
		<?php echo form_input('low_price', set_value('low_price') ,'id="low_price"; style="width:45%" class="form-control"')?> - 
		<?php echo form_input('high_price', set_value('high_price') ,'id="high_price"; style="width:45%" class="form-control"')?></div>
		 <i><font color="#C0C0C0"> <?php echo $min_price ?> - <?php echo $max_price ?> </font></i></div>
		 
	<div><?php $search = array('class' => 'btn btn-primary','name'=>'search','value'=>'Search');
					echo form_submit($search); ?></div>
		 </div>

	<?php echo form_close(); ?>
</div>
	
	<!--table>
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Body</th>
			<th>Price</th>	
			<th>Created Date</th>
			<th>Category</th>
			
			</thead>
			<tbody>
				<?php foreach ($ads as $ad): ?>
					 <tr>
					 	<td> <?php echo $id = $ad->id; ?> </td>
					 	<td> <?php echo anchor("site/gotoad/$id", $ad->title) ; ?> </td>
					 	<td> <?php echo $ad->body; ?> </td>
					 	<td> <?php echo $ad->price; ?> </td>
					 	<td> <?php echo $ad->cDATE; ?> </td>
					 	<td> <?php echo $ad->categoryid; ?> </td>
					 	</tr>
					<?php endforeach; ?>
	
				</tbody>
		</table-->
		
	<div class="container">
	<div class="col-md-10 col-md-offset-2">
	<div class="panel panel-default">
		<div class="h3 text-center" style="margin-bottom: 26px;">
			&nbsp;&nbsp;Search Result&nbsp;&nbsp;
		</div>
		<div class="h2 text-left" style="margin-bottom: 26px;margin-left: 90px"><small>
			<?php
					if($num_ads<=0){
						echo '<span class="label label-danger">'.$num_ads.'</span>'; 
					}else if($num_ads<7){
						echo '<span class="label label-warning">'.$num_ads.'</span>';
					}else{
						echo '<span class="label label-success">'.$num_ads.'</span>';
					}
					 
				?> Advertisments Found</small>
		</div>
	<div class="panel-body">
			<?php $j=0; ?>
	<?php foreach ($ads as $ad)
	{
		echo '<div class="col-md-10 col-md-offset-1 img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-2 pull-left">';
				 
				    	
				    	if(isset($ad->image) && $ad->image!=NULL){
				    		echo '<img  height="100" src="'.base_url().$ad->image.'" class="img-thumbnail pull-left profile-picture"/>';
						}else{
							echo '<img height="100" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-7">
				<div class="row">';
					
				   				 echo '<a href="'.base_url().'advertisement/viewAd/'.$ad->id.'" class="text-primary"><u><b>'.$ad->title.'</b></u></a>'; 

					
				echo '</div></br>';
				//echo '<div class="pull-right"><input name="star'.$i.'" type="radio" class="star" checked="checked" disabled="disabled"/></div>';
				echo '<div class="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Price ';
				
    		$this->load->model('advertisements');
    		$country=$this->advertisements->getconfigcountry(base_url());
			$price;
			foreach($country as $key)
			{
				$price=$key->currencysy;
			}
    		 echo $price.$ad->price.'</b>';
	echo '<div class="pull-right">';
	
	for($i = 1;$i <= 5;$i++)
    {
        if ($i == round($ad->avg_rate))
        {
       ?>
       <?php echo'<input name="star'.$ad->id.'" type="radio" class="star" checked="checked" disabled="disabled"/>' ?>
       
    <?php
        }
        else
        {
         ?>
    <?php echo'<input name="star'.$ad->id.'" type="radio" class="star" disabled="disabled"/>' ?>
    
   <?php
        }
    } //end of for
    echo '</br>';
    echo '<div class="row"><b>Total Rating: '.$ad->total_rate.'</b>';
	echo'</div>';			
	echo'</div>';
					
			echo '</div>';
			echo '</div>';
			if ($this->session->userdata('username')&&$this->session->userdata('usertype')=='a')
			{
	echo '<div class="pull-right">';
		echo '<a href="#" id="'.$ad->id.'" onclick="deleteAd(this.id)"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';

		echo '</div>';
		}
		echo '</div>';
	}?>	
	</div>
	
	
	<?php if (strlen($pagination)): ?>
		 	<div align="middle">Pages: <?php echo $pagination; ?></div>
		 
		 <?php endif; ?>
	
</div>
</div>
</div>	
		 

