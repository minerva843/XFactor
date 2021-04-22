<style>
.fancybox-close-small{
	display:none!important;
}
#add-floor .table_info.floor-step h6 {
    padding-top: 12px;
    padding-bottom: 12px;
}

</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
		
        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>PROGRAM (EDIT)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess program-tabs register-form_1">
            <div class="row">
                <div class="col-md-9">
			<div class="row">
			<div class="select-box">

					</div>
					</div>
				<div class="row">
					<div class="header-title">
		        <div class="leftbox-top">
					<h5>ALL PROGRAM DETAILS THAT WERE ENTERED ARE LISTED BELOW :</h5>
					</div>
					</div>
					</div>	
                    <div class="floor-sec floor-add">
					<div class="tab-listing">
                    <div class="zone-info">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
                        <h3>PROGRAM INFO</h3>  				

                            
						   <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->program_start_date_time ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->program_end_date_time?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM DURATION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data1->program_duration. ' minutes';?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM LOCATION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if($data1->program_location){ echo $data1->program_location; }else{ echo "NIL";}?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM TITLE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->program_title?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM DETAILS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data1->program_details?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM VISUAL</label>
								
                                <div class="col-sm-6 each-file">
								<table>
									<tbody>
									<?php
								foreach($files as $val){?>
										<tr>
											<td style="padding-top: 5px;"><?php 
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
							

						
						
						</div>  
						</div>  
						</div>  
						</div>  
						</div>  
                        
                    </div>  
                  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">
						  
						  <div class="table-content">	  
						  <ul class="nav nav-tabs ">
							<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <li><a data-toggle="tab" href="" class="allassign">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li>
                            </ul>
						  <div class="table_info floor-step">
						  <div class="status">
						  <p class="status-1" style="color:#00b050!important;">CURRENTLY SELECTED : <p> <?=$data1->program_title?>
						  <h5>STEP 1 OF 2</h5>
						  </div>
						  <div class="progres-top">
						  <h5>UPLOAD <span class="success">SUCCESSFUL </span></h5>
						   
						   </div>
						   <div class="progress-bars">
						   <div class="progress-circle over50 p100">
						   <span>100%</span>
						   <div class="left-half-clipper">
							  <div class="first50-bar"></div>
							  <div class="value-bar"></div>
						   </div>
						</div> 
						</div> 						
						   <div class="progres-bottom">
						   <p class="mb-10">
						   <?php $sum=0;
						   
								foreach($files as $val){
									$sum+= $val->file_size;
								}
								echo $sum.'mb';
								?>
						   
						    UPLOADED.</p>
						   <p>UPLOAD TIME ELASPED : 1 MINUTES.</p>
						   
						   </div>
						   
						  <div class="tab-content floor-create">
							<div id="home" class="tab-pane fade in active">
							  
							</div>
							<div id="menu1" class="tab-pane fade">
							  
							</div>
						  </div>
						  </div>
						  </div>
						  </form>
						 <div class="form-submit">
                            <!--input type="submit" value="Back" class="action-btn" name="SuccessBack" id="btn5"-->
							<a class="action-btn" id="btn5" >Back</a>
							
							<input type="submit" value="Next" class="action-btn" name="submit" id="btn555">
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

        $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/editprogramstep1/<?php echo $data1->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
            
        });

		$("body").on('click','#btn555',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/editProgramGuestlist/<?php echo $data1->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
            
        });
</script>