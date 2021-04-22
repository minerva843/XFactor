
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUP  (<?php echo $action; ?>) <span class="sucess">SUCCESSFUL </span></h2> 
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> THIS GROUP HAS BEEN <?php echo $action; ?>ED.</p>
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
					<h5> ALL GROUP DETAILS ARE LISTED BELOW :</h5>
					</div>  
                    
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form-gchat-create">
					<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" type="text/css">
					<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					
                        <h3> GROUP  CREATION INFO  </h3>
                        <form>
                         
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['created_ip_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?=$group_info['created_username']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($group_info['last_edited_date_time'])){ echo $group_info['last_edited_date_time']; }else{ echo $last_edited_date_time= "NIL";  }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($group_info['last_edited_ip_address'])){ echo $group_info['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($group_info['last_edited_xmanage_id'])){ echo $group_info['last_edited_xmanage_id']; }else{ echo $last_edited_xmanage_id= "NIL";  }?></div>
                                </div>
                            </div>
							
			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($group_info['last_edited_username'])){ echo $group_info['last_edited_username']; }else{ echo $last_edited_username= "NIL";  }?></div>
                                </div>
                            </div>

                         
                        </form>
						</div>
						</div>
						
			<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">			
			<h3> GROUP INFO</h3>   
			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['ugxid']?></div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label"> GROUP TYPE</label>
                                <div class="col-sm-8">
                                   <div class="zone-label"><?=$group_info['group_type']?></div>
                                </div>
                            </div>
						
                         <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['status']?></div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$group_info['group_name']?></div>
                                </div>
                            </div> 
                             
  </div>
</div>
 


			<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">			
			<h3> GROUP PERMISSION INFO</h3>   
			<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONFIG PAGE TAB NAMES</label>
                                <div class="col-sm-8">
                                     <?php if(!empty($group_info1['tabs'])){
                                    	
                                    		 $arrm = explode(",",$group_info1['tabs']);
                                    		foreach($arrm as $tab){?>
                                    		<p><?php echo $tab; ?></p>
                                    		
                                    		<?php } ?>
                                    		
 
                                   <?php }else{ ?>
                                   
                                    <div class="zone-label">NO PERMISSIONS FOR ALL CONFIG PAGE TABS.</div>
                                  <?php } ?>
                                </div>
                      </div>
                        
  </div>
</div>


			<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">			
			<h3> GROUP USERS INFO</h3>   
			<div class="form-group row">
                                 
                                <div class="col-sm-8">
                                    <div class="zone-label">NO USER IN THIS GROUP.</div>
                                </div>
                      </div>
                        
  </div>
</div>
 

</div>
                    </div>  
                </div>  
                           
                <div class="col-md-3 right-text master-floor-left ">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				<li id="openindivisualchatfrmgrp333" class="active" ><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				<li   id="group_chat_list33090" class=""><a data-toggle="tab" href="#menu2">PERMISSIONS</a></li>
				<li class="" id="assignuserlist33090" ><a data-toggle="tab" href="#menu3">ASSIGNED USERS</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p style="color:#00b050!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;" ><?php if($action=="ADD"){ echo "(ADD)"; }else{ echo $group_info['group_name']; }?> </span></p>
								<br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600;"><?php echo $action; ?></span>, CLICK BACK.</b></p>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600;"><?php echo $action; ?> </span> GROUPS ?</b></p>

                                 
                               
                                 <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-gchat-create', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn555delsucesschataction77">
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
		
$("body").on('click','#btn555delsucesschataction77',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/showAllgroups",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});



$("body").on('click','#openindivisualchatfrmgrp333',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/showAllgroups",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});




$("body").on('click','#group_chat_list33090',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/allgrouppermissions",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});


$("body").on('click','#assignuserlist33090',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/usersGroupListassign",
        ajax: { 
           settings: { data : '', type : 'POST' }
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
