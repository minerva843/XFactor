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
				<div class="col-md-7"> <h3> CONTACT INFO (EDIT) </h3>  </div>
               <div class="col-md-5 text-right"> 
			   <a href="#" class="xme_btn" onclick="goBack()"> Back </a> 
			   <script>
					function goBack() {
					  window.history.back();
					}
				</script>
			   <!--a href="<?=base_url();?>xme/contactinfo_success" class="xme_btn">Save</a-->  
			   <input type="submit" value="Save" class="xme_btn_save">
				 <input type="hidden" value="/xme/contactinfo_success" name="action">
			   </div>          
				</div>    
 				
				

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAIL</label>
							<div class="col-sm-8">
								<div class="zone-label running_latter"><?php echo $user->email; ?></div>
								<!--input type="email" value="<?php echo $user->email; ?>" maxlength="50" name="email" placeholder="ENTER EMAIL ADDRESS" id="email" /-->

							</div>	
						</div>
						
						
							<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COUNTRY CODE</label>
							<div class="col-sm-8">
								  <select name="country_code" id="country_code">
								<option value="">SELECT YOUR COUNTRY CODE</option>
								<?php foreach($CountryCode as $row){?>
								<option value="<?=$row['id'];?>"  <?php if(!empty($user->country_code) && $user->country_code==$row['id'] ){ echo "selected";} ?>  ><?php echo $row['name'];?> +<?php echo $row['phonecode'];?>  </option>
								<?php }?> 
							</select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>

							</div>
						</div>
						     

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">MOBILE</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->phone; ?>" maxlength="12" name="phone" placeholder="ENTER MOBILE NUMBER" id="phone" />

							</div>	
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DID</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->did; ?>" maxlength="12" name="did" placeholder="ENTER DID NUMBER" id="did" />
								<p class="otionals"> (OPTIONAL)</p>

							</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">TEL</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->tel; ?>" maxlength="12" name="tel" placeholder="ENTER TELEPHONE NUMBER" id="tel" />
								<p class="otionals"> (OPTIONAL)</p>

							</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EXTENSION</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $user->extension; ?>" maxlength="10" name="extension" placeholder="ENTER EXTENSION NUMBER" id="extension" />
								<p class="otionals"> (OPTIONAL)</p>

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
				 
				country_code: "required",
               extension:{
				  number: true,
				  maxlength: 10,
									
				},
				did:{
				  number: true,
				  maxlength: 12,
									
				},
				tel:{
				  number: true,
				  maxlength: 12,
									
				},
                   
                                phone:{
									required: true,
                                      number: true,
                                      minlength: 6,
                                      maxlength: 12,
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