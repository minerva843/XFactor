<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?=base_url();?>floor/addStep1FloorPlans/<?php echo $data->id;?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>ON DEMAND CONTENT (EDIT)</h2>
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
                        <h3> ON DEMAND CONTENT INFO</h3>  				
                        
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">CONTENT OWNER</label>
							<div class="col-sm-5">
							
								<select name="oncontent_owner" id="oncontent_owner" class="oncontent_owner">
									<option value="">SELECT A CONTENT OWNER</option>
									<?php foreach($data as $data){?>
									<option value="<?=$data->id?>" <?php if($data->id == $data1->oncontent_owner){ echo "selected"; }?>><?=$data->guest_type?>, <?=$data->username?></option>
									<?php }?>
									
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">CONTENT TITLE</label>
							<div class="col-sm-5">
								<input type="text" name="oncontent_title" maxlength="50" class="oncontent_title" value="<?php if($data1->oncontent_title){ echo $data1->oncontent_title;}?>" class="form-control" id="oncontent_title" placeholder="Enter CONTENT TITLE. MAXIMUM ALLOWED CHARACTERS 50">
							</div>
						</div>
						
						<!--div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">CONTENT TYPE</label>
							<div class="col-sm-5">
							
								<select name="oncontent_type" id="oncontent_type" class="oncontent_type">
									<option value="">SELECT A CONTENT TYPE</option>
									<option value="INFO">INFO</option>
									<option value="PROMOTION">PROMOTION</option>
									<option value="CONTEST">CONTEST</option>
									<option value="LUCKY DRAW">LUCKY DRAW</option>
									
								</select>
							</div>
						</div-->
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">CONTENT TYPE</label>
							<div class="col-sm-5 project-visual_11">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?=$data1->oncontent_type;?>
								
							</div>  
							
						</div> 
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">CONTENT FILE</label>
							<div class="col-sm-5 project-visual_11">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?=$data1->oncontent_file_name;?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data1->oncontent_file_size.'MB';?>
								
							
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
						
                        
                        
                        


						
                      
                        
                    </div>  
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								
                            </ul>
                            <div class="table_info floor-step">
							<div class="current-status">
								<p><span>CURRENTLY Selected : </span> <?=$data1->oncontent_title;?></p>
								</div>
                                <div class="display-step-status">
                                 <h5>STEP 1 OF 1</h5>
                                 <p>EDIT THE DETAILS ON THE LEFT TAB.</p>
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

<script>
$(document).ready(function(){ 
$('.tab-content').hide();

});


var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG",".pdf",".PDF",".mp3",".MP3",".mp4",".MP4"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
		var input = document.getElementById('file');
		var filename = $("#file").val();
		var image= filename;
		var filextsion=image.split('.').pop(); 
		var imgvalidate='';
		
		if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 1572864000) {
			document.getElementById("file").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE IS IN MP4 FORMAT MORE THAN 15 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList').hide();
			imgvalidate=false;
		}else{
			imgvalidate=true;
			$('.image_err_filesize1').hide();
			$('.image_err_filesize2').hide();
			
		}
		}
		if(filextsion == 'MP3' || filextsion=='mp3'){
		
			 if (input.files[0].size > 157286400) {
				document.getElementById("file").value = "";
				$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
				$('.image_err_filesize2').html("ENSURE THAT :<br/>AUDIO FILE IS IN MP3 FORMAT MORE THAN 150 MB.");
				$('.image_err_filesize1').show();
				$('.image_err_filesize2').show();
				$('#fileList').hide();
				imgvalidate=false;
			}else{
				imgvalidate=true;
				$('.image_err_filesize1').hide();
				$('.image_err_filesize2').hide();
				
			}
		}
		if(filextsion == 'pdf' || filextsion=='PDF'){
		
			 if (input.files[0].size > 15728640) {
				document.getElementById("file").value = "";
				$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
				$('.image_err_filesize2').html("ENSURE THAT :<br/>DOCUMENT FILE IS IN PDF FORMAT MORE THAN 15 MB.");
				$('.image_err_filesize1').show();
				$('.image_err_filesize2').show();
				$('#fileList').hide();
				imgvalidate=false;
			}else{
				imgvalidate=true;
				$('.image_err_filesize1').hide();
				$('.image_err_filesize2').hide();
				
			}
		}
		if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
			 if (input.files[0].size > 15728640) {
				imgvalidate=false;
				document.getElementById("file").value = "";
				$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
				$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE IS IN JPEG / PNG FORMAT MORE THAN 15 MB.");
				$('.image_err_filesize1').show();
				$('.image_err_filesize2').show();
				$('#fileList').hide();
			}else{
				imgvalidate=true;
				$('.image_err_filesize1').hide();
				$('.image_err_filesize2').hide();
			}
		}
	
	}
	
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
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED.");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>DOCUMENT FILE IS IN PDF FORMAT.</br>IMAGE FILE IS IN JPEG / PNG FORMAT.</br>AUDIO FILE IS IN MP3.</br>VIDEO FILE IS IN MP4 FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
                oInput.value = "";
                return false;
            }else{
				
								
				$('.image_err_fileformat1').empty();
                $('.image_err_fileformat2').empty();
			}
        }
		if (blnValid && imgvalidate==true) {
		
  var filename = $("#file").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }

	}
    //}
    //return true;
}
 
// $('.file').on('change', function() { 
	// if (this.files[0].size > 5242880) { 
		// $('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        // $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		// $('.image_err_filesize1').show();
		// $('.image_err_filesize2').show();
	// } 
// });  

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
				oncontent_owner: "required",
				oncontent_title: "required"
				
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
      
       var oncontent_owner=$('#oncontent_owner').val();
var oncontent_title=$('#oncontent_title').val();

 var formdata = new FormData(); 

 formdata.append('oncontent_owner', oncontent_owner);
 formdata.append('oncontent_title', oncontent_title);

  
   $.ajax({
       

     url: '<?php echo base_url(); ?>onDemand/addstepPOSt/<?=$data1->id;?>', 
     type: 'post',
     data: formdata,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {

			var data=$.trim(response);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url(); ?>onDemand/EditSuccessful/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						},
						touch: false,
                                  clickSlide: false,
                                  clickOutside: false
					} 
				}); 

			}
		

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
        src         : "<?php echo base_url(); ?>onDemand/index",
        ajax: { 
           settings: { data : 'project=<?=$data1->project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

    $(document).ready(function () {
        
        
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