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
							
							<li class="active">
							<a href="<?=base_url();?>xme/my_details" class="active"><img src="<?=base_url();?>assets/images/chat/my_details.png" alt=""><span>MY DETAILS</span></a>

							</li>
							<li>
							<a href="<?=base_url();?>xme/password"><img src="<?=base_url();?>assets/images/chat/password.png" alt=""><span>PASSWORD</span></a>
							</li>   

							<li>
							<a href="<?=base_url();?>xme/registration"><img src="<?=base_url();?>assets/images/chat/register.png" alt=""><span>REGISTRATIONS</span></a>
							</li>  
					
				</ul>
				
				</div>    
				<h2> MY DETAILS</h2> 
				</div>
				
				<div class="simle_view_midde xme_top xme-detailform register-form">	
				
				<div class="sml-container">
				<div class="row mb-20">
				<div class="col-md-8"> <h3> PERSONAL INFO </h3>  </div>
                 <div class="col-md-4 text-right"> <a href="<?=base_url();?>xme/my_details_edit" class="xme_btn"> EDIT</a>  </div>
				 </div>
				 
				<form>
				<div class="form-group row mb-0">    
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SALUTATION</label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->salutation?></div>
				</div>
				</div>      

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">GENDER  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->gender?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">FIRST NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->first_name?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">LAST NAME  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->last_name?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">PREFERRED NAME  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->username?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">DISPLAY PHOTO </label>
				<div class="col-sm-8">
				<div class="zone-label"><p class="mt20">
				<?php if($user->avatar){?>
				<img src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?=$user->avatar;?>">
				<?php }else{
				if($user->gender=='Male' || $user->gender=='MALE'){ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_MALE.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid" > </a> 
             
            
        
        <?php }else if($user->gender=='Female' || $user->gender=='FEMALE'){ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_FEMALE-removebg-preview.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid" > </a>   
            
            
        
       <?php  }else{ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/sample.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/images/sample.png" class="img-fluid" > </a> 
            
            
        
       <?php  } }
	   ?>
				</p></div>
				</div>
				</div>
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">QUICK INTRO  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->quick_intro;?></div>
				</div>
				</div>


				</form>
				
				  
				</div>
						<hr>
						
						
				<div class="sml-container">
				
				<div class="row mb-20">
				<div class="col-md-8"> <h3> COMPANY & WORK INFO </h3>  </div>
                 <div class="col-md-4 text-right"> <a href="<?=base_url();?>xme/companyinfo_edit" class="xme_btn"> EDIT</a>  </div> 
				 </div>
				      
								
				<form>
				<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->company)){ echo $user->company; }else{ echo 'NIL';}?></div>
				</div>
				</div>      

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY ADDRESS  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->company_address)){ echo $user->company_address; }else{ echo 'NIL';}?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY POSTAL CODE</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php
				$this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->company_country);
				$query = $this->db->get();
				$company_country = $query->row();
				if(!empty($user->pincode)){ echo $user->country.', '.$user->pincode; }else{ echo 'NIL';}?></div>
				</div>
				</div>
 
				<div class="form-group row"> 
				<label for="colFormLabel" class="col-sm-4 col-form-label">DESIGNATION</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->designation)){ echo $user->designation; }else{ echo 'NIL';}?></div>
				</div>
				</div>

				</form>
	  
				</div>
				<hr>
				
				<div class="sml-container">
				
				<div class="row mb-20">
				<div class="col-md-8"> <h3> CONTACT INFO </h3>   </div>
                 <div class="col-md-4 text-right"> <a href="<?=base_url();?>xme/contactinfo_edit" class="xme_btn"> EDIT</a>  </div> 
				 </div>
				
				 				
				<form>
				<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAIL</label>
				<div class="col-sm-8">
				<div class="zone-label running_latter"><?=$user->email;?></div>
				</div>
				</div>      

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY CODE  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$country->name.' +'.$country->phonecode;?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE</label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->phone?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">DID</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->did)){ echo $user->did; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">TEL</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->tel)){ echo $user->tel; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">EXTENSION</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->extension)){ echo $user->extension; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">QR CODE</label>
				<div class="col-sm-8">
				<div class="zone-label">
				
				<?php if(!empty($user->qrcode)){ echo '<img src="'.base_url().'assets/qrphp/temp/'.$user->qrcode.'">'; }else{ echo 'NIL';}?></div>
				</div>
				</div>

				</form>
				   
				</div>
				<hr>
				
				
				
				<div class="sml-container">
			
				<div class="row mb-20">
				<div class="col-md-8"> <h3> CREATION INFO  </h3>   </div>
                 <div class="col-md-4 text-right">  </div> 
				 </div>
				
				<form>
				<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">USER ID</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->xmanage_id)){ echo $user->xmanage_id; }else{ echo 'NIL';}?></div>
				</div>
				</div>      

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">USER STATUS  </label>
				<div class="col-sm-8">
				<div class="zone-label"> <?php if(!empty($user->active==1)){ echo 'LIVE'; } if(!empty($user->active==0)){ echo 'Suspended'; }?></div>
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">USER REGISTRATION TYPE</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->registration_type)){ echo $user->registration_type; }else{ echo 'NIL';}?></div> 
				</div>
				</div>

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">MASS UPLOAD FILE NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->mass_upload_filename)){ echo $user->mass_upload_filename; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->created_datetime)){ echo $user->created_datetime; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->ip_address)){ echo $user->ip_address; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->created_xmanage_id)){ echo $user->created_xmanage_id; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"> <?php if(!empty($user->created_username)){ echo $user->created_username; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME 
</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->last_edit_datetime)){ echo $user->last_edit_datetime.'h'; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->last_edit_ip_address)){ echo $user->last_edit_ip_address; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->last_edit_xmanage_id)){ echo $user->last_edit_xmanage_id; }else{ echo 'NIL';}?></div>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?php if(!empty($user->last_edit_username)){ echo $user->last_edit_username; }else{ echo 'NIL';}?></div>
				</div>
				</div>    

				</form>
				  
				</div>
				<hr>
				
				
				<div class="sml-container">
				
				<div class="row mb-20">
				<div class="col-md-7"> <!--h3> GROUP INFO </h3-->  </div>
                 <div class="col-md-5 text-right">
				
				 <a href="<?=base_url();?>xme/deactivate_account" class="xme_btn">DEACTIVATE ACCOUNT </a>
				 
				 </div> 
				 </div>
							
				<form>
				<!--div class="form-group row mb-20">
				<div class="col-sm-8">
				<div class="zone-label">YOU HAVE ACCESS TO ALL GROUPS</div>
				</div>
				</div-->
				<div class="form-group row mb-20">
				<div class="col-sm-8">
				<div class="zone-label"></div>
				</div>
				</div>				

				</form>   
				</div>
				<hr>
				
	
				

						
     
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