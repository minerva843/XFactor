
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                <h2>GROUPS (DELETE<?php if($selected){ echo ""; }else{ echo " ALL"; }?>) <span class="sucess">SUCCESSFUL </span></h2> 
                    <p style="color:red">DELETE<?php if($selected){ echo ""; }else{ echo " ALL"; }?> MEANS <?php if($selected){ echo "ALL SELECTED"; }else{ echo "ALL"; }?> GROUPS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p> 
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
					<h5> <?php if($selected){ echo "ALL SELECTED"; }else{ echo "ALL"; }?> GROUPS TO BE DELETED ARE LISTED BELOW :</h5>
					</div>  
                    
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form-gchat-delete">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					
		         <?php foreach ($groups_info as $group_info) { ?>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUPS CREATION INFO </h3>
                                        <form>
                                            

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_date_time'] ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_ip_address'] ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_xmanage_id'] ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_username'] ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_date_time'])) {
                                                                                echo $group_info['last_edited_date_time'];
                                                                            } else {
                                                                                echo $last_edited_date_time = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_ip_address'])) {
                                                                                echo $group_info['last_edited_ip_address'];
                                                                            } else {
                                                                                echo $last_edited_ip_address = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_xmanage_id'])) {
                                                                                echo $group_info['last_edited_xmanage_id'];
                                                                            } else {
                                                                                echo $last_edited_xmanage_id = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED User Name </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_username'])) {
                                                                                echo $group_info['last_edited_username'];
                                                                            } else {
                                                                                echo $last_edited_username = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP  INFO</h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['ugxid'] ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> GROUP TYPE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['group_type'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['status'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['group_name'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= count($usersCount)?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS (LIVE)</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= count($usersCount)?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS (SUSPENDED)</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= count($usersCount)?></div>
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
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>


                                       

                                    </div>
                                </div>
                               
                                  <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP USERS INFO</h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">ASSIGNED DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['group_chat_name'] ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">XPLATFORM ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">USER STATUS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">USER NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">USER ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>

                            <?php } ?>
                            
                          			
							
						</div>
                    </div>  
                </div>  
                           
                <div class="col-md-3 right-text master-floor-left ">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				<li id="individual_chat_list888" class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				<li id="group_chat_list90" ><a data-toggle="tab" href="#menu2">PERMISSIONS</a></li>
				<li class=""><a data-toggle="tab" href="#menu3">ASSIGN USERS</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                                
                              <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if($selected && !$single){ echo "MULTIPLE GROUPS"; }else if($selected && $single){echo $groups_info[0]['group_name'];}else{ echo "ALL"; }?> </span></p>
								<br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600;"><?php echo $action; ?></span>, CLICK BACK.</b></p>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600;"><?php echo $action; ?> </span> GROUPS ?</b></p>

                                
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-gchat-delete', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btngotogrouplistusers">
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
		
$("body").on('click','#btn555delsucesschataction',function(){
$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/deleteSelectedGroupChatsSuccess",
        ajax: { 
           settings: { data : 'ids=<?php echo $ids; ?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});



        $("body").on('click','#btngotogrouplistusers',function(){
        $.fancybox.getInstance('close'); 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>UserManage/showAllgroups",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });
         
                    
        });
        
        
        
        $("body").on('click','#individual_chat_list',function(){
        $.fancybox.getInstance('close'); 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>chat/individual_all",
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
    
 </style>
