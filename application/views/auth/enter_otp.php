<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
/* .section-main .signup-content {
    margin: 30px auto;
} */

.wrapper.wrapper--w780 {
    width: 100%;
}
#forget-pass input#identity {
    width: 100%;
}
 #forget-pass .signup-content {
        margin-top: 20px;
} 
.register-form h2 {
    text-align: center;
    font-size: 20px !important;
    margin: 0 auto;
    padding-bottom: 10px;
    width: 100%;
}

.otp-form .signup-form .register-form p {
    color: green;
    text-align: center;
    width: 100%;
    font-size: 15px;
}
.signup-content {
    width: 100%;
}
#forget-pass .form-group label {
 width   : 100%
}
.form-submit.log-submit {
    margin: 0 auto;
	
}
.form-submit {
    width: 100% !important;
}
input#submit-forget {
	height: 32px;
    width: 108px;
}
#forget-pass .forgot-password {
    margin: 0 auto;
	    padding-top: 18px;
}
#forget-pass .signup-form .form-submit {
    padding-top: 12px;
}  
</style>
    <div class="main dynamic-register">
	
	<!--<div class="header-xconnect">
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-8">
		<div class="middle-header clearfix">
		
		<div class="logo">
		<a href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-logo-r.png" alt=""> </a>
		</div> 
		     
		</div>
		</div>

		<div class="col-md-4">     
		<!--div class="xconnect-right register-right">
		<button class="register-form-click" type="submit" id="reg_submit">CLICK HERE TO SUBMIT<br> REGISTRATION FORM </button>
		</div>   
		</div>    
   
		</div>
		</div>   
		</div-->
	
     <div class="container-fluid">
	 
		<div class="wrapper--w780" id="forget-pass">
		<div class="row">
		<div class="col-md-12">
            <div class="otp-form">
              
                <div class="signup-form">
                    <form method="POST" action="<?=base_url()?>auth/verify_otp/<?php echo $user->id; ?>/<?php echo $new; ?>" class="register-form" id="login-form">
                        <h2>USER VERIFICATION PAGE</h2>
 <?php  if ($this->session->flashdata('message') != ''): 
    echo $this->session->flashdata('message'); 
endif;
?>
						</h3>
						<!-- <div class="row">
                            <div class="form-group">
                                <div class="col-md-3"><label for="email" class="user">ENTER OTP</label></div>
                                <div class="col-md-9"><input type="text" id="otp" name="otp" placeholder="ENTER OTP" /></div>
                            </div> -->    
							    
							<div class="row">
                         <div class="form-group">
                                <label for="email" class="col-sm-4 col-form-label">ENTER OTP</label>
                                <div class="col-sm-6">
                                   <input type="text" id="otp" name="otp" placeholder="ENTER OTP" />
								    <p style="color:red !important; text-align: left; font-size: 12px;">EMAIL OTP IS ONLY VALID FOR 5 MINUTES.</p>   
                                </div>
                            </div> 
							</div>     
                           
												
							<div class="row">   
                         <div class="form-group">  
						  <div class="col-sm-10">
							<div class="form-submit log-submit">
							<!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
							<input type="submit" value="OK" class="submit" name="submit" id="submit-forget" />
							</div>
							</div>
							</div>
							</div>
							<?php //print_r($user->id); ?>
							<div class="forgot-password">
						<a href="<?php echo base_url(); ?>auth/resendOtp/<?php echo $user->id; ?>" class="switcher-text2">RESEND EMAIL ONE TIME PASSWORD (OTP)</a>
						<a href="<?php echo base_url();?>auth/login" class="switcher-text2">BACK TO LOG IN PAGE </a>
						</div>    
							
							</div>
                         
                        
						
						</div>
                    </form>
					
            </div>
			 </div>
        </div>
    </div>
	</div>
    </div>
        <script>
                
            
          
$(document).ready(function(){
    
                $("#login-form").validate({
			rules: {
		            otp: {
                               required: true,
                               maxlength: 6
                          }
			},
			messages: {
				otp: "THIS FIELD IS REQUIRED."
				 
			}
		});   
    
    
});       
    
 
            </script>
