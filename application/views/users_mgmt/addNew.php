<style>
.fancybox-close-small{
	display:none!important;
}
.star-program input.smalimput {
    width: 8%;
    margin-left: 16px;
}
.star-program{padding-left: 0px;}
.star-program label.col-form-label {
    padding-left: 0px;
    text-align: center;
}
.star-program label.col-form-label {
    font-size: 12px;
    font-weight: normal;
    width: 6%;
}
.star-program label.col-form-label:after {
    display: none;
}

</style>


 
 
<div class="main-section floor_steps" id="add-floor">  
    <div class="container">
 <form method="POST"  class="register-form_1" id="register-form2" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>USERS (<?php echo $action; ?>)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnstep1guest"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">

            <div class="row">
				   <div class="col-md-9">   
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3> USERS PERSONAL INFO  <?php //echo $project_select; ?> <?php //echo $group_id; ?></h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2 guest_add">				
  
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">USER TYPE</label>
							<div class="col-sm-5">
							
								<select name="guest_type" id="guest_type">
								
								
								<option value="">SELECT A USERS TYPE</option>
								
								<option value="GUEST" <?php if($data1->user_type=='GUEST'){echo 'selected';} ?>  >GUEST</option>
								<option value="GROUPA"  <?php if($data1->user_type=='GROUPA'){echo 'selected';} ?>  >GROUP A</option>
								<option value="SUPERA" <?php if($data1->user_type=='SUPERA'){echo 'selected';} ?>   >SUPER A</option>
								
								
								
								</select>
								
								
								
								
								
								<span class="register-hint">USERS TYPE CANNOT BE CHANGED AFTER A USERS IS ADDED. </span>

							</div>	
						</div>
  
  
  <div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">USER STATUS</label>
							<div class="col-sm-5">
								<select name="active" id="active" class="country">
									
									<option value="1" <?php if(!empty($data1->active == '1')){ echo "selected"; }?>>ACTIVE</option>
									<option value="2" <?php if(!empty($data1->active == '2')){ echo "selected"; }?>>SUSPENDED</option>
									
									<option value="0" <?php if(!empty($data1->active == '0')){ echo "selected"; }?>>DEACTIVATED</option>
								</select>
							</div>	
						</div>
						<?php if(!empty($data1->id)) {?>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">USER UNLOCK</label>
							<div class="col-sm-5">
								<select name="unlock" id="unlock" class="unlock">
									
									<option value="">SELECT USER UNLOCK STATUS</option>
									<option value="1">UNLOCK LOG IN PAGE FOR USER</option>
									
								</select>
							</div>	
						</div>
						<?php }?>
  
  
  
  
							
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SALUTATION & GENDER</label>
							<div class="col-sm-5">
							<div class="row">
							<div class="col-sm-6">
								 <select name="salutation"  id="salutation">
                                        <option value="" >SELECT YOUR SALUTATION <?php //echo $data1->salutation; ?></option>
                                        <option value="MR" <?php if($data1->salutation=='MR'){echo 'selected';} ?> >MR</option>     
										<option value="MS" <?php if($data1->salutation=='MS'){echo 'selected';} ?> >MS</option> 
										<option value="MRS" <?php if($data1->salutation=='MRS'){echo 'selected';} ?> > MRS</option>
                                        <option value="MDM" >MDM</option>
										<option value="DR" <?php if($data1->salutation=='DR'){echo 'selected';} ?> >DR</option>
										<option value="PROF" <?php if($data1->salutation=='PROF'){echo 'selected';} ?> >PROF</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>

							</div>

                                       <div class="col-sm-6">
								<select name="gender" id="gender">
                                        <option value="">SELECT YOUR GENDER <?php //echo $data1->gender; ?> </option>
                                        <option value="Male" <?php if($data1->gender=='Male' || $data1->gender=='MALE' || $data1->gender=='male'){echo 'selected';} ?> >MALE </option>
                                        <option value="Female" <?php if($data1->gender=='Female' || $data1->gender=='FEMALE' || $data1->gender=='female'){echo 'selected';} ?> >FEMALE</option>
                                        <option value="COMPANY" <?php if($data1->gender=='COMPANY' || $data1->gender=='Company' || $data1->gender=='company'){echo 'selected';} ?> >COMPANY</option>
                                    </select>
                                  
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
									<span class="register-hint">GENDER CANNOT BE CHANGED AFTER A USERS IS ADDED</span>

							</div>
							
							
						</div>
						</div>
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME</label>
							<div class="col-sm-5">
								<input type="text" value="<?php echo $data1->first_name; ?>" maxlength="50" name="first_name" placeholder="ENTER FIRST NAME" id="first_name" />

							</div>	
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME</label>
							<div class="col-sm-5">
								<input type="text" value="<?php echo $data1->last_name; ?>" maxlength="50" name="last_name" placeholder="ENTER LAST NAME" id="last_name" />
							</div>	
						</div>
						
						
						
						
						     
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAIL</label>
							<div class="col-sm-5"> 
							<?php
							if($action == 'EDIT'){?>
								<p class="guest_edits"><?php echo $data1->email; ?></p>
							<?php }else{?>
								<input type="email" maxlength="50"  value="<?php echo $data1->email; ?>"  name="email" class="small-case running_latter" placeholder="ENTER EMAIL ADDRESS" id="email"  <?php if(!empty($data1->email)){ echo 'readonly';}  ?>    >
							<?php }?>
													<span class="register-hint">EMAIL ADDRESS WILL BE YOUR USER ID .THIS CAN NOT BE CHANGE LATER ON. </span>

							</div>	
						</div>
						
						
								
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COUNTRY CODE</label>
							<div class="col-sm-5">
								 <select name="country_code" id="country_code">
									<option value="">SELECT YOUR COUNTRY CODE</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['phonecode'];?>"  <?php if($data1->country_code==$row['phonecode']){echo 'selected';} ?>   ><?php echo $row['name'];?> +<?php echo $row['phonecode'];?></option>
									<?php }?> 
								</select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
						</div>
						</div>




	<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">MOBILE</label>
							<div class="col-sm-5">
								<input type="text" maxlength="12" value="<?php echo $data1->phone; ?>"  name="mobile" placeholder="ENTER MOBILE NUMBER " maxlength="12" id="mobile"  <?php if(!empty($data1->phone)){ echo '';}  ?>  >

							</div>	
						</div>						
						
						
						
						     
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PREFERRED NAME TO DISPLAY </label>
							<div class="col-sm-5">
							
								<input type="text" value="<?php echo $data1->username; ?>" maxlength="50" name="username" placeholder="ENTER PREFERED NAME TO DISPLAY" id="username" >
							
							<span class="register-hint">THIS IS THE NAME THAT OTHERS USERS WILL SEE. THIS IS ALSO THE NAME TO BE PRINTED</span>
							</div>	       
						</div>
						
					
						
						   
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">DISPLAY PHOTO</label>
							<div class="col-sm-7 col-xl-5 project-visual">   
								
							<div class="file-upload guest-uplaod">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">select a DISPLAY PHOTO</div> 
									<input type="file" name="image" id="file" onchange="ValidateSingleInput(this);" class="file">
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								</div> 
								<p class="file-extan">FILE FORMAT TO BE IN JPEG / PNG. EACH FILE NOT EXCEEDING 5 MB.</p>
							</div>  
						</div>
						
						<div class="form-group row add-proj_02 guest_add poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">QUICK INTRO</label>
							<div class="col-sm-5 project-visual quick_intro_guest" style="width:65%!important;">   
							
								<textarea rows="3" cols="50" maxlength="500" id="quick_intro" class="quick_intro" name="quick_intro" placeholder="ENTER QUICK INTRO"><?php if($data1->quick_intro){ echo $data1->quick_intro; }?></textarea>
							
							<script>

                                
CKEDITOR.replace( 'quick_intro', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
							
								
								<!--<textarea rows="3" cols="50" value="" maxlength="150" id="quick_intro" class="quick_intro" name="quick_intro" placeholder="ENTER QUICK INTRO"><?php echo $data1->quick_intro; ?></textarea> --> 
								 
							</div>
						</div>
                    </div>      
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li><a data-toggle="tab" class="active" href="#menu1">MAIN MENU</a></li>
								<li class=""><a class="cnone" data-toggle="tab" href="#">USERS LISTS</a></li>
								 <li class=""><a data-toggle="tab" class="cnone" href="#">ASSIGN USERS</a></li>
				                           
				                      
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?php if(!empty($data1->first_name)){echo $data1->first_name;}else{echo 'USERS (ADD)';}   ?>
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF <?php if($no_reg==1){echo '3';}else{echo '3';} ?></h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="openusermanagelist09">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5ADDguest">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>



                                 <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> USERS (ADD) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>EMAI EXISTS IN RECORDS.</p>
                                                 
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
					</div> 
 

<script>
$("body").on('click', '#openusermanagelist09', function() {
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/allUsersManage',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


         });

var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPEG / PNG FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
                oInput.value = "";
                return false;
            }else{
				
								//alert();
				$('.image_err_fileformat1').empty();
                $('.image_err_fileformat2').empty();
			}
        }
    } 
    return true;
}
 
$('.file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	} 
});

$(document).ready(function(){





      $("body").on('click', '#openusermanagelist88', function() {
        $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/addNewUserMainUpload',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


                                        });





                                        $("body").on('click', '#usermanageassignmain4', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/showAllgroups",
                                                ajax: {
                                                    settings: {
                                                        data: '',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                        });



      $("body").on('click','#guestlistupload1',function(){

          
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>file_upload/upload_guest_file',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        }); 
        }); 

			
	$("body").on('click','.backbtn000',function(){
          
           $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,

        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/index',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
            
        });
	
$('body').on('click', '#close-btnstep1guest', function () {
            $.fancybox.close();
            location.reload();

});

$('.close').click(function () {
                  var modal = document.getElementById("myModal1");
                  modal.style.display = "none";
                              
});

 $.validator.setDefaults({
	    submitHandler: function(){

var quick_intro=CKEDITOR.instances.quick_intro.getData();
 var formdata = new FormData();
var url="<?php echo base_url();?>UserManage/addstep1Post/<?php if(!empty($data1)){ echo $data1->id; }?>"; 
var action_txt='<?=$action;?>';


 formdata.append('guest_type', $('#guest_type').val());
 formdata.append('country_code', $('#country_code').val());
 formdata.append('salutation', $('#salutation').val());
 formdata.append('gender', $('#gender').val());
 formdata.append('first_name', $('#first_name').val());
 formdata.append('last_name', $('#last_name').val());
 formdata.append('username', $('#username').val());
 formdata.append('active', $('#active').val());
  
  
 <?php if($action == 'ADD'){?>

 formdata.append('email', $('#email').val());
 <?php }else{?>
  
 formdata.append('email', '<?=$data1->email?>');
 formdata.append('unlock', $('#unlock').val());
 <?php }?>
 formdata.append('mobile', $('#mobile').val());
 formdata.append('image', $('#file').prop('files')[0]);
 formdata.append('quick_intro', quick_intro);
 formdata.append('action_txt', action_txt);
 

 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
		
		console.log(data);
			//var GuestData = JSON.parse(data); 
			var data=$.trim(data);
			var data2=JSON.parse(data);
		 //	console.log(data2.response);
	       	console.log(data2.gid);
			if (!data2.response.error) {
                            
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>UserManage/addstep2/'+data2.gid,
        ajax: { 
           settings: { data : 'id='+data2.gid+'&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        });    
                             
			}else{
			
			//alert("Error occured. Email or Phone already exist");
			                     var modal = document.getElementById("myModal1");
                                            var span = document.getElementsByClassName("close")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
			
			}
		}
	});

        
		}
	});

 
	$("#register-form2").validate({
		rules: {
				gender: "required",
				quick_intro: "required",
				guest_type: "required",
				<?php if($action == 'ADD'){?>
				email: "required",
				<?php }?>
				 mobile: {
                                      required: true,
                                      number: true,
                                      maxlength: 12,
                                 },
				country_code: "required",
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
				

		},
		errorPlacement: function(){
                               return false;
                         } 
		
	});
});
$('#file').bind('change', function () {
  var filename = $("#file").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active'); 
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});


</script>

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>
