
<div class="main-section"> 
    <div class="container">
<?php 
session_start();
?>
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>CONTENT SET (DELETE <?php if($selected){  }else{echo 'ALL';} ?>) <span style="color: #00b050;" >SUCCESSFUL</span> </h2>
                   <!--<p style="color:red">DELETE MEANS ALL CONTENT SET AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>-->
				   <p> <b class="loweditbt"><?php echo date('Ymd hi'); ?>h.</b> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> CONTENT SET HAVE BEEN DELETED.</p>
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
					<h5> <?php if($selected){ echo 'ALL SELECTED'; }else{echo 'ALL';} ?> CONTENT SET TO BE DELETED ARE LISTED BELOW : </h5>
					</div>  
                     <?php //print_r($data_files_content['content']); ?>
                    <div class="zone-info delete-floorplan">
			<div class="col-md-12" id="printJS-form-contentset-deleteall">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
			<?php foreach($_SESSION['data_files_content']  as $data){?>
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
                                    <div class="zone-label"><?=$data['content']['group_name']?></div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS    </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['group_status']?></div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['xproj']?></div>
                                </div>
                            </div>
                            
                            
                              <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['content']['flor_plan_id']?></div>
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
                                
                                <p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >ALL CONTENT SET</span></p>
								<br>
                     <!--<p><b>TO CHECK AGAIN BEFORE <span style="color:red">DELETE <?php if($selected){echo 'SELECTED';}else{echo 'ALL';} ?></span> , CLICK BACK.</b></p>
				<p><b>ARE YOU SURE YOU WANT TO <span style="color:red">DELETE <?php if($selected){echo 'SELECTED';}else{echo 'ALL';} ?></span> ,  CONTENT SET?</b></p>-->

                                
                               
                                <div class="tab-content sucess-tab-page">
                                
                                
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red;font-weight:bold !important;">DELETE <?php if($selected){ echo '';}else{ echo 'ALL';}  ?></span>, CLICK BACK.</b></p> <br>
									<p><b>ARE YOU SURE YOU WANT TO <span style="color:red;font-weight:bold !important;">DELETE <?php if($selected){ echo '</span> THE SELECTED ';}else{ echo 'ALL </span>';}  ?>
                                                            CONTENT SETS?</b></p>
                                
                                
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-contentset-deleteall', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn done" id="donedeleteSelected" name="submit">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  


    </div>

</div>
<?php session_unset('data_files_content');?>
<script> 


$(document).ready(function(){

        $("body").on('click','#donedeleteSelected',function(){
          
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
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        });
               
        });
        
        
        
        function myFunction() {
  var x = document.getElementById("myFile");
  x.disabled = true;
}


 $('body').on('click', '.close-btn', function () {
            $.fancybox.getInstance('close');
            location.reload();
        });
        
        


});




 
</script>
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>
