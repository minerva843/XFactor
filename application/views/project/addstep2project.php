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
.floor-planadd textarea {
    width: 100%;
    background: transparent;
    border: 1px solid #afabab;
    min-height: 40px;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 12px;
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
p.file-extan {
    margin-bottom: 0px;
    padding-top: 17px;
}
.floor-planadd textarea {
    resize: none;
}
</style>
 
<div class="main-section add_project_steps" id="add-floor"> 
    <div class="container">
	
<form method="POST" action="<?=base_url();?>project/addstep2project/<?=$data1->id;?>" class="register-form_1" id="register-form111" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS & REGISTRATION FORMS (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn4"></div>
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
					<div class="header-title add-floor-header-title">
					 <h3> PROJECT INFO (FOR HOME PAGE)</h3>  
					</div>
					</div>	
                    <div class="zone-info floor-planadd add-project-step2">				
                            <?php echo $success_msg; ?>
						<?php echo $error_msg; ?>
						<input type="hidden" id="myid" value="<?=$data1->id?>">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT ON HOME PAGE</label>
							<div class="col-sm-5">
								<select name="project_show_homepage" id="project_show_homepage" class="project_show_homepage">
									<option value="">SELECT A PROJECT ON HOME PAGE</option>
									<option value="yes" <?php if($data1->project_show_homepage == 'yes'){ echo "selected"; }?>>YES</option>
									<option value="no" <?php if($data1->project_show_homepage == 'no'){ echo "selected"; }?>>NO</option>
									
																		
								</select>

							</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT AUDIENCE TYPE</label>
							<div class="col-sm-5">
								<select name="project_audience_type" id="project_audience_type" class="project_audience_type">
									<option value="">SELECT A PROJECT AUDIENCE TYPE</option>
									
									<option value="CORPORATE" <?php if($data1->project_audience_type=='CORPORATE'){ echo "selected"; }?>>CORPORATE</option>
									<option value="CONSUMER" <?php if($data1->project_audience_type=='CONSUMER'){ echo "selected"; }?>>CONSUMER</option>
									<option value="COMMUNITY" <?php if($data1->project_audience_type=='COMMUNITY'){ echo "selected"; }?>>COMMUNITY</option>
									
																		
								</select>

							</div>	
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT HEADER VISUAL</label>
							<div class="col-sm-7 col-xl-5 project-visual">
								
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile"><?php if($data1->project_header_visual){
									echo $data1->project_header_visual;}else{ echo "select a PROJECT HEADER VISUAL";}?></div> 
									<input type="file" name="project_header_visual" id="file" onchange="ValidateSingleInput(this);"  class="file" >
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								</div> 
								<p class="file-extan">FILE FORMAT TO BE IN JPEG / PNG. EACH FILE NOT EXCEEDING 5 MB.</p>
							</div>  
						</div>
						
						<div class="form-group row add-proj_02 poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT DESCRIPTION</label>
							<div class="col-sm-5 project-visual">
								
								
								
								 <textarea rows="3" cols="50" maxlength="500" id="project_description" class="project_description" name="project_description" placeholder="ENTER A PROJECT DESCRIPTION (MAXIMUM 500 CHARACTERS)"><?php if($data1->project_description){ echo $data1->project_description; }?></textarea>
								
								<!--<textarea class="ckeditor" name="editor" id="ckeditor"></textarea>-->
 <script>
CKEDITOR.replace( 'project_description', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
                               

								</script>
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
								<p class="current-status-1" style="color:#00b050!important;">CURRENTLY SELECTED :<p> PROJECT (ADD)
                                </div>
								<div class="display-step-status">
								<h5>STEP 2 OF 3</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
						   <div class="image-sizze_error">
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600; "></h6>
							<p class="image_err_fileformat2" style="text-align:left!important;color:red!important; line-height:20px;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style=" line-height:20px; float:left!important;text-align:left!important;color:red!important;"></p>
                                </div>
								
								<div class="tab-content">
                                </div>
								</div>  
                            </div>
							
                            <div class="form-submit"> 
							<a href="#" class="action-btn backbtn" name="back" id="btnstep222">BACK</a>
								<!--input type="submit" value="Back" class="action-btn backbtn" name="back" id="btn5"-->
		<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5dfdf">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div> 

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

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
	$('.image_err_fileformat1').hide();
	$('.image_err_fileformat2').hide();
    return true;
}   
    
    
 $('#file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	} 
});

$(document).ready(function(){
    
    
    
 $.validator.setDefaults({
	    submitHandler: function(){
		
	var project_show_homepage=$('#project_show_homepage').val();
	var project_audience_type=$('#project_audience_type').val();
	var project_description=CKEDITOR.instances.project_description.getData();

 var formdata = new FormData();
var url="<?=base_url();?>project/add_post_step2/<?=$data1->id;?>"; 
var file_data = $('#file').prop('files')[0];
 formdata.append('project_header_visual', file_data);
 formdata.append('project_show_homepage', project_show_homepage);
 formdata.append('project_audience_type', project_audience_type);
 formdata.append('project_description', project_description);

 
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
                  //alert(data);
			if (data) {
                            $.fancybox.open({
						maxWidth  : 800,
						fitToView : true,
						width     : '100%',
						height    : 'auto',
						autoSize  : true,
						type        : "ajax",
						src         : "<?=base_url();?>project/addstep3/"+data,
						ajax: { 
						   settings: { data : 'group_id=<?php echo $data1->group_id; ?>', type : 'POST' }
						},
						touch: false,
						 clickSlide: false,
						clickOutside: false
						
						});
                          
			}
		}
	});
		}
});

	$("#register-form111").validate({
		rules: {
			<?php if(empty($data1->project_header_visual)){?>
			project_header_visual: "required",
			<?php }?>
			project_show_homepage:"required",
			project_audience_type:"required",
			project_description:{
				required:true,
				maxlength:1000,
			},
		}, 
		errorPlacement: function(){
                               return false;
                         } 
		// messages: {
			// project_header_visual: "ENSURE A IMAGE IS SELECTED.",
			// project_show_homepage: "ENSURE PROJECT ON HOME PAGE CHOICE IS SELECTED.",
			// project_audience_type: "ENSURE PROJECT AUDIENC TYPE IS SELECTED.",
			// project_description:"ENSURE THAT PROJECT DESCRIPTION IS FILLED IN." 
		// }
	});
});
	$('body').on('click', '#close-btn4', function () {
           
           window.location.href = "<?php echo base_url(); ?>project/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $group_id; ?>/<?php echo $data1->id; ?>/ADD/2";

});

	
$("body").on('click','#btnstep222',function(){
          
           $.fancybox.getInstance('close');
           
			 $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?=base_url();?>project/add/<?=$data1->id;?>",
				ajax: { 
				   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
				},
				touch: false,
				 clickSlide: false,
				clickOutside: false
				
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
<script>
	$(document).ready(function(){

  $("select").change(function(){
    if ($(this).val()=="") $(this).css({color: "#6c757d"});
    else $(this).css({color: "#000000"});
  });
  
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
