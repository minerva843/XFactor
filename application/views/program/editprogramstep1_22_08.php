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
    min-height: 130px;
    width: 380px;
    overflow-y: scroll;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
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
</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
 <form method="POST" action="<?=base_url();?>program/addprogram/<?=$data1->id?>" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="type" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form program-tabs">

            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3> PROGRAM INFO</h3>  
					</div>
					</div>	
                    <div class="zone-info floor-planadd">
                        				
                       
                            <?php echo $success_msg; ?>
						<?php echo $error_msg; ?>
						
					  <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM START DATE AND TIME</label>
							<div class="col-sm-5">
							
								<input type="text" name="program_start_date_time"  value="<?php if(!empty($data1->program_start_date_time)){ echo date('Y-m-d H:i', strtotime($data1->program_start_date_time)); } ?>" class="program_start_date_time form-control" id="program_start_date_time" placeholder="YYYY:MM:DD HH:MM">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM END DATE AND TIME</label>
							<div class="col-sm-5">
							
								<input type="text" name="program_end_date_time"  value="<?php if(!empty($data1->program_end_date_time)){ echo date('Y-m-d H:i', strtotime($data1->program_end_date_time)); } ?>" class="program_end_date_time form-control" id="program_end_date_time" placeholder="YYYY:MM:DD HH:MM">
							   
							  
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM PRESENTER</label>
							<div class="col-sm-5">
								<select name="program_presenter" id="program_presenter" class="program_presenter">
									<option value="">SELECT A PROGRAM PRESENTER</option>
									<option value="ORGANISER JOHN JOHN JOHN JUNIOR" <?php if(!empty($data1->program_presenter=='ORGANISER JOHN JOHN JOHN JUNIOR')){ echo "selected"; }?> >ORGANISER JOHN JOHN JOHN JUNIOR</option>
									<option value="SPONSOR. SOME NAME" <?php if(!empty($data1->program_presenter=='SPONSOR. SOME NAME')){ echo "selected"; }?>>SPONSOR. SOME NAME</option>
									<option value="PARNER. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='PARNER. PREFERRED NAME')){ echo "selected"; }?>>PARNER. PREFERRED NAME</option>
									<option value="EXHIBITOR. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='EXHIBITOR. PREFERRED NAME')){ echo "selected"; }?>>EXHIBITOR. PREFERRED NAME</option>
									<option value="SPEAKER. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='SPEAKER. PREFERRED NAME')){ echo "selected"; }?>>SPEAKER. PREFERRED NAME</option>
									<option value="PANELIST. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='PANELIST. PREFERRED NAME')){ echo "selected"; }?>>PANELIST. PREFERRED NAME</option>
									<option value="VIP. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='VIP. PREFERRED NAME')){ echo "selected"; }?>>VIP. PREFERRED NAME</option>
									<option value="CELEBRITY. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='CELEBRITY. PREFERRED NAME')){ echo "selected"; }?>>CELEBRITY. PREFERRED NAME</option>
									<option value="PERFORMER. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='PERFORMER. PREFERRED NAME')){ echo "selected"; }?>>PERFORMER. PREFERRED NAME</option>
									<option value="FEATURED. PREFERRED NAME" <?php if(!empty($data1->program_presenter=='FEATURED. PREFERRED NAME')){ echo "selected"; }?>>FEATURED. PREFERRED NAME</option>
									<option value="OTHER PREFERRED NAME" <?php if(!empty($data1->program_presenter=='OTHER PREFERRED NAME')){ echo "selected"; }?>>OTHER PREFERRED NAME</option>
									<option value="BOOTH ORGANISER ABCDEF COMPANY 1" <?php if(!empty($data1->program_presenter=='BOOTH ORGANISER ABCDEF COMPANY 1')){ echo "selected"; }?>>BOOTH ORGANISER ABCDEF COMPANY 1</option>
									<option value="BOOTH SPONSOR ABCDEFIEAC COMPANY 2" <?php if(!empty($data1->program_presenter=='BOOTH SPONSOR ABCDEFIEAC COMPANY 2')){ echo "selected"; }?>>BOOTH SPONSOR ABCDEFIEAC COMPANY 2</option>
									<option value="BOOTH. EXHIBITOR. ABC COMPANY" <?php if(!empty($data1->program_presenter=='BOOTH. EXHIBITOR. ABC COMPANY')){ echo "selected"; }?>>BOOTH. EXHIBITOR. ABC COMPANY</option>
									<option value="BOOTH SPEAKER JOHN JOHNNY" <?php if(!empty($data1->program_presenter=='BOOTH SPEAKER JOHN JOHNNY')){ echo "selected"; }?>>BOOTH SPEAKER JOHN JOHNNY</option>
									<option value="BOOTH PANELIST MIKE MIKEY" <?php if(!empty($data1->program_presenter=='BOOTH PANELIST MIKE MIKEY')){ echo "selected"; }?>>BOOTH PANELIST MIKE MIKEY</option>
									<option value="BOOTH VIP JOHNNY JOHN" <?php if(!empty($data1->program_presenter=='BOOTH VIP JOHNNY JOHN')){ echo "selected"; }?>>BOOTH VIP JOHNNY JOHN</option>
									<option value="BOOTH CELEBRITY MIKE MIKEY" <?php if(!empty($data1->program_presenter=='BOOTH CELEBRITY MIKE MIKEY')){ echo "selected"; }?>>BOOTH CELEBRITY MIKE MIKEY</option>
									<option value="BOOTH PERFORMER JOHNNY JOHN JOHNNY JOHNNY JOHN" <?php if(!empty($data1->program_presenter=='BOOTH PERFORMER JOHNNY JOHN JOHNNY JOHNNY JOHN')){ echo "selected"; }?>>BOOTH PERFORMER JOHNNY JOHN JOHNNY JOHNNY JOHN</option>
									<option value="BOOTH FEATURED MIKE MIKEY MIKE MIKE MIKEY" <?php if(!empty($data1->program_presenter=='BOOTH FEATURED MIKE MIKEY MIKE MIKE MIKEY')){ echo "selected"; }?>>BOOTH FEATURED MIKE MIKEY MIKE MIKE MIKEY</option>
									<option value="BOOTH OTHERS MIKEY IS OTHERS" <?php if(!empty($data1->program_presenter=='BOOTH OTHERS MIKEY IS OTHERS')){ echo "selected"; }?>>BOOTH OTHERS MIKEY IS OTHERS</option>
									<option value="SHOP UNCLE'S SHOP 1 2 3 A B C SHOP" <?php if(!empty($data1->program_presenter=="SHOP UNCLE'S SHOP 1 2 3 A B C SHOP")){ echo "selected"; }?>>SHOP UNCLE'S SHOP 1 2 3 A B C SHOP</option>
									<option value="XCONNECT DEMO EXHIBITION DEMO FOR ALL" <?php if(!empty($data1->program_presenter=='XCONNECT DEMO EXHIBITION DEMO FOR ALL')){ echo "selected"; }?>>XCONNECT DEMO EXHIBITION DEMO FOR ALL</option>									
								</select>

							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM TITLE</label>
							<div class="col-sm-5">
								<input type="text" name="program_title" class="program_title" value="<?php if(!empty($data1->program_title)){ echo $data1->program_title; } ?>" class="form-control" id="program_title" placeholder="Enter PROGRAM TITLE">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST DETAILS</label>
							<div class="col-sm-5">
								
								<textarea rows="4" cols="50" id="program_details" class="program_details" name="program_details" placeholder="ENTER PROGRAM DETAILS" value="<?php if(!empty($data1->program_details)){ echo $data1->program_details; } ?>"><?php if(!empty($data1->program_details)){ echo $data1->program_details; } ?></textarea> 
								<!-- <input type="text" name="floor_plan_name" class="floor_plan_name" value="" class="form-control" id="floor_plan_name" placeholder="Enter floor plan name"> -->
							</div>
						</div>

						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROGRAM IMAGE</label>
							<div class="col-sm-7 col-xl-5 program-browse">
								<!--input type="file" class="form-control" name="files[]" onchange="ValidateSingleInput(this);" id="files" multiple-->
								
								<div class="file-upload add-proj_020">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">SELECT A PROGRAM IMAGE</div> 
									<input type="file" name="files" id="files" class="files" onchange="ValidateSingleInput(this);" multiple>
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								 
								</div> 
								<div class="program-upload">
								<p class="file-extan">MINIMUM:1 IMAGE/VIDEO FILE MAXIMUM:5 IMAGE/VIDEO FILES.</p>
								<p class="file-extan">MFILE FORMAT FOR IMAGE FILES TO BE JPG/PNG EACH FILE NOT EXCEEDING 15 MB.</p>
								</div>
								 <table class="table">
									<tbody>
										<?php foreach($files as $val){?>
										<tr id="remove<?=$val->id;?>">
											<td><?=$val->file_name;?></td>
											<td><?=$val->file_size;?></td>
											<td class="remove"><a id="<?=$val->id;?>" onclick="GFG_click(this.id)" >
											
											REMOVE</a></td>
										</tr>
										 
										<?php }?>
									</tbody>
								  </table>
								
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
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                <li><a data-toggle="tab" href="#menu2">ASSIGN PROGRAM</a></li>
				                
                            </ul>
                            <div class="table_info floor-step">
							<div class="status">
							<p class="status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?=$data1->program_title?>
                                <h5>STEP 1 OF 1</h5>
                                 <p>EDIT THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN DONE, CLICK NEXT.</p>
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
								<a class="action-btn" id="btn5" >Back</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit">
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
$(document).ready(function(){ 
	var program_start_date_time = $('#program_start_date_time');
var program_end_date_time = $('#program_end_date_time');

program_start_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (program_end_date_time.val() != '') {
			var testStartDate = program_start_date_time.datetimepicker('getDate');
			var testEndDate = program_end_date_time.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				program_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
			program_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		program_end_date_time.datetimepicker('option', 'minDate', program_start_date_time.datetimepicker('getDate') );
	}
});
program_end_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (program_start_date_time.val() != '') {
			var testStartDate = program_start_date_time.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				program_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
			program_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		program_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});
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
$.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;

    this.closest("#files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + fileId + "\">Remove</a>";
				var filesize=file.size;
				var filemb=filesize / (1024 * 1024);
				var finalsize=Number(filemb).toFixed(2);
            output.push("<li><strong>", escape(file.name), "</strong> - ", finalsize, " mb. &nbsp; &nbsp; ", removeLink, "</li> ");
        };

        $(this).children(".fileList")
            .append(output.join(""));

        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("a").data("fileid");

        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }

        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }

    return this;
};
var formdata = new FormData();
(function () {
    var filesToUpload = [];

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");


        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            formdata.append("files1[]", filesToUpload[i].file);
        }

	

        // $.ajax({
            // url: "http://requestb.in/1k0dxvs1",
            // data: formData,
            // processData: false,
            // contentType: false,
            // type: "POST",
            // success: function (data) {
                // alert("DONE");

                // files1Uploader.clear();
            // },
            // error: function (data) {
                // alert("ERROR - " + data.responseText);
            // }
        // });
		
})()

$(document).ready(function(){
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});

$.validator.setDefaults({
	    submitHandler: function(){
		
        
	var program_start_date_time=$('#program_start_date_time').val();
	var program_end_date_time=$('#program_end_date_time').val();
	var program_presenter=$('#program_presenter').val();
	var program_presenter=$('#program_presenter').val();
	var program_title=$('#program_title').val();
	var program_details=$('#program_details').val();
var formdata = new FormData();

var url="<?php echo base_url();?>program/addstep1Program/<?=$data1->id?>"; 
 var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      formdata.append("files[]", document.getElementById('files').files[index]);
   }

// var file_data = $('#files').prop('files')[0];
	// formdata.append('register_header_image', file_data);
 formdata.append('program_start_date_time', program_start_date_time);
 formdata.append('program_end_date_time', program_end_date_time);
 formdata.append('program_presenter', program_presenter);
 formdata.append('program_title', program_title);
 formdata.append('program_details', program_details);
 
console.log(formdata);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		dataType: 'json',
		success: function(data)
		{ 
		
			var data=$.trim(data);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: 'http://13.235.169.150/XFactor/program/editprogramSuccess/'+data,
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
							
			program_start_date_time: "required",
			program_end_date_time: "required",
			program_presenter: "required",
			program_title:"required",
			program_details:"required",
			files:"required"
			
		}, 
		errorPlacement: function(){
                               return false;
                         }
		// messages: {
			// program_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// program_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// program_presenter: "ENSURE THAT A PROGRAM PRESENTER IS SELECTED.",
			// program_title: "ENSURE THAT PROGRAM TITLE IS FILLED IN.",
			// program_details:"ENSURE THAT POST DETAILS IS FILLED IN.",
			// files:"ENSURE THAT AT LEAST AN IMAGE FILE IS SELECTED."
			
		// }
	});
});
</script>


<script>
 $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/index',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
            
        });
$('#files').bind('change', function () {
  var filename = $("#files").val();
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
