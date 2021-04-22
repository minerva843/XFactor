<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <style>
	
	
	:-moz-placeholder {
  color: #6c757d; }

::-moz-placeholder {
  color: #6c757d; }

:-ms-input-placeholder {
  color: #6c757d; }

::-webkit-input-placeholder {
  color: #6c757d; }
	
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

	</style>
	
	
	
	<div class="main dynamic-register">
	<div class="section-main">
	<!--
	
			<div class="header-xconnect">
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-8">
		<div class="middle-header clearfix">
		
		<div class="logo">
		<a href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-platform.png" alt=""> </a>
		</div> 
		
		</div>
		</div>
     
		<div class="col-md-4">    
		<div class="xconnect-right">
		<div class="user-search-btn-group ul-li clearfix">
		<ul>
	
		<li><a href="<?=base_url();?>auth/create_user"> <span>SIGN UP</span>  <i class="fas fa-edit"></i> </a></li>
		    
		<li>
		<label class="dropdown">
		<a class="dd-button">
		<span>SIGN IN</span> <i class="fas fa-user"></i>
		</a>
		<input type="checkbox" class="dd-input" id="test">
		<ul class="dd-menu">
		<li><a href="#!"><b>XME</b></a></li>
		<li><a href="#!">MY DETAILS</a></li>
		<li><a href="#!">PASSWORD</a></li>
		
		
		<li class="divider"></li>
		<li>
		<li><a href="#!"><b>XCONNECT</b></a></li>
		<li><a href="#!">MY REGISTRATIONS</a></li>
		<li><a href="#!">LET’S EXPLORE</a></li>
		
        <li class="divider"></li>
		<li><a href="#!"><b> XSHOP </b></a></li>
		<li><a href="#!">MY PURCHASES</a></li>
		 <li class="divider"></li>
		<li><a href="#!"><b>XCONTESTS </b></a></li>
		<li><a href="#!">XPLATFORM CHANCES</a></li>   
		<li><a href="#!">CONTEST CHANCES</a></li>   
		<li><a href="#!">LUCKY DRAW CHANCES</a></li> 
<li class="divider"></li>
 <?php 
                        if($this->ion_auth->logged_in()){ ?>
		<li><a href="<?=base_url();?>auth/logout"><b> LOG OUT </b></a></li>
<?php } ?>		
		</li>  
		</ul>     

		</label>
				
		</li>
		
		     
		<li>
		
		<label class="dropdown">
		<a class="dd-button">
		<i class="fas fa-align-justify" style="margin-right: 0px!important;"></i>  
		</a>

		<input type="checkbox" class="dd-input" id="test">

		<ul class="dd-menu">
		<li><a href="#!"><b>XPLATFORM</b></a></li>
		<li><a href="#!">HOME PAGE</a></li>
		<li><a href="#!">ABOUT</a></li>
		<li><a href="#!">CORPORATE ENQUIRIES</a></li>
		<li><a href="#!">SUPPORT</a></li>
		<li><a href="#!">GIGS</a></li>
		
		<li class="divider"></li>
	
		<li><a href="#!"><b>XCONNECT (INTERACTIVE VIEW)</b> <br> <span>NOTE: ALL DISPLAYS N 16:9 </span> </a></li>
		<li><a href="#!">ALL LISTINGS (PLACES)</a></li>
		<li><a href="#!">LET’S EXPLORE</a></li>
		<li><a href="#!"><b> XCONNECT (MOBILE USERS) </b></a></li>
		<li><a href="#!">CHAT</a></li>
		<li><a href="#!">POSTS</a></li>
		<li><a href="#!">PROGRAM</a></li>
		<li><a href="#!">ON DEMAND CONTENT
& LIVE STREAMS</a></li>
        <li class="divider"></li>
		<li><a href="#!"><b> XSHOP </b></a></li>
		<li><a href="#!">ALL LISTINGS (PRODUCTS)</a></li>
		 <li class="divider"></li>
		<li><a href="#!"><b>XCONTESTS </b></a></li>
		<li><a href="#!">ALL LISTINGS (GAMES)</a></li>   
		</li>  
		</ul>   

		</label>
		
		
		</li>
		
                
		</ul>
		</div>   
		</div>
		</div>
   
		</div>
		</div>
		</div>
		      -->   
	         
	
        <div class="container-fluid">
		<div class="row">   
                <div class="signup-form">  
				<div class="login-center">
				<div class="login-inner">
                    <form method="POST" action="<?=base_url()?>auth/login" class="login-form" id="register-form">
					<h2>LOG IN PAGE</h2>
				                               <?php  if ($this->session->flashdata('message') != ''): 
    echo $this->session->flashdata('message'); 
endif;
?>	  
 
					  <div class="log_form">
					   	  
					       <div class="row">
                            <div class="form-group">    
                                <label for="email" class="col-sm-4 col-form-label">USER ID</label>
                                <div class="col-sm-6">
                                    <input type="text" id="identity" maxlength="50" value="<?=$UserData->email;?>" name="identity" placeholder="ENTER USER ID"  />
                                </div>   
                            </div> 
							    
							</div> 
							
							 <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-sm-4 col-form-label">PASSWORD</label>
                                <div class="col-sm-6">
                                    <input type="password" id="password" maxlength="20" name="password" placeholder="ENTER PASSWORD"  />
                                </div>
                            </div>
</div>							
							
							 <div class="row">
                            <div class="form-group">    
                                <label for="password" class="col-sm-4 col-form-label login-pass"></label>
                                <div class="col-sm-6">
                                    <div class="form-submit log-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="submit" value="OK" class="submit" name="submit" id="login" />
                        </div>
                                </div>
								</div>
                            </div>  
					              
					  <!--
					   <div class="form-group login-form-field">
                                <label for="email" class="user">USERID </label>
                                <input type="text" id="identity" name="identity" placeholder="ENTER USER ID"  />
                            </div>
							</div>
							<div class="row">
                            <div class="form-group login-form-field">
                                <label for="password" class="user1">PASSWORD </label>
                                <input type="password" id="password" name="password" placeholder="ENTER PASSWORD"  />
                            </div>
							</div>-->
                        
					
                    </form>
					</div>
					<div class="login-forgot">
					<div class="forgot-password">
						<a href="<?=base_url();?>auth/forgot_password_user" class="switcher-text2">FORGOT USER ID OR PASSWORD</a>
						</div>
						<!-- <div class="register-account">
						<a href="<?=base_url()?>auth/create_user" class="switcher-text2">REGISTER AN ACCOUNT</a>
						</div> -->
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
	
	
<?php $this->session->unset_userdata('success_msg');?>
        <script>
                
            
          
$(document).ready(function(){
    
                $("#register-form").validate({
			rules: {
				identity: "required",
				password: "required",
 
			},
                        errorPlacement: function(){
                               return false;
                         }
                        
                        
//			messages: {
//				identity: "THIS FIELD IS REQUIRED.",
//				password: "THIS FIELD IS REQUIRED."
// 
//			}
		});   
    
    
});       
    
 
            </script>