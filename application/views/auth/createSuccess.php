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
    font-size: 16px;
    margin: 10px 0px;
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

    <div class="main signup dynamic-register" id="register-form22">
	<div class="section-main"> 
<!--	
		<div class="header-xconnect">
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
		<div class="xconnect-right register-right register-link">
		<ul>   
		<li> <a href="<?=base_url();?>">XPLATFORM HOME</a> </li>
		<li> <a href="#">XCONNECT (WHAT’S NEW)</a> </li>
	    <li> <a href="#">XCONNECT (LET’S EXPLORE)</a> </li>
		</ul>
		</div>
		 
		</div>
   
		</div>
		</div>
		</div>
		       -->
		
		</div>       
		
		   	   
              
                <div class="signup-form create-user create-user-sucess">
				<h2 class="regi-normal">REGISTRATION FORM FOR <b>XPLATFORM</b> </h2>
				
				<div class="register-success">
				<p class="mb-0">YOUR REGISTRATION IS <span class="sucess"><b>SUCCESSFUL.</b></span></p>
				<p class="mb-0">ALL REGISTRATION DETAILS WILL BE EMAILED TO YOU SHORTLY.</p>
				<p class="mb-0">THANK YOU FOR YOUR SUPPORT. HAVE FUN AND START EXPLORING.</p>
				
				<h3>FOR NEW XPLATFORM USERS</h3>
				  
				<p>GO TO <a> www.xplatform.live </a></p>
				<p>YOUR ACCOUNT DETAILS CAN BE FOUND IN THE "REGISTRATION SUCCESSFUL" EMAIL.
				   </p>   
				
				<h3>FOR EXISTING XPLATFORM USERS</h3>
				    
				<p>GO TO <a>www.xplatform.live</a>
				<p>LOG IN WITH YOUR EXISTING <b>XPLATFORM</b> USER ID AND PASSWORD. </p>
				<p>THESE DETAILS CAN BE FOUND IN THE “REGISTRATION SUCCESSFUL” EMAIL.</p>
				
				<h3>FOR ASSISTANCE</h3>
				<p>SHOULD YOU REQUIRE FURTHER ASSISTANCE, WE CAN BE CONTACTED AT <span class="mail-to"><a href="mailto:support@xplatform.live">support@xplatform.live </a></span></p>    
				</div>     
 			          
        
		</div> 
        </div>
   
    </div>
	
	<div class="footer-year">
		  <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
		 </div>
	
<script>
	var year = 1900;
	var till = new Date().getFullYear();
	var options = "<option disabled  selected  value=' '>SELECT YEAR</option>";
	for(var y=year; y<=till; y++){
	  options += "<option>"+ y +"</option>"; 
	}
//	document.getElementById("year").innerHTML = options;
        
$(document).ready(function(){
   
       $('#dob').datepicker({
          changeYear: true,
          changeMonth: true,
          dateFormat: "yy-mm-dd",
          maxDate: "-8y",
         yearRange: "-100:+0"
    });
   $("#dob_icon").click(function(){
        
       $('#dob').datepicker('show');
            return false  
        
    });
                $("#form_ganerate").validate({ 
			rules: {
				salutation: "required",
				gender: "required",
				country_code: "required",
                                first_name:{
                                         required: true, 
                                         
										 maxlength: 30
                                },
                                last_name:{
                                         required: true, 
                                         
										 maxlength: 30 
                                },
                                username:{
                                         required: true, 
                                         
										 maxlength: 30
                                },
                                bday_year:"required",
                                month:"required",
                                date:"required",
                                company_name:"required",
                                mobile:{
				required: true,
                                      number: true,
                                      minlength: 6,
                                      maxlength: 12,
									
				},
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
                                email:"required",
                                password: {
                                         required: true, 
                                         minlength: 8,
										 maxlength: 20
                                },
                                password_confirm: {
                                         required: true,
                                         minlength: 8,
										 maxlength: 20,
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