<?php 
session_start();
?>
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>FLOOR PLANS (DELETE ALL) <span class="sucess">SUCCESSFUL </span></h2>
                   <p><b><?php echo date('Ymd hi'); ?>h.</b> ALL FLOOR PLANS HAVE BEEN DELETED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9" id="printJS-form-floor-deleteall">
				
				<div class="leftbox-top">
					<h5> ALL FLOOR PLANS THAT ARE DELETED ARE LISTED BELOW :</h5>
					</div>
                    
                    <div class="zone-info">
					<div class="col-md-12" id="printJS-form-floor-delete">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<?php foreach($_SESSION['DeleteData'] as $data){?>
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					
                        <h3> FLOOR PLAN CREATION INFO </h3>
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
                                    <div class="zone-label"><?=$data['proj_id']?></div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['floor_plan_id']?></div>
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
                                    <div class="zone-label"><?=$data['created_ip_address']?></div>
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
                                    <div class="zone-label"><?php if(!empty($data['last_edited_ip_address'])){ echo $data['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
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

                            <h3 class="m-t4"> FLOOR PLAN INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['floor_plan_name']?></div>
                                </div>
                            </div>


                            <!--div class="row">
						  <div class="col-md-6 floor-result-1">FLOOR PLAN GRID TYPE </div>
						   <div class="col-md-6 floor-result"> : 16 x 9</div>
						  </div-->
							
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
							
							

                            <h3 class="m-t4"> FLOOR PLAN SCALE INFO</h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">EACH SQUARE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['each_square']?> METER </div>
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
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                      	<ul>						
					     <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
   <!--                              <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> -->
                                 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
						</ul>
                            <div class="table_info floor-step">
                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >ALL FLOOR PLANS</span></p>
								<br>
                                

                                
                                
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-floor-deleteall', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="submit" value="DONE" class="action-btn" name="submit" id="btn555">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  


    </div>

</div>
<script>
function myFunction() {
  var x = document.getElementById("myFile");
  x.disabled = true;
}

        

		$("body").on('click','#btn555',function(){ 
          
           $.fancybox.getInstance('close');
           
           
           
         $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>floor/index",
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
