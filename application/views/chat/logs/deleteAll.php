
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>CHAT LOGS (DELETE<?php if($selected){ }else{echo ' ALL';} ?>) </h2>
                   <p style="color:red">DELETE<?php if($selected){ }else{echo ' ALL';} ?> MEANS <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> CHAT LOGS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.
				  
				   </p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess content-delete-single">
            <div class="row">
                <div class="col-md-9">
				<div class="leftbox-top">
					<h5> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> CHAT LOGS TO BE DELETED ARE LISTED BELOW : </h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
					
			<?php if($data){?>
			 <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3>CHAT LOGS CREATION INFO</h3>
                        <form>
                              <?php 
							  
							  if($selected)
							  { foreach($data as $data1) {?>
								  <div class="form-group row">
									<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">MESSAGE</label>
									<div class="col-sm-8">
										<div class="zone-label"><?=$data1->message;?></div>
									</div>
								</div>
								<div class="form-group row">
									<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SENDER</label>
									<div class="col-sm-8">
									<?php 
									$username = getdbusername($data1->user_id);?>
										<div class="zone-label"><?php echo $username;?></div>
									</div>
								</div>
								<div class="form-group row">
									<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DATE & TIME</label>
									<div class="col-sm-8">
									<?php $seconds = $data1->create_at / 1000;?>
										<div class="zone-label"><?php echo date("d M Y H:i:s", $seconds);?></div>
									</div>
								</div>
								<br/>
								
							  <?php } }
						  else{?>
							  <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">CHANNNEL ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->id;?></div>
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">TYPE   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->type;?></div>
                                </div>
                            </div>
							
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED AT   </label>
                                <div class="col-sm-8">
								<?php $seconds = $data->create_at / 1000;?>
                                    <div class="zone-label"><?php echo date("d M Y H:i:s", $seconds);?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">UPDATED AT   </label>
                                <div class="col-sm-8">
								<?php $secondss = $data->update_at / 1000;?>
                                    <div class="zone-label"><?php echo date("d M Y H:i:s", $secondss);?></div>
                                </div>
                            </div>
						  <?php }
							  
							  
							  
							  //print_r($data);die;?>
                            
							<!--<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL MESSAGE COUNT   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->total_msg_count;?></div>
                                </div>
                            </div>-->

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
                                 <li id="openindividualchats"><a data-toggle="tab" href="#">INDIVIDUAL CHATS</a></li>

								<li class="" id="group_chat_list"><a data-toggle="tab" href="#">GROUP CHATS</a></li>

                                <li class=""><a data-toggle="tab" href="#home" class="active">CHAT LOGS</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                              
                         

                                    
                               
                                <div class="tab-content sucess-tab-page">
									<p><b>TO CHECK AGAIN BEFORE <span style="color:red;font-weight: 600 !important;"> DELETE <?php if($selected){ }else{echo 'ALL';} ?></span> , CLICK BACK.</b></p><br/>
									<p><b>ARE YOU SURE YOU WANT TO <span style="color:red;font-weight: 600 !important;">DELETE <?php if($selected){ echo '</span> THE SELECTED ';}else{ echo 'ALL </span>';}  ?>  CHAT LOGS?</b></p>   
                                </div>
                            </div>
                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5" >Back</a>
                                <input type="button" value="<?php if($selected){echo 'DELETE';}else{echo 'DELETE ALL';} ?>" class="action-btn" name="submit" id="submitbtndelete">
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

        $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
           $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/channel_chat_log_list",
        ajax: { 
           settings: { data : 'channelid=<?=$channelid?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        });
 $('body').on('click', '.close-btn', function () {
            $.fancybox.getInstance('close');
        });


 $("body").on('click','#submitbtndelete',function(){
var ids = [];
$('.chatClas:checked').each(function(i, e) {
    ids.push($(this).val());

});

$.fancybox.getInstance('close');
var strids="<?php print($ids);?>";
  // var strids =  ids.join(',');
 // console.log(strids);     
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/deleteAllSuccess",
        ajax: { 
           settings: { data : 'ids='+strids, type : 'POST' }
        },
        touch: false,
        
    });
            
}); 

</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>
