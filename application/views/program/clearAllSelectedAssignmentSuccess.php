<style>
.fancybox-close-small{
	display:none!important;
}
#add-floor .table_info.floor-step h6 {
    padding-top: 12px;
    padding-bottom: 12px;
}

</style>
<?php 
session_start();
?>
<div class="main-section" id="add-floor"> 
    <div class="container">
		
        <div class="top-header">
            <div class="row">
                <div class="col-md-9"><?php //print_r($zone[0]);  ?>  
                    <h2>PROGRAM (CLEAR ALL ASSIGNMENT)<span class="sucess">SUCCESSFUL </span></h2>
                    <p><b><?php echo date('Ymd hi'); ?>h.</b> ALL PROGRAM ASSIGNMENTS HAVE BEEN CLEARED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
			<div class="row">
			<div class="select-box">

					</div>
					</div>
				<div class="row">
					<div class="header-title">
									<div class="leftbox-top">
					<h5>ALL PROGRAM ASSIGNMENTS TO BE CLEARED ARE LISTED BELOW : </h5>
					</div>
					</div>
					</div>	
                    <div class="floor-sec floor-add">
					<div class="tab-listing">
                    <div class="zone-info">
					<div class="row" id="printJS-form-program-clearall">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					<?php foreach($_SESSION['DeleteData'] as $data){?>
                        <h3>PROGRAM INFO</h3>  				
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM STATUS </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php
									$program_status=''; 
									if($data['program_start_date_time']>date('Y-m-d')){
									$program_status="NOT START";
								}
								if($data['program_end_date_time']<date('Y-m-d')){
									$program_status="END";
								}
								if($data['program_start_date_time']== date('Y-m-d')){
									$program_status="LIVE";
								}
								echo $program_status;
									?></div>
                                </div>
                            </div>
						   <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM START DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_start_date_time'] ?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM END DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_end_date_time']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM PRESENTER</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php 
									$programPresenter='';
									$mydata=json_decode($data['program_presenter']);
									foreach($mydata as $val){
										$this->db->select('*');
										$this->db->from('xf_mst_guest_info');
										$this->db->where('id',$val);
										$query = $this->db->get();
										$res = $query->row();
										$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
									}
									echo $programPresenter;
									?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM LOCATION</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_location']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM TITLE</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_title']?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM DETAILS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_details']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM VISUAL</label>
								<?php $this->db->select('*');
									$this->db->from('xf_mst_files');
									$this->db->where('xmanage_id',$data['program_id']);
									$query = $this->db->get();
									$files = $query->result();
									?>
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
							<h3>PROGRAM CREATION INFO</h3>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['group_name']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP STATUS</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['group_status']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['proj_id']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FLOOR PLAN ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['floor_id']?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM ID</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['program_id']?></div>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_date_time']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_ip_address']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_xmanage_id']?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?=$data['created_username']?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_date_time'])){ echo $data['last_edited_date_time']; }else{ echo $last_edited_date_time= "NIL";  }?></div>
                                </div>
                            </div>

                            <div class="form-group row"> 
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_ip_address'])){ echo $data['last_edited_ip_address']; }else{ echo $last_edited_ip_address= "NIL";  }?></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID  </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_xmanage_id'])){ echo $data['last_edited_xmanage_id']; }else{ echo $last_edited_xmanage_id= "NIL";  }?></div>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED User Name </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?php if(!empty($data['last_edited_username'])){ echo $data['last_edited_username']; }else{ echo $last_edited_username= "NIL";  }?></div>
                                </div>
                            </div>
					<?php }?>

						
						
						</div>  
						</div>  
						</div>  
						</div>  
						</div> 
                        
                    </div>  
                  
                           
                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">
						  
						  <div class="table-content">	  
						  <ul class="nav nav-tabs">
							<li ><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <li class="active"><a data-toggle="tab" href="" class="allassignments">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li>
						  </ul>
						  <div class="table_info floor-step">
						  
						  <p class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;font-weight: bold;" ><?php if($_SESSION['Singledata'] == 1){
									echo $_SESSION['SelectedDelete'][0]->program_title;
								}else{
									echo "MULTIPLE PROGRAMS";
								}?></span></p>
								
							<div id="menu1" class="tab-pane fade"> 
							  
							</div>
						  </div>
						  </div>
						  </div>
						  </form>
						 <div class="form-submit">
                            <!--input type="submit" value="Back" class="action-btn" name="SuccessBack" id="btn5"-->
							<input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-program-clearall', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="submit" value="DONE" class="action-btn" name="submit" id="btn555">
                        </div>
						</div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  


    </div>
   
    
<?php session_unset('DeleteData');?>
<?php session_unset('SelectedDelete');?>
<?php session_unset('SelectedIds');?>
</div>
 <script>
function myFunction() {
  var x = document.getElementById("myFile");
  x.disabled = true;
}

       
		$("body").on('click','#btn555',function(){
          
           $.fancybox.getInstance('close');
         
			$.fancybox.open({
			maxWidth  : 800,
			fitToView : true, 
			width     : '100%', 
			height    : 'auto',
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/allassignments",
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
</script>