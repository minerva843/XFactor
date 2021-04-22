<style>
.fancybox-close-small{
	display:none!important;
}
.star-program input.smalimput {
    width: 8%;
    margin-left: 16px;
}
.star-program{padding-left: 0px;}
.star-program label.col-form-label {
    padding-left: 0px;
    text-align: center;
}
.star-program label.col-form-label {
    font-size: 12px;
    font-weight: normal;
    width: 6%;
}
.star-program label.col-form-label:after {
    display: none;
}

.ui-datepicker-current{
    display:none !important;
}
 

</style>

 

 
<div class="main-section floor_steps" id="add-floor">  
    <div class="container">
 <form method="POST" action="<?=base_url();?>project/add/<?php if(!empty($data1)){ echo $data1->id; }?>" class="register-form_1" id="register-form122" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS AND REGISTRATION FORMS (ADD)</h2>      
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">   

            <div class="row">
				   <div class="col-md-9">   
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3> PROJECT INFO</h3>  
					</div>
					</div>	
                    <div class="zone-info floor-planadd"> 				
                       
                            <?php echo $success_msg; ?>
						<?php echo $error_msg; ?>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
							<div class="col-sm-5">
								<p><?=$group->group_name;?></p>
								<input type="hidden" id="group" name="group" class="group" value="<?=$group->id;?>">
								  

							</div>	     
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT NAME</label>
							<div class="col-sm-5">
								<input type="text" name="project_name" maxlength="50" class="project_name" value="<?php if(!empty($data1)){ echo $data1->project_name; }?>" class="form-control" id="project_name" placeholder="ENTER PROJECT NAME (MAXIMUM 50 CHARACTERS)">
							</div>
						</div>
						
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT TYPE</label>
							<div class="col-sm-5">
							<?php if(empty($data1->project_type)){ ?>
								<select name="project_type" id="project_type" class="project_type">
									<option value="">SELECT A PROJECT TYPE</option>
									<option value="ONLINE REG REQUIRED" <?php if(!empty($data1->project_type == 'ONLINE REG REQUIRED')){ echo "selected"; }?>>ONLINE REG REQUIRED</option>
									<option value="ONLINE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'ONLINE NO REG REQUIRED')){ echo "selected"; }?>>ONLINE NO REG REQUIRED</option>
									<option value="ONSITE REG REQUIRED" <?php if(!empty($data1->project_type == 'ONSITE REG REQUIRED')){ echo "selected"; }?>>ONSITE REG REQUIRED</option>
									<option value="ONSITE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'ONSITE NO REG REQUIRED')){ echo "selected"; }?>>ONSITE NO REG REQUIRED</option>
									<option value="HYBRID REG REQUIRED" <?php if(!empty($data1->project_type == 'HYBRID REG REQUIRED')){ echo "selected"; }?>>HYBRID REG REQUIRED</option>
									<option value="HYBRID NO REG REQURIED" <?php if(!empty($data1->project_type == 'HYBRID NO REG REQURIED')){ echo "selected"; }?>>HYBRID NO REG REQURIED</option>
									<option value="PROPERTY REG REQUIRED" <?php if(!empty($data1->project_type == 'PROPERTY REG REQUIRED')){ echo "selected"; }?>>PROPERTY REG REQUIRED</option>
									<option value="PROPERTY NO REG REQUIRED" <?php if(!empty($data1->project_type == 'PROPERTY NO REG REQUIRED')){ echo "selected"; }?>>PROPERTY NO REG REQUIRED</option>
									<option value="SHOP REG REQUIRED" <?php if(!empty($data1->project_type == 'SHOP REG REQUIRED')){ echo "selected"; }?>>SHOP REG REQUIRED</option>
									<option value="SHOP NO REG REQUIRED" <?php if(!empty($data1->project_type == 'SHOP NO REG REQUIRED')){ echo "selected"; }?>>SHOP NO REG REQUIRED </option>
									<option value="VIRTUAL SHOP REG REQUIRED" <?php if(!empty($data1->project_type == 'VIRTUAL SHOP REG REQUIRED')){ echo "selected"; }?>>VIRTUAL SHOP REG REQUIRED</option>
									<option value="VIRTUAL SHOP NO REG REQUIRED" <?php if(!empty($data1->project_type == 'VIRTUAL SHOP NO REG REQUIRED')){ echo "selected"; }?>>VIRTUAL SHOP NO REG REQUIRED</option>
									<option value="VENUE REG REQUIRED" <?php if(!empty($data1->project_type == 'VENUE REG REQUIRED')){ echo "selected"; }?>>VENUE REG REQUIRED</option>
									<option value="VENUE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'VENUE NO REG REQUIRED')){ echo "selected"; }?>>VENUE NO REG REQUIRED</option><
									
									
									<option value="DEMO REG REQUIRED" <?php if(!empty($data1->project_type == 'DEMO REG REQUIRED')){ echo "selected"; }?>>DEMO REG REQUIRED</option>
									<option value="DEMO NO REG REQUIRED" <?php if(!empty($data1->project_type == 'DEMO NO REG REQUIRED')){ echo "selected"; }?>>DEMO NO REG REQUIRED</option>
									
								</select>
							<?php }else{?>
                                                            <div class="1_to_jd" id="project_typetxt" data-type="<?=$data1->project_type?>" style="padding-top: 5px;font-size: 12px; color:#000000!important;"><?=$data1->project_type?></div>
							<?php }?>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">VENUE NAME</label>
							<div class="col-sm-5">
								<input type="text" name="venue_name" class="venue_name" value="<?php if(!empty($data1)){ echo $data1->venue_name; }?>" class="form-control" id="venue_name" placeholder="Enter VENUE NAME">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">VENUE ADDRESS</label>
							<div class="col-sm-5">
								
		 <textarea rows="3" cols="50" id="venue_address" value="<?php if(!empty($data1)){ echo $data1->venue_address; }?>" class="venue_address" name="venue_address"   placeholder="ENTER VENUE ADDRESS"><?php if(!empty($data1)){ echo $data1->venue_address; }?></textarea> 
								<!-- <input type="text" name="floor_plan_name" class="floor_plan_name" value="" class="form-control" id="floor_plan_name" placeholder="Enter floor plan name"> -->
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">VENUE POSTAL CODE</label>
							<div class="col-sm-3" style="padding-left: 1px;">
								<select name="country" id="country" class="country">
									<option value="">SELECT A COUNTRY</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['name'];?>" <?php if(!empty($data1->venue_country == $row['name'])){ echo "selected"; }?>><?php echo $row['name'];?></option>
									<?php }?> 
								</select>
							</div>
							<div class="col-sm-2 post-code">
								<input type="text" name="venue_postal_code" class="venue_postal_code" value="<?php if(!empty($data1)){ echo $data1->venue_postal_code; }?>" maxlength="8" class="form-control" id="venue_postal_code" placeholder="Enter postal code">
							</div>
						</div>
                        
<!--                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label">SETUP START DATE & TIME  </label>
							
							 
							<div class="col-md-1 setup-start-date">
							   <div class="form-group row  pro_type">
							<label for="colFormLabelLg" class="col-sm-6 col-form-label">YEAR </label>
							<div class="col-sm-6">
							<input type="text" readonly="" value="<?php //if(!empty($data1->setup_start_date_time)){ echo date('Y-m-d\TH:i', strtotime($data1->setup_start_date_time)); } ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="Date/Time" class="valid setup_end_date_time" aria-invalid="false">
							</div> 
							</div> 
							</div>
							
							<div class="col-md-1 setup-start-date">
							   <div class="form-group row  pro_type">
							<label for="colFormLabelLg" class="col-sm-6 col-form-label">Month </label>
							<div class="col-sm-6">
							<input type="text" readonly="" value="<?php //if(!empty($data1->setup_start_date_time)){ echo date('Y-m-d\TH:i', strtotime($data1->setup_start_date_time)); } ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="Date/Time" class="valid setup_end_date_time" aria-invalid="false">
							</div> 
							</div> 
							</div>


							<div class="col-md-1 setup-start-date">
							   <div class="form-group row  pro_type">
							<label for="colFormLabelLg" class="col-sm-6 col-form-label">Day </label>
							<div class="col-sm-6">
							<input type="text" readonly="" value="<?php //if(!empty($data1->setup_start_date_time)){ echo date('Y-m-d\TH:i', strtotime($data1->setup_start_date_time)); } ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="Date/Time" class="valid setup_end_date_time" aria-invalid="false">
							</div> 
							</div> 
							</div>


							<div class="col-md-1 setup-start-date">
							   <div class="form-group row  pro_type">
							<label for="colFormLabelLg" class="col-sm-6 col-form-label">Hour </label>
							<div class="col-sm-6">
							<input type="text" readonly="" value="<?php //if(!empty($data1->setup_start_date_time)){ echo date('Y-m-d\TH:i', strtotime($data1->setup_start_date_time)); } ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="Date/Time" class="valid setup_end_date_time" aria-invalid="false">
							</div> 
							</div> 
							</div>
  

							<div class="col-md-2 setup-start-date">
							   <div class="form-group row  pro_type">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">Minute </label>
							<div class="col-sm-4">
							<input type="text" readonly="" value="<?php //if(!empty($data1->setup_start_date_time)){ echo date('Y-m-d\TH:i', strtotime($data1->setup_start_date_time)); } ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="Date/Time" class="valid setup_end_date_time" aria-invalid="false">
							</div> 
							</div> 
							</div>              
                                                    
        </div>-->

						<div class="form-group row">
						 
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">SETUP START DATE & TIME  </label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->setup_start_date_time !== 'NOT APPLICABLE'){
							?>
								<div class="pro_type">
								
                                                            <input type="text"    name="setup_start_date_time" maxlength="16" value="<?php if(!empty($data1)){ echo $data1->setup_start_date_time; }?>" id="setup_start_date_time" placeholder="YYYY-MM-DD HH:MM" class="valid setup_start_date_time" aria-invalid="false">
                                                            <i id="setup_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							    </div>
							     
								 <?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?>
							<div class="pro_type_show" style="display:none"><p>Not Applicable.</p></div>
							</div>
						 
						</div>
 
						<div class="form-group row">
						
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">SETUP END DATE & TIME </label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->setup_end_date_time !== 'NOT APPLICABLE'){
							?>
                                                            <div class="pro_type">
                                                            <input type="text"    name="setup_end_date_time" id="setup_end_date_time" value="<?php if(!empty($data1)){ echo $data1->setup_end_date_time; }?>" placeholder="YYYY-MM-DD HH:MM" class="valid setup_end_date_time" >
							 <i id="setup_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							</div>
                                                       <?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?><div class="pro_type_show" style="display:none"><p>Not Applicable.</p></div>
                                                        </div>
						
						</div>  
					   <div class="form-group row ">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT START DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
                                                            <input type="text"  readonly="" value="<?php if(!empty($data1)){ echo $data1->event_start_date_time; }?>"  name="event_start_date_time" id="event_start_date_time" placeholder="YYYY-MM-DD HH:MM" class="valid event_start_date_time" aria-invalid="false">
							 <i id="project_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							
                                                        </div>
						</div>
						<div class="form-group row ">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT END DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
								<input type="text" readonly=""  placeholder="YYYY-MM-DD HH:MM" value="<?php if(!empty($data1)){ echo $data1->event_end_date_time; }?>" name="event_end_date_time" id="event_end_date_time" class="valid event_end_date_time" > 
							 <i id="project_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							
                                                        </div>
                                                        <div class="col-md-3"  ><button  class="date-clear-btn" type="button" style="display:none;"  id="btn_clear">NO END DATE</button></div>
						</div>
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">STRIKE START DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->strike_start_date_time !== 'NOT APPLICABLE'){
							?>
							<div class="pro_type">
								<input type="text" readonly="" id="strike_start_date_time" value="<?php if(!empty($data1)){ echo $data1->strike_start_date_time; }?>" name="strike_start_date_time" placeholder="YYYY-MM-DD HH:MM" class="valid strike_start_date_time" aria-invalid="false">
							 <i id="strike_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							 </div>
							 <?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?><div class="pro_type_show" style="display:none"><p>Not Applicable.</p></div>
                                                        </div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">STRIKE END DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->strike_end_date_time !== 'NOT APPLICABLE'){
							?>
							<div class="pro_type">
								<input type="text"  readonly="" name="strike_end_date_time" value="<?php if(!empty($data1)){ echo $data1->strike_end_date_time; }?>" id="strike_end_date_time" placeholder="YYYY-MM-DD HH:MM" class="valid strike_end_date_time" aria-invalid="false">
							<i id="strike_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							</div>
							<?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?><div class="pro_type_show" style="display:none"><p>Not Applicable.</p></div>
                                                        </div>
						</div>
                        
                         
                    </div>  
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                
				                
                            </ul>  
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1">CURRENTLY SELECTED :<p> PROJECT (ADD)
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF 3</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="btn5987654">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn509877">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

          <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>



 
  <script>
$(document).ready(function(){
    
 $('#project_typetxt').change(); 
 
   var val=$("#project_typetxt").attr("data-type");
  if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED'){
	//$('.pro_type').show();
        $("#btn_clear").css("display","block");
	
  }else{
	 // $('.pro_type').hide();
          $("#btn_clear").css("display","none");
  }
    
$("#btn_clear").click(function(){
   
 $("#event_end_date_time").val("");  
    
});
	
$('#project_type').on('change', function() {
  var val=$(this).val();
  if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED' || val=='VIRTUAL SHOP REG REQUIRED' || val=='VIRTUAL SHOP NO REG REQUIRED' || val==''){
	$('.pro_type').hide();
	$('.pro_type_show').show();
        $("#btn_clear").css("display","block");
        
	
  }else{
	  $('.pro_type').show();
	  $('.pro_type_show').hide();
          $("#btn_clear").css("display","none");
  }
  
});

//
//  $('#setup_start_date_time').inputmask("datetime",{
//    mask: "y-2-1 h:s", 
//    placeholder: "YYYY-MM-DD HH:MM", 
//    leapday: "-02-29", 
//    separator: "-", 
//    alias: "yyyy-mm-dd"
//  });

var startDateTextBox = $('#setup_start_date_time');
var endDateTextBox = $('#setup_end_date_time');
///$('.datetimepicker2').datetimepicker('show');


$("body").on('click','#setup_start_icon',function(){
   // alert();
   $('#setup_start_date_time').focus(); 
});

$("body").on('click','#setup_end_icon',function(){
  //  alert();
   $('#setup_end_date_time').focus(); 
});


//$('#setup_start_date_time').keyup(function() {
  //var textlen = 16 - $(this).val().length;
  //$('#rchars').text(textlen);
//});



startDateTextBox.datetimepicker({
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (endDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		endDateTextBox.datetimepicker('setDate', testStartDate);
		}
		else {
			//endDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
	}
});
endDateTextBox.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (startDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		startDateTextBox.datetimepicker('setDate', testEndDate);
		}
		else {
			//startDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});



var event_start_date_time = $('#event_start_date_time');
var event_end_date_time = $('#event_end_date_time');


$("body").on('click','#project_start_icon',function(){
   // alert();
   $('#event_start_date_time').focus(); 
});

$("body").on('click','#project_end_icon',function(){
    //alert();
   $('#event_end_date_time').focus(); 
});

event_start_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (event_end_date_time.val() != '') {
			var testStartDate = event_start_date_time.datetimepicker('getDate');
			var testEndDate = event_end_date_time.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		event_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
		//	event_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//event_end_date_time.datetimepicker('option', 'minDate', event_start_date_time.datetimepicker('getDate') );
	}
});
event_end_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (event_start_date_time.val() != '') {
			var testStartDate = event_start_date_time.datetimepicker('getDate');
			var testEndDate = event_end_date_time.datetimepicker('getDate');
			// if (testStartDate > testEndDate)
			//	event_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
                   // alert();
			//event_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//event_start_date_time.datetimepicker('option', 'maxDate', event_end_date_time.datetimepicker('getDate') );
	}
});








var strike_start_date_time = $('#strike_start_date_time');
var strike_end_date_time = $('#strike_end_date_time');

$("body").on('click','#strike_start_icon',function(){
   // alert();
   $('#strike_start_date_time').focus(); 
});

$("body").on('click','#strike_end_icon',function(){
    //alert();
   $('#strike_end_date_time').focus(); 
});

strike_start_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (strike_end_date_time.val() != '') {
			var testStartDate = strike_start_date_time.datetimepicker('getDate');
			var testEndDate = strike_end_date_time.datetimepicker('getDate');
			//if (testStartDate > testEndDate)
			//	strike_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
		//	strike_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//strike_end_date_time.datetimepicker('option', 'minDate', strike_start_date_time.datetimepicker('getDate') );
	}
});
strike_end_date_time.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (strike_start_date_time.val() != '') {
			var testStartDate = strike_start_date_time.datetimepicker('getDate');
			var testEndDate = strike_end_date_time.datetimepicker('getDate');
			//if (testStartDate > testEndDate)
			 //    strike_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
			// strike_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//strike_start_date_time.datetimepicker('option', 'maxDate', strike_end_date_time.datetimepicker('getDate') );
	}
});




});
</script>

<script>


$(document).ready(function(){
			
				
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?=base_url();?>project/index",
				ajax: { 
				   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
				},
				touch: false,
				 clickSlide: false,
				clickOutside: false
				
				});
            
        });
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});


 $.validator.setDefaults({
	    submitHandler: function(){
		
	var group=$('#group').val();
	var project_name=$('#project_name').val();
	var project_type=$('#project_type').val();
	var venue_name=$('#venue_name').val();
	var venue_address=$('#venue_address').val();
	var country=$('#country').val();
	var venue_postal_code=$('#venue_postal_code').val();
	var setup_start_date_time=$('#setup_start_date_time').val();
	var setup_end_date_time=$('#setup_end_date_time').val();
	var event_start_date_time=$('#event_start_date_time').val();
	var event_end_date_time=$('#event_end_date_time').val();
	var strike_start_date_time=$('#strike_start_date_time').val();
	var strike_end_date_time=$('#strike_end_date_time').val();

//alert(strike_start_date_time);

var formdata = new FormData();
var url="<?php echo base_url();?>project/add_post_step1/<?php if(!empty($data1)){ echo $data1->id; }?>"; 
 formdata.append('group', group);
 formdata.append('project_name', project_name);
 formdata.append('project_type', project_type);
 formdata.append('venue_name', venue_name);
 formdata.append('venue_address', venue_address);
 formdata.append('country', country);
 formdata.append('venue_postal_code', venue_postal_code);
 formdata.append('setup_start_date_time', setup_start_date_time);
 formdata.append('setup_end_date_time', setup_end_date_time);
 formdata.append('event_start_date_time', event_start_date_time);
 formdata.append('event_end_date_time', event_end_date_time);
 formdata.append('strike_start_date_time', strike_start_date_time);
 formdata.append('strike_end_date_time', strike_end_date_time);

console.log(formdata);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
			var data=$.trim(data);
			$.fancybox.getInstance('close');
                    
			if (data) {
                            
						$.fancybox.open({
						maxWidth  : 800,
						fitToView : true,
						width     : '100%',
						height    : 'auto',
						autoSize  : true,
						type        : "ajax",
						src         : "<?=base_url();?>project/addstep2project/"+data,
						ajax: { 
						   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
						},
						touch: false,
						 clickSlide: false,
						clickOutside: false
						
						});
						
						// $.fancybox.open({
                            // src: '<?php echo base_url();?>project/projectError/'+data ,
                            // type: 'ajax',
                            // ajax: { 
                             // settings: { data : 'ABC', type : 'POST' }
                           // },    
                            // opts: {
                                // afterShow: function (instance, current) {
                                    // console.info('done!');
                                // },
                                  // touch: false,
                                  // clickSlide: false,
                                  // clickOutside: false
                                  
                            // }
                        // });
                             
			}
		}
	});

        
		}
	});

 
	$("#register-form122").validate({
		rules: {
							
			group: "required",
			project_name: {
                            required : true,
                            maxlength : 50,
                        },
			project_type:"required",
			venue_name:"required", 
			venue_address:"required",
			country:"required",
			venue_postal_code:{
			required:true, 
			digits:true,
		},
			event_start_date_time:"required",
                        event_end_date_time:{
                                required:function(){
                                
                            //    $('#project_type').on('change', function() {
                                 var val=$("#project_type").val();
                                 var checkvar = '<?=$data1->project_type?>';
                                 if(checkvar){
                                      let val1=$("#project_typetxt").attr("data-type");
                                //   alert(val1);
                                      if(val1=='SHOP REG REQUIRED' || val1=='SHOP NO REG REQUIRED' || val1=='VENUE REG REQUIRED' || val1=='VENUE NO REG REQUIRED' || val1=='PROPERTY REG REQUIRED' || val1=='PROPERTY NO REG REQUIRED' || val1=='VIRTUAL SHOP REG REQUIRED' || val1=='VIRTUAL SHOP NO REG REQUIRED' || val1==''){
                                        
                                        return false;
                                        
                                        
                                    }else{
                                        return true;
  
                                    }   
                                 }else{
                                  
                                     if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED' || val=='VIRTUAL SHOP REG REQUIRED' || val=='VIRTUAL SHOP NO REG REQUIRED' || val==''){
                                        
                                        return false;
                                        
                                        
                                    }else{
                                        return true;
                                        
                                        
                                    }
                                     
                                 }
                                 
                                }
                        },
			strike_start_date_time:"required",
                        strike_end_date_time:"required",
                        setup_start_date_time:"required",
                        setup_end_date_time:"required"

		},
		errorPlacement: function(){
                               return false;
                         } 
		// messages: {
			
			// group: "ENSURE THAT A GROUP IS SELECTED.",
			// project_name: "ENSURE THAT PROJECT NAME IS FILLED IN.",
			// project_type: "ENSURE THAT A PROJECT TYPE IS SELECTED.",
			// venue_name: "ENSURE THAT VENUE IS FILLED IN.",
			// venue_address: "ENSURE THAT VENUE ADDRESS IS FILLED IN.",
			// country: "ENSURE THAT A COUNTRY IS SELECTED.",
			// venue_postal_code: "ENSURE THAT VENUE POSTAL CODE IS FILLED IN.",
			// setup_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// setup_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// event_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// event_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// strike_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// strike_end_date_time:"ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN" 
		// }
	});
});
</script>
<script>
	$(document).ready(function(){

  $("select").change(function(){
    if ($(this).val()=="") $(this).css({color: "#6c757d"});
    else $(this).css({color: "#000000"});
  });
  
});	
</script>

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>
