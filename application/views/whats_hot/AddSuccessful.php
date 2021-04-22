<style>
.fancybox-close-small{
	display:none!important;
}
.zone-label {
    font-weight: 600;
    font-size: 12px;
}
</style>
<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">
 
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2>WHAT’S HOT (<?=$action?>) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b>  THIS WHAT’S HOT HAS BEEN <?=$action?>ED.</p>
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
					<h5>ALL WHAT’S HOT DETAILS THAT WERE ENTERED ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                         
                    <div class="zone-info project-reg-sucess">
					
					<div class="col-md-12">
					<div class="row" id="printJS-form-post-addsuccessfull">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="col-md-3"></div>
					<div class="col-md-9">
                        <h3> WHAT’S HOT CREATION INFO </h3>  				
                        <form>
                            

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WHAT’S HOT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->whatshot_id;?></div>
                                </div>
                            </div>
							
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE &amp; TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_date_time;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_ip_address;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_xmanage_id;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_username;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE &amp; TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_date_time;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_ip_address;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_xmanage_id;?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_username;?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> WHAT’S HOT INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT POSTED DATE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->whatshot_posted_date;?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->whatshot_type ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT BUTTON URL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?=$data1->whatshot_btnurl?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT REMARKS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->whatshot_remarks?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT TITLE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->whatshot_title?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT DETAILS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->whatshot_desc?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT IMAGE / VIDEO SIZE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->file_name?>,<?=$data1->file_size?>MB (<?=$data1->file_type?>)</div>
                                </div>
                            </div>
							
							

							
							
							
							 <h3 class="m-t4">WHAT’S HOT SLOT ASSIGNMENT INFO</h3>  
							<?php 
							$AllSlot=$this->whatshot_model->FetchSlotsDataById($data1->id);
								 $All_slot='';
								if(!empty($AllSlot)){
									$assign_slot='YES';
									foreach($AllSlot as $slot){
										$All_slot .='SLOT '.$slot->slot_id.'</br>';
									}
								}else{
									$assign_slot='NO';
								}
							?>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT ASSIGNED</label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?php echo $assign_slot;?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WHAT’S HOT ASSIGNED TO SLOT</label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?php echo $All_slot;?>
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
							   <?php if($action=='ASSIGN' || $action=='REMOVE'){?>
									<li ><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				
				<li class="active"><a data-toggle="tab" href="#menu1" id="assign">ASSIGN ENTRIES</a></li>
							   <?php }else{?>
								<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				
				<li><a data-toggle="tab" href="#menu1" id="assign">ASSIGN ENTRIES</a></li>
							   <?php }?>
				
				
                            </ul>
                            <div class="table_info floor-step">
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;">WHAT’S HOT(<?=$action;?>)</span></p>
                                <?php if($action=='ASSIGN' || $action=='REMOVE'){?>
							   <p>WHAT’S NEXT</p>
							   <?php }else{?>
									<p>WHAT’S NEXT</p>
                               <p>TO ASSIGN THIS ENTRY TO SLOTS,
CLICK ASSIGN ENTRIES.</p>
							   <?php }?>
							   
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-post-addsuccessfull', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="toHome">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  


    </div>

<script>
 $(document).ready(function(){
	
	$("body").on('click','#assign',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto', 
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/assign",
        ajax: { 
           settings: { data : 'project=<?=$data1->project_id;?>', type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
            
        });
		<?php if(!empty($action=='ASSIGN')){?>
			$("body").on('click','#toHome',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto', 
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/assign",
        ajax: { 
           settings: { data : 'project=<?=$data1->project_id;?>', type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
            
        });
		<?php }else{?>
		
			$("body").on('click','#toHome',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto', 
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/index",
        ajax: { 
           settings: { data : 'project=<?=$data1->project_id;?>', type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
            
        });
		<?php }?>
		
	
	

	 $("body").on('click','#btn5',function(){
	 $.fancybox.getInstance('close');
	 });
 });
</script>