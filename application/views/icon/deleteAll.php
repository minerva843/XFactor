
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>INFO ICONS (CLEAR<?php if($selected){ echo '';} else{ echo ' ALL';}?> ASSIGNMENT<?php if($selected){ echo '';} else{ echo 'S';}?>) </h2>
                   <p style="color:red">CLEAR <?php if($selected){ echo 'INFO';} else{ echo 'ALL';}?> ASSIGNMENT<?php if($selected){ echo '';} else{ echo 'S';}?> MEANS <?php if($selected){ echo 'ALL SELECTED';} else{ echo 'ALL';}?> INFO ICONS ASSIGNMENTS CANNOT BE RETRIEVED IN FUTURE.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
				<div class="leftbox-top">
					<h5> <?php if($selected){ echo 'ALL SELECTED';} else{ echo 'ALL';}?> INFO ICONS ASSIGNMENTS TO BE CLEARED ARE LISTED BELOW :</h5>
					</div>  
                    
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
					<?php foreach($data1 as $data){?>
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					
                        <h3> INFO ICON CREATION INFO </h3>
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label">CUSTOMER 01 GROUP</div>
                                </div>
                            </div>

                            <div class="form-group row mb-20">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">LIVE / SUSPENDED</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['project_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row mb-20">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['flor_plan_id']?></div>
                                </div>
                            </div>
                            
                            
                           <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> ZONE ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['xzone_id']?></div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['x_content_id']?></div>
                                </div>
                            </div>  
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">INFO ICON ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['info_icon_id']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['ctreated_id_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['ctreated_id_address']?></div>
                                </div>
                            </div>


                            <div class="form-group row mb-20">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_username']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_date_time'])){ echo $data['last_edited_date_time']; }else{ echo $last_edited_date_time= "NIL";  }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_id_address'])){ echo $data['last_edited_id_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_xmanage_id'])){ echo $data['last_edited_xmanage_id']; }else{ echo $last_edited_xmanage_id= "NIL";  }?></div>
                                </div>
                            </div>
							
			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED User Name </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_username'])){ echo $data['last_edited_username']; }else{ echo $last_edited_username= "NIL";  }?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> INFO ICON INFO</h3>  

                        <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">INFO ICON NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">INFO ICON <?=$data['info_icon_number']?></div>
                                </div>
                            </div>
                            
                            
                         <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ASSIGNED ZONE NAMES</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone_name']?></div>
                                </div>
                            </div>
                            
                            
                        <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">INFO ICON POSITION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['drag_position']?></div>
                                </div>
                            </div>


     

                            <h3 class="m-t4"> POSTS ASSIGNMENT INFO </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ASSIGNED POST NAMES</label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
                                    
                                    <?php if(!empty($data['each_square'])){
                                    
                                    echo $data['each_square'];
                                    } ?>
                                  
                                    
                                     </div>
                                </div>
                            </div>   

                        </form>
						</div>
						</div>
						<hr>
						<?php }?>
						
						
						</div>
                    </div>  
                </div>  
                           
                <div class="col-md-3 right-text master-floor-left ">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                             <li><a class="active" data-toggle="tab" href="#menu1">MAIN MENU</a></li>
							<li><a data-toggle="tab" href="#menu2" id="icon_assignment" >ALL ASSIGNMENTS</a></li>
							<li><a data-toggle="tab" href="#menu3">ASSIGN POST</a></li>
                                
				
                            </ul>    
                            <div class="table_info floor-step">
                                
                                <p style="color:#00b050!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;" >ALL INFO ICONS</span></p>
								<br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600 !important;">CLEAR <?php if($selected){ echo 'ASSIGNMENT';} else{ echo 'ALL INFO ICON DATA';}?></span>, CLICK BACK.</b></p>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600 !important;">CLEAR <?php if($selected){ echo 'ASSIGNMENT</span> FOR THE SELECTED INFO ICONS';} else{ echo 'ALL INFO ICON DATA</span>';}?>?</b></p> 
                                
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5deleteallback" >Back</a>
                                <input type="button" value="<?php echo $action; ?>" class="action-btn" name="submit" id="btn555btnallassigndelete">
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
function myFunction() {
  var x = document.getElementById("myFile");
  x.disabled = true;
}



<?php if(!empty($ids)){ ?>


$("body").on('click','#btn555btnallassigndelete',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
  
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>icon/deleteSuccess",
        ajax: { 
           settings: { data : 'ids='+strids+'&project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        		 clickSlide: false,
        clickOutside: false
    });
            
});

<?php }else{ ?>


$("body").on('click','#btn555btnallassigndelete',function(){


$.fancybox.getInstance('close');

  
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>icon/deleteSuccess",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        		 clickSlide: false,
        clickOutside: false
    });
            
});


<?php }  ?>



        $("body").on('click','#btn5deleteallback',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/allAssignments',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });  
            
        });


</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>
