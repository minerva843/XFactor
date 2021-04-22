
    
<div class="main dynamic-register">
	<div class="section-main">
 <div class="container-fluid">
		<div class="row">   
                <div class="signup-form">  
				<div class="login-center">
				<div class="login-inner">
                    <form method="POST" action="<?=base_url()?>auth/reset_password/<?=$code?>" class="login-form" id="register-form">
					<h2><?php echo lang('reset_password_heading');?></h2>
				                               <?php echo $message;?>	  
 <?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>
					  <div class="log_form">
					   	  
					       <div class="row">
                            <div class="form-group xpchange_usernmae">    
                                <label for="email" class="col-sm-4 col-form-label"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
                                <div class="col-sm-6">
                                    <input type="password" id="identity" maxlength="50" name="new" placeholder="ENTER PASSWORD (AT LEAST 8 CHARACTERS LONG)"  />
                                </div>   
                            </div>                
							    
							</div> 
							
							 <div class="row">
                            <div class="form-group">
                                <div for="password" class="col-sm-4 col-form-label xpchange_password"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?></div>  
                                <div class="col-sm-6">
                                    <input type="password" id="password" maxlength="20" name="new_confirm" placeholder="ENTER PASSWORD"/>
                                </div>
                            </div>
</div>							     
							
							 <div class="row">
                            <div class="form-group">    
                                <label for="password" class="col-sm-4 col-form-label login-pass"></label>
                                <div class="col-sm-6">
                                    <div class="form-submit log-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="submit" value="CHANGE" class="submit" name="submit" id="login" />
                        </div>
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
	</div>
	</div>        
	
	<div class="footer-year">
		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
		</div> 


