<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>FLOOR PLANS (DELETE) </h2>
                   <p style="color:red">DELETE MEANS ALL SELECTED FLOOR PLANS AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
				<div class="leftbox-top">
					<h5>ALL SELECTED FLOOR PLANS TO BE DELETED ARE LISTED BELOW :</h5>
					</div>
                    
                    <div class="zone-info">
					<?php foreach($_SESSION['SelectedDelete'] as $data){?>
                        <h3> FLOOR PLAN CREATION INFO </h3>
                        <form>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-5">
                                    <div class="zone-label">CUSTOMER 01 GROUP</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">GROUP STATUS   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">LIVE / SUSPENDED</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">PROJECT ID   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">XCPRO123456789012</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN ID  </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['floor_plan_id']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['created_ip_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['created_username']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_date_time'])){ echo $data['last_edited_date_time']; }else{ echo $last_edited_date_time= "NIL";  }?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_ip_address'])){ echo $data['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_xmanage_id'])){ echo $data['last_edited_xmanage_id']; }else{ echo $last_edited_xmanage_id= "NIL";  }?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">LAST EDITED User Name </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_username'])){ echo $data['last_edited_username']; }else{ echo $last_edited_username= "NIL";  }?></div>
                                </div>
                            </div>

                            <h3 class="m-t4"> FLOOR PLAN INFO </h3>  

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN NAME </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['floor_plan_name']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN GRID TYPE    </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php if($data['floor_plan_grid_type']==1){ echo $grid= '16 x 9'; }elseif($data['floor_plan_grid_type'] ==2){ echo $grid= '32 x 18'; }elseif($data['floor_plan_grid_type']==3){ echo $grid= '48 x 27'; }?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN DROP IN POINT   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?php $floor_plan_drop_point=explode(',',$data['floor_plan_drop_point']);
							echo $drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];?></div>
                                </div>
                            </div> 
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR FILE NAME   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">
									<?=$data['file_name']?>
									</div>
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN FILE TYPE   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">
									<?=$data['file_type']?>
									</div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">FLOOR PLAN FILE SIZE   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">
									<?=$data['file_size']?>KB
									</div>
                                </div>
                            </div>
							
							

                            <h3 class="m-t4"> FLOOR PLAN SCALE INFO</h3> 

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">EACH SQUARE</label>
                                <div class="col-sm-5">
                                    <div class="zone-label"><?=$data['each_square']?> METER </div>
                                </div>
                            </div>   

                        </form>
						<?php }?>
                    </div>  
                </div>  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				
                            </ul>
                            <div class="table_info floor-step">
                                
                                <p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;font-weight: bold;" >ALL FLOOR PLANS</span></p>
								<br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red">DELETE</span>,CLICK BACK.</b></p>
						    <p><b>ARE YOU SURE YOU WANT TO <span style="color:red">DELETE </span>, THE SELECTED FLOOR PLANS?</b></p>

                                
                               
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit"> 
                                <a class="action-btn" id="btn5" >Back</a>
                                <input type="submit" value="DELETE" class="action-btn" name="submit" id="btn555">
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

        $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>floor/index',
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
                src: '<?=base_url();?>floor/floorplanselecteddelete',
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
<style>
        .fancybox-close-small{
        display:none;
    }
    
 </style>