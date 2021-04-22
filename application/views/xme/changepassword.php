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
			<form method="POST" action="<?=base_url();?>xme/changenewpassword" class="register-form" id="register-form" enctype="multipart/form-data">
                <div class="row mb-20">
				<div class="col-md-7"> <h3> CHANGE PASSWORD </h3>  </div>
                <div class="col-md-5 text-right"> <a href="#" class="xme_btn" onclick="goBack()">BACK</a> 
				<script>
					function goBack() {
					  window.history.back();
					}
				</script>
				<input type="submit" value="NEXT" class="xme_btn_save">
				<!--a href="<?=base_url();?>xme/changepassword_nosuccess" class="xme_btn">NEXT</a-->  </div>    
				</div>
				
				<form>      

				<div class="form-group row">
				<div class="col-sm-12">
				<p> A One Time Password has been sent to your email account.</p>				
				<p style="color:red"> <b><?=$msg?></b></p>				
				</div>
				</div>
				
				           <div class="form-group row" style="margin-left:0px;">
                                <label for="email" class="col-sm-4 col-form-label" style="padding-left: 0px;">ONE TIME PASSWORD</label>
                                <div class="col-sm-8">
                                    <input type="password" id="otp" name="otp" placeholder="ENTER ONE TIME PASSWORD">
                                </div>
                            </div> 
							
							
							<div class="form-group row">  
							<div class="col-sm-6">
							<a href="<?=base_url();?>xme/changepassword" class="forgot-xme">RESEND ONE TIME PASSWORD</a>
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
$(document).ready(function(){
	
	 $("#register-form").validate({
			rules: {
				otp: "required"
				
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