<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>post/addstep1post" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>POST (ADD)</h2>
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
                        <h3> POST INFO</h3>  				
                         
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST OWNER</label>
							<div class="col-sm-5">
							
								<select name="post_owner" id="post_owner" class="post_owner">
									<option value="">SELECT A POST OWNER</option>
									<?php foreach($data as $data){?>
									<option value="<?=$data->id?>" <?php if($data->id == $data1->post_owner){ echo "selected"; }?>><?=$data->guest_type?>, <?=$data->username?></option>
									<?php }?>
									
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST STATUS</label>
							<div class="col-sm-5">
							
								<select name="post_availability" id="post_availability" class="post_availability">
									<option value="">SELECT A POST AVAILABILITY</option>
									<option value="STARTING SOON" <?php if($data1->post_availability=='STARTING SOON'){ echo "selected"; }?>>STARTING SOON</option>
									<option value="AVAILABLE" <?php if($data1->post_availability=='AVAILABLE'){ echo "selected"; }?>>AVAILABLE</option>
									<option value="ENDED" <?php if($data1->post_availability=='ENDED'){ echo "selected"; }?>>ENDED</option>
									
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST TYPE</label>
							<div class="col-sm-5">
							
								<select name="post_type" id="post_type" class="post_type">
									<option value="">SELECT A POST TYPE</option>
									<option value="INFO" <?php if($data1->post_type=='INFO'){ echo "selected"; }?>>INFO</option>
									<option value="PROMOTION" <?php if($data1->post_type=='PROMOTION'){ echo "selected"; }?>>PROMOTION</option>
									<option value="CONTEST" <?php if($data1->post_type=='CONTEST'){ echo "selected"; }?>>CONTEST</option>
									<option value="LUCKY DRAW" <?php if($data1->post_type=='LUCKY DRAW'){ echo "selected"; }?>>LUCKY DRAW</option>
									
								</select>
							</div>
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST TITLE</label>
							<div class="col-sm-5">
								<input type="text" maxlength="50" name="post_title" class="post_title" value="<?php if(!empty($data1->post_title)){ echo $data1->post_title; } ?>" class="form-control" id="post_title" placeholder="Enter POST TITLE">
							</div>
						</div>
                        <div class="form-group row  post_textarea poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST DETAILS</label>
							<div class="col-sm-5">
							
							
							
							<textarea rows="4" cols="50" maxlength="1500" id="post_details" class="post_details" name="post_details" placeholder="ENTER POST DETAILS" value="<?php if(!empty($data1->post_details)){ echo $data1->post_details; } ?>"><?php if(!empty($data1->post_details)){ echo $data1->post_details; } ?></textarea>
							<script>
							CKEDITOR.replace( 'post_details', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
								 
								<!--<textarea rows="4" cols="50" maxlength="1500" id="post_details" class="post_details" name="post_details" placeholder="ENTER POST DETAILS" value="<?php if(!empty($data1->post_details)){ echo $data1->post_details; } ?>"><?php if(!empty($data1->post_details)){ echo $data1->post_details; } ?></textarea> --> 
								<!-- <input type="text" name="floor_plan_name" class="floor_plan_name" value="" class="form-control" id="floor_plan_name" placeholder="Enter floor plan name"> -->
								<br>
								<p class="file-extan bs"><b>MINIMUM:1 IMAGE/VIDEO FILE. MAXIMUM:5 IMAGE/VIDEO FILES.</b></p>
								     
							</div>   
						</div>

							<div class="form-group row  rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($files[0]->file_name)){ ?>
									
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file1=$files[0]->file_name;
								  if($file1){
									$myfile1text='style="display:none;"';
								  }else{
									  $myfile1text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile"><?=$files[0]->file_name?></div> 
                                     <input type="file" name="image" id="image" class="file" accept="image/*,video/mp4" onchange="updateList1()" <?=$myfile1text;?>>
									 <?php if($files[0]->file_name){?>
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
								  
									<div class="file-select-name" id="noFile">SELECT A POST VISUALS / VIDEOS</div> 
                                     <input type="file" name="image" id="image" class="file" accept="image/*,video/mp4" onchange="updateList1()" >
									
									  <div class="file-select-button file1" id="fileName">ADD</div>
									  <div class="remove_1 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								</div>     
								<?php }?>

							</div>  
						
							
							
						</div>
					<div id="fileList"></div>
					
					<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($files[1]->file_name)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file2=$files[1]->file_name;
								  if($file2){
									$myfile2text='style="display:none;"';
								  }else{
									  $myfile2text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile2"><?=$files[1]->file_name?></div> 
                                     <input type="file" name="image2" id="image2" class="file" accept="image/*,video/mp4" onchange="updateList2()" <?=$myfile2text;?>>
									 <?php if($files[1]->file_name){?>
									 <div class="remove_2 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file2 rmv_btn" id="fileName" <?=$myfile2text;?>>ADD</div>
									  
									  <div class="remove_2 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_2').click(function(){
										$('#image2').css('display','block');
										$('.remove_2').hide();
										$('.file2').show();
									})
								  </script>
								</div> <?php }else{ ?>
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile2">SELECT A POST VISUALS / VIDEOS</div> 
                                     <input type="file" name="image2" id="image2" class="file" accept="image/*,video/mp4" onchange="updateList2()" >
									  <div class="file-select-button file2" id="fileName">ADD</div>
									  <div class="remove_2 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList2"></div>
						
						<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($files[2]->file_name)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file3=$files[2]->file_name;
								  if($file3){
									$myfile3text='style="display:none;"';
								  }else{
									  $myfile3text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile3"><?=$files[2]->file_name?></div> 
                                     <input type="file" name="image3" id="image3" class="file" accept="image/*,video/mp4" onchange="updateList3()" <?=$myfile3text;?>>
									 <?php if($files[2]->file_name){?>
									 <div class="remove_3 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file3 rmv_btn" id="fileName" <?=$myfile3text;?>>ADD</div>
									  
									  <div class="remove_3 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_3').click(function(){
										$('#image3').css('display','block');
										$('.remove_3').hide();
										$('.file3').show();
									})
								  </script>
								</div> <?php }else{ ?>
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile3">SELECT A POST VISUALS / VIDEOS</div> 
                                     <input type="file" name="image3" id="image3" class="file" accept="image/*,video/mp4" onchange="updateList3()" >
									  <div class="file-select-button file3" id="fileName">ADD</div>
									  <div class="remove_3 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList3"></div>
					
					<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($files[3]->file_name)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file4=$files[3]->file_name;
								  if($file4){
									$myfile4text='style="display:none;"';
								  }else{
									  $myfile4text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile4"><?=$files[3]->file_name?></div> 
                                     <input type="file" name="image4" id="image4" class="file" accept="image/*,video/mp4" onchange="updateList4()" <?=$myfile4text;?>>
									 <?php if($files[3]->file_name){?>
									 <div class="remove_4 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file4 rmv_btn" id="fileName" <?=$myfile4text;?>>ADD</div>
									  
									  <div class="remove_4 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_4').click(function(){
										$('#image4').css('display','block');
										$('.remove_4').hide();
										$('.file4').show();
									})
								  </script>
								</div> <?php }else{ ?>
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile4">SELECT A POST VISUALS / VIDEOS</div> 
                                     <input type="file" name="image4" id="image4" class="file" accept="image/*,video/mp4" onchange="updateList4()" >
									  <div class="file-select-button file4" id="fileName">ADD</div>
									  <div class="remove_4 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList4"></div>
					
					<div class="form-group row  post_visual_view rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">POST VISUALS /VIDEOS</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($files[4]->file_name)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file5=$files[4]->file_name;
								  if($file5){
									$myfile5text='style="display:none;"';
								  }else{
									  $myfile5text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile5"><?=$files[4]->file_name?></div> 
                                     <input type="file" name="image5" id="image5" class="file" accept="image/*,video/mp4" onchange="updateList5()" <?=$myfile5text;?>>
									 <?php if($files[4]->file_name){?>
									 <div class="remove_5 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file5 rmv_btn" id="fileName" <?=$myfile5text;?>>ADD</div>
									  
									  <div class="remove_5 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_5').click(function(){
										$('#image5').css('display','block');
										$('.remove_5').hide();
										$('.file5').show();
									})
								  </script>
								</div> <?php }else{ ?>
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile5">SELECT A POST VISUALS / VIDEOS</div> 
                                     <input type="file" name="image5" id="image5" class="file" accept="image/*,video/mp4" onchange="updateList5()" >
									  <div class="file-select-button file5" id="fileName">ADD</div>
									  <div class="remove_5 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>
								
								<br>       
								
								<p class="file-extan">FILE SIZE LIMIT. </p>
								<br>
								
								<p class="file-extan">"IMAGE TO BE IN JPG / PNG. MAXIMUM FILE SIZE IS 15MB."</p>
								
								<p class="file-extan">"VIDEOS TO BE IN MP4. MAXIMUM FILE SIZE IS 250MB."</p>

							</div>  
							
							
							
						</div>
					<div id="fileList5"></div>
                        
                        
                        
						<input type="hidden" id="img_id1" value="<?php echo $files[0]->id;?>">
						<input type="hidden" id="img_id2" value="<?php echo $files[1]->id;?>">
						<input type="hidden" id="img_id3" value="<?php echo $files[2]->id;?>">
						<input type="hidden" id="img_id4" value="<?php echo $files[3]->id;?>">
						<input type="hidden" id="img_id5" value="<?php echo $files[4]->id;?>">

						
                      
                        <?php  $count=count($files[0]->id);
						if($count>0){
							$finalcount=1;
						}else{
							$finalcount='';
						}
					?>
					<input type="text" class="file_count" name="file_count" value="<?=$finalcount;?>" style="border: none!important;font-size: 0px!important;padding:none!important;">
                    </div>  
                </div>
<script>
	//$(document).ready(function(){
		function GFG_click(id) { 
                var id = id; 
				$.ajax({
			   url:"<?=base_url();?>post/delImg",
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
								 <li><a data-toggle="tab" href="" class="cnone">ALL ASSIGNMENTS</a></li>
								 <li><a data-toggle="tab" href="" class="cnone">ASSIGN POST</a></li>
                            </ul>
                            <div class="table_info floor-step">                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> POST (ADD)</p>
                                <h5>STEP 1 OF 2</h5>
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




$("#image").change(function(){
$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");


});




$("#image2").change(function(){

$("#image").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");

});




$("#image3").change(function(){

$("#image2").rules("remove", "required");
$("#image").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");

});



$("#image4").change(function(){

$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image").rules("remove", "required");
$("#image5").rules("remove", "required");

}); 



$("#image5").change(function(){

$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image").rules("remove", "required");

});




 








$('.remove_1').click(function(){
	<?php if(empty($files)){?>
	var input=document.getElementById("image").value = "";
	<?php }?>
	$("#noFile").text("SELECT A POST VISUALS / VIDEOS");
	$('.file1').text('ADD');
	$('.file1').show();
    $('.remove_1').hide();
	
	var id='<?php echo $files[0]->id;?>';
	var post_id='<?=$data1->post_id?>';
	$.ajax({
	   url:"<?=base_url();?>post/delImg",
	   method:"POST", 
	   data:{id:id,post_id:post_id},
	   success:function(data)
	   {
		  $('.file_count').val(data);
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
		
		 if (input.files[0].size > 1572864000) {
			document.getElementById("image").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 250 MB.");
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
			document.getElementById("image").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 15 MB.");
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

        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#" >REMOVE</a></div></div>';
        
        
        $('.file1').hide();
        $('.remove_1').show();
		   // $('#fileList').show();
		   // $('.file1').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
	}
}

$('.remove_2').click(function(){
	<?php if(empty($files)){?>
	var input=document.getElementById("image2").value = "";
	<?php }?>
	$("#noFile2").text("SELECT A POST VISUALS / VIDEOS");
	$('.file2').text('ADD');
	$('.file2').show();
    $('.remove_2').hide();
	
	var id='<?php echo $files[1]->id;?>';
	var post_id='<?=$data1->post_id?>';
	$.ajax({
	   url:"<?=base_url();?>post/delImg",
	   method:"POST", 
	   data:{id:id,post_id:post_id},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
	
})
updateList2 = function() {
    var input = document.getElementById('image2');
    var filename = $("#image2").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop();
	var imgvalidate='';
	if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 15728640) {
			document.getElementById("image2").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 15 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList2').hide();
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
			document.getElementById("image2").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList2').hide();
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
				document.getElementById("image2").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE/VIDEO FILE IS IN JPEG / PNG / MP4 FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
				$('#fileList2').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image2").val();
  if (/^\s*$/.test(filename)) { 
    $(".file-upload").removeClass('active');
    $("#noFile2").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile2").text(filename.replace("C:\\fakepath\\", "")); 
  }
	
$('.file2').hide();
        $('.remove_2').show();
        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';
        
        
        
      
		   // $('#fileList2').show();
		   // $('.file2').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
	}
}

$('.remove_3').click(function(){
	<?php if(empty($files)){?>
	var input=document.getElementById("image3").value = "";
	<?php }?>
	$("#noFile3").text("SELECT A POST VISUALS / VIDEOS");
	$('.file3').text('ADD');
	$('.file3').show();
    $('.remove_3').hide();
	
	var id='<?php echo $files[2]->id;?>';
	var post_id='<?=$data1->post_id?>';
	$.ajax({
	   url:"<?=base_url();?>post/delImg",
	   method:"POST", 
	   data:{id:id,post_id:post_id},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
	
})
updateList3 = function() {
    var input = document.getElementById('image3');
    //var output = document.getElementById('fileList3');
    var filename = $("#image3").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop();
	var imgvalidate='';
	if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 15728640) {
			imgvalidate=false;
			document.getElementById("image3").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 15 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList3').hide();
		}else{
			imgvalidate=true;
			$('.image_err_filesize1').hide();
			$('.image_err_filesize2').hide();
			
		}
	}
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 5242880) {
			imgvalidate=false;
			document.getElementById("image3").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList3').hide();
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
				document.getElementById("image3").value = ""; 
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE/VIDEO FILE IS IN JPEG / PNG / MP4 FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
				$('#fileList3').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image3").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile3").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile3").text(filename.replace("C:\\fakepath\\", "")); 
  }
$('.file3').hide();
        $('.remove_3').show();
        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';

		   // $('#fileList3').show();
		   // $('.file3').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
	}
}
$('.remove_4').click(function(){
	<?php if(empty($files)){?>
	var input=document.getElementById("image4").value = "";
	<?php }?>
	$("#noFile4").text("SELECT A POST VISUALS / VIDEOS");
	$('.file4').text('ADD');
	$('.file4').show();
    $('.remove_4').hide();
	
	var id='<?php echo $files[3]->id;?>';
	var post_id='<?=$data1->post_id?>';
	$.ajax({
	   url:"<?=base_url();?>post/delImg",
	   method:"POST", 
	   data:{id:id,post_id:post_id},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
	
})
updateList4 = function() {
    var input = document.getElementById('image4');
   // var output = document.getElementById('fileList4');
    var filename = $("#image4").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop();
	var imgvalidate='';
	if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 15728640) {
			imgvalidate=false;
			document.getElementById("image4").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 15 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList4').hide();
		}else{
			imgvalidate=true;
			$('.image_err_filesize1').hide();
			$('.image_err_filesize2').hide();
			
		}
	}
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 5242880) {
			imgvalidate=false;
			document.getElementById("image4").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList4').hide();
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
				document.getElementById("image4").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE/VIDEO FILE IS IN JPEG / PNG /MP4 FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
				$('#fileList4').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image4").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile4").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile4").text(filename.replace("C:\\fakepath\\", "")); 
  }
$('.file4').hide();
        $('.remove_4').show();
        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';
        
        
        
       
		   // $('#fileList4').show();
		   // $('.file4').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
	}
}
$('.remove_5').click(function(){
	<?php if(empty($files)){?>
	var input=document.getElementById("image5").value = "";
	<?php }?>
	$("#noFile5").text("SELECT A POST VISUALS / VIDEOS");
	$('.file5').text('ADD');
	$('.file5').show();
    $('.remove_5').hide();
	
	var id='<?php echo $files[4]->id;?>';
	var post_id='<?=$data1->post_id?>';
	$.ajax({
	   url:"<?=base_url();?>post/delImg",
	   method:"POST", 
	   data:{id:id,post_id:post_id},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
})
updateList5 = function() {
    var input = document.getElementById('image5');
    //var output = document.getElementById('fileList5');
   var filename = $("#image5").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop();
	var imgvalidate='';
	if(filextsion == 'MP4' || filextsion=='mp4'){
		
		 if (input.files[0].size > 15728640) {
			imgvalidate=false;
			document.getElementById("image5").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>VIDEO FILE SIZE IS NOT MORE THAN 15 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList5').hide();
		}else{
			imgvalidate=true;
			$('.image_err_filesize1').hide();
			$('.image_err_filesize2').hide();
			
		}
	}
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 5242880) {
			imgvalidate=false;
			document.getElementById("image5").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList5').hide();
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
				document.getElementById("image5").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE/VIDEO FILE IS IN JPEG / PNG / MP4 FORMAT.");
				$('.image_err_fileformat1').show(); 
				$('.image_err_fileformat2').show();
				$('#fileList5').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image5").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile5").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile5").text(filename.replace("C:\\fakepath\\", "")); 
  }
$('.file5').hide();
        $('.remove_5').show();
        // children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files[0].name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files[0].size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';
        
        
        
     
		   // $('#fileList5').show();
		   // $('.file5').html('REMOVE');
    // output.innerHTML = '<ul>'+children+'</ul>';
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
				post_availability: "required",
				post_type: "required",
			   post_owner: "required",
			   post_title: "required",
			   <?php if(count($files[0]->id) >0){?>
				file_count: "required",
				<?php }else{?>
				image: "required",
				image2: "required",
				image3: "required",
				image4: "required",
				image5: "required", 
				<?php }?>
				post_details: {
					required:true,
					maxlength:1500
				}
				
			},
                        errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
       
        $('.tab-content').show();
       
	var post_availability=$('#post_availability').val();
	var post_type=$('#post_type').val();
	var post_owner=$('#post_owner').val();
	var post_title=$('#post_title').val();
	var post_details=CKEDITOR.instances.post_details.getData();
//e.preventDefault();
 var formdata = new FormData(); 

   // Read selected files
   // var totalfiles = document.getElementById('videfiles').files.length;
   // for (var index = 0; index < totalfiles; index++) {
      // formdata.append("files[]", document.getElementById('videfiles').files[index]);
   // }
   
   // var imagefiles = document.getElementById('image').files.length;
   // for (var index = 0; index < imagefiles; index++) {
      // formdata.append("image[]", document.getElementById('image').files[index]);
   // }
 
   var image=document.getElementById('image').files.length;
   
   if(image>0){
formdata.append("image", document.getElementById('image').files[0]);
   }
    
	var image2=document.getElementById('image2').files.length;
	
   if(image2>0){
	  
formdata.append("image2", document.getElementById('image2').files[0]);
   } 
	
	  var image3=document.getElementById('image3').files.length;
   if(image3>0){
formdata.append("image3", document.getElementById('image3').files[0]);
   }  
	  
	  var image4=document.getElementById('image4').files.length;
   if(image4>0){
formdata.append("image4", document.getElementById('image4').files[0]);
   }
	   
	   var image5=document.getElementById('image5').files.length;
   if(image5>0){
formdata.append("image5", document.getElementById('image5').files[0]);
   }
   var img_id1=$('#img_id1').val();
   if(img_id1!=''){
	   formdata.append('img_id1', img_id1);
   }
   var img_id2=$('#img_id2').val();
   if(img_id2!=''){
	   formdata.append('img_id2', img_id2);
   }
   var img_id3=$('#img_id3').val();
   if(img_id3!=''){
	   formdata.append('img_id3', img_id3);
   } 
   var img_id4=$('#img_id4').val();
   if(img_id4!=''){
	   formdata.append('img_id4', img_id4);
   }
   var img_id5=$('#img_id5').val();
   if(img_id5 !=''){
	   formdata.append('img_id5', img_id5);
   }
formdata.append('post_availability', post_availability); 
formdata.append('post_type', post_type);
formdata.append('post_owner', post_owner);
 formdata.append('post_title', post_title);
 formdata.append('post_details', post_details);
 formdata.append('project_id', '<?=$project_id;?>');
 
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
     url: '<?php echo base_url(); ?>post/addstep1post/<?=$data1->id?>', 
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
					src: '<?php echo base_url(); ?>post/addstep2/'+data,
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

<?php 
if(!empty($data1->project_id)){
	$project_id=$data1->project_id;
}else{
	$project_id=$project_id;
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
        src         : "<?php echo base_url(); ?>post/index",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

    $(document).ready(function () {
       

        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
            
            
            
            
        });
        
 
        
 
 

    });
// $('#videfiles').bind('change', function () {
  // var filename = $("#videfiles").val();
  // if (/^\s*$/.test(filename)) {
    // $(".file-upload").removeClass('active');
    // $("#noFile").text("No file chosen..."); 
  // }
  // else {
    // $(".file-upload").addClass('active');
    // $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  // }
// });


</script>
<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }

</style>
