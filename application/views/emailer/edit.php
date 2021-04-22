<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>program/addprogram" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>EMAILER (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnEmailStep1Edit"></div>
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
                        <h3> EMAILER INFO</h3>  				
                        
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER OWNER</label>
							<div class="col-sm-5">
							
								<select name="emailer_owner" id="emailer_owner" class="emailer_owner">
									<option value="">SELECT A EMAILER OWNER</option>
									<?php foreach($data as $val){?>
									<option value="<?=$val->id?>" <?php if($val->id == $data1->emailer_owner){ echo "selected"; }?>><?=$val->guest_type?>, <?=$val->username?></option>
									<?php }?>
									
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER OWNER BCC</label>
							<div class="col-sm-5">
								
								<input type="email" name="emailer_owner_bcc" class="emailer_owner_bcc running_latter" value="<?php if(!empty($data1->emailer_owner_bcc)){ echo $data1->emailer_owner_bcc; } ?>" class="form-control" id="emailer_owner_bcc" placeholder="ENTER EMAILER OWNER BCC EMAIL">
								
								
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label"> EMAIL TITLE</label>
							<div class="col-sm-5">
								<input type="text" name="emailer_title" class="emailer_title" value="<?php if(!empty($data1->emailer_title)){ echo $data1->emailer_title; } ?>" class="form-control" id="emailer_title" placeholder="Enter  EMAIL TITLE">
							</div>
						</div>
                       <div class="form-group row textarea-space poject_editor">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER DETAILS</label>
							<div class="col-sm-5">
							
							
							<textarea rows="4" cols="50" id="emailer_details" class="emailer_details" name="emailer_details" placeholder="ENTER EMAILER DETAILS" value="<?php if(!empty($data1->emailer_details)){ echo $data1->emailer_details; } ?>"><?php if(!empty($data1->emailer_details)){ echo $data1->emailer_details; } ?></textarea>
							<script>

                                CKEDITOR.replace( 'emailer_details', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
								
								
								
								<p class="file-extan">DOCUMENTS TO BE IN PDF. MAXIMUM FILE SIZE IS 5MB.</p>
								<p class="file-extan">IMAGE TO BE IN JPG / PNG. MAXIMUM FILE SIZE IS 5MB.</p>
							</div>
						</div>

						<div class="form-group row  rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER PDF 1</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->pdf1)){ ?>
									
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file1=$data1->pdf1;
								  if($file1){
									$myfile1text='style="display:none;"';
								  }else{
									  $myfile1text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile"><?=$data1->pdf1?></div> 
                                     <input type="file" name="image" id="image" class="file" accept="" onchange="updateList1()" <?=$myfile1text;?>>
									 <?php if($data1->pdf1){?>
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
								  
									<div class="file-select-name" id="noFile">SELECT A EMAILER PDF 1</div> 
                                     <input type="file" name="image" id="image" class="file" accept="" onchange="updateList1()" >
									
									  <div class="file-select-button file1" id="fileName">ADD</div>
									  <div class="remove_1 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								</div>     
								<?php }?>

							</div>  
						
							
							
						</div>
					<div id="fileList"></div>
					
					<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER PDF 2</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->pdf2)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file2=$data1->pdf2;
								  if($file2){
									$myfile2text='style="display:none;"';
								  }else{
									  $myfile2text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile2"><?=$data1->pdf2?></div> 
                                     <input type="file" name="image2" id="image2" class="file" accept="" onchange="updateList2()" <?=$myfile2text;?>>
									 <?php if($data1->pdf2){?>
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
								  
									<div class="file-select-name" id="noFile2">SELECT A EMAILER PDF 2</div> 
                                     <input type="file" name="image2" id="image2" class="file" accept="" onchange="updateList2()" >
									  <div class="file-select-button file2" id="fileName">ADD</div>
									  <div class="remove_2 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList2"></div>
						
						<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER PDF 3</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->pdf3)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file3=$data1->pdf3;
								  if($file3){
									$myfile3text='style="display:none;"';
								  }else{
									  $myfile3text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile3"><?=$data1->pdf3?></div> 
                                     <input type="file" name="image3" id="image3" class="file" accept="" onchange="updateList3()" <?=$myfile3text;?>>
									 <?php if($data1->pdf3){?>
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
								  
									<div class="file-select-name" id="noFile3">SELECT A EMAILER PDF 3</div> 
                                     <input type="file" name="image3" id="image3" class="file" accept="" onchange="updateList3()" >
									  <div class="file-select-button file3" id="fileName">ADD</div>
									  <div class="remove_3 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList3"></div>
					
					<div class="form-group row rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER VISUALS 1</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->image1)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file4=$data1->image1;
								  if($file4){
									$myfile4text='style="display:none;"';
								  }else{
									  $myfile4text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile4"><?=$data1->image1?></div> 
                                     <input type="file" name="image4" id="image4" class="file" accept="image/*" onchange="updateList4()" <?=$myfile4text;?>>
									 <?php if($data1->image1){?>
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
								  
									<div class="file-select-name" id="noFile4">SELECT A EMAILER VISUALS 1</div> 
                                     <input type="file" name="image4" id="image4" class="file" accept="image/*" onchange="updateList4()" >
									  <div class="file-select-button file4" id="fileName">ADD</div>
									  <div class="remove_4 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>

							</div>  
							
							
							
						</div>
					<div id="fileList4"></div>
					
					<div class="form-group row  post_visual_view rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER VISUALS 2</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->image2)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file5=$data1->image2;
								  if($file5){
									$myfile5text='style="display:none;"';
								  }else{
									  $myfile5text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile5"><?=$data1->image2?></div> 
                                     <input type="file" name="image5" id="image5" class="file" accept="image/*" onchange="updateList5()" <?=$myfile5text;?>>
									 <?php if($data1->image2){?>
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
								  
									<div class="file-select-name" id="noFile5">SELECT A EMAILER VISUALS 2</div> 
                                     <input type="file" name="image5" id="image5" class="file" accept="image/*" onchange="updateList5()" >
									  <div class="file-select-button file5" id="fileName">ADD</div>
									  <div class="remove_5 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>
							</div>   
						</div>
						
						<div class="form-group row  post_visual_view rmv_btn_main">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">EMAILER VISUALS 3</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
								<?php if(!empty($data1->image3)){?>
								
									<div class="file-upload">   
								  <div class="file-select">
								  <?php 
								  
								  $file6=$data1->image3;
								  if($file6){
									$myfile6text='style="display:none;"';
								  }else{
									  $myfile6text='';
								  }
								  ?>
									<div class="file-select-name" id="noFile6"><?=$data1->image3?></div> 
                                     <input type="file" name="image6" id="image6" class="file" accept="image/*" onchange="updateList6()" <?=$myfile6text;?>>
									 <?php if($data1->image3){?>
									 <div class="remove_6 rmv_btn" >REMOVE</div>
									 <?php }?>
									  <div class="file-select-button file6 rmv_btn" id="fileName" <?=$myfile6text;?>>ADD</div>
									  
									  <div class="remove_6 rmv_btn" style="display:none">REMOVE</div>
									  
								  </div>
								  <script>
									$('.remove_6').click(function(){
										$('#image6').css('display','block');
										$('.remove_6').hide();
										$('.file6').show();
									})
								  </script>
								</div> <?php }else{ ?>
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile6">SELECT A EMAILER VISUALS 3</div> 
                                     <input type="file" name="image6" id="image6" class="file" accept="image/*" onchange="updateList6()" >
									  <div class="file-select-button file6" id="fileName">ADD</div>
									  <div class="remove_6 rmv_btn" style="display:none">REMOVE</div>
								  </div>
								</div> 
								<?php }?>
							</div>   
						</div>
                       
                        
                        


						
                      
                        
                    </div>  
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                             <ul class="nav nav-tabs ">
							<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <!--li><a data-toggle="tab" href="" class="allassignments">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li-->
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p><span class="current-bold">CURRENTLY SELECTED : </span> EMAILER (EDIT)</p> 
								<div class="display-step-status">
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
$("#image").change(function(){
$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");
$("#image6").rules("remove", "required");


});




$("#image2").change(function(){

$("#image").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");
$("#image6").rules("remove", "required");

});




$("#image3").change(function(){

$("#image2").rules("remove", "required");
$("#image").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image5").rules("remove", "required");
$("#image").rules("remove", "required");

});



$("#image4").change(function(){

$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image").rules("remove", "required");
$("#image5").rules("remove", "required");
$("#image6").rules("remove", "required");

}); 



$("#image5").change(function(){

$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image").rules("remove", "required");
$("#imag6").rules("remove", "required");

});

$("#image6").change(function(){

$("#image2").rules("remove", "required");
$("#image3").rules("remove", "required");
$("#image4").rules("remove", "required");
$("#image").rules("remove", "required");
$("#imag5").rules("remove", "required");

});


});





</script>

<script>
$(document).ready(function(){
    
$('.remove_1').click(function(){
	<?php if(empty($data1->pdf1)){?>
	var input=document.getElementById("image").value = "";
	<?php }?>
	$("#noFile").text("SELECT A EMAILER PDF");
	$('.file1').text('ADD');
	$('.file1').show();
    $('.remove_1').hide();
	
	var id='<?php echo $data1->id;?>';
	var pdf1='pdf1';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:pdf1},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
	
})

var _PdfvalidFileExtensions = [".pdf", ".PDF"];

updateList1 = function() {
    var input = document.getElementById('image');
    var filename = $("#image").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop(); 
	var imgvalidate='';
	
	if(filextsion == 'pdf' || filextsion=='PDF'){
		
		 if (input.files[0].size > 05728640) {
			imgvalidate=false;
			document.getElementById("image").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>PDF FILE SIZE IS NOT MORE THAN 5 MB.");
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
            for (var j = 0; j < _PdfvalidFileExtensions.length; j++) {
                var sCurExtension = _PdfvalidFileExtensions[j];
                if (image.substr(image.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
				document.getElementById("image").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>PDF FILE IS IN PDF FORMAT.");
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

$('.remove_2').click(function(){
	<?php if(empty($data1->pdf2)){?>
	var input=document.getElementById("image2").value = "";
	<?php }?>
	$("#noFile2").text("SELECT A EMAILER PDF");
	$('.file2').text('ADD');
	$('.file2').show();
    $('.remove_2').hide();
	
	var id='<?php echo $data1->id;?>';
	var pdf2='pdf2';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:pdf2},
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
	
	if(filextsion == 'pdf' || filextsion=='PDF'){
		
		 if (input.files[0].size > 05728640) {
			imgvalidate=false;
			document.getElementById("image2").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>PDF FILE SIZE IS NOT MORE THAN 5 MB.");
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
            for (var j = 0; j < _PdfvalidFileExtensions.length; j++) {
                var sCurExtension = _PdfvalidFileExtensions[j];
                if (image.substr(image.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
				document.getElementById("image2").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>PDF FILE IS IN PDF FORMAT.");
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
       
        
        
      
	}
}

$('.remove_3').click(function(){
	<?php if(empty($data1->pdf3)){?>
	var input=document.getElementById("image3").value = "";
	<?php }?>
	$("#noFile3").text("SELECT A EMAILER PDF");
	$('.file3').text('ADD');
	$('.file3').show();
    $('.remove_3').hide();
	
	var id='<?php echo $data1->id;?>';
	var pdf3='pdf3';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:pdf3},
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
	
	if(filextsion == 'pdf' || filextsion=='PDF'){
		 
		 if (input.files[0].size > 05728640) {
			imgvalidate=false;
			document.getElementById("image3").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>PDF FILE SIZE IS NOT MORE THAN 5 MB.");
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
            for (var j = 0; j < _PdfvalidFileExtensions.length; j++) {
                var sCurExtension = _PdfvalidFileExtensions[j];
                if (image.substr(image.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
				document.getElementById("image3").value = ""; 
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>PDF FILE IS IN PDF FORMAT.");
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
        
	}
}

var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];

$('.remove_4').click(function(){
	<?php if(empty($data1->image1)){?>
	var input=document.getElementById("image4").value = "";
	<?php }?> 
	$("#noFile4").text("SELECT A EMAILER VISUALS"); 
	$('.file4').text('ADD');
	$('.file4').show(); 
    $('.remove_4').hide();
	
	var id='<?php echo $data1->id;?>';
	var image1='image1';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:image1},
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
	
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 05728640) {
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
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPG / PNG FORMAT.");
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
        
	}
}
$('.remove_5').click(function(){
	<?php if(empty($data1->image2)){?>
	var input=document.getElementById("image5").value = "";
	<?php }?>
	$("#noFile5").text("SELECT A EMAILER VISUALS");
	$('.file5').text('ADD');
	$('.file5').show();
    $('.remove_5').hide();
	
	var id='<?php echo $data1->id;?>';
	var image2='image2';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:image2},
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
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 05728640) {
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
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPG / PNG FORMAT.");
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
        
	}
}

$('.remove_6').click(function(){
	<?php if(empty($data1->image3)){?>
	var input=document.getElementById("image6").value = "";
	<?php }?>
	$("#noFile6").text("SELECT A EMAILER VISUALS");
	$('.file6').text('ADD');
	$('.file6').show();
    $('.remove_6').hide();
	
	var id='<?php echo $data1->id;?>';
	var image3='image3';
	$.ajax({
	   url:"<?=base_url();?>emailer/delFile",
	   method:"POST", 
	   data:{id:id,file:image3},
	   success:function(data)
	   {
		  $('.file_count').val(data);
	   } 
	  })
	
})
updateList6 = function() {
    var input = document.getElementById('image6');
    //var output = document.getElementById('fileList5');
   var filename = $("#image6").val();
	
    //var output = document.getElementById('fileList');
    var children = "";
	var image= filename;
	var filextsion=image.split('.').pop();
	var imgvalidate='';
	if(filextsion == 'jpg' || filextsion=='JPG' || filextsion == 'jpeg' || filextsion=='JPEG' || filextsion == 'PNG' || filextsion=='png'){
		
		 if (input.files[0].size > 05728640) {
			imgvalidate=false;
			document.getElementById("image6").value = "";
			$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
			$('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
			$('.image_err_filesize1').show();
			$('.image_err_filesize2').show();
			$('#fileList6').hide();
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
				document.getElementById("image6").value = "";
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPG / PNG FORMAT.");
				$('.image_err_fileformat1').show(); 
				$('.image_err_fileformat2').show();
				$('#fileList6').hide();
                //oInput.value = "";
                return false;
            }
			
			$('.image_err_fileformat1').hide();
			$('.image_err_fileformat2').hide();
        }
	if (blnValid && imgvalidate==true) {
		
  var filename = $("#image6").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile6").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile6").text(filename.replace("C:\\fakepath\\", "")); 
  } 
$('.file6').hide();
        $('.remove_6').show();
        
	}
}





  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }
    
    
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			rules: {
                emailer_owner: "required",
				emailer_owner_bcc:{
					required: true,
					email:true,
				},
				emailer_title: "required",
			
				emailer_details:"required",
				
			},
                        errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
      
        $('.tab-content').show();
        
        var emailer_owner=$('#emailer_owner').val();
	var emailer_owner_bcc=$('#emailer_owner_bcc').val();

	var emailer_title=$('#emailer_title').val();
	var emailer_details=CKEDITOR.instances.emailer_details.getData();
	

 var formdata = new FormData(); 

	var image1=document.getElementById('image').files.length;
   if(image1>0){
		formdata.append("pdf1", document.getElementById('image').files[0]);
   }
   var image2=document.getElementById('image2').files.length;
   if(image2>0){
		formdata.append("pdf2", document.getElementById('image2').files[0]);
   }
   var image3=document.getElementById('image3').files.length;
   if(image3>0){
		formdata.append("pdf3", document.getElementById('image3').files[0]);
   } 
   var pdf1=document.getElementById('image4').files.length;
   if(pdf1>0){
		formdata.append("image1", document.getElementById('image4').files[0]);
   }
   var pdf2=document.getElementById('image5').files.length;
   if(pdf2>0){
		formdata.append("image2", document.getElementById('image5').files[0]);
   }
   
   var pdf3=document.getElementById('image6').files.length;
   if(pdf3>0){
		formdata.append("image3", document.getElementById('image6').files[0]);
   }


formdata.append('emailer_owner', emailer_owner);
formdata.append('emailer_owner_bcc', emailer_owner_bcc);
 formdata.append('emailer_title', emailer_title);
 formdata.append('emailer_details', emailer_details);
 formdata.append('project_id', <?=$project_select;?>);
 formdata.append('group_id', <?=$group_id;?>);
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
     url: '<?php echo base_url(); ?>emailer/addPostData/<?=$data1->id?>', 
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
        src         : '<?=base_url();?>emailer/editGuestlist/'+data,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
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
<?php 
if(!empty($data1->project_id)){
	$project=$data1->project_id;
}else{
	$project=$project;
}
?>



<script>
$('body').on('click', '#close-btnEmailStep1Edit', function () {
            $.fancybox.close();
             
            
           window.location.href = "<?php echo base_url(); ?>emailer/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/EDIT/1";
            
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
        src         : "<?php echo base_url(); ?>emailer/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
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
	.ui-datepicker-current{
		display:none;
	}
</style>
