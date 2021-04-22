<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?=base_url();?>floor/addStep1FloorPlans/<?php echo $data->id;?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>FLOOR PLANS (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnfp1step"></div>
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
                        <h3> FLOOR PLAN INFO</h3>  				
                        
						<div class="form-group row d-flex-align">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT NAME</label>
							<div class="col-sm-5">
							<?php echo $project_data->project_name; ?>
							 <!--input type="text" readonly value="<?php echo $project_data->project_name; ?>" class="form-control" -->
                             <input type="hidden" name="project_name" class="project_name" value="<?php echo $project_select;  ?>" />
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">FLOOR PLAN NAME</label>
							<div class="col-sm-5">
								<input type="text" name="floor_plan_name" maxlength="50" class="floor_plan_name" value="<?php if($data->floor_plan_name){ echo $data->floor_plan_name;}?>" class="form-control" id="floor_plan_name" placeholder="Enter floor plan name. MAXIMUM ALLOWED CHARACTERS 50">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">Floor Plan Image</label>
							<div class="col-sm-5 project-visual_11">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile"><?php if(empty($data->file_name)){ echo "select a floor plan image"; }else{ echo $data->file_name.$data->file_type; }?></div> 
									<input type="file" name="image" id="file" class="file" onchange="ValidateSingleInput(this);">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								<p class="file-extan">ONLY JPEG / PNG FILES ARE ACCEPTED.</p>
							</div>  
							
						</div> 
						 
                            
											
						<!--div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SELECT A GRID TYPE TO USE</label>
							<div class="col-sm-5">
								<select name="project_name" id="project_name" class="project_name" required="" >
									<option value="">SELECT A GRID TYPE TO USE</option>
									<option value="1">GRID TYPE,16:9</option>
									<option value="2">GRID TYPE,32:18</option>
									<option value="3">GRID TYPE,48:27</option>
										
								</select>

							</div>
						</div-->
						<div class="scale-info">
						<h3>FLOOR PLAN SCALE INFO</h3>
						</div>
                       	 <div class="form-group row foloorr">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">Each grid represents</label>
							<div class="col-md-5 meters-value">
								<input style="margin-right: 10px;" type="text" name="each_square" value="<?php if($data->each_square){ echo $data->each_square;}?>" placeholder="Enter a measurment" id="measurment" class="measurment form-control">
								<span class="meter-right" style="padding-top:10px;">meters</span>
								<span style="color:red;font-weight: 100;" class="each_digit_error"></span>
								<p style="color:black width: 100%; float: left;">DEFAULT IS 1 METER x 1 METER.</p>
							<p style="color:black;margin-top: -18px; width: 100%; float: left;">MINIMUM VALUE IS 1, MAXIMUM VALUE IS 100.</p>
							</div>
						</div>
                        
                        
                        


						
                      
                        
                    </div>  
                </div>    

                <div class="col-md-3 right-text master-floor-left floor_plan_edit">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								
                            </ul>
                            <div class="table_info floor-step">
							<div class="current-status">
								<p><span class="current-bold">CURRENTLY Selected:</span> FLOOR PLAN (ADD)</p>
								</div>
                                <div class="display-step-status">
                                 <h5>STEP 1 OF 3</h5>  
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						         <p>WHEN DONE, CLICK NEXT.</p>
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

</script>

<script>
$(document).ready(function(){
    
    
 function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';

            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}   
    
 
 
 



  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
 
    
    jQuery.validator.addMethod("dollarsscents", function(value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
    }, "You must include two decimal places");
	
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				each_square: {
				//digits:true,
				required: true,
				// minlength: 1,
				//maxlength: 3,
				range: [.1, 100],
				dollarsscents: true
			  },
				
				floor_plan_name:{
					required:true,
					maxlength:50,
				},
				<?php if(empty($data->id)){?>
				image:"required"
				<?php }?>
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
        //alert("Doing some stuff...");
        //submit via ajax
        
        
        $('.tab-content').show();
        
       var project_name=$('.project_name').val();
var floor_plan_name=$('.floor_plan_name').val();
var measurment=$('.measurment').val();
//e.preventDefault();
 var formdata = new FormData(); 

var file_data = $('#file').prop('files')[0];
 formdata.append('image', file_data); 

 formdata.append('group_id', '<?=$group_id;?>');
 formdata.append('project_name', project_name);
 formdata.append('floor_plan_name', floor_plan_name);
 formdata.append('measurment', measurment);
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
	 $('#btn5').prop('disabled', true);
	 if(value==100){
		$('.do_not_exit_page').hide();
		$('.success').html('SUCCESSFUL');
	 }
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
	  // function GetFileSize() {
        // var fi = file_data; // GET THE FILE INPUT.

        
        // if (fi.files.length > 0) {
            
            // for (var i = 0; i <= fi.files.length - 1; i++) {

                // var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                // document.getElementById('fp').innerHTML =
                    // document.getElementById('fp').innerHTML + '<br /> ' + 
                        // '<b>' + Math.round((fsize / 1024)) + '</b> KB';
            // }
        // }
    // }
	  // $('.do_not_exit_page').hide();
	  
	  // $('.success').html('SUCCESSFUL');
     url: '<?php echo base_url(); ?>floor/addstep1FloorPOSt/<?php if($data->id){ echo $data->id; }?>', 
     type: 'post',
     data: formdata,
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
                    
			if (data) {
			/*	$.fancybox.open({
					src: '<?php echo base_url(); ?>floor/floorGrid/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						},
						touch: false,
                                  clickSlide: false,
                                  clickOutside: false
					} 
				});  */
				
				
				
				
				
				
		$.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>floor/floorGrid/'+data,
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

<?php 
if(!empty($data->project_id)){
	$project_select=$data->project_id;
}else{
	$project_select=$project_select;
}
?>


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
        src         : "<?=base_url();?>floor/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
	
});

    $(document).ready(function () {
         $("body").on('click','#close-btnfp1step',function(){
 
 <?php if(!empty($data->id)){ ?>
 window.location.href = "<?php echo base_url(); ?>floor/deleteJunkRecord/<?php echo $data->id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/ADD/1";
 <?php }?>
  
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
