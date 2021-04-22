<style>
.fancybox-close-small{
	display:none!important;
}
#add-floor .table_info.floor-step h6 {
    padding-top: 12px;
    padding-bottom: 12px;
}
li a.nav-item.nav-link.extra {
    background: #fff !important;
    color: #000 !important;
}
</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
		
        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>FLOOR PLANS (ADD)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess floor-create_success06">
            <div class="row">
                <div class="col-md-9">
			
				<div class="row">
					<div class="header-title">
									<div class="leftbox-top">
					<h5> ALL FLOOR PLAN DETAILS THAT WAS ENTERED ARE LISTED BELOW:</h5>
					</div>
					</div>
					</div>	
                    <div class="floor-sec floor-add">
					<div class="tab-listing">
                    <div class="zone-info floor-text-spacing">
                        <h3 style="padding-top: 40px;"> FLOOR PLAN INFO </h3>  				

                            
						   <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php echo $data->project_name;
							   ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FLOOR PLAN NAME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->floor_plan_name?></div>
                                </div>
                            </div>
							<div class="form-group row floor-choose-image">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FLOOR PLAN IMAGE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->file_name?><?=$data->file_type?></div>
                                </div>
                            </div>
							<h3 class="m-t4  ftt-4">FLOOR PLAN SCALE INFO </h3>  
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EACH GRID REPRESENTS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data->each_square?> METER</div>
                                </div>
                            </div>

						</div>  
						</div>  
						</div>  

                        
                    </div>  
                  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">
						  
						  <div class="table-content">	
							<ul>						
					     <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                               <li> <a class="nav-item nav-link extra" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> 
                                 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
						</ul>
		                 <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="table_info floor-step">
						  <div class="current-status">
						    <p class="current-status-1" style="color:#00b050!important;">CURRENTLY SELECTED :<p> FLOOR PLAN (ADD)
                           </div>
						  <h5>STEP 1 OF 3</h5>
						  <div class="row">
						   <div class="progess-staus"></div>
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
						   <p class="mb-10"><?=$data->file_size.'KB';?> UPLOADED.</p>
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
							</div>
					
						  </div>
						  </form>
						 <div class="form-submit">
                            <!--input type="submit" value="Back" class="action-btn" name="SuccessBack" id="btn5"-->
							<a class="action-btn" id="btn5" >BACK</a>
							
							<input type="submit" value="Next" class="action-btn" name="submit" id="btn555">
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
                src: '<?=base_url();?>floor/addStep1FloorPlans/<?php echo $data->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false,
					 		 clickSlide: false,
        clickOutside: false
                }
            });
            
        });

		$("body").on('click','#btn555',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>floor/floorGrid/<?php echo $data->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false,
					 		 clickSlide: false,
        clickOutside: false
                }
            });
            
        });
</script>
