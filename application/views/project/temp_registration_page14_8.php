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
    padding: 5px 30px 5px 30px;
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

    <div class="main signup" id="register-form22">
	<div class="section-main">
        <div class="container">
		<div class="row">
            <div class="signup-content">
                <div class="signup-img">
                    <!-- <img src="images/signup-img.jpg" alt=""> -->
					<h1>XCONNECT</h1>
					<div class="ftr-text">
					<p>2019 – 2020. <b> XMANAGE</b>.</p>
					</div>
                </div>
                <div class="signup-form create-user">
				<h2>REGISTER AN ACCOUNT</h2>
  <?php  if ($this->session->flashdata('message') != ''): 
    echo $this->session->flashdata('message'); 
endif;
?>
                    <form method="POST" action="<?=base_url();?>project/register_page/<?php echo $this->uri->segment(3);?>" class="register-form" id="register-form">
					<input type="hidden" name="project_id" value="<?php echo $alldata->id;?>">
					<input type="hidden" name="url" value="<?php echo $alldata->register_url;?>">
						<h4 class="personal-info">PERSONAL INFO </h4>
						
						<span style="color:red"><?php if(isset($msg)){echo $msg;} ?><span style="color:red"><?php if(isset($project_register_msg)){echo $project_register_msg;} ?></span>
						
                         <div class="row">
						 <?php if($DataField->salutation==1){?>
                            <div class="form-group">
							<div class="col-md-4"><label for="gender">SALUTION & GENDER </label></div>
							<div class="col-md-4">
                                <div class="form-select">
                                    <select name="salutation"  id="salutation">
                                        <option>SELECT YOUR SALUTION</option>
                                        <option value="mr">Mr</option>
                                        <option value="ms">Ms</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
								</div>
                            </div>
							<?php }if($DataField->gender==1){?>
                            <div class="form-group">
				 <div class="col-md-4">
                                <div class="form-select">
					 <select name="gender" id="gender">
                                        <option>SELECT YOUR GENDER</option>
                                        <option value="male">Male </option>
                                        <option value="female">Female</option>
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
							<?php }?>
						</div>
						<?php if($DataField->first_name==1){?>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="first_name">FIRST NAME </label></div>
                            <div class="col-md-8"><input type="text" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" /></div>
                        </div>
						</div>
						<?php }if($DataField->last_name==1){?>
						
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="last_name">LAST NAME </label></div>
                            <div class="col-md-8"><input type="text" name="last_name" placeholder="ENTER LAST NAME" id="last_name" /></div>
                        </div>
						</div>
						<?php }if($DataField->username==1){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="username">USERNAME </label></div>
                            <div class="col-md-8"><input type="text" name="username" placeholder="ENTER USERNAME" id="username" /></div>
                        </div>
						</div>
						<?php }if($DataField->dob==1){?>
			
						<div class="row date-margin">
                            <div class="form-group">
							<div class="col-md-4"><label for="gender">DATE OF BIRTH </label></div>
							<div class="col-md-2">
                                <div class="form-select dob-year">
                                     <select name="bday_year" id="year">
									
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
								</div>
                            </div>
                            <div class="form-group">
							<div class="col-md-2">
                                <div class="form-select dob-month">
                                    <select name="month" id="month">
                                        <option value="">SELECT A MONTH</option>
											<option value='1'>Janaury</option>
											<option value='2'>February</option>
											<option value='3'>March</option>
											<option value='4'>April</option>
											<option value='5'>May</option>
											<option value='6'>June</option>
											<option value='7'>July</option>
											<option value='8'>August</option>
											<option value='9'>September</option>
											<option value='10'>October</option>
											<option value='11'>November</option>
											<option value='12'>December</option>
									</select> 
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
						                            <div class="form-group">
							<div class="col-md-2">
                                <div class="form-select dob-date">
                                    <select name="date" id="date">
									<option value="">SELECT A DATE</option>
                                        <option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
						</div>
						<?php }if($DataField->mobile==1){?>
						
						<div class="row">
                         <div class="form-group">
                           <div class="col-md-4"> <label for="mobile">MOBILE NUMBER </label></div>
                           <div class="col-md-5"> <input type="text" name="mobile" placeholder="ENTER MOBILE NUMBER" id="mobile"></div>
                        </div>
						</div>
						<?php }if($DataField->email==1){?>
						
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">ENTER EMAIL </label></div>
                            <div class="col-md-8"><input type="email" name="email" placeholder="ENTER EMAIL ADDRESS" id="email" /></div>
                        </div>
						</div>
						<?php }if($DataField->pincode==1){?>
						
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">AREA CODE </label></div>
                            <div class="col-md-8"><input type="pincode" name="pincode" placeholder="ENTER AREA CODE" id="pincode" /></div>
                        </div>
						</div>
						<?php }if($DataField->tel==1){?>
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">TEL</label></div>
                            <div class="col-md-8"><input type="text" name="tel" placeholder="ENTER TEL" id="tel" /></div>
                        </div>
						</div>
						<?php }if($DataField->extension==1){?>
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">EXTENSION</label></div>
                            <div class="col-md-8"><input type="text" name="extension" placeholder="ENTER EXTENSION" id="extension" /></div>
                        </div>
						</div>
						
						<?php }if($DataField->company_name==1){?>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="company_name">COMPANY NAME </label></div>
                            <div class="col-md-8"><input type="text" name="company_name" placeholder="ENTER COMPANY NAME" id="company_name"></div>
                        </div>
						</div>
						<?php }if($DataField->company_address==1){?>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="">COMPANY ADDRESS </label></div>
                            <div class="col-md-8"><input type="text" name="company_address" placeholder="ENTER COMPANY ADDRESS" id="company_address"></div>
                        </div>
						</div>
						<?php }if($DataField->designation==1){?>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label >DESIGNATION </label></div>
                            <div class="col-md-8"><input type="text" name="designation" placeholder="ENTER DESIGNATION" id="designation"></div>
                        </div>
						</div>
						
						<?php }if(!empty($DataField->remark_1)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_1);?> </label></div>
                            <div class="col-md-8"><input type="text" name="remark_1"  placeholder="ENTER <?php echo strtoupper($DataField->remark_1);?>" id="remark_1"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_2)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_2);?> </label></div>
                            <div class="col-md-8"><input type="text" name="remark_2"  placeholder="ENTER <?php echo strtoupper($DataField->remark_2);?>" id="remark_2"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_3)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_3);?> </label></div>
                            <div class="col-md-8"><input type="text" name="remark_3"  placeholder="ENTER <?php echo strtoupper($DataField->remark_3);?>" id="remark_3"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_4)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_4);?> </label></div>
                            <div class="col-md-8"><input type="text" name="remark_4"  placeholder="ENTER <?php echo strtoupper($DataField->remark_4);?>" id="remark_4"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_5)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_5);?> </label></div>
                            <div class="col-md-8"><input type="text" name="remark_5"  placeholder="ENTER <?php echo strtoupper($DataField->remark_5);?>" id="remark_5"></div>
                        </div>
						</div>
						<?php }?>
						
						
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="submit" value="REGISTER" class="submit" name="submit" id="submit-register" />
							
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
	document.getElementById("year").innerHTML = options;
        
// $(document).ready(function(){
    
                // $("#register-form").validate({
			// rules: {
				// salutation: "required",
				// gender: "required",
                                // first_name:"required",
                                // last_name:"required",
                                // username:"required",
                                // year:"required",
                                // month:"required",
                                // date:"required",
                                // company_name:"required",
                                // mobile:"required",
                                // email:"required",
                                // password: {
                                         // required: true,
                                         // minlength: 8
                                // },
                                // password_confirm: {
                                         // required: true,
                                         // minlength: 8,
                                         // equalTo: "#password"
                                // }
			// },
			        // errorPlacement: function(){
                               // return false;
                         // }
		// });   
    
    
// });      
        

</script>
<style>
    
    .error {
    border: 1px solid #f00 !important;
}

 
    
</style>