<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2>PROJECTS & REGISTRATION FORMS (DELETE ALL)</h2>
                    <p style='color:red; font-weight:bold;'> DELETE ALL MEANS ALL PROJECTS & REGISTRATION FORMS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	           

        <div class="middle-body register-form zone-sucess0009">
            <div class="row">
                <div class="col-md-9">
					
										<div class="row">
					<div class="header-title">
	            <div class="leftbox-top">
					<h5> ALL PROJECTS TO BE DELETED ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                    
                    <div class="zone-info project-reg-sucess">
					
		<div class="col-md-12" id="printJS-form">
                    
                    
               <?php foreach($data1 as $data1){ ?>
                   
                   
 
                                    
		       <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> PROJECT CREATION INFO </h3>  				
                        <form>
						<?php $full_url=$data1->register_url;
							$query=$this->db->get_where('xf_mst_project',array('register_url'=>$full_url));
							$MyProject=$query->row();
							$DataField=json_decode($MyProject->key);
							
						?>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->group_name;?></div>
                                </div>
                            </div>   

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->group_status;?></div>
                                </div>
                            </div>
     
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->project_id;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE &amp; TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label loweditbt"><?=$data1->created_date_time .'h';?></div>
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
                                    <div class="zone-label loweditbt"><?=$data1->last_edited_date_time .'h';?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_id_address;?></div>
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

                            <h3 class="m-t4"> PROJECT INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->project_name;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT TYPE    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->project_type;?></div>
                                </div>
                            </div>  
<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">SETUP START DATE & TIME </label>
                                <div class="col-sm-8">
                                    <?php if(!empty($data1->setup_start_date_time !=='NOT APPLICABLE')){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->setup_start_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label"><?php echo $data1->setup_start_date_time;?></div>
								<?php }?>
                                </div>
                            </div>  
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">SETUP END DATE & TIME</label>
                                <div class="col-sm-8">
								<?php if(!empty($data1->setup_end_date_time !=='NOT APPLICABLE')){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->setup_end_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label"><?php echo $data1->setup_end_date_time;?></div>
								<?php }?>
                                </div>
                            </div> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EVENT START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <?php if(!empty($data1->event_start_date_time)){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->event_start_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label">NIL</div>
								<?php }?>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EVENT END DATE & TIME</label>
                                <div class="col-sm-8">
                                   <?php if(!empty($data1->event_end_date_time)){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->event_end_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label">NIL</div>
								<?php }?>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">STRIKE START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <?php if(!empty($data1->strike_start_date_time !=='NOT APPLICABLE')){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->strike_start_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label"><?php echo $data1->strike_start_date_time;?></div>
								<?php }?>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">STRIKE END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <?php if(!empty($data1->strike_end_date_time !=='NOT APPLICABLE')){ ?>
                                    <div class="zone-label loweditbt"><?php echo $data1->strike_end_date_time;?>h</div>
								<?php }else{?>
								
									<div class="zone-label"><?php echo $data1->strike_end_date_time;?></div>
								<?php }?>
                                </div>
                            </div> 
							

                            <h3 class="m-t4"> PROJECT INFO (FOR HOME PAGE) </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT AUDIENCE TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label small-case"><?=$data1->project_audience_type;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT DESCRIPTION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label small-case"><?=$data1->project_description;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT HEADER VISUAL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->project_header_visual;?> </div>
                                </div>
                            </div>
							
							 <h3 class="m-t4"> CLIENT & POINT OF CONTACT INFO </h3>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CLIENT COMPANY NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->client_company_name;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CLIENT COMPANY ADDRESS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->client_company_address;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CLIENT COMPANY POSTAL CODE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->client_country;?> +<?=$data1->client_company_postal_code;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">POINT OF CONTACT NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->point_contact_name;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY CODE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->client_country;?> +<?=$data1->client_country_code;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">POINT OF CONTACT MOBILE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->point_contact_mobile;?> </div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">POINT OF CONTACT EMAIL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label small-case"><?=$data1->point_contact_email;?> </div>
                                </div>
                            </div>   
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ADDITIONAL NOTES</label>
                                <div class="col-sm-8">
                                    <div class="zone-label small-case"><?=$data1->additional_notes;?> </div>
                                </div>
                            </div>
                        </form>
						</div>
						</div>   
						
						
						<div class="row">
						<div class="col-md-3">&nbsp;</div>
					   <div class="col-md-9">
                   
                        <h3> REGISTRATION PAGE FORM INFO </h3>  				
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">REGISTRATION PAGE URL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><a><?php echo $data1->register_url;?> </a></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CHECK IN PAGE URL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><a><?php echo $data1->register_url;?> </a> </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">registration page header VISUALS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->register_header_image?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">SOLUTATION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->salutation =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>
 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GENDER </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->gender =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FIRST NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->first_name =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->last_name =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PREFERRED NAME TO BE DISPLAY/PRINTED  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->username =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>


                            

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EMAIL </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->email =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY CODE </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->country_code =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->mobile =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">DID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->did =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">TEL   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->tel =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div>  
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EXTENSION   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->extension =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->company_name =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY ADDRESS </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->company_address =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div> 
							                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">DESIGNATION   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($DataField->designation =='1'){  echo "show"; }else{ echo "DISABLE"; }?></div>
                                </div>
                            </div> 
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
                              

                          <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT REGISTRATION QR CODE</label>
                                <div class="col-sm-8">
                                    <?php if($data1->register_url){?>
                                    <div class="zone-label"><div class="qrcode qr_<?=$data1->id?>" ></div></div>
								<?php }?>
                                </div>
								<script>
$(document).ready(function() {
$('.qr_<?php echo $data1->id?>').ClassyQR({
   create: true, 
   type: 'text', 
   text: '<?php echo $data1->register_url?>' 
});

$('.qr1_<?php echo $data1->id?>').ClassyQR({
   create: true, 
   type: 'text', 
   text: '<?php echo $data1->checkin_page_url?>' 
});
// $('.qr_<?=$data1->register_url?>').ClassyQR({
   // create: true, 
   // type: 'text',  
   // text: '<?=$data1->register_url?>' 
// });
});
</script>     
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT CHECK IN PAGE QR CODE</label>
                                <div class="col-sm-8">
                                    <?php if($data1->checkin_page_url){?>
                                    <div class="zone-label"><div class="qrcode qr1_<?=$data1->id?>" ></div></div>
								<?php }?>
                                </div>
                            </div>   
					    

                        </form>
						
                    </div>
   
  
                    </div> 
					<hr>

<?php } ?>   



                    
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
                                <p style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px !important;font-weight: normal;">ALL PROJECTS</span></p>
                               
                                <div class="tab-content sucess-tab-page">
  
                            <p> <b>TO CHECK AGAIN BEFORE <span class="red">DELETE ALL</span>, CLICK BACK.</b></p> <br>
						    <p class="delete-all-poject"><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-size: 14px !important; font-weight:bold !important;">DELETE <?php if(isset($selected)){ echo 'SELECTED';}else{ echo 'ALL';}  ?></span>  
                                                            
                                                              PROJECTS?</b></p>
							 
                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <a href="#" class="action-btn backbtn" name="back" id="btn5">BACK</a>
                                <!--input type="button" value="DONE" class="action-btn" name="submit" id="btn5" onclick="printJS({printable:'printJS-form', type:'html',targetStyles: ['*']})"-->
                                
								<input type="button" value="DELETE ALL" class="action-btn deletesuccess" name="submit" id="btn5">
                            </div>
                        </div>
                    </div>
                </div>



            </div> 
        </div>

           <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 


    </div>
  <script>
  
  
  $("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?=base_url();?>project/index",
				ajax: { 
				   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
				},
				touch: false,
				 clickSlide: false,
				clickOutside: false
				
				});
            
        });

		$("body").on('click','.deletesuccess',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?=base_url();?>project/deleteAllprojectsSuccess",
				ajax: { 
				   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
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