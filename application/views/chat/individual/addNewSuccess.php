
<div class="main-section" id="add-floor"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WORKSHOP (<?php echo $action; ?>) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>.</b> THIS WORKSHOP HAS BEEN <?php echo $action; ?>ED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>     
        </div>	      

        <div class="middle-body register-form zone-sucess">
            <div class="row">
			
                <div class="col-md-9">
					
				<div class="row">
					<div class="header-title">
	            <div class="leftbox-top">
					<h5> ALL WORKSHOP DETAILS ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
					
                    
                    <div class="zone-info">
					<div class="col-md-12" id="printJS-form-ichat-add">
					<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" type="text/css">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
                        <h3 class="zone-main-title"> WORKSHOP CREATION INFO </h3>  				
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->group_name; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->group_status; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->proj_id; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> WORKSHOP ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->workshop_xm_id; ?></div>
                                </div>
                            </div>


                        

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->created_date_time; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->ctreated_id_address; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->created_xmanage_id; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->created_username; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->last_edited_date_time; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->last_edited_id_address; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->last_edited_xmanage_id; ?></div>
                                </div>
                            </div>

                            
                                 <h3 class="m-t4">WORKSHOP INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> WORKSHOP NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->workshop_name; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> WORKSHOP LOCATION   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->location; ?></div>
                                </div>
                            </div>  

                          			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP INSTRUCTIONS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?php echo $workshop->instructions; ?>
				     </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP START DATE & TIME: </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->startdatetime; ?></div>
                                </div>
                            </div> 
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> WORKSHOP END DATE & TIME:     </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $workshop->enddatetime; ?></div>
                                </div>
                                </div>
                            </div> 
							
				

							 
							
							 
                            
                            
                            
                            

                        </form>
					</div>	
                    </div> 
				</div>
				</div>
                 
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	      
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                              <!--  <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
								<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								 
                            </ul>
                            <div class="table_info floor-step">
							<p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" > <?php echo $workshop->workshop_name; ?></span></p>
							<div class="display-step-status">
                                <!-- <h5>STEP 1 OF 1</h5> -->
                                 
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content sucess-tab-page">
                                </div>
								</div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="window.print()" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn22222278">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 


    </div>

</div>
<script>
    $(document).ready(function () {
       $("body").on('click','#btn22222278',function(){
       $.fancybox.getInstance('close');
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>workshop/showall",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
               
        });
    });



</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>
