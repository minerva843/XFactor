<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">
<?php $this->db->select('*');
		$this->db->from('xf_mst_setting');
		$query = $this->db->get();
		$topprojectdata = $query->row();?>

			<div class="row avatar-main">

				<div class="col-md-9 avtar-position chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?php if(!empty($project_name)){echo $project_name;
						if($topprojectdata->header_lets_explore_title){ echo '. '.$topprojectdata->header_lets_explore_title; }else{ echo '. START EXPLORING. HAVE FUN! =)'; }
						 }else{ echo 'CLICK “PLACES” ON BOTTOM RIGHT, THEN SELECT A PLACE TO GO.'; }?> </h2>
					</div>
					<div class="avtar-filter">
						<div class="row">

							<div class="col-md-6">
								<div class="user-location">
									<div id="grid_number" data-gridid=""> YOU ARE CURRENTLY AT &nbsp; &nbsp; : </div>
									<div class="select-box">
									<?php if(count($floors)!=1){?>
										 <select name="zonetype" id="GetFloor">
					 
						<option value="" >SELECT A FLOOR PLAN</option>
						<?php foreach($floors as $floor1){
							if(!empty($floor)){
							?>
							
							<option value="<?=$floor1->id?>" <?php if($floor1->id == $floor){ echo 'selected';}?>><?=$floor1->floor_plan_name?></option>
							<?php }else{?>
							
							<option value="<?=$floors[0]->id?>" <?php if($floors[0]->id ){ echo 'selected';}?>><?=$floors[0]->floor_plan_name?></option>
							<?php } }?> 
					</select>
					   
								
					
									<?php }else{ 
											if(!empty($floors[0]->floor_plan_name)){
												echo $floors[0]->floor_plan_name;
											}else{
												echo ' <select name="zonetype" id="GetFloor">
					 
												<option value="" >SELECT A FLOOR PLAN</option>
												</select>';
											}
									}?>
									
									
								</div>
								</div>	
								<?php if(count($floors)!=1){?>
								<span class="morethen">MORE THAN 1 ZONE AVAILABLE. USE DROP DOWN BOX TO SELECT ZONE.</span>
								<?php }?>
							</div>

							<div class="col-md-6">
								<div class="looka-took">
									<span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span>
									<span class="common-space"> <?php if(empty($project_id)){ echo '<p style="color:red">TO START, SELECT A PLACE TO GO TO FIRST.</p>'; }else{ echo $GetHistory->zone_text; }?> </span>
									<input type="hidden" id="zone_text">
									<button class="take-a-look" style="display:none;"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>

					<div class="chat-feature flor-left"><?php if(!empty($No_registerUser)){ echo $No_registerUser; ?>
					
					<?php }else{?>
						<div class="avtar-left to-start-select" id="container">
						
						<?php 
						if(!empty($top) && !empty($left)){
							$top=$top;
							$left=$left;
						}else{
							$left=1250; 
							
							$top=0;
						}
						
						 ?>
		 <?php if(!empty($img)){?>
						<div id="item" class="red_dots" style="touch-action: none; user-select: none; position: absolute; top: <?php echo $top;?>px;left: <?=$left?>px;z-index: 11;">
							</div>
							
							<!--div id="item" style="width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: <?php echo $da;?>px;left: <?=$widt?>px;z-index: 11;">
							</div-->
		 <?php }?>
							<div class="demo1">
 	
<div class="container" id="container-4" >


	<?php
            
        echo "<table border ='1' class='table table1' style='border-collapse: collapse; ' >";
		$alpha = range('I', 'A'); 
		for ($i=0,$row=1; $row <= 9;$i++, $row++) { 
		echo "<tr> \n";
		for ($col=1; $col <= 16; $col++) { 
		   $p = $col;
                    if($p>9){
			   $text = $alpha[$i].$p;
			   } else { 
			   $text =  $alpha[$i].'0'.$p;
	            }
                   
                        $myclass = "";
                        $check = '<input type="checkbox" checked />';
 
                   
		   echo "
		   <td class='gridboxtd ".$myclass." action_".$text." '   id='action_$alpha[$i]$p'>
		   <input type='hidden' id='get_$alpha[$i]$p' value=".$text.">
		   ";
	            echo $text;	    
		   echo "</td> \n"; 
		   echo "<script>
$(document).ready(function(){
	$('#action_$alpha[$i]$p').click(function(){
		var temp = $('#get_$alpha[$i]$p').val();
		
		$('#grid_val').val(temp);
	})
})

</script>";
			}
			echo "</tr>";
		}
		echo "</table>";
	?>
	<?php if(!empty($img)){?>
	<img id="demo-4" class="floorimg" src="<?=$img;?>" alt="your image" style="width:<?=$width?>px;height:<?=$height;?>px">
	<?php }?>
</div>

 
							
 

</div>
							
						</div>
					<?php }?>
					</div>
					
				</div>

<div class="col-md-3 avtar-sidebar">
		<div class="tabbable tabs-below">
		<div class="tab-content">		
       
<div class="tab-pane chats active" id="6">
<div class="avatar-right">
<div class="common_divF">
<h2> ON DEMAND CONTENT</h2>
<?php if($No_registerUser_condition==true ){ ?>
<div class="fron-postion1">
<?php  

if(empty($project_id)){
echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';

}else{
	echo '<p class="gsm-pd">Registration is required to access Content.</p>';
}
?>
</div>
<?php
}else{
 ?>
<div class="ondemand-chat">
<div class="top-search">
<div class="row">

<div class="col-md-9"> 
<select class="demand_content">

<option value=""> SELECT AN ON DEMAND CONTENT TO DOWNLOAD</option>
<?php foreach($contents as $val){?>
<option value="<?=$val->id?>"> <?=$val->oncontent_title?></option>
<?php }?> 
</select>
</div>
<div class="col-md-3"> 
<a href="#" class="demand-download"> DOWNLOAD</a>
</div>  
 
</div>
</div>

<div class="demand-img"> 
<div class="row">
<div class="col-md-9"> 

<!--iframe class="demand_img" src="" name="iframe_a" width="384px" height="216px"></iframe-->
<img src="" width="368px" height="179px" class="demand_img">
<a href="" class="demand_doc" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" ></a>
<video width="304px" height="171px" controls class="demand_video" id="demand_video">
</video>
<audio width="304px" height="171px" controls class="demand_audio" id="demand_audio">
</audio>
</div>
<div class="col-md-3"> 
<p class="text-center demand-size">
   
</p>
</div>     
</div>
</div>

</div>
<script>
//http://13.235.169.150/XFactor/assets/images/what-img1.png
$('.demand_doc').hide();
$('.demand_img').hide();
$('.demand_video').hide();
$('.demand_audio').hide();
$('.demand_content').change(function(){
	
	var demand_audio = document.getElementById("demand_audio");
	var demand_video = document.getElementById("demand_video");
		function pausedemand_video() {
			demand_video.pause();
			demand_video.currentTime = 0;
		}
		 pausedemand_video()
		function pausedemand_audio() {
			demand_audio.pause(); 
			demand_audio.currentTime = 0;
		}
		pausedemand_audio()
	var demand_content=$('.demand_content').val();
	var url='<?php echo base_url();?>content_page/GetContentById';
	
	if(demand_content==''){
		$('.demand_img').hide();
		$('.demand_video').hide();
		$('.demand_audio').hide();
		$('.demand-size').hide();
		$('.demand_img').attr("src",'');
		$('.demand-download').attr("href",'');
		$('.demand-download').removeAttr("download");
	}else{
		$.ajax({  
			type: "POST", 
			url: url,  
			data: {id:demand_content},
			success: function(data)
			{
				var data=JSON.parse(data);
				if(data.file_name==''){ 
					$('.demand_doc').hide();
					$('.demand_img').hide();
					$('.demand_video').hide();
					$('.demand_audio').hide();
					$('.demand_img').attr("src",'');
					$('.demand-download').attr("href",''); 
					$('.demand-download').removeAttr("download");
					
				}else{
					if(data.file_type=='IMAGE'){
						$('.demand_doc').hide();
						$('.demand_video').hide();
						$('.demand_audio').hide();
						//$('.demand_img').attr('src','');
						$('.demand_img').show();
						$('.demand_img').attr("src",data.file_name);
					}
					if(data.file_type=='DOCUMENT'){
						$('.demand_video').hide();
						$('.demand_audio').hide();
						$('.demand_img').hide();
						//$('.demand_doc').attr('href','');
						$('.demand_doc').show();
						$('.demand_doc').attr("href",data.file_name);
					}
					if(data.file_type=='VIDEO'){
						$('.demand_img').hide();
						$('.demand_audio').hide();
						$('.demand_doc').hide();
						//$('.demand_video').attr('src','');
						$('.demand_video').show();
						//$('.demand_video').attr("src",data.file_name);
						$('.demand_video').html('<source src="'+data.file_name+'" type="video/mp4" class="">');
					}
					if(data.file_type=='AUDIO'){
						$('.demand_doc').hide();
						$('.demand_img').hide();
						$('.demand_video').hide();
						//$('.demand_audio').attr('src','');
						$('.demand_audio').show();
						//$('.demand_audio').attr("src",data.file_name);
						$('.demand_audio').html('<source src="'+data.file_name+'" type="audio/mp3" class="">');
					}
					$('.demand-download').attr("href",'');
					var down='download';
					$('.demand-download').attr(down,'');
					//$('.demand_img').empty();
					
					$('.demand-size').show();
					
					$('.demand-size').html('FILE SIZE : '+data.file_size+' MB');
					$('.demand-download').attr("href",data.file_name);
				}
			}
		});
	}
})
</script>
<?php }?>
<h2 style="margin-top: 10px;"> LIVE STREAM</h2>  
<?php if($No_registerUser_condition==true ){ ?>
<div class="fron-postion2">
<?php  
if(empty($project_id)){
echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';

}else{
	echo '<p class="gsm-pd">Registration is required to access Content.</p>';
}
?>
</div>
<?php 
}else{
 ?>
<div class="ondemand-chat">
<div class="top-search">
<div class="row">

<div class="col-md-9"> 
<select class="video-stream">
<option value=""> SELECT A VIDEO LIVE STREAM</option>
<?php foreach($videos as $val){?>
<option value="<?=$val->id?>"> <?=$val->video_stream_name?></option>
<?php }?>
</select>
</div>
<div class="col-md-3"> 
<!--<a href="#popup1" class="demand-download"> ALWAYS ON TOP</a> -->
<!-- <button disabled > ALWAYS ON TOP</button> -->

</div>  
  
</div>  
</div>

<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content">
			<!--iframe class="video_file" src=""  width="384px" height="216px"></iframe-->
			<!--video width="100%" height="207px" controls class="video_file">
  
</video-->
		</div>
	</div>    
</div>

<div class="demand-img"> 
    
<div class="row">
<div class="col-md-9"> 
<iframe class="video_file" src=""  width="304px" height="171px" style="display:none" allowfullscreen>  

</iframe>
<!--video width="368px" height="207px" controls class="video_file" style="display:none">
  
</video-->
<!--iframe class="video_file" src=""  width="384px" height="90px" style="display:none"></iframe>
<div style="width:300px;margin:20px auto 0 auto;font-size:13px;text-align:center;color:#353748;display:none;" class="no-video-stream"> 
<div style="background:#f1f1f1;border:1px solid #f1f1f1;padding:16px 15px 15px 15px;font-size:14px;border-radius:4px;font-family:Tahoma,Arial;" > 
	<b>Stream Not Available</b>	
</div>
</div-->
</div>
<div class="col-md-3"> 

</div>    
</div>

</div>
<script>
//http://13.235.169.150/XFactor/assets/images/what-img1.png

$('.video-stream').change(function(){
	
	var video_stream=$('.video-stream').val();
	var url='<?php echo base_url();?>content_page/GetVideoById';
	if(video_stream==''){
		$('.video_file').hide();
		$('.no-video-stream').hide();
		//$('.video_file').attr("src",'');
	}else{
		$.ajax({  
			type: "POST", 
			url: url,  
			data: {id:video_stream},
			success: function(data)
			{
				var data=$.trim(data);
				if(data=='No Stream Available'){
					$('.video_file').hide();
					$('.no-video-stream').show();
					//$('.demand-size').hide();
					$('.video_file').attr("src",'');
					
				}else{
					$('.video_file').empty();
					$('.no-video-stream').hide();
					$('.video_file').show();
					$('.video_file').attr("src",data);
					//$('.video_file').html('<source src="'+data+'" type="video/mp4" class="">');
					
					
				}
			}
		});
	}
})
</script>
</div>


<div class="ondemand-chat live-stream">
<div class="top-search">
<div class="row">

<div class="col-md-9"> 
<select class="audio-stream">
<option value=""> SELECT AN AUDIO LIVE STEAM </option>
<?php foreach($audios as $val){?>
<option value="<?=$val->id?>"> <?=$val->audio_stream_name?></option>
<?php }?>
</select>
</div>
<div class="col-md-3"> 
<!--<button disabled> ALWAYS ON TOP</button>-->
</div>  

</div>  
</div>         

<div class="demand-img">      
<div class="row">    
<div class="col-md-9"> 
<iframe class="audio_file" src=""  width="367px" height="120px" style="display:none" allowfullscreen></iframe> 
<div style="width:367px; display:none;" class="no-audio-stream">   
<div  class="live_stream"> 
	<b>Stream Not Available</b>	
</div>
</div>

<!--img src="http://13.235.169.150/XFactor/assets/images/content-live-strm.png" alt=""--> 
<!--audio width="368" height="45px" controls class="hide_audio">
  
</audio-->      
</div>
<div class="col-md-3"> 
 <script>
//http://13.235.169.150/XFactor/assets/images/what-img1.png

$('.audio-stream').change(function(){
	var audio_stream=$('.audio-stream').val();
	var url='<?php echo base_url();?>content_page/GetAudioById';
	if(audio_stream==''){
		$('.audio_file').hide();
		$('.no-audio-stream').hide();
	}else{
		$.ajax({  
			type: "POST", 
			url: url,  
			data: {id:audio_stream},
			success: function(data)
			{
				var data=$.trim(data);
				
				if(data=='No Stream Available'){
					
					$('.audio_file').hide();
					$('.no-audio-stream').show();
					$('.audio_file').attr("src",'');
					//$('.demand-size').hide();
					
				}else{
					$('.audio_file').empty();
					$('.no-audio-stream').hide(); 
					$('.audio_file').show(); 
					$('.audio_file').attr("src",data);
					//$('.hide_audio').html('<source src="'+data+'"  class="audio_file" type="audio/mp3">');
					
					
				}
			}
		});
	}
})
</script>
</div>    
</div>
</div>

</div>

<?php }?>
</div>
</div>
</div>  

</div>


				<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>
				<ul class="nav nav-tabs">  
	
				<div class="overlay-heading"><h2> WHAT DO YOU WISH TO DO? </h2> </div>    			
				<li>
<a class="track_menu" data-track="PLACES" href="<?=base_url();?>places/redirectanother/<?php echo $project_id.'/'.$floor.'/0';?>" ><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li>
<a data-track="AVATAR" class="track_menu" href="<?=base_url();?>avatar/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/avtar.png" alt=""><span>MY AVATAR</span></a>
</li>
<li>
<a data-track="CHAT" class=" track_menu" href="<?=base_url();?>chat_box/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li class="active"> 
<a href="<?=base_url();?>content_page/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" data-track="CONTENT" class="active track_menu"><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>
</li>
<li>
<a data-track="WORKSHOP" class="track_menu" href="<?=base_url();?>workshop/redirectanother/<?php echo $project_id;?><?php echo '/'.$floor; ?>" ><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a data-track="POSTS" class="track_menu" href="<?=base_url();?>post_front/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>  
</li>
<li>
<a data-track="PROGRAM" class="track_menu" href="<?=base_url();?>program_page/redirectanother/<?php echo $project_id;?><?php echo '/'.$floor; ?>" ><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
</li>   
					
				</ul>
			</div>
			<!-- /tabs -->
<script>
$('.track_menu').click(function(){

		var project_id='<?=$project_id;?>';
		if(project_id ==''){
			
		}else{
			var module_name=$(this).attr('data-track');
			var url='<?php echo base_url();?>places/UpdatePostIconHistory';
			$.ajax({  
				type: "POST",
				url: url,  
				data: {project_id:project_id,module_name:module_name}, 
				success: function(data)
				{
					
				} 
			});
		}
	});
</script>
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
<input type="hidden" id="zone_id" value="" /> 
<input type="hidden" id="zone_type" value="" /> 
<input type="hidden" id="content_set_id" value="" /> 
<script>

	
$('#GetFloor').change(function(){ 
	var floorId=$(this).val();
	
	window.location = '<?php echo base_url(); ?>content_page/index/<?php echo $project_id;?>/'+floorId;
	
}) 
// $("#project_type").change(function(){ 
        
        // var project_type = $('.project_type').val(); 
		
        // window.location = '<?php echo base_url(); ?>places/index/0/0/'+project_type;
        // });
</script>
<script>



	
	
var dragItem = document.querySelector("#item");
				var container = document.querySelector("#container-4");

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
	$('.take-a-look').hide();
  var x = e.clientX;
  var y = e.clientY;
  var coor =  y + "," + x;
  var project='<?=$project_id;?>'; 
  var floorId='<?=$floor;?>';
  var grid_val=$('#grid_val').val();
  
 if(floorId=='' || grid_val==''){
	  
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
					$('#zone_text').empty();
					$('.common-space').text(data.zone_type +', '+ data.zone_name);
					$('#zone_text').val(data.zone_type +', '+ data.zone_name);
					$('#zone_type').val(data.zone_type);
					$('#zone_id').val(data.zone_id);
					if(data.zone_type=='COMMON SPACE'){

}
			}else{
				$('.common-space').text('UNUSED SPACE');
				$('#zone_text').val('UNUSED SPACE'); 
			}
		}
	})
  }
  if(project=='' || floorId=='' || grid_val==''){
	  
  }else{
	   var zone_id=$('#zone_id').val();
	   var zone_text=$('#zone_text').val();
	   var url='<?php echo base_url();?>places/placeByFloorHistory';
	$.ajax({  
		type: "POST",
		url: url, 
		data: {floorId:floorId,activity:coor,project:project,zone_id:zone_id,zone_text:zone_text,module_name:'FLOOR PLAN',grid_val:grid_val,top:y,left:x},
		success: function(data)
		{
			var data=$.trim(data);
			
			if(data){
				var zone_type=$('#zone_type').val();
				$('#content_set_id').val(data);
				var content_set_id=$('#content_set_id').val();
				if(zone_type=='COMMON SPACE' || content_set_id!==''){
					 
$('.take-a-look').show();
}
				
				if(zone_type=='DISPLAY SPACE'){
					$('.take-a-look').show();
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
						   settings: { data : 'content_id='+data+'&grid_val='+grid_val, type : 'POST' }
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
//if(id=='' || grid_val=='' || zone_type!='COMMON SPACE'){
if(id=='' || grid_val==''){
		  
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
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
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