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
							<li class="active">   
							<a class="active track_menu" data-track="PLACES" href="<?=base_url();?>simple_view/places/<?=$project_id?>" class="active"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
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
				<h2> PLACES</h2>    
				</div>
				
<div class="simle_view_midde">	

       
<div class="sml-container program_height places_front">


	<div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-left"> 
	<div class="show-more-place plac_show9887"> <a>SHOW LESS</a> </div>
	<p class="bold-p pro_type">PLACES I HAVE REGISTERED FOR ONLY</p> </div>
	
	</div>
		<div class="moretext14545">	
		<?php
			if(!empty($myprojects)){ 
			foreach($myprojects as $result1){
			?>
				<p class="floor1_<?=$result1->id;?> bt-rev <?php if($result1->id == $project_id){ echo "active"; }?>" data-id="<?=$result1->id;?>" project-name="<?=$result1->project_name?>"><?=$result1->event_start_date_time.'h, ';?><?=$result1->project_name?></p>
				<script>   
										

$(document).ready(function(){
	$('.floor1_<?=$result1->id;?>').click(function(){

		$('.bt-rev').removeClass('active');
		var project=$(this).attr('data-id'); 
		
		window.location = '<?php echo base_url(); ?>simple_view/places/'+project;
	})
	 
	
})
</script>
			<?php } }else{
				echo '<p class="bt-rev">NO PLACES CURRENTLY.</p>';
			}?>
		</div> 
		<script>
											 
$('.plac_show9887').click(function() {
  $('.moretext14545').slideToggle();
  var read=$('.plac_show9887').text();
  if (read == 'SHOW MORE') {
	  $('.plac_show9887').text("SHOW LESS")
    
  } else {
	 $('.plac_show9887').text("SHOW MORE")
    
  }
});
</script>
	</div>
	<?php foreach($projects as $data){?>
	<div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-place plac_show<?=$data->id;?>"> <a>SHOW LESS</a> </div>
	<div class="show-more-left"> 
	<p class="bold-p pro_type">
	<?php $pro_type=$data->name;
		if($pro_type =='ONLINE REG REQUIRED'){
			echo 'ONLINE EVENTS REG REQUIRED';
		}elseif($pro_type=='ONLINE NO REG REQUIRED'){
			echo 'ONLINE EVENTS NO REG REQUIRED'; 
		}elseif($pro_type=='ONSITE NO REG REQUIRED'){
			echo 'ONSITE EVENTS NO REG REQUIRED';
		}elseif($pro_type=='ONSITE REG REQUIRED'){
			echo 'ONSITE EVENTS REG REQUIRED';
		}
		elseif($pro_type=='HYBRID NO REG REQUIRED'){
			echo 'HYBRID EVENTS NO REG REQUIRED';
		}elseif($pro_type=='HYBRID REG REQUIRED'){
			echo 'HYBRID EVENTS REG REQUIRED';
		}else{
			echo $data->name;
		}
	?>
	</p> </div>
	
	</div>
	<?php 
											
		$project_type=$data->name;
		if(empty($group)){
		//$query=$this->db->get_where('xf_mst_project',array('project_type'=>$project_type,'project_steps'=>4,'project_show_homepage'=>'yes'));
		
		$this->db->select('xf_mst_project.*');
		$this->db->from('xf_mst_project');
		$this->db->join('xf_mst_group', 'xf_mst_group.id = xf_mst_project.group_id');
		$this->db->where('xf_mst_project.project_type',$project_type);
		$this->db->where('xf_mst_project.project_steps',4);
		$this->db->where('xf_mst_project.project_show_homepage','yes');
		$this->db->where('xf_mst_group.status','LIVE');
		$query = $this->db->get();  
		
		}else{
			$this->db->select('xf_mst_project.*');
		$this->db->from('xf_mst_project');
		$this->db->join('xf_mst_group', 'xf_mst_group.id = xf_mst_project.group_id');
		$this->db->where('xf_mst_project.project_type',$project_type);
		$this->db->where('xf_mst_project.project_steps',4);
		$this->db->where('xf_mst_project.project_show_homepage','yes');
		$this->db->where('xf_mst_group.status','LIVE');
		$this->db->where('xf_mst_project.group_id',$group);
		$query = $this->db->get();
			//$query=$this->db->get_where('xf_mst_project',array('project_type'=>$project_type,'group_id'=>$group,'project_steps'=>4,'project_show_homepage'=>'yes'));
		} 
		$allproject=$query->result();
		if($allproject){
		foreach($allproject as $result){
			
	?>	
	<p class="moretext<?=$data->id?> floor_<?=$result->id;?> bt-rev <?php if($result->id == $project_id){ echo "active"; }?>" data-id="<?=$result->id;?>" project-name="<?=$result->project_name?>"><?=$result->event_start_date_time.'h, ';?><?=$result->project_name?></p>
	<script>   
										

$(document).ready(function(){
	$('.floor_<?=$result->id;?>').click(function(){

		$('.bt-rev').removeClass('active');
		var project=$(this).attr('data-id'); 
		
		window.location = '<?php echo base_url(); ?>simple_view/places/'+project;
	})
	 
	
})
</script>
	<?php } }else{ ?>
												<p class="bt-rev moretext<?=$data->id?>"><?php echo 'NO PLACES CURRENTLY.';?></p>
												<?php }?>
	</div>
	<script>
											
$('.plac_show<?=$data->id;?>').click(function() {
  $('.moretext<?=$data->id;?>').slideToggle(); 
  var read=$('.plac_show<?=$data->id;?>').text();
  if (read == 'SHOW MORE') {
	  $('.plac_show<?=$data->id;?>').text("SHOW LESS")
    
  } else {
	 $('.plac_show<?=$data->id;?>').text("SHOW MORE")
    
  }
});
</script>
	
	<?php }?>
	<!--div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-left"> 
	<p class="bold-p pro_type">ONLINE EVENTS REG REQUIRED</p> </div>
	<div class="show-more-place plac_show1"> <a>SHOW LESS</a> </div>
	</div>											
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	</div>
	
	<div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-left"> 
	<p class="bold-p pro_type">ONLINE EVENTS REG REQUIRED</p> </div>
	<div class="show-more-place plac_show1"> <a>SHOW LESS</a> </div>
	</div>											
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	</div>
	
	<div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-left"> 
	<p class="bold-p pro_type">ONLINE EVENTS REG REQUIRED</p> </div>
	<div class="show-more-place plac_show1"> <a>SHOW LESS</a> </div>
	</div>											
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	</div>
	
	<div class="palces-repeat">
	<div class="show-more-less">
	<div class="show-more-left"> 
	<p class="bold-p pro_type">ONLINE EVENTS REG REQUIRED</p> </div>
	<div class="show-more-place plac_show1"> <a>SHOW LESS</a> </div>
	</div>											
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	<p class="moretext1">2020-12-13 00:00h, Abhishek-Gupta-Chat-03-12-2020</p>
	</div-->
	

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

		var aTag = $(".bt-rev.active");
		var sc = parseFloat(aTag.offset().top);
		console.log(sc);
		if(sc > 1100)
		{
			$('html').animate({scrollTop: sc},'fast');
		}
		

	});
</script>       