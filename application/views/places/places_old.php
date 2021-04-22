<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">

				<div class="col-md-9 avtar-position chatscreen">

					<div class="start-explor">
						<h2 class="project_name">START EXPLORING. SIMPLY CLICK ON THE PLACE YOU WISH TO VISIT. HAVE FUN! =) </h2>
					</div>
					<div class="avtar-filter">
						<div class="row">

							<div class="col-md-6">
								<div class="user-location">
									<div id="grid_number" data-gridid=""> YOU ARE CURRENTLY AT &nbsp; &nbsp; : </div>
									<div class="select-box">
										<select name="zonetype" id="GetFloor">
											<option value="" >SELECT A FLOOR PLAN</option>
											
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="looka-took">
									<span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span>
									<span class="common-space"> COMMON SPACE, MIDDLE OF ROOM </span>
									<button class="take-a-look"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>

					<div class="chat-feature flor-left">
						<div class="avtar-left" id="container">
						<div id="item">

							</div>
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
	<img id="demo-4" class="img-fluid floorimg" src="" alt="your image">
</div>

 
							
 

</div>
							
						</div>
						
					</div>
					
				</div>

				<div class="col-md-3 avtar-sidebar">
					<div class="tabbable tabs-below">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right">
									<h2> SELECT A PLACE TO GO TO <?=$selected_project_type?></h2>
									<div class="top-search">
										<div class="row">
											<div class="col-md-6 p-r-5">
												<select name="project_type" id="project_type" class="project_type">
									<option value="">SELECT A PROJECT TYPE</option>
									
									<option value="ONLINE REG REQUIRED" <?php if(!empty($selected_project_type == 'ONLINE REG REQUIRED')){ echo "selected"; }?>>ONLINE REG REQUIRED</option>
									<option value="ONLINE NO REG REQUIRED" <?php if(!empty($selected_project_type == 'ONLINE NO REG REQUIRED')){ echo "selected"; }?>>ONLINE NO REG REQUIRED</option>
									<option value="ONSITE REG REQUIRED" <?php if(!empty($selected_project_type == 'ONSITE REG REQUIRED')){ echo "selected"; }?>>ONSITE REG REQUIRED</option>
									<option value="ONSITE NO REG REQUIRED" <?php if(!empty($selected_project_type == 'ONSITE NO REG REQUIRED')){ echo "selected"; }?>>ONSITE NO REG REQUIRED</option>
									<option value="HYBRID REG REQUIRED" <?php if(!empty($selected_project_type == 'HYBRID REG REQUIRED')){ echo "selected"; }?>>HYBRID REG REQUIRED</option>
									<option value="HYBRID NO REG REQURIED" <?php if(!empty($selected_project_type == 'HYBRID NO REG REQURIED')){ echo "selected"; }?>>HYBRID NO REG REQURIED</option>
									<option value="PROPERTY REG REQUIRED" <?php if(!empty($selected_project_type == 'PROPERTY REG REQUIRED')){ echo "selected"; }?>>PROPERTY REG REQUIRED</option>
									<option value="PROPERTY NO REG REQUIRED" <?php if(!empty($selected_project_type == 'PROPERTY NO REG REQUIRED')){ echo "selected"; }?>>PROPERTY NO REG REQUIRED</option>
									<option value="SHOP REG REQUIRED" <?php if(!empty($selected_project_type == 'SHOP REG REQUIRED')){ echo "selected"; }?>>SHOP REG REQUIRED</option>
									<option value="SHOP NO REG REQUIRED" <?php if(!empty($selected_project_type == 'SHOP NO REG REQUIRED')){ echo "selected"; }?>>SHOP NO REG REQUIRED </option>
									<option value="VIRTUAL SHOP REG REQUIRED" <?php if(!empty($selected_project_type == 'VIRTUAL SHOP REG REQUIRED')){ echo "selected"; }?>>VIRTUAL SHOP REG REQUIRED</option>
									<option value="VIRTUAL SHOP NO REG REQUIRED" <?php if(!empty($selected_project_type == 'VIRTUAL SHOP NO REG REQUIRED')){ echo "selected"; }?>>VIRTUAL SHOP NO REG REQUIRED</option>
									<option value="VENUE REG REQUIRED" <?php if(!empty($selected_project_type == 'VENUE REG REQUIRED')){ echo "selected"; }?>>VENUE REG REQUIRED</option>
									<option value="VENUE NO REG REQUIRED" <?php if(!empty($selected_project_type == 'VENUE NO REG REQUIRED')){ echo "selected"; }?>>VENUE NO REG REQUIRED</option><
									
									
									<option value="DEMO REG REQUIRED" <?php if(!empty($selected_project_type == 'DEMO REG REQUIRED')){ echo "selected"; }?>>DEMO REG REQUIRED</option>
									<option value="DEMO NO REG REQUIRED" <?php if(!empty($selected_project_type == 'DEMO NO REG REQUIRED')){ echo "selected"; }?>>DEMO NO REG REQUIRED</option>
									
								</select>
											</div>
											<div class="col-md-6 p-l-5">
												<input type="text" class="search SER" placeholder="SEARCH:">
											</div>
										</div>
									</div>
									<div class="places-main">
										<?php foreach($projects as $data){?>
										<div class="palces-repeat">
										<p class="bold-p"><?=$data->project_type;?> (-)</p>
											<?php 
												$project_type=$data->project_type;
												if(empty($group)){
												$query=$this->db->get_where('xf_mst_project',array('project_type'=>$project_type));
												}else{
													$query=$this->db->get_where('xf_mst_project',array('project_type'=>$project_type,'group_id'=>$group));
												} 
												$project=$query->result();
												foreach($project as $result){
											?>
											
											<p class="floor_<?=$result->id;?> bt-rev" data-id="<?=$result->id;?>" project-name="<?=$result->project_name?>"><?=$result->event_start_date_time.'h, ';?><?=$result->project_name?></p>
											
											<script>
$(document).ready(function(){
	$('.floor_<?=$result->id;?>').click(function(){
		$('#project_id').val('');
		$('#floorId').val('');
		$('#grid_val').val('');
		
		
		$('#demo-4').hide();
		$('#item').hide();
		$('#GetFloor').empty();
		$('.bt-rev').removeClass('active');
		
		var floor_id=$(this).attr('data-id');
		var project_name=$(this).attr('project-name');
		$('.project_name').html(project_name+'.  START EXPLORING. SIMPLY CLICK ON THE PLACE YOU WISH TO VISIT. HAVE FUN! =)');
		$('.floor_<?=$result->id;?>').addClass('active');
		var url='<?php echo base_url();?>places/GetFloorByProject';
		$.ajax({  
			type: "POST",
			url: url,   
			data: {floor_id:floor_id},
			success: function(data)
			{
				$('#GetFloor').html(data);
			}
		});
	})
})
</script>
												<?php }?>
										</div>

										
										<?php }?>

										<!--div class="palces-repeat">
											<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
											<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
											<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
										</div-->

										

									</div>

								</div>
							</div>

						</div>



						<ul class="nav nav-tabs">

							<div class="overlay-heading">
								<h2> WHAT DO YOU WISH TO DO? </h2>
							</div>
							<li class="active">
<a href="<?=base_url();?>places" class="active"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li>
<a href="<?=base_url();?>avatar"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
</li>
<li>
<a href="<?=base_url();?>chat_box" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a href="<?=base_url();?>content_page"><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>
</li>
<li>
<a href="<?=base_url();?>workshop" ><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a href="<?=base_url();?>info_buy"><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>INFO / BUY </span></a>
</li>
<li>
<a class="action_program"><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
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

<script>
// $("#GetFloor").click(function(){
        
        // var floorId = $('#floorId').val(); 
        // var project_id = $('#project_id').val();
		
       
        // });

$("#project_type").change(function(){
        
        let project_type = $('.project_type').val();
		
        window.location = '<?php echo base_url(); ?>places/index/'+project_type;
        });
$(".SER").on("keyup", function() {
	  if ($(this).val().length >= 0){
	
    var value = $(this).val().toLowerCase();
    $(".palces-repeat .bt-rev").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  
    });
	  }
  });
	
$("#item").hide();
$(".floorimg").hide();

	$('#GetFloor').change(function(){ 
		var floorId=$(this).val();
		
		var url='<?php echo base_url();?>places/assignProgramGetImg';
		$.ajax({  
			type: "POST",
			url: url, 
			data: {floorId:floorId},
			success: function(data)
			{ 
				var data=JSON.parse(data);
				 //console.log(data)
				$("#project_id").val(data.project);
				$('#floorId').val(data.floorId);
				$(".floorimg").show();
				$("#item").show();
				$("#demo-4").show();
				$('.action_program').attr('href','<?=base_url();?>program_page/'+data.project+'/'+data.floorId);
				
				$(".floorimg").removeClass("img-fluid");
								
				$('.floorimg').attr("src",data.img).height(data.height).width(data.width);
				var height1=data.height/2;
				var height=720-height1;
				var width=data.width/2;
				var dragItem = document.querySelector("#item");
				var container = document.querySelector("#container");

				var active = false;
				var currentX;
				var currentY;
				var initialX;
				var initialY;
				var xOffset = 0;
				var yOffset = 0;
		
				element = document.getElementById("item").style.cssText = "width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: "+height+"px;left: "+width+"px;z-index: 11;";

				container.addEventListener("click", clicked, false);

				function clicked(e) {
					console.log("currentx ==>" + e.clientX + "  currentY ==>" + e.clientY);
					var xPosition = event.clientX - container.getBoundingClientRect().left - (dragItem.clientWidth / 2);
					var yPosition = event.clientY - container.getBoundingClientRect().top - (dragItem.clientHeight / 2);
					dragItem.style.left = xPosition + "px";
					dragItem.style.top = yPosition + "px";
					
				}
			} 
		});
	})
	

$('#container-4').click(function(e) {
  var x = e.clientX;
  var y = e.clientY;
  var coor =  x + "," + y;
  var project=$('#project_id').val(); 
  var floorId=$('#floorId').val();
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
		}
	})
  }
})

$("body").on('click','.take-a-look',function(){
          
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
           settings: { data : 'project', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
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


<!-- Abhishek Gupta Pointer starts here -->

<!-- Ends here -->