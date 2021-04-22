<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>USER LISTS (DELETE<?php if ($selected) {
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
                                                            } ?> USER LISTS  AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
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
                                } ?> USER LISTS  TO BE DELETED ARE LISTED BELOW :</h5>
                    </div>

                    <div class="zone-info delete-floorplan">
                        <div class="col-md-12" id="printJS-form">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">

                            <?php foreach ($files as $file) { ?>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> USER LIST CREATION INFO</h3>
                                        <form>
                                        
                                  
					<div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> GROUP STATUS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">USER LIST ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $file['xguestfileid'] ?></div>
                                            </div>
                                        </div>


<div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['created_datetime']; ?>h</div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['created_ip_address']; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['created_xmanage_id']; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['created_username']; ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['last_edited_date_time']; ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['last_edited_ip_address']; ?></div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['last_edited_xmanage_id']; ?></div>
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['last_edited_username']; ?></div>
                                            </div>
                                        </div> 
                                         
                                         
                                         
                                         
                                         

                                        <div class="form-group row">
                                            
                                        </div>




                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> USER LIST INFO: </h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">MASS UPLOAD FILE NAME (USERS):</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['file_name']; ?></div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                         <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">FILE TYPE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['file_type']; ?>h</div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">FILE SIZE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['file_size']/1024; ?> KB</div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">NUMBER OF INSERTS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php echo $file['total_inserts']; ?></div>
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
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->

                                <li id="mainmenu75509999"  class=""><a data-toggle="tab" href="#menu1" >MAIN MENU</a></li>
                                <li id=""><a data-toggle="tab"  href="#menu2">USER LISTS</a></li>
                                <li class="" id="assiguuu1233000909"><a data-toggle="tab" href="#menu3">ASSIGN USERS</a></li>

                            </ul>
                            <div class="table_info floor-step">

                                <p style="color:#00b050!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;"><?php if ($selected && !$single) {
                                                                                                                                        echo "MULTIPLE USER LIST";
                         } else if ($selected && $single) {
                                                                                                                                        echo $user[0]['file_name'];
                        } else {
                                                                                                                                        echo "ALL";
                        } ?> </span></p>
                                <br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600;"><?php echo $action; ?></span>, CLICK BACK.</b></p><br />
                                <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600;"><?php echo $action; ?> </span> <?php if ($selected) {
                                                                                                                                                echo 'THE SELECTED ';
                                                                                                                                            } else {
                                                                                                                                                echo 'ALL ';
                                                                                                                                            } ?>USER LISTS ?</b></p>



                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <a class="action-btn"   onclick="window.print();" id="printdic">PRINT</a>
                                <input type="button" value="DONE" class="action-btn" name="submit" id="btn555del98989989ion">
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



      $("body").on('click', '#assiguuu1233000909', function() {
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





       $("body").on('click', '#mainmenu75509999', function() {
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/allUsersManage',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


         });



     $("body").on('click','#btn555del98989989ion',function(){
           $.fancybox.getInstance('close');

        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/usersListAll",
        ajax: { 
           settings: { data : 'ids=', type : 'POST' }
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
