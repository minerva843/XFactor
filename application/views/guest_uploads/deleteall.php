<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">
  
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">   
                    <h2>GUEST LISTS (DELETE <?php if($selected){echo '';}else{echo 'ALL';} ?>)  </h2>
                    <p style='color:red;'> DELETE <?php if($selected){echo '';}else{echo 'ALL';} ?> MEANS <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUEST LISTS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btngueststepalldel"></div>
                </div>
            </div>   
        </div>	        

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
				
					<div class="row">
					<div class="header-title">
	            <div class="leftbox-top">
					<h5> <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUEST LISTS  TO BE DELETED ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                    
                    <div class="zone-info project-reg-sucess">
					
		            <div class="col-md-12">
                    
                    
 
 <?php  if(!empty($guests)){
 	foreach($guests as $guest){ 
	//$DataField=json_decode($guest['key']);
	//print_r($guest);  
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
				<li class=""><a id="gotomailguestlist" data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				<li class="active"><a data-toggle="tab" href="#menu1">GUEST LIST</a></li>
				 
			
                            </ul>
                            <div class="table_info floor-step">
                                <p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;font-weight: bold;"><?php if($selected && count(explode(',',$ids))==1){ echo $guests[0]['file_name'];}else if($selected && count(explode(',',$ids))>1){echo 'MULTIPLE';}else{ echo 'ALL';}  ?> GUEST LISTS</span></p>
                               
                                <div class="tab-content sucess-tab-page">
							  <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600 !important;">DELETE <?php if($selected){ echo '';}else{ echo 'ALL';}  ?></span>, CLICK BACK.</b></p> <br>
									<p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600 !important;">DELETE <?php if($selected){ echo '</span> THE SELECTED ';}else{ echo 'ALL </span>';}  ?>
                                                            GUEST LISTS?</b></p>
                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <a href="#" class="action-btn backbtn" name="back" id="btn55545452upload">BACK</a>
                                <input type="button" value="<?php if($selected){echo 'DELETE';}else{echo 'DELETE ALL';} ?>"  class="action-btn" name="submit" id="btn5deleteSuccess">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

         <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  


    </div>
  <script> 
  
  
          $('body').on('click', '#close-btngueststepalldel', function () {
          $.fancybox.close();
          location.reload();

        });
  
  
        $("body").on('click','#btn55545452upload,#gotomailguestlist',function(){
        $.fancybox.getInstance('close'); 
       // var strids =  '<?php echo $ids; ?>' ;
       //alert(strids);
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
        
        
        
     <?php if(!empty($ids)){ ?>
     
   
       $("body").on('click','#btn5deleteSuccess',function(){
           $.fancybox.getInstance('close');
           
          
       var strids =  '<?php echo $ids; ?>' ;
       //alert(strids);
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>file_upload/deleteSelectedGUESTSuploadSuccess",
        ajax: { 
           settings: { data : 'ids='+strids+'&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
      <?php }else{ ?>
      
      
      
      $("body").on('click','#btn5deleteSuccess',function(){
           $.fancybox.getInstance('close');
           
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>file_upload/deleteSelectedGUESTSuploadSuccess",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
      
      
      
      
      <?php }  ?>   
        
        
        
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
