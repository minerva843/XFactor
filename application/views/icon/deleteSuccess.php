
<div class="main-section"> 
    <div class="container">
      
        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>INFO ICONS (CLEAR INFO ICON DATA) <span class="sucess">SUCCESSFUL</span></h2>
                   <p style="color:red">CLEAR INFO ICON DATA MEANS ALL DATA FOR SELECTED INFO ICONS CANNOT BE RETRIEVED IN FUTURE</p>
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
					<h5> ALL SELECTED INFO ICONS DATA TO BE CLEARED ARE LISTED BELOW :</h5>
					</div>  
                    
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form-icon-delete">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
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


      <!--                          <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN GRID TYPE    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($data['floor_plan_grid_type']==1){ echo $grid= '16 x 9'; }elseif($data['floor_plan_grid_type'] ==2){ echo $grid= '32 x 18'; }elseif($data['floor_plan_grid_type']==3){ echo $grid= '48 x 27'; }?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN DROP IN POINT   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php $floor_plan_drop_point=explode(',',$data['floor_plan_drop_point']);
							echo $drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];?></div>
                                </div>
                            </div> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR FILE NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['file_name']?>
									</div>
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE TYPE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['file_type']?>
									</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE SIZE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['file_size']?>KB
									</div>
                                </div>
                            </div>
							
	-->						

                            <h3 class="m-t4"> POSTS ASSIGNMENT INFO </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ASSIGNED POST NAMES</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['each_square'])){
                                    
                                    echo $data['each_square'];
                                    } ?>  </div>
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
                                
                                <p style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >ALL INFO ICONS</span></p>
								<br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600;">CLEAR ALL INFO ICON DATA</span>, CLICK BACK.</b></p>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600;">CLEAR ALL INFO ICON DATA</span>?</b></p>

                                
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn555btnallassigndeletesuccess">
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


        $("body").on('click','#btn555btnallassigndeletesuccess',function(){
          
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

//	 $("body").on('click','#btn555',function(){ 
//          
//           $.fancybox.getInstance('close');
//            $.fancybox.open({
//                src: '<?=base_url();?>floor/floordeleteAll',
//                type: 'ajax',
//                ajax: {
//                    settings: {data: 'ABC', type: 'POST'}
//                },
//                opts: {
//                    afterShow: function (instance, current) {
//                        console.info('done!');
//                    },
//                     touch: false
//                }
//            });
//            
//        });
</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>
