<style>

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
.floor-planadd textarea {
    width: 100%;
    background: transparent;
    border: 1px solid #afabab;
    min-height: 40px;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
	padding-bottom:0px;
}
.program-upload p.file-extan {
    font-size: 11px;
    color: #000;
}
.floor-planadd .star-program input.smalimput {
    width: 9%;
    margin-left: 15px;
    padding: 5px;
}
.col-sm-2.post-code{padding-left:0px;}
.floor-planadd textarea {
    resize: none;
}

.ui-datepicker-current{
    display:none !important;
}
</style>
<div class="main-section" id="add-floor">  
    <div class="container">
 <form method="POST" action="<?=base_url();?>project/add/<?php echo $data1->id;?>" class="register-form_1" id="register-form1111" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS & REGISTRATION FORMS (EDIT)</h2>
                   
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnstep1"></div>
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
					<div class="header-title"></div>
					</div>	
                    <div class="zone-info floor-planadd">
                        <h3> PROJECT INFO</h3>  				
                       <?php // print_r($data1); ?>
                            <?php echo $success_msg; ?>
						<?php echo $error_msg; ?>
						
						<input type="hidden" id="myid" value="<?=$data1->id?>">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
							<div class="col-sm-5">
                                                            <div class="1_to_jd"  style="padding-top: 5px;font-size: 12px;  color:#000000!important;"  ><?=$data1->group_name?></div>
								
							</div>	
						</div>
						<div class="form-group row"> 
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT NAME</label>
							<div class="col-sm-5">
								<input type="text" name="project_name" class="project_name" value="<?php if(!empty($data1)){ echo $data1->project_name; }?>" maxlength="50" class="form-control" id="project_name" placeholder="ENTER PROJECT NAME (MAXIMUM 50 CHARACTERS)">
							</div>
						</div>
						
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT TYPE</label>
							<div class="col-sm-5">
							<div class="1_to_jd" id="project_typetxt" style="padding-top: 5px;font-size: 12px; color:#000000!important;" data-type="<?=$data1->project_type?>" ><?=$data1->project_type?></div>
								<!--select name="project_type" id="project_type" class="project_type" readonly>
									<option value="">SELECT A PROJECT TYPE</option>
									<option value="ONLINE REG REQUIRED" <?php if(!empty($data1->project_type == 'ONLINE REG REQUIRED')){ echo "selected"; }?>>ONLINE REG REQUIRED</option>
									<option value="ONLINE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'ONLINE NO REG REQUIRED')){ echo "selected"; }?>>ONLINE NO REG REQUIRED</option>
									<option value="ONSITE REG REQUIRED" <?php if(!empty($data1->project_type == 'ONSITE REG REQUIRED')){ echo "selected"; }?>>ONSITE REG REQUIRED</option>
									<option value="ONSITE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'ONSITE NO REG REQUIRED')){ echo "selected"; }?>>ONSITE NO REG REQUIRED</option>
									<option value="HYBRID REG REQUIRED" <?php if(!empty($data1->project_type == 'HYBRID REG REQUIRED')){ echo "selected"; }?>>HYBRID REG REQUIRED</option>
									<option value="HYBRID NO REG REQURIED" <?php if(!empty($data1->project_type == 'HYBRID NO REG REQURIED')){ echo "selected"; }?>>HYBRID NO REG REQURIED</option>
									<option value="SHOP REG REQUIRED" <?php if(!empty($data1->project_type == 'SHOP REG REQUIRED')){ echo "selected"; }?>>SHOP REG REQUIRED</option>
									<option value="SHOP NO REG REQUIRED" <?php if(!empty($data1->project_type == 'SHOP NO REG REQUIRED')){ echo "selected"; }?>>SHOP NO REG REQUIRED </option>
									<option value="VENUE REG REQUIRED" <?php if(!empty($data1->project_type == 'VENUE REG REQUIRED')){ echo "selected"; }?>>VENUE REG REQUIRED</option>
									<option value="VENUE NO REG REQUIRED" <?php if(!empty($data1->project_type == 'VENUE NO REG REQUIRED')){ echo "selected"; }?>>VENUE NO REG REQUIRED</option>
									<option value="PROPERTY REG REQUIRED" <?php if(!empty($data1->project_type == 'PROPERTY REG REQUIRED')){ echo "selected"; }?>>PROPERTY REG REQUIRED</option>
									<option value="PROPERTY NO REG REQUIRED" <?php if(!empty($data1->project_type == 'PROPERTY NO REG REQUIRED')){ echo "selected"; }?>>PROPERTY NO REG REQUIRED</option>
									<option value="DEMO REG REQUIRED" <?php if(!empty($data1->project_type == 'DEMO REG REQUIRED')){ echo "selected"; }?>>DEMO REG REQUIRED</option>
									<option value="DEMO NO REG REQUIRED" <?php if(!empty($data1->project_type == 'DEMO NO REG REQUIRED')){ echo "selected"; }?>>DEMO NO REG REQUIRED</option>
									
								</select-->
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
						
						<div class="form-group row pro_type">
						
						
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">SETUP START DATE & TIME  </label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->setup_start_date_time !== 'NOT APPLICABLE'){
							?>
                                                            <input type="text"  readonly="" value="<?php echo $data1->setup_start_date_time; ?>" name="setup_start_date_time" id="setup_start_date_time" placeholder="YYYY:MM:DD HH:MM" class=" setup_start_date_time" aria-invalid="false">
							 <i id="setup_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							<?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?>
                                                            
							</div>
						
						</div>
						<div class="form-group row pro_type">
						
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">SETUP END DATE & TIME </label>
							<div class="col-sm-5 calendar_icon">
                            
							<?php if($data1->setup_end_date_time !== 'NOT APPLICABLE'){
							?>
                                                            <input type="text"  readonly="" value="<?php echo $data1->setup_end_date_time; ?>" name="setup_end_date_time" id="setup_end_date_time" placeholder="YYYY:MM:DD HH:MM" class=" setup_end_date_time" aria-invalid="false">
							<i id="setup_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							<?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?>
							</div>
						</div>
						
					   <div class="form-group row ">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT START DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
                                                        
                            <input type="text" readonly="" value="<?php echo $data1->event_start_date_time; ?>"  name="event_start_date_time" id="event_start_date_time" placeholder="YYYY:MM:DD HH:MM" class=" event_start_date_time" aria-invalid="false">
							<i id="project_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							
                                                        </div>
						</div>
						<div class="form-group row ">    
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PROJECT END DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
								<input type="text" readonly=""  style="" placeholder="YYYY:MM:DD HH:MM" value="<?php echo $data1->event_end_date_time; ?>" name="event_end_date_time" id="event_end_date_time" class=" event_end_date_time" aria-invalid="false">
							 <i id="project_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							
                                                        </div>
                                                        <div class="col-md-3"  ><button  type="button"  class="date-clear-btn" style="display:none;" id="btn_clear">NO END DATE</button></div>
						</div>
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">STRIKE START DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
							<?php if($data1->strike_start_date_time !== 'NOT APPLICABLE'){
							?>
							<input type="text" readonly=""  id="strike_start_date_time" value="<?php echo $data1->strike_start_date_time; ?>" name="strike_start_date_time" placeholder="YYYY:MM:DD HH:MM" class=" strike_start_date_time" aria-invalid="false">
							<i id="strike_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							<?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?>
							
								
							
                                                        </div>
						</div>
						<div class="form-group row ">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">STRIKE END DATE & TIME</label>
							<div class="col-sm-5 calendar_icon">
								
							<?php if($data1->strike_end_date_time !== 'NOT APPLICABLE'){
							?>
							<input type="text"  readonly=""  name="strike_end_date_time" value="<?php echo $data1->strike_end_date_time; ?>" id="strike_end_date_time" placeholder="YYYY:MM:DD HH:MM" class=" strike_end_date_time" aria-invalid="false">
							<i id="strike_end_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
							<?php }else{?>
							<div class="pro_type_show"><p>Not Applicable.</p></div>
							<?php }?>
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
   <!--                              <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> -->
                                 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
						</ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
				<p class="current-status-1"style="color:#00b050!important;">CURRENTLY SELECTED :<p> <?php if(!empty($data1)){ echo $data1->project_name; }?>
				 <h5>STEP 1 OF 3</h5>
                                 <p>EDIT THE DETAILS ON THE LEFT TAB.</p>
				 <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
				 </div>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="btn111">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn111">
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
    
    
$("#btn_clear").click(function(){
   
 $("#event_end_date_time").val("");  
    
});    
    
var startDateTextBox = $('#setup_start_date_time');
var endDateTextBox = $('#setup_end_date_time');

$("body").on('click','#setup_start_icon',function(){
   // alert();
   $('#setup_start_date_time').focus(); 
});

$("body").on('click','#setup_end_icon',function(){
  //  alert();
   $('#setup_end_date_time').focus(); 
});

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
		//	endDateTextBox.val(dateText);
		}
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
			var testEndDate = endDateTextBox.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		event_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
		//	event_start_date_time.val(dateText);
		}
	},
	onSelect: function (selectedDateTime){
		//event_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
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
			// if (testStartDate > testEndDate)
			//	strike_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
		//	strike_end_date_time.val(dateText);
		}
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
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			// if (testStartDate > testEndDate)
			//	strike_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
		//	strike_start_date_time.val(dateText);
		}
	},
	onSelect: function (selectedDateTime){
		//strike_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});

   
    
});
    
    
//$('#project_typetxt').change(); 
    
//$('#project_typetxt').on('load', function() {
  var val=$("#project_typetxt").attr("data-type");
  if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED'){
	//$('.pro_type').show();
        $("#btn_clear").css("display","block");
	
  }else{
	 // $('.pro_type').hide();
          $("#btn_clear").css("display","none");
  }
  //
//});
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
	
$('body').on('click', '#close-btnstep1', function () {


window.location.href = "<?php echo base_url(); ?>project/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $data1->group_id; ?>/<?php echo $data1->id; ?>/EDIT/1";
            

});


 

 $.validator.setDefaults({
	    submitHandler: function(){
		
	var project_name=$('#project_name').val();
	//var project_type=$('#project_type').val();
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

 var formdata = new FormData();
var url="<?=base_url();?>project/add_post_step1/<?php echo $data1->id;?>"; 
 formdata.append('project_name', project_name);
 //formdata.append('project_type', project_type);
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

//console.log(formdata);
 
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
						src         : "<?=base_url();?>project/editstep2/"+data,
						ajax: { 
						   settings: { data : 'group_id='+<?=$group_id;?>, type : 'POST' }
						},
						touch: false,
						 clickSlide: false,
						clickOutside: false
						
						});

			}
		}
	});

        
		}
	});

 
 
	$("#register-form1111").validate({
		rules: {				
			project_name: {
                            required : true,
                            maxlength : 50,
                        },
			venue_name:"required",
			venue_address:"required",
			country:"required",
			venue_postal_code:{
				required:true,
				digits:true,
				maxlength:8
			},
			event_start_date_time:"required",
			strike_start_date_time:"required",
                        event_end_date_time:{
                                required:function(){
                                
                            //    $('#project_type').on('change', function() {
                                    var val=$("#project_typetxt").attr("data-type");
                               // alert(val);
                                    if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED' || val=='VIRTUAL SHOP REG REQUIRED' || val=='VIRTUAL SHOP NO REG REQUIRED' || val==''){
                                        
                                        return false;
                                        
                                        
                                    }else{
                                        return true;
                                        
                                        
                                    }
                                }
                        },
                        strike_end_date_time : "required",
                        setup_start_date_time:"required",
                        setup_end_date_time:"required"
                             
		}, 
		errorPlacement: function(){
                               return false;
                }
		// messages: {
			
			// project_name: "ENSURE THAT PROJECT NAME IS FILLED IN.",
			// venue_name: "ENSURE THAT VENUE IS FILLED IN.",
			// venue_address: "ENSURE THAT VENUE ADDRESS IS FILLED IN.",
			// country: "ENSURE THAT A COUNTRY IS SELECTED.",
			// venue_postal_code:{
				// required:"ENSURE THAT VENUE POSTAL CODE IS FILLED IN."
			// },
			// setup_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// setup_end_date_time: "ENSURE THAT END DATE IS GREATER THAN START.",
			// event_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// event_end_date_time: "ENSURE THAT END DATE IS GREATER THAN START.",
			// strike_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// strike_end_date_time:"ENSURE THAT END DATE IS GREATER THAN START." 
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
