<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->db->select('*');
		$this->db->from('xf_mst_setting');
		$query = $this->db->get();
		$topprojectdata = $query->row();?>
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/normalize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/spectrum.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/svgavatars.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700|Roboto:400,300,500,700&subset=latin,cyrillic-ext,cyrillic,latin-ext" rel="stylesheet" type="text/css">
	
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.tools.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.defaults.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/languages/svgavatars.en.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.core.min.js"></script>
<div class="virtual_view avatar">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
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

					<div class="chat-feature flor-left">
					<?php if(!empty($No_registerUser)){ echo $No_registerUser; ?>
					
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
<script>   

$('#GetFloor').change(function(){ 
	var floorId=$(this).val();
	
	window.location = '<?php echo base_url(); ?>avatar/avatar_front/<?php echo $project_id;?>/'+floorId;
	
}) 
</script>
				</div>

		<div class="col-md-3 avtar-sidebar">
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
					<div class="common_divF common_divav">
<h2> MY AVATAR <?php  //echo $user->gender; ?></h2>   
<div class="avatar-profile">
<div class="row">
    <div class="col-md-5">
        <?php // print_r(); ?>
        <?php if(!empty($user->avatar)){ ?>
            
           <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" class="img-fluid" > </a>  
            
        <?php  }else{ ?>    
        
        
        <?php if($user->gender=='Male' || $user->gender=='MALE'){ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_MALE.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid" > </a> 
            
            
        
        <?php }else if($user->gender=='Female' || $user->gender=='FEMALE'){ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_FEMALE-removebg-preview.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid" > </a>   
            
            
        
       <?php  }else{ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/sample.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/images/sample.png" class="img-fluid" > </a> 
            
            
        
       <?php  }  ?>
        

            
            
        <?php } ?>
       
    
    </div>
<div class="col-md-7 small-avtar"> 

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DISPLAY NAME </label>
<div class="col-sm-8 ">
<div class="zone-label">: <?php  
if(!empty($this->session->userdata('user_id'))){echo $user->display_name; }else{ echo "SIMPLE TEXT";}
 ?></div>
</div>
</div>   

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME  </label>
<div class="col-sm-8">
<div class="zone-label">: <?php 
if(!empty($this->session->userdata('user_id'))){echo $user->first_name; }else{ echo "SIMPLE TEXT";}
 ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME  </label>
<div class="col-sm-8">
<div class="zone-label">: <?php  
if(!empty($this->session->userdata('user_id'))){echo $user->last_name; }else{ echo "SIMPLE TEXT";}
 ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
<div class="col-sm-8">
<div class="zone-label"> : <?php  
if(!empty($this->session->userdata('user_id'))){echo $user->company; }else{ echo "SIMPLE TEXT";}
 ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
<div class="col-sm-8">
<div class="zone-label"> :  <?php  
if(!empty($this->session->userdata('user_id'))){echo $user->designation; }else{ echo "SIMPLE TEXT";}
 ?></div>
</div>
</div>


</div>
</div>
</div>
<h2>CUSTOMIZE MY AVATAR</h2>
<div id="myModal1" class="modal delete-sorting place-zone avatar_front">

				<!-- Modal content -->
				<div class="modal-content"> 
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">CLOSE</button>
				<h4 class="modal-title">XCONNECT</h4>
			  </div>  
				
				<div class="modal-body">
					<h3>YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</h3>
					
				  </div>         
			   

<div class="modal-footer"> 
<a href="<?=base_url();?>/auth/login" class="no_proceed exit_popup">SIGN IN </a> 
<a href="<?=base_url();?>/auth/create_user" class="yes_proceed exit_popup"> SIGN UP</a>
</div>									

			</div>    
</div> 
<div id="svgAvatars" class="avtar-plugin">
    
    
<!--<img src="<?=base_url();?>assets/images/avatar-big.jpg" class="img-fluid">-->



</div>
<div class="plugin"> 
	<input type="button" id="downloadavatar" value="Download" class="action-btn">
	<?php 
	if (!$this->ion_auth->logged_in()){
	?>
	<input type="button" value="SAVE" class="action-btn" id="notsave" name="save">
	<?php }else{?>
	<input type="button" id="saveAvatar" value="SAVE" class="action-btn" name="save">
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
<a class="track_menu" data-track="PLACES" href="<?=base_url();?>places/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li class="active">
<a data-track="AVATAR" href="<?=base_url();?>avatar/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" class="active track_menu"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
</li> 
<li>
<a data-track="CHAT" class="track_menu" href="<?=base_url();?>chat_box/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a data-track="CONTENT" class="track_menu" href="<?=base_url();?>content_page/redirectanother/<?php echo $project_id;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" ><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

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
			<!-- /tabs -->

		</div>		   
		  </div>
		 <div class="footer-year">
		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 
		 </div>
		</div>
	</div></div>
    
    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	<input type="hidden" id="project_id" value="" />
<input type="hidden" id="floorId" value="" />  
<input type="hidden" id="grid_val" value="" /> 
<input type="hidden" id="zone_id" value="" />  
<input type="hidden" id="zone_type" value="" />  
<input type="hidden" id="content_set_id" value="" /> 
<script>
// $('.exit_popup').click(function () { 
	// $('#myModal1').hide();
	// var modal = document.getElementById("myModal1");
	// modal.style.display = "none";
// })
$('#notsave').click(function(){
	$('#myModal1').show();
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
    
    
$(document).ready(function(){
     $("#svga-downloadavatar").css("display","none");
   var gender = '<?php echo $this->session->userdata('gender'); ?>';  
   if(gender==''){
	   var gender='male';
   }else{
	   var gender=gender;
   }
  // alert(gender);
   if(gender=='male' || gender=='MALE' || gender=='Male'){
      $("#svga-start-boys").click();
   }else if(gender=='female' || gender=='FEMALE' || gender=='Female'){
      $("#svga-start-girls").click(); 
   }else{
        $("#svga-start-boys").click(); 
        $(".svga-row").css("display","none");
   }
   
   <?php if($this->ion_auth->logged_in()){?> 
   $("#downloadavatar").click(function(){ 
   //  $("#svga-png-one").click();  
   $('#avatar_small_dyanmic').click();
   });
   <?php }?>
   $("body").on('click','#saveAvatar',function(){
       
       
       
   })
   
       
        
    });
    
    
    </script>
