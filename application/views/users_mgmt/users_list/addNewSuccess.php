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
                    <h2>USER LISTS (ADD)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">
 <P><b>ALL USER LIST DETAILS THAT WERE ENTERED ARE LISTED BELOW :</b></P> <br>
            <div class="row">
				   <div class="col-md-9">   
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					
                   
				   <div class="zone-info floor-planadds">				
 	
	                <div class="row add-guestspace">
					 
						<div class="col-md-3">&nbsp;</div>
					 <div class="col-md-9">
					
					<div class="add-guest-title" style="padding-left:0px;">
					<h3> USER LIST INFO</h3>      
					</div>  
						
						   
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">MASS UPLOAD FILE NAME</label>
							<div class="col-sm-5 col-xl-5 project-visual">
								
							<div class="file-upload guest-uplaod">
								<?php echo $filedata[0]['file_name'];?>   UPLOADED <?php //print_r($filedata);  ?>
								</div> 
								 
							</div>  
						</div>
						
						
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">FILE  TYPE</label>
							<div class="col-sm-5 col-xl-5 project-visual">
								
							<div class="file-upload guest-uplaod">
								  <?php echo $filedata[0]['file_type'];?> 
								</div> 
								 
							</div>  
						</div>
						
						
						
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">FILE SIZE</label>
							<div class="col-sm-5 col-xl-5 project-visual">
								
							<div class="file-upload guest-uplaod">
								   <?php echo ($filedata[0]['file_type']/1024);?> MB
								</div> 
								 
							</div>  
						</div>
						
						
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">NUMBER OF INSERTS</label>
							<div class="col-sm-5 col-xl-5 project-visual">
								
							<div class="file-upload guest-uplaod">
								    <?php echo $filedata[0]['total_inserts'];?>
								</div> 
								 
							</div>  
						</div>
						
						
						</div>
						</div>
					
                    </div>
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				             <li ><a data-toggle="tab" id="mainmenuguestlist888" href="#menu1">MAIN MENU</a></li>
				              <li class="active" id=""><a data-toggle="tab"  href="#menu2">USER LISTS</a></li>
                                             <li class="" id="usermana9999geassignmain6800"><a data-toggle="tab" href="#menu3">ASSIGN USERS</a></li>	
				                
				                
                            </ul>
                            <div class="table_info floor-step guest_upload">   
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> USER (ADD)
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF 1</h5>
                                 
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content"  >
                                
                                
                                
                                <div class="progress-bars">

						</div>
						
						
						
						<div class="progressbar mx-auto" data-value="0" id="progressbar">
         
		 
		  <h5>UPLOAD <span class="success">UPLOADED </span></h5>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="font-weight-bold" id="percentcount">100%<sup class="small"></sup></div> 
          </div>
		  <h5 id="fp"></h5>
</div>
                                
                                
                                
                                
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" style="display:none;" name="back" id="btn57f899hd09090">BACK</a>
								<input type="button" value="DONE" class="action-btn FloorSubmit" name="submit" id="btn5nextsuccessupload99">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 ??? <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>



 
 

<script>
$(document).ready(function(){
			
				
       $("body").on('click', '#mainmenuguestlist888', function() {
        $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/allUsersManage',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


         });
        
     
     
     
     				
	$("body").on('click','#btn5nextsuccessupload99',function(){
          
           $.fancybox.getInstance('close');
           
                   $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/usersListAll",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });

            
        });  
       
        
        
        
        
        
       $("body").on('click','#btn57f899hd09090',function(){
          
           $.fancybox.getInstance('close');
           
                   $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/showAllgroups",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });

            
        });
        
        
        
        
        
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

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
