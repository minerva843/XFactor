<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>USERS (DELETE<?php if ($selected) {
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
                                                            } ?> USERS  AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
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
                                } ?> USERS  TO BE DELETED ARE LISTED BELOW :</h5>
                                <h4>TOTAL USERS COUNT: <?php echo count($users); ?></h4>
                    </div>

                    <div class="zone-info delete-floorplan">
                        <div class="col-md-12" id="printJS-form">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">

                            <?php foreach ($users as $user) { ?>
								
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> USER CREATION INFO</h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">XMANAGE ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['xmanage_id']; ?></div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                         <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['created_datetime']; ?>h</div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['ip_address']; ?></div>
                                            </div> 
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['created_xmanage_id']; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['created_username']; ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['last_edit_datetime']; ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['last_edit_ip_address']; ?></div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XPLATFORM ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['last_edit_xmanage_id']; ?></div>
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $user['last_edit_username']; ?></div>
                                            </div>
                                        </div> 
										<br>
                                <br>
                               <h3> USER PERSONAL INFO</h3>  
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">SALUTATION  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['salutation'];  ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label"> FIRST NAME </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['first_name'];  ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label"> LAST NAME  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['last_name'];  ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label"> DISPLAY NAME </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['username'];  ?></div>
						</div>
						</div>
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label"> GENDER  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['gender'];  ?></div>
						</div>
						</div>
						<br><br>
						
						<h3> USER COMPANY INFO</h3> 
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY NAME  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['company'];  ?></div>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COMPANY ADDRESS  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['company_address'];  ?></div>
						</div>
						</div>	
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">POSTAL CODE  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['pincode'];  ?></div>
						</div>
						</div>	
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DESIGNATION  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['designation'];  ?></div>
						</div>
						</div>	
						
						<br><br>
						
						<h3> USER CONTACT INFO</h3>  
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">EMAIL </label>
						<div class="col-sm-8">
						<div class="zone-label running_latter"><?php echo $user['email'];  ?></div>
						</div>
						</div>	
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">COUNTRY CODE  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['country_code'];  ?></div>
						</div>
						</div>	
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">MOBILE </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['phone'];  ?></div>
						</div>
						</div>	
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">DID </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['did'];  ?></div>
						</div>
						</div>	
						
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">TEL  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['tel'];  ?></div> 
						</div>
						</div>	
						 
						
						<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">EXTENSION  </label>
						<div class="col-sm-8">
						<div class="zone-label"><?php echo $user['extension'];  ?></div>
						</div>
						</div>
 

                                    </div>
                                </div>
                               
                                
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> USER GROUP INFO</h3>
                                        <form>
                                        
                                        
                                        
                                          <?php 
                                       
                              $allgroups = $this->Usermanage_model->getGroupsMappedOnUsersmain($user['id']); 
			        
			       if(!empty($allgroups)){
			       	
			             foreach($allgroups as $group){ ?>
			       	

					
					<div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group['ugxid'] ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> GROUP TYPE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group['group_type'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group['status'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group['group_name'] ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <hr> 
                                        </div>



			       	
			       	<?php }
			       
			       }
                                    ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                            

                                       
                                        
                                        </form>
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
                               <li class=""><a id="openusermanagelist900" data-toggle="tab" href="#menu1">USER LISTS</a></li>
								<li class="" id="usermanageassignmain68"><a data-toggle="tab" href="#">ASSIGN USERS</a></li>
                            </ul>
                            <div class="table_info floor-step">

                                <p style="color:#00b050!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;"><?php if ($selected && !$single) {
                                                                                                                                        echo "MULTIPLE USERS";
                         } else if ($selected && $single) {
                                                                                                                                        echo $users[0]['first_name'];
                        } else {
                                                                                                                                        echo "ALL";
                        } ?> </span></p>
                                <br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: bold!important;"><?php echo $action; ?></span>, CLICK BACK.</b></p><br />
                                <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: bold!important;"><?php echo $action; ?> </span> <?php if ($selected) {
                                                                                                                                                echo ' THE SELECTED';
                                                                                                                                            } else {
                                                                                                                                                echo ' ALL';
                                                                                                                                            } ?> USERS ?</b></p>



                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <a class="action-btn" id="groupchatback9090">Back</a>
                                <input type="button" value="NEXT" class="action-btn" name="submit" id="btn555delsucessgroupaction33">
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
    
    
    
    
    		    $("body").on('click', '#usermanageassignmain68', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/showAllgroups",
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
    
    
      $("body").on('click', '#openusermanagelist900', function() {
        $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/addNewUserMainUpload',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


         });
    
    
    
     $("body").on('click','#btn555delsucessgroupaction33',function(){
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
        src         : "<?php echo base_url(); ?>UserManage/deleteSelectedUsersSuccessMain",
        ajax: { 
           settings: { data : 'ids='+strids, type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
    
    
    
    

    $("body").on('click', '#groupchatback9090', function() {
        
        $.fancybox.getInstance('close');
        $.fancybox.open({
            maxWidth: 800,
            fitToView: true,
            width: '100%',
            height: 'auto',
            autoSize: true,
            type: "ajax",
            src: "<?= base_url(); ?>UserManage/allUsersManage",
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
