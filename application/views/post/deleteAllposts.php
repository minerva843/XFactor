
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>POST (DELETE<?php if($selected){ }else{echo ' ALL';} ?>) </h2>
                   <p style="color:red">DELETE<?php if($selected){ }else{echo ' ALL';} ?> MEANS <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> POSTS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.
				  
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
					<h5> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> POSTS TO BE DELETED ARE LISTED BELOW : </h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
					
			<?php foreach($data  as $data1){?>
			 <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3>POST CREATION INFO</h3>
                        <form>
                              <?php $id=$data1->post_id;
							  $query=$this->db->get_where('xf_mst_files',array('xmanage_id'=>$id));
								$files=$query->result();
							  ?>
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
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">XCFP123456789012</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">XCFP123456789012</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">POST ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->post_id;?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">INFO ICON ID   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">XCFP123456789012</div>
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

                            <h3 class="m-t4"> POST INFO </h3>  

                           <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">POST STATUS</label>
                                <div class="col-sm-8">
                                   <div class="zone-label"><?php  echo $data1->post_availability; ?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">POST OWNER</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->guest_type.', '.$data1->username ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">POST TITLE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->post_title?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">POST DETAILS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->post_details?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">POST IMAGE / VIDEO FILE & SIZE</label>
								
                                <div class="col-sm-6">
								<table>
									<tbody>
									<?php
								foreach($files as $val){?>
										<tr>
											<td><?php 
										echo $val->file_name;
									?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
								
                                    
									
                                </div>
								
								
								<div class="col-sm-2">
								<table>
									<tbody>
									<?php 
								foreach($files as $val){?>
										<tr>
											<td><?php echo $val->file_size.'mb'; ?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
								
                                </div>
								
                            </div>

							
							
							 <h3 class="m-t4">POST EXTERNAL LINK INFO</h3>  

                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WEBSITE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label running_latter"><?php if($data1->website){ echo $data1->website; }else{ echo "NIL"; }?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">BUTTON URL</label>
                                <div class="col-sm-4">
                                    <div class="zone-label running_latter"><?php if($data1->btn_url){ echo $data1->btn_url; }else{ echo "NIL"; }?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PRICE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($data1->price){ echo $data1->price; }else{ echo 0; }?>
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SHOPPING CART ITEM ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label">XCSC12345678901234567890
									</div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ITEM STATUS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label">RECOMMENDED
									</div>
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
								 <li><a data-toggle="tab" href="">ALL ASSIGNMENTS</a></li>
								 <li><a data-toggle="tab" href="">ASSIGN POST</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" ><?php if($selected){ 
							if(count($data)>1){ echo 'MULTIPLE POSTS'; }else{ echo $data[0]->post_title; }
						  }else{echo 'ALL POSTS';} ?></span></p>
                         

                                    
                               
                                <div class="tab-content sucess-tab-page">
									<p><b>TO CHECK AGAIN BEFORE <span style="color:red;font-weight: 600 !important;"> DELETE <?php if($selected){ }else{echo 'ALL';} ?></span> , CLICK BACK.</b></p><br/>
									<p><b>ARE YOU SURE YOU WANT TO <span style="color:red;font-weight: 600 !important;">DELETE <?php if($selected){ echo '</span> THE SELECTED ';}else{ echo 'ALL </span>';}  ?>  POSTS?</b></p>   
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
        src         : "<?php echo base_url(); ?>post/index",
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


 $("body").on('click','#submitbtndelete',function(){
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
        src         : "<?php echo base_url(); ?>post/deleteSelectedSuccess",
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
