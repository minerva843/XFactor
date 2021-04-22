<div class="virtual_view avatar simple_view_outer">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
		<div class="row avatar-main">    
			

		<div class="col-md-12 avtar-sidebar simple-view xme">   
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
					<div class="simple_view_fixed_top">
					<div class="overlay-heading"><h2><?php if(!empty($project_name)){ echo $project_name; }else{ echo 'XME'; }?></h2> </div>   
						<div class="sml-container">
						<ul class="nav nav-tabs simple_tabs">  
							<li>
							<a href="<?=base_url();?>xme/my_details"><img src="<?=base_url();?>assets/images/chat/my_details.png" alt=""><span>MY DETAILS</span></a>

							</li>
							<li>
							<a href="<?=base_url();?>xme/password"><img src="<?=base_url();?>assets/images/chat/password.png" alt=""><span>PASSWORD</span></a>
							</li>   

							<li class="active">
							<a href="<?=base_url();?>xme/registration" class="active"><img src="<?=base_url();?>assets/images/chat/register.png" alt=""><span>REGISTRATIONS</span></a>
							</li>  
				</ul>
				
				</div>
				<h2> MY REGISTRATIONS</h2> 
				</div>
				
<div class="simle_view_midde xme_top xme-change-pass">	
				
				<div class="sml-container register-form xme_register">			  		
				<div class="top-search">
				<div class="row">
				<div class="col-md-5 p-r-5">
				<form method="POST" action="">
				<select name="project_type" id="selectproject" class="project_type">
				<option value="0">SHOW ALL REGISTRATIONS</option>
				<option value="NOT STARTED">SHOW ALL NOT STARTED ONLY</option>
				<option value="LIVE">SHOW ALL LIVE ONLY</option>
				<option value="ENDED">SHOW ALL ENDED ONLY</option>
				<option value="workshop">SHOW ALL WORKSHOPS ONLY</option>

				</select>
				</form>
				</div>
				<div class="col-md-7 p-l-5">
				<input type="text" class="search SER" placeholder="SEARCH">
				</div>
				</div>
				</div>					
				
				<div class="xme-register-scroll">
				<table id="AllData">
				<tr style="background-color: #fff;">
				<th>STATUS </th> <th> START </th> <th> PLACE / WORKSHOP NAME</th> 
				</tr>
				<?php 
					foreach($projects as $project){
						if(date('Y-m-d',strtotime($project->event_start_date_time)) > date('Y-m-d')){
									$project_status="NOT STARTED";
								}
								if((date('Y-m-d',strtotime($project->event_start_date_time)) == date('Y-m-d')) || (date('Y-m-d',strtotime($project->event_start_date_time)) < date('Y-m-d'))){
									$project_status="LIVE";
								}
								if( !empty($project->event_end_date_time) && date('Y-m-d',strtotime($project->event_end_date_time)) < date('Y-m-d')){ 
									$project_status="ENDED";
								}
					//$user_id=$this->session->userdata('user_id');
					$project_id=$project->id;
					$guestid=$project->guestid;
					$this->db->select('xf_mst_workshop.*,workshop_guest_assign.guest_id,workshop_guest_assign.workshop_id');
					$this->db->from('xf_mst_workshop');
					$this->db->join('workshop_guest_assign', 'workshop_guest_assign.workshop_id = xf_mst_workshop.id','left');
					$this->db->where('workshop_guest_assign.guest_id',$guestid);
					$this->db->where('xf_mst_workshop.project_id',$project_id);
					$this->db->order_by('xf_mst_workshop.created_date_time','ASC');
					$query = $this->db->get();  
					$data11 = $query->result();
					if(!empty($data11)){
						$workshopdata='workshop';
					}else{
						$workshopdata='';
					} 
				?> 
				<tr data-project-type="<?=$project_status?>" data-workshop-only="<?=$workshopdata?>" class="rowproject">
				<td ><?=$project_status?> </td> 
				<td> <?=$project->event_start_date_time?>h </td> 
				<td> <?=$project->project_name;?>
				
				<?php 
					 
					if($data11){
						foreach($data11 as $val1){
								
								echo '<span style="width:100%" class="wor-p">'.$val1->workshop_name.'</span>';
						}
					}
				?> 
				</td> 
				</tr>
					<?php }?>
					<script>
					$(".search").on("keyup", function() {
						if ($(this).val().length >= 0) {

							var value = $(this).val().toLowerCase();
							$(".rowproject").filter(function() {
								$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

							});
						}
						if ($(this).val().length >= 0) { 

                                                var value = $(this).val().toLowerCase();
                                                $("#AllData .rowproject").filter(function () {
                                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) 
													var $trs = jQuery("#AllData .rowproject:visible");
	$trs.filter("#AllData .rowproject:odd").css("background-color", "#d9d9d9");
	$trs.filter("#AllData .rowproject:even").css("background-color", "#ffffff");
                                                    
                                                });
                                            }
					});
						$("#selectproject").change(function() {


							var project_type = $(this).val();
							//alert(guest_type);
							if (project_type == "0") {
								$(".rowproject").show();
							} else {
								$(".rowproject").each(function() {
									let row_project_type = $(this).attr('data-project-type');
									let workshoponly = $(this).attr('data-workshop-only');
									
									//console.log(guest_type);
									//console.log(row_guest_type);
									if(workshoponly==project_type){
										if (workshoponly == project_type) {
										//$(this).css("display", "block");
										$(this).show();

										} else { 

											$(this).hide();
										}
									}else{
										if (row_project_type == project_type) {
										//$(this).css("display", "block");
										$(this).show();

										} else { 

											$(this).hide();
										}
									}
									

								});


							}

						});
						
						
					</script>
				
				
				</table>
				
				
				</div>
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