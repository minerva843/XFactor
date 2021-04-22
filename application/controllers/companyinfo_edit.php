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
				<div class="row">
				<div class="col-md-2">  </div>
				<div class="col-md-8">
				<div class="sml-container">    
 <form method="POST" action="<?=base_url();?>Xme/SaveUserDetails" class="register-form" id="register-form" enctype="multipart/form-data">
               <div class="row mb-20">
				<div class="col-md-7"> <h3> COMPANY INFO (EDIT) </h3>  </div>
               <div class="col-md-5 text-right"> 
			   <a href="#" class="xme_btn" onclick="goBack()"> Back </a> 
			   <!--a href="<?=base_url();?>xme/companyinfo_success" class="xme_btn">Save</a-->  
			   <input type="submit" value="Save" class="xme_btn_save">
				 <input type="hidden" value="/xme/companyinfo_success" name="action">
				 <script>
					function goBack() {
					  window.history.back();
					}
				</script>
			   </div>     
				</div>
 				
				

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->company; ?>" maxlength="50" name="company" placeholder="COMPANY NAME" id="company" />

							</div>	
						</div>
						
						<div class="form-group row add-proj_02 guest_add poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">COMPANY ADDRESS </label>
							<div class="col-sm-8 project-visual quick_intro_guest" style="width:65%">   
							
								<textarea rows="3" cols="50" maxlength="500" id="company_address" class="company_address" name="company_address" placeholder="COMPANY ADDRESS"><?php if($user->company_address){ echo $user->company_address; }?></textarea>
								
							
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
						
							<div class="form-group row mt-30">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY POSTAL CODE
</label>
							<div class="col-sm-8">   
							<div class="row">
							<div class="col-sm-7">   
								 <select name="company_country" id="company_country">
								<option value="">SELECT YOUR COUNTRY CODE</option>
								<?php foreach($CountryCode as $row){?>
								<option value="<?=$row['id'];?>"  <?php if(!empty($user->country) && $user->country==$row['name'] ){ echo "selected";} ?>  ><?php echo $row['name'];?> +<?php echo $row['phonecode'];?>  </option>
								<?php }?> 
							</select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>

							</div>

                                       <div class="col-sm-5">
							 <input type="text" value="<?php echo $user->pincode; ?>" maxlength="8" name="company_postal_code" placeholder="POSTAL CODE" id="company_postal_code" style="margin-top: 0;" />

							</div>
							
							
						</div>
						</div>
						</div>
						     

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->designation; ?>" maxlength="50" name="designation" placeholder="DESIGNATION" id="designation" />

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
				designation: "required",
				company_address: "required",
				company: "required",
				
				company_country: "required",
                                company_postal_code:{
                                    required : true,
									digits:true,
                                    maxlength : 8,
                                }
                                
                                
                                
                                
			},
			        errorPlacement: function(){
                               return false;
                         }
		});   
    
})
 
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