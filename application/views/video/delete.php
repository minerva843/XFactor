
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>VIDEO STREAM (DELETE<?php if($selected){ }else{echo ' ALL';} ?>) </h2>
                   <p style="color:red">DELETE MEANS <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> VIDEO STREAMS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.
				  
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
					<h5> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> VIDEO STREAMS TO BE DELETED ARE LISTED BELOW : </h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
			<?php foreach($data  as $data1){?>
			 <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> VIDEO STREAM CREATION INFO </h3>  				
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->group_name;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->group_status;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->proj_id;?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">VIDEO STREAM ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->video_stream_id;?></div>
                                </div>
                            </div>
						


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE &amp; TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_date_time;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_ip_address;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_xmanage_id;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->created_username;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE &amp; TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_date_time;?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_ip_address;?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_xmanage_id;?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->last_edited_username;?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> VIDEO STREAM INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">VIDEO STREAM SOURCE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->video_stream_source?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">VIDEO STREAM NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->video_stream_name?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">VIDEO STREAM URL</label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?=$data1->video_stream_url?></div>
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
                                
                                <p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if($selected){ if(count($data)>1){ 
								echo "MULTIPLE VIDEO STREAM";
								}else{
									echo $data[0]->video_stream_name;
								}
								}
								else{echo 'ALL VIDEO STREAM';} 
								?></span></p>
								<br>
                          

                                    
                               
                                <div class="tab-content sucess-tab-page">
									<p><b>TO CHECK AGAIN BEFORE <span style="color:red;font-weight: bold !important;"> DELETE  <?php if($selected){echo '';}else{echo 'ALL';} ?></span> , CLICK BACK.</b></p><br/>
									<p><b>ARE YOU SURE YOU WANT TO <span style="color:red;font-weight: bold !important;">DELETE <?php if($selected){echo '</span> THE SELECTED';}else{echo 'ALL </span>';} ?> VIDEO STREAMS?</b></p>
                                </div>
                            </div>
							
                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5" >Back</a>
                                <input type="submit" value="<?php if($selected){echo 'DELETE';}else{echo 'DELETE ALL';} ?>" class="action-btn" name="submit" id="submitbtn">
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
        src         : "<?php echo base_url(); ?>video/index",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        
    });
            
        });
 $('body').on('click', '.close-btn', function () {
            $.fancybox.getInstance('close');
        });


 $("body").on('click','#submitbtn',function(){
var ids = [];
$('.deletClas:checked').each(function(i, e) {
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
        src         : "<?php echo base_url(); ?>video/deleteSelectedSuccess",
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