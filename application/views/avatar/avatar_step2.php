<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/normalize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/spectrum.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/svgavatars.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700|Roboto:400,300,500,700&subset=latin,cyrillic-ext,cyrillic,latin-ext" rel="stylesheet" type="text/css">
	
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.tools.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.defaults.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/languages/svgavatars.en.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.core.min.js"></script>
       
	   
	   <!-- poppup start -->
	
	<div class="places_full_popup">      
	
	<div class="container-fluid">  
		<div class="row ">
		<div class="col-md-12 text-center"> 
		
		</div>   
		     
		<div class="show_this_again">
		<form action="<?=base_url();?>places/placesPost_step2/<?=$S_VIEW?>" method="post">
		<div class="new-check"> 
		<input type="checkbox" id="html" name="check_user" value="1"> 
      <label for="html">DO NOT SHOW THIS AGAIN.</label> </div> 
		<p>CLICK THIS BUTTON TO PROCEED. </p>
		<button class="show-next"> OK . I’M CLEAR. LET’S GO.</button>
		</form>
		</div>
		    
		</div>
		</div>
		
		<div class="container-fluid place_step-top">  
		<div class="row ">
		<div class="col-md-8">
		</div>
		
		<div class="col-md-4"> 
		<div class="places-box true-reflex">  
		<h2> A TRUE REFLECTION OF
HOW YOU INTERACT ONSITE. </h2>
		
		<h3>YOUR CONTROLS ARE BELOW.</h3>
		     
		<div class="row mb-20">
		<div class="col-md-3"> PLACES  <span>-</span> </div>
		<div class="col-md-9"> <p> DECIDE ON A PLACE TO GO TO.<br>
									CHOOSE FROM EVENTS, SHOPS, VIRTUAL SHOPS,
									PROPERTIES, VENUES, OR DEMOS (TO FAMILIRISE
								AND LEARN FEATURES OF XCONNECT).</p> </div>
		</div>
		
		<div class="row mb-20">
		<div class="col-md-3"> MY AVATAR <span>-</span>  </div>
		<div class="col-md-9"> <p> DRESS YOURSELF UP. CUSTOMIZE YOUR LOOKS.</p> </div>
		</div>
		
		<div class="row mb-20">
		<div class="col-md-3"> CHAT  <span>-</span> </div>
		<div class="col-md-9"> <p>
	 CONNECT WITH OTHERS WHO ARE AT THE PLACES YOU
SELECT TO VISIT.<br>
 A QUICK INTRO / PROFILE OF THE PERSON / BUSINESS
CAN BE FOUND HERE TOO.
		</p> </div>
		</div>
		
		<div class="row mb-20">
		<div class="col-md-3"> CONTENT   <span>-</span></div>
		<div class="col-md-9"> <p> GET ACCESS TO ON DEMAND CONTENT & LIVE
STREAMS <br>(AUDIO & VIDEO).</p> </div>
		</div>  
		     
		<div class="row mb-20">
		<div class="col-md-3"> WORKSHOPS <span>-</span> </div>
		<div class="col-md-9"> <p>TAKE PARTCIPATE IN LIVE VIDEO CONFERENCES, POLLS, AND FEEDBACKS WHEN THERE ARE AVAILABLE SESSIONS.</p> </div>
		</div>   
		
		<div class="row mb-20">
		<div class="col-md-3"> GET INFO / PROMOS <span>-</span> </div>
		<div class="col-md-9"> <p>  GET PRODUCT / SERVICE INFO, CONNECT WITH
SELLERS.</p> </div>
		</div>  
		
		<div class="row mb-20">
		<div class="col-md-3"> <div class="program-after">PROGRAM  <span>-</span></div>   </div>
		<div class="col-md-9"> <p> AGENDA / HIGHLIGHTS.</p> </div>
		</div>
		</div>
		</div>       
	
	    </div>
		</div>
		
		
		
		
	</div>
	<!-- poppup end -->
	   
	   
	   
	   <div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">

				<div class="col-md-9 avtar-position chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?php if(!empty($project_name)){echo $project_name.'.  START EXPLORING. HAVE FUN! =)'; }else{ echo 'CLICK “PLACES” ON BOTTOM RIGHT, THEN SELECT A PLACE TO GO.'; }?> </h2>
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
									<span class="common-space"> <?php if(empty($project_id)){ echo '<p style="color:red">TO START, SELECT A PLACE TO GO TO FIRST.</p>'; }?> </span>
									<button class="take-a-look"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>

					<div class="chat-feature flor-left">
						<div class="avtar-left" id="container">
						<?php if(empty($project_id)){ echo '<p style="color: green;width: 100%;top: 250px;position: absolute;font-size: 45px;font-weight: bold;text-align: center;">TO START, SELECT A PLACE TO GO TO FIRST.</p>'; }?>
						<?php 
						if(!empty($top) && !empty($left)){
							$top=$top;
							$left=$left;
						}else{
							$left=1250; 
							
							$top=10;
						}    
						
						 ?>
		 <?php if(!empty($img)){?>
						<div id="item" style="width: 20px; height: 20px; background-color: red; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: <?php echo $top;?>px;left: <?=$left?>px;z-index: 11;">
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
						
					</div>
					
				</div>

				<div class="col-md-3 avtar-sidebar">
					<div class="tabbable tabs-below">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right">
									<h2> SELECT A PLACE TO GO TO</h2>
									<div class="top-search">
										<div class="row">
											<div class="col-md-6 p-r-5">
											<form method="POST" action="<?php echo base_url(); ?>places/index/0/0/">
												<select name="project_type" id="project_type" class="project_type" onchange='this.form.submit()'>
									<option value="0">SHOW ALL PLACES</option>
									
									<option value="registered_only" <?php if(!empty($selected_project_type)){ echo 'selected'; }?>>PLACES I HAVE REGISTERED FOR ONLY</option>
									<option value="ONLINE REG REQUIRED" <?php if(!empty($selected_project_type == 'ONLINE REG REQUIRED')){ echo "selected"; }?>>ONLINE EVENTS REG REQUIRED</option>
									<option value="ONLINE NO REG REQUIRED" <?php if(!empty($selected_project_type == 'ONLINE NO REG REQUIRED')){ echo "selected"; }?>>ONLINE EVENTS NO REG REQUIRED</option>
									<option value="ONSITE REG REQUIRED" <?php if(!empty($selected_project_type == 'ONSITE REG REQUIRED')){ echo "selected"; }?>>ONSITE EVENTS REG REQUIRED</option>
									<option value="ONSITE NO REG REQUIRED" <?php if(!empty($selected_project_type == 'ONSITE NO REG REQUIRED')){ echo "selected"; }?>>ONSITE EVENTS NO REG REQUIRED</option>
									<option value="HYBRID REG REQUIRED" <?php if(!empty($selected_project_type == 'HYBRID REG REQUIRED')){ echo "selected"; }?>>HYBRID EVENTS REG REQUIRED</option>
									<option value="HYBRID NO REG REQURIED" <?php if(!empty($selected_project_type == 'HYBRID NO REG REQURIED')){ echo "selected"; }?>>HYBRID EVENTS NO REG REQURIED</option>
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
								</form>
											</div>
											<div class="col-md-6 p-l-5">
												<input type="text" class="search SER" placeholder="SEARCH:">
											</div>
										</div>
									</div>
									
									<div class="places-main">
										<div class="palces-repeat">
											<div class="show-more-less">
											<div class="show-more-left"> <p class="bold-p pro_type">PLACES I HAVE REGISTERED FOR ONLY </p> </div>
											<div class="show-more-place plac_show1"> <a>SHOW LESS</a> </div>
											</div>
											<?php  
											//'event_end_date_time >'=>date('Y-m-d h:i')
											$query1=$this->db->get_where('xf_mst_project',array('project_show_homepage'=>'yes','project_steps'=>4));
											$projects1=$query1->result();
											foreach($projects1 as $data){?>
											<?php
												$id=$data->id; 
												$query1=$this->db->get_where('xf_guest_users',array('project_id'=>$id));
												$res=$query1->row();
												
												if($res){
													$query2=$this->db->get_where('xf_mst_project',array('id'=>$id));
													$proj=$query2->result();
													
												}else{
													$proj='';
												}
												  
												foreach($proj as $result1){
												?>
													<p class="moretext1 floor_<?=$result1->id;?> bt-rev <?php if($result1->id == $project_id){ echo "active"; }?>" data-id="<?=$result1->id;?>" project-name="<?=$result1->project_name?>"><?=$result1->event_start_date_time.'h, ';?><?=$result1->project_name?></p>
												<?php }?>
												 
											<?php }?>
										</div>
										
	<script>
											
$('.plac_show1').click(function() {
  $('.moretext1').slideToggle();
  var read=$('.plac_show1').text();
  if (read == 'SHOW MORE') {
	  $('.plac_show1').text("SHOW LESS")
    
  } else {
	 $('.plac_show1').text("SHOW MORE")
    
  }
});
</script>
										<?php foreach($projects as $data){?>
										<div class="palces-repeat">
										
										

										
										
										<div class="show-more-less">
											<div class="show-more-left"> <p class="bold-p pro_type">
											<?php $pro_type=$data->project_type;
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
													echo $data->project_type;
												}
											?>
										</p> </div>
											<div class="show-more-place plac_show<?=$data->id;?>" > <a>SHOW LESS</a> </div>
											</div>
										  
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
											
											<p class="moretext<?=$data->id?> floor_<?=$result->id;?> bt-rev <?php if($result->id == $project_id){ echo "active"; }?>" data-id="<?=$result->id;?>" project-name="<?=$result->project_name?>"><?=$result->event_start_date_time.'h, ';?><?=$result->project_name?></p>
											
											<script>   
										

$(document).ready(function(){
	$('.floor_<?=$result->id;?>').click(function(){

		$('.bt-rev').removeClass('active');
		var floor_id=$(this).attr('data-id'); 
		
		window.location = '<?php echo base_url(); ?>places/index/'+floor_id+'/0/<?=$selected_project_type;?>';
	})
	
	
})
$('#GetFloor').change(function(){ 
	var floorId=$(this).val();
	
	window.location = '<?php echo base_url(); ?>places/index/<?php echo $project_id;?>/'+floorId+'/<?=$selected_project_type?>';
	
}) 
// $("#project_type").change(function(){
        
        // var project_type = $('.project_type').val(); 
		
        // window.location = '<?php echo base_url(); ?>places/index/0/0/'+project_type;
        // });
</script>
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
<a href="<?=base_url();?>avatar/avatar_front"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
</li>
<li>
<a href="<?=base_url();?>chat_box" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a <?php if(!empty($project_id)){?>href="<?=base_url();?>content_page/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" <?php }?>><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

</li>
<li>
<a href="<?=base_url();?>workshop" ><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a href="<?=base_url();?>info_buy"><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>INFO / BUY </span></a>
</li>
<li>

<a <?php if(!empty($project_id)){?>href="<?=base_url();?>program_page/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" <?php }?>><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
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
		if(gender=='male' || gender=='MALE' || gender=='Male'){
			$("#svga-start-boys").click();
		}else if(gender=='female' || gender=='FEMALE' || gender=='Female'){
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
