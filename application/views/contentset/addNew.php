<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?=base_url();?>Content/UploadVideos" method="POST" id="addZone" enctype="multipart/form-data" >
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>TAKE A LOOK AROUND, CONTENT SET (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
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
                        <h3> CONTENT SET INFO</h3>  				
                        
						<div class="form-group row d-flex-align">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">content set NAME</label>
                                <div class="col-sm-5">
                                <input type="text" name="content_set" id="content_set" class="content_set" placeholder="ENTER CONTENT SET NAME">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">select video file</label>
							<div class="col-sm-5 project-visual_11">
								
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">select video files</div> 
									<input type="file" name="videfiles" id="videfiles" class="videfiles" onchange="ValidateSingleInput(this);" accept="video/mp4,video/x-m4v">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								<!--p class="file-extan">MINIMUN: 1 VIDEO fiLe.</p-->
							    <p class="file-extan">file format to be in mp4.each file not exceeding 100 mb.</p>
							</div>  
							
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">select image after video ends</label>
							<div class="col-sm-5 project-visual_11">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile2">select a image</div> 
									<input type="file" name="fileimage" accept="image/*" id="fileimage" class="fileimage" onchange="ValidateSingleInput2(this);">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								<p class="file-extan">file format to be in jpg/png. each file not exceending 5 mb. </p>
							</div>  
							
						</div> 
						 
                       
                        


						
                      
                        
                    </div>  
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                    <li class=""><a  id="assign_contentadd" class="cnone" data-toggle="tab" href="#menu1">ASSIGN CONTENT</a></li>
								    
                            </ul>
                            <div class="table_info floor-step">
							<div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >CONTENT SET (ADD) </span></p>
                                  <h5 class="zone-step-01">STEP 1 OF 1</h5>
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
		  <p class="do_not_exit_page"><b>DO NOT EXIT THIS PAGE</b></p>
		  <h5>UPLOAD <span class="success">IN PROGRESS </span></h5>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="font-weight-bold" id="percentcount">0<sup class="small" ></sup></div> 
          </div>
		  <h5 id="fp"></h5>
</div>                                    
                                    
                                    
                                    
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5" >Back</a>
                                <input type="submit" value="Next" class="action-btn" name="submit" id="submitbtncontent">
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
$('.tab-content').hide();

});

// $('#program_start_date_time').datetimepicker({
	// mask:'19/39/9999 29:59'
// });

// $('#program_end_date_time').datetimepicker({
	// mask:'19/39/9999 29:59'
// });

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

</script>

<script>
$(document).ready(function(){


  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
  
  
  
  	$("body").on('click','#assign_contentadd',function(){
          
    
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
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           

            
});
 
    
 
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				content_set: "required", 
				videfiles: "required",
				fileimage: "required",
			
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
        //alert("Doing some stuff...");
   
        $('.tab-content').show();
        

 var formdata = new FormData();  

 var project_id='<?php echo $project_select; ?>';
 var group_id='<?php echo $group_id; ?>';
formdata.append("content_set", document.getElementById('content_set').value);
formdata.append("fileimage", document.getElementById('fileimage').files[0]);
formdata.append("videfiles", document.getElementById('videfiles').files[0]);
formdata.append("project", project_id);
formdata.append("group_id", group_id);
console.log(formdata);
   // AJAX request
   $.ajax({ 
       
     
     xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);

     var value = percentComplete;

    // console.log(value);
	 
     $("#percentcount").text(value.toFixed(1) +'% COMPLETE');
	 $('#submitbtncontent').prop('disabled', true);
	 $('#btn5').prop('disabled', true);
	 if(value==100){
		$('.do_not_exit_page').hide();
		$('.success').html('SUCCESSFUL');
	 }
                      
     }
      }, false);
	  
                return xhr;
      },

   
     url: '<?php echo base_url(); ?>Content/UploadVideos', 
     type: 'post',
     data: formdata,
     dataType: 'json',
     contentType: false, 
     processData: false,
    beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="images/loading.gif"/>');
    },
	timeout: 0, 
     success: function (response) {

			var data=$.trim(response);
			$.fancybox.getInstance('close');
                    
			if (data) {
	
				
		$.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>content/addNewSuccess/'+data,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false, 
        clickOutside: false
        
    });
				
				
				
				

			}
			// if (data) {
				// $.fancybox.open({
					// src: '<?php echo base_url(); ?>floor/floorCreateSuccess/'+data,
					// type: 'ajax',    
					// opts: {
						// afterShow: function (instance, current) {
							// console.info('done!');
						// }
					// } 
				// }); 

			// }

     },
	  error: function(xhr) { // if error occured
        alert("Error occured.please try again");
        // $(placeholder).append(xhr.statusText + xhr.responseText);
        // $(placeholder).removeClass('loading');
    },
   });
       
        return false;  //This doesn't prevent the form from submitting.
    }
});
 
    // File type validation
 
});
</script>




<script>
$("body").on('click','#btn5',function(){
          
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
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
	
});

    $(document).ready(function () {
        



        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
            location.reload();
        });
        
 
        
 
 

    });
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
</script>
<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }

</style>
