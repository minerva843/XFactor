<style>
.fancybox-close-small{
	display:none!important;
}
.zone-label {
    font-weight: 600;
    font-size: 12px;
}
</style>
<div class="main-section fancybox-content" id="add-floor" style=""> 
    <div class="container">
 
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">  
                    <h2>VIDEO STREAM (EDIT) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b>  THIS VIDEO STREAM HAS BEEN EDITED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess"> 
            <div class="row">
                <div class="col-md-9">
				
					<!--<div class="row">
					<div class="select-box">
					</div>
					</div> -->
					<div class="row">
					<div class="header-title">
	                <div class="leftbox-top">
					<h5>ALL VIDEO STREAM DETAILS ARE LISTED BELOW :</h5>
					</div> 
					</div>
					</div>	
			
                    <div class="zone-info project-reg-sucess">
					<div class="col-md-12" id="printJS-form-video-edit">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
                        <h3> VIDEO STREAM  CREATION INFO </h3>  				
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
					</div> 
				</div>  
                </div>  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                               <!--  <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				
				
                            </ul>
                            <div class="table_info floor-step">
                                <p style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;"><?=$data1->video_stream_name;?></span></p>  
                              
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>      

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-video-edit', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="toHome6768">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 ??? <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  


    </div>

<script>
 $(document).ready(function(){
	
	$("body").on('click','#toHome6768',function(){
          
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
           settings: { data : 'project=<?=$data1->project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        });
	
	

	 $("body").on('click','#btn5',function(){
	 $.fancybox.getInstance('close');
	 location.reload();
	 });
 });
</script>