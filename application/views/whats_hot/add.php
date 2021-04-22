<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>post/addstep1post" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WHAT'S HOT (<?=$action?>)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnposttep1"></div>
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
 
                    <div class="zone-info add-conents post-video-listing">
                        <h3> WHAT'S HOT ENTRY INFO</h3>  				
                         
						
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT TYPE</label>
							<div class="col-sm-5">
							
								<select name="whatshot_type" id="whatshot_type" class="whatshot_type">
									<option value="">SELECT A WHAT'S HOT TYPE</option>
									<option value="INFO" <?php if($data1->whatshot_type=='INFO'){ echo "selected"; }?>>INFO</option>
									<option value="PROMOTION" <?php if($data1->whatshot_type=='PROMOTION'){ echo "selected"; }?>>PROMOTION</option>
									<option value="CONTEST" <?php if($data1->whatshot_type=='CONTEST'){ echo "selected"; }?>>CONTEST</option>
									<option value="LUCKY DRAW" <?php if($data1->whatshot_type=='LUCKY DRAW'){ echo "selected"; }?>>LUCKY DRAW</option>
									
								</select>
							</div>
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT BUTTON URL</label>
							<div class="col-sm-5">
								<?php if(!empty($data1->whatshot_btnurl && $data1->whatshot_type!=='INFO')){ ?>
										<input type="url" maxlength="50" name="whatshot_btnurl" class="whatshot_btnurl running_latter" value="<?php if(!empty($data1->whatshot_btnurl)){ echo $data1->whatshot_btnurl; } ?>" class="form-control" id="whatshot_btnurl" placeholder="ENTER WHAT'S HOT BUTTON URL">
										<div><p id="whatsbtn" class="pt-2" style="display:none;">NOT APPLICABLE.</p></div>
										
										<script>
											$('#whatshot_type').change(function(){
												let val=$(this).val();
												if(val=='INFO'){
													$('.whatshot_btnurl').hide()
													$('#whatsbtn').show()
													
												}else{
													$('.whatshot_btnurl').show()
													$('#whatsbtn').hide()
												}
											})
											</script>
								<?php }else{?>
										<?php if($data1->whatshot_type=='INFO'){?>
											<div><p id="whatsbtn"class="pt-2" >NOT APPLICABLE.</p></div>
											<input type="url" style="display:none;" maxlength="50" name="whatshot_btnurl" class="whatshot_btnurl running_latter" value="<?php if(!empty($data1->whatshot_btnurl)){ echo $data1->whatshot_btnurl; } ?>" class="form-control" id="whatshot_btnurl" placeholder="ENTER WHAT'S HOT BUTTON URL">
											<script>
												$('#whatshot_type').change(function(){
													let val=$(this).val();
													if(val=='INFO'){
														$('.whatshot_btnurl').hide()
														$('#whatsbtn').show()
														
													}else{
														$('.whatshot_btnurl').show()
														$('#whatsbtn').hide()
													}
												})
											</script>
										<?php }else{?>
											<input type="url" maxlength="50" name="whatshot_btnurl" class="whatshot_btnurl running_latter" value="<?php if(!empty($data1->whatshot_btnurl)){ echo $data1->whatshot_btnurl; } ?>" class="form-control" id="whatshot_btnurl" placeholder="ENTER WHAT'S HOT BUTTON URL">
											<div><p id="whatsbtn" class="pt-2" style="display:none;">NOT APPLICABLE.</p></div>
										
											<script>
												$('#whatshot_type').change(function(){
													let val=$(this).val();
													if(val=='INFO'){
														$('.whatshot_btnurl').hide()
														$('#whatsbtn').show()
														
													}else{
														$('.whatshot_btnurl').show()
														$('#whatsbtn').hide()
													}
												})
											</script>
										<?php }?>
										
								<?php }?>
								
							</div>
						</div>   
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT REMARKS</label>
							<div class="col-sm-5">
								<input type="text" maxlength="50" name="whatshot_remarks" class="whatshot_remarks" value="<?php if(!empty($data1->whatshot_remarks)){ echo $data1->whatshot_remarks; } ?>" class="form-control" id="whatshot_remarks" placeholder="Enter WHAT'S HOT REMARKS">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT TITLE</label>
							<div class="col-sm-5">
								<input type="text" maxlength="50" name="whatshot_title" class="whatshot_title" value="<?php if(!empty($data1->whatshot_title)){ echo $data1->whatshot_title; } ?>" class="form-control" id="whatshot_title" placeholder="Enter WHAT'S HOT TITLE">
							</div>
						</div>
                        <div class="form-group row  post_textarea poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT DETAILS</label>
							<div class="col-sm-5">   
							
							
							
							<textarea rows="4" cols="50" maxlength="1500" id="whatshot_desc" class="whatshot_desc" name="whatshot_desc" placeholder="ENTER WHAT'S HOT DETAILS" value="<?php if(!empty($data1->whatshot_desc)){ echo $data1->whatshot_desc; } ?>"><?php if(!empty($data1->whatshot_desc)){ echo $data1->whatshot_desc; } ?></textarea>
							<script>
							CKEDITOR.replace( 'whatshot_desc', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
								 
								
								<br>
								
								     
							</div>   
						</div>

							<div class="form-group row  rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WHAT'S HOT VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->file_name)){ ?>
									
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file1=$data1->file_name;
								  if($file1){
									$myfile1text='style="display:none;"';
								  }else{
									  $myfile1text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile"><?=$data1->file_name?></div> 
                                     <input type="file" name="image" id="image" class="file" accept="image/*,video/mp4" onchange="updateList1()" <?=$myfile1text;?>>
									 <?php if($data1->file_name){?>
									 <div class="remove_1 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file1 rmv_btn" id="fileName" <?=$myfile1text;?>>ADD</div>
									  
									  <div class="remove_1 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_1').click(function(){
										$('#image').css('display','block');
										$('.remove_1').hide();
										$('.file1').show();
									})
								  </script>
								</div>
									<?php }else{ ?>
							<div class="file-upload">   
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">SELECT A WHAT'S HOT VISUALS / VIDEOS</div> 
                                     <input type="file" name="image" id="image" class="file" accept="image/*,video/mp4" onchange="updateList1()" >
									
									  <div class="file-select-button file1" id="fileName">ADD</div>
									  <div class="remove_1 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								</div>     
								<?php }?>
								
								<br>
								<p class="file-extan">FILE FORMAT FOR IMAGE FILES TO BE IN JPG/PNG. EACH FILE NOT EXCEEDING 5 MB.</p>
								<p class="file-extan">FILE FORMAT FOR VIDEO FILES TO BE IN MP4. EACH FILE NOT EXCEEDING 50 MB.</p>

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
								 
								 <li><a data-toggle="tab" href="" class="cnone" id="assign">ASSIGN ENTRIES</a></li>
                            </ul>
                            <div class="table_info floor-step">                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> WHAT'S HOT (<?=$action;?>)</p>
                                
                                 <p class="pt-30">FILL IN THE DETAILS ON THE LEFT TAB.</p>
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








$('.remove_1').click(function(){
	<?php if(empty($data1->file_name)){?>
	var input=document.getElementById("image").value = "";
	<?php }?>
	$("#noFile").text("SELECT A WHAT'S HOT VISUALS / VIDEOS");
	$('.file1').text('ADD');
	$('.file1').show();
    $('.remove_1').hide();
	
	
	$.ajax({
	   url:"<?=base_url();?>whats_hot/delImg",
	   method:"POST", 
	   data:{id:'<?=$data1->id;?>'},
	   success:function(data)
	   {
		  
	   } 
	  })
	
	
})

var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG",".MP4",".mp4"];

updateList1 = function() {
    var input = document.getElementById('image');
    var filename = $("#image").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop(); 
	var imgvalidate='';
	if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 52428800) {
			document.getElementById("image").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 50 MB.");
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
		
		 if (input.files[0].size > 5242880) {
			imgvalidate=false;
			document.getElementById("image").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList').hide();
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
				document.getElementById("image").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE/VIDEO FILE IS IN JPEG / PNG / MP4 FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
				$('#fileList').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
        $('.file1').hide();
        $('.remove_1').show();
		   
	}
}


});


</script>

<script>
$(document).ready(function(){
$('.tab-content').hide();
  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
  
    
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			rules: { 
				
				whatshot_type: "required",
				
				whatshot_btnurl: "required",
			  
			   whatshot_title: "required",
			   <?php if(empty($data1->file_name)){?>
				image: "required",
			   <?php }?>
				whatshot_desc: {
					required:true,
					maxlength:1500
				},
				
			}, 
                        errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
       
        $('.tab-content').show();
       
	var whatshot_btnurl=$('#whatshot_btnurl').val();
	var whatshot_type=$('#whatshot_type').val();
	var whatshot_remarks=$('#whatshot_remarks').val();
	var whatshot_title=$('#whatshot_title').val();
	var whatshot_desc=CKEDITOR.instances.whatshot_desc.getData();
 var formdata = new FormData(); 

 
   var image=document.getElementById('image').files.length;
   
   if(image>0){
formdata.append("image", document.getElementById('image').files[0]);
   }
    
	
formdata.append('whatshot_btnurl', whatshot_btnurl); 
formdata.append('whatshot_type', whatshot_type);
formdata.append('whatshot_remarks', whatshot_remarks);
 formdata.append('whatshot_title', whatshot_title);
 formdata.append('whatshot_desc', whatshot_desc);
 formdata.append('action', '<?=$action;?>');
 
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
     url: '<?php echo base_url(); ?>whats_hot/addstep1post/<?=$data1->id?>', 
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
				src         : "<?php echo base_url(); ?>whats_hot/AddSuccessful/"+data,
				ajax: { 
				   settings: { data : 'action=<?=$action?>', type : 'POST' }
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
$("body").on('click','#assign',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/assign",
        ajax: { 
           settings: { data : 'action=<?=$action?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});
$("body").on('click','#btn5',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/index",
        ajax: { 
           settings: { data : 'action=<?=$action?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});


        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
   
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
