<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>program/addprogram/<?=$data1->id?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btneditpro1"></div>
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
                        <h3> PROGRAM INFO</h3>  				
                        
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM START DATE AND TIME</label>
							<div class="col-sm-5">
							
								<input type="text" name="program_start_date_time"  value="<?php if(!empty($data1->program_start_date_time)){ echo date('Y-m-d H:i', strtotime($data1->program_start_date_time)); } ?>" class="program_start_date_time form-control" id="program_start_date_time" placeholder="YYYY:MM:DD HH:MM">
								<i id="program_start_icon" style="position: absolute;right: 25px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM END DATE AND TIME</label>
							<div class="col-sm-5">
							
								<input type="text" name="program_end_date_time"  value="<?php if(!empty($data1->program_end_date_time)){ echo date('Y-m-d H:i', strtotime($data1->program_end_date_time)); } ?>" class="program_end_date_time form-control" id="program_end_date_time" placeholder="YYYY:MM:DD HH:MM">
							   <i id="program_end_icon" style="position: absolute;right: 25px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							  
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM LOCATION</label>
							<div class="col-sm-5">
								<input type="text" name="program_location" class="program_location" value="<?php if(!empty($data1->program_location)){ echo $data1->program_location; } ?>" class="form-control" id="program_location" placeholder="Enter PROGRAM LOCATION">
							</div>
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM TITLE</label>
							<div class="col-sm-5">
								<input type="text" name="program_title" class="program_title" value="<?php if(!empty($data1->program_title)){ echo $data1->program_title; } ?>" class="form-control" id="program_title" placeholder="Enter PROGRAM TITLE">
							</div>
						</div>
						
						<div class="form-group row textarea-space poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM DETAILS</label>
							<div class="col-sm-5">
							
							
							<textarea rows="4" cols="50" id="program_details" class="program_details" name="program_details" placeholder="ENTER PROGRAM DETAILS" ><?php if(!empty($data1->program_details)){ echo $data1->program_details; } ?></textarea>
							<script>

                                
CKEDITOR.replace( 'program_details', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
								
								
							</div>
						</div>


						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM IMAGE</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile"><?php if($files->file_name){  echo $files->file_name;}else{ echo 'SELECT A PROGRAM IMAGE'; }?></div> 
                                                                        <input type="file" name="files" id="videfiles" class="file"  onchange="updateList()"  >
									  <div class="file-select-button" id="fileName">browse</div>
								  </div>
								</div> 
								<!--p class="file-extan">IMAGE/VIDEO FILE.</p-->
								<p class="file-extan">FILE FORMAT FOR IMAGE FILES TO BE IN JPG / PNG. EACH FILE NOT EXCEEDING 5 MB</p>
								
								
								
							</div>  
							
							
						</div>
                        
                        
                        


						
                      
                        
                    </div>  
                </div>
<script>
	//$(document).ready(function(){
		function GFG_click(id) { 
                var id = id; 
				$.ajax({
			   url:"<?=base_url();?>program/delImg",
			   method:"POST", 
			   data:{id:id},
			   success:function(data)
			   {
				   var data=$.trim(data);
				   if(data=='success'){
					   $('#remove'+id).remove();
				   }
			   } 
			  })
            }  
	//})
</script>
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <li><a data-toggle="tab" href="" class="allassignments cnone">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg cnone">ASSIGN PROGRAM</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <?=$data1->program_title?></p>
								<div class="display-step-status">
                                <h5>STEP 1 OF 2</h5>
                                 <p>FILL THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN DONE, CLICK NEXT.</p>
                       
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content" >
                                    
                                    
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

<script>
$(document).ready(function(){
$('.tab-content').hide();	
$("body").on('click','#program_start_icon',function(){
    //alert();
   $('#program_start_date_time').focus(); 
});
$("body").on('click','#program_end_icon',function(){
    //alert();
   $('#program_end_date_time').focus(); 
});
	var program_start_date_time = $('#program_start_date_time');
var program_end_date_time = $('#program_end_date_time');

program_start_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (program_end_date_time.val() != '') {
			var testStartDate = program_start_date_time.datetimepicker('getDate');
			var testEndDate = program_end_date_time.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		event_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
		//	event_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//event_end_date_time.datetimepicker('option', 'minDate', event_start_date_time.datetimepicker('getDate') );
	}
});
program_end_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (program_start_date_time.val() != '') {
			var testStartDate = program_start_date_time.datetimepicker('getDate');
			var testEndDate = program_end_date_time.datetimepicker('getDate');
			// if (testStartDate > testEndDate)
			//	event_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
                   // alert();
			//event_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//event_start_date_time.datetimepicker('option', 'maxDate', event_end_date_time.datetimepicker('getDate') );
	}
});

// program_start_date_time.datetimepicker({ 
// changeYear: true,
        // changeMonth: true,
        // controlType: 'select',
	// oneLine: true,
        // dateFormat: 'yy-mm-dd',
	// timeFormat: 'HH:mm',
        // showTimezone:false ,
         // minDate: 0,
	// onClose: function(dateText, inst) {
		// if (program_end_date_time.val() != '') {
			// var testStartDate = program_start_date_time.datetimepicker('getDate');
			// var testEndDate = program_end_date_time.datetimepicker('getDate');
			// if (testStartDate > testEndDate)
				// program_end_date_time.datetimepicker('setDate', testStartDate);
		// }
		// else {
			// program_end_date_time.val(dateText);
		// }
                // $('.ui-datepicker').css("display","none");
	// },
	// onSelect: function (selectedDateTime){
		// program_end_date_time.datetimepicker('option', 'minDate', program_start_date_time.datetimepicker('getDate') );
	// }
// });
// program_end_date_time.datetimepicker({ 
// changeYear: true,
        // changeMonth: true,
        // controlType: 'select',
	// oneLine: true,
        // dateFormat: 'yy-mm-dd',
	// timeFormat: 'HH:mm',
        // showTimezone:false ,
         // minDate: 0,
	// onClose: function(dateText, inst) {
		// if (program_start_date_time.val() != '') {
			// var testStartDate = program_start_date_time.datetimepicker('getDate');
			// var testEndDate = endDateTextBox.datetimepicker('getDate');
			// if (testStartDate > testEndDate)
				// program_start_date_time.datetimepicker('setDate', testEndDate);
		// }
		// else {
			// program_start_date_time.val(dateText);
		// }
                // $('.ui-datepicker').css("display","none");
	// },
	// onSelect: function (selectedDateTime){
		// program_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	// }
// });
});

// $('#program_start_date_time').datetimepicker({
	// mask:'19/39/9999 29:59'
// });

// $('#program_end_date_time').datetimepicker({
	// mask:'19/39/9999 29:59'
// });

		


</script>

<script>
$(document).ready(function(){
    var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];

updateList = function() {
    var input = document.getElementById('videfiles');
    var filename = $("#videfiles").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop(); 
	var imgvalidate='';
	
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 5242880) {
			imgvalidate=false;
			document.getElementById("videfiles").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			//$('#fileList').hide();
		}else{
			imgvalidate=true;
			$('.image_err_filesize1').hide();
			$('.image_err_filesize2').hide();
		}
	}
    if (image.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (image.substr(image.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
              
            if (!blnValid) {
				document.getElementById("videfiles").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPEG / PNG  FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
				
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#videfiles").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }

        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#" >REMOVE</a></div></div>';
        
        
		   // $('#fileList').show();
		   // $('.file1').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
	}
}



  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
    
    
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			rules: {
				<?php if(empty($files)){?>
				files: "required",
					<?php }?>
				program_location: "required",
                program_start_date_time: "required",
				program_end_date_time: "required",
				//program_presenter: "required",
				program_title:"required",
				program_details:"required",
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
        
        $('.tab-content').show();
        
        
        var program_start_date_time=$('#program_start_date_time').val();
	var program_end_date_time=$('#program_end_date_time').val();
	//var program_presenter=$('#program_presenter').val();
	var program_location=$('#program_location').val();
	var program_title=$('#program_title').val();
	//var program_details=$('#program_details').val();
	var program_details=CKEDITOR.instances.program_details.getData();
//e.preventDefault();
 var formdata = new FormData(); 

   // Read selected files
   // var totalfiles = document.getElementById('videfiles').files.length;
   // for (var index = 0; index < totalfiles; index++) {
      // formdata.append("files[]", document.getElementById('videfiles').files[index]);
   // }
   var totalfiles = document.getElementById('videfiles').files.length;
   if(totalfiles!=''){
		formdata.append("files", document.getElementById('videfiles').files[0]);
   }
formdata.append('program_start_date_time', program_start_date_time);
 formdata.append('program_end_date_time', program_end_date_time);
 //formdata.append('program_presenter', program_presenter);
 formdata.append('program_location', program_location);
 formdata.append('program_title', program_title);
 formdata.append('program_details', program_details);
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
	 if(value==100){
		$('.do_not_exit_page').hide();
		$('.success').html('SUCCESSFUL');
	 }
                        
     }
      }, false);
	   
                return xhr;
      },
     url: '<?php echo base_url(); ?>program/addstep1Program/<?=$data1->id?>', 
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
				
				
				
				        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>program/editProgramGuestlist/'+data,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
				
				
				

			}



       for(var index = 0; index < response.length; index++) {
         var src = response[index];

         // Add img element in <div id='preview'>
         $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
       }

     }
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
        src         : "<?php echo base_url(); ?>program/index",
        ajax: { 
           settings: { data : 'project=<?=$data1->project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

    $(document).ready(function () {
        
 
        $('body').on('click', '#close-btneditpro1', function () {
            $.fancybox.close();
            
            
            window.location.href = "<?php echo base_url(); ?>program/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $data1->group_id; ?>/<?php echo $data1->project_id; ?>/EDIT/1";
            
            
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
	.ui-datepicker-current{
		display:none;
	}

</style>
