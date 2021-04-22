<style>
.fancybox-close-small{
	display:none!important;
}
.zone-label {
    font-weight: 600;
    font-size: 12px;
}
</style>
<style>
body{
	text-transform:none!important;
}
</style>
<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2 class="project-msg">PROJECTS & REGISTRATION FORMS <span style="color:red">NOT SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?> .</b> THIS PROJECT HAS BEEN ADDED</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess success_msg_display"> 
            <div class="row">
                <div class="col-md-9">
				
					<div class="row">
					<div class="header-title">
	                 <div class="leftbox-top">
					<h5> ALL PROJECTS AND REGISTRATION FORM DETAILS ARE LISTED BELOW :</h5>
					
					</div> 
					</div>
					</div>	
			
                    
                    <div class="zone-info project-reg-sucess " style="padding-left: 145px;">
					
					<div class="col-md-12" id="printJS-form">  
					<div class="row">
			        <div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> PROJECT CREATION INFO </h3>  				
                        <form>
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
                                    <div class="zone-label"><?php if(isset($data1->last_edited_date_time)){ echo $data1->last_edited_date_time;}else{ echo "NIL"; }?></div>
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(isset($data1->last_edited_id_address)){ echo $data1->last_edited_id_address;}else{ echo "NIL"; }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(isset($data1->last_edited_xmanage_id)){ echo $data1->last_edited_xmanage_id;}else{ echo "NIL"; }?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(isset($data1->last_edited_username)){ echo $data1->last_edited_username;}else{ echo "NIL"; }?></div>
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
                                    <div class="zone-label"><?php echo $data1->setup_start_date_time;?></div>
                                </div>
                            </div>  
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">SETUP END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->setup_end_date_time;?></div>
                                </div>
                            </div> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EVENT START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->event_start_date_time;?></div>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EVENT END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->event_end_date_time;?></div>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">STRIKE START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->strike_start_date_time;?></div>
                                </div>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">STRIKE END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->strike_end_date_time;?></div>
                                </div>
                            </div> 
							

                            <h3 class="m-t4"> PROJECT INFO (FOR HOME PAGE) </h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT AUDIENCE TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->project_audience_type;?> </div>
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
                                    <div class="zone-label"><a> <?=$data1->register_url;?> </a> </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CHECK IN PAGE URL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->checkin_page_url;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">registration page header VISUALS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->register_header_image?></div>
                                </div>
                            </div>


                           <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">SALUTATION</label>
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
							<?php if(!empty($data1->register_url)){?>
                           <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT REGISTRATION QR CODE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
										<div class="qrcode qr" ></div>
									</div>
                                </div>
								<script>
$(document).ready(function() {
$('.qr').ClassyQR({
   create: true, 
   type: 'text', 
   text: '<?=$data1->register_url?>' 
});
});
</script>
                            </div> 
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">PROJECT CHECK IN PAGE QR CODE</label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><div class="qrcode qr"></div></div>
                                </div>
                            </div>  
							<?php }?>

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
				
                            </ul>
                            <div class="table_info floor-step">
                                <p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;font-weight: bold;"><?=$data1->project_name;?></span></p>
                               
                                <div class="tab-content sucess-tab-page">
                                </div> 
                            </div>      

                            <div class="form-submit"> 
                                <input type="button" value="BACK" class="action-btn" id="submitSuccback">
                                <input type="button" value="RETRY" class="action-btn" name="submit" id="toHome">
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
	
	$("body").on('click','#toHome',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/add',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false 
                }
            });
            
        });

		$("body").on('click','#submitSuccback',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/index',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false 
                }
            });
            
        });
	
	

	 $("body").on('click','#btn5',function(){
	 $.fancybox.getInstance('close');
	 });
 });
</script>