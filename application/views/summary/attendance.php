
		
		<?php// session_start();?>
		

<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">

				<div class="col-md-9 chatscreen">

					<div class="start-explor">
						<h2 class="project_name">“PROJECT NAME”.  </h2>
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
						<a href="<?=base_url();?>home/guest/<?php echo $group_id;?>/<?php echo $project_id;?>">
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
					<div class="tabbable tabs-below">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right">
									<h2> OVERVIEW</h2>
									<h3> WORKSHOPS</h3>
									
						<div class="places-main">
									

										<div class="sumry_stac_down">
						<p>TOTAL WORKSHOPS</p>
						<p>TOTAL ATTENDEES</p>
						</div>
						
						<div class="sumry_stac_down">
				        <h3>MOST ATTENDED</h3>
						<p>WORKSHOP NAME</p>
						<p>TOTAL ATTENDEES (PEAK)</p>
						<p>TOTAL ATTENDEES (PEAK TIME)</p>
						<p>AVERAGE ATTENDEES</p>
						<p>AVERAGE STAY TIME</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>(TO DO FOR TOP 5)</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>FOR ALL OTHER WORKSHOPS AFTER TOP 5
							USE HEADER
							</p>
						</div>
						
						<div class="sumry_stac_down">
				        <h3>WORKSHOP (NOT IN TOP 5)</h3>
						<p>WORKSHOP NAME</p>
						<p>TOTAL ATTENDEES (PEAK)</p>
						<p>TOTAL ATTENDEES (PEAK TIME)</p>
						<p>AVERAGE ATTENDEES</p>
						<p>AVERAGE STAY TIME</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>VERY IMPORTANT ALL WORKSHOPS MUST BE LISTED
							</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>TOTAL WORKSHOPS</p>
						<p>TOTAL ATTENDEES</p>
						</div>
						
						<div class="sumry_stac_down">
				        <h3>MOST ATTENDED</h3>
						<p>WORKSHOP NAME</p>
						<p>TOTAL ATTENDEES (PEAK)</p>
						<p>TOTAL ATTENDEES (PEAK TIME)</p>
						<p>AVERAGE ATTENDEES</p>
						<p>AVERAGE STAY TIME</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>(TO DO FOR TOP 5)</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>FOR ALL OTHER WORKSHOPS AFTER TOP 5
							USE HEADER
							</p>
						</div>
						
						<div class="sumry_stac_down">
				        <h3>WORKSHOP (NOT IN TOP 5)</h3>
						<p>WORKSHOP NAME</p>
						<p>TOTAL ATTENDEES (PEAK)</p>
						<p>TOTAL ATTENDEES (PEAK TIME)</p>
						<p>AVERAGE ATTENDEES</p>
						<p>AVERAGE STAY TIME</p>
						</div>
						
						<div class="sumry_stac_down">
						<p>VERY IMPORTANT ALL WORKSHOPS MUST BE LISTED
							</p>
						</div>

										

									</div>

								</div>
							</div>

						</div>



						<ul class="nav nav-tabs">

							<div class="overlay-heading">
								<!--<h2> WHAT DO YOU WISH TO DO? </h2> -->
							</div>
							<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>
	<!-- li class="active">
<a href="<?=base_url();?>places" class="active"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>FIGURES</span></a>
</li -->
<!-- li>
<a href="<?=base_url();?>avatar/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>"><img src="<?=base_url();?>assets/images/chat/avtar.png" alt=""><span>FOOTPRINTS</span></a>
</li --> 


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