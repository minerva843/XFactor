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
				
				<div class="simle_view_midde xme_top register-form">	
			
				<div class="sml-container">    
				 <form method="POST" action="<?=base_url();?>Xme/SaveUserDetails" class="register-form" id="register-form" enctype="multipart/form-data">
				<div class="row mb-20">
				<div class="col-md-7"> <h3> PERSONAL INFO (EDIT) </h3>  </div>
                 <div class="col-md-5 text-right"> <a href="#" class="xme_btn" onclick="goBack()"> Back </a>
				<script>
					function goBack() {
					  window.history.back();
					}
				</script>
				 <!--a href="<?=base_url();?>Xme/SaveUserDetails" class="xme_btn">Save</a-->
				 <input type="submit" value="Save" class="xme_btn_save">
				 <input type="hidden" value="/xme/my_details_success" name="action">
				 </div>
				 </div>
				
				     
 
				<!--div class="form-group row mb-0">
				<label for="colFormLabel" class="col-sm-4 col-form-label">GENDER  </label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->gender;?></div>
				</div>
				</div-->

				<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">PREFEREED NAME</label>
				<div class="col-sm-8">
				<div class="zone-label"><?=$user->username;?></br>
				THIS NAME CANNOT BE CHANGED
										THIS IS THE NAME THAT OTHERS GUESTS WILL SEE. THIS IS ALSO THE NAME TO BE PRINTED FOR CERTAIN ONSITE PLACES.</div>
				</div>
				</div>

				<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SALUTATION & GENDER</label>
							
							<div class="col-sm-4">
								 <select name="salutation"  id="salutation">
                                        <option value="" >SELECT YOUR SALUTATION <?php //echo $data1->salutation; ?></option>
                                        <option value="MR" <?php if($user->salutation=='MR'){echo 'selected';} ?> >MR</option>     
										<option value="MS" <?php if($user->salutation=='MS'){echo 'selected';} ?> >MS</option> 
										<option value="MRS" <?php if($user->salutation=='MRS'){echo 'selected';} ?> > MRS</option>
                                        <option value="MDM" >MDM</option>
										<option value="DR" <?php if($user->salutation=='DR'){echo 'selected';} ?> >DR</option>
										<option value="PROF" <?php if($user->salutation=='PROF'){echo 'selected';} ?> >PROF</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>

				</div> 
				<div class="col-sm-4">
                                <div class="form-select">
					 <select name="gender" id="gender">
                                        <option value="">SELECT YOUR GENDER</option>
                                        <option value="male" <?php if(!empty($user->gender) && $user->gender=="male" ){ echo "selected";} ?> >MALE </option>
                                        <option value="female" <?php if(!empty($user->gender) && $user->gender=="female" ){ echo "selected";} ?> >FEMALE</option>
                                    </select>
                                   
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
				</div>

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->first_name; ?>" maxlength="50" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" />

							</div>	
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->last_name; ?>" maxlength="50" name="last_name" placeholder="ENTER LAST NAME" id="last_name" />
							</div>	
						</div>
						
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">DISPLAY PHOTO</label>
							<div class="col-sm-8 project-visual">   
								
							<div class="file-upload guest-uplaod">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">select a DISPLAY PHOTO</div> 
									<input type="file" accept="image/jpg,image/png" name="image" id="file" onchange="ValidateSingleInput(this);" class="file">
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								</div>  
								<p class="file-extan">(OPTIONAL. A DEFAULT PHOTO WILL BE USED BASED ON THE SELECTED GENDER.)<br>
								FILE FORMAT TO BE IN JPEG / PNG. EACH FILE NOT EXCEEDING 5 MB.</p>
								
								<p class="mt20"><b>THIS IS YOUR CURRENT DISPLAY PHOTO. </b></p>
								
								<!--p class="mt20"><img src="<?=base_url();?>assets/images/chat/workshop-thumb.png"> </p-->
								<p class="mt20"><img src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?=$user->avatar;?>"> </p>

							</div>  
						</div>
						
						<div class="form-group row">
					
							<div class="col-sm-8">
							 
							</div>	
						</div>
						
						<div class="form-group row add-proj_02 guest_add poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">QUICK INTRO</label>
							<div class="col-sm-8 project-visual quick_intro_guest" style="width:65%;">   
							
								<textarea rows="3" cols="50" maxlength="500" id="quick_intro" class="quick_intro" name="quick_intro" placeholder="ENTER QUICK INTRO"><?php if($user->quick_intro){ echo $user->quick_intro; }?></textarea>
								<p class="mt20">(OPTIONAL)</p>
							
							<script>

                                
CKEDITOR.replace( 'quick_intro', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
							
								
								<!--<textarea rows="3" cols="50" value="" maxlength="150" id="quick_intro" class="quick_intro" name="quick_intro" placeholder="ENTER QUICK INTRO"><?php echo $data1->quick_intro; ?></textarea> --> 
								 
							</div>
						</div>
						
						
										
				   			

				</form>
				   
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
$(document).ready(function(){
	
	 $("#register-form").validate({
			rules: {
				salutation: "required",
				gender: "required",
				
				//country_code: "required",
                                first_name:{
                                    required : true,
                                    maxlength : 50,
                                },
                                last_name:{
                                    required : true,
                                    maxlength : 50,
                                }
                                
                                
                                
                                
			},
			        errorPlacement: function(){
                               return false;
                         }
		});   
    
})

</script>


<script>


$('#file').bind('change', function () {
  var filename = $("#file").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active'); 
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
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