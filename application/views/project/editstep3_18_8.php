<style>

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
.floor-planadd textarea {
    width: 100%;
    background: transparent;
    border: 1px solid #afabab;
    min-height: 40px;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
	padding-bottom:0px;
}
.program-upload p.file-extan {
    font-size: 11px;
    color: #000;
}
.floor-planadd .star-program input.smalimput {
    width: 9%;
    margin-left: 15px;
    padding: 5px;
}
.floor-planadd textarea {
    resize: none;
}
</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
<form method="POST" action="<?=base_url();?>project/addstep3project/<?php echo $data1->id;?>" class="register-form" id="registerform4" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS & REGISTRATION FORMS (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn"  id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">

            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title"></div>
					</div>	
                    <div class="zone-info floor-planadd">
                        <h3> client & point of project info</h3> 
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company NAME</label>
							<div class="col-sm-5">
								<input type="text" name="client_company_name" class="client_company_name" value="<?php if($data1->client_company_name){ echo $data1->client_company_name; }?>" class="form-control" id="client_company_name" placeholder="Enter client company NAME">
							</div>
						</div>
	
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company address</label>
							<div class="col-sm-5">
								
								<textarea rows="3" value="<?php if($data1->client_company_address){ echo $data1->client_company_address; }?>" cols="50" id="client_company_address" class="client_company_address" name="client_company_address" placeholder="client company address"><?php if($data1->client_company_address){ echo $data1->client_company_address; }?></textarea> 
							</div>
						</div>
					  <div class="form-group row">
								<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company postal code</label>
								<div class="col-sm-3" style="padding-left:0px;">
								<select name="client_country" id="client_country" class="client_country">
									<option value="">select a country</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['name'];?>" <?php if($data1->client_country == $row['name']){ echo "selected"; }?>><?php echo $row['name'];?></option>
									<?php }?> 
								</select>
							</div>
							<div class="col-sm-2" style="padding-left:0px;">
								<input type="text" name="client_company_postal_code" class="client_company_postal_code" value="<?php if($data1->client_company_postal_code){ echo $data1->client_company_postal_code; }?>" class="form-control" id="client_company_postal_code" placeholder="Enter Postal code">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact name</label>
							<div class="col-sm-5">
								
								<input type="text" value="<?php if($data1->point_contact_name){ echo $data1->point_contact_name; }?>" name="point_contact_name" id="point_contact_name" class="point_contact_name" placeholder="ENTER point of contact name">
							</div>
						</div>	
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">country code</label>
							<div class="col-sm-5">
								<select name="client_country_code" id="client_country_code" class="client_country_code">
									<option value="">select country code</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['phonecode'];?>" <?php if($data1->client_country_code == $row['phonecode']){ echo "selected"; }?>><?php echo $row['name'];?> <?php echo $row['phonecode'];?></option>
									<?php }?>
								</select>
							</div> 
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact mobile</label>
							<div class="col-sm-5">
								<input type="text" value="<?php if($data1->point_contact_mobile){ echo $data1->point_contact_mobile; }?>" name="point_contact_mobile" id="point_contact_mobile" class="point_contact_mobile" placeholder="ENTER point of contact mobile">
							</div>
						</div>	
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact email</label>
							<div class="col-sm-5">
								<input type="email" name="point_contact_email" class="point_contact_email" value="<?php if($data1->point_contact_email){ echo $data1->point_contact_email; }?>" class="form-control" id="point_contact_email" placeholder="Enter point of contact email address">
							</div>
						</div>
	                   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">additional notes</label>
							<div class="col-sm-5">
								
								<textarea rows="3" value="<?php if($data1->additional_notes){ echo $data1->additional_notes; }?>" cols="50" id="additional_notes" class="additional_notes" name="additional_notes" placeholder="ENTER additional notes(if any)"><?php if($data1->additional_notes){ echo $data1->additional_notes; }?></textarea> 
								<p>(OPTIONAL)</p>
							</div>
						</div>

                    </div>  
                      
                </div>


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?php if(!empty($data1)){ echo $data1->project_name; }?>
                                <h5>STEP 3 OF 3</h5>
                                 <p>FILL THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
						   </div>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
                            </div>
							
                            <div class="form-submit"> 
			<a href="#" class="action-btn backbtn" name="back" id="btn5">BACK</a>
			<!--input type="submit" value="Back" class="action-btn backbtn" name="back" id="btn5"-->
			<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  

</form>
    </div>

</div>

<script>


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
            }
        }
    }
    return true;
}
 $(document).ready(function(){
$('#file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NO ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	} 
}); 
}); 

</script>

<script>


$(document).ready(function(){

 $.validator.setDefaults({
	    submitHandler: function(){
		
	var project_show_homepage=$('#project_show_homepage').val();
	var project_audience_type=$('#project_audience_type').val();
	var project_description=$('#project_description').val();
	
	

 var formdata = new FormData();
var url="<?=base_url();?>project/addstep3project/<?php echo $data1->id;?>"; 
var file_data = $('#file').prop('files')[0];
 formdata.append('project_header_visual', file_data);
 formdata.append('project_show_homepage', project_show_homepage);
 formdata.append('project_audience_type', project_audience_type);
 formdata.append('project_description', project_description);



//console.log(formdata);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
			
			var data=$.trim(data);
			//console.log(data);
		$.fancybox.getInstance('close');
                  
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url();?>project/editprojectsuccess/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						}
					} 
				}); 

			}
		}
	});

        
		}
	});

	$("#register-form").validate({
		rules: {
			//project_header_visual: "required",
			project_show_homepage:"required",
			project_audience_type:"required",
			project_description:"required"
		}, 
		messages: {
			//project_header_visual: "ENSURE A IMAGE IS SELECTED.",
			project_show_homepage: "ENSURE PROJECT ON HOME PAGE CHOICE IS SELECTED.",
			project_audience_type: "ENSURE PROJECT AUDIENC TYPE IS SELECTED.",
			project_description:"ENSURE THAT PROJECT DESCRIPTION IS FILLED IN." 
		}
	});
	
});
</script>


<script>
$(document).ready(function(){
	
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/editstep2/<?=$data1->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false,
                     //touch: false,
                     clickSlide: false,
                     clickOutside: false
                }
            });
            
        });
	
	$('body').on('click', '.close-btn', function () {
           $.fancybox.close();

});

})

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
