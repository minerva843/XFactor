<div class="virtual_view avatar simple_view_outer">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
		<div class="row avatar-main">    
			

		<div class="col-md-12 avtar-sidebar simple-view">
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
					<div class="simple_view_fixed_top">
					<div class="overlay-heading"><h2><?php if(!empty($project_name)){ echo $project_name; }else{ echo 'PROJECT NAME'; }?></h2> </div>   
						<div class="sml-container">
						<ul class="nav nav-tabs simple_tabs"> 
							<li>
							<a class=" track_menu" data-track="PLACES" href="<?=base_url();?>simple_view/places/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
							</li>						
							<li>
							<a data-track="AVATAR" class="track_menu" href="<?=base_url();?>simple_view/avatar/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
							</li> 
							<li>  
							<a data-track="CHAT" class="track_menu" href="<?=base_url();?>simple_view/chat/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
							</li>
							<li>
							<a data-track="CONTENT" class="track_menu" href="<?=base_url();?>simple_view/content/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

							</li>
							<li>
							<a data-track="POSTS" class="track_menu" href="<?=base_url();?>simple_view/post/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a>
							</li>   

							<li class="active">
							<a data-track="PROGRAM" class="active track_menu" href="<?=base_url();?>simple_view/program/<?=$project_id?>" class="active"><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
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
				<h2> PROGRAM</h2> 
				</div>
				
<div class="simle_view_midde">	
     
<div class="sml-container program_height">





<?php if($No_registerUser_condition==true){ ?>
<div class="fron-postion">
<?php

if(empty($project_id)){
echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';

}else{
	echo '<p class="gsm-pd">Registration is required to access Program.</p>';
}
?>
</div>
<?php
}else{
if(empty($programs)){
 ?>
 <div class="fron-postion">
<?php
echo '<p class="gsm-pd">THERE IS NO PROGRAM / HIGHLIGHTS FOR THIS PLACE CURRENTLY.</p>';?>
</div>
	<?php }else{?>
<div class="program-chat">
<?php foreach($programs as $data){?>
<div class="program program_new clearfix">
<div class="program-right-cont">
<div class="program-contant-top"> 
<div class="program-read-more">
<a class="moreless-button moreless-button<?=$data->id;?>">SHOW MORE</a>  
</div>
<div class="program-date"><p><?php
$program_status=''; 
if($data->program_start_date_time>date('Y-m-d h:i')){
$program_status="NOT START";
}
if($data->program_end_date_time<date('Y-m-d h:i')){
$program_status="END";
}
if($data->program_start_date_time == date('Y-m-d h:i') || $data->program_end_date_time > date('Y-m-d h:i')){
$program_status="LIVE";
}

echo '<b>'.$program_status.'</b>, '.$data->program_start_date_time.'h, '.$data->program_end_date_time.'h.';
?></p> </div>

</div>
<?php $position=json_decode($data->program_position);
$PosTop=$position->top;
$PosLeft=$position->left;
?>
<div class="floor_<?=$data->id;?>" program_date="<?=$data->program_start_date_time.'h';?>" floor-id="<?=$data->floor_plan_id;?>" program-desc="<?php echo substr($data->program_details,0,180);?>" program-title="<?=$data->program_title?>" data-id="<?=$data->id;?>" PosTop="<?=$PosTop?>" PosLeft="<?=$PosLeft?>">
<h3> <?=$data->program_title?> </h3>

<?php 
$id=$data->program_id;
$query2=$this->db->get_where('xf_mst_files',array('xmanage_id'=>$id,'xmanage_module'=>'PROGRAM'));
$proj=$query2->row();
$img=$proj->file_name;
if(!empty($img)){
?>
<img src="<?php echo base_url();?>assets/program/<?=$img;?>">
<?php }?>
<div class="moretext moretext<?=$data->id;?>"> 
<div class="program-contant">     

<div class="program_new_five_top">
<p> <?php
$mydata=json_decode($data->program_presenter);
if($mydata){
			foreach($mydata as $val){
				$query2=$this->db->get_where('xf_guest_users',array('id'=>$val));
					$res=$query2->row();
				if($res){
				echo '<b>'.$res->guest_type .', '.$res->first_name.' '.$res->last_name.'</b></br>'.$res->designation.', '.$res->company;
				echo '<br>';
				echo '<br>';
				}
			} 
}
?></p>
<p> 
<?php //echo substr($data->program_details,194,1500)
echo $data->program_details; ?>
</p>
</div>
</div>

</div>
</div>
</div>

</div>
<input type="hidden" id="floor_id">
<style>
.moretext<?=$data->id;?>{
	display:none;
}

</style>
<script>
$('.moreless-button<?=$data->id;?>').click(function() {
  $('.moretext<?=$data->id;?>').slideToggle();
  var read=$('.moreless-button<?=$data->id;?>').text();
  if (read == 'SHOW LESS') {
	  $('.moreless-button<?=$data->id;?>').text("SHOW MORE")
    
  } else {
	 $('.moreless-button<?=$data->id;?>').text("SHOW LESS")
    
  }
}); 
$(document).ready(function(){
	
	
	
	$('.yes_proceed').click(function(){
		var program_id=$('#program_id').val();
		var floorId=$('#floor_id').val();
		var project_id='<?=$project?>';
		window.location = '<?php echo base_url(); ?>program_page/proceed/'+project_id+'/'+floorId+'/'+program_id;
	})
				
}) 
</script>
<?php }?>


<!--div class="program clearfix">

<img src="http://13.235.169.150/XFactor/assets/floor_plan/daba2c56-e73e-4aa9-b13c-5b5cc617c12f.jpg">
<div class="program-right-cont">
<div class="program-contant-top"> 
<div class="program-date">
<p>
<b>END</b>, 2020-08-30 18:17h, 2020-08-30 18:17h.</p> 

 </div>
<div class="program-read-more">
<a href="#" class="moreless-button70"> SHOW MORE</a>  
</div>
</div>
 
<div class="program-contant floor_70" program_date="2020-08-30 18:17h" floor-id="866" program-desc="<p>d</p>
" program-title="test 10 nov" data-id="70" postop="340" posleft="640">  

<p class="pro-bold bt-rev"><b>test 10 nov</b></p>
<br>
<p>noida</p>
<p>VENUE OWNER<br>MR. ABhishek gupta<br>NIL<br><br>ORGANISER<br>MR. Administrator XPLATFORM<br>NIL<br><br></p>  
<div id="section">
  <p>d</p>

</div>      
</div>
</div>
</div-->   
  


<!-- div class="program clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>  
<div class="program-right-cont">
<div class="program-contant-top"> 
<div class="program-date"><p>23 JULY 2019, 0915h – 1015h</p> </div>
<div class="program-read-more">
<a href="#"> SHOW MORE</a>    
</div>
</div>
<div class="program-contant">  
<p class="pro-bold"><b>XCONNECT & PARTNERS : HOW TO REALISE THE
POTENTIAL OF XCONNECT WITH THE USE OF EXISTING 
PRODUCTS THAT OUR PARTNERS HAVE</b>
</p>
<p> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ
COMPANY.</p> 
</div>
</div>
</div -->


</div>
<?php 
	}
} ?>
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
	</div></div>
    
    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	<input type="hidden" id="floorId" value="" /> 
<input type="hidden" id="grid_val" value="" />
<input type="hidden" id="project_id" value="" />
<input type="hidden" id="program_id" value="" />
<input type="hidden" id="content_set_id" value="" /> 
<input type="hidden" id="zone_type" value="" /> 
	
<script>

 
	
//$("#item").hide();
// $(".floorimg").hide(); 

	$('#GetFloor').change(function(){  
		var floorId=$(this).val();
		var project_id='<?=$project?>';
		window.location = '<?php echo base_url(); ?>program_page/index/'+project_id+'/'+floorId;
		
	})

				var dragItem = document.querySelector("#item1");
				var container = document.querySelector("#container");

				var active = false;
				var currentX;
				var currentY;
				var initialX;
				var initialY;
				var xOffset = 0;
				var yOffset = 0;
				
				element = document.getElementById("item1").style.cssText = "width: 20px; height: 20px; background-color: red; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute;top: <?php echo $top;?>px;left: <?=$left?>px;z-index: 11;";
				
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
  var project='<?=$project;?>'; 
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
					$('.common-space').text(data.zone_type +', '+ data.zone_name);
					$('#zone_type').val(data.zone_type);
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
				
				$('#content_set_id').val(data);
				if(zone_type=='DISPLAY SPACE'){
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
						   settings: { data : 'content_id='+data, type : 'POST' }
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
	#item1 {
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
	#item1 {
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
	#item1:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item:hover {
		cursor: pointer;
	}
	#item1:hover {
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

		$("body").on('click', '#saveAvatar', function() {



		});


		$("#openChatBox").click(function() {


			$.fancybox.open({
				maxWidth: 800,
				fitToView: true,
				width: '100%',
				height: 'auto',
				autoSize: true,
				type: "ajax",
				src: "<?php echo base_url(); ?>chat/testchat",
				ajax: {
					settings: {
						data: 'project=<?php //echo $project_select; 
										?>',
						type: 'POST'
					}
				},
				touch: false,

			});


		});




	});
</script>       