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
    padding: 5px 5px;
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
    padding: 5px 0px 6px 10px;
	max-height: 26px;
	}
.create-user select#year {
    padding: 6px 0px 6px 4px;
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
		<div class="xconnect-right register-right">
		<button class="register-form-click" type="submit" id="reg_submit">CLICK HERE TO SUBMIT<br> REGISTRATION FORM </button>
		</div>   
		</div>
   
		</div>
		</div>
		</div> 
                -->		
		</div>   
		
		<div class="register-header"><?php if(!empty($alldata->register_header_image!=='NIL')){?>
		<img src="<?php echo base_url();?>assets/project/<?=$alldata->register_header_image;?>">
		<?php }else{?>
		<h2>SIMPLY FILL IN YOUR DETAILS TO REGISTER. </h2>
		<?php }?>
		</div>    	   
               
                <div class="signup-form create-user">
				<h2 class="regi-normal">REGISTRATION FORM FOR <b><?=$alldata->project_name;?></b> </h2>
   <?php   $this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('project_id',$alldata->id);
		$query = $this->db->get();
		$data = $query->result();
		if(count($data)>0){
			echo '<div class="regitr">YOU HAVE BEEN REGISTERED.</div>';
		}else{
?>                  
                    <form method="POST" action="<?=base_url();?>auth/create_user" class="register-form" id="form_ganerate">
					<div class="register-dscroll">
                    <!--form method="POST" action="<?=base_url();?>project/register_page/<?php echo $this->uri->segment(3);?>" class="register-form" id="form_ganerate"-->
					<input type="hidden" name="project_id" value="<?php echo $alldata->id;?>">
					<input type="hidden" name="url" value="<?php echo $alldata->register_url;?>">
					<input type="hidden" name="project_name" value="<?php echo $alldata->project_name;?>">
					<input type="hidden" name="register_header_image" value="<?=$alldata->register_header_image;?>">
						<?php $this->session->set_userdata('project_id',$alldata->id);?>
						<?php  echo $message; ?>
	<p style="color:red;" class="chek_reg"></p> 
						<span style="color:red"><?php if(isset($msg)){echo $msg;} ?><span style="color:red"><?php if(isset($project_register_msg)){echo $project_register_msg;} ?></span>
						
						
						<div class="row">
                           <div class="col-md-12"> <h4 class="personal-info register-spacer">LOG IN INFO </h4></div>
						  </div>
						  <?php if(empty($this->session->userdata('email'))){?>
						   <div class="row" style="margin-bottom: 2.5rem!important;">
						    <div class="form-group">
                           <div class="col-md-4"></div>
                            <div class="col-md-8"> 
								<div>
								
								<p style="font-weight:normal; font-size:14px;">I HAVE AM EXISTING XPLATFORM ACCOUNT. <a class="temp-signin" href="<?=base_url();?>auth/login">SIGN IN</a></p>
								
								</div>    
							</div> 
						</div>  
						</div>   
						<?php }?>
						<?php if($DataField->email==1){?>
						
						<div class="row" style="margin-bottom: 25px;">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">EMAIL </label></div>
                            <div class="col-md-8">
							<?php if(empty($this->session->userdata('email'))){?>
							<input type="email" maxlength="50"  value="<?php if(!empty($reset_data['email'])){ echo $reset_data['email'];} ?>"  name="email" class="small-case" placeholder="ENTER EMAIL ADDRESS" id="email" style="margin-bottom: 10px!important;" />
							<span class="register-hint" style="margin-bottom: 7px;">EMAIL ADDRESS WILL BE YOUR USER ID. THIS CANNOT BE CHANGED LATER ON.</span>
							<?php }else{ echo '<p class="emil-already">'.$this->session->userdata('email').' </p>'; 
								echo '<input type="hidden" name="email" class="email" id="email" value="'.$this->session->userdata('email').'">';
							}?>
							
							
							
							
							</div> 
                        </div>
						</div>
						<?php }?>
						<?php if(empty($this->session->userdata('email'))){ ?>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="password">PASSWORD </label></div>
                            <div class="col-md-8"><input type="password" class="small-case" maxlength="20" name="password" placeholder="ENTER PASSWORD" id="password" /></div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="re_password">RE ENTER PASSWORD </label></div>
                            <div class="col-md-8"><input type="password" class="small-case" maxlength="20" name="password_confirm"  placeholder="RE ENTER PASSWORD" id="password_confirm" /></div>
                        </div>
						</div>
						<?php }?>
						<h4 class="register-spacer">PERSONAL INFO </h4>
	   
						
                         <div class="row">
						 <?php if($DataField->salutation==1){?> 
                            <div class="form-group">
							<div class="col-md-4"><label for="gender">SALUTATION & GENDER </label></div>
							<div class="col-md-4 p-r-5">
                                <div class="form-select">
                                    <select name="salutation"  id="salutation">
                                        <option value="">SELECT YOUR SALUTATION</option>
                                        <option value="MR" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MR" ){ echo "selected";} ?>>MR</option>     
										<option value="MS" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MS" ){ echo "selected";} ?>>MS</option> 
										<option value="MRS" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MRS" ){ echo "selected";} ?>> MRS</option>
                                        <option value="MDM" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="MDM" ){ echo "selected";} ?>>MDM</option>
										<option value="DR" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="DR" ){ echo "selected";} ?>>DR</option>
										<option value="PROF" <?php if(!empty($reset_data['salutation']) && $reset_data['salutation']=="PROF" ){ echo "selected";} ?>>PROF</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
								</div>      
                            </div>
							<?php }if($DataField->gender==1){?>
                            <div class="form-group">
				 <div class="col-md-4 p-l-5">
                                <div class="form-select">
					 <select name="gender" id="gender">
                                        <option value="">SELECT YOUR GENDER</option>
                                        <option value="MALE" <?php if(!empty($reset_data['gender']) && $reset_data['gender']=="MALE" ){ echo "selected";} ?> >MALE </option>
                                        <option value="FEMALE" <?php if(!empty($reset_data['gender']) && $reset_data['gender']=="FEMALE" ){ echo "selected";} ?> >FEMALE</option>
                                    </select>
                                   
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
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['first_name'])){ echo $reset_data['first_name'];} ?>" maxlength="50" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" /></div>
                        </div>
						</div>
						<?php }if($DataField->last_name==1){?>
						
						<div class="row">
						<div class="form-group">
                            <div class="col-md-4"><label for="last_name">LAST NAME </label></div>
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['last_name'])){ echo $reset_data['last_name'];} ?>" maxlength="50" name="last_name" placeholder="ENTER LAST NAME" id="last_name" /></div>
                        </div>
						</div>
						<?php }if($DataField->username==1){?>   
						<div class="row" style="margin-bottom: 10px;">
                        <div class="form-group">   
                            <div class="col-md-4"><label for="username">PREFERRED NAME </label></div>  
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['username'])){ echo $reset_data['username'];} ?>" maxlength="50" name="username" placeholder="ENTER PREFERRED NAME" id="username" / style="margin-bottom: 10px!important;">
							<span class="register-hint">PREFERRED NAME IS YOUR PREFERRED NAME TO BE DISPLAYED / PRINTED.</span> 
							</div>
                        </div>   
						</div>
						<?php }?>
						<div class="row date-margin">
                              <div class="form-group">
				<div class="col-md-4"><label for="gender">BIRTHDAY </label></div>
				<div class="col-md-8">
                                <div class="form-select dob-year">
                                    <input type="text" name="bday_year" value="<?php if(!empty($reset_data['bday_year'])){ echo $reset_data['bday_year'];} ?>" style="width:100% !important"  placeholder="ENTER BIRTHDAY" id="dob">
                                      <i id="dob_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
				</div>
                            </div>

						</div>
						
						<?php if($DataField->pincode==1){?>
						
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">AREA CODE </label></div>
                            <div class="col-md-8"><input type="pincode" maxlength="8" name="pincode" value="<?php if(!empty($reset_data['pincode'])){ echo $reset_data['pincode'];} ?>" placeholder="ENTER AREA CODE" id="pincode" /></div>
                        </div>  
						</div>
						<?php }if($DataField->tel==1){?>
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">TEL</label></div>
                            <div class="col-md-8"><input type="text" maxlength="12"  name="tel" value="<?php if(!empty($reset_data['tel'])){ echo $reset_data['tel'];} ?>" placeholder="ENTER TEL" id="tel" /></div>
                        </div>
						</div>
						<?php }if($DataField->did==1){?>
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">DID</label></div>
                            <div class="col-md-8"><input type="text" maxlength="12" name="did" value="<?php if(!empty($reset_data['did'])){ echo $reset_data['did'];} ?>" placeholder="ENTER DID " id="did" /></div>
                        </div>
						</div>
						<?php }if($DataField->extension==1){?>
						<div class="row">
                        <div class="form-group">
                           <div class="col-md-4"> <label for="email">EXTENSION</label></div>
                            <div class="col-md-8"><input type="text" maxlength="10" name="extension" value="<?php if(!empty($reset_data['extension'])){ echo $reset_data['extension'];} ?>" placeholder="ENTER EXTENSION " id="extension" /></div>
                        </div>
						</div>
							<?php }if($DataField->designation==1){?>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label >DESIGNATION </label></div>
                            <div class="col-md-8"><input type="text" maxlength="50" name="designation" value="<?php if(!empty($reset_data['designation'])){ echo $reset_data['designation'];} ?>" placeholder="ENTER DESIGNATION" id="designation"></div>
                        </div>
						</div>
							
							<?php }if(!empty($DataField->remark_1)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_1);?> </label></div>
                            <div class="col-md-8"><input type="text" class="small-case" maxlength="50" value="<?php if(!empty($reset_data['remark_1'])){ echo $reset_data['remark_1'];} ?>" name="remark_1"  placeholder="ENTER <?php echo strtoupper($DataField->remark_1);?> " id="remark_1"></div>
                        </div>  
						</div>
						<?php }if(!empty($DataField->remark_2)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_2);?> </label></div>
                            <div class="col-md-8"><input type="text" class="small-case" maxlength="50" value="<?php if(!empty($reset_data['remark_2'])){ echo $reset_data['remark_2'];} ?>" name="remark_2"  placeholder="ENTER <?php echo strtoupper($DataField->remark_2);?> " id="remark_2"></div>
                        </div> 
						</div>
						<?php }if(!empty($DataField->remark_3)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_3);?> </label></div>
                            <div class="col-md-8"><input type="text" class="small-case" maxlength="50" value="<?php if(!empty($reset_data['remark_3'])){ echo $reset_data['remark_3'];} ?>" name="remark_3"  placeholder="ENTER <?php echo strtoupper($DataField->remark_3);?> " id="remark_3"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_4)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_4);?> </label></div>
                            <div class="col-md-8"><input type="text" value="<?php if(!empty($reset_data['remark_4'])){ echo $reset_data['remark_4'];} ?>" class="small-case" maxlength="50" name="remark_4"  placeholder="ENTER <?php echo strtoupper($DataField->remark_4);?> " id="remark_4"></div>
                        </div>
						</div>
						<?php }if(!empty($DataField->remark_5)){?>
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label ><?php echo strtoupper($DataField->remark_5);?> </label></div>
                            <div class="col-md-8"><input type="text" class="small-case" maxlength="50" name="remark_5" value="<?php if(!empty($reset_data['remark_5'])){ echo $reset_data['remark_5'];} ?>"  placeholder="ENTER <?php echo strtoupper($DataField->remark_5);?> " id="remark_5"></div>
                        </div>
						</div>
						<?php }?>
						<!--h4>COMPANY & WORK INFO </h4>
						
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="company_name">COMPANY NAME </label></div>
                            <div class="col-md-8"><input type="text" name="company_name" placeholder="ENTER COMPANY NAME" id="company_name"></div>
                        </div>
						</div>
						
						<div class="row">
                        <div class="form-group">
                            <div class="col-md-4"><label for="">COMPANY ADDRESS </label></div>
                            <div class="col-md-8"><input type="text" name="company_address" placeholder="ENTER COMPANY ADDRESS" id="company_address"></div>
                        </div>
						</div-->
						
						
						<h4 class="register-spacer">CONTACT INFO </h4>
						
						<div class="row">
					   <div class="form-group">
                           <div class="col-md-4"> <label for="country_code">COUNTRY CODE </label></div>
						   <div class="col-md-8">
						   <div class="form-select">
							<select name="country_code" id="country_code">
								<option value="">SELECT YOUR COUNTRY CODE</option>
								<?php foreach($CountryCode as $row){?>
								<option value="<?=$row['id'];?>"  <?php if(!empty($reset_data['country_code']) && $reset_data['country_code']==$row['id'] ){ echo "selected";} ?>  ><?php echo $row['name'];?> +<?php echo $row['phonecode'];?></option>
								<?php }?> 
							</select>
							</div>
							</div>
                        </div>
                        </div>
						<?php if($DataField->mobile==1){?>
						<div class="row">
                         <div class="form-group">
                           <div class="col-md-4"> <label for="mobile">MOBILE NUMBER </label></div>
                           <div class="col-md-8"> <input type="text" maxlength="12" value="<?php if(!empty($reset_data['mobile'])){ echo $reset_data['mobile'];} ?>"  name="mobile" placeholder="ENTER MOBILE NUMBER " maxlength="12" id="mobile"></div>
                        </div>
						</div>
						<?php }?>
						
						     
						<div class="row">
						<div class="form-group">
                            <div class="col-md-12"><label class="term-of-useheding">ACCOUNT CREATION & TERMS OF USE </label> </div>
                            <div class="col-md-12">  
															
								<div class="term-of-use">
								
								<input type="checkbox" id="d_476" name="delete_val" value="1" >
								<label for="d_476"> <span> I hereby give content for a <b> XPLATFORM</b> user account to be created, and agree to abide by the 
								<a data-toggle="modal" data-target="#myModal1"> TERMS OF USE</a> & <a data-toggle="modal" data-target="#myModal2"> PRIVACY POLICY. </a> </span> </label>    
							    </div>    
							
							</div>
                        </div>
						</div>
						
						</div>
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                           <!-- <input type="submit" value="REGISTER" class="submit" name="submit" id="submit-register" />-->
							
                        </div>
						
                    </form>
		<?php }?>
				
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
		$('#form_ganerate').submit();
	})
                $("#form_ganerate").validate({ 
			rules: {
				salutation: "required",
				gender: "required",
				country_code: "required",
				delete_val: "required",
                                first_name:{
                                         required: true, 
                                         
										 maxlength: 50
                                },
                                last_name:{
                                         required: true, 
                                         
										 maxlength: 50 
                                },
                                username:{
                                         required: true, 
                                         
										 maxlength: 50
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