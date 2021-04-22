
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone);  ?>  
                    <h2>ZONES (DELETE) </h2>
                   <p style="color:red">DELETE MEANS ALL SELECTED ZONES AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
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
					<h5> ALL SELECTED ZONES TO BE DELETED ARE LISTED BELOW :</h5>
					</div>  
                    
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
					<?php foreach($zone as $data){?> 
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					
                        <h3> ZONE CREATION INFO </h3>
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['group_name']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['group_status']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['projectxmid']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['fpid']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['ctreated_id_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['created_username']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['zone']['last_edited_date_time'])){ echo $data['zone']['last_edited_date_time']; }else{ echo $last_edited_date_time= "NIL";  }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['zone']['last_edited_ip_address'])){ echo $data['zone']['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['zone']['last_edited_xmanage_id'])){ echo $data['zone']['last_edited_xmanage_id']; }else{ echo $last_edited_xmanage_id= "NIL";  }?></div>
                                </div>
                            </div>
							
			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED User Name </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['zone']['last_edited_username'])){ echo $data['zone']['last_edited_username']; }else{ echo $last_edited_username= "NIL";  }?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> ZONE INFO </h3>  

                          <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['zone_type']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE NAME / DESCRIPTION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['zone']['zone_name']?></div>
                                </div>
                            </div>
							
							
							
					

                            <h3 class="m-t4"> ZONE ASSIGNMENT INFO</h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ASSIGNMENT</label>
                                <div class="col-sm-8">
                                   
                                    <div class="zone-label">  <?php if(!empty($data['grids'])){echo $data['grids'];}else{echo 'NIL';} ?> </div>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET FOR ZONE</label>
                                <div class="col-sm-8">
                                   
                                    <div class="zone-label">  NIL</div>
                                </div>
                            </div>   
							<h3 class="m-t4"> FLOOR PLAN INFO</h3> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['project_name']?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['floor_plan_name']?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['file_name']?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN DROP IN POINT   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php $floor_plan_drop_point=explode(',',$data['zone']['floor_plan_drop_point']);
							echo $drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];?></div>
                                </div>
                            </div> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE NAME   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['file_name'].$data['zone']['file_type']?>
									</div>
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE TYPE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['file_type']?>
									</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN FILE SIZE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['zone']['file_size']?>KB
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
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if(count($zone)>1){ echo "MULTIPLE ZONES"; }else{ echo $zone[0]['zone']['zone_name']; }?> </span></p>
								<br>
                                
                                   
                                <div class="tab-content sucess-tab-page">
								    <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600 !important;">DELETE</span>, CLICK BACK.</b></p><br/>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600 !important;">DELETE </span> THE SELECTED ZONES?</b></p>
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5deleteallzone" >Back</a>
                                <input type="button" value="DELETE" class="action-btn" name="submit" id="btn555delsucess345">
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

        $("body").on('click','#btn5deleteallzone',function(){
          
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
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
            
            
            
            
            
        });
		
		
		$("body").on('click','#btn555delsucess345',function(){


$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
  
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>zone/deleteSelectedZoneSuccess",
        ajax: { 
           settings: { data : 'ids='+strids+'&project='+'<?php echo $project_select; ?>', type : 'POST' }
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
