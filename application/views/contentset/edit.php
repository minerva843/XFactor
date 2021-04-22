<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>Content/editUploadVideos/<?php echo $videos[0]['content_set_name'] ?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>CONTENT SET (EDIT)  <?php // print_r(); ?> </h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form content-edit_1" >
            <div class="row">
                <div class="col-md-9">  
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title">
					<div class="leftbox-top" id="zones-add">
				<!-- 	<h5> ENTER ZONE DETAILS THAT ARE LISTED BELOW :</h5> -->
					</div> 
					</div>
					</div>	
 
                    <div class="zone-info add-conents">
                        <h3> CONtent Set INFO</h3>  				
                        
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">CONTENT SET NAME</label>
                                <div class="col-sm-5">
                                    
									 <div class="1_to_jd"  style="padding-top: 5px;font-size: 12px;  color:#000000!important;"  ><?php  echo $videos[0]['content_set_name']; ?></div>
									 
									 
									              <input type="hidden" name="content_set" id="content_set" value="<?php  echo $videos[0]['content_set_name']; ?>" class="content_set" placeholder="ENTER CONTENT SET NAME">
									
                                  <!--  <input type="text" readonly="" name="content_set" value="<?php  echo $videos[0]['content_set_name']; ?>" id="content_set" class="project_type" />
                                    
				<select name="content_set" id="content_set" class="project_type">				 
				<option value="ONLINE REG REQUIRED"><?php  //echo $videos[0]['content_set_name']; ?></option>   
                                </select>-->

                                </div>
                            </div>    

		            <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">select video file</label>
							<div class="col-sm-5 project-visual_11">
								
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile"><?php if($videos){ echo $videos[0]['file_name']; }else{ echo 'select a video';}?></div> 
									<input type="file" name="videfiles" id="videfiles" class="videfiles" onchange="ValidateSingleInput(this);" accept="video/mp4,video/x-m4v">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								
							    <p class="file-extan">file format to be in mp4.each file not exceeding 100 mb.</p>
							</div>  
							
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">select image after video ends</label>
							<div class="col-sm-5 project-visual_11">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile2"><?php if($images){ echo $images[0]['file_name']; }else{ echo 'select a image';}?></div> 
									<input type="file" name="fileimage" accept="image/*" id="fileimage" class="fileimage" onchange="ValidateSingleInput2(this);">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								<p class="file-extan">file format to be in jpg/png. each flie not exceending 5 mb </p>
							</div>  
							
						</div> 

					
                      
                        
                    </div>  
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                <li class=""><a  id="assign_contentedit" class="cnone" data-toggle="tab" href="#menu1">ASSIGN contect</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black; font-size: 14px;" >CONTENT SET (EDIT) </span></p>
                                <div class="display-step-status">
								<h5>STEP 1 OF 1</h5>
								<p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
                                <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                                      
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                    
                                    
                                       <div class="progress-bars">
<!--						                        <div class="progress">
    <div class="progress-bar"></div>
</div>
                        
 <div id="uploadStatus"></div> -->
						</div>                       
         <div class="progressbar mx-auto" data-value="0" id="progressbar">
          <!--span class="progress-left" id="pleft">
          <span class="progress-bar border-primary" style="transform: rotate(108deg);" id="pleftbar"></span>
          </span>
          <span class="progress-right" id="pright">
          <span class="progress-bar border-primary" style="transform: rotate(180deg);"></span>
          </span-->
		  <p><b>DO NOT EXIT THIS PAGE</b></p>
		  <h5>UPLOAD <span class="success">IN PROGRESS </span></h5>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="font-weight-bold" id="percentcount">0<sup class="small" ></sup></div>
          </div>
</div>                                      
                                    
                </div>
		</div>
                            </div>
                            <div class="form-submit"> 
                                <input type="button" value="Back" class="close-btn" name="back" id="btn5litsall">
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtncontent">
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
<!--style>
    .progressbar {
  width: 150px;
  height: 150px;
  background: none;
  position: relative;
}

.progressbar::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 0;
  left: 0;
}

.progressbar>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}

.progressbar .progress-left {
  left: 0;
}

.progressbar .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progressbar .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progressbar .progress-right {
  right: 0;
}

.progressbar .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progressbar .progress-value {
  position: absolute;
  top: 0;
  left: 0;
}

.border-primary {
    border-color: #007bff!important;
}
</style-->

<script>
$(document).ready(function(){



	$("body").on('click','#assign_contentedit',function(){
          
    
      $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>content/assignContentSetZone',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           

            
});




	 $("body").on('click','#btn5litsall',function(){
           
           $.fancybox.getInstance('close');
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>Content/showAllData",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  

        });


var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];    
function ValidateSingleInput2(oInput) {
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
				document.getElementById("fileimage").value = "";
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
var _validFileExtensions1 = [".mp4", ".MP4"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions1.length; j++) {
                var sCurExtension = _validFileExtensions1[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true; 
                    break;
                }
            }
             
            if (!blnValid) {
				document.getElementById("videfiles").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>VIDEO FILE IS IN JPEG / PNG FORMAT.");
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
 
$('.fileimage').on('change', function() { 
	if (this.files[0].size > 5242880) { 
	document.getElementById("fileimage").value = "";
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	}else{
		$('.image_err_filesize1').hide();
		$('.image_err_filesize2').hide();
	}
});
$('.videfiles').on('change', function() { 
	if (this.files[0].size > 104857600) { 
		document.getElementById("videfiles").value = "";
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 100 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	}else{
		$('.image_err_filesize1').hide();
		$('.image_err_filesize2').hide();
	}
}); 


    
    $('.tab-content').hide();



  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
    
    
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			rules: {
				content_set: "required",
				<?php if(empty($videos)){ ?>
				videfiles: "required",
				<?php }?>
				<?php if(empty($images)){ ?>
                fileimage:"required",
				<?php }?>
			},
                         errorPlacement: function(){
                               return false;
                         },
//			messages: {
//				content_set: "ENSURE THAT CONTENT SET NAME IS FILLED IN.",
//				videfiles: "ENSURE A VIDEO IS SELECTED.",
//                                fileimage: "ENSURE A IMAGE IS SELECTED."
//			},
        submitHandler: function(form) { 
        //alert("Doing some stuff...");
        //submit via ajax     
//e.preventDefault();
$('.tab-content').show();
 var form_data = new FormData();

   // Read selected files
   
   var cid=<?php echo $videos[0]["cid"];?>;
 
form_data.append("cid", cid);
form_data.append("content_set", document.getElementById('content_set').value);
form_data.append("fileimage", document.getElementById('fileimage').files[0]);
form_data.append("videfiles", document.getElementById('videfiles').files[0]);
   // AJAX request
   $.ajax({
       
     
     xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                      //  $(".progress-bar").width(percentComplete + '%');
                     //   $(".progress-bar").html(percentComplete+'%');
                        
   // var value = $('.progressbar').attr('data-value');
     var value = percentComplete;
     //var left = $('#progressbar').find('.progress-left .progress-bar');
   //   var left = $('#pleft');
     //var right = $('#progressbar').find('.progress-right .progress-bar');
  //   var right = $('#pleft').find('.progress-right .progress-bar');
     console.log(value);
     $("#percentcount").text(value.toFixed(1) +'% COMPLETE');
	 $('#submitbtncontent').prop('disabled', true);
	 $('#btn5litsall').prop('disabled', true);
    // if (value > 0) {
      // if (value <= 50) {
        // right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      // } else {
        // right.css('transform', 'rotate(180deg)')
        // left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      // }
    // }                      
     }
      }, false);
                return xhr;
      },
     url: '<?php echo base_url(); ?>Content/editUploadVideos/<?php echo $videos[0]["x_content_id"];?>', 
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
    beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="images/loading.gif"/>');
    },
     success: function (response) {
        var data=$.trim(response);
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>content/editSuccess/'+data,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
            

//alert('Successfully updated');
//       for(var index = 0; index < response.length; index++) {
//         var src = response[index];
//
//         // Add img element in <div id='preview'>
//         $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
//       }

     }
   });
       
        return false;  //This doesn't prevent the form from submitting.
    }
});
 
    // File type validation
 
});
</script>




<script>

    $(document).ready(function () {
        $('#videfiles').bind('change', function () {
  var filename = $("#videfiles").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active'); 
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

$('#fileimage').bind('change', function () {
  var filename = $("#fileimage").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active'); 
    $("#noFile2").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile2").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
        
//        $("#videfiles").on("change", function() {
//    if ($("#videfiles")[0].files.length > 5) {
//   //     $(this).after('<label id="videfiles-error" class="error" for="videfiles">ONLY 5 VIDEOS ARE ALLOWED.</label>')
//        alert("You can select only 5 videos");
//    } else {
//       alert();
//    }
//});

//
//updateList = function() {
//    var input = document.getElementById('videfiles');
//    var output = document.getElementById('fileList');
//    var children = "";
//    for (var i = 0; i < input.files.length; ++i) {
//        
//        
//        children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files.item(i).name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files.item(i).size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';
//        
//        
//        
//       // children += '<li>' + input.files.item(i).name + '</li>';
//    }
//    output.innerHTML = '<ul>'+children+'</ul>';
//}
//        
 
 


        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
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
