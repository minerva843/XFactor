<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2>GUEST LISTS (DELETE<?php if($selected){echo '';}else{echo ' ALL';} ?>) <span class="sucess">SUCCESSFUL</span> </h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUEST LISTS HAVE BEEN DELETED.</p>
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
					<h5> <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUEST LISTS THAT ARE DELETED ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                    
                    <div class="zone-info project-reg-sucess">
					
		            <div class="col-md-12" id="printJS-form-guest-deleteall">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
 

 <?php  if(!empty($guests)){
 	foreach($guests as $guest){ 
	   
	?>
                                     
		            <div class="row">
					 
						<div class="col-md-3">&nbsp;</div>
					 <div class="col-md-9">
						<h3> GUEST LIST CREATION INFO </h3>  				
						<form>

						<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['group_name']; ?></div>
						</div>
						</div>   

						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS </label>
						<div class="col-sm-8">
						<div class="zone-label"> <?php echo $guest['group_status']; ?>
</div>
						</div>   
						</div>   
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label"> GUEST LIST ID  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['xguestfileid']; ?></div>
						</div>
						</div>
						
						 

						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['created_date_time']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['created_ip_address']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['created_xmanage_id']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['created_username']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['last_edited_date_time']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['last_edited_ip_address']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID   </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['last_edited_xmanage_id']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['last_edited_username']; ?></div>
						</div>
						</div>
						
						<h3 class="m-t4"> GUEST LIST INFO: </h3>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">MASS UPLOAD FILE NAME</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['file_name']; ?></div>
						</div>
						</div>
						
					 
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">FILE TYPE</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['file_type']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">FILE SIZE</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['file_size']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">NUMBER OF INSERTS</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['total_inserts']; ?></div>
						</div>
						</div>
				
						</form>

						</div>

  
                    </div>  <!--END-->
                    <hr>
                    
                     	<?php }
 
 } ?>


					</div> 
				</div>  
                </div>  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                               <!--  <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				<li class=""><a  id="gotomailguestlist2" data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				<li class="active"><a data-toggle="tab" href="#menu1">GUEST LIST</a></li>
				 
				
                            </ul>
                            <div class="table_info floor-step">
                               
                                
                                <p style="color:#00b050!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;font-weight: bold;"><?php if($selected && count(explode(',',$ids))==1){ echo $guests[0]['file_name'];}else if($selected && count(explode(',',$ids))>1){echo 'MULTIPLE';}else{ echo 'ALL';}  ?> GUEST LISTS</span></p>
                               
                                <div class="tab-content sucess-tab-page">
                                    
                

                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-guest-deleteall', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE"  class="action-btn" name="submit" id="btn5deleteSuccessupload">
                            </div>
                        </div>
                    </div>
                </div>



            </div> 
        </div>

        <div class="footer">2019 – 2020 .<b>XMANAGE</b>. </div>  


    </div>
  <script>

        $("body").on('click','#btn5978785',function(){
   		
   		window.print();
           
            
        });
        
        
       $("body").on('click','#btn5deleteSuccessupload',function(){
           $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>file_upload/all_guest_uploads",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
        
        

        $("body").on('click','#gotomailguestlist2',function(){
        $.fancybox.getInstance('close'); 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : "<?php echo base_url(); ?>guest/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
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
    .error{
        color:red !important;
    }
</style>

<button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button></div>
