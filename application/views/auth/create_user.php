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
    padding: 5px 6px;
    max-height: 26px;
}   
.create-user select#year {
    padding: 6px 6px;
}	
</style>     
<?php $AllSettingData = $this->setting_model->checkentryornot();?>
<!-- Modal -->
<div id="myModal1" class="modal fade term-of-usemodel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">TERMS OF USE</h4>
      </div>
      <div class="modal-body">
        <div class="termofuse-scroll-popup">   
         <?=$AllSettingData->terms_of_use;?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>  
      </div>
    </div>   

  </div>
</div>

<div id="myModal2" class="modal fade term-of-usemodel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PRIVACY POLICY</h4>
      </div>
      <div class="modal-body">
        <div class="termofuse-scroll-popup">   
         <?=$AllSettingData->privacy_policy;?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>  
      </div>
    </div>   

  </div>
</div>

    <div class="main signup dynamic-register" id="register-form22"> 
	<div class="section-main">
	
	<!--<div class="header-xconnect">
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-8">
		<div class="middle-header clearfix">
		
		<div class="logo">
		<a href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-platform.png" alt=""> </a>
		</div> 
		     
		</div>
		</div>
<?php  
if(!empty($message)){ 

}else{
//echo $message; ?>
<div class="col-md-4">    
		<div class="xconnect-right register-right">
		<button class="register-form-click" type="submit" id="reg_submit">CLICK HERE TO SUBMIT<br> REGISTRATION FORM </button>
		</div>   
		</div>
<?php }?>
		    
   
		</div>
		</div>   
		</div>  -->
		
	
        <div class="container-fluid register-account-top">
		<div class="row">
		<div class="col-md-12">     
                <div class="signup-form create-user">
				
    <?php //print_r($reset_data); ?>
   
 
                   
<?php  
if(!empty($message)){
	// echo '<div class="errmsg-oop"><p class="red-ddf2">Oops. There is a problem.</p><p class="red-ddf2">You already have an account.</p>';
	// echo '<p><a href ="'.base_url().'auth/forgot_password_user">Forget Email or Password</a></p>'; 
	// echo '<p><a href ="'.base_url().'auth/create_user">Register An Account</a></p></div>'; 
	?>
	
	<div class=" create-user-sucess">
				<h2 class="regi-normal">REGISTRATION FORM FOR <b>XPLATFORM</b> </h2>   
				
				<div class="register-success notregister-success">
				<p>OOPS. THERE IS A PROBLEM. <span class="not-sucess"><b>YOU ALREADY HAVE ACCOUNT.</b></span></p>
				<p>CLICK ON THE LINK BELOW TO RETURN TO RETRY.</p>
				<p><a href="<?php echo base_url(); ?>auth/register"> REGISTRATION PAGE </a> </p>  
				
				 
				<p>CLICK ON THE LINK BELOW TO RETRIVE YOUR USER ID OR PASSWORD.</p>
				<p><a href="<?php echo base_url(); ?>auth/forgot_password_user"> FORGOT USER ID OR PASSWORD </a> </p>  
				<h3>FOR ASSISTANCE</h3>
				<p>SHOULD YOU REQUIRE FURTHER ASSISTANCE, WE CAN BE CONTACTED AT <span class="mail-to running_latter"><a href="mailto:support@xplatform.live">support@xplatform.live </a> </span></p>
				</div>   
 			          
        
		</div>
	
<?php }else{
//echo $message; ?> 
<h2>REGISTER AN ACCOUNT</h2>
 <form method="POST" action="<?=base_url();?>auth/register" class="register-form" id="register-form">
						<h4 class="personal-info">LOG IN INFO </h4> 
<span style="color:red"><?php if(isset($msg)){echo $msg;} ?><span style="color:red"><?php if(isset($project_register_msg)){echo $project_register_msg;} ?></span>	
					
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">ENTER EMAIL </label></div>
                            <div class="col-md-8"><input type="email" class="small-case" maxlength="50" name="email" value="<?php if(!empty($reset_data['email'])){ echo $reset_data['email'];} ?>" placeholder="ENTER EMAIL ADDRESS" id="email" / style="margin-bottom: 10px!important;">
							
                            <span class="register-hint" style="margin-bottom: 7px;">EMAIL ADDRESS WILL BE YOUR USER ID. THIS CANNOT BE CHANGED LATER ON.</span>
							
                            </div>   
                        </div>
						</div>
						
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="password">ENTER PASSWORD </label></div>
                            <div class="col-md-8"><input type="password" maxlength="20" name="password" placeholder="ENTER PASSWORD" id="password" /></div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="re_password">RE ENTER PASSWORD </label></div>
                            <div class="col-md-8"><input type="password" maxlength="20" name="password_confirm"  placeholder="RE ENTER PASSWORD" id="password_confirm" /></div>
                        </div>
						</div>
						
						<h4>PERSONAL INFO </h4>
						
						
                         <div class="row">
                            <div class="form-group">
							<div class="col-md-4"><label for="gender">SALUTATION & GENDER </label></div>
							<div class="col-md-4 p-r-5">
                                <div class="form-select">
                                    <select name="salutation"  id="salutation">
                                        
                                        <option value="">SELECT YOUR SALUTATION</option>
                                        <option value="MR"  <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MR" ){ echo "selected";} ?>  >MR</option>     
										<option value="MS" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MS" ){ echo "selected";} ?> >MS</option> 
										<option value="MRS" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MRS" ){ echo "selected";} ?>> MRS</option>
                                        <option value="MDM" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MDM" ){ echo "selected";} ?>>MDM</option>
										<option value="DR" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="DR" ){ echo "selected";} ?>>DR</option>
										<option value="PROF" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="PROF" ){ echo "selected";} ?>>PROF</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
								</div>
                            </div>
                            <div class="form-group">   
				 <div class="col-md-4 p-l-5">
                                <div class="form-select">
					 <select name="gender" id="gender">
                                        <option value="">SELECT YOUR GENDER</option>
                                        <option value="male" <?php if(!empty($reset_data['gender']) && $reset_data['gender']=="male" ){ echo "selected";} ?> >MALE </option>
                                        <option value="female" <?php if(!empty($reset_data['gender']) && $reset_data['gender']=="female" ){ echo "selected";} ?> >FEMALE</option>
                                    </select>
                                   <!--  <select name="city" id="city">
                                        <option value="">SELECT YOUR GENDER</option>
                                        <option value="losangeles">Los Angeles</option>
                                        <option value="washington">Washington</option>
                                    </select> -->
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="first_name">FIRST NAME </label></div>
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['first_name'])){ echo $reset_data['first_name'];} ?>" maxlength="50" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" /></div>
                        </div>
						</div>   
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="last_name">LAST NAME </label></div>
                            <div class="col-md-8"><input type="text" maxlength="50" value="<?php if(!empty($reset_data['last_name'])){ echo $reset_data['last_name'];} ?>" name="last_name" placeholder="ENTER LAST NAME" id="last_name" /></div>
                        </div>
						</div>
						<div class="row" style="margin-bottom: 10px;">
                        <div class="form-group">
                            <div class="col-md-4"><label for="username">USER NAME </label></div>
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['username'])){ echo $reset_data['username'];} ?>" name="username" maxlength="50" placeholder="ENTER USERNAME" id="username" style="margin-bottom: 10px!important;">
                                <span class="register-hint">USER NAME IS YOUR PREFERRED NAME TO BE DISPLAYED / PRINTED.</span> 
                            </div>
                        </div>
						</div>
			
						<div class="row date-margin">
                            <div class="form-group">
				<div class="col-md-4"><label for="gender">BIRTHDAY </label></div>
				<div class="col-md-8">
                                <div class="form-select dob-year">
                                    <input type="text" name="bday_year" value="<?php if(!empty($reset_data['bday_year'])){ echo $reset_data['bday_year'];} ?>" style="width:100% !important"  placeholder="ENTER DOB" id="dob">
                                      <i id="dob_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							
                                </div>
				</div>
                            </div>
 
			<div class="form-group">
				<div class="col-md-2">
     
                            </div>
                        </div>
						</div>
						<h4>COMPANY & WORK INFO </h4>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="company_name">COMPANY NAME </label></div>
                            <div class="col-md-8"><input type="text" maxlength="15" name="company_name" value="<?php if(!empty($reset_data['company_name'])){ echo $reset_data['company_name'];} ?>" placeholder="ENTER COMPANY NAME" id="company_name"></div>
                        </div>
						</div>
						<h4>CONTACT INFO </h4>
						
						<div class="row">   
					   <div class="form-group">
                           <div class="col-md-4"> <label for="country_code">COUNTRY CODE </label></div>
						   <div class="col-md-8">
						   <div class="form-select">
							<select name="country_code" id="country_code">
								<option value="">SELECT YOUR COUNTRY CODE</option>
								<?php foreach($CountryCode as $row){?>
								<option value="<?=$row['id'];?>"  <?php if(!empty($reset_data['country_code']) && $reset_data['country_code']==$row['id'] ){ echo "selected";} ?>  ><?php echo $row['name'];?> +<?php echo $row['phonecode'];?>  </option>
								<?php }?> 
							</select>
							</div>
							</div>
                        </div>
                        </div>
						<div class="row">
                         <div class="form-group">
                           <div class="col-md-4"> <label for="mobile">MOBILE NUMBER </label></div>
                           <div class="col-md-8"> <input type="text" maxlength="12" name="mobile" value="<?php if(!empty($reset_data['mobile'])){ echo $reset_data['mobile'];} ?>" placeholder="ENTER MOBILE NUMBER" id="mobile"></div>
                        </div>    
						</div>
						
						
						
						<div class="row">
						<div class="form-group">
                            <div class="col-md-12"><label class="term-of-useheding">ACCOUNT CREATION & TERMS OF USE </label> </div>
                            <div class="col-md-12">  
							
								<div class="term-of-use">
								<p style="color:red;" class="chek_reg"></p>
								<input type="checkbox" id="d_476" name="delete_val" value="1" class="">
								<label for="d_476"> <span>I hereby give content for a <b> XPLATFORM</b> user account to be created, and agree to abide by the 
								<a data-toggle="modal" data-target="#myModal1"> TERMS OF USE </a> & <a data-toggle="modal" data-target="#myModal2"> PRIVACY POLICY. </a> </span> </label>       
							    </div>             
							
							</div>
                        </div>
						</div>
						
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> 
                            <input type="submit" value="REGISTER" class="submit" name="submit" id="submit-register" />-->
							
                        </div>
						
                    </form>
<?php }?>
                </div>
            </div>
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
	//document.getElementById("year").innerHTML = options;
        
$(document).ready(function(){
	$("#myModal1").modal({
show:false,
backdrop:'static'
});
$("#myModal2").modal({
show:false,
backdrop:'static'
});
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
	$('#reg_submit').click(function(){
		var check=$('#d_476:checked').val();
		
		if(check == 1){ 
			$('.term-of-use').removeClass('error');
		}else{
			
			$('.term-of-use').addClass('error');
		}
		$('#register-form').submit();
	})
                $("#register-form").validate({
			rules: {
				salutation: "required",
				gender: "required",
				delete_val: "required",
				country_code: "required",
                                first_name:{
                                    required : true,
                                    maxlength : 50,
                                },
                                last_name:{
                                    required : true,
                                    maxlength : 50,
                                },
                                username:{
                                         required: true, 
                                         
										 maxlength: 50
                                },
                                bday_year:"required",
                                company_name: {
                                    //required : true,
                                    maxlength : 15,   
                                },
                                
                                mobile: {
                                      required: true,
                                      number: true,
                                      maxlength: 12,
                                 },
                                email:{
                                         required: true, 
                                         
										 maxlength: 50
                                },
								<?php if(empty($this->session->userdata('email'))){ ?>
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
								<?php }?>
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
