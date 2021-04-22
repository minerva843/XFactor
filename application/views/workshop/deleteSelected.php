
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone);  ?>  
                    <h2>WORKSHOP (DELETE<?php if($selected){ echo ""; }else{ echo " ALL"; }?>) </h2>
                   <p style="color:red">DELETE<?php if($selected){ echo ""; }else{ echo " ALL"; }?> MEANS <?php if($selected){ echo "ALL SELECTED"; }else{ echo "ALL"; }?> WORKSHOPS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p> 
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
					<h5> <?php if($selected){ echo "ALL SELECTED"; }else{ echo "ALL"; }?> WORKSHOPS TO BE DELETED ARE LISTED BELOW :</h5>
					</div>  
                        
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
					<?php foreach($workshops as $data){?> 
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					
                        <h3> WORKSHOP CREATION INFO </h3>
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['group_name']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['group_status']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['projectxmid']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP  ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['workshop_xm_id']?></div>
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
                                    <div class="zone-label"><?=$data['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
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
                                    <div class="zone-label"><?php if(!empty($data['last_edited_ip_address'])){ echo $data['zone']['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
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

                         
                            <h3 class="m-t4"> WORKSHOPS INFO</h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP NAME</label>
                                <div class="col-sm-8">
                                   
                                    <div class="zone-label">  <?php if(!empty($data['workshop_name'])){echo $data['workshop_name'];}else{echo 'NIL';} ?> </div>
                                </div>
                            </div> 
							 
							  
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP LOCATION </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['location']?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP START DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['startdatetime']?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP END DATE & TIME: </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">
									<?=$data['enddatetime']?>
									</div>
                                </div>
                            </div>
							 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP SCREEN URL 1 </label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter">
									<?=$data['screenurl1']?>
									</div>
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP SCREEN URL 1 </label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter">
									<?=$data['screenurl2']?>
									</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP SCREEN URL 1  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter">
									<?=$data['screenurl3']?>
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
                                
                                <p style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if($selected){ echo "MULTIPLE WORKSHOPS"; }else{ echo "ALL"; }?> </span></p>
								<br>                                
                               
                                <div class="tab-content sucess-tab-page">
								<p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600 !important;">DELETE <?php if($selected){ echo ""; }else{ echo "ALL"; }?></span>, CLICK BACK.</b></p><br/>
								<p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600 !important;">DELETE <?php if($selected){ echo '</span> THE SELECTED ';}else{ echo 'ALL </span>';}  ?> WORKSHOPS?</b></p>
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5deleteallworkshop" >Back</a>
                                <input type="button" value="DELETE<?php if($selected){ echo ""; }else{ echo " ALL"; }?> " class="action-btn" name="submit" id="btn555delsucessworkshop">
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

        $("body").on('click','#btn5deleteallworkshop',function(){
          
           $.fancybox.getInstance('close');
           
           
           
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>workshop/showall",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
            
            
            
            
            
        });
		
		
		$("body").on('click','#btn555delsucessworkshop',function(){


$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
  
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>workshop/deleteSelectedSuccessWorkshops",
        ajax: { 
           settings: { data : 'ids=<?php echo $ids; ?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
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
