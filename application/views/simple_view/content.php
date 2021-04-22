<div class="virtual_view avatar simple_view_outer">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		           
		    
		<div class="row avatar-main">
			

		<div class="col-md-12 avtar-sidebar simple-view">
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
					<div class="simple_view_fixed_top content-mob-scroll">

<div class="overlay-heading"><h2><?php if(!empty($project_name)){ echo $project_name; }else{ echo 'PROJECT NAME'; }?></h2> </div>   
						<div class="sml-container">
						<ul class="nav nav-tabs simple_tabs"> 

							<li>
							<a href="<?=base_url();?>simple_view/places/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
							</li>
							
							<li>
							<a class=" track_menu" data-track="PLACES" data-track="AVATAR" class="track_menu" href="<?=base_url();?>simple_view/avatar/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
							</li> 
							<li>  
							<a data-track="CHAT" class="track_menu" href="<?=base_url();?>simple_view/chat/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
							</li>
							<li class="active">
							<a data-track="CONTENT" class="track_menu active" href="<?=base_url();?>simple_view/content/<?=$project_id?>" class="active"><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

							</li>
							<li>
							<a data-track="POSTS" class="track_menu" href="<?=base_url();?>simple_view/post/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a>
							</li>   

							<li>

							<a data-track="PROGRAM" class="track_menu" href="<?=base_url();?>simple_view/program/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
							</li>  
					
				</ul>
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
				<h2> ON DEMAND CONTENT</h2>
				</div>
<div class="simle_view_midde content-mob-scrolls">	

<div class="mobile-scroll">
<div class="sml-container">
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

<div class="col-md-12"> 
<select class="demand_content">

<option value=""> SELECT AN ON DEMAND CONTENT TO DOWNLOAD</option>
<?php foreach($contents as $val){?> 
<option value="<?=$val->id?>"> <?=$val->oncontent_title?></option>
<?php }?> 
</select>
</div>
   
 
</div>
</div>  

<div class="demand-img"> 
<div class="row">
<div class="col-md-12"> 

<!--iframe class="demand_img" src="" name="iframe_a" width="384px" height="216px"></iframe-->
<img src="" width="380px" height="216px" class="demand_img">
<a href="" class="demand_doc" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" ></a>
<video width="380px" height="216px" controls class="demand_video" id="demand_video">
</video>
<audio width="380px" height="216px" controls class="demand_audio" id="demand_audio">
</audio>
</div>
    
</div>
   
<div class="row file_size_download">   

<div class="col-md-9"> 
<p class="demand-size">  </p>
</div>

<div class="col-md-3"> 
<a href="#" class="demand-download"> DOWNLOAD</a>
</div>
 
</div>

</div>

</div>
<script>
//http://13.235.169.150/XFactor/assets/images/what-img1.png
$('.demand-download').hide();
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
		$('.demand-download').hide();
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
				$('.demand-download').show();
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
						$('.demand_video').empty().html('<source src="'+data.file_name+'" type="video/mp4" class="">');
					}
					if(data.file_type=='AUDIO'){
						$('.demand_doc').hide();
						$('.demand_img').hide();
						$('.demand_video').hide();
						//$('.demand_audio').attr('src','');
						$('.demand_audio').empty();
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
</div>

<h2 class="mt-10">LIVE STREAM</h2>
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
<div class="sml-container">

<div class="ondemand-chat">
<div class="top-search">
<div class="row">

<div class="col-md-12"> 
<select class="video-stream" style="color: rgb(0, 0, 0);">
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
		<a class="close" href="#">×</a>
		<div class="content">
			<!--iframe class="video_file" src=""  width="384px" height="216px"></iframe-->
			<!--video width="100%" height="207px" controls class="video_file">
  
</video-->
		</div>
	</div>    
</div>

<div class="demand-img"> 

<div class="row">
<div class="col-md-12"> 

<iframe class="video_file" src=""  width="380px" height="216px" style="display:none">  

</iframe>

</div>
<div class="col-md-3"> 

</div>    
</div>

</div>
<script>

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

<div class="col-md-12"> 
<select class="audio-stream" style="color: rgb(0, 0, 0);">
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
<div class="col-md-12"> 
<iframe class="audio_file" src=""  width="380px" height="96px" style="display:none"></iframe> 
<div style="width:380px; display:none;" class="no-audio-stream">   
<div  class="live_stream"> 
	<b>Stream Not Available</b>	
</div>
</div>
 
</div>
<div class="col-md-3"> 
<script>

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

</div>
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



<!-- Abhishek Gupta Pointer starts here -->

<!-- Ends here -->