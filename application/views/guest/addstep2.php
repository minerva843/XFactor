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
 <form method="POST" class="register-form_1" id="register-form2999" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUESTS (<?php echo $action; ?>) </h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnstep2"></div>
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
					<h3> GUEST CONTACT INFO</h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2">				
  
						
					
						 
						
					
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DID</label>
							<div class="col-sm-5">
								<input type="text" maxlength="12" name="did" value="<?php if(!empty($data1->did) && $data1->did!='NIL'){ echo $data1->did;} ?>" placeholder="ENTER DID " id="did" />
								<p class="file-extan">(OPTIONAL)</p>
							</div>	
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">TEL</label>
							<div class="col-sm-5">
								<input type="text" maxlength="12"  name="tel" value="<?php if(!empty($data1->tel) && $data1->tel!='NIL'){ echo $data1->tel; } ?>" placeholder="ENTER TEL" id="tel" />
								<p class="file-extan">(OPTIONAL)</p>
							</div>	
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EXTENSION</label>
							<div class="col-sm-5">
								<input type="text" maxlength="10" name="extension" value="<?php if(!empty($data1->extension) && $data1->extension!='NIL'){ echo $data1->extension; } ?>" placeholder="ENTER EXTENSION " id="extension" />
								<p class="file-extan">(OPTIONAL)</p>
							</div>	
						</div>
						
						
						
						
                    </div>
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a id="guestlistupload2" class="cnone" data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								<!--<li class=""><a data-toggle="tab" href="#menu1">ASSIGN GUESTS</a></li>-->
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> <?php echo $data1->first_name; ?>
                                </div>
								<div class="display-step-status">
								<h5>STEP 2 OF <?php if($no_reg==1){echo '3';}else{echo '3';} ?></h5>
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
								<a href="#" class="action-btn backbtn" name="back" id="btn5">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5submitstep2">
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
			
			


      $("body").on('click','#guestlistupload2',function(){

          
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
			
			
				
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addstep1/<?php echo $id; ?>',
        ajax: { 
           settings: { data : 'id=<?=$id;?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });
            
        }); 
	
$('body').on('click', '#close-btnstep2', function () {
            $.fancybox.close(); 
            window.location.href = "<?php echo base_url(); ?>guest/deleteJunkRecord/<?php echo $id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/<?php echo $action; ?>/2";

});


 $.validator.setDefaults({
	    submitHandler: function(){
var formdata = new FormData();
var url="<?php echo base_url();?>guest/addstep2Post"; 
var id='<?=$id;?>';

 formdata.append('did', $('#did').val());
 formdata.append('tel', $('#tel').val());
 formdata.append('extension', $('#extension').val());
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
			
			var data=$.trim(data);
			if (data){
                            
      $.fancybox.getInstance('close'); 
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>guest/addstep3',
        ajax: { 
           settings: { data : 'id='+data+'&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
                             
			}else{
			
			
			alert("Something went wrong . Please refresh and try again.");
			
			
			
			}
		}
	});

        
		}
	});

 
	$("#register-form2999").validate({
		rules: {
				email: "required",
				country_code: "required",
				mobile: "required",
				tel:{ 
						digits:true
				},
				did:{
						digits:true
				},
				extension:{ 
						digits:true
				},

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
