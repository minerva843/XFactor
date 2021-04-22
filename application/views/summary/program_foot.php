
		
		<?php// session_start();?>
		

<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main summary_stats_left">
        
				<div class="col-md-9 chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?=$projects_details->project_name;?>.  </h2>
					</div>
					
					<div class="avtar-filter flter_place">
						<div class="row">

							<div class="col-md-6">
								<div class="user-location">
									<div id="grid_number" data-gridid=""> SELECTED CONTACT WAS AT :</div>
									<div class="select-box">
										 <?php echo $getdetailed_data['name'];?>																	
									</div>
								</div>   
																	
							</div>

							<div class="col-md-6">
								<div class="looka-took">
									<span class="you-are"> SELECTED CONTACT WAS EXPLORING : </span>
									<span class="common-space"> <?php echo $getdetailed_data['zone_name'];?>	 </span>
									<button class="take-a-look" style="display:none;"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>
					

<div class="chat-feature flor-left">
<div class="avtar-left to-start-select" id="container">

<?php if(isset($history_id) && !empty($history_id))
{ 
	if(isset($getdetailed_data['icons']) && !empty($getdetailed_data['icons']))
	{
		//print_r($getdetailed_data);die;
		foreach($getdetailed_data['icons'] as $icon) { 
		//print_r($icon);die;
		$floor_plan_drop_point=explode(',',$getdetailed_data['floor_plan_drop_point']);
		$width=$floor_plan_drop_point[0];
		$height=$floor_plan_drop_point[1];
		//print_r($width);print_r($height);die;
		if($getdetailed_data['module'] == 'FLOOR PLAN')
		{
			//$top = $icon['top']/2;
			if($icon['left'] >0){
				$left=$icon['left']-26;
			}else{
					$left=0;
			}
			//print_r($getdetailed_data['floor_plan_drop_point']);die;
			
			//print_r($floor_plan_drop_point);die;
			$da=$floor_plan_drop_point[1]/2;
			$mytop=$icon['top']-$da+100;
			if($mytop >0){
				$top=$mytop;
			}else{
				$top=0;
			}
		?>
			
		<?php }
		else
		{
			$position=json_decode($icon['drag_position']);
			$dyTop=$position->top;
			$dyTop=explode("px",$dyTop);
			$dyTopPos=$dyTop[0];
			$top =  $dyTopPos;

			$dyLeft=$position->left;
			$dyLeft=explode("px",$dyLeft);
			$dyLeftPos=$dyLeft[0];
			$left =  $dyLeftPos;
                             
			if(in_array($dyTopPos, range(0, 690)) && in_array($dyLeftPos, range(0, 1280))) {
				$popupAI=0;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+54;
				$Fleft=$dyLeftPos-379;
			}

			if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(0, 200))) {
				//$popupAI=1;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+261;
				$Fleft=$dyLeftPos+34;
				
			}
			if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(0, 200))) {
				//$popupAI=3;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+61;
				$Fleft=$dyLeftPos+36;
				
			}
			if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(201, 500))) {
				//$popupAI=6;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+63; 
				$Fleft=$dyLeftPos+36;
			}
			if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(501, 1000))) {
				//$popupAI=8;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+56;
				$Fleft=$dyLeftPos-381; 
			}
			if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(1001, 1280))) {
				//$popupAI=4;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+56;
				$Fleft=$dyLeftPos-379;
			}
			if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(951, 1280))) {
				//$popupAI=2;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+259;
				$Fleft=$dyLeftPos-384;
			}
			if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(501, 950))) {
				//$popupAI=7;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+255;   
						$Fleft=$dyLeftPos+37;
			}
			if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(201, 500))) {
				//$popupAI=5;
				$popupAI=rand(1000,9999);
				$Ftop=$dyTopPos+257;
				$Fleft=$dyLeftPos+34;
			}
			
			if(!empty($Ftop)) {?> 
				<script>
				$(document).ready(function(){
					$('#place_popup<?=$popupAI;?>').modal('toggle');
				})

				</script>
				<style>
				.tooltips-inner p{padding-top:9px !important;}
				</style>
				<div id="place_popup<?=$popupAI;?>" class="modal fade place-model-popup" role="dialog" style="top: <?=$Ftop;?>px;left: <?=$Fleft;?>px;">
				  <div class="modal-dialog">
					<div class="modal-content">
					 
					  <div class="modal-body">
							
					  <div class="tooltips"> 
					  <div class="tooltips-inner">
						<h2><?=$icon['post_title'];?></h2>
						<p><?=$icon['post_details'];?></p>
						</div>  
					   <div class="quick-intro"> 
						<div class="chat-left">  </div> 
						<div class="chat-close"><!--<a href="#" class="rem_close" data-dismiss="modal">CLOSE</a>--> </div>
						</div>    
					   
					  </div>
					  </div>
					 
					</div>
				  </div>
				</div>
			<?php }

		}
		if($getdetailed_data['module'] == 'ICON') {?>
			<img src="<?= base_url(); ?>assets/images/place-icon.png" class="place-drag-icon" style="touch-action: none; user-select: none; position: absolute; z-index: 11; <?php echo 'top : '.$top.'px; left: '.$left.'px';?> ;">
		<?php } else {?>
			<div id="item" class="red_dots" style="touch-action: none; user-select: none; position: absolute; z-index: 11; <?php echo 'top : '.$top.'px; left: '.$left.'px';?> ;">
							</div>
		
		<?php } } }?>
	
<?php }?>


<div class="demo1">

<div class="container" id="container-4">
<?php if(isset($history_id) && !empty($history_id))
{ ?>
		<?php if($getdetailed_data['module'] == 'FLOOR PLAN')
		{ 
			$url = base_url().'assets/floor_plan/';?>
			<img id="demo-4" class="floorimg" src="<?php echo $url.$getdetailed_data['image'];?>" alt="your image" style="width:<?php echo $width;?>px;height:<?php echo $height;?>px">
		<?php }
		else if($getdetailed_data['module'] == 'ICON')
		{
			$url = base_url().'temp/';?>
			<img id="demo-4" class="floorimg" src="<?php echo $url.$getdetailed_data['image'];?>" alt="your image" style="width:<?php echo $width;?>px;height:<?php echo $height;?>px">
		<?php }
		else if($getdetailed_data['module'] == 'WORKSHOP')
		{?>
			<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="row large-button m-b-5">
						<div class="col-md-12">
							<h3> YOU ARE CURRENTLY TAKING PART IN A WORKSHOP </h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="workshop-profile">
							<div class="row">
								<div class="col-md-4">

									<?php
									//echo $avatar;
									if (!empty($getdetailed_data['avatar'])) { ?>

										<img src="<?= base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $getdetailed_data['avatar']; ?>" class="img-fluid">

									<?php } else { ?>
										<img src="<?= base_url(); ?>assets/images/sample.png" class="img-fluid">


									<?php } ?>



								</div>
								<div class="col-md-8">
									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">DISPLAY NAME </label>
										<div class="col-sm-7">
											<div class="zone-label">: <?php
																		echo $getdetailed_data['username'];

																		?> </div>
										</div>
									</div>




									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">COMPANY NAME</label>
										<div class="col-sm-7">
											<div class="zone-label"> : <?php echo $getdetailed_data['company'];
																		?>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">DESIGNATION</label>
										<div class="col-sm-7">
											<div class="zone-label"> : <?php echo $getdetailed_data['designation']
																		?> </div>
										</div>
									</div>

								</div>

							</div>
						</div>

						<div class="workshop_inst">
							<div id="instructions">
								<p> INSTRUCTIONS FOR THE WORKSHOP WILL APPEAR HERE WHEN A WORK SHOP IS SELECTED.</p>
							</div>

						</div>

					</div>
				</div>
			
			</div>
			<div class="col-md-6">
				<div class="program-workshops workshop-left">
				<p class="running_latter"><b>SCREEN URL1 :</b> <?php echo $getdetailed_data['screenurl1'];?></p> 
				<p> <b>SCREEN URL1 REMARKS :</b> <?php echo $getdetailed_data['screenremarks1'];?> </p>
				</div>
				
			
			</div>
			</div>
			<div class="row">
			<div class="col-md-6">
				<div class="program-workshops">
				<p class="running_latter"><b>SCREEN URL2 :</b> <?php echo $getdetailed_data['screenurl2'];?></p>
				<p> <b>SCREEN URL2 REMARKS :</b> <?php echo $getdetailed_data['screenremarks2'];?> </p>
			</div>
			</div>   
			    
			<div class="col-md-6">
				<div class="program-workshops workshop-left">
				<p class="running_latter"><b>SCREEN URL3 :</b> <?php echo $getdetailed_data['screenurl3'];?></p>
				<p><b>SCREEN URL3 REMARKS :</b>  <?php echo $getdetailed_data['screenremarks3'];?> </p>
				
				</div>
				
				<!--div class="row large-button">
				<div class="col-md-9">
				<div class="large-button-left">  </div>
				</div>
				<div class="col-md-3 text-right">
				<span></div>
				</div -->
			 
			</div>
			</div>
		<?php }?>
		
<?php } ?>
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
	<div class="col-md-8 p-r-5"> 
	<form name="select" method="post" action="<?php echo base_url('home/program_foot/'.$user_id)?>">
	<select name="footprint" id="selectposttype">
		<option value=""> SHOW ALL CAPTURED FOOTPRINTS </option>
		<option value="FLOOR PLAN" <?php if($footHis == 'FLOOR PLAN'){ echo 'selected';}?>>SHOW ALL FLOOR PLANS ONLY</option>
		<option value="WORKSHOP" <?php if($footHis == 'WORKSHOP'){ echo 'selected';}?>>SHOW ALL WORKSHOPS ONLY</option>
		<option value="INFO ICON" <?php if($footHis == 'INFO ICON'){ echo 'selected';}?>>SHOW ALL INFO ICONS ONLY</option>
	</select>
	</form>
	</div>
	<div class="col-md-4 p-l-5"> 
	<a href="<?php echo base_url('home/footprints')?>" class="search another_contact">SELECT ANOTHER CONTACT</a>
	</div>
	</div>    
	</div>		
         <div class="inner-chat1 all-online foot_print_top"> 
			
                    <div class="nearme-box clearfix rowguest"> 
					<?php if(empty($guestData->avatar)) {?>
					<i class="far fa-user-circle" aria-hidden="true"></i> 
					<?php } else {?>
					<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$guestData->avatar);?>">
					<?php }?>
					<div class="nearme-detail">
					<p><?php  if($guestData->guest_type == 'UNKNOWN'){
						echo $guestData->guest_type.', '.$guestData->ip_address;
					}
					else
					{
						echo $guestData->guest_type.', '.$guestData->salutation.' '.$guestData->First_Name.' '.$guestData->last_name.', '.$guestData->company;
					}?></p>
					</div>
					</div> 
					
					<div class="foot_print">
					<?php foreach($userHistory as $data){ 
					if(!empty($data->zone_name))
					{
						$zone_name = ', '.$data->zone_name;
					}
					else
					{
						$zone_name = '';
					}
						
					if($data->module_name == 'WORKSHOP'){ 
						if($data->zone_name == 'ENTRY')
						{
							$x = 'e';
							$featureName = '';
							$sel = $data->activityTime;
						}
						else if($data->zone_name == 'EXIT'){
							
							$x = 'x';
							$featureName = ', '.$data->feature_name;
							$sel = $data->activityTime;
						}
						else
						{
							$x = '';
							$data->zone_name = $data->feature_name;
							$featureName = '';
							$sel = $data->id;
						}?>
						<p><a <?php if($selection == $sel){ echo 'class="selected" id="'.$history_id.'"';}?> href="<?php echo base_url();?>home/program_foot/<?=$user_id;?>/<?=$data->id;?>/<?=$x?>"><?php echo date('Y-m-d H:i:s',strtotime($data->activityTime)).'h. '.$data->module_name.', '.$data->floor_plan_name.$zone_name.$featureName; ?></a></p>
					<?php }
					else {?>
					<p><a <?php if($selection == $data->id){ echo 'class="selected" id="'.$history_id.'"';}?> href="<?php echo base_url();?>home/program_foot/<?=$user_id;?>/<?=$data->id;?>"><?php echo date('Y-m-d H:i:s',strtotime($data->activityTime)).'h. '.$data->module_name.', '.$data->floor_plan_name.$zone_name; ?></a></p>
					<?php } }?>
					<!--p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p>
					<p>YYYYMMDD HHHMM. INFO ICON. CONTENT SET NAME</p> 
					<p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p>
					<p>YYYYMMDD HHHMM. INFO ICON. CONTENT SET NAME</p>
					<p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p> 
					<p>YYYYMMDD HHHMM. INFO ICON. CONTENT SET NAME</p>
					<p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p>
					<p>YYYYMMDD HHHMM. INFO ICON. CONTENT SET NAME</p>
					<p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p>
					<p>YYYYMMDD HHHMM. INFO ICON. CONTENT SET NAME</p>
					<p>YYYYMMDD HHHMM. FLOORPLAN. FLOOR PLAN NAME. ZONE NAME</p>
					<p>YYYYMMDD HHMM. WORKSHOP. WORKSHOP NAME.</p-->
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
	<li>
<a href="<?=base_url();?>home/summary/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/figure.png" class="img-fluid"><span>FIGURES</span></a>
</li>       
<li class="active">
<a href="<?=base_url();?>home/footprints/<?php echo $group_id;?>/<?php echo $project_id;?>" class="active"><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>FOOTPRINTS</span></a>
</li>

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
		var target = '<?php echo $history_id; ?>';
		console.log(target);
		var aTag = $("#"+target);
		console.log(aTag.offset().top);
		var sc = parseFloat(aTag.offset().top) - parseFloat(120) - parseFloat(150);
		console.log(sc);
		if(sc>500)
		{
			$('.foot_print').animate({scrollTop: sc},'fast');
		}
		
		$('.modal-backdrop').addClass('hide');
	});
</script>


<!-- Abhishek Gupta Pointer starts here -->

<!-- Ends here -->