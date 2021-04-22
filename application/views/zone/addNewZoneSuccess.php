
<div class="main-section" id="add-floor"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone);  ?>  
                    <h2>ZONES (<?php echo $action; ?>) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> THIS ZONE HAS BEEN <?php echo $action; ?>ED.</p>
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
					<h5> ALL ZONE DETAILS ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
					
                    
                    <div class="zone-info">
					<div class="col-md-12" id="printJS-form-zone-add">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
                        <h3 class="zone-main-title"> ZONE CREATION INFO </h3>  				
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->group_name; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->group_status; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->proj_id; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->flor_plan_id; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->zone_id; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->created_date_time; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->ctreated_id_address; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->created_xmanage_id; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->created_username; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->last_edited_date_time; ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->last_edited_id_address; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->last_edited_xmanage_id; ?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> ZONE INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE TYPE </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->zone_type; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE NAME / DESCRIPTION    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->zone_name; ?></div>
                                </div>
                            </div>  

                            <h3 class="m-t4"> ZONE ASSIGNMENT INFO </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ASSIGNMENT </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $grids; ?></div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET FOR ZONE</label>
                                <div class="col-sm-8">
                                   
                                    <div class="zone-label">  NIL</div>
                                </div>
                            </div> 
                            
                            
                                 <h3 class="m-t4">FLOOR PLAN INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->project_name; ?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->floor_plan_name; ?></div>
                                </div>
                            </div>  

                          			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR FILE NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?php echo $zone->file_name; ?>
									</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN GRID TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $zone->file_name; ?></div>
                                </div>
                            </div> 
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN DROP IN POINT   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php $floor_plan_drop_point=explode(',',$zone->floor_plan_drop_point);
							echo $drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];?></div>
                                </div>
                            </div> 
							
				

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE TYPE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
								<?php echo $zone->file_type; ?>										</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE SIZE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
								<?php echo $zone->file_size; ?>	KB
									</div>
                                </div>
                            </div>
                            
                            
                            
                            

                        </form>
					</div>	
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
								<li class=""><a data-toggle="tab" href="#menu1">ASSIGN ZONES</a></li>
                            </ul>
                            <div class="table_info floor-step">
							<p> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >ZONES (<?php echo $action; ?>)</span></p>
							<div class="display-step-status">
                                <!-- <h5>STEP 1 OF 1</h5> -->
                                <h5 style="font-weight: 900;" >WHAT`S NEXT.</h5>
                                <p>TO ASSIGN THIS ZONE TO GRIDS ON THE FLOOR PLAN, CLICK ASSIGN ZONES</p>

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
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-zone-add', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn222222">
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


        $("body").on('click','#btn222222',function(){
          
     //     window.location.reload();
           $.fancybox.getInstance('close');
           
           
           
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>zone/showallzones",
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
