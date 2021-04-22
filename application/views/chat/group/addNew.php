<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>chat/processAddGroupChat/<?php echo $group_chat->id; ?>" method="POST" id="addWorkshop">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUP CHATS (<?php echo $action; ?>)</h2>
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
                        <h3>GROUP CHAT INFO</h3>  				
                        
                            <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP CHAT NAME</label>
                                <div class="col-sm-5">
                                   
                                    <input type="text" placeholder="ENTER GROUP CHAT NAME"  name="chat_group_name" maxlength="30"  value="<?php echo $group_chat->group_chat_name;?>"  id="chat_group_name"  />
 
                                     
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">REMARKS</label>
                                <div class="col-sm-5">
                                    
                                    <!-- <input type="textarea" name="remarks" maxlength="500" value="<?php echo $group_chat->remarks; ?>" class="form-control" id="remarks" placeholder="REMARKS"> -->
                                    <textarea class="form-control group-chat-remarks" name="remarks" maxlength="500" id="remarks" cols="30" rows="5"  placeholder="REMARKS"><?php echo $group_chat->remarks; ?></textarea>

                                </div>
                            </div>   

                            <div class="form-group row mb-4 group-chat_input">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT IMAGE</label>
                                <!-- div class="col-sm-5">
                                   <input type="file" name="group_image"  class="form-control" id="group_image" > 
                                    
                                </div -->    
								
								<div class="col-sm-5 project-visual_11">
								
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile"><?php if(empty($group_chat->chat_image)){ echo "select a group chat image"; }else{ echo $group_chat->chat_image; }?></div> 
									<input type="file" name="image" id="file" class="file" accept="image/jpeg, image/jpg, image/png" onchange="ValidateSingleInput(this);">
									  <div class="file-select-button" id="fileName">Browse</div>
								  </div>
								</div> 
								
							</div> 
								
                            </div>

                    </div>  
                </div>   

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content add-zone-1">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                     <!--            <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li>  -->
                     		    <li class="">
								<a data-toggle="tab" class="cnone" href="#">INDIVIDUAL CHAT</a></li>   
				                <li class="active"><a data-toggle="tab" href="#menu2">GROUP CHAT</a></li>
				                <li class=""><a data-toggle="tab" class="cnone" href="#"> CHAT LOGS</a></li>
				                         
                            </ul>     
                            <div class="table_info floor-step">
							
                                 <div class="current-status">
                                <p class="zonee"><span class="current-bold">CURRENTLY SELECTED :</span>
								
								<?php if($action=="EDIT"){ ?>
									<span style="color:black; font-size: 14px !important;" >
								     <?php echo $group_chat->group_chat_name;  ?></span>
								<?php }else{ ?>
									<span style="color:black; font-size: 14px !important;" >
								    GROUP CHAT (<?php echo $action; ?>) </span>
								<?php } ?>
								
								
								
								</p>
                                 </div>
								 <div class="display-step-status">
								 <h5>STEP 1 OF 3</h5>
								 
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
    
    
 

       $("body").on('change','#file',function(){
       	
         var filename = $("#file").val();
         
          if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
   
            
        }); 
    

    
    
    
  
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
            var form = $("#addWorkshop");
            var url = form.attr('action');
            let chat_group_name = $("#chat_group_name").val();
            let remarks = $("#remarks").val();
            let group_id = '<?php echo $group_id; ?>';
            let project_id = '<?php echo $project_select; ?>';
            
          var formData = new FormData();
          formData.append('file', $('#file')[0].files[0]);
          formData.append('chat_group_name', chat_group_name);
          formData.append('remarks', remarks);
          formData.append('group_id', group_id);
          formData.append('project_id', project_id);
            
            
            $.ajax({
             type: "POST",
             processData: false,  // tell jQuery not to process the data
             contentType: false, 
             data : formData,
             url: url,
           //  data:   {remarks:remarks,project_id: project_id,chat_group_name: chat_group_name,group_id:group_id}, 
                success: function (data)
                {
                    console.log(data);
                    let action = '<?php echo $action;  ?>';
                    $.fancybox.getInstance('close');
                    let url = '<?php echo base_url(); ?>chat/addNewChatGroupSuccess/'+parseInt(data)+'/'+action;
                 
                    if (parseInt(data) >= 1) {
                   
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>chat/guestList/'+parseInt(data),
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&groupchatid=<?php if(isset($group_chat->id)){ echo $group_chat->id; }else{ echo "0"; }?>&groupchat='+data+'&action='+action, type : 'POST' }
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
        
        
        $("#addWorkshop").validate({
			rules: {
				chat_group_name: "required",
				remarks: "required",
                               
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
