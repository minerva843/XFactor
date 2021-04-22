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
                <div class="signup-form create-user m-t-140">
				<h2>FORGET USER ID</h2>
    
   
 
                    <form method="POST" action="<?php echo base_url(); ?>auth/retrive_user" class="register-form" id="register-form11">
<?php  echo $message; ?> 
						<div class="to-help-you"><p> TO HELP YOU RETRIEVE YOUR USER ID, WE REQUIRE SOME INFORMATION.</p></div>
						<h4 class="personal-info">REQUIRED - PERSONAL INFO </h4>
						<span style="color:red"></span>
						
                         
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="first_name">FIRST NAME </label></div>
                            <div class="col-md-6"><input type="text" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" /></div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="last_name">LAST NAME </label></div>
                            <div class="col-md-6"><input type="text" name="last_name" placeholder="ENTER LAST NAME" id="last_name" /></div>
                        </div>
						</div>
						
						<!--div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="last_name">EMAIL </label></div>
                            <div class="col-md-6"><input type="email" name="email" placeholder="ENTER EMAIL" id="email" /></div>
                        </div>
						</div-->
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="username">COUNTRY CODE </label></div>
                            <div class="col-md-6">
							<!--input type="text" name="country" placeholder="SELECT YOUR COUNTRY CODE" id="country" / -->
							<select name="country_code" id="country_code" class="mb-20">
								<option value="">SELECT YOUR COUNTRY CODE</option>
								<?php foreach($CountryCode as $row){?>
								<option value="<?=$row['id'];?>"><?php echo $row['name'];?> +<?php echo $row['phonecode'];?>  </option>
								<?php }?> 
							</select>    
							
							</div>
                        </div>
						</div>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="username">MOBILE NUMBER </label></div>
                            <div class="col-md-6"><input type="text" name="phone" placeholder="ENTER MOBILE NUMBER" id="phone" /></div>
                        </div>
						</div>
						
			<!-- div class="row">
                         <div class="form-group">
                           <div class="col-md-4"> <label for="mobile">GENDER </label></div>
                           <div class="col-md-5"> 		   
				              <select name="gender" id="salutation" aria-required="true" class="" >
                                        <option value=''>SELECT YOUR GENDER</option>
                                        <option value="MR">MR</option>
                                        <option value="MS">MS</option>
                                </select>
			    </div>
                        </div>
			</div -->
			
						<!-- div class="row date-margin">
						<div class="form-group">
						<div class="col-md-4"><label for="gender">BIRTHDAY </label></div>
						<div class="col-md-6">
						<div class="form-select dob-year">
							<input type="text" name="bday_year"  style="width:100% !important"  placeholder="ENTER DOB" id="dob">
						</div>
						</div>
						</div>

						<div class="form-group">
						<div class="col-md-2">   

						</div>
						</div>
						</div -->
						
					
			<!--div class="row">
                         <div class="form-group">
                           <div class="col-md-4"> <label for="mobile">COMPANY NAME </label></div>
                           <div class="col-md-6"> <input type="text" name="company" placeholder="ENTER COMPANY NAME" id="mobile"></div>
                        </div>
			</div -->             
						      
						<div class="row">
                         <div class="form-group">
						 <div class="col-md-10">
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                         <input type="submit" value="RETRIEVE USER ID" class="submit" name="submit" id="submit-register" / style="    margin-right: 0px;">				
                        </div>
						</div>
						</div>
						</div>
						
						<div class="row back-to-login">
                         <div class="form-group">
                           <div class="col-md-12"> <a href="<?=base_url()?>auth/login">BACK TO LOG IN PAGE </a></div>
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
	var year = 1900;
	var till = new Date().getFullYear();
	var options = "<option disabled  selected  value=' '>SELECT YEAR</option>";
	for(var y=year; y<=till; y++){
	  options += "<option>"+ y +"</option>";
	}
	//document.getElementById("year").innerHTML = options;
        
$(document).ready(function(){
    // $('#dob').datepicker({
          // changeYear: true,
          // changeMonth: true,
          // dateFormat: "yy-mm-dd",
          // maxDate: "-8y",
          // yearRange: "-100:+0"
    // });
                $("#register-form11").validate({
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
					
					email: {
						  required: true,
						  maxlength: 50,
					 },
					 phone: {
						  required: true,
						  number: true,
						  maxlength: 12,
					 },
                                
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