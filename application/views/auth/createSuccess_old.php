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
    padding: 5px 15px;
}  
.create-user .register-form h4 {
    padding-bottom: 0px;
    font-weight: 600;
    font-size: 14px;
    margin: 5px;
    text-align: left;
    margin-left: 0px;   	
}
.create-user select#code {
    font-size: 12px;
	margin-bottom: 7px;
}
#register-form22 .signup-content {
    height: 590px;
}   

.create-user .dob-year{width:118px}
.create-user .dob-date{width: 118px !important;
    margin-left: 47px;}
.create-user .dob-month{width: 118px;
    margin-left: 25px;}
.create-user select#date {
    padding: 6px 0px 6px 4px;
	}
.create-user select#month {
    background: #fff;
    padding: 6px 0px 6px 4px;	
	}
.create-user select#gender {
    padding: 6px 0px 6px 4px;
	}
.create-user select#year {
    padding: 6px 0px 6px 4px;
}	
</style>

    <div class="main signup ceate-sucess-form" id="register-form22">
	<div class="section-main">
        <div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
            <div class="signup-content">
                <div class="signup-img">
                    <!-- <img src="images/signup-img.jpg" alt=""> -->
					<h1>XCONNECT</h1>
					<div class="ftr-text">
					<p>2019 – 2020. <b> XMANAGE</b>.</p>
					</div>
                </div>
                <div class="signup-form create-user">
				<h2>&nbsp;</h2>
  <?php  if ($this->session->flashdata('message') != ''): 
    echo $this->session->flashdata('message'); 
endif;
?>        
                    <form method="POST" action="<?=base_url();?>auth/login" class="register-form" id="register-form">

                     <h3 class="create-an-act"> REGISTER AN ACCOUNT <span class="sucess">SUCCESSFUL</span>. </h3>

					<p class="register-below"> YOUR REGISTRATION DETAILS ARE LISTED BELOW:</p>

						<h4 class="personal-info">PERSONAL INFO </h4>
						<span style="color:red"><?php if(isset($msg)){echo $msg;} ?><span style="color:red"><?php if(isset($project_register_msg)){echo $project_register_msg;} ?></span>
						
                         <div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">FIRST NAME </label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo $user->first_name; ?></div>
						    </div>
                            </div> 
						</div>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">LAST NAME</label></div>
							<div class="col-md-4">
                            <div class="zone-label"> <?php echo $user->last_name; ?></div>
						    </div>
                            </div> 
						</div>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">COUNTRY CODE </label></div>
							<div class="col-md-4">
                            <div class="zone-label"> 91</div>
						    </div>
                            </div> 
						</div>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">MOBILE NUMBER </label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo $user->phone; ?></div>
						    </div>
                            </div> 
						</div>
						
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">GENDER</label></div>
							<div class="col-md-4">
                                                            <div class="zone-label"><?php echo ucfirst($user->gender); ?></div>
						    </div>
                            </div> 
						</div>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">BIRTHDAY </label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo ucfirst($user->dob); ?></div>
						    </div>
                            </div> 
						</div>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">USER NAME </label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo $user->username; ?></div>
						    </div>
                            </div> 
						</div>
						
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">COMPANY NAME</label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo $user->company; ?></div>
						    </div>
                            </div> 
						</div>
						
						<h4>LOG IN INFO </h4>
						
						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">EMAIL ADDRESS </label></div>
							<div class="col-md-4">
                            <div class="zone-label"><?php echo $user->email; ?></div>
						    </div>
                            </div> 
						</div>
						

						<div class="row">
                            <div class="form-group row">
							<div class="col-md-3"><label for="gender">PASSWORD </label></div>
							<div class="col-md-4">
                            <div class="zone-label">**********</div>
						    </div>
                            </div> 
						</div>
						
						
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="submit" value="START USING XCONNECT" class="submit" name="submit" id="submit-register" />
							
                        </div>
						
                    </form>
                </div>
            </div> 
			</div>  
		</div>
        </div>
        </div>

    </div>
<script>
	var year = 1900;
	var till = new Date().getFullYear() - 10;
	var options = "<option disabled  selected  value=' '>SELECT YEAR</option>";
	for(var y=year; y<=till; y++){
	  options += "<option>"+ y +"</option>";
	}
	document.getElementById("year").innerHTML = options;
        
$(document).ready(function(){
    
                $("#register-form").validate({
			rules: {
				salutation: "required",
				gender: "required",
                                first_name:"required",
                                last_name:"required",
                                username:"required",
                                year:"required",
                                month:"required",
                                date:"required",
                                company_name:"required",
                                mobile:"required",
                                email:"required",
                                password: {
                                         required: true,
                                         minlength: 8
                                },
                                password_confirm: {
                                         required: true,
                                         minlength: 8,
                                         equalTo: "#password"
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