<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUPS (DELETE<?php if ($selected) {
                                                echo "";
                                            } else {
                                                echo " ALL";
                                            } ?>) </h2>
                    <p style="color:red">DELETE<?php if ($selected) {
                                                    echo "";
                                                } else {
                                                    echo " ALL";
                                                } ?> MEANS <?php if ($selected) {
                                                                echo "ALL SELECTED";
                                                            } else {
                                                                echo "ALL";
                                                            } ?> GROUPS  AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
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
                        <h5> <?php if ($selected) {
                                    echo "ALL SELECTED";
                                } else {
                                    echo "ALL";
                                } ?> GROUPS  TO BE DELETED ARE LISTED BELOW :</h5>
                    </div>

                    <div class="zone-info delete-floorplan">
                        <div class="col-md-12">
                          

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


					<?php 
					
					$totuser = $this->Usermanage_model->getGroupUersmappedCountinGroup($group_info['id']);
					
					 ?>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $totuser; ?></div>
                                            </div>
                                        </div>
                                        
                                        
                                        <?php 
					
					$totuserlive  = $this->Usermanage_model->getGroupUersmappedCountLive($group_info['id']);
					
					 ?>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS (LIVE)</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $totuserlive; ?></div>
                                            </div>
                                        </div>

                                        <?php 
					$totusersuspend  = $this->Usermanage_model->getGroupUersmappedCountSuspend($group_info['id']);
					 ?>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL USERS (SUSPENDED)</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $totusersuspend; ?></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                               
                                  <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP PERMISSION INFO</h3>
                                        
                                        
                                        <?php 
                                        $group_info= $this->Usermanage_model->getGroupCreateInfoWithTabs($group_info['id'])[0];
										
						 if(!empty($group_info['confg_tabs'])){
			        $arrconfigstabs = $group_info['confg_tabs'];
				$arrm = explode(",",$group_info['tabs']);
				
			        }
				
				$tabstr= '';
				if(!empty($arrm)){
				foreach($arrm as $tab){
				$tabstr = $tabstr.'<p>'.$tab.'</p>';
				
				}
				}else{
				$tabstr = '';
				}  ?>
                                                           
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CONFIG PAGE TAB NAMES</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $tabstr; ?></div>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                               
                                
<div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP USERS INFO</h3>

                                        <?php  
										$users=$this->Usermanage_model->getGroupUersmapped($group_info['id']);
										foreach($users as $user){
										?>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">FIRST NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?=$user['first_name']?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?=$user['last_name']?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAIL</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label running_latter"><?=$user['email']?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?=$user['phone']?></div>
                                            </div>
                                        </div>
										
										
										<div class="form-group row border-bottoms">                                       
                                            <div class="col-sm-12">   
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>
										
										
										<?php }?>
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
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->

                                <li class=""><a data-toggle="tab" href="#menu1" class="active">MAIN MENU</a></li>
                                <li id="permissiontab9999"><a data-toggle="tab"  href="#menu2">PERMISSIONS</a></li>
                                <li class="" id="assignuser47480909"><a data-toggle="tab" href="#menu3">ASSIGN USERS</a></li>

                            </ul>
                            <div class="table_info floor-step">

                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;"><?php if ($selected && count($groups_info)>1) {
                                                                                                                                        echo "MULTIPLE GROUPS";
                                                                                                                                    } else if ($selected && count($groups_info)==1) {
                                                                                                                                        echo $groups_info[0]['group_name'];
                                                                                                                                    } else {
                                                                                                                                        echo " ALL";
                                                                                                                                    } ?> </span></p>
                                <br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: bold!important;">DELETE <?php if ($selected) {
                                                                                                                                                echo ' ';
                                                                                                                                            } else {
                                                                                                                                                echo 'ALL ';
                                                                                                                                            } ?></span>, CLICK BACK.</b></p><br />
                                <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: bold!important;">DELETE  <?php if ($selected) {
                                                                                                                                                echo ' ';
                                                                                                                                            } else {
                                                                                                                                                echo ' ALL';
                                                                                                                                            } ?></span> GROUPS ?</b></p>
 


                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <a class="action-btn" id="groupchatback">Back</a>
                                <input type="button" value="NEXT" class="action-btn" name="submit" id="btn555delsucessgroupaction5646">
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
    
    
    
     $("body").on('click','#btn555delsucessgroupaction5646',function(){
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
        src         : "<?php echo base_url(); ?>UserManage/deleteSelectedGroupUsersSuccess",
        ajax: { 
           settings: { data : 'ids='+strids, type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
    
    
    
    

    $("body").on('click', '#groupchatback', function() {
        
        $.fancybox.getInstance('close');
        $.fancybox.open({
            maxWidth: 800,
            fitToView: true,
            width: '100%',
            height: 'auto',
            autoSize: true,
            type: "ajax",
            src: "<?= base_url(); ?>UserManage/showAllgroups",
            ajax: {
                settings: {
                    data: 'project=',
                    type: 'POST'
                }
            },
            touch: false,
            clickSlide: false,
            clickOutside: false

        });


    });

    $("body").on('click', '#permissiontab9999', function() {
        $.fancybox.getInstance('close');
        var strids = "<?php print($ids); ?>";
        $.fancybox.open({
            maxWidth: 800,
            fitToView: true,
            width: '100%',
            height: 'auto',
            autoSize: true,
            type: "ajax",
            src: "<?php echo base_url(); ?>UserManage/allgrouppermissions",
            ajax: {
                settings: {
                    data: '',
                    type: 'POST'
                }
            },
            touch: false,
            clickSlide: false,
            clickOutside: false
        });

    });



        $("body").on('click','#assignuser47480909',function(){
       $.fancybox.getInstance('close');
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
    .fancybox-close-small {
        display: none;
    }
</style>
