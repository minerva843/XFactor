
		
		<?php// session_start();?>
		

<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main summary-stats">
       
				<div class="col-md-9 chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?=$projects_details->project_name;?>.  </h2>
					</div>
					
					<div class="avtar-filter">
						<div class="row">

							<div class="col-md-6">
								<div class="user-location">
									<div id="grid_number" data-gridid=""> SELECTED CONTACT WAS AT : </div>
									<div class="select-box">
																											
									</div>
								</div>   
																	
							</div>

							<div class="col-md-6">
								<div class="looka-took">
									<span class="you-are"> SELECTED CONTACT WAS EXPLORING :</span>
									<span class="common-space">  </span>
									<button class="take-a-look" style="display:none;"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>
					

					<div class="chat-feature flor-left">
<div class="avtar-left to-start-select" id="container">

<div class="demo1">

<div class="container" id="container-4">
<p class="pl-kkc">TO START, SELECT A CONTACT ON THE RIGHT.</p>
</div>

</div>

</div>
</div>
					
				</div>  

				<div class="col-md-3 avtar-sidebar summary_right_tab">
					<div class="tabbable tabs-below">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right">
									<h2> FOOTPRINTS </h2>
									
									
						<div class="chat-main">
							<div class="top-search">
	<div class="row">
	<div class="col-md-6 p-r-5">

	<form name="select" method="post" action="">
	<select name="footprint" id="selectposttype">
	<option value="all" <?php if($guest_foot == 'all'){ echo 'selected';}?>> SHOW ALL GUESTS </option>
	<option value="nologin" <?php if($guest_foot == 'nologin'){ echo 'selected';}?>>SHOW NO LOG IN ONLY</option>
	<option value="login" <?php if($guest_foot == 'login'){ echo 'selected';}?>>SHOW LOG IN ONLY</option>
	</select>
	</form>
	</div>
	<div class="col-md-6 p-l-5"> 
	<form name="search" class="searchform" method="post" action="">
	<input type="text" name="search" class="search SER" placeholder="SEARCH: " value="<?php echo @$search;?>">
	</form>
	</div>
	</div>
	</div>		
         <div class="inner-chat all-online"> 
				<?php foreach($guest as $user){ //print_r($user);?>
                    <div class="nearme-box clearfix rowguest"> 
					<a href="<?=base_url();?>home/program_foot/<?=$user->user_ID?>">
					<?php if(empty($user->avatar)) {?>
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<?php } else {?>
					<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$user->avatar);?>">
					<?php }?>
					<div class="nearme-detail">
					<p><?php if($user->guest_type == 'UNKNOWN'){
						echo $user->guest_type.', '.$user->ip_address;
					}
					else 
					{
						echo $user->guest_type.', '.$user->salutation.' '.$user->First_Name.' '.$user->last_name.', '.$user->company;
					}?></p>
					</div>
					</a>
					</div>
				<?php }?>

                    <!--div class="nearme-box clearfix rowguest"> 
					<a href="<?=base_url();?>home/workshop_foot">
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>
					</div>
					</a>
					</div>	      

					<div class="nearme-box clearfix rowguest"> 
					<a href="<?=base_url();?>home/post_foot">
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>
					</div>
					</a>
					</div>	    

					<div class="nearme-box clearfix rowguest"> 
					<a href="<?=base_url();?>home/info_foot">
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>   
					</div>
					</a>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>
					</div>
					</div>
					
					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	
					
					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>
					</div>
					</div>
					
					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	
					
					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>BOOTH SPONSOR, CISCO</p>
					</div>
					</div>
					
					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div>	

					<div class="nearme-box clearfix rowguest"> 
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<div class="nearme-detail">
					<p>DELEGATE, CISCO</p>
					</div>
					</div-->						
					
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
	<li>
<a href="<?=base_url();?>home/summary/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/figure.png" class="img-fluid"><span>FIGURES</span></a>
</li>   
<?php if($this->session->userdata('Fp') == 1) {?>     
<li class="active">
<a href="<?=base_url();?>home/footprints/<?php echo $group_id;?>/<?php echo $project_id;?>" class="active"><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>FOOTPRINTS</span></a>
</li>
<?php }?>
<li>
<a href="<?=base_url();?>home/config/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/config-icon.png" alt=""><span>CONFIG PAGES</span></a>
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

$(document).ready(function() {
  $('#selectposttype').on('change', function() {
     this.form.submit();
  });
  $(".SER").on("keyup", function () {
	  var search = $('.search').val();
	  $.ajax({
        url: '<?php echo base_url('home/footprints')?>',
        type: 'post',
        data: {search:search},
        success: function (res)
        {
			console.log(res);
			
			$('.inner-chat').html(res);
			
        }
    });       
  });
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