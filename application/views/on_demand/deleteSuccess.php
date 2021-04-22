
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>ON DEMAND CONTENT (DELETE<?php if($selected){ }else{echo ' ALL';} ?>) <span style="color: #00b050;" >SUCCESSFUL</span> </h2>
					<p> <b><?php echo date('Ymd hi'); ?>h.</b>  <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> ON DEMAND CONTENT HAVE BEEN DELETED</p>
                   
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
					<h5> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> ON DEMAND CONTENT TO BE DELETED ARE LISTED BELOW : </h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan"> 
			<div class="col-md-12" id="printJS-form-ondemand-delete">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
			<?php foreach($data  as $data1){?>
			 <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> ON DEMAND  CREATION INFO </h3>  				
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
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ODCONTENT ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->oncontent_id;?></div>
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

							<div class="form-group row">
							 <div class="col-sm-12">
                            <h3 class="m-t4"> ON DEMAND CONTENT INFO </h3>  
							</div>
                            </div>
							
                            
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ODCONTENT OWNER</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->guest_type.', '.$data1->username ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ODCONTENT TITLE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->oncontent_title?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ODCONTENT TYPE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->oncontent_type?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ODCONTENT FILE NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->oncontent_file_name?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ODCONTENT FILE SIZE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->oncontent_file_size?> MB</div>
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
                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if($selected){ if(count($data)>1){ 
								echo "MULTIPLE ON DEMAND CONTENT";
								}else{
									echo $data[0]->oncontent_title;
								}
								}
								else{echo 'ALL ON DEMAND CONTENT';} 
								?></span></p>
								<br>
       

                                 
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-ondemand-delete', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn done" name="submit">
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

        $("body").on('click','.done',function(){
          
           $.fancybox.getInstance('close');
           $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>onDemand/index",
        ajax: { 
           settings: { data : 'project=<?=$data[0]->project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        });
 $('body').on('click', '.close-btn', function () {
            $.fancybox.getInstance('close');
        });
//	 $("body").on('click','#btn555',function(){ 
//          
//           $.fancybox.getInstance('close');
//            $.fancybox.open({
//                src: '<?=base_url();?>floor/floordeleteAll',
//                type: 'ajax',
//                ajax: {
//                    settings: {data: 'ABC', type: 'POST'}
//                },
//                opts: {
//                    afterShow: function (instance, current) {
//                        console.info('done!');
//                    },
//                     touch: false
//                }
//            });
//            
//        });
</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>