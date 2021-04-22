<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>UserManage/processAddGroup/<?php echo $group->id; ?>" method="POST" id="adduserGroup">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUPS (<?php echo $action; ?>)</h2>
                </div>
 
                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"  id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">   
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					 
 
                    <div class="zone-info">
                        <h3>GROUP INFO</h3> 
                        
                            <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP TYPE</label>
                                <div class="col-sm-5">
                                   
                                    <select name="group_type" id="group_type" class="country">
									<option value="">SELECT GROUP TYPE</option> 
									
									<option value="RESERVED" <?php if(!empty($group->group_type == 'RESERVED')){ echo "selected"; }?>>RESERVED</option>
									<option value="SUSPENDED" <?php if(!empty($group->group_type == 'NOT RESERVED')){ echo "selected"; }?>>NOT RESERVED</option>
								</select>
 
                                     
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP NAME</label>
                                <div class="col-sm-5">
                                    <?php if(!empty($group->id)){ ?>
                                    
                                    <input type="text" name="group_name"  readonly  value="<?php echo $group->group_name; ?>" class="form-control" id="group_name" placeholder="GROUP NAME">
                                   <?php  }else{ ?>
                                    <input type="text" name="group_name"    value="<?php echo $group->group_name; ?>" class="form-control" id="group_name" placeholder="GROUP NAME">
                                    
                                   <?php  } ?>
                                     
                                    

                                </div>
                            </div> 
                            
                            
                             <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP STATUS</label>
                                <div class="col-sm-5">
                                   
                                   <select name="status" id="group_status" class="country">  
									<option value="">SELECT GROUP STATUS</option>
									
									<option value="LIVE" <?php if(!empty($group->status == 'LIVE')){ echo "selected"; }?>>LIVE</option>
									<option value="SUSPENDED" <?php if(!empty($group->status == 'SUSPENDED')){ echo "selected"; }?>>SUSPENDED</option>
									
				   </select>
 
                                     
                                </div>
                            </div>  

                           

                    </div>  
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content add-zone-1">	  
                            <ul class="nav nav-tabs ">
                     				<li class=""><a data-toggle="tab" class="cnone" href="#">MAIN MENU</a></li>
				                <li class="active"><a data-toggle="tab" class="cnone" href="#menu2">PERMISSIONS</a></li>
				                <li class=""><a data-toggle="tab" class="cnone" href="#">ASSIGN USERS</a></li>
				                  
                            </ul>   
                            <div class="table_info floor-step">
							
                                 <div class="current-status">
                                <p class="zonee"> <span class="current-bold">CURRENTLY SELECTED : </span>
								
								<?php if($action=="EDIT"){ ?>
									<span style="color:black; font-size: 14px !important;" >
								     <?php echo $group->group_name;  ?></span>
								<?php }else{ ?>
									<span style="color:black; font-size: 14px !important;" >
								    GROUP CHAT (<?php echo $action; ?>) </span>
								<?php } ?>
								
								
								
								</p>
                                 </div>
								 <div class="display-step-status">
								 <h5>STEP 1 OF 1</h5>
								 
								 <?php if($action=='ADD'){ ?>
									 
									<p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
								<?php  }else{ ?>
									 
								<p>EDIT THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
									 
								 <?php } ?>
								 
                       
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5allworkshop333" >Back</a>
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

 </form>
    </div>

</div>


<script>

    $(document).ready(function () {
    
    
 
    
    
    
  
       $("body").on('click','#btn5allworkshop333',function(){
       $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>chat/group_chat_list",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        }); 
            
        }); 
        
        
        
        
        
        $("body").on('click','#openindivisualchatfrmgrp',function(){
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/individual_all",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
        
        
 
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
              location.reload();

        });
        
     $.validator.setDefaults({
	    submitHandler: function() {             
            var form = $("#adduserGroup");
            var url = form.attr('action');
           

            $.ajax({
             type: "POST",
             data : form.serialize(),
             url: url,
                success: function (data)
                {
                   
                    let action = '<?php echo $action;  ?>';
                    $.fancybox.getInstance('close');
                    let url = '<?php echo base_url(); ?>UserManages/addNewChatGroupSuccess/'+parseInt(data)+'/'+action;
                 
                    if (parseInt(data) >= 1) {
                   
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>UserManage/groupCreateSuccess/'+parseInt(data),
        ajax: { 
           settings: { data : 'action='+action, type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
                    
                    } else {

                        alert("Something went wrong");
                    }
                }
            });
                   
		}
	});
        
        
        $("#adduserGroup").validate({
			rules: {
				group_name: "required",
				group_type: "required",
				group_status: "required",
                               
			},
                        errorPlacement: function(){
                               return false;
                         }

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
