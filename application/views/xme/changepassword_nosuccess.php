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
					<div class="overlay-heading"><h2><?php if(!empty($project_name)){ echo $project_name; }else{ echo 'PROJECT NAME'; }?></h2> </div>   
						<div class="sml-container">
						<ul class="nav nav-tabs simple_tabs"> 
							<li>
							<a href="<?=base_url();?>xme/my_details"><img src="<?=base_url();?>assets/images/chat/my_details.png" alt=""><span>MY DETAILS</span></a>

							</li>
							<li class="active">
							<a href="<?=base_url();?>xme/password" class="active"><img src="<?=base_url();?>assets/images/chat/password.png" alt=""><span>PASSWORD</span></a>
							</li>   

							<li>
							<a href="<?=base_url();?>xme/registration"><img src="<?=base_url();?>assets/images/chat/register.png" alt=""><span>REGISTRATIONS</span></a>
							</li>  
				</ul>
				
				</div>
				<h2>XME</h2> 
				</div>
			

				<div class="simle_view_midde xme_top xme-change-pass">	
				<div class="sml-container register-form">

                <div class="row mb-20">
				<div class="col-md-7"> <h3> CHANGE PASSWORD <span class="nosuccess"> NOT SUCCESSFUL </span> </h3>   </div>
               <div class="col-md-5 text-right"> 
			   <a href="#" class="xme_btn" onclick="goBack()">BACK</a> 
			   <script>
					function goBack() {
					  window.history.back();
					}
				</script>
			   <a href="<?=base_url();?>xme/my_details" class="xme_btn">RETRY</a>  </div>    
				</div>
				
                <p class="mt20"><b><?=$user->last_edit_datetime;?>h.</b> COMPANY INFO HAS NOT BEEN EDITED. PLEASE TRY AGAIN.</p>				
				<form>      

				<div class="form-group row">
				<div class="col-sm-12">
				<p> </p>
				<p> INCORRECT ONE TIME PASSWORD</p>				
				</div>
				</div>
			
							
				</form>
				   
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