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
 <form method="POST"  class="register-form_1" id="register-form2899989899" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUEST REGISTRATION PAGE ADDITIONAL INFO (<?php echo $action; ?>)  </h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnstep4guest"></div>
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
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3>GUEST MISC INFO</h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2">				
	
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?php
	if(!empty($DataField->remark_1)){
	echo strtoupper($DataField->remark_1); }else{ echo 'REMARKS 01'; }?></label>
							<div class="col-sm-5 p-t5">
							<?php
	if(!empty($DataField->remark_1)){?>
								<input type="text" value="<?php if(!empty($data1->remark_1) && $data1->remark_1!=''){ echo $data1->remark_1;} ?>"  name="remarks1" value="" placeholder="ENTER <?php
	if(!empty($DataField->remark_1)){
	echo strtoupper($DataField->remark_1); }else{ echo 'REMARKS 01 / FIELD NAME'; }?>" id="remarks1">
	
	<?php }else{ echo'NOT APPLICABLE'; }
		?>
	
	

							</div>	
						</div>
	
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?php
	if(!empty($DataField->remark_2)){
	echo strtoupper($DataField->remark_2); }else{ echo 'REMARKS 02'; }?></label>
							<div class="col-sm-5 p-t5">
							<?php
	if(!empty($DataField->remark_2)){?>
								<input type="text"  value="<?php if(!empty($data1->remark_2) && $data1->remark_2!=''){ echo $data1->remark_2;} ?>"  name="remarks2" value="" placeholder="ENTER <?php
	if(!empty($DataField->remark_2)){
	echo strtoupper($DataField->remark_2); }else{ echo 'REMARKS 02 / FIELD NAME'; }?>" id="remarks2">
	<?php }else{ echo'NOT APPLICABLE'; }
		?>
						</div>
						</div>
	
						<div class="form-group row">
								<label for="colFormLabelLg" class="col-sm-4 col-form-label"><?php
	if(!empty($DataField->remark_3)){
	echo strtoupper($DataField->remark_3); }else{ echo 'REMARKS 03'; }?></label>
								<div class="col-sm-5 p-t5">
								<?php
	if(!empty($DataField->remark_3)){?>
								<input type="text"  value="<?php if(!empty($data1->remark_3) && $data1->remark_3!=''){ echo $data1->remark_3;} ?>"  name="remarks3" value="" placeholder="ENTER <?php
	if(!empty($DataField->remark_3)){
	echo strtoupper($DataField->remark_3); }else{ echo 'REMARKS 03 / FIELD NAME'; }?>" id="remarks3"> 
	<?php }else{ echo'NOT APPLICABLE'; }
		?>
						</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?php
	if(!empty($DataField->remark_4)){
	echo strtoupper($DataField->remark_4); }else{ echo 'REMARKS 04 '; }?></label>
							<div class="col-sm-5 p-t5">
							<?php
	if(!empty($DataField->remark_4)){?>
								<input type="text" value="<?php if(!empty($data1->remark_4) && $data1->remark_4!=''){ echo $data1->remark_4;} ?>"  maxlength="50" name="remarks4" value="" placeholder="ENTER <?php
	if(!empty($DataField->remark_4)){
	echo strtoupper($DataField->remark_4); }else{ echo 'REMARKS 04 / FIELD NAME'; }?>" id="remarks4">
<?php }else{ echo'NOT APPLICABLE'; }
		?>
							</div>	
						</div>
						
						<div class="form-group row"> 
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?php
	if(!empty($DataField->remark_5)){
	echo strtoupper($DataField->remark_5); }else{ echo 'REMARKS 05'; }?></label>
							<div class="col-sm-5 p-t5">
							<?php
	if(!empty($DataField->remark_5)){?>
								<input type="text" value="<?php if(!empty($data1->remark_5) && $data1->remark_5!=''){ echo $data1->remark_5;} ?>"  maxlength="50" name="remarks5" value="" placeholder="ENTER <?php
	if(!empty($DataField->remark_5)){
	echo strtoupper($DataField->remark_5); }else{ echo 'REMARKS 05 / FIELD NAME'; }?>" id="remarks5">
<?php }else{ echo'NOT APPLICABLE'; }
		?>
							</div>    	
						</div>       
					
						
						
                    </div>
                      
                </div>    

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a id="guestlistupload4" data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?php echo $data1->first_name; ?>
                                </div>
								<div class="display-step-status">
								<h5>GUEST REGISTRATION PAGE ADDITIONAL INFO</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="step4backbtn">BACK</a>
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



 
 

<script>

$(document).ready(function(){
			
		
	
				
	      $("body").on('click','#guestlistupload4',function(){

          
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>file_upload/upload_guest_file',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        }); 
        });

		
		
				
       $("body").on('click','#step4backbtn',function(){
          
           $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addstep3/<?php echo $id; ?>',
        ajax: { 
           settings: { data : 'id=<?=$id;?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });
            
        });
	 
$('body').on('click', '#close-btnstep4guest', function () {
            $.fancybox.close();
            
            
             window.location.href = "<?php echo base_url(); ?>guest/deleteJunkRecord/<?php echo $id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/<?php echo $action; ?>/3";

});


 $.validator.setDefaults({
	    submitHandler: function(){


 var formdata = new FormData();
var url="<?php echo base_url();?>guest/addstep4Post"; 
var project_id='<?=$project_select;?>';
var id='<?=$id;?>';
var NIL='NIL';
if($('#remarks1').val() ==''){
	formdata.append('remarks1', NIL);
}else{
	formdata.append('remarks1', $('#remarks1').val());
}

if($('#remarks2').val() ==''){
	formdata.append('remarks2', NIL);
}else{
	formdata.append('remarks2', $('#remarks2').val());
}

if($('#remarks3').val() ==''){
	formdata.append('remarks3',NIL );
}else{
	formdata.append('remarks3', $('#remarks3').val());
}

if($('#remarks4').val() ==''){
	formdata.append('remarks4',NIL );
}else{
	formdata.append('remarks4', $('#remarks4').val());
}

if($('#remarks5').val() ==''){
	formdata.append('remarks5', NIL);
}else{
	formdata.append('remarks5', $('#remarks5').val());
}
 
 formdata.append('id', id);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
			//var GuestData = JSON.parse(data); 
			var data=$.trim(data);
			if (data) {
                            
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addGuestSuccess',
        ajax: { 
           settings: { data : 'id='+data+'&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
                             
			}
		}
	});

        
		}
	});

 
	$("#register-form2899989899").validate({
		rules: {
				remarks1: "required"

		},
		errorPlacement: function(){
                               return false;
                         } 
		
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
