
<div class="main-section" id="add-floor"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>TAKE A LOOK AROUND, CONTENT SET (ADD) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> THIS CONTENT SET HAS BEEN ADDED.</p>
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
					<h5> ALL CONTENT SET DETAILS THAT ARE LISTED BELOW  :</h5>
					</div> 
					</div>
					</div>	
					
                    
                    <div class="zone-info">
					<div class="row" id="printJS-form-contentset-add">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> CONTENT SET CREATION INFO </h3>  				
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['group_name']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['group_status']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['projectxmid']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['fpid']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['zone_id']?></div>
                                </div>
                            </div>
							
							 <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['x_content_id']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['ctreated_id_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['created_username']?></div>
                                </div>
                            </div>

                            


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['last_edited_date_time']?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['last_edited_ip_address']?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['last_edited_xmanage_id']?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['last_edited_username']?></div>
                                </div>
                            </div>

                           
                            <h3 class="m-t4"> CONTENT SET INFO </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$videos[0]['content_set_name']?></div>
                                </div>
                            </div>  
							
							 <h3 class="m-t4"> CONTENT SET ASSIGNMENT INFO </h3> 
							 
							 <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ASSIGNED ZONE NAMES   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">NIL </div>
                                </div>
                            </div>
							
							 <h3 class="m-t4"> CONTENT SET VIDEO / IMAGE CONTENT INFO </h3> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">VIDEO FILE COUNT    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=count($videos);?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">VIDEO FILES & SIZE </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<table>
										
											<tr>
												<td></td>
												<td>
												<?php foreach($videos as $video){?>
												<tr>
													<td>
														<?php echo $video['file_name'].', '.round(($video['file_size']/1024)/1024,2). 'MB';?>
													</td>
												</tr>
												<?php }?>
												</td>
											</tr>
										
									</table>
									</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">IMAGE FILE COUNT</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=count($images);?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">IMAGE FILE & SIZE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $images[0]['file_name'].', '.round(($images[0]['file_size']/1024)/1024,2).' MB';?></div>
                                </div>
                            </div>
                        </form>      
						<!--div class="divide-border">
						<hr>
						</div-->
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
				<li class=""><a data-toggle="tab" id="assign_contentaddsuccess"  href="#menu1">ASSIGN CONTENT</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                <!-- <h5>STEP 1 OF 1</h5> -->
                                <p> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >CONTENT SET (ADD)</span></p>
                                <h4 style="font-weight: 900;" >WHAT`S NEXT.</h4>
                                <p>TO ASSIGN THIS CONTENT SET TO ZONES, CLICK ASSIGN CONTENT.</p>

                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-contentset-add', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn5donecontent">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  


    </div>

</div>
<script>
    $(document).ready(function () {



  	$("body").on('click','#assign_contentaddsuccess',function(){
          
    
      $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>content/assignContentSetZone',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           

            
});
 


        $("body").on('click','#btn5donecontent',function(){
          
           $.fancybox.getInstance('close');
		
		
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>Content/showAllData",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
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
