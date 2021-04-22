<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>workshop/processAddStep3/<?php echo $workshop_id; ?>" method="POST" id="addWorkshopstep3">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WORKSHOPS (<?php echo $action; ?>)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"  id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">   
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					 
 
                    <div class="zone-info">
                        <h3>WORKSHOP INFO</h3>  				
                        

                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP SCREEN 1 REMARKS</label>
                                <div class="col-sm-5">
                                    
                                     <input type="text" name="screenremarks1"    value="<?php echo $workshop->screenremarks1; ?>" class="form-control" id="screenremarks1" placeholder="ENTER SCREEN REMARKS 1">
                                    

                                </div>
                            </div>
                            
                            
                                                        <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WORKSHOP SCREEN 1 URL</label>
                                <div class="col-sm-5">
                                   
                                    <input type="text" placeholder="ENTER WORKSHOP SCREEN URL 1"  name="screenurl1" id="screenurl1" value="<?php echo $workshop->screenurl1;  ?>" />
 
                                     
                                </div>
                            </div>
                            
                            

                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">WORKSHOP SCREEN 2 REMARKS</label>
                                <div class="col-sm-5">
                                    <input type="text" name="screenremarks2"  value="<?php echo $workshop->screenremarks2; ?>" class="form-control" id="screenremarks2" placeholder="ENTER WORKSHOP SCREEN REMARKS 2">
                                </div>
                            </div>

                            

                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP SCREEN 2 URL</label>
                                <div class="col-sm-5">
                                   <input type="text" name="screenurl2"   value="<?php echo $workshop->screenurl2; ?>" class="form-control" id="screenurl2" placeholder="ENTER WORKSHOP SCREEN URL 2"> 
                                    
                                </div>
                            </div>




                             <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">WORKSHOP SCREEN 3 REMARKS</label>
                                <div class="col-sm-5">
                                    <input type="text" name="screenremarks3"   value="<?php echo $workshop->screenremarks3; ?>" class="form-control" id="screenremarks3" placeholder="ENTER WORKSHOP SCREEN REMARKS 3">
                                </div>
                            </div>

                            
                            
                            
                             <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">WORKSHOP SCREEN 3 URL</label>
                                <div class="col-sm-5">
                                    <input type="text" name="screenurl3"   value="<?php echo $workshop->screenurl3; ?>" class="form-control" id="screenurl3" placeholder="ENTER WORKSHOP SCREEN URL 3">
                                </div>
                            </div>
                            

                            

                       
                    </div>  
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content add-zone-1">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                     <!--            <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li>  -->
				               <li class=""><a data-toggle="tab" class="cnone" href="#">INDIVIDUAL CHAT</a></li>
				                <li class="active"><a data-toggle="tab" href="#menu2">GROUP CHAT</a></li>
				                <li class=""><a data-toggle="tab" class="cnone" href="#"> CHAT LOGS</a></li>
				                
                            </ul>  
                            <div class="table_info floor-step">
							
                                 <div class="current-status">
                                <p class="zonee" style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED : </span>  
							
								     <span style="color:black; font-size: 14px !important;" >
								      <?php echo $workshop->workshop_name; ?></span>			</p>
                                 </div>
								 <div class="display-step-status">
								 <h5>STEP 3 OF 3</h5>
								 
								 <?php if($action=='ADD'){ ?>
									 
									<p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
								<?php  }else{ ?>
									 
								<p>EDIT THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
									 
								 <?php } ?>
								 
                       
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5allstep3back2" >Back</a>
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

 </form>
    </div>

</div>


<script>

    $(document).ready(function () {

    
	 $("body").on('click','#btn5allstep3back2',function(){
           
       $.fancybox.getInstance('close');
 
        
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>workshop/guestList/<?php echo $workshopid; ?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&workshopid=<?php echo $workshop_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        });
        
  
        });
        
        
                $("body").on('click','#openindivisualchatfrmgrp3',function(){
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/individual_all",
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
               window.location.href = "<?php echo base_url(); ?>chat/deleteJunkRecord/<?php echo $groupchatid; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/<?php echo $action; ?>/3";

        });
        
     $.validator.setDefaults({
	    submitHandler: function() {             
            var form = $("#addWorkshopstep3");
            var url = form.attr('action');
            let screenurl1 = $("#screenurl1").val();
            let screenurl2 = $("#screenurl2").val();
            let screenurl3 = $("#screenurl3").val();
            let screenremarks1 = $("#screenremarks1").val();
            let screenremarks2 = $("#screenremarks2").val();
            let screenremarks3 = $("#screenremarks3").val();
            
            let project_id = '<?php echo $project_select; ?>';
            $.ajax({
             type: "POST",
             url: url,
             data:   {project_id: project_id,screenurl1: screenurl1,screenurl2:screenurl2,screenurl3:screenurl3,screenremarks1:screenremarks1,screenremarks2:screenremarks2,screenremarks3:screenremarks3}, 
                success: function (data)
                {
                    
                    let action = '<?php echo $action;  ?>';
                    $.fancybox.getInstance('close');
                   
                    if (parseInt(data) >= 1) {

        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>workshop/addNewSuccess/<?php echo $workshop_id; ?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
                    


                    } else {

                     
                        
                        alert("Something went wrong");
                    }
                }
            });
                   
		}
	});
        
        
        $("#addWorkshopstep3").validate({
			rules: {
				screenurl1: {
				required: true,
                               url: true,
                               normalizer: function( value ) {
                               var url = value;
 
                               // Check if it doesn't start with http:// or https:// or ftp://
                               if ( url && url.substr( 0, 7 ) !== "http://"
                               && url.substr( 0, 8 ) !== "https://"
                               && url.substr( 0, 6 ) !== "ftp://" ) {
                               // then prefix with http://
                               url = "http://" + url;
                              }
 
                             // Return the new url
                             return url;
                              }
			
				},
				screenurl2: {
				
				required: true,
                               url: true,
                               normalizer: function( value ) {
                               var url = value;
 
                               // Check if it doesn't start with http:// or https:// or ftp://
                               if ( url && url.substr( 0, 7 ) !== "http://"
                               && url.substr( 0, 8 ) !== "https://"
                               && url.substr( 0, 6 ) !== "ftp://" ) {
                               // then prefix with http://
                               url = "http://" + url;
                              }
 
                             // Return the new url
                             return url;
                              }
				
				},
                               screenurl3: {
                               
                               required: true,
                               url: true,
                               normalizer: function( value ) {
                               var url = value;
 
                               // Check if it doesn't start with http:// or https:// or ftp://
                               if ( url && url.substr( 0, 7 ) !== "http://"
                               && url.substr( 0, 8 ) !== "https://"
                               && url.substr( 0, 6 ) !== "ftp://" ) {
                               // then prefix with http://
                               url = "http://" + url;
                              }
 
                             // Return the new url
                             return url;
                              }
                               
                               
                               },
                               screenremarks1:{
                               required: true,
                               maxlength: 40
                               },
                               screenremarks2:{
                               required: true,
                               maxlength: 40
                               },
                               screenremarks3:{
                               required: true,
                               maxlength: 40
                               },
                               
			},
                        errorPlacement: function(){
                               return false;
                         }
//			messages: {
//				project_name: "ENSURE THAT A PROJECT IS SELECTED.",
//				floor_plan: "ENSURE THAT A FLOOR PLAN IS FILLED IN.",
//                                zone_type: "ENSURE THAT A FLOOR PLAN IS FILLED IN.",
//                                description:"ENSURE THAT ZONE NAME / ZONE DESCRIPTION IS FILLED IN."
//			}
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
