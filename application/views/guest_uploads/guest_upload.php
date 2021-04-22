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
 <form method="POST" enctype="multipart/form-data" id="guestuploadform"  action="<?php echo base_url();  ?>file_upload/process_upload_file" data-preview="true">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUEST LISTS (ADD)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
					
                   
				   <div class="zone-info floor-planadds">				
 	
	                <div class="row add-guestspace">
					<div class="add-guest-title">
					<h3> GUEST LIST INFO</h3>      
					</div>  
					</div>	
						   
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">MASS UPLOAD FILE</label>
							<div class="col-sm-5 col-xl-5 project-visual">
								
							<div class="file-upload guest-uplaod">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">SELECT AN EXCEL FILE TO UPLOAD </div> 
									<input type="file" name="fileexcel" id="fileexcel" onchange="ValidateSingleInput(this);" class="file">
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								</div> 
								<p class="file-extan">FILE FORMAT TO BE IN XLSX ONLY. </p>
							</div>  
						</div>
						
					
                    </div>
                      
                </div> 


                <div class="col-md-3 right-text master-floor-left">   
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li ><a data-toggle="tab" id="mainmenuguestlist" href="#menu1">MAIN MENU</a></li>
								<li class="active"><a data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								<!--<li class=""><a data-toggle="tab" href="#menu1">ASSIGN GUESTS</a></li>-->
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> GUESTS LISTS
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF 1</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content" style="display:none;" >
                                
                                
                                
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
            <div class="font-weight-bold" id="percentcount">0<sup class="small"></sup></div> 
          </div>
		  <h5 id="fp"></h5>
</div>
                                
                                
                                
                                
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="btn57fhd">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5">
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
                                        <h4>GUEST LISTS (UPLOAD) <span style="color:red ;font-weight:bold;"> NOT SUCCESSFUL </span></h4>

                                        <p>ENSURE THAT THE FIELDS AND SEQUENCE IN UPLOADED FILE ARE CORRECT.
.</p>         
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
					</div> 
 
 

<script>
var _validFileExtensions = [".csv", ".xls",".xlsx"];    
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
 /*
$('.file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	} 
}); */

$(document).ready(function(){
			
				
	$("body").on('click','#mainmenuguestlist',function(){
          
        $.fancybox.getInstance('close');   
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Guest/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });

            
        });
        
     
     
     
     				
	$("body").on('click','#btn57fhd',function(){
          
           $.fancybox.getInstance('close');
           
                   $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Guest/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });

            
        });  
       
        
        
        
        
        
        
        
        
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});


 $.validator.setDefaults({
	    submitHandler: function(){
      
$('.tab-content').show();
       
 var formdata = new FormData();  

 var project_id='<?php echo $project_select; ?>';
formdata.append("file", document.getElementById('fileexcel').files[0]);
formdata.append("project", project_id);
formdata.append("file_type", "guest_excel");
formdata.append("group_id", "<?php echo $group_id; ?>");


   // AJAX request
   $.ajax({ 
       
     
     xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
     var value = percentComplete;

     console.log(value);
	 
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
     url: '<?php echo base_url(); ?>file_upload/process_upload_file', 
     type: 'post',
     data: formdata,
     dataType: 'json',
     contentType: false,
     processData: false,
    beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="images/loading.gif"/>');
    },
     success: function (data) {
console.log(data.response);

			
    /*if (data.response.status) { */

        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>file_upload/upload_guest_file_success",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
    });
				

		/*	}else{
			
			
			
	$.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>file_upload/upload_guest_file_failed",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
    });		
			
			
			
			
			
			
			}*/
		 

     },
	  error: function(xhr) { // if error occured
	  
	  
      //  alert("Error occured.please try again");
        
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
        
        
    },
   });
       
        return false;  //This doesn't prevent the form from submitting.

        
		}
	});

 
	$("#guestuploadform").validate({
		rules: {
				fileexcel: "required"

		},
		errorPlacement: function(){
                               return false;
                         } 
		
	});
	
	
	
	$('.close').click(function () {
                  var modal = document.getElementById("myModal1");
                  modal.style.display = "none";
                              
       });
	
	
	
});
$('#fileexcel').bind('change', function () {
  var filename = $("#fileexcel").val();
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
