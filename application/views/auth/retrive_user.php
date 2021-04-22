<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>

:-moz-placeholder {
  color: #6c757d;
}

::-moz-placeholder {
  color: #6c757d;
}

:-ms-input-placeholder {
  color: #6c757d;
}

::-webkit-input-placeholder {
  color: #6c757d; 
}


.signup-content {
    width: 100%;
}
 #register-form22 .section-main .signup-content {
        margin-top: 20px;
} 
form.register-form {
    padding: 10px 50px 20px 50px !important;
}
#register-form22 .create-user .form-select {
    height: 35px;
}
#register-form22 .create-user .form-group input {
    margin-bottom: 5px;
}
#register-form22 .create-user .form-submit {
    padding-top: 6px;
}
.signup .signup-form .form-group label {
    width: 100%;
}
.create-user select {
    width: 100%;
}
.create-user label,select,input{width: 100% !important;}
.create-user select {
    padding: 5px 10px;
    font-size: 12px;
    border: 1px solid #ebebeb;
    color: #6c757d;
    font-weight: 500;
	line-height: 14px;
}
.signup-form.create-user .form-group input {
    padding: 0px;
	padding-left: 8px;
    padding-right: 8px;
	}
.create-user input#submit-register {
    width: auto !important;
    margin: 0 auto;
    float: right;
    font-family: calibri;
    color: #333333;
    padding: 5px 30px 5px 30px;
}  
.create-user .register-form h4 {
    padding-bottom: 0px;
    font-weight: 600;
    font-size: 14px;
    margin: 10px 0px;
    text-align: left;
    margin-left: 0px;   	
}
.create-user select#code {
    font-size: 12px;
	margin-bottom: 7px;
}
#register-form22 .signup-content {
    height: 670px;
}   

 


.create-user .dob-year{width:118px}
.create-user .dob-date{width: 118px !important;
    margin-left: 47px;}
.create-user .dob-month{width: 118px;
    margin-left: 25px;}
.create-user select#date {
    padding: 6px 6px;
	}
.create-user select#month {
    background: #fff;
    padding: 6px 6px;	
	}
.create-user select#gender {
    padding: 6px 6px;
	}
.create-user select#year {
    padding: 6px 6px;
}	
</style>

    <div class="main signup dynamic-register" id="register-form22">   
	<div class="section-main">
	
	 
		
	
	
        <div class="container-fluid">
		<div class="row">     
		<div class="col-md-12">
                <div class="signup-form create-user m-t-140 retrive_user">
				<h2>FORGET USER ID <?php if(!empty($user)){ echo 'SUCCESSFUL'; }else{ echo 'UNSUCCESSFUL (ENTRY CANNOT BE FOUND)'; }?></h2>
				
				<?php if(!empty($user)){?>
				<p class="switcher-text2">YOUR USER ID IS : </p> 
				<p class="switcher-text2"><?=$user->email;?></p>
				<?php }else{?>
				<p class="switcher-text2">No record found.</p>
				<a href="<?=base_url();?>auth/forgot_password_user" class="switcher-text2 backto_logins">FORGOT USER ID OR PASSWORD</a>
				<!--a href="<?=base_url()?>auth/forgot_password" class="switcher-text2">FORGOT PASSWORD</a><br-->
				<?php }?>
				<a href="<?=base_url()?>auth/login" class="switcher-text2 backto_login">BACK TO LOG IN PAGE</a>     

            </div>
		</div>
        </div>    
        </div>

    </div>
<script>
	var year = 1900;
	var till = new Date().getFullYear();
	var options = "<option disabled  selected  value=' '>SELECT YEAR</option>";
	for(var y=year; y<=till; y++){
	  options += "<option>"+ y +"</option>";
	}
	//document.getElementById("year").innerHTML = options;
        
$(document).ready(function(){
    $('#dob').datepicker({
          changeYear: true,
          changeMonth: true,
          dateFormat: "yy-mm-dd",
          maxDate: "-8y",
          yearRange: "-100:+0"
    });
                $("#register-form").validate({
			rules: {
				
                                first_name:{
                                    required : true,
                                    maxlength : 50,
                                },
                                last_name:{
                                    required : true,
                                    maxlength : 50,
                                },
                                country_code:"required",
								phone: {
                                      required: true,
                                      number: true,
                                      maxlength: 12,
                                 }
                                
			},
			        errorPlacement: function(){
                               return false;
                         }
		});   
    
    
});      
        

</script>
<style>
    
    .error {   
    border: 1px solid #f00 !important;
}

 
    
</style>