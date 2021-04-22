<div class="virtual_view avatar">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		<style>
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  position: relative;
  margin: auto;
}   

/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    -: 0px;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    bottom: -15px;
}   

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}    

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  color:#333333;}


/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

 .dot:hover {
  background-color: #717171;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>        
<style>
.content {
  align-items: center;
  background-color: #FFFFFF;
  display: flex;
  height: 200px;
  justify-content: space-around;
  margin-top: 4rem;
  padding: .75rem;
  width: 500px;
}

.tooltip {
  cursor: pointer;
  display: inline-block;
  position: relative;
  border-bottom: 1px dotted #1849AB;
}

.tooltip .tooltip__content {
  background-color: #1849AB;
  border-radius: 4px;
  bottom: 150%;
  color: #FFFFFF;
  left: 50%;
  margin-left: -70%;
  opacity: 0;
  padding: 1rem 0.5rem;
  position: absolute;
  text-align: center;
  transition: opacity 0.5s;
  visibility: hidden;
  width: 130px;
  z-index: 1;
}    

.tooltip .tooltip__content::after {
  border-width: 5px;
  border-style: solid;
  border-color: #1849AB transparent transparent transparent;
  content: "";
  left: 50%;
  margin-left: -5px;
  position: absolute;
  top: 100%;
}

.tooltip:hover .tooltip__content {
  opacity: 1;
  visibility: visible;
}

</style>
		<div class="row avatar-main">
				
		<div class="col-md-9 avtar-position chatscreen">     

		<div class="start-explor"> <h2><?php if(!empty($project_name)){echo $project_name.'.  START EXPLORING. HAVE FUN! =)'; }else{ echo 'CLICK “PLACES” ON BOTTOM RIGHT, THEN SELECT A PLACE TO GO.'; }?></h2></div>
		<div class="avtar-filter">
		<div class="row">
  
				 <div class="col-md-6"> 
					<div class="user-location">
					<div id="grid_number" data-gridid=""> YOU ARE CURRENTLY AT  &nbsp; &nbsp; : </div> 
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
					
								
									<?php }else{ if(!empty($floors[0]->floor_plan_name)){
												echo $floors[0]->floor_plan_name;
											}else{
												echo ' <select name="zonetype" id="GetFloor">
					 
												<option value="" >SELECT A FLOOR PLAN</option>
												</select>';
											} }?>
											</div>
								</div> 
					<?php if(count($floors)!=1){?>
								<span class="morethen">MORE THAN 1 ZONE AVAILABLE. USE DROP DOWN BOX TO SELECT ZONE.</span>
								<?php }?>
					</div> 
					
				 <div class="col-md-6">   
                  <div class="looka-took">
									<span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span>
									<span class="common-space"><?php if(empty($project)){ echo '<p style="color:red">TO START, SELECT A PLACE TO GO TO FIRST.</p>'; }?> </span>
									<button class="take-a-look" style="display:none;"> TAKE A LOOK AROUND</button>
									
								</div>    
                 </div>
				
				 <div id="myModal1" class="modal delete-sorting place-zone">

                                    <!-- Modal content -->
                                    <div class="modal-content"> 
									<div class="modal-body">
                                        <h4>This program is taking place in another zone.</h4>
										<h4>Do you want to proceed there?</h4>
                                                
                                      </div>         
                                   
      
					<div class="modal-footer"> 
					<a href="#" class="no_proceed exit_popup">No. Do not Proceed. </a> 
					<a href="#" class="yes_proceed exit_popup"> Yes. Proceed.</a>
					</div>									

                                </div>    
					</div> 
					 <script>
				 $('.exit_popup').click(function () {
                                            var modal = document.getElementById("myModal1");
                                            modal.style.display = "none";
                                        })
				 $('.myModal1').click(function(){
					 var modal = document.getElementById("myModal1");
                                            var span = document.getElementsByClassName("close")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
				 })
				 </script>
                                    
		 </div>                                           
		</div> 
        <div class="chat-feature flor-left">
		<?php if(empty($project_id)){ //echo '<p class="pl-kkc">THERE IS NO PROGRAM / HIGHLIGHTS FOR THIS PLACE CURRENTLY.</p>'; 
		}?>
		<?php if(!empty($No_registerUser)){ echo $No_registerUser; ?>
					
					<?php }else{?>
					<!--div class="blok-program"></div-->
						<div class="avtar-left to-start-select" id="container">
						
				
						
						<?php 
						if(!empty($top) && !empty($left)){
							$top=$top;
							$left=$left;
						}else{
							// $left=$width/2;
							// $heig=$height/2;
							// $top=690-$heig;
							$left=1250; 
							
							$top=10;
						}
						
						 ?>
						<?php if(!empty($img)){?>
						<?php if($proceed==true){?>
						
						
<?php
$dyTopPos=$ProgramTop;
$dyLeftPos=$ProgramLeft;

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


    
?>
<div id="item" style=" border-radius: 50%; touch-action: none; user-select: none; position: absolute;top:<?=$ProgramTop;?>px;left:<?=$ProgramLeft?>px;z-index: 111;">
<!-- <img src="<?=base_url();?>assets/images/place-icon.png" class="place-drag-icon">  --> 
	</div>
	
	
<?php if(!empty($ProgramTop)) {?> 
<script>
$(document).ready(function(){
	$('#place_popup').modal('toggle'); 
	
	
})

</script>
<?php }?>
<div id="place_popup" class="modal fade place-model-popup" role="dialog" style="top: <?=$Ftop;?>px;left: <?=$Fleft;?>px;">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
	        
	  <div class="tooltips">
	  <div class="tooltips-inner">
		<p><?=$myprogram->program_start_date_time;?>h</p>
		<h2 class="program-title"><?php echo $myprogram->program_title;?></h2>
		<p class="program-desc"><?php echo substr($myprogram->program_details,0,250)?></p>
	    </div>  
       <div class="quick-intro"> 
		<div class="chat-left">  </div> 
		<div class="chat-close" data-dismiss="modal"><!--a href="#" class="rem_close" data-dismiss="modal">CLOSE</a-->CLOSE </div>
		</div>    
	   
      </div>
	  </div>
     
    </div>
  </div>
</div>
							<!--div class="time-of-year">   
								<span style="color:#ffffff;">i</span>  
								
								
								  <div class="tooltip">
									<p><?=$myprogram->program_start_date_time;?>h</p>
									<h2 class="program-title"><?php echo $myprogram->program_title;?></h2>
									<p class="program-desc"><?php echo substr($myprogram->program_details,0,250)?></p>
									
									<div class="quick-intro"> 
									<div class="chat-left"> <a href="#">READ QUICK INTRO </a> </div> 
									<div class="chat-close"><a href="#"> CHAT </a> <a href="#" class="rem_close">CLOSE</a> </div>
									</div>   
								  </div>   
								
							  </div--> 
							
							
						<?php }else{?>
	<div id="item" style="width: 20px; height: 20px; border-radius: 50%; touch-action: none; user-select: none; position: absolute;z-index: 111;display:none;">
<!--<img src="<?=base_url();?>assets/images/place-icon.png" class="place-drag-icon">  --> 
	</div>
	
	

<div id="place_popup1" class="modal fade place-model-popup" role="dialog" style="">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body"> 
	        
	  <div class="tooltips">
	  <div class="tooltips-inner">
		<p class="program_date"></p>
		<h2 class="program-title"></h2>
		<p class="program-desc"></p>
	    </div>  
       <div class="quick-intro"> 
		<div class="chat-left">  </div> 
		<div class="chat-close"><a href="#" class="rem_close" data-dismiss="modal">CLOSE</a> </div>
		</div>    
	   
      </div>
	  </div>
     
    </div>
  </div>
</div>
						<!--div id="item" style="width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute;z-index: 111;display:none;">
<div class="time-of-year">   
    <span style="color:#ffffff;">i</span>  
	
	
      <div class="tooltip">
		<p class="program_date"></p>
		<h2 class="program-title"></h2>
		<p class="program-desc"></p>
		
		<div class="quick-intro"> 
		<div class="chat-left"> <a href="#">READ QUICK INTRO </a> </div> 
		<div class="chat-close"><a href="#"> CHAT </a> <a href="#" class="rem_close">CLOSE</a> </div>
		</div>   
	  </div>   
	
  </div> 
							</div-->
						<?php }?>
							
							<div id="item1" style="width: 20px; height: 20px; background-color: red; border: 1px solid #ff0000; border-radius: 50%; touch-action: none; user-select: none; position: absolute;top: <?php echo $top;?>px;left: <?=$left?>px;z-index: 11;"></div>
							
							
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
<h2> PROGRAM</h2> 

<?php if($No_registerUser_condition==true){ ?>
<div class="fron-postion">
<?php

if(empty($project)){
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
<div class="program clearfix">
<!--i class="far fa-user-circle" aria-hidden="true"></i--> 
<?php 
$id=$data->program_id;
$query2=$this->db->get_where('xf_mst_files',array('xmanage_id'=>$id,'xmanage_module'=>'PROGRAM'));
$proj=$query2->row();
$img=$proj->file_name;
if(!empty($img)){
?> 
<img src="<?php echo base_url();?>assets/floor_plan/<?=$img;?>" style="width:70px;height:70px">
<?php }else{?>
<i class="far fa-user-circle" aria-hidden="true"></i>
<?php }?>
<div class="program-right-cont">
<div class="program-contant-top"> 
<div class="program-date">
<p>
<?php
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
?>
</p> 

 </div>
<div class="program-read-more">
<a href="#" class="moreless-button<?=$data->id;?>"> SHOW MORE</a>  
</div>
</div>
<div class="program-contant">  
<?php $position=json_decode($data->program_position);
$PosTop=$position->top;
$PosLeft=$position->left;
?> 
<p class="pro-bold floor_<?=$data->id;?> bt-rev" program_date="<?=$data->program_start_date_time.'h';?>" floor-id="<?=$data->floor_plan_id;?>" program-desc="<?php echo substr($data->program_details,0,180);?>" program-title="<?=$data->program_title?>" data-id="<?=$data->id;?>" PosTop="<?=$PosTop?>" PosLeft="<?=$PosLeft?>"><b><?=$data->program_title?></b>
</p>
<br>
<p><?php echo $data->program_location;?>
</p>
<p><?php
$mydata=json_decode($data->program_presenter);
if($mydata){
			foreach($mydata as $val){
				$query2=$this->db->get_where('xf_guest_users',array('id'=>$val));
					$res=$query2->row();
				if($res){
				echo $res->guest_type .'<br>'.$res->salutation.'. '.$res->first_name.' '.$res->last_name.'<br>'.$res->designation;
				echo '<br>';
				echo '<br>';
				}
			} 
}
?>
</p>  
<div id="section">
  
    <p><?php echo substr($data->program_details,0,280)?>
    </p>
    <p class="moretext<?=$data->id;?>">
      <?php echo substr($data->program_details,281,1500)?>
    </p>
 
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
	
	
	$('.floor_<?=$data->id;?>').click(function(){ 

        var program_date=$(this).attr('program_date');
        var pr_t=$(this).attr('program-title');
		var pr_d=$(this).attr('program-desc');
		$('.program-title').html(pr_t);
		$('.program-desc').html(pr_d); 
		$('.program_date').html(program_date);
		
		// var PosTop=$(this).attr('PosTop');
		// var PosLeft=$(this).attr('PosLeft');
		var floor_id=$(this).attr('floor-id');
		$('#floor_id').val(floor_id);
		var floor_plan_id='<?=$floor;?>';
		var img='<?=$img;?>';
		var id=$(this).attr('data-id');
		$('#program_id').val(id);
		if(floor_id=='' || img==''){
			$("#item").hide();
		}else{
			 
			if(floor_plan_id == floor_id){
				var id=$(this).attr('data-id');
				
				$('#program_id').val(id);
				$('.floor_<?=$data->id;?>').addClass('active');
				var url='<?php echo base_url();?>program_page/GetFloorByProgram';
				$.ajax({  
					type: "POST",
					url: url, 
					data: {id:id,floor_id:floor_id},
					success: function(data)
					{
						
						var data=JSON.parse(data);
						if(data.top==''){ 
							$("#item").hide();
						}else{  
							$("#item").show();
							$('#place_popup1').show();
							
							$('#place_popup1').modal('toggle');
							$('#place_popup1').css("top",data.Ftop+"px"); 
							$('#place_popup1').css("left",data.Fleft+"px");
							
							document.getElementById("item").style.cssText = "width: 20px; height: 20px; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: "+data.top+"px;left: "+data.left+"px;z-index: 111;";
							 
						}
						
					}
				});
			}else{
					var modal = document.getElementById("myModal1");
					var span = document.getElementsByClassName("close")[0];
					modal.style.display = "block";
					span.onclick = function () {
						modal.style.display = "none";
					}
					window.onclick = function (event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
			}
		}
		
	})
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
<i class="far fa-user-circle" aria-hidden="true"></i>  
<div class="program-right-cont">
<div class="program-contant-top"> 
<div class="program-date"><p>23 JULY 2019, 0915h – 1015h</p> </div>
<div class="program-read-more">
<a href="#"> READ MORE</a>  
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
</div-->



</div>
	<?php 
	}
	}?>

</div>
</div>

</div>


				
				<ul class="nav nav-tabs">  
	
				<div class="overlay-heading"><h2> WHAT DO YOU WISH TO DO? </h2> </div>
<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>    			
				<li>
<a href="<?=base_url();?>places/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li>
<a href="<?=base_url();?>avatar/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/avtar.png" alt=""><span>MY AVATAR</span></a>
</li>
<li>
<a href="<?=base_url();?>chat_box/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a href="<?=base_url();?>content_page/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>
</li>
<li>
<a href="<?=base_url();?>workshop/redirectanother/<?php echo $project;?><?php echo '/'.$floor; ?>" ><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a href="<?=base_url();?>post_front/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>  
</li>
<li class="active">
<a href="<?=base_url();?>program_page/index/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" class="active"><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
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
	</div></div>
    
    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	<input type="hidden" id="floorId" value="" /> 
<input type="hidden" id="grid_val" value="" />
<input type="hidden" id="project_id" value="" />
<input type="hidden" id="program_id" value="" />
<input type="hidden" id="content_set_id" value="" /> 
<input type="hidden" id="zone_type" value="" /> 
<input type="hidden" id="click_cker" value="0" /> 
	
<script>

 
	
//$("#item").hide();
// $(".floorimg").hide(); 

	$('#GetFloor').change(function(){  
		var floorId=$(this).val();
		var project_id='<?=$project?>';
		window.location = '<?php echo base_url(); ?>program_page/index/'+project_id+'/'+floorId;
		
	})
	
$('.rem_close').click(function(){
	//$('.item2-rem').show();
	
})
$('#item').click(function(){
	
	var local=1;
	$('#click_cker').val(''); 
	$('#click_cker').val(local);
})
var local=$('#click_cker').val();

 
			
					var dragItem = document.querySelector("#item1");
					var container = document.querySelector("#container");

					var active = false;
					var currentX;
					var currentY;
					var initialX;
					var initialY;
					var xOffset = 0;
					var yOffset = 0;
					
					element = document.getElementById("item1").style.cssText = "width: 20px; height: 20px; background-color: red; border: 1px solid #ff0000; border-radius: 50%; touch-action: none; user-select: none; position: absolute;top: <?php echo $top;?>px;left: <?=$left?>px;z-index: 11;";
					
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