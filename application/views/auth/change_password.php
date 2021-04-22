<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <style>
	.signup-content {
    width: 100%;
}
.form-submit.log-submit {
    padding-top: 25px;
}
.form-group.login-form-field label,input {
	margin-top:7px;
	margin-bottom:7px;
}
 .section-main .signup-content {
        margin-top: 20px;
} 
.signup-form form.login-form {
    padding: 118px 50px 22px 50px !important;
}
.signup-form .login-form h2 {
    padding-bottom: 0px !important;
    padding-left: 0px;	
}
#change_password .log_form label {
    width: 28% !important;
}
.form-submit.log-submit {
    padding-top: 10px;
}
	</style>
	
	<div class="main">
	<div class="section-main">
        <div class="container">
		<div class="row">
            <div class="signup-content" id="change_password">
                <!-- div class="signup-img">
                    <! <img src="images/signup-img.jpg" alt=""> >
					<h1>XMANAGE</h1>
					<div class="ftr-text">
					<p>2019-CURRENT YEAR.XMANAGE.</p>
					</div>
                </div -->       
                <div class="signup-form">
                    <form method="POST" action="<?=base_url()?>auth/change_password" class="login-form" id="register-form">
					<h2>CHANGE PASSWORD</h2>
					  <?php  if ($this->session->flashdata('message') != ''): 
    echo $this->session->flashdata('message'); 
endif;
?>
					  <div class="log_form">
					  <div class="row">
					   <div class="form-group login-form-field">
                               <?php echo lang('change_password_old_password_label', 'old_password');?>
                                <?php echo form_input($old_password);?>
                            </div>
							</div>
							<div class="row">
                            <div class="form-group login-form-field">
                                <label for="password" class="user1">NEW PASSWORD </label>
                                <input type="password" id="new" name="new" placeholder="" required/>
                            </div>
							</div>
														<div class="row">
                            <div class="form-group login-form-field">
                                <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
                                <?php echo form_input($new_password_confirm);?>
                            </div>
							</div>
                        <div class="form-submit log-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
							<?php echo form_input($user_id);?>
                            <?php echo form_submit('submit', lang('change_password_submit_btn'));?>
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
    
                $("#register-form").validate({
			rules: {
                              old: {
                                         required: true,
                                         minlength: 8
                                },
                                new: {
                                         required: true,
                                         minlength: 8
                                },
                                new_confirm: {
                                         required: true,
                                         minlength: 8,
                                         equalTo: "#new"
                                }
			},
			messages: {
				old: "THIS FIELD IS REQUIRED.",
                                new: "THIS FIELD IS REQUIRED.",
                                new_confirm : {
                                    required: "THIS FIELD IS REQUIRED.",
                                    equalTo: "PASSWORD AND CONFIRM PASSWORD DO NOT MATCH.",
                                }
				 
			}
		});  
    
    
});  
            
            </script>