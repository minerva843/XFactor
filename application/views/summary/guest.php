
		
		<?php// session_start();?>
		

<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">

				<div class="col-md-9 chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?php echo $project->project_name;?>  </h2>
					</div>
					

					<div class="chat-feature flor-left summary_static">   
					<!-- summry static -->
					
					<div class="row">
						
						<div class="col-md-12 right">
						<!-- <a class="full_download">DOWNLOAD FULL REPORT </a> -->
						</div>
						     
					</div>
					
						<div class="row mt-20">
						
						<div class="col-md-2">
						<div class="summery_logo">
						<a href="<?=base_url();?>home/storage/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/storage.png" class="img-fluid">
						<span>STORAGE</span></a>   
						</div>
												
						</div>
						
						<div class="col-md-2">
						<div class="summery_logo">
						<a href="<?=base_url();?>home/traffic/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/trafic.png" class="img-fluid">
						<span>TRAFFIC</span></a>
						</div>
						<div class="sumry_stac_cont">
						
						</div>    
						</div>
						
						<div class="col-md-2">
						<div class="summery_logo">
						<a href="<?=base_url();?>home/guest/<?php echo $group_id;?>/<?php echo $project_id;?>" class="active"> 
						<img src="<?=base_url();?>assets/images/chat/guest.png" class="img-fluid">  
						<span>GUESTS</span></a>    
						</div>
												
						</div>
						
						</div>
						
						<!-- summry static -->
						
						<div class="row mt-30">
						
						<div class="col-md-2">
						<div class="summery_logo mb-15">
						<a href="<?=base_url();?>home/my_avatar/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid">
						<span>MY AVATAR</span></a>   
						</div>
					
						<div class="sumry_stac_cont">
						
						</div> 						
						</div>
						
						<div class="col-md-2">
						<div class="summery_logo mb-20">
						<a href="<?=base_url();?>home/chat/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/chat.png" class="img-fluid">
						<span>CHAT</span></a>   
						</div>
					
							<div class="sumry_stac_cont">
						
						</div> 				
						
						</div>
						
						
						<div class="col-md-2">
						<div class="summery_logo mb-15">
						<a href="<?=base_url();?>home/content/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/watch.png" class="img-fluid">
						<span>CONTENT</span></a>   
						</div>
					
					<div class="sumry_stac_cont">
						
						</div> 
						
						</div>
						
						<div class="col-md-2">
						<div class="summery_logo mb-15">
						<a href="<?=base_url();?>home/workshop/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/shops.png" class="img-fluid">
						<span>WORKSHOPS</span></a>   
						</div>
					
						<div class="sumry_stac_cont">
						
						</div> 
						</div>
      

						<div class="col-md-2">
						<div class="summery_logo mb-15">
						<a href="<?=base_url();?>home/posts/<?php echo $group_id;?>/<?php echo $project_id;?>">
						<img src="<?=base_url();?>assets/images/chat/visit.png" class="img-fluid">
						<span>POSTS</span></a>   
						</div>
						<div class="sumry_stac_cont">
						</div> 							  
						</div>
						   
						
						<div class="col-md-2">
						<div class="summery_logo mb-15">
						<a href="<?=base_url();?>home/program/<?php echo $group_id;?>/<?php echo $project_id;?>">  
						<img src="<?=base_url();?>assets/images/chat/program.png" class="img-fluid">
						<span>PROGRAM</span></a>   
						</div>
						<div class="sumry_stac_cont">
						</div> 							  
						</div>

					
						</div>
						
						<!-- summry static -->
						   
					</div>
					
				</div>

				<div class="col-md-3 avtar-sidebar">
					<div class="tabbable tabs-below table-content">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right">
									<h2>GUESTS : OVERVIEW</h2>
									
						<div class="table_info1">			
						<div class="places-main">
						<div class="sumry_stac_down summary_right_tab">
						
						<!-- div class="sumry_stac_down">
						<p>Total number of guest for project</p>	
						<p>TOTAL UNIQUE VISITORS, NOT SIGNED IN, TODAY : <?php echo $not_signed_visitors_today;?></p>
						<p>TOTAL UNIQUE VISITORS, NOT SIGNED IN, FROM PROJECT START DATE : <?php echo $not_signed_visitors_start;?></p>						
						</div -->
						
						<table>	
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>Total number of guests for project</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, NOT SIGNED IN, TODAY</td>
						<td><?php echo $not_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, NOT SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $not_signed_visitors_start;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $signed_visitors_start;?></td>
						</tr>
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>PRE REGISTER WEB</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $preregwb_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $preregwb_signed_visitors_start;?></td>
						</tr>
						
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>PRE REGISTER ADMIN</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $preregad_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $preregad_signed_visitors_start;?></td>
						</tr>
						
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>ONLINE REGISTER WEB</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $onlinewb_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $onlinewb_signed_visitors_start;?></td>
						</tr>
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>ONLINE REGISTER ADMIN</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $onlinead_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $onlinead_signed_visitors_start;?></td>
						</tr>
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>ONSITE REGISTER WEB</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $onsitewb_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $onsitewb_signed_visitors_start;?></td>
						</tr>
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>ONSITE REGISTER ADMIN</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $onsitead_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $onsitead_signed_visitors_start;?></td>
						</tr>
						
						<tr>
						<td colspan="2" class="spc_clas sum_font"><b>SPREADSHEET UPLOAD</b></td>
						</tr>						
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, TODAY</td>
						<td><?php echo $mass_signed_visitors_today;?></td>
						</tr>
						<tr>
						<td>TOTAL UNIQUE VISITORS, SIGNED IN, FROM PROJECT START DATE</td>
						<td><?php echo $mass_signed_visitors_start;?></td>
						</tr>
						
						</table>
						       
						
						</div>
						</div>
						
										

									</div>

								</div>
							</div>

						</div>



						<ul class="nav nav-tabs">

							<div class="overlay-heading">
								<h2> WHAT DO YOU WISH TO DO? </h2>
							</div>
							<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>
	<li class="active">
<a href="<?=base_url();?>home/summary/<?php echo $group_id;?>/<?php echo $project_id;?>" class="active"><img src="<?=base_url();?>assets/images/chat/figure.png" class="img-fluid"><span>FIGURES</span></a>
</li>       
<?php if($this->session->userdata('Fp') == 1) {?>     
<li>
<a href="<?=base_url();?>home/footprints/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>FOOTPRINTS</span></a>
</li>
<?php }?> 
     
<li>
<a href="<?=base_url();?>home/config/<?php echo $group_id.'/'.$project_id?>"><img src="<?=base_url();?>assets/images/chat/config-icon.png" alt=""><span>CONFIG PAGES</span></a>
</li>
						</ul>
					</div>
					<!-- /tabs -->

				</div>
			</div>
			<div class="footer-year">
				<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
<input type="hidden" id="project_id" value="" />
<input type="hidden" id="floorId" value="" /> 
<input type="hidden" id="grid_val" value="" /> 
<input type="hidden" id="zone_type" value="" /> 
<input type="hidden" id="content_set_id" value="" /> 

      
<script>

 $(".SER").on("keyup", function () {
	
	if ($(this).val().length >= 1) {
		$('.show-more-place').hide();
		
	} else {
		$('.show-more-place').show(); 
	}
 })
 
$(".SER").on("keyup", function() {
	  if ($(this).val().length >= 0){
	
    var value = $(this).val().toLowerCase();
    $(".palces-repeat .bt-rev").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  
    });
	  }	  
  });
  // $(".SER").on("keyup", function() {
	  // if ($(this).val().length >= 0){
	
    // var value = $(this).val().toLowerCase();
    // $(".palces-repeat .pro_type").filter(function() {
      // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  
    // });
	  // }
  // });

	
	
var dragItem = document.querySelector("#item");
				var container = document.querySelector("#container");

				var active = false;
				var currentX;
				var currentY;
				var initialX;
				var initialY;
				var xOffset = 0;
				var yOffset = 0;
		 
				//element = document.getElementById("item").style.cssText = "width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: "+height+"px;left: "+width+"px;z-index: 11;";

				container.addEventListener("click", clicked, false);

				function clicked(e) {
					console.log("currentx ==>" + e.clientX + "  currentY ==>" + e.clientY);
					var xPosition = event.clientX - container.getBoundingClientRect().left - (dragItem.clientWidth / 2);
					var yPosition = event.clientY - container.getBoundingClientRect().top - (dragItem.clientHeight / 2);
					dragItem.style.left = xPosition + "px";
					dragItem.style.top = yPosition + "px";
					
				}

$('#container-4').click(function(e) {
  var x = e.clientX;
  var y = e.clientY;
  var coor =  x + "," + y;
  var project='<?=$project_id;?>'; 
  var floorId='<?=$floor;?>';
  var grid_val=$('#grid_val').val();
  
 if(floorId==0 || grid_val==''){
	  
  }else{
	  
  var url='<?php echo base_url();?>places/placeByzone';
  $.ajax({  
		type: "POST",
		url: url, 
		data: {floorId:floorId,grid_val:grid_val},
		success: function(data)
		{
			var data=JSON.parse(data);
			console.log(data);
			if(data.zone_type!=null){
					$('.common-space').empty();
					$('.common-space').text(data.zone_type +', '+ data.zone_name);
					$('#zone_type').val(data.zone_type);
					if(data.zone_type=='COMMON SPACE'){
$('.take-a-look').show();
}
			}else{
				$('.common-space').text('UNUSED SPACE');
			} 
		}
	})
  }
  if(project=='' || floorId=='' || grid_val==''){
	  
  }else{
	   var url='<?php echo base_url();?>places/placeByFloorHistory';
	$.ajax({  
		type: "POST",
		url: url, 
		data: {floorId:floorId,activity:coor,project:project,grid_val:grid_val},
		success: function(data)
		{
			var data=$.trim(data);
			
			if(data){
				var zone_type=$('#zone_type').val();
				if(zone_type=='COMMON SPACE'){
$('.take-a-look').show();
}
				$('#content_set_id').val(data);

				if(zone_type=='DISPLAY SPACE'){
					var grid_val=$('#grid_val').val();
					var data={content_id:data,grid_val:grid_val}
						$.fancybox.getInstance('close');
						
						$.fancybox.open({
						maxWidth  : 800,
						fitToView : true, 
						width     : '100%',
						height    : 'auto',
						autoSize  : true,
						type        : "ajax",
						src         : '<?php echo base_url(); ?>places/getContentData',
						ajax: { 
						   settings: { data : data, type : 'POST' }
						},
						touch: false,
						 clickSlide: false,
						clickOutside: false
						
					});
				}
			}else{
				$('#content_set_id').val('');
			}
		}
	})
  }
})

$("body").on('click','.take-a-look',function(){ 
	var id=$('#content_set_id').val();
	var grid_val=$('#grid_val').val();
	var zone_type=$('#zone_type').val();
if(id=='' || grid_val=='' || zone_type!='COMMON SPACE'){
		  
	  }else{
		var data={content_id:id,grid_val:grid_val}
	   $.fancybox.getInstance('close');
								$.fancybox.open({
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto',
			autoSize  : true,
			type        : "ajax",
			src         : "<?=base_url();?>places/getContentData",
			ajax: { 
			   settings: { data : data, type : 'POST' }
			},
			touch: false,
			 clickSlide: false,
			clickOutside: false
			
			});
		  }
	
});
</script>



<style>
	#svga-gravataravatar {

		display: none !important;
	}

	#svga-shareavatar {
		display: none !important;
	}

	#container {
		position: relative;
		overflow: hidden;
		cursor: pointer;
	}

	#item {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}


	#item {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}

	#item:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item:hover {
		cursor: pointer;
	}
</style>
<script>
	$(document).ready(function() {
		$("#svga-downloadavatar").css("display", "none");
		let gender = '<?php echo $this->session->userdata('gender'); ?>';
		// alert(gender);
		if (gender == 'male') {
			$("#svga-start-boys").click();
		} else if (gender == 'female') {
			$("#svga-start-girls").click();
		} else {
			$("#svga-start-boys").click();
			$(".svga-row").css("display", "none");
		}


		$("#downloadavatar").click(function() { 
			//  $("#svga-png-one").click();  
			$('#avatar_small_dyanmic').click();
		});


	});
</script>


<!-- Abhishek Gupta Pointer starts here -->

<!-- Ends here -->