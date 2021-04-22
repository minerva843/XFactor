
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>CONTENT SET (DELETE <?php if($selected){  }else{echo 'ALL';} ?>) </h2>
                   <p style="color:red">DELETE MEANS ALL SELECTED CONTENT SET AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
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
					<h5> ALL CONTENT SET TO BE DELETED ARE LISTED BELOW : <?php echo $project_select; ?></h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan">
					<div class="col-md-12" id="printJS-form">
			<?php foreach($data_files_content  as $data){?>
			 <div class="row">
					 
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
                        <h3> CONTENT SET VIDEO / IMAGE CONTENT INFO </h3>
                        <form>
                              
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">VIDEO FILE COUNT</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php  echo  count($data['videos']); ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">VIDEO FILES & SIZE  </label>
                                <div class="col-sm-8">
                                   
                                    <?php foreach ($data['videos'] as $video){ ?>
                                        
                                    <div class="zone-label"><?php    echo $video['file_name']; ?>   <?php echo  round(($video['file_size']/1024)/1024,2) .'MB' ;?>  </div>
                                        
                                    <?php } ?>
                                    
                                    
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">IMAGE FILE COUNT  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php  echo  count($data['img']); ?> </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">IMAGE FILE & SIZE  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['img'][0]['file_name']?>   <?php echo  round(($data['img'][0]['file_size']/1024/1024),2) .'MB' ;?> </div>
                                </div>
                            </div>

                          
 
<?php ///print_r($data);  ?>
                            <h3 class="m-t4"> CONTENT SET CREATION INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['group_id']?></div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label">ACTIVE</div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['project_id']?></div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['floor_plan_id']?></div>
                                </div>
                            </div>
                            
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">ZONE ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['zone_id']?></div>
                                </div>
                            </div>


                                <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CONTENT SET ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['x_content_id']?></div>
                                </div>
                            </div>
			 		
							
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['created_date_time']?></div>
                                </div>
                            </div>
                            
                            
                           							
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['ctreated_id_address']?></div>
                                </div>
                            </div> 
                            
                            							
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['created_xmanage_id']?></div>
                                </div>
                            </div>
                            
                                                  <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['created_username']?></div>
                                </div>
                            </div>      
                            
                             <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME : </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['last_edited_date_time']?></div>
                                </div>
                            </div>
                                                         <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  : </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['last_edited_id_address']?></div>
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
                                
                                <p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;" >ALL CONTENT SET</span></p>
								<br>
                          <p><b>TO CHECK AGAIN BEFORE <span style="color:red"> DELETE  <?php if($selected){echo 'SELECTED';}else{echo 'ALL';} ?></span> ,  CLICK BACK.</b></p>
					<p><b>ARE YOU SURE YOU WANT TO <span style="color:red">DELETE <?php if($selected){echo 'SELECTED';}else{echo 'ALL';} ?></span> ,   CONTENT SET?</b></p>

                                    
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>
							
                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5backtolist" >Back</a>
                                <input type="submit" value="<?php if($selected){echo 'DELETE';}else{echo 'DELETE ALL';} ?>" class="action-btn" name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  


    </div>

</div>
<script>
function myFunction() {
  var x = document.getElementById("myFile");
  x.disabled = true;
}

        $("body").on('click','#btn5backtolist',function(){
          
           $.fancybox.getInstance('close');
           
         $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>Content/showAllData",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
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
    
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>content/deleteSelectedSuccess",
        ajax: { 
           settings: { data : 'ids='+strids+'&project=<?php echo $project_select; ?>', type : 'POST' }
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
