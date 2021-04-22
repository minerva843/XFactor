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
 <form method="POST"  class="register-form_1" id="register-form2899989" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUESTS (<?php echo $action; ?>) </h2>
                    
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
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3>GUEST COMPANY & WORK INFO</h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2">				
  
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
							<div class="col-sm-5">
								<input type="text" maxlength="100" name="company_name" value="<?php if(!empty($data1->company) && $data1->company!='NIL'){ echo $data1->company;} ?>" placeholder="ENTER COMPANY NAME" id="company_name">

							</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY ADDRESS</label>
							<div class="col-sm-5">
								
								<textarea rows="3" cols="50" value="" maxlength="150" id="company_address" class="company_address" name="company_address" placeholder="ENTER COMPANY ADDRESS"><?php if(!empty($data1->company_address) && $data1->company_address!='NIL'){ echo $data1->company_address;} ?></textarea> 

							</div>	
						</div>
					
						<div class="form-group row">
								<label for="colFormLabelLg" class="col-sm-4 col-form-label">company postal code</label>
								<div class="col-sm-3" style="padding-left:0px;">
								<select name="country" id="country" class="country">
									<option value="">select a country</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['name'];?>" <?php if($data1->country==$row['name']){echo 'selected';} ?>  ><?php echo $row['name'];?></option>
									<?php }?> 
								</select>
							</div>
							<div class="col-sm-2" style="padding-left:0px;">
								<input type="text" name="pincode" maxlength="8" class="pincode" value="<?php if(!empty($data1->pincode) && $data1->pincode!='NIL'){ echo $data1->pincode;} ?>" class="form-control" id="pincode" placeholder="Enter Postal code">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
							<div class="col-sm-5">
								<input type="text" maxlength="50" name="designation" value="<?php if(!empty($data1->designation) && $data1->designation!='NIL'){ echo $data1->designation;} ?>" placeholder="ENTER DESIGNATION" id="designation">

							</div>	
						</div>
					
						
						
                    </div>
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a id="guestlistupload3" data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								<!--<li class=""><a data-toggle="tab" href="#menu1">ASSIGN GUESTS</a></li>-->
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?php echo $data1->first_name; ?>
                                </div>
								<div class="display-step-status">
								<h5>STEP 3 OF <?php if($no_reg==1){echo '3';}else{echo '3';} ?></h5>
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
								<a href="#" class="action-btn backbtn" name="back" id="step3backbtn">BACK</a>
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
			
      $("body").on('click','#guestlistupload3',function(){
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
 
        
        
      $("body").on('click','#step3backbtn',function(){
          
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addstep2/<?php echo $id; ?>',
        ajax: { 
           settings: { data : 'id=<?=$id;?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });
            
        });
        
        
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();
            
            
             window.location.href = "<?php echo base_url(); ?>guest/deleteJunkRecord/<?php echo $id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/<?php echo $action; ?>/3";

});


 $.validator.setDefaults({
	    submitHandler: function(){


var formdata = new FormData();
var url="<?php echo base_url();?>guest/addstep3Post"; 
var project_id='<?=$project_select;?>';
var id='<?=$id;?>';
var no_reg = '<?=$no_reg;?>';
 formdata.append('company_name', $('#company_name').val());
 formdata.append('company_address', $('#company_address').val());
 formdata.append('country', $('#country').val());
 formdata.append('pincode', $('#pincode').val());
 formdata.append('designation', $('#designation').val());
 formdata.append('id', id);
 formdata.append('no_reg',no_reg);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
	
	var data=$.trim(data);
	if (data) {             
      $.fancybox.getInstance('close');
      
      
      <?php if($no_reg){ ?>
      
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
      
      <?php }else{ ?>
      
      
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addstep4',
        ajax: { 
           settings: { data : 'id='+data+'&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
      
      
      <?php }  ?>
      

        
        
        
        
        
        
                             
			}
		}
	});

        
		}
	});

 
	$("#register-form2899989").validate({
		rules: {
				company_name: "required",
				company_address: "required",
				country: "required",
				phone: {
                                      required: true,
                                      number: true,
                                      maxlength: 8,
                                 },
				designation: "required"

		},
		errorPlacement: function(){
                               return false;
                         } 
		
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
