<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2>GUESTS (DELETE<?php if($selected){echo '';}else{echo ' ALL';} ?>) <span class="sucess">SUCCESSFUL</span> </h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUESTS HAVE BEEN DELETED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>    
            </div>   
        </div>	        

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
					
					<div class="row">
					<div class="header-title">
	            <div class="leftbox-top">
					<h5> <?php if($selected){echo 'ALL SELECTED';}else{echo 'ALL';} ?> GUESTS THAT ARE DELETED ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                    
                    <div class="zone-info project-reg-sucess">
					
		            <div class="col-md-12" id="printJS-form-guest-deleteall">
                    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" type="text/css">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
 
 <?php  if(!empty($guests)){
 	foreach($guests as $guest){ 
	$DataField=json_decode($guest['key']);
	?>
 	
 	
 <div class="row">
					 
						<div class="col-md-3">&nbsp;</div>
					 <div class="col-md-9">
						<h3> GUEST CREATION INFO </h3>  				
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
						<label for="colFormLabel" class="col-sm-4 col-form-label">GUEST ID </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['xguest_id']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">GUEST REGISTRATION TYPE </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['guest_registration_type']; ?> </div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">GUEST TYPE </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['guest_type']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">MASS UPLOAD FILE NAME</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL</div>
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
						
						<h3 class="m-t4"> GUEST PERSONAL INFO </h3>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">SALUTATION</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['salutation']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">FIRST NAME</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['first_name']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">LAST NAME</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['last_name']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DISPLAYED / PRINTED NAME</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['username']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">GENDER</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['gender']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DISPLAY PHOTO</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php //echo $guest['username']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">QUICK INTRO</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['quick_intro']; ?></div>
						</div>
						</div>
						
						<h3 class="m-t4"> GUEST COMPANY & WORK INFO </h3>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY NAME</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['company']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY ADDRESS</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['company_address']; ?><br>
#01-828 BUILDING ABC </div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY POSTAL CODE</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['pincode']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DESIGNATION</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['designation']; ?></div>
						</div>
						</div>
						
						<h3 class="m-t4"> GUEST CONTACT INFO </h3>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">EMAIL</label>
						<div class="col-sm-8">
						<div class="zone-label"> <?php echo $guest['email']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY CODE</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['country_code']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['phone']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DID</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['did']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">TEL</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['tel']; ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">EXTENSION</label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $guest['extension']; ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">QR CODE</label>
						<div class="col-sm-8">
						<div class="zone-label">QR CODE PASTE</div>
						</div>
						</div>
						
						<h3 class="m-t4"> GUEST MISC INFO </h3>
						
						
						<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"><?php if(empty($DataField->remark_1)){  echo "REMARKS 1 "; }else{ echo $DataField->remark_1; }?></label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(empty($DataField->remark_1)){  echo "DISABLE"; }else{ echo "SHOW"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"><?php if(empty($DataField->remark_2)){  echo "REMARKS 2 "; }else{ echo $DataField->remark_2; }?> </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(empty($DataField->remark_2)){  echo "DISABLE"; }else{ echo "SHOW"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"><?php if(empty($DataField->remark_3 )){  echo "REMARKS 3 "; }else{ echo $DataField->remark_3; }?></label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(empty($DataField->remark_3 )){  echo "DISABLE"; }else{ echo "SHOW"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"><?php if(empty($DataField->remark_4 )){  echo "REMARKS 4 "; }else{ echo $DataField->remark_4; }?></label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(empty($DataField->remark_4)){  echo "DISABLE"; }else{ echo "SHOW"; }?></div>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"><?php if(empty($DataField->remark_5)){  echo "REMARKS 5 "; }else{ echo $DataField->remark_5; }?></label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(empty($DataField->remark_5)){  echo "DISABLE"; }else{ echo "SHOW"; }?></div>
                                </div>
                            </div> 
						
						<h3 class="m-t4"> GUEST ATTENDANCE INFO </h3>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">ATTENDANCE STATUS</label>
						<div class="col-sm-8">
						<div class="zone-label"> PRESENT / ABSENT</div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK IN DATE & TIME</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / YYYYMMDD HHMM</div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK IN IP ADDRESS</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / 123 . 123 . 123 . 1</div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK IN SOURCE</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / ADMIN CHECK IN / OTHER TERMINALS / CHECK IN PAGE</div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK OUT DATE & TIME</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / YYYYMMDD HHMM</div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK OUT IP ADDRESS</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / 123 . 123 . 123 . 1 </div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">CHECK OUT SOURCE</label>
						<div class="col-sm-8">
						<div class="zone-label">NIL / ADMIN CHECK OUT / / OTHER TERMINALS / CHECK OUT PAG</div>
						</div>
						</div>
						
				    

						</form>

						</div>

  
                    </div>  <!--END-->
                    
                    
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
				<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				<li class=""><a data-toggle="tab" href="#menu1">GUEST LIST</a></li>
		
				
                            </ul>
                            <div class="table_info floor-step">
                                <p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;font-weight: bold;"><?php if(isset($selected)){ echo 'MULTIPLE';}else{ echo 'ALL';}  ?> GUESTS</span></p>
                               
                                <div class="tab-content sucess-tab-page">
                                    
                

                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-guest-deleteall', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE"  class="action-btn" name="submit" id="btn5deleteSuccess">
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
        
        
       $("body").on('click','#btn5deleteSuccess',function(){
           $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Guest/index",
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
